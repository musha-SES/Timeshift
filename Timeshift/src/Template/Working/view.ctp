<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Working $working
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Working'), ['action' => 'edit', $working->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Working'), ['action' => 'delete', $working->id], ['confirm' => __('Are you sure you want to delete # {0}?', $working->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Working'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Working'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="working view large-9 medium-8 columns content">
    <h3><?= h($working->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Member') ?></th>
            <td><?= $working->has('member') ? $this->Html->link($working->member->name, ['controller' => 'Members', 'action' => 'view', $working->member->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($working->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Check In') ?></th>
            <td><?= h($working->check_in) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Check Out') ?></th>
            <td><?= h($working->check_out) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($working->created) ?></td>
        </tr>
    </table>
</div>
