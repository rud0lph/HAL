<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 
/**
* Print debuginformation from the framework.
*/
function get_debug() {
  $hal = Hal::Instance();  
  $html = null;
  if(isset($hal->config['debug']['db-num-queries']) && $hal->config['debug']['db-num-queries'] && isset($hal->db)) {
    $html .= "<p>Database made " . $hal->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($hal->config['debug']['db-queries']) && $hal->config['debug']['db-queries'] && isset($hal->db)) {
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $hal->db->GetQueries()) . "</pre>";
  }    
  if(isset($hal->config['debug']['hal']) && $hal->config['debug']['hal']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of Hal:</p><pre>" . htmlent(print_r($hal, true)) . "</pre>";
  }    
  return $html;
}


/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = Hal::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}



/**
 * Prepend the base_url.
 */
function base_url($url) {
  return Hal::Instance()->request->base_url . trim($url, '/');
}


/**
 * Return the current url.
 */
function current_url() {
  return Hal::Instance()->request->current_url;
}

/**
* Render all views.
*/
function render_views() {
  return Hal::Instance()->views->Render();
}


