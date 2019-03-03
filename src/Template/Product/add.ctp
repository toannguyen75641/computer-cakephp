<?php
    $this->layout = "backend";
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Product'), ['controller' => 'OrderProduct', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Product'), ['controller' => 'OrderProduct', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="product form large-9 medium-8 columns content">
    <?= $this->Form->create($product, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->control('product_code');
            echo $this->Form->control('category_id', ['options' => $category]);
            echo $this->Form->control('name');
            echo $this->Form->control('quantity');
            echo $this->Form->control('image', ['type' => 'file']);
            echo $this->Form->control('price');
            echo $this->Form->control('description');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
