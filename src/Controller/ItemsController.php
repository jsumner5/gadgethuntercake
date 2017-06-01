<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Item;
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

    function updateItems(){
        include_once 'Component/AmazonService/AmazonService.php';
        $this->service = new \AmazonService("gadgethunter2-20", "AKIAJO4D6JCASSJUQULA", "IyV+9o1NP7KtE8Ze+tzDCexwYdCSEY5Sa7U3trT9");

        // Get the current date
        $time = Time::now()->setTimezone('America/New_York')->format('Y-m-d');

        # update amazon items
        $amazonItemsQuery = $this->Items->find('all')
            ->where(['Items.date_price_updated' => $time, 'Items.affiliateID =' => 1])
            ->limit(20);

        #Converting the query to an array will execute it.
        $items = $amazonItemsQuery->toArray();
        echo 'items found: '.  count($items).'<br>';
        foreach( $items as $item){
//            sleep(1);
            $xml_item = $this->service->getXmlObjectById($item['asin']);
            # set item prices and date price updated
            $item->price = $this->service->getPrice($xml_item);
            $item->date_price_updated = $time;
            $item->normal_price = $this->service->getNormalPrice($xml_item);
            $item->list_price = $item->price;

            if ($this->Items->save($item)) {
                echo $item['asin'] . 'updated <br>';
            }else{
                echo 'there was a problem saving item'.$item['asin'];
            }
        }

        #Update newegg items
        $neweggItemsQuery = $this->Items->find('all')
            ->where(['Items.date_price_updated !=' => $time, 'Items.affiliateID =' => 2])
            ->limit(20);

        $items = $neweggItemsQuery->toArray();

        foreach ($items as $items){

            sleep(1);
            $xml_item = $this->service->getXmlObjectById($item['asin']);
            # set item prices and date price updated
            $item->price = $this->service->getPrice($xml_item);
            $item->date_price_updated = $time;
            $item->normal_price = $this->service->getNormalPrice($xml_item);
            $item->list_price = $item->price;

            if ($this->Items->save($item)) {
                echo $item['asin'] . 'updated <br>';
            }else{
                echo 'there was a problem saving item'.$item['asin'];
            }

        }

    }





}
