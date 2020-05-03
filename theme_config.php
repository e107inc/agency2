<?php

if (!defined('e107_INIT')) { exit; }


class theme_config implements e_theme_config
{

	private $helpLinks = array();

	function __construct()
	{
		e107::themeLan('admin','agency2', true);
		
		$this->helpLinks = 
		array( 
			'support'		=> array('url' => 'https://www.e107sk.com/forum/themes-in-active-mode/', 
							'label' => LAN_JM_ADMIN_HELP_02,
							'name' => LAN_JM_ADMIN_HELP_03),
			'documentation'	=> array('url' => 'https://www.e107sk.com/e107-themes/startbootstrap-templates-e107-bootstrap-agency-theme/?cat.348', 
							'label' => LAN_JM_ADMIN_HELP_04,
							'name' => LAN_JM_ADMIN_HELP_05),
			'demo'	=> array('url' => 'https://www.e107sk.com/bootstrap/agency/', 
							'label' => LAN_JM_ADMIN_HELP_06,
							'name' => LAN_JM_ADMIN_HELP_07),
			'github'	=> array('url' => 'https://github.com/e107inc/agency2', 
							'label' => LAN_JM_ADMIN_HELP_08,
							'name' => LAN_JM_ADMIN_HELP_09),
			'download'	=> array('url' => '', 
							'label' => LAN_JM_ADMIN_HELP_10,
							'name' => LAN_JM_ADMIN_HELP_11),														
		);			 
	}
 
	function config()
	{

    	$fields = array(
			'timelineendtext'   => array('title' => LAN_AG_THEMEPREF_01, 'type'=>'text', 'writeParms'=>array('size'=>'block-level'), 'help'=>''),
			'textafterteam'   	=> array('title' => LAN_AG_THEMEPREF_02, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'), 'help'=>''),
			'contactsubtitle'   => array('title' => LAN_AG_THEMEPREF_05, 'type'=>'text', 'writeParms'=>array('size'=>'block-level'), 'help'=>''),
			'headerbackground'  => array('title' => LAN_AG_THEMEPREF_03, 'type'=>'image', 'help'=>''),
			'inlinecss'  				=> array('title' => LAN_AG_THEMEPREF_06, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'),'help'=>''),
			'inlinejs'   				=> array('title' => LAN_AG_THEMEPREF_07, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'),'help'=>''),
		);			
 
		return $fields;
 
	}

	function help()
	{  
		$content = '<h2 class="text-center">' . LAN_JM_ADMIN_HELP_01 . '</h2>';
		foreach($this->helpLinks AS $helpLink) {
			if(!empty($helpLink['url'])) {
				$content .= '<p class="text-center">' .$helpLink['label'] . '</p>';
				$content .= '<p class="text-center">';
				$content .= '<a href="' .$helpLink['url'] . '" target="_blank">' .$helpLink['name'] . '</a>';
				$content .= '</p>';
			}
		}
     return $content;   
      
	}
	
	function process()
	{
	 	return '';
	}
}

?>
