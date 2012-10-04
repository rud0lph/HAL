<?php
/**
* Bootstrapping, setting up and loading the core.
*
* @package HalCore
*/

/**
* Enable auto-load of class declarations.
*/
function autoload($aClassName) {
	
	//echo "File in: " . $aClassName . "<br>";
	
	//Load controllers
	if (substr($aClassName, -strlen('Controller')) === 'Controller') {
		$classFile = "/controller/{$aClassName}.php";
	//Load models
	} elseif (substr($aClassName, -strlen('Model')) === 'Model') {
		$classFile = "/model/{$aClassName}.php";
	} else {
	//Load core files
		$classFile = "/core/{$aClassName}.php"; 

	} 
	
	$file1 = HAL_INSTALL_PATH . $classFile; 		
	$file2 = HAL_SITE_PATH . $classFile;
	
   	if(is_file($file1)) {
      	require_once($file1);
   	} elseif(is_file($file2)) {
      	require_once($file2);
   	}
}
spl_autoload_register('autoload');


