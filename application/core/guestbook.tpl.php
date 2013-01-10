
<div class="page-header">
  <h1>My Guestbook<small> Leave a message</small></h1>
</div>


<?=$form->GetHTML()?>

<div class="page-header">
  <h2>Current messages</h2>
</div>

<?php
 foreach($entries as $val):?>
<div class = well>
  <p>
  <strong><?=htmlent($val['name'])?></strong>
  <br /><small><?=$val['created']?></small>
  </p>
  <p><?=htmlent($val['entry'])?></p>
</div>
<?php endforeach;