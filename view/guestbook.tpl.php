<div class="page-header">
  <h1>Guestbook Example</h1>
</div>

<h3>Welcome to Hal's Guestbook</h3>
<p>Showing how to implement a guestbook in HAL.</p>

<form action="<?=$formAction?>" method='post'>
	<fieldset>
	<label>Name</label>
    <input type="text" placeholder="Type something…" name='newName' >
    <label>Message</label>
    <textarea name='newEntry' rows="3"></textarea>
 
 	<p>
    <button type="submit" name='doAdd' class="btn">Add message</button>
    <button type="submit" name='doClear' class="btn">Clear all messages</button>
    <button type="submit" name='doCreate' class="btn">Create database table</button>
    </p>
    </fieldset>
 </form>

<p>
</p>
<div class="page-header">
  <h2>Current messages</h2>
</div>

<?php
if($entries != null) {
 foreach($entries as $val):?>
<div class = well>
  <p>
  <strong><?=htmlent($val['name'])?></strong>
  <br /><small><?=$val['created']?></small>
  </p>
  <p><?=htmlent($val['entry'])?></p>
</div>
<?php endforeach;
}
?>

