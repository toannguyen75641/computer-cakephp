<?php
    $this->layout = "backend";
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customer'), ['controller' => 'Customer', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customer', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Product'), ['controller' => 'OrderProduct', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Product'), ['controller' => 'OrderProduct', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $order->has('customer') ? $this->Html->link($order->customer->name, ['controller' => 'Customer', 'action' => 'view', $order->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amout') ?></th>
            <td><?= h($order->amout) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $order->state ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Order Product') ?></h4>
        <?php if (!empty($order->order_product)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->order_product as $orderProduct): ?>
            <tr>
                <td><?= h($orderProduct->order_id) ?></td>
                <td><?= h($orderProduct->product_id) ?></td>
                <td><?= h($orderProduct->quantity) ?></td>
                <td><?= h($orderProduct->price) ?></td>
                <td><?= h($orderProduct->amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderProduct', 'action' => 'view', $orderProduct->order_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderProduct', 'action' => 'edit', $orderProduct->order_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderProduct', 'action' => 'delete', $orderProduct->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProduct->order_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
