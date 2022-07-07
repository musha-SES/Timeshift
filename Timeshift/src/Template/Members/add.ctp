<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Members'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List At Work'), ['controller' => 'AtWork', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New At Work'), ['controller' => 'AtWork', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lg Work'), ['controller' => 'LgWork', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lg Work'), ['controller' => 'LgWork', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="members form large-9 medium-8 columns content">
    <?= $this->Form->create($member) ?>
    <fieldset>
        <legend><?= __('Add Member') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('gender');
            echo $this->Form->control('birth', ['empty' => true]);
            echo $this->Form->control('address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
