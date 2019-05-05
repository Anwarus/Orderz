<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class MealsFixture extends TestFixture
{
    public $import = ['table' => 'meals'];

    public $records = [
        [
            'name' => 'Margarita',
            'description' => 'sauce, cheese'
        ],
        [
            'name' => 'Salami',
            'description' => 'sauce, cheese, salami'
        ],
        [
            'name' => 'Chicken',
            'description' => 'sauce, cheese, chicken',
            'price' => 26.0
        ]
    ];
}