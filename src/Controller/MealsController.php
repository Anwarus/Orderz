<?php

namespace App\Controller;

class MealsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $meals = $this->Paginator->paginate($this->Meals->find()->contain('MealTypes'));
        $this->set(compact('meals'));
    }

    public function add()
    {
        $meal = $this->Meals->newEntity();

        if($this->request->is('post')) {
            $meal = $this->Meals->patchEntity($meal, $this->request->getData());

            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('Your meal has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your $meal.'));
        }
        $this->set('meal', $meal);
    }

    public function edit($id)
    {
        $meal = $this->Meals->findById($id)->firstOrFail();
        if($this->request->is(['post', 'put'])) {
            $this->Meals->patchEntity($meal, $this->request->getData());
            if($this->Meals->save($meal)) {
                $this->Flash->success(__('Your meal has been updated'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Unable to update your meal');
        }
        $this->set('meal', $meal);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $meal = $this->Meals->findById($id)->firstOrFail();
        if($this->Meals->delete($meal)) {
            $this->Flash->success(__('The {0} meal has been deleted', $meal->name));
            return $this->redirect(['action' => 'index']);
        }
    }
}