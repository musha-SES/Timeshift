<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lgwork[]|\Cake\Collection\CollectionInterface $lgwork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lgwork'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lgwork index large-9 medium-8 columns content">
    <h3><?= __('Lgwork') ?></h3>
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
            <?php foreach ($lgwork as $lgwork): ?>
            <tr>
                <td><?= $this->Number->format($lgwork->id) ?></td>
                <td><?= h($lgwork->time) ?></td>
                <td><?= $lgwork->has('member') ? $this->Html->link($lgwork->member->name, ['controller' => 'Members', 'action' => 'view', $lgwork->member->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lgwork->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lgwork->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lgwork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lgwork->id)]) ?>
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
