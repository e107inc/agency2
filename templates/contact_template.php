<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2016 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Contact Template
 */
 // $Id$

if (!defined('e107_INIT')) { exit; }
 

$CONTACT_TEMPLATE['homepage'] =  '
 			<div class="row">
		      <div class="col-md-6">
		          <div class="form-group">              
		              <input type="text" class="form-control"    placeholder="'.LAN_AG_THEME_08.' *" id="contactName"  name="author_name" required data-validation-required-message="'.LAN_AG_THEME_09.'">
		              <p class="help-block text-danger"></p>
		          </div>
		          <div class="form-group">
		              <input type="email" class="form-control" placeholder="'.LAN_AG_THEME_10.' *" id="contactEmail"  name="email_send" required data-validation-required-message="'.LAN_AG_THEME_06.'">
		              <p class="help-block text-danger"></p>
		          </div>
		          <div class="form-group">
		              <input type="tel" class="form-control" placeholder="'.LAN_AG_THEME_05.' *" id="contactPhone"  name="phone" required data-validation-required-message="'.LAN_AG_THEME_11.'">
		              <p class="help-block text-danger"></p>
		          </div>
		      </div>
		      <div class="col-md-6">
		          <div class="form-group">
		              <textarea class="form-control" placeholder="'.LAN_AG_THEME_12.' *" id="contactBody"  name="body" required data-validation-required-message="'.LAN_AG_THEME_07.'"></textarea>
		              <p class="help-block text-danger"></p>
		          </div>
		      </div>
		      <div class="clearfix"></div>
		      <div class="col-lg-12 text-center">
		          <div id="success"></div>
		          <input type="submit" id="send-contactus" name="send-contactus" value="'.LAN_AG_THEME_13.'" class="btn btn-primary btn-xl text-uppercase" />
		      </div>
		  </div>';
 

?>
