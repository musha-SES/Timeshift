<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LgWork $lgWork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lg Work'), ['action' => 'edit', $lgWork->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lg Work'), ['action' => 'delete', $lgWork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lgWork->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lg Work'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lg Work'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lgWork view large-9 medium-8 columns content">
    <h3><?= h($lgWork->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Member') ?></th>
            <td><?= $lgWork->has('member') ? $this->Html->link($lgWork->member->name, ['controller' => 'Members', 'action' => 'view', $lgWork->member->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lgWork->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($lgWork->time) ?></td>
        </tr>
    </table>
</div>
