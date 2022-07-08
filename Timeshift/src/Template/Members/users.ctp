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
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($member->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($member->email) ?></td>
        </tr>
            <tr>
            <th scope="row"><?= __('住所') ?></th>
            <td><?= h($member->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('性別') ?></th>
            <td><?= $this->Number->format($member->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('生年月日') ?></th>
            <td><?= h($member->birth) ?></td>
        </tr>

    </table>
    <div class="related">
        <h4><?= __('Related Working') ?></h4>
        <?php if (!empty($member->working)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('出勤') ?></th>
                <th scope="col"><?= __('退勤') ?></th>
                <th scope="col" class="actions"><?= __('編集') ?></th>
            </tr>
            <?php foreach ($member->working as $workIng): ?>
            <tr>
                <td><?= h($workIng->check_in) ?></td>
                <td><?= h($workIng->check_out) ?></td>
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
