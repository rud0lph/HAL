
<div class="page-header">
<?php if($content['created']): ?>
  <h1>Edit Content<small> You can edit and save this content</small></h1>
<?php else: ?>
  <h1>Create Content<small> Create new content</small></h1>
<?php endif; ?>
</div>

<!-- TODO fix form layout -->
<?=$form->GetHTML(array('class'=>'content-edit'))?>

<p>
<small><em>
<?php if($content['created']): ?>
  This content was created by <?=$content['owner']?> <?=time_diff($content['created'])?> ago.
<?php else: ?>
  Content not yet created.
<?php endif; ?>

<?php if(isset($content['updated'])):?>
  Last updated <?=time_diff($content['updated'])?> ago.
<?php endif; ?>
</em></small>
</p>
<p>
<a class="btn btn-mini" href='<?=create_url('content', 'create')?>'><i class="icon-pencil"></i> Create new</a> 
<a class="btn btn-mini" href='<?=create_url('page', 'view', $content['id'])?>'> <i class="icon-eye-close"></i> View</a>
<a class="btn btn-mini" href='<?=create_url('content')?>'> <i class="icon-eye-open"></i> View all</a> 
</p>
