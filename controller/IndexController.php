<?php
/**
 * Standard controller layout.
 * 
 * @package HalCore
 */
class IndexController extends Controller implements IController {

  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }
  

  /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {			
    $modules = new ModulesModel();
    $controllers = $modules->AvailableControllers();
    $this->views->SetTitle('Index')
                ->AddInclude(HAL_INSTALL_PATH . '/view/index.tpl.php', array(), 'primary')
                ->AddInclude(HAL_INSTALL_PATH . '/view/indexsidebar.tpl.php', array('controllers'=>$controllers), 'sidebar');
  }


} 
