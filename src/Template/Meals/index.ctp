<h1>Meals</h1>

<?= $this->Html->link('Add Meal', ['action' => 'add']) ?>

<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Options</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($meals as $meal): ?>
        <tr>
            <td>
                <?= $meal->name ?>
            </td>
            <td>
                <?= $meal->description ?>
            </td>
            <td>
                <?= $meal->price ?>
            </td>
            <td>
                <?php foreach ($meal->meal_types as $type): ?>
                    <?= $type->description ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?= $this->Html->link('Edit', ['action' => 'edit', $meal->id]) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $meal->id],
                    ['confirm' => 'Are you sure?'])
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>