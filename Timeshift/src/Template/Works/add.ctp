<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Works $works
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Works'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Members'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member'), ['controller' => 'Members', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="works form large-9 medium-8 columns content">
    <?php $username = $this->request->getSession()->read('Auth.User.name');
    $id = $this->request->getSession()->read('Auth.User.id');
    // $checkin = $works->check_in;
    // print_r($work);
    // echo ($work);
    $checkin='';
        foreach($work as $w){
            // echo $work->check_in;
            if($w->created == $date){
                $checkin= $w->check_in;
            echo $w->created;
            echo '<br>';
        }
        }
        echo $checkin;
    echo $username; ?>
    <?= $this->Form->create($works) ?>
    <fieldset>
        <legend><?= __('Add Works') ?></legend>
        <?php
        if($checkin !== ''){
            // echo $this->Form->control('check_in');
            echo $this->Form->control('check_in',["dateFormat" => "yyyy-MM-dd HH:mm:ss",
            'default'=> date($checkin)]);
        }else{
            echo $this->Form->control('check_in',array('default'=>date($time)));
        }
            echo $this->Form->control('check_out',array('default'=>date($time->modify('+9 hour'))));
            echo $this->Form->hidden( 'member_id' ,['value'=> $id ]) ;
            // echo $this->Form->hidden( 'created' ,['value'=> $date ]) ;
            // echo $this->Form->control('member_id', ['options' => $members]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
