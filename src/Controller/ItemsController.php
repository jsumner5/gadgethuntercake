<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Item;
use Cake\I18n\Number;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
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


    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);

        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $this->set(compact('item'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $this->set(compact('item'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    #trim item title to a shorter length
    function trimTitle($title){
        if(strlen($title) > 40) {
            $result = substr($title, 0, strpos($title, ' ', 40));
        }
        else{
            $result = $title;
        }
        return $result;
    }

    public function getItemPromotion($itemID){
        $ItempromotionsM = $this->loadModel('ItemPromotions');
        $promo = $ItempromotionsM->find('all')
            ->where(['itemID' => $itemID])
            ->first();
        return $promo;
    }
    function getPriceInfo($item){
        //some c

        if(isset($item['promotionID'])){
            $itemPromotionC = new ItemPromotionsController();

            $itemPromo = $itemPromotionC->ItemPromotions->find('all')
                ->where(['itemID' => $item['id']])
                ->first();

            return '<tr style="border-bottom: none;"><td class=""><S>'.Number::currency($item['price']).'</S></td></tr>'
                .'<tr style="border-bottom: none;"><td class="">'.Number::currency($itemPromo['priceWithPromotion']).' WITH CODE: '.$itemPromo['promoCode'].'</td></tr>';

        }else{
            if($item['price'] < ($item['normal_price'] -1 )){
                return '<tr style="border-bottom: none;"><td class="">'.'From <s>'.Number::currency($item['normal_price']).'</s> to '.Number::currency($item['price']).'</td></tr>';
            }else{
                return '<tr style="border-bottom: none;"><td class="">'.Number::currency($item['price']).'</td></tr>';
            }


        }

    }


}
