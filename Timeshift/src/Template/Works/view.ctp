<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Works $works
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Works'), ['action' => 'edit', $works->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Works'), ['action' => 'delete', $works->id], ['confirm' => __('Are you sure you want to delete # {0}?', $works->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Works'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Works'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="works view large-9 medium-8 columns content">
    <h3><?= h($works->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Member') ?></th>
            <td><?= $works->has('member') ? $this->Html->link($works->member->name, ['controller' => 'Members', 'action' => 'view', $works->member->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($works->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Check In') ?></th>
            <td><?= h($works->check_in) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Check Out') ?></th>
            <td><?= h($works->check_out) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($works->created) ?></td>
        </tr>
    </table>
</div>
