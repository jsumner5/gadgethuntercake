<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Item;
use Cake\ORM\TableRegistry;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class AmazonItemsController extends AppController
{


    public function add()
    {
        $itemsC = new ItemsController();
        $item = $itemsC->Items->newEntity();
        include_once 'Component/AmazonService/AmazonService.php';
        $this->service = new \AmazonService("gadgethunter2-20", "AKIAJO4D6JCASSJUQULA", "IyV+9o1NP7KtE8Ze+tzDCexwYdCSEY5Sa7U3trT9");

        if ($this->request->is('post')) {
            $service = $this->service;
            $asin = $this->request->data['asin'];

            $xml_item = $service->getXmlObjectById($asin);

            # build the item
            $item->affiliateItemID = $asin;
            $item->title = $service->getTitle($xml_item);
            $item->price = $service->getPrice($xml_item);
            $item->list_price = $item->price;
            $item->normal_price = $service->getNormalPrice($xml_item);
            $item->item_url = $service->getSignedUrl($xml_item);
            $item->large_img_url = $service->getLargeImgUrl($xml_item);
            $item->small_img_url = $service->getSmallImgUrl($xml_item);
            $item->publisherID = $this->Auth->user('id');
            $item->affiliateID = 1;


            if ($itemsC->Items->save($item)) {
                // want to eventaully make sure Amazon service returns valid item
                $this->Flash->success('Item Saved');
                return $this->redirect(['controller' => 'items','action' => 'view', $item->id]);
            }
            $this->Flash->error('Error saving item');
        }

        $this->set(compact('item'));
        $this->set('_serialize', ['item']);

    }



}
