<?php
/**
 * @package         Advanced Module Manager
 * @version         4.2.1
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

$fieldSets = $this->form->getFieldsets('params');

if (isset($fieldSets['basic'])) : ?>
	<?php
	$name = 'basic';
	$fieldSet = $fieldSets[$name];
	if (isset($fieldSet->description) && trim($fieldSet->description)) :
		echo '<p class="tip">' . $this->escape(JText::_($fieldSet->description)) . '</p>';
	endif;
	?>
	<fieldset class="adminform">
		<legend><?php echo JText::_('JOPTIONS'); ?></legend>
		<ul class="adminformlist">
			<?php foreach ($this->form->getFieldset($name) as $field) : ?>
				<li>
					<?php if (!$field->hidden) : ?>
						<?php echo $field->label; ?>
					<?php endif; ?>
					<?php echo $field->input; ?>
				</li>
			<?php endforeach; ?>
			<?php if ($this->config->show_extra) : ?>
				<?php for ($i = 1; $i <= 5; $i++) : ?>
					<?php if (isset($this->config->{'extra' . $i}) && $this->config->{'extra' . $i} != '') : ?>
						<?php
						$label = explode('|', $this->config->{'extra' . $i}, 2);
						$tooltip = isset($label['1']) ? JText::_($label['1']) : '';
						$label = JText::_($label['0']);
						?>
						<li>
							<label id="advancedparams_extra<?php echo $i; ?>-lbl" for="advancedparams_extra<?php echo $i; ?>"
								<?php echo $tooltip ? 'class="hasTip" title="' . $label . '::' . $tooltip . '"' : ''; ?>>
								<?php echo $label; ?>
							</label>
							<?php echo $this->assignments->getInput('extra' . $i); ?></li>
					<?php endif; ?>
				<?php endfor; ?>
			<?php endif; ?>
		</ul>
	</fieldset>
	<div class="clr"></div>
<?php endif; ?>
