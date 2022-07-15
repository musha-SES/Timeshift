<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>

        <li><?= $this->Html->link(__('ユーザーリスト'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('登録内容の変更'), ['action' => 'edit', $member->id]) ?> </li>
        <li><?= $this->Html->link(__('社員の新規登録'), ['action' => 'add']) ?> </li>
        <li><?= $this->Form->postLink(__('社員の削除'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?> </li>
        <?php if($checkout == ''):?>
            <li><?= $this->Html->link(__('退勤打刻'), ['controller' => 'Works', 'action' => 'taikin',$wid]) ?></li>
            <?php else: ?>
                <li><?= $this->Html->link(__('出勤打刻'), ['controller' => 'Works', 'action' => 'add']) ?></li>
        <?php endif; ?>

    </ul>
</nav>
<div class="members view large-9 medium-8 columns content">
    <h3><?= h($member->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('氏名') ?></th>
            <td><?= h($member->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($member->id) ?></td>
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
        <tr>
            <th scope="row"><?= __('登録日時') ?></th>
            <td><?= h($member->created) ?></td>
        </tr>
    </table>
    <div class="related">


        <h4><?= __('Related Works') ?></h4>
        <?php if (!empty($member->works)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('出勤') ?></th>
                <th scope="col"><?= __('退勤') ?></th>
                <th scope="col" class="actions"><?= __('編集') ?></th>
            </tr>
            <?php foreach (array_reverse($member->works) as $works): ?>
            <tr>
                <td><?= h($works->check_in) ?></td>
                <td><?= h($works->check_out) ?></td>

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
