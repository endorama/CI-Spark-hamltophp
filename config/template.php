<?php

/*----------------------------------------------------------------------
 * Add this lines to the end of application/config/template.php
 *--------------------------------------------------------------------*/

// Added by Haml-To-Php binder
$config['active_template'] = 'haml';

$config['haml']['template'] = 'template.haml';
$config['haml']['regions'] = array(
   'header',
   'content',
   'sidebar',
   'footer',
);
$config['haml']['parser'] = 'hamltophp';
$config['haml']['parser_method'] = 'parse';
$config['haml']['parse_template'] = TRUE;

