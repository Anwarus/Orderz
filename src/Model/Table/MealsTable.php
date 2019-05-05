<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meals Model
 *
 * @property \App\Model\Table\MealTypesTable|\Cake\ORM\Association\HasMany $MealTypes
 *
 * @method \App\Model\Entity\Meal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Meal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Meal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Meal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Meal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Meal findOrCreate($search, callable $callback = null, $options = [])
 */
class MealsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->hasMany('MealTypes');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('name', false)
            ->maxLength('title', 255)

            ->allowEmptyString('price', false);

        return $validator;
    }

}