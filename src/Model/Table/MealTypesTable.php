<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MealTypesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Meals');
    }
}