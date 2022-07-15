<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($checkout == ''):?>
            <li><?= $this->Html->link(__('退勤打刻'), ['controller' => 'Works', 'action' => 'taikin',$wid]) ?></li>
            <?php else: ?>
                <li><?= $this->Html->link(__('出勤打刻'), ['controller' => 'Works', 'action' => 'add']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('ダウンロード'), ['controller' => 'Members', 'action' => 'download',$id]) ?></li>
    </ul>
</nav>
<div class="members view large-9 medium-8 columns content">
    <h3><?= h($member->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($member->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($member->email) ?></td>
        </tr>
            <tr>
            <th scope="row"><?= __('住所') ?></th>
            <td><?= h($member->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('性別') ?></th>
            <td><?= $this->Number->format($member->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('生年月日') ?></th>
            <td><?= h($member->birth) ?></td>
        </tr>

    </table>
    <div class="related">
        <h4><?= __('Related Works') ?></h4>
        <?php if (!empty($member->works)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('出勤') ?></th>
                <th scope="col"><?= __('退勤') ?></th>
                <th scope="col" class="actions"><?= __('編集') ?></th>
            </tr>
            <?php foreach (array_reverse($member->works) as $works): ?>
            <tr>
                <td><?= h($works->check_in) ?></td>
                <td><?= h($works->check_out) ?></td>
                <td class="actions">

                    <?php if($works->check_out == null): ?>
                        <!-- 退勤データがなければ退勤ボタンを表示 -->
                <?= $this->Html->link(__('退勤'), ['controller' => 'Works', 'action' => 'taikin', $works->id]) ?>
                <?php endif; ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Works', 'action' => 'edit', $works->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Works', 'action' => 'delete', $works->id], ['confirm' => __('Are you sure you want to delete # {0}?', $works->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

    <p id="RealtimeClockArea2"></p>

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
