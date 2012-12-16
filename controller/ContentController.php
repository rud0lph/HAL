<?php
/**
 * A user controller to manage content.
 * 
 * @package HalCore
 */
class ContentController extends Controller implements IController {


  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }


  /**
   * Show a listing of all content.
   */
  public function Index() {
    $content = new ContentModel();
    $this->views->SetTitle('Content Controller')
                ->AddInclude(HAL_INSTALL_PATH. '/view/content.tpl.php', array(
                  'contents' => $content->ListAll(),
                ));
  }
  

  /**
   * Edit a selected content, or prepare to create new content if argument is missing.
   *
   * @param id integer the id of the content.
   */
  public function Edit($id=null) {
    $content = new ContentModel($id);
    $form = new FormContent($content);
    $status = $form->Check();
    if($status === false) {
      $this->AddMessage('notice', 'The form could not be processed.');
      $this->RedirectToController('edit', $id);
    } else if($status === true) {
      $this->RedirectToController('edit', $content['id']);
    }
    
    $title = isset($id) ? 'Edit' : 'Create';
    $this->views->SetTitle("$title content: ".htmlEnt($content['title']))
                ->AddInclude(HAL_INSTALL_PATH. '/view/contentedit.tpl.php', array(
                  'user'=>$this->user, 
                  'content'=>$content, 
                  'form'=>$form,
                ));
  }
  

  /**
   * Create new content.
   */
  public function Create() {
    $this->Edit();
  }


  /**
   * Init the content database.
   */
  public function Init() {
    $content = new ContentModel();
    $content->Init();
    $this->RedirectToController();
  }
  

} 
