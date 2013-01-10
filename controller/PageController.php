<?php
/**
 * A page controller to display a page, for example an about-page, displays content labelled as "page".
 * 
 * @package HalCore
 */
class PageController extends Controller implements IController {


  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }


  /**
   * Display an empty page.
   */
  public function Index() {
    $content = new ContentModel();
    $this->views->SetTitle('Page')
                ->AddInclude(HAL_INSTALL_PATH. '/view/page.tpl.php', array(
                  'content' => null,
                ));
  }


  /**
   * Display a page.
   *
   * @param $id integer the id of the page.
   */
  public function View($id=null) {
    $content = new ContentModel($id);
    $this->views->SetTitle('Page: '.htmlEnt($content['title']))
                ->AddInclude(HAL_INSTALL_PATH. '/view/page.tpl.php', array(
                  'content' => $content,
                ));
  }


} 