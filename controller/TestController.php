<?php
/**
* Standard controller layout.
* 
* @package HalCore
*/
class TestController implements IController {
  
   /**
   * Implementing interface IController. All controllers must have an index action.
   * Show a standard frontpage for the guestbook.
   */
  public function Index() {
   	global $hal;
    $hal->data['title'] = "The Test Controller";
	$hal->data['main'] =  "Hello from test";
  }

}