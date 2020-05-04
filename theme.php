<?php
/**
 * Bootstrap 4 Theme for e107 v2.3.0+
 */

if (!defined('e107_INIT')) { exit; }

// doesn't work in construct, tested
e107::lan('theme'); 
e107::meta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');

// it can't be in construct, because nexprev doesn't work then  
define("BOOTSTRAP", 4);   

// $no_core_css doesn't work       
//define("CORE_CSS", false);
define("CORE_CSS", false); 

e107::css('url', 		'https://fonts.googleapis.com/css?family=Montserrat:400,700');
e107::css('url', 		'https://fonts.googleapis.com/css?family=Kaushan+Script');
e107::css('url', 		'https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic');
e107::css('url', 		'https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700');
e107::css('theme', 	'css/styles.css');
 
 
//e107::css("theme", "css/custom.css" );
 
/* originally hardcoded in style.css NEED BE CHECKED */
$headerbackground = e107::pref('theme', 'headerbackground', FALSE); 
if($headerbackground) 
{
	$headerbackground = e107::getParser()->replaceConstants($headerbackground);
	$inlinecss1  = 'header {   background-image: url('.$headerbackground.') }';
	e107::css("inline", $inlinecss1);
}

$imagepath = e_THEME_ABS.'agency2/install/';

////////////////////////////////////////////////////////////////////////////////
class theme implements e_theme_render
{

	function __construct() {

		
		e107::js("theme", 	'js/bootstrap.bundle.min.js', 'jquery');
		e107::js("theme", 	'js/jquery.easing.min.js', 'jquery');

		e107::js("theme", 	'js/scripts.js', 'jquery'); 
		e107::js("theme", 	'custom.js', 'jquery'); 
		$no_core_css = TRUE;
		$this->getInlineCodes();

		/*
		if(e_PAGE == 'login.php') {
		
			define('e_IFRAME','0');  
		
		}
		*/

	}

	function getInlineCodes() 
	{
		$inlinecss = e107::pref('theme', 'inlinecss', FALSE);
		if($inlinecss) { 
			e107::css("inline", $inlinecss);
		}
		$inlinejs = e107::pref('theme', 'inlinejs');
		if($inlinejs) { 
			e107::js("footer-inline", $inlinejs);
		}

	}

	/**
     * @param string $caption
     * @example  []Heading 1
     * @example  [Heading2] 
     * @return empty string if correct syntax is used
     */
    function checkcaption( $caption ) 
    {
    	// get rid of any leading and trailing spaces
    	$title = trim( $caption );
    	// check the first and last character, if [ and ] set the title to empty  - this always doesn't work because admin stuff in captions
    	if ( $title[0]== '[' && $title[strlen($title) - 1] == ']' ) $title = '';   
    	// so just put [] at the beginning of menu title
    	if ( $title[0]== '[' && $title[1] == ']' ) $title = '';  
    	return $title;
	}

	/**
	 * @param string $text
	 * @return string without p tags added always with bbcodes
	 * note: this solves W3C validation issue and CSS style problems
	 * use this carefully, mainly for custom menus, let decision on theme developers
	 */

	function remove_ptags($text = '') // FIXME this is a bug in e107 if this is required.
	{

		$text = str_replace(array("<!-- bbcode-html-start --><p>", "</p><!-- bbcode-html-end -->"), "", $text);

		return $text;
	}

	
	/**
	 * @param string $caption
	 * @param string $text
	 * @param string $id : id of the current render
	 * @param array $info : current style and other menu data.
	 */
	function tablestyle($caption, $text, $mode = '', $data = array())
	{

		$style = varset($options['setStyle'], 'default');
		
		//this should be displayed only in e_debug mode
		
		echo "\n<!-- tablestyle initial:  style=" . $style . "  mode=" . $mode . "  UniqueId=" . varset($options['uniqueId']) . " -->\n\n";
        

        switch($mode) 
        {
          	case "wmessage":
          	case "wm":
          		$style = "wm";
			break;
			case "lastseen":
			case "news_categories_menu":
			case "news_months_menu":
			case "comment_menu":
			case "login":
			case "news-archive-menu":
				$style = "cardmenu";
			break;

		}

 
		echo "\n<!-- tablestyle:  style=" . $style . "  mode=" . $mode . "  UniqueId=" . varset($options['uniqueId']) . " -->\n\n";

		echo "\n<!-- \n";

		echo json_encode($options, JSON_PRETTY_PRINT);

		echo "\n-->\n\n";

		switch($style)
		{
 
			case "section":
				echo '<section>
				<div class="container">';
					if(!empty($caption))
					{
						echo '<div class="row">
							<div class="col-lg-12 text-center">
								<h2 class="section-heading">'.$caption.'</h2>';
						if(!empty($info['title'])) // see $ns->setContent();
						{
							echo '<h3 class="section-subheading text-muted">'.$info['title'].'</h3>';
						}
						echo '</div></div>';
					}
					echo $text;

				echo "</div></section>";
			break;
			case "contact":
				echo '<div class="col-lg-12 text-center">
				<h2 class="section-heading">'.$caption.'</h2>
				<h3 class="section-subheading text-muted">'.e107::pref('theme', 'contactsubtitle','').'</h3>
					</div>';

				echo '
				<div class="row">
					<div class="col-lg-8 mx-auto text-center"> '.$text.'
					</div>
				</div>';			
			break;
			case "footer":
				echo '<h3>'.$caption.'</h3>'.$text;
			break;
			case 'menu':
				echo '<div class="card my-4">
	            <h5 class="card-header">'.$caption.'</h5>
	            <div class="card-body">
	              '.$text.'
	            </div>
	          </div>';
			break;
			case 'portfolio':
				echo '
				<div class="col-lg-4 col-md-4 col-sm-6">
				   '.$text.'
			   </div>';
			break;
			case 'notitle':
				echo $text;
			break;
			case 'notags':
			case 'bare':	
				echo  $this->remove_ptags($text) ;
				return;
			break;
			/* used name cardmenu to have option to use other card styles */
			case 'cardmenu':
				echo '<div class="card my-4">';
				if(!empty($caption))
				{
					echo '<h5 class="card-header">'.$caption.'</h5>';
				}
				//echo '<div class="card-body">';
				echo $text;	
				//echo '</div>';
				echo '</div>';
				break;
			case "default" :
				if(!empty($caption))
				{
					echo '<h3 class="text-heading">' . $caption . '</h3>';
				}
				echo $text;
				break;

			default:
			if(!empty($caption))
			{
				echo '<h2 class="caption">'.$caption.'</h2>';
			}
			echo $text;
			return;	
		}

	}

}
 
 