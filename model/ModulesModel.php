<?php
/**
 * A model for managing Hal modules.
 * 
 * @package HalCore
 */
class ModulesModel extends Controller {

  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }


  /**
   * A list of all available controllers/methods
   *
   * @returns array list of controllers (key) and an array of methods
   */
  public function AvailableControllers() {	
    $controllers = array();
    foreach($this->config['controllers'] as $key => $val) {
      if($val['enabled']) {
        $rc = new ReflectionClass($val['class']);
        $controllers[$key] = array();
        $methods = $rc->getMethods(ReflectionMethod::IS_PUBLIC);
        foreach($methods as $method) {
          if($method->name != '__construct' && $method->name != '__destruct' && $method->name != 'Index') {
            $methodName = mb_strtolower($method->name);
            $controllers[$key][] = $methodName;
          }
        }
        sort($controllers[$key], SORT_LOCALE_STRING);
      }
    }
    ksort($controllers, SORT_LOCALE_STRING);
    return $controllers;
  }


  /**
   * Read and analyse all modules.
   *
   * @returns array with a entry for each module with the module name as the key. 
   *                Returns boolean false if $src can not be opened.
   */
	public function ReadAndAnalyse() {
	
	//Array to put all modules in	
	$modules = array();	
	
    //Load core dir
	$core = HAL_INSTALL_PATH.'/core';
	//Load controller dir
	$controller = HAL_INSTALL_PATH.'/controller';
	//Load model dir
	$model = HAL_INSTALL_PATH.'/model';
	//Load form dir
	$form = HAL_INSTALL_PATH.'/form';
	//Load HTMLPurifier dir
	$html = HAL_INSTALL_PATH.'/HTMLPurifier';
	
	$directories = array($core, $controller, $model, $form, $html);
	
	foreach($directories as $directory):
		if(!$dir = dir($directory)) throw new Exception('Could not open the directory.');
			while (($module = $dir->read()) !== false) {
			  if (($module != '.') && ($module != '..') && ($module != basename($_SERVER['PHP_SELF']))) {
				$module = str_replace('.php', '', $module); //Remove .php from filename
				if(class_exists($module)) {
				  $rc = new ReflectionClass($module);
				  $modules[$module]['name']          = $rc->name;
				  $modules[$module]['interface']     = $rc->getInterfaceNames();
				  $modules[$module]['isController']  = $rc->implementsInterface('IController');
				  $modules[$module]['isModel']       = preg_match('/Model/', $rc->name);
				  $modules[$module]['hasSQL']        = $rc->implementsInterface('IHasSQL');
                                  $modules[$module]['isManageable']  = $rc->implementsInterface('IModule');
				  $modules[$module]['isHalCore']   = in_array($rc->name, array('Hal', 'Database', 'Request', 'ViewContainer', 'Session', 'Controller'));
				  $modules[$module]['isHalCMF']    = in_array($rc->name, array('Form', 'Page', 'Blog', 'UserModel', 'UserController', 'ContentModel', 'ContentController', 'FormUserLogin', 'FormUserProfile', 'FormUserCreate', 'FormContent', 'HTMLPurifier'));
				}
			  }
			}
		$dir->close();
	endforeach;
    ksort($modules, SORT_LOCALE_STRING);
    return $modules;
  }
  

  /**
   * Install all modules.
   *
   * @returns array with a entry for each module and the result from installing it.
   */
  public function Install() {
    $allModules = $this->ReadAndAnalyse();
    uksort($allModules, function($a, $b) {
        return ($a == 'UserModel' ? -1 : ($b == 'UserModel' ? 1 : 0));
      }
    );
    $installed = array();
    foreach($allModules as $module) {
      if($module['isManageable']) {
        $classname = $module['name'];
        $rc = new ReflectionClass($classname);
        $obj = $rc->newInstance();
        $method = $rc->getMethod('Manage');
        $installed[$classname]['name']    = $classname;
        $installed[$classname]['result']  = $method->invoke($obj, 'install');
      }
    }
    //ksort($installed, SORT_LOCALE_STRING);
    return $installed;
  }


}
