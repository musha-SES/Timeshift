<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Member'), ['action' => 'edit', $member->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Member'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List At Work'), ['controller' => 'AtWork', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New At Work'), ['controller' => 'AtWork', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lg Work'), ['controller' => 'LgWork', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lg Work'), ['controller' => 'LgWork', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="members view large-9 medium-8 columns content">
    <h3><?= h($member->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($member->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($member->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($member->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($member->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($member->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $this->Number->format($member->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birth') ?></th>
            <td><?= h($member->birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($member->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Working') ?></h4>
        <?php if (!empty($member->working)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col"><?= __('Member Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($member->working as $workIng): ?>
            <tr>
                <td><?= h($workIng->id) ?></td>
                <td><?= h($workIng->time) ?></td>
                <td><?= h($workIng->member_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Working', 'action' => 'view', $workIng->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Working', 'action' => 'edit', $workIng->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Working', 'action' => 'delete', $workIng->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workIng->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
