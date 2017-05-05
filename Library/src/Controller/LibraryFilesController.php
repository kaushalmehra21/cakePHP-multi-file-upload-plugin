<?php
namespace Library\Controller;

use Library\Controller\AppController;

/**
 * LibraryFiles Controller
 *
 * @property \Library\Model\Table\LibraryFilesTable $LibraryFiles
 */
class LibraryFilesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Library.FileHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $libraryFiles = $this->paginate($this->LibraryFiles, ['limit'=>10]);

        $this->set(compact('libraryFiles'));
        $this->set('_serialize', ['libraryFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Library File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $libraryFile = $this->LibraryFiles->get($id, [
            'contain' => []
        ]);

        $this->set('libraryFile', $libraryFile);
        $this->set('_serialize', ['libraryFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $LibrarySettings    = $this->loadModel('LibrarySettings');
        $query = $articles
        ->find()
        ->select(['plugin_value'])
        ->where(['id !=' => 1])
        ->order(['created' => 'DESC']);

        $fileStatus         = 'success';
        $destinationPath    = 'library_docs'; // for user setting

        $libraryFile = $this->LibraryFiles->newEntity();
        if ($this->request->is('post')) {

            $requestData = $this->request->getData();

            foreach ($requestData['file'] as $file) 
            {
                if (!empty($file['name'])) 
                {
                    $fileData = $this->FileHandler->uploadFile($file, $destinationPath);

                    if($fileData['status'] == 'fail') {
                        $fileStatus = 'fail';
                        $this->Flash->error(__($fileData['message']));
                    } else {
                        $this->request->data['title']       = $fileData['name'];
                        $this->request->data['name']        = $fileData['new_name'];
                        $this->request->data['extention']   = $fileData['ext'];
                        $this->request->data['type']        = $fileData['type'];
                        $this->request->data['size']        = $fileData['size'];
                        $this->request->data['error']       = $fileData['error'];
                    }
                }

                $libraryFile = $this->LibraryFiles->patchEntity($libraryFile, $this->request->data);
                
                $this->LibraryFiles->save($libraryFile);

                $libraryFile = $this->LibraryFiles->newEntity();
            }

            $this->Flash->success(__('The library file has been saved.'));
            return $this->redirect(['action' => 'index']);

            $this->Flash->error(__('The library file could not be saved. Please, try again.'));
        }
        $this->set(compact('libraryFile'));
        $this->set('_serialize', ['libraryFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Library File id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $libraryFile = $this->LibraryFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $libraryFile = $this->LibraryFiles->patchEntity($libraryFile, $this->request->getData());
            if ($this->LibraryFiles->save($libraryFile)) {
                $this->Flash->success(__('The library file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The library file could not be saved. Please, try again.'));
        }
        $this->set(compact('libraryFile'));
        $this->set('_serialize', ['libraryFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Library File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $libraryFile = $this->LibraryFiles->get($id);
        if ($this->LibraryFiles->delete($libraryFile)) {
            $this->Flash->success(__('The library file has been deleted.'));
        } else {
            $this->Flash->error(__('The library file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
