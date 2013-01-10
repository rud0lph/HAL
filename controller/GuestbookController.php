<?php
/**
* A guestbook controller as an example to show off some basic controller and model-stuff.
* 
* @package HalCore
*/
class GuestbookController extends Controller implements IController {

  private $guestbookModel;
  

  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
    $this->guestbookModel = new GuestbookModel();
  }


  /**
   * Implementing interface IController. All controllers must have an index action.
   * Show a standard frontpage for the guestbook.
   */
  public function Index() {
    $this->views->SetTitle('HAL Guestbook 123');
    $this->views->AddInclude(HAL_INSTALL_PATH. '/view/guestbook.tpl.php', array(
      'entries'=>$this->guestbookModel->ReadAll(),  
      'formAction'=>$this->request->CreateUrl('guestbook/handler')
    ));
  }
  

  /**
   * Handle posts from the form and take appropriate action.
   */
  public function Handler() {
    if(isset($_POST['doAdd'])) {
	  $this->guestbookModel->Add(strip_tags($_POST['newName']), strip_tags($_POST['newEntry']));
    }
    elseif(isset($_POST['doClear'])) {
      $this->guestbookModel->DeleteAll();
    }
    elseif(isset($_POST['doCreate'])) {
      $this->guestbookModel->Init();
    }            
    $this->RedirectTo($this->request->CreateUrl($this->request->controller));
  }
  

} 
