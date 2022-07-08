<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Working $working
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Working'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="working form large-9 medium-8 columns content">
    <?= $this->Form->create($working) ?>
    <fieldset>
        <legend><?= __('Add Working') ?></legend>
        <?php
            echo $this->Form->control('check_in', ['empty' => true]);
            echo $this->Form->control('check_out', ['empty' => true]);
            echo $this->Form->control('member_id', ['options' => $members]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
