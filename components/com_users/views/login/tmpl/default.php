<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();

if ($this->user->get('guest')):
	// The user is not logged in.
	//echo $this->loadTemplate('login');
	$app->redirect(JRoute::_(JURI::base(), false));
	//echo "test";
else:
	// The user is already logged in.
	$app->redirect(JRoute::_('index.php?option=com_users&view=profile', false));
	//echo $this->loadTemplate('logout');
endif;
