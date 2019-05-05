<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Meal extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}