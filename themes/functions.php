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
  $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($hal->config, true)) . "</pre>";
  $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($hal->data, true)) . "</pre>";
  $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($hal->request, true)) . "</pre>";
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
