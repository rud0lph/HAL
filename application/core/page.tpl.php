<?php if($content['id']):?>
  
  <div class="page-header">
  	<h1><?=esc($content['title'])?><small></small></h1>
  </div>

  <p><?=$content->GetFilteredData()?></p>
  <p>
  <a class="btn btn-mini" href='<?=create_url("content/edit/{$content['id']}")?>'><i class="icon-pencil"></i> Edit</a> 
  <a class="btn btn-mini" href='<?=create_url("content")?>'><i class="icon-eye-open"></i> View all</a>
  </p>
<?php else:?>
  <p>404: No such page exists.</p>
<?php endif;?>