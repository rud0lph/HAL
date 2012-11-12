<!doctype html>
<html lang="sv"> 
<head>
  <meta charset="utf-8">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$stylesheet?>">
</head>
<body>
	<div id ="container">
      <div id="header">
        	<?=$header?>
      </div>
      <section>
      	<div id='main' role='main'>
        	<?=get_messages_from_session()?>
      		<?=@$main?>
      		<?=render_views()?>
    	</div>     
      </section>
      <div id="footer">
        <?=$footer?>
      </div>
 	</div>
</body>
</html> 