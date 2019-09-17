<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Livros Controller
 *
 * @property \App\Model\Table\LivrosTable $Livros
 *
 * @method \App\Model\Entity\Livro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $livros = $this->Livros->find('all')
                ->contain(['generos']);
        foreach($livros as $livro) {
            $id = $livro->id_genero;
            $livro->genero = $this->Livros->Generos->get($id)->nome;
        }
        $this->set(compact('livros'));
    }

    /**
     * View method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livro = $this->Livros->Generos->find('all')
            ->select(['id', 'nome'])
            ->all();
        $this->set('livro', $livro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $livro = $this->Livros->newEntity();
        $options = [];
        $generos = $this->Livros->Generos->find('all')
                    ->select(['id', 'nome'])
                    ->all();
        foreach($generos as $g) {
            $options[$g->id] = $g->nome;
        };
        $livro->genero = $options;
        if ($this->request->is('post')) {
            $livro = $this->Livros->patchEntity($livro, $this->request->getData());
            $livro->id_genero = (int) $this->request->getData()["genero_id"];
            $response = $this->Livros->save($livro, ['associated' => ['Generos.ID']]);
            if ($response) {
                $this->Flash->success(__('The livro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The livro could not be saved. Please, try again.'));
        }
        $this->set(compact('livro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livro = $this->Livros->get($id, [
            'contain' => ['generos']
        ]);
        $options = [];
        $generos = $this->Livros->Generos->find('all')
                    ->select(['id', 'nome'])
                    ->all();
        foreach($generos as $g) {
            $options[$g->id] = $g->nome;
        };
        $livro->genero = $options;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livro = $this->Livros->patchEntity($livro, $this->request->getData());
            if ($this->Livros->save($livro)) {
                $this->Flash->success(__('The livro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The livro could not be saved. Please, try again.'));
        }
        $this->set(compact('livro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livro = $this->Livros->get($id);
        if ($this->Livros->delete($livro)) {
            $this->Flash->success(__('The livro has been deleted.'));
        } else {
            $this->Flash->error(__('The livro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
