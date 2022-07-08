<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Working[]|\Cake\Collection\CollectionInterface $working
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Working'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="working index large-9 medium-8 columns content">
    <h3><?= __('Working') ?></h3>
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
            <?php foreach ($working as $working): ?>
            <tr>
                <td><?= $this->Number->format($working->id) ?></td>
                <td><?= h($working->check_in) ?></td>
                <td><?= h($working->check_out) ?></td>
                <td><?= $working->has('member') ? $this->Html->link($working->member->name, ['controller' => 'Members', 'action' => 'view', $working->member->id]) : '' ?></td>
                <td><?= h($working->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $working->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $working->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $working->id], ['confirm' => __('Are you sure you want to delete # {0}?', $working->id)]) ?>
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
