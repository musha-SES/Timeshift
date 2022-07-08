<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('出退勤'), ['controller' => 'Working', 'action' => 'add']) ?></li>
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

    </table>
    <div class="related">
        <h4><?= __('Related At Work') ?></h4>
        <?php if (!empty($member->at_work)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col"><?= __('Member Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($member->at_work as $atWork): ?>
            <tr>
                <td><?= h($atWork->id) ?></td>
                <td><?= h($atWork->time) ?></td>
                <td><?= h($atWork->member_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AtWork', 'action' => 'view', $atWork->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AtWork', 'action' => 'edit', $atWork->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AtWork', 'action' => 'delete', $atWork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atWork->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Lg Work') ?></h4>
        <?php if (!empty($member->lg_work)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col"><?= __('Member Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($member->lg_work as $lgWork): ?>
            <tr>
                <td><?= h($lgWork->id) ?></td>
                <td><?= h($lgWork->time) ?></td>
                <td><?= h($lgWork->member_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LgWork', 'action' => 'view', $lgWork->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LgWork', 'action' => 'edit', $lgWork->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LgWork', 'action' => 'delete', $lgWork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lgWork->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
