<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Item;
use Cake\ORM\TableRegistry;
/**
 * Created by PhpStorm.
 * User: Jerold
 * Date: 5/11/2017
 * Time: 12:15 AM
 */
class MetricsController extends AppController
{
    public function index()
    {
        $options = [
            'limit' => 500,
            'order' => [
                'id' => 'desc'
            ]
        ];
        $this->itemsC = new ItemsController();
        $items = $this->itemsC->paginate($this->itemsC->Items, $options);
        $this->set(compact('items'));
        $this->set('_serialize', ['items']);

        $usersC = new UsersController();
        $users = $usersC->Users->find('all');
        $this->set(compact('users'));

        $query = TableRegistry::get('Users')->find();
        $this->users = $query;

        foreach ($query as $user) {
            //debug($user->title);
        }


        $this->setUserPostCount();
    }

    function setUserPostCount(){
        $options = [
            'order' => [
                'id' => 'desc'
            ]
        ];
        foreach ($this->viewVars['users'] as $user) {
            $itemC = new ItemsController();
            $query = $itemC->Items->find('all')
                -> where(['Items.publisherID' => $user['id']]);
            $user['item_post_count'] = $query->count();

        }


    }



}