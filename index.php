<?php

//
// PHASE: BOOTSTRAP
//
define('HAL_INSTALL_PATH', dirname(__FILE__));
define('HAL_SITE_PATH', HAL_INSTALL_PATH . '/application');
define('HAL_SITE_PATH', HAL_INSTALL_PATH . '/controller');

require(HAL_INSTALL_PATH.'/core/bootstrap.php');

$hal = Hal::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$hal->FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
//
$hal->ThemeEngineRender();


