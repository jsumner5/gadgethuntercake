<?php
/**
 * Created by PhpStorm.
 * User: Jerold
 * Date: 6/10/2017
 * Time: 5:31 PM
 */


namespace App\Shell;

use Cake\Console\Shell;
use Cake\Controller\Component;
use Cake\I18n\Time;


class UpdateItemsShell extends Shell
{
    public function initialize()
    {
        parent::initialize();


        $this->loadModel('Items');
        $this->time = Time::now()->setTimezone('America/New_York')->format('Y-m-d');

    }

    public function main()
    {

        $this->out('update items shell working');
        $this->updateAmazonItems();
        $this->updateNeweggItems();

    }


    function updateAmazonItems(){
        $COMPONENTPATH = realpath($_SERVER["DOCUMENT_ROOT"]);
        include "$COMPONENTPATH/src/Controller/Component/AmazonService/AmazonService.php";

        $amazonService = new \AmazonService("gadgethunter2-20", "AKIAJO4D6JCASSJUQULA", "IyV+9o1NP7KtE8Ze+tzDCexwYdCSEY5Sa7U3trT9");

        # Get the current date
        $time = Time::now()->setTimezone('America/New_York')->format('Y-m-d');

        # update amazon items
        $amazonItemsQuery = $this->Items->find('all')
            ->where(['Items.date_price_updated !=' => $time, 'Items.affiliateID =' => 1])
            ->limit(20)
            ->order(['id' => 'DESC']);

        #Converting the query to an array will execute it.
        $items = $amazonItemsQuery->toArray();
        $this->out('Found '.  count($items).' Amazon Items to be updated');
        $updatedItemsCount = 0;
        foreach( $items as $item){
            usleep(250000);
            $xml_item = $amazonService->getXmlObjectById($item['affiliateItemID']);
            # set item prices and date price updated
            $item->price = $amazonService->getPrice($xml_item);
            $item->date_price_updated = $time;
            $item->normal_price = $amazonService->getNormalPrice($xml_item);
            $item->list_price = $item->price;

            if ($this->Items->save($item)) {
                $this->out('updated '.$item['affiliateItemID']);
                $updatedItemsCount ++;

            }else{
                $this->out('there was a problem saving item'.$item['affiliateItemID']);
            }
        }
        $this->out('updated '. $updatedItemsCount .' Amazon items');

    }


    function updateNeweggItems(){
        $COMPONENTPATH = realpath($_SERVER["DOCUMENT_ROOT"]);
        include "$COMPONENTPATH/src/Controller/Component/NeweggService/NeweggService.php";

        $neService = new \NeweggService();

        $neweggItemsQuery = $this->Items->find('all')
            ->where(['Items.date_price_updated !=' => $this->time, 'Items.affiliateID =' => 2])
            ->limit(20);

        $items = $neweggItemsQuery->toArray();

        $this->out('Found '.count($items).' Newegg Items to be updated.');
        $updatedItemsCount =0;

        foreach ($items as $item){
            usleep(250000);
            $xmlItem = $neService->get_item($item['affiliateItemID']);
            # set item prices and date price updated
            $item->price = floatval($xmlItem->{'sale-price'});
            $item->list_price = $item->price;
            $item->normal_price = null;
            $item->date_price_updated = $this->time;

            if ($this->Items->save($item)) {
                $this->out('Updated '.$item['affiliateItemID']);
                $updatedItemsCount ++;
            }else{
                $this->out('there was a problem saving item'.$item['affiliateItemID']);
            }

        }
        printf('Updated '.$updatedItemsCount.' Newegg items.');
    }
}