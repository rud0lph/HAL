#HAL 

Hal is a PHP-based, MVC-inspired CMF based on the framework Lydia.

It is a project buildt by Tina Logan when taking the class "PHP-programming with Model View Controller (MVC) frameworks" at BTH.se

The Framework is based on the Lydia framwwork and the tutorials in below linksc (material in below links are mainly in swedish):  


http://dbwebb.se/lydia/current (try out the code)  
http://dbwebb.se/f/123 (forum with some tutorials on how the code was built, only in swedish)

####License
HAL is licenses according to MIT-license. Any included external modules are subject to their own licensing.




##INSTALL HAL

####Download
You can download HALfrom GitHub --> <code>git clone git://github.com/tinalogan/HAL.git</code>  
You can review its source directly on GitHub: https://github.com/tinalogan/HAL

####Installation
After you have downloaded HAL you have to make the data directory writable.  
<code>chmod 777 hal/application/data</code>

After you succesfully installed HAL on your domain point your browser to where you installed HAL.  
Here you should be able to see the IndexController, if not you might need to do some modifications in your .htaccess file.

For example, in order for it to work on the BTH student server you need something like this:

<code>
<IfModule mod_rewrite.c>  
  RewriteEngine on  
  # Must use RewriteBase on www.student.bth.se, Rewritebase for url /~mos/test is /~mos/test/  
  RewriteBase /~mydomain/installationpath/  
  RewriteCond %{REQUEST_FILENAME} !-f  
  RewriteCond %{REQUEST_FILENAME} !-d  
  RewriteRule (.*) index.php/$1 [NC,L]  
</IfModule>     
</code>


The default .htaccess file for HAL is:

<code>
RewriteEngine on  
RewriteCond %{REQUEST_FILENAME} !-f  
RewriteCond %{REQUEST_FILENAME} !-d  
RewriteRule (.*) index.php/$1 [NC,L]  
AddHandler application/x-httpd-php53 .php  
</code>

The last part is for my web hotel to know that I use php5.3, you might not need that part.


Now it's time to install some of the modules in HAL.  
Either click the link  module/install on the IndexController site (index age for HAl)
or point your browser to http://mydomain.com/modules/install


####All done? Sucess? Cool.
Now you should configure HAL and customize it.  
The configuration file can be found in application/config.php.  
There you can find more info on what and how you can config HAL.


Hal has an example, CCMycontroller under application/core and also a example theme under application/mytheme  
Point to your new theme in application/config.php. Take a look at config.php and the example Controller   
and example theme and make your way from there. It is recommended that you make your own theme instead of   
changing the default.

####Configure theme paths and settings of logo, title navbar, footer etc


In application/config.php you can change logo, title, footer, navigation menu.  
You'll find the code in the bottom of the file.   
Look at the example and read the comments in the config-file. It should look something like this  


<b>Example from config.php</b>  

<code>
$hal->config['menus'] = array(  
  'my-navbar' => array(  
    'home'      => array('label'=>'Home', 'url'=>'home'),  
    'modules'   => array('label'=>'Modules', 'url'=>'module'),  
    'content'   => array('label'=>'Content', 'url'=>'content'),  
    'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),  
    'blog'      => array('label'=>'Blog', 'url'=>'blog'),  
  ),  
  // This is an other menu that can override the first one, configure it the way you want it  
  /*'my-navbar' => array(  
    'home'      => array('label'=>'About Me', 'url'=>'my'),  
    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),  
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),  
  ),*/  
);
</code>

<code>
$hal->config['theme'] = array(  
  //'path'            => 'application/themes/mytheme', <-- example of own theme, if you use this comment out the other 'path' parameter  
  'path'            => 'themes/default',  
  'parent'          => 'themes/default', //parent theme that your own theme might inherit from  
  'stylesheet'  => 'style.css', //The main style sheet   
  'bsrestyle' =>  'bootstrap/css/bootstrap-responsive.css', //bootstrap-repsponive stylesheet  
  'template_file'   => 'index.tpl.php',  
  'regions' => array('navbar', 'flash','featured-first','featured-middle','featured-last',  
    'primary','sidebar','triptych-first','triptych-middle','triptych-last',  
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',  
    'footer',  
  ),  
  'menu_to_region' => array('my-navbar'=>'navbar'),  
  'data' => array(  
    'header' => 'HAL',  
    'slogan' => 'A PHP-based MVC-inspired CMF',  
    'favicon' => 'logo_80x80.png',  
    'logo' => 'logo_80x80.png',  
    'logo_width'  => 40, //default 40 in order to fit with the default twitter bootstrap nav-bar  
    'logo_height' => 40, //default 40 in order to fit with the default twitter bootstrap nav-bar  
    'footer' => 'Hal &copy; by Tina Logan (based on Lydia &copy; by Mikael Roos)', //Change footer text here  
  ),  
</code>

####Login, create and modify user 

Login, create and modify user via the menu in the top right corner or go to http://mydomain.com/user  
If you successfully installed the modules you should be able to log in using root/root or doe/doe.  
You can also create a new user, navigate to http://mydomain.com/user/create  
View your user profile: http://mydomain.com/user/profile  

Do you use gravatar? If so, and it is connected to the email you registered your new user with,  
it should display in the top right corner. Pretty cool huh?  
Visit gravatar.com to create your own gravatar and learn more.


Create a new user and/or login and then visit content (i.e. http://mydomain.com/content)  
to view and modify the sample content. 

####Create new content

To create new content go to http://mydomain.com/content, then click Create new content.


<b>Title</b> should be a title of the post, <i>i.e "I love HAL!"</i>  
<b>Key</b> is a version of the title in lowercase letters and dashes, i.e. <i>"i-love-hal"</i>    
<b>Content</b> is your entire blog post. Type in whatever.  
<b>Type</b> set to <i>post</i> for blog entry and <i>page</i> for regular page.    
<b>Filter</b> options are <i>plain, htmlpurify and bbcode.</i>    



####Use of external libraries
HAL uses external libraries for state of the art samples.  
Any external module can be replaced or removed for less features but without disturbing the Hal core functionality.

The following external modules are included in Hal.

####HTMLPurifier

HTMLPurifier by Edward Z. Yang to filter & format HTML.  
Website: http://htmlpurifier.org/ Version: 4.4.0 (2012-01-18)    
License: LGPL Lydia path: src/CHTMLPurifier Used by: CMContent  


####Twitter Bootstrap
By Twitter, http://twitter.github.com/bootstrap/  
Code licensed under Apache License v2.0, documentation under CC BY 3.0.  
Glyphicons Free licensed under CC BY 3.0.  


###Have fun and enjoy!
