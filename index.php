<?php

// Error reporting is turned up to 11 for the purposes of this demo
ini_set("display_errors",1);
ERROR_REPORTING(E_ALL);
set_exception_handler('exception_handler');

// Exception handling
function exception_handler( $exception )
{
    echo $exception->getMessage();
}

// For the demo page: create the object and store date for the header/footer
require_once '../assets/class/class.demo.inc.php';

$config = new stdClass;
$config->article = (object) array(
            'title' => 'Load the Latest Flickr Photos',
            'link' => 'http://copterlabs.com/',
            'author' => 'Jason Lengstorf',
            'date' => strtotime('7:30PM +0800 GMT December 28, 2010'),
            'description' => 'Demo for the loadFlickr jQuery plugin.'
        );
$config->demo = (object) array(
            'css' => array(
                        'assets/css/loadflickr.css',
                        'assets/js/thumbbox/css/jquery.ennui.thumbbox.css'
                    ),
            'title' => 'Demo for "' . $config->article->title . '"'
        );

$demo = Demo::create($config)->insert_header();


/*******************************************************************************
* CODE FOR THE DEMO GOES HERE
*******************************************************************************/

?>

<!-- Load jQuery -->
<script type="text/javascript"
        src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("jquery", "1");
</script>


<!-- Load the loadFlickr plugin -->
<script type="text/javascript"
        src="assets/js/jquery.loadflickr.js"></script>

<!-- Load the thumbBox plugin for the second example -->
<script type="text/javascript"
        src="assets/js/thumbbox/jquery.ennui.thumbbox.js"></script>

<h2>Templating Example</h2>

<p>A demonstration of the roll-your-own templating system by Jason Lengstorf.</p>

<h3>Example 1</h3>

<pre class="prettyprint">&lt;script type=&quot;text/javascript&quot;&gt;

    // Load a user&#39;s Flickr stream
    $(&#39;#flickr-demo-1&#39;)
        .loadFlickr({
                &quot;fullFeedUri&quot; : &quot;http://api.flickr.com/services/feeds/photoset.gne?set=72157625494585867&amp;nsid=42232251@N04&amp;lang=en-us&quot;,
                &quot;displayNum&quot; : 16
            });

&lt;/script&gt;</pre>

<ul id="flickr-demo-1">
    <li class="loading">
        <img src="assets/images/ajax-loader.gif"
             alt="Loading recent images from Flickr..." />
    </li>
</ul><!-- end #flickr-demo -->

<script type="text/javascript">

    // Load a user's Flickr stream
    $('#flickr-demo-1')
        .loadFlickr({
                "fullFeedUri" : "http://api.flickr.com/services/feeds/photoset.gne?set=72157625494585867&nsid=42232251@N04&lang=en-us",
                "displayNum" : 16
            });

</script>

<h3>Example 2</h3>

<pre class="prettyprint">&lt;script type=&quot;text/javascript&quot;&gt;

    $(&#39;#flickr-demo-2&#39;)
        .loadFlickr({
                &quot;fullFeedUri&quot; : null, // only because there are two instances
                &quot;flickrID&quot; : &quot;29080075@N02&quot;,
                &quot;displayNum&quot; : 16,
                &quot;randomize&quot; : true,
                &quot;callback&quot; : function(el){
                        $(el).thumbBox();
                    }
            });

&lt;/script&gt;</pre>

<ul id="flickr-demo-2">
    <li class="loading">
        <img src="assets/images/ajax-loader.gif"
             alt="Loading recent images from Flickr..." />
    </li>
</ul><!-- end #flickr-demo-2 -->

<script type="text/javascript">

    $('#flickr-demo-2')
        .loadFlickr({
                "fullFeedUri" : null, // only because there are two instances
                "flickrID" : "29080075@N02",
                "displayNum" : 16,
                "randomize" : true,
                "callback" : function(el){
                        $(el).thumbBox();
                    }
            });

</script>

<?php

/*******************************************************************************
* END DEMO PHP
*******************************************************************************/

$demo->insert_footer();
