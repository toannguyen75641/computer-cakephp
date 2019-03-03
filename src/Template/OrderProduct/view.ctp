<?php
    $this->layout = "backend";
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Product'), ['action' => 'edit', $orderProduct->order_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Product'), ['action' => 'delete', $orderProduct->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProduct->order_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Product'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderProduct view large-9 medium-8 columns content">
    <h3><?= h($orderProduct->order_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderProduct->has('order') ? $this->Html->link($orderProduct->order->id, ['controller' => 'Orders', 'action' => 'view', $orderProduct->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $orderProduct->has('product') ? $this->Html->link($orderProduct->product->name, ['controller' => 'Product', 'action' => 'view', $orderProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($orderProduct->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($orderProduct->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($orderProduct->amount) ?></td>
        </tr>
    </table>
</div>
