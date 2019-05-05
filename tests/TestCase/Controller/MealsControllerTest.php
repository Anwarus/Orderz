<?php

namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MealsController Test Case
 */
class MealsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = ['app.Meals'];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/meals');

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public  function testView()
    {
        $id = 1;

        $this->get("/meals/view/{$id}");

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
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

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
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

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->enableCsrfToken();

        $id = 1;

        $this->delete('/meals/delete/1');

        $meals = TableRegistry::getTableLocator()->get('Meals');
        $isMealExist = $meals->exists(['id' => $id]);

        $this->assertFalse($isMealExist);
    }
}