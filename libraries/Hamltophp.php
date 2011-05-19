<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package CodeIgniter
 * @author  ExpressionEngine Dev Team
 * @copyright  Copyright (c) 2006, EllisLab, Inc.
 * @license http://codeigniter.com/user_guide/license.html
 * @link http://codeigniter.com
 * @since   Version 1.0
 * @filesource
 */

// --------------------------------------------------------------------

/**
 *  CodeIgniter Library for Haml-To-Php Haml parser
 * 
 *  This library binds the Haml parser provided by Haml-To-Php to the
 *  template engine provided by the CodeIgniter Template Class by
 *  
 *  Please install it before use this binding.
 *  
 *  Credits:
 *  - CodeIgniter Template Class ( by Colin Williams )
 *    http://williamsconcepts.com/ci/codeigniter/libraries/template/
 *  - Haml-To-php parser ( by Marc Weber )
 *    http://haml-to-php.com/
 * 
 *  @package    CodeIgniter
 *  @subpackage Libraries
 *  @category   Libraries
 * 
 *  @version    0.0.2
 *  @author     Edoardo Tenani <edoardo.tenani@gmail.com>
 *  @license    GNU Public License 2.0 or greater
 *              <http://opensource.org/licenses/gpl-2.0.php>
 *  @copyright  Copyright (c) 2011, Edoardo Tenani
 *  @link       
 */
 
define('HAMLTOPHP_VERSION', '0.0.2');
 
require_once BASEPATH . "../sparks/hamltophp/" . HAMLTOPHP_VERSION . "/vendor/haml/Haml.php";
 
class Hamltophp {
  
  /**
   *  Handles Hamltophp instances
   *
   *  @access private
   *  @var    object
   */
  private static $instance;
  
  /**
   *  Handles Haml-To-Php library parser
   * 
   *  @access public
   *  @var    object
   */
  public $parser;
  
  
  function __construct() {
    self::$instance = $this;
    
    $CI =& get_instance();
    
    $CI->config->load("hamltophp");
    
    $this->parser = new HamlFileCache($CI->config->item("htp_haml_dir"), $CI->config->item("htp_cache_dir"));
    
    if ( isset ($CI->config) && !empty($CI->config) ) {
      $this->parser->options["format"] = $CI->config->item("format");
      $this->parser->options["escape_html"] = $CI->config->item("escape_html");
      $this->parser->options["htp_ugly"] = $CI->config->item("htp_ugly");
      $this->parser->options["suppress_eval"] = $CI->config->item("suppress_eval");
      $this->parser->options["attr_wrapper"] = $CI->config->item("attr_wrapper");
      $this->parser->options["autoclose"] = $CI->config->item("autoclose");
      $this->parser->options["ugly"] = $CI->config->item("htp_ugly");
      $this->parser->options["filters"] = $CI->config->item("filters");
      $this->parser->forceUpdate = $CI->config->item("htp_cache"); 
    }
    
    $CI->load->helper("hamltophp");
    
    if ( file_exists(APPPATH . "library/Template.php") )
      $CI->load->library("template");
  }
  
/*  OBJECT FUNCTION OVERRIDE
 ************************************************/

  /**
   *  When the class is destroyed this function is called.
   *
   *  @return void
   */
  public function __destruct() {  }

  /**
   *  When an inaccesible method of the class is invoked this function
   *  is called.
   *
   *  @return void
   */
  public function __call($name, $arguments) {
        echo get_class($this)."::Error in calling object method <b>'$name'</b>"."<br>\n";
    }

  /**
   *  When an inaccesible static method of the class is invoked this
   *  function is called.
   *
   *  @return void
   */
  public static function __callStatic($name, $arguments) {
        echo get_class($this)."::Error in calling object static method <b>'$name'</b>"."<br>\n";
    }

  /**
   *  When the object is converted to a string this function is used to
   *  format the result string.
   *  Values are separated by "|". If the class var is an array, values
   *  in it will be separated by ",", or NULL if is not set.
   *  The string starts and ends with "-".
   *
   *  @access public
   *  @return a string with all class vars values separated by |
   */
  public function __toString() {    
    return NULL;
  }

/*  SET & GET FUNCTION
 ************************************************/

  /**
   *  The function set a specified class var.
   *  Is not case sensitive.
   *
   *  @access public
   *  @param  string $var the name of the var to be set
   *  @param  mixed $value the new value to set
   * 
   *  @return true
   */
  public function set($var, $value = NULL) {
    $this->{$var} = $value;
    return true;
  }

  /**
   *  The function get a specified class var.
   *  Is case sensitive.
   *
   *  @access public
   *  @param  string $var the name of the var to be get
   *
   *  @return the class var
   */
  public function get($var) {
    return $this->{$var};
  }

/*  STATIC FUNCTION
 ************************************************/
 
  /**
   *  Check if an instance of the class is available and return it.
   * 
   *  If the class has not already been initialized initialized it.
   */
  static public function get_instance()  {
    if ( !isset(self::$instance) ) {
      $c = __CLASS__;
      new $c;
    }
    return self::$instance;
  }
 
/*  PUBLIC FUNCTION
 ************************************************/

  /**
   *  Parse a Haml template and return rendered content
   * 
   *  @param  string $template the filename of the file to be parsed
   *  @param  array $data an array whit variables to be used inside the
   *    template. In the template there is not the array, but variables
   *    called like array keys.
   * 
   *  @return string the parsed HTML/PHP content
   */
  function parse($template, $data = array()) {
    return $this->parser->haml($template, $data);;
  }
  

/*  PRIVATE FUNCTION
 ************************************************/

}
?>
