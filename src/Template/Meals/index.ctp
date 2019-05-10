<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meal[]|\Cake\Collection\CollectionInterface $meals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Meal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Meal Types'), ['controller' => 'MealTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal Type'), ['controller' => 'MealTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="meals index large-9 medium-8 columns content">
    <h3><?= __('Meals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meals as $meal): ?>
            <tr>
                <td><?= h($meal->name) ?></td>
                <td><?= h($meal->description) ?></td>
                <td><?= $this->Number->format($meal->price) ?></td>
                <td><?= $this->Number->format($meal->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $meal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meal->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
