<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atwork[]|\Cake\Collection\CollectionInterface $atwork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Atwork'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="atwork index large-9 medium-8 columns content">
    <h3><?= __('Atwork') ?></h3>
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
            <?php foreach ($atwork as $atwork): ?>
            <tr>
                <td><?= $this->Number->format($atwork->id) ?></td>
                <td><?= h($atwork->time) ?></td>
                <td><?= $atwork->has('member') ? $this->Html->link($atwork->member->name, ['controller' => 'Members', 'action' => 'view', $atwork->member->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $atwork->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $atwork->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $atwork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atwork->id)]) ?>
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
