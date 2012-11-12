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
 * Define session name
 */
$hal->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);
$hal->config['session_key']  = 'hal';


/**
 * Define server timezone
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


/**
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
  'guestbook' => array('enabled' => true,'class' => 'GuestbookController')
);

/**
 * Settings for the theme.
 */
$hal->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'default', 
);

/**
* Set database(s).
*/
$hal->config['username'] = "thelinco_ci_admi";
$hal->config['password'] = "kl4ddk4k4";
$hal->config['dsn'] = 'mysql:host=localhost;dbname=thelinco_hal'; 

/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$hal->config['debug']['hal'] = false;
$hal->config['debug']['session'] = false;
$hal->config['debug']['timer'] = true;
$hal->config['debug']['db-num-queries'] = true;
$hal->config['debug']['db-queries'] = true;
