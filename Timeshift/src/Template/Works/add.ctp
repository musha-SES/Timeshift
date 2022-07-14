<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Works $works
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>

        <li><?= $this->Html->link(__('ユーザーリスト'), ['controller' => 'Members', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('勤怠リスト'), ['action' => 'index']) ?></li>
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
        // echo $checkin;
    echo $username; ?>

    <!-- </ul>
</nav>
<div class="works form large-9 medium-8 columns content"> -->

    <?= $this->Form->create($works) ?>
    <fieldset>
        <legend><?= __('Add Works') ?></legend>
        <p id="RealtimeClockArea2"></p>

        <?php


        // if($checkin !== ''){
        //     // echo $this->Form->control('check_in');
        //     echo $this->Form->control('check_in',["dateFormat" => "yyyy-MM-dd HH:mm:ss",
        //     'default'=> date($checkin)]);
        // }else{
            echo $this->Form->select('check_in',array('value'=>$time));
            print_r($time);
        // }
            // echo $this->Form->control('check_out',array('default'=>date($time->modify('+9 hour'))));
            echo $this->Form->hidden('check_out');

            echo $this->Form->hidden( 'member_id' ,['value'=> $id ]) ;
            // echo $this->Form->hidden( 'created' ,['value'=> $date ]) ;
            // echo $this->Form->control('member_id', ['options' => $members]);

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
