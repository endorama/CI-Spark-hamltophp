<?php

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

/*  If set to true, Haml makes no attempt to properly indent or format 
 *  the HTML output. This significantly improves rendering performance 
 *  but makes viewing the source unpleasant.
 */
$config["htp_ugly"] = TRUE;
