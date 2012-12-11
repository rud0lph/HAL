<!doctype html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title><?=$title?></title>
  <link rel='stylesheet' href='<?=$stylesheet?>'/>
</head>
<body>
	<div id='container'>
      <div id='header'>
        	
      <div id='login-menu'>
        <?=login_menu()?>
      </div>
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
	<?=get_debug()?>
      </div>
 	</div>
</body>
</html> 
