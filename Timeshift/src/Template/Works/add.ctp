<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Works $works
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>
<div class="works form large-9 medium-8 columns content">
    <?= $this->Form->create($works) ?>
    <fieldset>
        <legend><?= __('Add Works') ?></legend>
        <?php
            echo $this->Form->control('check_in');
            echo $this->Form->control('check_out');
            echo $this->Form->control('member_id($id)', ['options' => $members]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
