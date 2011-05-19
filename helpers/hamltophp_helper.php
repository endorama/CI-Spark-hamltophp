<?php

/**
 *  Calls render_partials with some default arguments
 *  
 *  @param  string $partial an haml syntax file to be rendered ( the 
 *    path of the file is automatically added based on view folder.
 *  @param  array $data additional vars to be passed to the 
 *    render_partial function to be used inside partial
 *  @param  string $ext the extension of the partial
 * 
 *  @return string the HTML+PHP rendered version of the partial
 */
function render_partial($partial, $data = array(), $ext = "haml")  {
  $haml = Hamltophp::get_instance();
  return $haml->parse($partial . "." . $ext, $data);
}

/**
 *  Grab the specified assets ( one or more )
 * 
 *  Depends from assets Spark
 */
//function assets($resource, $type) {} # not implemented yet

?>
