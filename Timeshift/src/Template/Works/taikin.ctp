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
        <?= $time; ?>
        <!-- <p id="RealtimeClockArea2"></p> -->
        <?php
            echo $this->Form->hidden('check_in', ['empty' => true]);
            echo $this->Form->hidden('check_out', ['value' => $time]);
            echo $this->Form->hidden( 'member_id' ,['value'=> $aid ]) ;
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    function set2fig(num) {
   // 桁数が1桁だったら先頭に0を加えて2桁に調整する
   var ret;
   if( num < 10 ) { ret = "0" + num; }
   else { ret = num; }
   return ret;
}
function showClock2() {
   var nowTime = new Date();
   var nowHour = set2fig( nowTime.getHours() );
   var nowMin  = set2fig( nowTime.getMinutes() );
   var nowSec  = set2fig( nowTime.getSeconds() );
   var msg = "現在時刻は、" + nowHour + ":" + nowMin + ":" + nowSec + " です。";
   document.getElementById("RealtimeClockArea2").innerHTML = msg;
}
setInterval('showClock2()',1000);
</script>
