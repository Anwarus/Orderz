<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meal Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float|null $price
 * @property int $category_id
 * @property string $available
 *
 * @property \App\Model\Entity\MealType[] $meal_types
 */
class Meal extends Entity
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
        'name' => true,
        'description' => true,
        'price' => true,
        'category_id' => true,
        'available' => true,
        'meal_types' => true
    ];
}
