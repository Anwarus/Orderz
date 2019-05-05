<?php

namespace App\Controller;

/**
 * Meals Controller
 *
 * @property \App\Model\Table\MealsTable Meals
 *
 * @method \App\Model\Entity\Meal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MealsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $meals = $this->paginate($this->Meals->find()->contain('MealTypes'));
        $this->set(compact('meals'));
    }

    /**
     * View method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meal = $this->Meals->get($id, [
            'contain' => ['MealTypes']
        ]);

        $this->set(compact('meal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meal = $this->Meals->newEntity();

        if ($this->request->is('post')) {
            $meal = $this->Meals->patchEntity($meal, $this->request->getData());
            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('The meal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meal could not be saved. Please, try again.'));
        }
        $this->set(compact('meal'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meal = $this->Meals->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meal = $this->Meals->patchEntity($meal, $this->request->getData());
            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('The meal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('The meal could not be saved. Please, try again.');
        }
        $this->set(compact('meal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $meal = $this->Meals->get($id);
        if ($this->Meals->delete($meal)) {
            $this->Flash->success(__('The meal has been deleted.'));
        } else {
            $this->Flash->error(__('The meal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}