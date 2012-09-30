# Note

**NOTE**: Haml-To-Php does not exists anymore. This spark will be left for instructional purpose only. "

# What is

A CodeIgniter Spark to integrate Haml-To-Php library into CodeIgniter.
Installable via Sparks system ( [http://getsparks.org](http://getsparks.org GetSparks) )

# Why

Mainly because `haml_sass` spark is based on phamlp, which has some serious
bugs and is very limited in parsing HAML. You need to use some code conventions
which are not of HAML but are needed by phamlp to work properly. And I do not
like this.
Haml-To-Php instead is fully compliant with HAML language specs ( passes all the
test of the ruby gem ).

# Setup

First of all you must install the spark:  
`php tools/spark install hamltophp`  

Then you need to download the Haml-To-Php library. Is developed by 
Marc Weber, and is actively developed ( he replies at mails very quickly! ).
[http://haml-to-php.com](http://haml-to-php.com "Haml-To-Php") 

In `application/config/autoload.php` add `hamltophp/x.x.x` to `$autoload['sparks']`.

That's it! Now Haml Spark is available

## Usage example standalone

Inside a controller you can use a function similar to this:  

    public function onlyhaml()  {
      // Hamltophp->parse ( $template file, $variable passed to view )
      echo $this->hamltophp->parse("template.haml", array(
        "content" => "this is the content",
        "sidebar" => "this is the sidebar",
      ));
    }

# Usage with CI Template Class

Actually this Spark is very easy to use with the CI Template Class developed
by Colin Williams. His Class has a very nice hook to add custom parsers for views
and this makes very easy to add hamltophp parser to CI.

To do this simply add this code in the `application/config/template.php` file
used by CI Template Class to defined the parser to use:  
    // Added by Haml-To-Php Spark
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

This lines tells the Template class to use `Hamltophp->parse()` to parse
template files instead of the CI Parser class. Also enable parsing of the
mail template file, so that a `template.haml` file is usable inside the
views folder as main template file.

## Usage example with CI Template Class

    public function haml()  {
      $data = array(
        "title" => "title added by me",
        'stuff' => 'things'
      );
        
      // remember to use Template->parse_view() to parse view file instead of write/write_view
      $this->template->parse_view('content', 'content.haml', $data);
      $this->template->parse_view('sidebar', 'sidebar.haml', $data);

      $this->template->render(); // Just render the 'content' region
    }

# Dependencies

CodeIgniter Template Class ( by Colin Williams ) _this is optional_
[http://williamsconcepts.com/ci/codeigniter/libraries/template/](http://williamsconcepts.com/ci/codeigniter/libraries/template/ "CI Template Class")

Haml To Php Library ( by Marc Weber ) _this is required ( see setup )_
[http://haml-to-php.com](http://haml-to-php.com "Haml-To-Php") 

