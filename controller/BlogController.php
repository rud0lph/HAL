<?php
/**
 * A blog controller to display a blog-like list of all content labelled as "post".
 * 
 * @package HalCore
 */
class BlogController extends Controller implements IController {


  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }


  /**
   * Display all content of the type "post".
   */
  public function Index() {
    $content = new ContentModel();
    $this->views->SetTitle('Blog')
                ->AddInclude(HAL_INSTALL_PATH. '/view/blog.tpl.php', array(
                  'contents' => $content->ListAll(array('type'=>'post', 'order-by'=>'title', 'order-order'=>'DESC')),
                ));
  }


} 