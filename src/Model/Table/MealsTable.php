<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meals Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\MealTypesTable|\Cake\ORM\Association\HasMany $MealTypes
 * @property |\Cake\ORM\Association\BelongsToMany $Orders
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

        $this->setTable('meals');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MealTypes', [
            'foreignKey' => 'meal_id'
        ]);
        $this->belongsToMany('Orders', [
            'foreignKey' => 'meal_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'meals_orders'
        ]);
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        $validator
            ->scalar('available')
            ->allowEmptyString('available', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
