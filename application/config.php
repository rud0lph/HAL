<?php
/**
 * Site configuration, this file is changed by user per site.
 *
 */

/**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);


/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$hal->config['debug']['hal'] = false;
$hal->config['debug']['session'] = false;
$hal->config['debug']['timer'] = true;
$hal->config['debug']['db-num-queries'] = true;
$hal->config['debug']['db-queries'] = true;

/**
* Set database(s).
*/
$hal->config['database'][0]['dsn'] = 'sqlite:' . HAL_SITE_PATH . '/data/.ht.sqlite';

/**
 * What type of urls should be used?
 * 
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$hal->config['url_type'] = 1;


/**
 * Set a base_url to use another than the default calculated
 */
$hal->config['base_url'] = null;


/**
 * How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
 */
$hal->config['hashing_algorithm'] = 'sha1salt';


/**
 * Allow or disallow creation of new user accounts.
 */
$hal->config['create_new_users'] = true;


/**
 * Define session name
 */
$hal->config['session_name'] = preg_replace('/[:\.\/-_]/', '', __DIR__);
$hal->config['session_key']  = 'hal';


/**
 * Define default server timezone when displaying date and times to the user. All internals are still UTC.
 */
$hal->config['timezone'] = 'Europe/Stockholm';


/**
 * Define internal character encoding
 */
$hal->config['character_encoding'] = 'UTF-8';


/**
 * Define language
 */
$hal->config['language'] = 'en';


/*
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is 
 * DeveloperController and call the method "dump" in that class. This process is managed in:
 * $hal->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$hal->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'IndexController'),
  'developer' => array('enabled' => true,'class' => 'DeveloperController'),
  'theme'     => array('enabled' => true,'class' => 'ThemeController'),
  'guestbook' => array('enabled' => true,'class' => 'GuestbookController'),
  'content'   => array('enabled' => true,'class' => 'ContentController'),
  'blog'      => array('enabled' => true,'class' => 'BlogController'),
  'page'      => array('enabled' => true,'class' => 'PageController'),
  'user'      => array('enabled' => true,'class' => 'UserController'),
  'acp'       => array('enabled' => true,'class' => 'AdminPanelController'),
  'module'    => array('enabled' => true,'class' => 'ModulesController'),
  'my'        => array('enabled' => false,'class' => 'CCMycontroller'),
);

/**
* Define a routing table for urls.
*
* Route custom urls to a defined controller/method/arguments
*/
$hal->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
);


/**
 * Define menus.
 *
 * Create hardcoded menus and map them to a theme region through $hal->config['theme'].
 */
$hal->config['menus'] = array(
  'navbar' => array(
    'home'      => array('label'=>'Home', 'url'=>'home'),
    'modules'   => array('label'=>'Modules', 'url'=>'module'),
    'content'   => array('label'=>'Content', 'url'=>'content'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
    'blog'      => array('label'=>'Blog', 'url'=>'blog'),
  ),
  'my-navbar' => array(
    'home'      => array('label'=>'About Me', 'url'=>'my'),
    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
  ),
);


/**
 * Settings for the theme. The theme may have a parent theme.
 *
 * When a parent theme is used the parent's functions.php will be included before the current
 * theme's functions.php. The parent stylesheet can be included in the current stylesheet
 * by an @import clause. See site/themes/mytheme for an example of a child/parent theme.
 * Template files can reside in the parent or current theme, the Hal::ThemeEngineRender()
 * looks for the template-file in the current theme first, then it looks in the parent theme.
 *
 * There are two useful theme helpers defined in themes/functions.php.
 *  theme_url($url): Prepends the current theme url to $url to make an absolute url. 
 *  theme_parent_url($url): Prepends the parent theme url to $url to make an absolute url. 
 *
 * path: Path to current theme, relativly HAL_INSTALL_PATH, for example themes/grid or site/themes/mytheme.
 * parent: Path to parent theme, same structure as 'path'. Can be left out or set to null.
 * stylesheet: The stylesheet to include, always part of the current theme, use @import to include the parent stylesheet.
 * template_file: Set the default template file, defaults to default.tpl.php.
 * regions: Array with all regions that the theme supports.
 * menu_to_region: Array mapping menus to regions.
 * data: Array with data that is made available to the template file as variables. 
 * 
 * The name of the stylesheet is also appended to the data-array, as 'stylesheet' and made 
 * available to the template files.
 */
$hal->config['theme'] = array(
  //'path'            => 'site/themes/mytheme',
  'path'            => 'themes/grid/',
  //'parent'          => 'themes/grid/',
  'stylesheet'  => 'style.css',
  'bsrestyle' => 'css/bootstrap-responsive.css', //bootstrap-repsponive stylesheet
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
    'logo_width'  => 40,
    'logo_height' => 40,
    'footer' => '<p>Hal &copy; by Tina Logan based on Lydia &copy; by Mikael Roos (mos@dbwebb.se)</p>',
  ),
);
