<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
 *
 * $Source: /cvs_backup/e107_0.8/e107_themes/templates/user_template.php,v $
 * $Revision$
 * $Date$
 * $Author$
 */

if (!defined('e107_INIT')) { exit; }
if (!defined("USER_WIDTH"))
{
	 $legacyWidth = deftrue('BOOTSTRAP') ? ""  : "width:95%";
	 define("USER_WIDTH", $legacyWidth); 
}

global $user_shortcodes, $pref, $user;
//Set this to TRUE if you would like any extended user field that is empty to NOT be shown on the profile page
define("HIDE_EMPTY_FIELDS", FALSE);

 

//FIXME TODO - Remove IF statements from template. 
if(isset($pref['photo_upload']) && $pref['photo_upload'])
{
	$user_picture =  "{USER_PICTURE}";
	$colspan = " colspan='2'";
	$main_colspan = "";
}
else
{
	$user_picture =  "";
	$colspan = "";
	$main_colspan = " colspan = '2' ";
}
 
 
$USER_TEMPLATE['teammember'] = '{SETIMAGE: w=225}
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="'.$imagepath.'team/1.jpg" class="img-fluid rounded-circle" alt="">
                         {USER_PICTURE}
                        <h4>{USER_REALNAME}</h4>
                        <p class="text-muted">{USER_CUSTOMTITLE}</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>';
 
 


?>