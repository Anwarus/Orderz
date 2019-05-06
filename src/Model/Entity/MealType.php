<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MealType Entity
 *
 * @property int $id
 * @property int $meal_id
 * @property int $category_type_id
 * @property float|null $price
 *
 * @property \App\Model\Entity\Meal $meal
 */
class MealType extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'meal_id' => true,
        'category_type_id' => true,
        'price' => true,
        'meal' => true
    ];
}
