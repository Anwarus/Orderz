<?php

namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class MealsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public $fixtures = ['app.Meals'];

    public function testMealIndex()
    {
        $this->get('/meals');

        $this->assertResponseOk();
    }

    public function testMealAdd()
    {
        $this->enableCsrfToken();

        $data = [
            'name' => 'Onion',
            'description' => 'sauce, cheese, onion',
            'price' => 52
        ];

        $this->post('/meals/add', $data);

        $this->assertResponseSuccess();

        $meals = TableRegistry::getTableLocator()->get('Meals');
        $query = $meals->find()->where(['name' => $data['name']]);

        $this->assertEquals(1, $query->count());
    }

    public function testMealEdit()
    {
        $this->enableCsrfToken();

        $data = [
            'id' => 1,
            'name' => 'Margarita [edited]'
        ];

        $this->put("/meals/edit/1", $data);

        $meals = TableRegistry::getTableLocator()->get('Meals');
        $meal = $meals->get($data['id']);

        $this->assertEquals($data['name'], $meal->name);
    }

    public function testMealDelete()
    {
        $this->enableCsrfToken();

        $id = 1;

        $this->delete('/meals/delete/1');

        $meals = TableRegistry::getTableLocator()->get('Meals');
        $isMealExist = $meals->exists(['id' => $id]);

        $this->assertFalse($isMealExist);
    }
}