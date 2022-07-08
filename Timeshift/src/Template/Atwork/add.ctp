<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AtWork $atWork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List At Work'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="atWork form large-9 medium-8 columns content">
    <?= $this->Form->create($atWork) ?>
    <fieldset>
        <legend><?= __('Add At Work') ?></legend>
        <?php
            echo $time;
            echo $this->Form->input('time');
            // echo $this->Form->control('time', ['empty' => true]);
            echo $this->Form->control('member_id', ['options' => $members]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
