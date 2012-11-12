<?php
/**
* Holding a instance of Hal to enable use of $this in subclasses.
*
* @package HALCore
*/
class Controller {

   /**
    * Members
    */
   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;

   /**
    * Constructor
    */
   protected function __construct() {
    $hal = Hal::Instance();
    $this->config   = &$hal->config;
    $this->request  = &$hal->request;
    $this->data     = &$hal->data;
	$this->db       = &$hal->db;
	$this->views    = &$hal->views;
	$this->session  = &$hal->session;
  }
  
  	/**
	 * Redirect to another url and store the session
	 */
	protected function RedirectTo($url) {
    $hal = Hal::Instance();
    if(isset($hal->config['debug']['db-num-queries']) && $hal->config['debug']['db-num-queries'] && isset($hal->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($hal->config['debug']['db-queries']) && $hal->config['debug']['db-queries'] && isset($hal->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($hal->config['debug']['timer']) && $hal->config['debug']['timer']) {
	    $this->session->SetFlash('timer', $hal->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }

}

