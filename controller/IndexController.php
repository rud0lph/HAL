<?php
/**
* Standard controller layout.
* 
* @package HalCore
*/
class IndexController implements IController {

   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
      global $hal;
      $hal->data['title'] = "Welcome to HAL";
	  $hal->data['main'] = <<<EOD
<p><strong>HAL:</strong> I am putting myself to the fullest possible use, which is all I think that any conscious entity can ever hope to do. </p>
<p><a href="http://thelincolncircus.com/test/hal/source.php">View source</a></p>
<p></p>
<p></p>
          
          
            
EOD;

   }
   
  
}