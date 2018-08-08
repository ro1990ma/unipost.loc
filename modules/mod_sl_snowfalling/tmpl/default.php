<?php
/**
 * @copyright	Copyright (c) 2013 Skyline Software (http://extstore.com). All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die();

// init parameters
$flakesMax			= (int) $params->get('flakesMax', '128');
$flakesMaxActive	= (int) $params->get('flakesMaxActive', '64');
$animationInterval	= (int) $params->get('animationInterval', '33');
$followMouse		= $params->get('followMouse', '0') ? 'true' : 'false';
$snowColor			= $params->get('snowColor', '#fff');
$snowCharacter		= $params->get('snowCharacter', '&bull;');
$snowStick			= $params->get('snowStick', '1') ? 'true' : 'false';

$js	= "
sl_snowfalling.flakesMax			= $flakesMax;
sl_snowfalling.flakesMaxActive		= $flakesMaxActive;
sl_snowfalling.animationInterval	= $animationInterval;
sl_snowfalling.followMouse			= $followMouse;
sl_snowfalling.snowColor			= '$snowColor';
sl_snowfalling.snowCharacter		= '$snowCharacter';
sl_snowfalling.snowStick			= $snowStick;
sl_snowfalling.zIndex				= 9999;
";

$document	= JFactory::getDocument();
$document->addScript(JURI::base() . 'modules/mod_sl_snowfalling/assets/js/script.js');
$document->addScriptDeclaration($js);
?>