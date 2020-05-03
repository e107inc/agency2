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

if (!defined('e107_INIT')) { exit; }
 

$CONTACT_TEMPLATE['homepage'] =  '
		<div class="row align-items-stretch mb-5">
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" id="contactName" type="text" placeholder="'.LAN_AG_THEME_08.' *" required="required" 
					data-validation-required-message="'.LAN_AG_THEME_09.'" />
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group">
					<input class="form-control" id="contactEmail" type="email" placeholder="'.LAN_AG_THEME_10.' *" required="required" 
					data-validation-required-message=""'.LAN_AG_THEME_06.'" />
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group mb-md-0">
					<input class="form-control" id="contactPhone" type="tel" placeholder="'.LAN_AG_THEME_05.' *" required="required" 
					data-validation-required-message="'.LAN_AG_THEME_11.'" />
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-group-textarea mb-md-0">
					<textarea class="form-control" id="contactBody" placeholder="'.LAN_AG_THEME_12.' *" required="required" 
					data-validation-required-message="'.LAN_AG_THEME_07.'"></textarea>
					<p class="help-block text-danger"></p>
				</div>
			</div>
		</div>
		<div class="text-center">
			<div id="success"></div>
			<button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">'.LAN_AG_THEME_13.'</button>
		</div>';
 