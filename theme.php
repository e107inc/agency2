<?php
/**
 * Bootstrap 4 Theme for e107 v2.x
 */
if (!defined('e107_INIT')) { exit; }

//define("BOOTSTRAP", 	3);
//define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");
 
/* @see https://www.cdnperf.com */
// Warning: Some bootstrap CDNs are not compiled with popup.js
// use https if e107 is using https.

e107::lan('theme');

// load libraries 
e107::js("theme", "vendor/popper/popper.min.js", 'jquery');

 
e107::css('url', 		'https://fonts.googleapis.com/css?family=Montserrat:400,700');
e107::css('url', 		'https://fonts.googleapis.com/css?family=Kaushan+Script');
e107::css('url', 		'https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic');
e107::css('url', 		'https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700');
 
e107::css("theme", "css/styles.css" );
e107::css("theme", "css/custom.css" );
 

e107::js("footer", 	'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', 'jquery');
e107::js("footer", 	'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', 'jquery');
e107::js("theme", 	'js/script.js', 'jquery'); 


/* originally hardcoded in style.css NEED BE CHECKED */
$headerbackground = e107::pref('theme', 'headerbackground', FALSE); 
if($headerbackground) 
{
	$headerbackground = e107::getParser()->replaceConstants($headerbackground);
	$inlinecss1  = 'header {   background-image: url('.$headerbackground.') }';
	e107::css("inline", $inlinecss1);
}
/* override with theme prefs */
$inlinecss = e107::pref('theme', 'inlinecss', FALSE);
if($inlinecss) { 
	e107::css("inline", $inlinecss);
}
$inlinejs = e107::pref('theme', 'inlinejs');
if($inlinejs) { 
	e107::js("footer-inline", $inlinejs);
}

define('BODYTAG', '<body id="page-top" data-spy="scroll" class="index layout-'.THEME_LAYOUT.'">');
 

//e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 
 
$imagepath = e_THEME_ABS.'agency2/install/';
  

class agency2_theme
{

	/**
	 * @param string $caption
	 * @param string $text
	 * @param string $id : id of the current render
	 * @param array $info : current style and other menu data.
	 */
	function tablestyle($caption, $text, $id='', $info=array())
	{

		$style = $info['setStyle'];

		echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";


		if ($id == 'wm') // Example - If rendered from 'welcome message'
		{
			echo '
		      <div class="intro-lead-in">' . $caption . '</div>
		      <div class="intro-heading">' . $text . '</div>';
			return;
		}

		// specific menu styles.
		if( $id == 'lastseen'
		|| $id == 'news_categories_menu'
		|| $id == "news_months_menu"
		|| $id == 'comment_menu')
		{
	        echo '<div class="card my-4">
	            <h5 class="card-header">'.$caption.'</h5>
	             
	              '.$text.'
	             
	          </div>';

			return null;
		}


		// As defined by {SETSTYLE} within the template.
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




			case "contact": // todo Find a place for the sub-heading (but not the page/menu table) possibly theme prefs.
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


			case 'col-md-4':
			case 'col-md-6':
			case 'col-md-7':
				if(!empty($caption))
				{
		            echo '<h3>'.$caption.'</h3>';
				}

				echo $text;
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


			case 'notags':
				 echo str_replace(array("<p>","</p>"), "", $text);
			break;


			case 'notitle':
				echo $text;
			break;


			default:
				if(!empty($caption))
				{
					echo '<h2 class="caption">'.$caption.'</h2>';
				}
				echo $text;
		}


		return null;

	}

}


// for multipage purpose
$navbartype = 'bg-dark';
if(THEME_LAYOUT == 'homepage'  )
{
	$navbartype = "navbar-dark ";
}

$LAYOUT = array();


// applied before every layout. 
$LAYOUT['_header_'] = '
    <nav class="navbar navbar-expand-lg '.$navbartype.' fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{SITEURL}">{SITENAME}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
                {NAVIGATION=main}
           <ul class="navbar-nav ml-auto">
         		{BOOTSTRAP_USERNAV: placement=top}
          </ul>
        </div>
      </div>
    </nav>
';

// applied after every layout. 
$LAYOUT['_footer_'] = ' 
{SETSTYLE=footer}
  <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">{SITEDISCLAIMER=2017}</span>
          </div>
          <div class="col-md-4">
            {XURL_ICONS}
          </div>
          <div class="col-md-4">
            {NAVIGATION=footer}
          </div>
        </div>
      </div>
    </footer>
    <!-- Portfolio Modals -->
    {MODALPORTFOLIO}
';

// $LAYOUT is a combined $HEADER and $FOOTER, automatically split at the point of "{---}"

$LAYOUT['homepage'] =  '
 {MENU=1}
<!-- Header -->
<header class="masthead">
	
  <div class="container">
  	{MENU=2}
    <div class="intro-text">
        {SETSTYLE=wm}
        {---} 
    </div>
  </div>
</header>
      
<div class="container">
  {ALERTS}
</div>

{SETSTYLE=section}
{MENU=3}



<section id="ourservices">
    <div class="container">
			
         	{SETSTYLE=notitle}
        	{CHAPTER_MENUS: name=home-services}

    </div>
</section>

<section id="portfolio" >
    <div class="container">
		{PORTFOLIOITEMS}	 
   </div>
</section>
    
<!-- About Section No.3 menu 3 + ...-->
<section id="about">
    <div class="container">
           {CHAPTER_MENUS: name=timeline}
    </div>
</section>

    <!-- Team Section Section N.4 - menu 4 -->
<section id="team">
  <div class="container">

        {CHAPTER_MENUS: name=our-team}

      <div class="row">
          <div class="col-lg-8 mx-auto text-center">
              <p class="large text-muted">'.e107::pref('theme', 'textafterteam','').'</p>
          </div>
      </div>
  </div>
</section>

{SETSTYLE=section}
{MENU=4}






<!-- Clients Aside Section N. 5 -->
<section class="py-5">
    <div class="container">
        <div class="row">
            {SETSTYLE=notitle}
            {GALLERY_PORTFOLIO: category=2&limit=4}             
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    {SETSTYLE=notitle}
                		{MENU=5}
                </div>
            </div>
            <div class="row"> {SETSTYLE=contact}
                <div class="col-lg-12">
                    {AGENCY_CONTACTFORM}
                </div>
            </div>
        </div>
    </section>        
';


$LAYOUT['full'] = '  
{SETSTYLE=default}
<div class="container">	
  {ALERTS}
  {MENU=1}
  {---}
</div>';

$LAYOUT['sidebar_right'] =  '
{SETSTYLE=default} 
  <section>
   <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
           {ALERTS}
           {---}
        </div> 
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
                  {SETSTYLE=menu}
                  {MENU=1}
        </div>
      </div>
      <!-- /.row -->

    </div>
    </section>
 ';
 
 

