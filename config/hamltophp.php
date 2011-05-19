<?php
/*
 *  HAML language reference options
 *  See http://haml-lang.com/docs/yardoc/file.HAML_REFERENCE.html
 */

/*  Determines the output format. Default is XHTML 1.0
 *  Options:
 *    - xhtml ( default )
 *    - html4
 *    - html5
 */
$config["format"] = "xhtml";

/*  Sets whether or not to escape HTML-sensitive characters in script. 
 *  If this is true, = behaves like &=; otherwise, it behaves like !=. 
 *  Note that if this is set, != should be used for yielding to subtemplates
 *  and rendering partials.
 */
$config["escape_html"] = TRUE;

/*  If set to true, Haml makes no attempt to properly indent or format 
 *  the HTML output. This significantly improves rendering performance 
 *  but makes viewing the source unpleasant.
 */
$config["htp_ugly"] = TRUE;

/*  Whether or not attribute hashes and Ruby scripts designated by = or 
 *  ~ should be evaluated. If this is true, said scripts are rendered as
 *  empty strings.
 */
$config["suppress_eval"] = FALSE;

/*  The character that should wrap element attributes. This defaults to 
 *  ' (an apostrophe). Characters of this type within the attributes will
 *  be escaped (e.g. by replacing them with &apos;) if the character is 
 *  an apostrophe or a quotation mark.
 */
$config["attr_wrapper"] = "'";

/*  A list of tag names that should be automatically self-closed if they
 *  have no content. This can also contain regular expressions that match
 *  tag names.
 */
$config["autoclose"] = array('meta','img','link','br','hr','input','area','param','col','base');

########################################################################
/*
 *  Haml-To-Php options
 */

/*  Enable cache for parsed haml? If yes all the parsed haml files will
 *  be saved as php files in the cache folder
 */ 
$config["htp_cache"] = TRUE;

/*  The cache directory in which haml parsed file will be saved.
 */
$config["htp_cache_dir"] = APPPATH . "cache";

/*  The directory in which haml files will be
 */
$config["htp_haml_dir"] = APPPATH . "views";

/*  Bind a function to a filter usable in HAML files
 *
 *  plain, javascript, css, cdata, escaped, php, preserve are binded.
 *  To override options or to add filter, simply add a new array item:
 *  'filter_name' => 'filter_function'
 */ 
$config["filters"] = array(
  'plain' => 'HamlUtilities::plain',
  'javascript' => 'HamlUtilities::javascript',
  'css' => 'HamlUtilities::css',
  'cdata' => 'HamlUtilities::cdata',
  'escaped' => 'HamlUtilities::escaped',
  'php' => 'HamlUtilities::php',
  'preserve' => 'HamlUtilities::preserve',
);
