<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Entity;


/**
 * ItemPromotions Controller
 *
 * @property \App\Model\Table\ItemPromotionsTable $ItemPromotions
 */
class ItemPromotionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $itemPromotions = $this->paginate($this->ItemPromotions);

        $this->set(compact('itemPromotions'));
        $this->set('_serialize', ['itemPromotions']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Promotion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemPromotion = $this->ItemPromotions->get($id, [
            'contain' => []
        ]);

        $this->set('itemPromotion', $itemPromotion);
        $this->set('_serialize', ['itemPromotion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($itemID)
    {
        $this->autoRender = false;
        $itemPromotion = $this->ItemPromotions->newEntity();

        #check for existing item promotion
        $existingPromo = $this->ItemPromotions->find('all')
            ->where(['itemID' => $itemID])
            ->first();


        if(!$existingPromo) {
            $newPromo = [
                'itemID' => $itemID,
            ];

            $itemPromotion = $this->ItemPromotions->patchEntity($itemPromotion, $newPromo);

            if ($this->ItemPromotions->save($itemPromotion)) {
                //   $this->Flash->success(__('The item promotion has been saved.'));

                return $this->redirect(['action' => 'edit', $itemPromotion->id]);
            }
            $this->Flash->error(__('The item promotion could not be saved. Please, try again.'));

        }else{
            return $this->redirect(['action' => 'edit', $existingPromo->id]);
        }
    }

    public function getPromotions(){
            $promotions = $this->loadModel('Promotions');
            $promos = $promotions->find('all')->all()->toArray();
            return $promos;
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Promotion id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemPromotion = $this->ItemPromotions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemPromotion = $this->ItemPromotions->patchEntity($itemPromotion, $this->request->data);
            if ($this->ItemPromotions->save($itemPromotion)) {
                $itemC = new ItemsController();
                $item = $itemC->Items->get($itemPromotion['itemID']);
                $item['promotionID'] = $itemPromotion['promotionID'];
                if($itemC->Items->save($item)){
                    $this->Flash->success(__('The item promotion has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }else{
                    $this->Flash->error(__('The item promotion could not be saved. Please, try again.'));
                }


            }
            $this->Flash->error(__('The item promotion could not be saved. Please, try again.'));
        }
        $promotions = $this->getPromotions();
        $this->set(compact('promotions'));
        $this->set(compact('itemPromotion'));
        $this->set('_serialize', ['itemPromotion', 'promotions']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Promotion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemPromotion = $this->ItemPromotions->get($id);
        if ($this->ItemPromotions->delete($itemPromotion)) {
            $this->Flash->success(__('The item promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The item promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
