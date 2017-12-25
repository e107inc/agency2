<?php
	/*
	 * e107 website system
	 *
	 * Copyright (C) 2008-2013 e107 Inc (e107.org)
	 * Released under the terms and conditions of the
	 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
	 *
	 * e107 Bootstrap Theme Shortcodes.
	 *
	*/

	class theme_shortcodes extends e_shortcode
	{

		/**
		 * Return raw HTML-usable values from page fields.
		 * @experimental subject to change without notice.
		 * @param null $parm
		 * @return mixed
		 */
		/**
		 * Return raw HTML-usable values from page fields.
		 * @experimental subject to change without notice.
		 * @param null $parm
		 * @return mixed
		 */
		function sc_bootstrap_usernav($parm = '')
		{

			include_lan(e_PLUGIN . "login_menu/languages/" . e_LANGUAGE . ".php");

			$tp = e107::getParser();
		// $login_menu_shortcodes
			require(e_PLUGIN . "login_menu/login_menu_shortcodes.php"); // don't use 'require_once'.

			$userReg = defset('USER_REGISTRATION');

			if(!USERID) // Logged Out.
			{
				$text = '';

				if($userReg == 1)
				{
					$signuplink = '<li class="nav-item"><a class="nav-link" href="' . e_SIGNUP . '">' . LAN_LOGINMENU_3 . '</a></li>';
				}

				$socialActive = e107::pref('core', 'social_login_active');

				if(!empty($userReg) || !empty($socialActive)) // e107 or social login is active.
				{
					$loginlink = '
			  	    <a class="nav-link dropdown-toggle" href="#" id="dropdownLoginLink" data-toggle="dropdown" aria-haspopup="true"
					   aria-expanded="true" title="' . LAN_LOGINMENU_51 . '"> ' . LAN_LOGINMENU_51 . '</a>';
					$sociallogin = '{SOCIAL_LOGIN: size=2x&label=1}';
				}
				else
				{
					return '';
				}


				if(!empty($userReg)) // value of 1 or 2 = login okay.
				{

					//	global $sc_style; // never use global - will impact signup/usersettings pages.
					//	$sc_style = array(); // remove any wrappers.

					$loginform = '
					<form method="post" onsubmit="hashLoginPassword(this);return true" action="' . e_REQUEST_HTTP . '" accept-charset="UTF-8">
					<p>{LM_USERNAME_INPUT}</p>
					<p>{LM_PASSWORD_INPUT}</p>
					<div class="form-group"></div>
					{LM_IMAGECODE_NUMBER}
					{LM_IMAGECODE_BOX}
					<div class="checkbox">
					<label class="string optional" for="autologin"><input style="margin-right: 10px;" type="checkbox" name="autologin" id="autologin" value="1">
					' . LAN_LOGINMENU_6 . '</label>
					</div>
					<input class="btn btn-primary btn-block" type="submit" name="userlogin" id="userlogin" value="' . LAN_LOGINMENU_51 . '">
					';

					$loginform .= '
					<a href="{LM_FPW_LINK=href}" class="btn btn-secondary btn-sm  btn-block">' . LAN_LOGINMENU_4 . '</a>
					<a href="{LM_RESEND_LINK=href}" class="btn btn-secondary btn-sm  btn-block">' . LAN_LOGINMENU_40 . '</a>
					';

					$loginform .= "<p></p>
					</form>
					";
				}

				$text = ' ' .
					$signuplink .
					' 
					<li class="nav-item dropdown">
				     ' . $loginlink . $sociallogin . '
					   <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownLoginLink" style="min-width:250px; padding: 15px; padding-bottom: 0px;">
						  ' . $loginform . '
					   </div>
				</li>';

				$text .= '';

				return $tp->parseTemplate($text, true, $login_menu_shortcodes);
			}


			// Logged in.
			//TODO Generic LANS. (not theme LANs)
			if(ADMIN)
			{
				$adminlink = '<a class="dropdown-item"  href="' . e_ADMIN_ABS . '"><span class="fa fa-cogs"></span> ' . LAN_LOGINMENU_11 . '</a>';
			}
			else
			{
				$adminlink = '';
			}


			$text = '
		  <li class="nav-item dropdown">{PM_NAV}</li>
			 <li class="nav-item  dropdown show">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			   {SETIMAGE: w=20} {USER_AVATAR: shape=circle} ' . USERNAME . ' <b class="caret"></b>
			  </button>
			
			  <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuLink">
			    <a class="dropdown-item" href="{LM_USERSETTINGS_HREF}"><span class="fa fa-cog"></span> ' . LAN_SETTINGS . '</a>
			    <a class="dropdown-item" href="{LM_PROFILE_HREF}"><span class="fa fa-user"></span> ' . LAN_LOGINMENU_13 . '</a>
			    ' . $adminlink . '
			    <a class="dropdown-item" href="' . e_HTTP . 'index.php?logout"><span class="fa fa-sign-out"></span> ' . LAN_LOGOUT . '</a>
			  </div>
			</li>
 ';

			return $tp->parseTemplate($text, true, $login_menu_shortcodes);
		}

		/**
		 * TODO Replace with a core shortcode. {BOOK_MENUS}
		 * @return string
		 */
		function sc_portfolioitems()
		{

			//	return e107::getParser()->parseTemplate("{CHAPTER_MENUS: name=portfolio}",true);

			$template = e107::getCoreTemplate('chapter', 'portfolio');
			$sc = e107::getScBatch('page', null, 'cpage');


			// TO GET ID OF BOOK WITH PORTFOLIO
			$where = "chapter_visibility IN (" . USERCLASS_LIST . ") AND chapter_template = 'portfolio'";
			$book_id = e107::getDb()->retrieve('page_chapters', 'chapter_id', $where);

			// TO GET ALL PAGES, WITH THEIR CHAPTERS WITH BOOK PORTFOLIO

			$query = "SELECT * FROM #page AS p LEFT JOIN #page_chapters as ch ON p.page_chapter=ch.chapter_id WHERE ch.chapter_parent = " . intval($book_id) . " ORDER BY p.page_order DESC ";



			if($pageArray = e107::getDb()->retrieve($query, true))
			{

				$sc->setVars($pageArray[0]); // set so book/chapter info is available to 'start' template.
				$text = e107::getParser()->parseTemplate($template['listItems']['start'], true, $sc);

				foreach($pageArray as $page)
				{
					$sc->setVars($page);
					$text .= e107::getParser()->parseTemplate($template['listItems']['item'], true, $sc);
				}
			}
			else
			{
				$text = LAN_AG_THEME_14;
			}



			$text .= e107::getParser()->parseTemplate($template['listItems']['end'], true, $sc);

			return $text;
		}


		/**
		 * TODO Replace with a core shortcode.
		 * @return string
		 */
		function sc_modalportfolio()
		{
			$template = e107::getCoreTemplate('chapter', 'modalportfolio');
			$sc = e107::getScBatch('page', null, 'cpage');

			// TO GET ID OF BOOK WITH PORTFOLIO
			$where = "chapter_visibility IN (" . USERCLASS_LIST . ") AND chapter_template = 'portfolio'";
			$book_id = e107::getDb()->retrieve('page_chapters', 'chapter_id', $where);

			// TO GET ALL PAGES, WITH THEIR CHAPTERS WITH BOOK PORTFOLIO
			$query = "SELECT * FROM #page AS p LEFT JOIN #page_chapters as ch ON p.page_chapter=ch.chapter_id WHERE ch.chapter_parent = " . intval($book_id) . " ORDER BY p.page_order DESC ";

			$text = e107::getParser()->parseTemplate($template['listItems']['start'], true, $sc);

			if($pageArray = e107::getDb()->retrieve($query, true))
			{
				foreach($pageArray as $page)
				{
					$sc->setVars($page);
					$text .= e107::getParser()->parseTemplate($template['listItems']['item'], true, $sc);
				}
			}
			else
			{
				$text = null; // $text = LAN_AG_THEME_14;
			}

			$text .= e107::getParser()->parseTemplate($template['listItems']['end'], true, $sc);

			return $text;


		}

		/**
		 * @return string
		 */
		function sc_timeline_inverted()
		{
			global $pairing; //fixme don't use globals.
			$pairing = !$pairing;

			return ($pairing ? '' : 'class= "timeline-inverted" ');
		}

		function sc_timeline_footer()
		{
			return e107::pref('theme', 'timelineendtext', '');
		}

 
		function sc_sitedisclaimer($copyYear = null)
		{
			$default = "Proudly powered by <a href='http://e107.org'>e107</a> which is released under the terms of the GNU GPL License.";
			$sitedisclaimer = deftrue('SITEDISCLAIMER', $default);

			$copyYear = vartrue($copyYear, '2013');
			$curYear = date('Y');
			$text = '&copy; ' . $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : '');

			$text .= ' ' . $sitedisclaimer;

			return e107::getParser()->toHtml($text, true, 'SUMMARY');
		}


		/**
		 * @todo add menu template for contact-menu plugin to avoid the need for this.
		 * @param string $parm
		 * @return null
		 */
		function sc_agency_contactform($parm = '')
		{
			if((e107::getPref('sitecontacts')== e_UC_NOBODY) && trim(SITECONTACTINFO) == "")
			{
				return "";
			}
			else 
			{
				e107::lan('core', 'contact');
				$head = '<form id="contact-menu" action="'.e_HTTP.'contact.php" method="post" >';
				$template = e107::getCoreTemplate('contact', 'homepage');
				$contact_shortcodes = e107::getScBatch('contact');
				$foot = '</form>';
				$text = e107::getParser()->parseTemplate($head . $template . $foot, true, $contact_shortcodes);
				return e107::getRender()->tablerender(LANCONTACT_00, $text, 'contact-menu');
			}
		}
	}


?>
