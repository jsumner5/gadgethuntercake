<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Announcements Controller
 *
 * @property \App\Model\Table\AnnouncementsTable $Announcements
 */
class AnnouncementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $announcements = $this->paginate($this->Announcements);

        $this->set(compact('announcements'));
        $this->set('_serialize', ['announcements']);
    }

    /**
     * View method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => []
        ]);

        $this->set('announcement', $announcement);
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $announcement = $this->Announcements->newEntity();
        if ($this->request->is('post')) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $this->set(compact('announcement'));
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $this->set(compact('announcement'));
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $this->Flash->success(__('The announcement has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
