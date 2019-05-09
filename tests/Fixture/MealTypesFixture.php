<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MealTypesFixture
 */
class MealTypesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => [
            'type' => 'integer',
            'length' => 11,
            'unsigned' => false,
            'null' => false,
            'default' => null,
            'comment' => '',
            'autoIncrement' => true,
            'precision' => null
        ],
        'meal_id' => [
            'type' => 'integer',
            'length' => 11,
            'unsigned' => false,
            'null' => false,
            'default' => null,
            'comment' => '',
            'precision' => null,
            'autoIncrement' => null
        ],
        'category_type_id' => [
            'type' => 'integer',
            'length' => 11,
            'unsigned' => false,
            'null' => false,
            'default' => null,
            'comment' => '',
            'precision' => null,
            'autoIncrement' => null,
        ],
        'price' => [
            'type' => 'decimal',
            'length' => 19,
            'precision' => 4,
            'unsigned' => false,
            'null' => true,
            'default' => null,
            'comment' => ''
        ],
        '_indexes' => [
            'meal_types_meal_key' => [
                'type' => 'index',
                'columns' => ['meal_id'],
                'length' => []
            ],
            'meal_types_category_type_key' => [
                'type' => 'index',
                'columns' => ['category_type_id'],
                'length' => []
            ],
        ],
        '_constraints' => [
            'primary' => [
                'type' => 'primary',
                'columns' => ['id'],
                'length' => []
            ],
            'meal_types_category_type_key' => [
                'type' => 'foreign',
                'columns' => ['category_type_id'],
                'references' => ['category_types', 'id'],
                'update' => 'restrict', 'delete' => 'restrict',
                'length' => []
            ],
            'meal_types_meal_key' => [
                'type' => 'foreign',
                'columns' => ['meal_id'],
                'references' => ['meals', 'id'],
                'update' => 'restrict',
                'delete' => 'restrict',
                'length' => []
            ],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ]
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'meal_id' => 2,
                'category_type_id' => 1,
                'price' => 18
            ],
            [
                'id' => 2,
                'meal_id' => 2,
                'category_type_id' => 2,
                'price' => 22
            ],
            [
                'id' => 3,
                'meal_id' => 2,
                'category_type_id' => 3,
                'price' => 26
            ]
        ];
        parent::init();
    }
}
