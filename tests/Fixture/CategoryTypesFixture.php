<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoryTypesFixture
 */
class CategoryTypesFixture extends TestFixture
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
        'category_id' => [
            'type' => 'integer',
            'length' => 11,
            'unsigned' => false,
            'null' => false,
            'default' => null,
            'comment' => '',
            'precision' => null,
            'autoIncrement' => null
        ],
        'description' => [
            'type' => 'string',
            'length' => 255,
            'null' => true,
            'default' => null,
            'collate' => 'utf8_unicode_ci',
            'comment' => '',
            'precision' => null,
            'fixed' => null
        ],
        '_indexes' => [
            'category_types_category_key' => [
                'type' => 'index',
                'columns' => ['category_id'],
                'length' => []
            ],
        ],
        '_constraints' => [
            'primary' => [
                'type' => 'primary',
                'columns' => ['id'],
                'length' => []
            ],
            'category_types_category_key' => [
                'type' => 'foreign',
                'columns' => ['category_id'],
                'references' => ['categories', 'id'],
                'update' => 'restrict',
                'delete' => 'restrict',
                'length' => []
            ],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
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
                'category_id' => 1,
                'description' => 'small'
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'description' => 'medium'
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'description' => 'big'
            ],
            [
                'id' => 4,
                'category_id' => 2,
                'description' => 'custom'
            ]
        ];

        parent::init();
    }
}
