<?php
/**
 * Admin Control Panel to manage admin stuff.
 * 
 * @package HalCore
 */
class AdminPanelController extends Controller implements IController {


  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }


  /**
   * Show profile information of the user.
   */
  public function Index() {
    $this->views->SetTitle('ACP: Admin Control Panel');
    $this->views->AddInclude(HAL_INSTALL_PATH . '/view/adminpanel.tpl.php');
  }
 

} 