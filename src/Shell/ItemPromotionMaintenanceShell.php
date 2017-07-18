<?php
/**
 * Created by PhpStorm.
 * User: Jerold
 * Date: 6/10/2017
 * Time: 5:09 PM
 */

namespace App\Shell;

use App\Controller\ItemPromotionsController;
use App\Controller\ItemsController;
use Cake\Console\Shell;

class ItemPromotionMaintenanceShell extends Shell
{
    public function main()
    {
        $COMPONENTPATH = realpath($_SERVER["DOCUMENT_ROOT"]);
        include "$COMPONENTPATH/src/Controller/ItemsController.php";
        include "$COMPONENTPATH/src/Controller/ItemPromotionsController.php";

        $itemPromosC = new ItemPromotionsController();
        $itemsC = new ItemsController();

        $itemPromos = $itemPromosC->ItemPromotions->find('all')
            ->toList();
        foreach($itemPromos as $itemPromo){
            if($itemPromo['hoursLeft'] > 0){
                $itemPromo['hoursLeft'] -=1;
                if($itemPromosC->ItemPromotions->save($itemPromo)){
                    $this->out('Updated item promotion '.$itemPromo['id']);

                }else{
                    $this->out('An error occurred');
                }

            }else{
                $item = $itemsC->Items->get($itemPromo['itemID']);

                $itemPromosC->ItemPromotions->delete($itemPromo);
                $item['promotionID'] = null;

                if($itemsC->Items->save($item)){
                    $this->out('Deleted promotion for item '.$item['id']);
                }else{
                    $this->out('An error occurred');
                }
            }

        }
        $this->out('Item promotion maintenance complete');

    }
}