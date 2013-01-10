<div class="page-header">
  <h1>Blog<small> Welcome to my blog</small></h1>
</div>
<?php if($contents != null):?>
  <?php foreach($contents as $val):?>
  	<div class = well well-large>
    <h3><?=esc($val['title'])?></h3>
    <p><small><em>Posted on <?=$val['created']?> by <?=$val['owner']?></em></small></p>
    <p><?=filter_data($val['data'], $val['filter'])?></p>
    <p><a class="btn btn-mini" href='<?=create_url("content/edit/{$val['id']}")?>'><i class="icon-pencil"></i> Edit</a></p>
    </div>
  <?php endforeach; ?>
<?php else:?>
  <p>No posts exists.</p>
<?php endif;?>