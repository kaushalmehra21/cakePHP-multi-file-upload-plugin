<?php
namespace Library\Controller;

use Library\Controller\AppController;

/**
 * LibrarySettings Controller
 *
 * @property \Library\Model\Table\LibrarySettingsTable $LibrarySettings
 */
class LibrarySettingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $librarySettings = $this->paginate($this->LibrarySettings);

        $this->set(compact('librarySettings'));
        $this->set('_serialize', ['librarySettings']);
    }

    /**
     * View method
     *
     * @param string|null $id Library Setting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $librarySetting = $this->LibrarySettings->get($id, [
            'contain' => []
        ]);

        $this->set('librarySetting', $librarySetting);
        $this->set('_serialize', ['librarySetting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $librarySetting = $this->LibrarySettings->newEntity();
        if ($this->request->is('post')) {
            $librarySetting = $this->LibrarySettings->patchEntity($librarySetting, $this->request->getData());
            if ($this->LibrarySettings->save($librarySetting)) {
                $this->Flash->success(__('The library setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The library setting could not be saved. Please, try again.'));
        }
        $this->set(compact('librarySetting'));
        $this->set('_serialize', ['librarySetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Library Setting id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $librarySetting = $this->LibrarySettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $librarySetting = $this->LibrarySettings->patchEntity($librarySetting, $this->request->getData());
            if ($this->LibrarySettings->save($librarySetting)) {
                $this->Flash->success(__('The library setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The library setting could not be saved. Please, try again.'));
        }
        $this->set(compact('librarySetting'));
        $this->set('_serialize', ['librarySetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Library Setting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $librarySetting = $this->LibrarySettings->get($id);
        if ($this->LibrarySettings->delete($librarySetting)) {
            $this->Flash->success(__('The library setting has been deleted.'));
        } else {
            $this->Flash->error(__('The library setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
