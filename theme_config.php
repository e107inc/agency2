<?php

if (!defined('e107_INIT')) { exit; }

e107::lan('theme', 'admin',true);

// Dummy Theme Configuration File.
class theme_config implements e_theme_config
{

	function __construct()
	{
		e107::themeLan('admin','agency2', true);
	}


	function config()
	{
		// v2.1.4 format.

    $fields = array(
			'timelineendtext'   => array('title' => LAN_AG_THEMEPREF_01, 'type'=>'text', 'writeParms'=>array('size'=>'block-level'), 'help'=>''),
			'textafterteam'   	=> array('title' => LAN_AG_THEMEPREF_02, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'), 'help'=>''),
			'contactsubtitle'   => array('title' => LAN_AG_THEMEPREF_05, 'type'=>'text', 'writeParms'=>array('size'=>'block-level'), 'help'=>''),
			'headerbackground'  => array('title' => LAN_AG_THEMEPREF_03, 'type'=>'image', 'help'=>''),
			'inlinecss'  				=> array('title' => LAN_AG_THEMEPREF_06, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'),'help'=>''),
			'inlinejs'   				=> array('title' => LAN_AG_THEMEPREF_07, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'),'help'=>''),			
	//		'cdn' => array('title' => 'CDN', 'type'=>'dropdown',
	//		'writeParms'=>array('optArray'=>array( 'cdnjs' => 'CDNJS (Cloudflare)', 'jsdelivr' => 'jsDelivr'  , 'local' => LAN_AG_THEMEPREF_04)))
 		);


		return $fields;
 
	}

	function help()
	{
	 	return '';
	}
}

?>
