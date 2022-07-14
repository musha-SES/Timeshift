<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Works[]|\Cake\Collection\CollectionInterface $works
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('ユーザーリスト'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('勤怠登録'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="works index large-9 medium-8 columns content">
    <h3><?= __('Works') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('check_in') ?></th>
                <th scope="col"><?= $this->Paginator->sort('check_out') ?></th>
                <th scope="col"><?= $this->Paginator->sort('member_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($works as $works): ?>
            <tr>
                <td><?= $this->Number->format($works->id) ?></td>
                <td><?= h($works->check_in) ?></td>
                <td><?= h($works->check_out) ?></td>
                <td><?= $works->has('member') ? $this->Html->link($works->member->name, ['controller' => 'Members', 'action' => 'view', $works->member->id]) : '' ?></td>
                <td><?= h($works->created) ?></td>

                <?php $id = $this->request->getSession()->read('Auth.User.id');
                    ?>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $works->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $works->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $works->id], ['confirm' => __('Are you sure you want to delete # {0}?', $works->id)]) ?>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
