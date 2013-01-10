<?php
/**
* Holding a instance of Hal to enable use of $this in subclasses and provide some helpers.
*
* @package HalCore
*/
class Controller {

	/**
	 * Members
	 */
	protected $hal;
	protected $config;
	protected $request;
	protected $data;
	protected $db;
	protected $views;
	protected $session;
	protected $user;


   /**
    * Constructor, can be instantiated by sending in the $hal reference.
    */
   protected function __construct($hal=null) {
    if(!$hal){
      $hal = Hal::Instance();
    }
    $this->hal       = &$hal;
    $this->config   = &$hal->config;
    $this->request  = &$hal->request;
    $this->data     = &$hal->data;
    $this->db       = &$hal->db;
    $this->views    = &$hal->views;
    $this->session  = &$hal->session;
    $this->user     = &$hal->user;
  }
  

	/**
	 * Wrapper for same method in Hal. See there for documentation.
	 */
	protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->hal->RedirectTo($urlOrController, $method, $arguments);
  }


	/**
	 * Wrapper for same method in Hal. See there for documentation.
	 */
	protected function RedirectToController($method=null, $arguments=null) {
    $this->hal->RedirectToController($method, $arguments);
  }


	/**
	 * Wrapper for same method in Hal. See there for documentation.
	 */
	protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->hal->RedirectToControllerMethod($controller, $method, $arguments);
  }


	/**
	 * Wrapper for same method in Hal. See there for documentation.
	 */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->hal->AddMessage($type, $message, $alternative);
  }


	/**
	 * Wrapper for same method in Hal. See there for documentation.
	 */
	protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->hal->CreateUrl($urlOrController, $method, $arguments);
  }


}
