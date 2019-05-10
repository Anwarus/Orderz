<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\CategoriesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CategoriesController Test Case
 */
class CategoriesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Categories',
        'app.Meals'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/categories');

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $id = 1;

        $this->get("/categories/view/{$id}");

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
            'name' => 'Test category'
        ];

        $this->post('/categories/add', $data);

        $this->assertRedirect();
        $this->assertResponseSuccess();

        $category = TableRegistry::get('Categories')
            ->findByName($data->name)
            ->first();

        $this->assertEquals($category->name, $data->name);
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
            'name' => 'Test category [edited]'
        ];

        $this->put("/categories/edit/1", $data);

        $categories = TableRegistry::getTableLocator()->get('Categories');
        $category = $categories->get($data['id']);

        $this->assertEquals($data['name'], $category->name);
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

        $this->delete("/categories/delete/{$id}");

        $categories = TableRegistry::getTableLocator()->get('Categories');
        $isCategoryExist = $categories->exists(['id' => $id]);

        $this->assertFalse($isCategoryExist);
    }
}
