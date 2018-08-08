<?php
/* ------------------------------------------------------------------------
  # mod_klixo_particles  - Version 1.5.2 - 20140404
  # ------------------------------------------------------------------------
  # Copyright (C) 2012-2014 Klixo. All Rights Reserved.
  # @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
  # Author: JF Thier Klixo
  # Website: http://www.Klixo.se
  ------------------------------------------------------------------------- */

defined('_JEXEC') or die('Restricted access');

// For the sake of compatibility!
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('KLIXO_PARTICLES')) {
    define('KLIXO_PARTICLES', 1);
}

$jsCode = $params->get("code_version", 'jQueryLib');

if ($params->get("load_js_lib", '1') === '1') {
    switch ($jsCode) {
        case 'MootoolsLib':
            JHtml::_('behavior.framework', true);
            break;
        case 'jQueryLib':
            if (version_compare(JVERSION, '3.0', 'ge')) {
                // Load jQuery Lib from Joomla 3.x
                JHtml::_('jquery.framework');
            } else {
                // For Joomla 2.5 load JQuery lib from module  
                JHTML::script(JURI::base() . 'modules/' . $module->module . '/js/jquery-1.8.3.min.js');
            }
            break;
    }
}

$moduleclass_sfx = $params->get("moduleclass_sfx", '');
$playMode = $params->get("playMode", 'screen');
$spriteGraphic = $params->get("spriteGraphic", "");
$customSprite = $params->get("customSprite", "");
$spritesQty = $params->get("spritesQty", 12);
$vSpeed = $params->get("vSpeed", 1);
$hSpeed = $params->get("hSpeed", 1);
$turbulence = $params->get("turbulence", 0);
$vDir = $params->get("vDir", 0);
$hDir = $params->get("hDir", 0);
$moduleWidth = $params->get("moduleWidth", 0);
$moduleHeight = $params->get("moduleHeight", 0);
$refreshRate = 21 - $params->get("refreshRate", 12);

if ($vSpeed < 1) {
    $hSpeed = $hSpeed <= 0.5 ? 0.6 : $hSpeed;
}

if ($hSpeed < 1) {
    $vSpeed = $vSpeed <= 0.5 ? 0.6 : $vSpeed;
}

$vSpeed = $vDir == 0 ? $vSpeed : - $vSpeed;
$hSpeed = $hDir == 0 ? $hSpeed : - $hSpeed;

$spriteURL = $customSprite != "" ? JURI::base() . $customSprite : JURI::base() . 'modules/' . $module->module . '/sprites/' . $spriteGraphic;

$imgSize = @getimagesize($spriteURL);
if ($imgSize) {
    $imgWidth = $imgSize[0];
    $imgHeight = $imgSize[1];
} else {

    $imgWidth = 40;
    $imgHeight = 40;
}

if ($jsCode === 'jQueryLib'){
   Jhtml::script(JURI::base() . 'modules/' . $module->module . '/js/particles_jquery.min.js');
    $themePath = JModuleHelper::getLayoutPath('mod_klixo_particles');
} else{
    Jhtml::script(JURI::base() . 'modules/' . $module->module . '/js/particles_mootools.min.js'); 
    $themePath = JModuleHelper::getLayoutPath('mod_klixo_particles', 'mootools_tpl');
}

if (file_exists($themePath)) {
    require($themePath);
}
?>