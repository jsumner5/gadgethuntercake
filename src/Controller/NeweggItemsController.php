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
class NeweggItemsController extends AppController
{

    public function index()
    {
        $options = [
            'limit' => 25,
            'order' => [
                'id' => 'desc'
            ]
        ];

        $items = $this->paginate($this->Items,$options);
        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    public function searchNeweggItems()
    {
        $products = null;
        $loadData = false;

        include_once 'Component/NeweggService/NeweggService.php';

        if ($this->request->is('post')) {
            if(isset($this->request->data['keywords'])) {
                $newEggService = $this->service = new \NeweggService();
                $keywords = $this->request->data['keywords'];
                $keywords = str_replace(' ', '+', $keywords);
                $products = $newEggService->get_items($keywords);
                $loadData = true;
            }
            else{
                $loadData = false;
                debug($this->request->data);

            }
        }
        $this->set('items', $products);
        $this->loadData = true;
        $this->set('load_data', $loadData);
    }

    public function Add()
    {
        // Create from a string datetime.
        if ($this->request->is('post')) {

            $itemsC = new ItemsController();

            $item = $itemsC->Items->newEntity();
            $data = $this->request->data;

            $itemData = [
                'title' => $data['title'],
                'price' => $data['price'],
                'affiliateItemID' =>  $data['affiliateItemID'],
                'normal_price' => 'null',
                'list_price' => $data['price'],
                'item_url' => $data['signed-url'],
                'large_img_url' => $data['image-url'],
                'small_img_url' => $data['image-url'],
                'medium_img_url' => $data['image-url'],
                'publisherID' => $this->Auth->user('id'),
                'affiliateID' => 2 # 2 is for newEgg items
            ];
            $item = $itemsC->Items->patchEntity($item, $itemData);

            if ($itemsC->Items->save($item)) {
                $this->Flash->success('Item Saved');
                return $this->redirect(['controller' => 'items', 'action' => 'view', $item->id]);
            } else {
                $this->Flash->error('Item not saved!');
                return $this->redirect(['controller' => 'items', 'action' => 'index']);
                debug($item);
            }
            $this->set('item', $item);
            $this->set('_serialize', ['item']);
        }
    }

}
