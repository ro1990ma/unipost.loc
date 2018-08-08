<?php
	defined('_JEXEC') or die;
	JHTML::_('behavior.modal', 'a.modal');
?>
<!--	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
	<script>
		$(function() {
			$( "#page_tabs" ).tabs();
		});
	</script>

		<?php
     $lang =& JFactory::getLanguage();
     if($lang->getTag() == 'ru-RU') { ?>

	
	<?php } elseif ($lang->getTag() == 'ro-RO') { ?>


<?php } elseif ($lang->getTag() == 'en-GB') {  ?>
			
		<?php } ?>