<h1>Guestbook Example</h1>
<p>Showing how to implement a guestbook in HAL. Now saving to database.</p>

<form action="<?=$formAction?>" method='post'>
  <p>
     <label>Name: <br/>
     <input type='text' name='newName' /></label>
  </p>
  <p>
    <label>Message: <br/>
    <textarea name='newEntry'></textarea></label>
  </p>
  <p>
    <input type='submit' name='doAdd' value='Add message' />
    <input type='submit' name='doClear' value='Clear all messages' />
  </p>
</form>

<h2>Current messages</h2>

<?php foreach($entries as $val):?>
<div style='background-color:#f6f6f6;border:1px solid #ccc;margin-bottom:1em;padding:1em;'>
  <p>Name: <?=htmlent($val['name'])?></p>
  <p>Time: <?=$val['created']?></p>
  <p><?=htmlent($val['entry'])?></p>
</div>
<?php endforeach;?>