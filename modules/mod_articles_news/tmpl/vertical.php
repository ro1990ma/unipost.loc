<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_news
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<ul class="news-vert<?php echo $params->get('moduleclass_sfx'); ?>">
<?php for ($i = 0, $n = count($list); $i < $n; $i ++) :
	$item = $list[$i]; ?>
	<li class="news-item">
	<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
	</li>
<?php endfor; ?>
</ul>

<a href="index.php?option=com_content&view=article&id=5&catid=9" class="tt" title="::<?php echo JText::_('ARHIVE_NEWS'); ?>"><?php echo JText::_('ARHIVE_NEWS'); ?></a>