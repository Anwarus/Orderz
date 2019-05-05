<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class MealTypesFixture extends TestFixture
{
    public $import = ['table' => 'meal_types'];

    public $records = [
        [
            'meal_id' => 1,
            'description' => 'small',
            'price' => 16.0
        ],
        [
            'meal_id' => 1,
            'description' => 'big',
            'price' => 20.0
        ],
        [
            'meal_id' => 2,
            'description' => 'medium',
            'price' => 22.0
        ]
    ];
}