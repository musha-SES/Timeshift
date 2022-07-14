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
                __('登録の削除'),
                ['action' => 'delete', $works->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $works->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('ユーザーリスト'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('勤怠履歴'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="works form large-9 medium-8 columns content">
    <?= $this->Form->create($works) ?>
    <fieldset>
        <legend><?= __('Edit Works') ?></legend>

        <!-- <p id="RealtimeClockArea2"></p> -->
        <?php
            echo $this->Form->control('check_in', ['empty' => true]);
            echo $this->Form->control('check_out', ['value' => $time]);
            echo $this->Form->hidden( 'member_id' ,['value'=> $aid ]) ;

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
