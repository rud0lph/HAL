<?php
/**
 * To manage and analyse all modules of Lydia.
 * 
 * @package HalCore
 */
class ModulesController extends Controller implements IController {

  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }


  /**
   * Show a index-page and display what can be done through this controller.
   */
  public function Index() {
    $modules = new ModulesModel();
    $controllers = $modules->AvailableControllers();
    $allModules = $modules->ReadAndAnalyse();
    $this->views->SetTitle('Manage Modules')
                ->AddInclude(HAL_INSTALL_PATH. '/view/modules.tpl.php', array('controllers'=>$controllers), 'primary')
                ->AddInclude(HAL_INSTALL_PATH.  '/view/modulessidebar.tpl.php', array('modules'=>$allModules), 'sidebar');
  }


  /**
   * Show a index-page and display what can be done through this controller.
   */
  public function Install() {
    $modules = new ModulesModel();
    $results = $modules->Install();
    $allModules = $modules->ReadAndAnalyse();
    $this->views->SetTitle('Install Modules')
                ->AddInclude(HAL_INSTALL_PATH . '/view/modulesinstall.tpl.php', array('modules'=>$results), 'primary')
                ->AddInclude(HAL_INSTALL_PATH . '/view/modulessidebar.tpl.php', array('modules'=>$allModules), 'sidebar');
  }


  /**
   * Show a module and its parts.
   */
  public function View($module) {
    //if(!preg_match('/^C[a-zA-Z]+$/', $module)) {throw new Exception('Invalid characters in module name.');}
    $modules = new ModulesModel();
    $controllers = $modules->AvailableControllers();
    $allModules = $modules->ReadAndAnalyse();
    $aModule = $modules->ReadAndAnalyseModule($module);
    $this->views->SetTitle('Manage Modules')
                ->AddInclude(HAL_INSTALL_PATH . '/view/modulesview.tpl.php', array('module'=>$aModule), 'primary')
                ->AddInclude(HAL_INSTALL_PATH . '/view/modulessidebar.tpl.php', array('modules'=>$allModules), 'sidebar');
  }


}
