<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lgwork $lgwork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lgwork'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lgwork form large-9 medium-8 columns content">
    <?= $this->Form->create($lgwork) ?>
    <fieldset>
        <legend><?= __('Add Lgwork') ?></legend>
        <?php
            echo $this->Form->control('time');
            echo $this->Form->control('member_id', ['options' => $members]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
