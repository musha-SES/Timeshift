<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AtWork[]|\Cake\Collection\CollectionInterface $atWork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New At Work'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="atWork index large-9 medium-8 columns content">
    <h3><?= __('At Work') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('member_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($atWork as $atWork): ?>
            <tr>
                <td><?= $this->Number->format($atWork->id) ?></td>
                <td><?= h($atWork->time) ?></td>
                <td><?= $atWork->has('member') ? $this->Html->link($atWork->member->name, ['controller' => 'Members', 'action' => 'view', $atWork->member->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $atWork->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $atWork->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $atWork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atWork->id)]) ?>
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
