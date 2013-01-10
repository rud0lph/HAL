<!doctype html>
<html lang='en'> 
<head>
  <meta charset='utf-8'/>
  <title><?=$title?></title>
  <link rel='shortcut icon' href='<?=theme_url($favicon)?>'/>
    <!-- Le styles -->
  <link rel='stylesheet' href='<?=theme_url($stylesheet)?>'/>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link rel='stylesheet' href='<?=theme_url($bsrestyle)?>'/>
 
</head>


  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
        
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            </a>
          	<a class="brand pull-left" href='<?=base_url()?>'><img src='<?=theme_url($logo)?>' alt='logo' width='<?=$logo_width?>' height='<?=$logo_height?>'/ ><?=$header?></a>
          
          	<div class="nav-collapse collapse">
            	<ul class="nav">
              		<li <?php if (current_url() == base_url()) {echo 'class="active"';} ?>><a href=<?=base_url()?>>Home</a></li>
              		<li <?php if (current_url() == base_url() . "content") {echo 'class="active"';} ?>><a href="<?=base_url()?>content">Content</a></li>
              		<li <?php if (current_url() == base_url() . "guestbook") {echo 'class="active"';} ?>><a href="<?=base_url()?>guestbook">Guestbook</a></li>
            	</ul>
           <form class="navbar-form pull-right">
            <?=login_menu()?>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <?php if(region_has_content('navbar')): ?>
      <div id='navbar'><?=render_views('navbar')?></div>
      <?php endif; ?>
     
      <!-- Region 1, "flash", kollar om den har ett innehåll, om ja visa om nej, visa inte -->
      <?php if(region_has_content('featured-first')): ?>
      <div class="hero-unit">        
           <?=render_views('flash')?>
     
      </div>
	  <?php endif; ?>
      
      <!-- Example row of columns -->
      <?php if(region_has_content('featured-first', 'featured-middle', 'featured-last')): ?>         
      <div class="row">
        <div class="span4">
          <?=render_views('featured-first')?>
        </div>
        <div class="span4">
          <?=render_views('featured-middle')?>
       </div>
        <div class="span4">
          <?=render_views('featured-last')?>
        </div>
      </div>
	  <?php endif; ?>
      
      <!-- Region 5, 6 "primary", "sidebar" - VISAS ALLTID -->
       <div class="row">
           <div class="span8" >
          	<section>
                <?=get_messages_from_session()?><?=@$main?> <!-- Hämta ev meddelanden -->
                <?=render_views('primary')?><?=render_views()?> 
          	</section>	
           </div>
           
           <div class="span4">  
           	<section>            	
            	<?=render_views('sidebar')?>
           	</section>
           </div>
        </div>
        
        <!-- Region 7, 8, 9 "triptych-", - kollar om de har ett innehåll, om ja visa om nej, visa inte -->
	<?php if(region_has_content('triptych-first', 'triptych-middle', 'triptych-last')): ?>
    <div class="row">
        <div class="span4">
        	<?=render_views('triptych-first')?>
        </div>
        <div class="span4">
        	<?=render_views('triptych-middle')?>
        </div>
        <div class="span4">
			<?=render_views('triptych-last')?>
      </div>
    </div>
    <?php endif; ?>
        

      <hr>

     <footer>
<!-- Region 10, 11, 12 "footer-column-", - kollar om de har ett innehåll, om ja visa om nej, visa inte -->
	  <?php if(region_has_content('footer-column-one', 'footer-column-two', 'footer-column-three', 'footer-column-four')): ?>
        <div class="row">
            <div class="span3">
                <?=render_views('footer-column-one')?>
            </div>
            <div class="span3">
                <?=render_views('footer-column-two')?>
            </div>
            <div class="span3">
                <?=render_views('footer-column-three')?>
            </div>
            <div class="span3">
                <?=render_views('footer-column-four')?>
            </div>
        </div>
      <?php endif; ?>
  
 <!-- Region 13 "footer", -  , - visas alltid -->
  		<div class="row">
  			<div class="span12">
    			<?=render_views('footer')?><?=$footer?><?=get_tools()?><?=get_debug()?>
  			</div>
		</div>
      </footer>

    </div> <!-- /container -->
     <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
       
  </body>
</html>
