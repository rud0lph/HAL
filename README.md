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
You can download HALfrom GitHub.

git clone git://github.com/tinalogan/HAL.git  
You can review its source directly on GitHub: https://github.com/tinalogan/HAL

####Installation
After you have downloaded HAL you have to make the data directory writable.  
chmod 777 hal/application/data

After you succesfully installed HAL on your domain point your browser to where you installed HAL.  
Here you should be able to see the IndexController, if not you might need to do some modifications in your .htaccess file.

For example, in order for it to work on the BTH student server you need something like this:


<IfModule mod_rewrite.c>  
  RewriteEngine on  
  # Must use RewriteBase on www.student.bth.se, Rewritebase for url /~mos/test is /~mos/test/  
  RewriteBase /~mydomain/installationpath/  
  RewriteCond %{REQUEST_FILENAME} !-f  
  RewriteCond %{REQUEST_FILENAME} !-d  
  RewriteRule (.*) index.php/$1 [NC,L]  
</IfModule>     



The default .htaccess file for HAL is

RewriteEngine on  
RewriteCond %{REQUEST_FILENAME} !-f  
RewriteCond %{REQUEST_FILENAME} !-d  
RewriteRule (.*) index.php/$1 [NC,L]  
AddHandler application/x-httpd-php53 .php  


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


In application/config.php you can change logo, title, footer, navigation menu.  
You'll find the code in the bottom of the file.   


Login, create and modify user via the menu in the top right corner or go to http://example.com/user  
If you successfully installed the modules you should be able to log in using root/root or doe/doe.  
You can also create a new user(go to http://example.com/user/create  
View your user profile: http://example.com/user/profile  

Do you use gravatar? If so, and it is connected to the email you registered your new user with,  
it should display in the top right corner. Pretty cool huh?  
Visit gravatar.com to create your own gravatar and learn more.


Create a new user and/or login and then visit content (i.e. http://example.com/content)  
to view and modify the sample content. 


To create new content go to http://mydomain.com/content, then click Create new content.


Title should be a title of the post, i.e "I love HAL!"  
Key is a version of the title in lowercase letters and dashes, i.e. "i-love-hal"  
Content is your entire blog post.  
Type set to post for blog entry, page for regular page.  
Filter options are plain, htmlpurify and bbcode.  




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
