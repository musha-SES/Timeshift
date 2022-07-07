<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lgwork $lgwork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lgwork'), ['action' => 'edit', $lgwork->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lgwork'), ['action' => 'delete', $lgwork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lgwork->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lgwork'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lgwork'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lgwork view large-9 medium-8 columns content">
    <h3><?= h($lgwork->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Member') ?></th>
            <td><?= $lgwork->has('member') ? $this->Html->link($lgwork->member->name, ['controller' => 'Members', 'action' => 'view', $lgwork->member->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lgwork->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($lgwork->time) ?></td>
        </tr>
    </table>
</div>
