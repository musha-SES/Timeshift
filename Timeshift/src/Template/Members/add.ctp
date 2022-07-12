<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>

        <li><?= $this->Html->link(__('ユーザーリスト'), ['action' => 'index']) ?></li>

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
            echo $this->Form->control('gender',['options' => $gender]);
            // echo $this->Form->control('birth', ['empty' => true]);
            echo $this -> Form ->control( "birth",  [
                                            "dateFormat" => "YMD",
                                            "minYear" => date ( "Y" ) - 70,
                                            "maxYear" => date ( "Y" ) ] );

            echo $this->Form->control('address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
