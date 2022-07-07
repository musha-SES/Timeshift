<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AtWork $atWork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit At Work'), ['action' => 'edit', $atWork->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete At Work'), ['action' => 'delete', $atWork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atWork->id)]) ?> </li>
        <li><?= $this->Html->link(__('List At Work'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New At Work'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atWork view large-9 medium-8 columns content">
    <h3><?= h($atWork->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Member') ?></th>
            <td><?= $atWork->has('member') ? $this->Html->link($atWork->member->name, ['controller' => 'Members', 'action' => 'view', $atWork->member->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($atWork->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($atWork->time) ?></td>
        </tr>
    </table>
</div>
