<h1>Add Meal</h1>

<?php
    echo $this->Form->create($meal);

    echo $this->Form->control('name');
    echo $this->Form->control('description');
    echo $this->Form->control('price');

    echo $this->Form->button(__('Save Meal'));

    echo $this->Form->end();
?>