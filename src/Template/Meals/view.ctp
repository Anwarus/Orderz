<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meal $meal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Meal'), ['action' => 'edit', $meal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Meal'), ['action' => 'delete', $meal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Meals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meal'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meal Types'), ['controller' => 'MealTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meal Type'), ['controller' => 'MealTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="meals view large-9 medium-8 columns content">
    <h3><?= h($meal->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($meal->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($meal->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($meal->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($meal->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($meal->category_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Meal Types') ?></h4>
        <?php if (!empty($meal->meal_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Meal Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($meal->meal_types as $mealTypes): ?>
            <tr>
                <td><?= h($mealTypes->id) ?></td>
                <td><?= h($mealTypes->meal_id) ?></td>
                <td><?= h($mealTypes->description) ?></td>
                <td><?= h($mealTypes->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MealTypes', 'action' => 'view', $mealTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MealTypes', 'action' => 'edit', $mealTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MealTypes', 'action' => 'delete', $mealTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mealTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
