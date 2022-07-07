<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atwork $atwork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Atwork'), ['action' => 'edit', $atwork->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Atwork'), ['action' => 'delete', $atwork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atwork->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Atwork'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atwork'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atwork view large-9 medium-8 columns content">
    <h3><?= h($atwork->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Member') ?></th>
            <td><?= $atwork->has('member') ? $this->Html->link($atwork->member->name, ['controller' => 'Members', 'action' => 'view', $atwork->member->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($atwork->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($atwork->time) ?></td>
        </tr>
    </table>
</div>
