<?php
namespace App\Controller\Blog\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;

class AppController extends Controller {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth');
        $this->set('current_user', $this->Auth->user());

        //Layout
        $this->viewBuilder()->layout('admin');
    }

    public function beforeFilter(Event $event) {
        ConnectionManager::alias('test', 'default');
        parent::beforeFilter($event);
        //Deny all admin pages if not logged in
        $this->Auth->deny();
        $current_user = $this->Auth->user();
        // to fix problems with being logged into both the
        //blog admin and the items manager
        if(!isset($current_user['full_name'])){
            return $this->redirect($this->Auth->logout());
        }

    }
}