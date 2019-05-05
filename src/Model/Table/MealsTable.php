<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MealsTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('MealTypes');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('name', false)
            ->maxLength('title', 255)

            ->allowEmptyString('price', false);

        return $validator;
    }

}