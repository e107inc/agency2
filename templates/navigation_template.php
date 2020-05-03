<?php
/*
* Copyright (c) 2012 e107 Inc e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
* $Id: e_shortcode.php 12438 2011-12-05 15:12:56Z secretr $
*
* Navigation Template 
*/

// TEMPLATE FOR {NAVIGATION=main}
$NAVIGATION_TEMPLATE['main']['start'] = '';

// Main Link
$NAVIGATION_TEMPLATE['main']['item'] = '
	<li class="nav-item">
		<a class="nav-link js-scroll-trigger" role="button" href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">
		 {LINK_ICON}{LINK_NAME} 
		</a> 
	</li>
';

// Main Link - active state
$NAVIGATION_TEMPLATE['main']['item_active'] = '
	<li class=" nav-item active">
		<a class="nav-link js-scroll-trigger" role="button"  data-target="#" href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">
		 {LINK_ICON} {LINK_NAME}
		</a>
	</li>
';

// Main Link which has a sub menu. 
$NAVIGATION_TEMPLATE['main']['item_submenu'] = '
	<li class="nav-item dropdown {LINK_IDENTIFIER}"> 
		<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" data-target="#" href="{LINK_URL}" title="{LINK_DESCRIPTION}">
		 {LINK_ICON}{LINK_NAME} 
		</a> 
		{LINK_SUB}
	</li>
';

// Main Link which has a sub menu - active state.
$NAVIGATION_TEMPLATE['main']['item_submenu_active'] = '
	<li class="nav-item dropdown active {LINK_IDENTIFIER}">
		<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" data-target="#" href="{LINK_URL}">
		 {LINK_ICON}{LINK_NAME}
		</a>
		{LINK_SUB}
	</li>
';	

$NAVIGATION_TEMPLATE['main']['end'] = '';	

// Sub menu 
$NAVIGATION_TEMPLATE['main']['submenu_start'] = '
		<div class="dropdown-menu submenu-start submenu-level-{LINK_DEPTH}" role="menu" >
';

// Sub menu Link 
$NAVIGATION_TEMPLATE['main']['submenu_item'] = '
			  
				<a  class="dropdown-item"  href="{LINK_URL}"{LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a>
			 
';

// Sub menu Link - active state
$NAVIGATION_TEMPLATE['main']['submenu_item_active'] = '
 
				<a class="dropdown-item active" href="{LINK_URL}"{LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a>
 
';

$NAVIGATION_TEMPLATE['main']['submenu_end'] = '</div>';

// Sub menu
$NAVIGATION_TEMPLATE['main']['submenu_lowerstart'] = '
		<ul class="dropdown-menu submenu-start lower submenu-level-{LINK_DEPTH}" role="menu" >
';

// Sub Menu Link which has a sub menu. 
$NAVIGATION_TEMPLATE['main']['submenu_loweritem'] = '
			<li role="menuitem" class="dropdown-submenu lower">
				<a href="{LINK_URL}"{LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a>
				{LINK_SUB}
			</li>
';

$NAVIGATION_TEMPLATE['main']['submenu_loweritem_active'] = '
			<li role="menuitem" class="dropdown-submenu active">
				<a href="{LINK_URL}"{LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a>
				{LINK_SUB}
			</li>
';

$NAVIGATION_TEMPLATE['main']['submenu_lowerend'] = '</ul>';


// TEMPLATE FOR {NAVIGATION=side}

$NAVIGATION_TEMPLATE['side']['start'] 				= '<ul class="nav nav-list"><li class="nav-header">Sidebar</li>
														';

$NAVIGATION_TEMPLATE['side']['item'] 				= '<li><a href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">{LINK_ICON}{LINK_NAME}</a></li>
														';

$NAVIGATION_TEMPLATE['side']['item_submenu'] 		= '<li class="nav-header">{LINK_ICON}{LINK_NAME}{LINK_SUB}</li>
														';

$NAVIGATION_TEMPLATE['side']['item_active'] 		= '<li class="active"{LINK_OPEN}><a href="{LINK_URL}" title="{LINK_DESCRIPTION}">{LINK_ICON}{LINK_NAME}</a></li>
														';

$NAVIGATION_TEMPLATE['side']['end'] 				= '</ul>
														';

$NAVIGATION_TEMPLATE['side']['submenu_start'] 		= '';

$NAVIGATION_TEMPLATE['side']['submenu_item']		= '<li><a href="{LINK_URL}"{LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a></li>';

$NAVIGATION_TEMPLATE['side']['submenu_loweritem'] = '
			<li role="menuitem" class="dropdown-submenu">
				<a href="{LINK_URL}"{LINK_OPEN}>{LINK_ICON}{LINK_NAME}</a>
				{LINK_SUB}
			</li>
';

$NAVIGATION_TEMPLATE['side']['submenu_item_active'] = '<li class="active"><a href="{LINK_URL}">{LINK_ICON}{LINK_NAME}</a></li>';

$NAVIGATION_TEMPLATE['side']['submenu_end'] 		= '';


// Footer links.  - ie. 3 columns of links. 

$NAVIGATION_TEMPLATE["footer"]["start"] 				= '<ul class="list-inline quicklinks">';
$NAVIGATION_TEMPLATE["footer"]["item"] 					= '<li class="list-inline-item"><a href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">{LINK_ICON}{LINK_NAME}</a></li>';
$NAVIGATION_TEMPLATE["footer"]["item_submenu"] 	=  $NAVIGATION_TEMPLATE["footer"]["item"];
$NAVIGATION_TEMPLATE["footer"]["item_active"] 	= '<li class="list-inline-item"><a href="{LINK_URL}"{LINK_OPEN} title="{LINK_DESCRIPTION}">{LINK_ICON}{LINK_NAME}</a></li>';
$NAVIGATION_TEMPLATE["footer"]["end"] 					= '</ul>';
$NAVIGATION_TEMPLATE["footer"]["submenu_start"] 	    = "";
$NAVIGATION_TEMPLATE["footer"]["submenu_item"]			  = "";
$NAVIGATION_TEMPLATE["footer"]["submenu_loweritem"] 	= "";
$NAVIGATION_TEMPLATE["footer"]["submenu_item_active"] = "";
$NAVIGATION_TEMPLATE["footer"]["submenu_end"] 		  	= "";
 

$NAVIGATION_TEMPLATE['alt'] 						= $NAVIGATION_TEMPLATE['side'];
$NAVIGATION_TEMPLATE['alt5'] 						= $NAVIGATION_TEMPLATE['side'];
$NAVIGATION_TEMPLATE['alt6'] 						= $NAVIGATION_TEMPLATE['side'];

?>
