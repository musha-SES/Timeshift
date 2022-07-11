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
        <li><?= $this->Html->link(__('出退勤'), ['controller' => 'Works', 'action' => 'add']) ?></li>
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
        <h4><?= __('Related At Work') ?></h4>
        <?php if (!empty($member->works)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Check_in') ?></th>
                <th scope="col"><?= __('Check_out') ?></th>
                <th scope="col"><?= __('Member Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($member->works as $works): ?>
            <tr>
                <td><?= h($works->id) ?></td>
                <td><?= h($works->check_in) ?></td>
                <td><?= h($works->check_out) ?></td>
                <td><?= h($works->member_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Works', 'action' => 'view', $works->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Works', 'action' => 'edit', $works->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Works', 'action' => 'delete', $works->id], ['confirm' => __('Are you sure you want to delete # {0}?', $works->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?php
// $time1= $works->check_out->i18nFormat('yyyy-MM-dd HH:mm:ss');
// $time2 = $works->check_in->i18nFormat('yyyy-MM-dd HH:mm:ss');
// echo $time1;
// ?>

</div>
