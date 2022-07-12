<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Works $works
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $works->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $works->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Works'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="works form large-9 medium-8 columns content">
    <?= $name; ?>
    <?= $this->Form->create($works) ?>
    <fieldset>

        <legend><?= __('Edit Works') ?></legend>
        <?php
            echo $this->Form->control('check_in', ['empty' => true]);
            echo $this->Form->control('check_out', ['empty' => true]);
            echo $this->Form->hidden( 'member_id' ,['value'=> $aid ]) ;
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
