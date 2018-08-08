<?php
  defined('_JEXEC') or die;
  $lang = JFactory::getLanguage();
  if ($lang->getTag() == "ro-RO") {
    $cur_lang = "name_ro";
  } elseif ($lang->getTag() == "ru-RU") {
    $cur_lang = "name_ru";
  } elseif ($lang->getTag() == "en-GB") {
    $cur_lang = "name_en";
  } else {
    $cur_lang = "name_ru";
  }
  $db = JFactory::getDbo();
  $db->getQuery(true);
  $db->setQuery("SELECT * FROM #__prices_sng");
  $track_package_SNG = $db->loadObjectList();
  jimport( 'joomla.html.html.tabs' );
  $options = array(
      'onActive' => 'function(title, description){
          description.setStyle("display", "block");
          title.addClass("open").removeClass("closed");
      }',
      'onBackground' => 'function(title, description){
          description.setStyle("display", "none");
          title.addClass("closed").removeClass("open");
      }',
      'startOffset' => 0  // 0 starts on the first tab, 1 starts the second, etc...
  );

?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#page_tabs" ).tabs();
    $( "#page_tabs3" ).tabs();
    $(".online_help").on('click', function () {
      jivo_api.open();
    });
  });
</script>

  <?php
     $lang =& JFactory::getLanguage();
     if($lang->getTag() == 'ru-RU') { ?>
  <div class="page_prices">
    <div id="clear"></div>
<h1 style="color: rgb(47, 120, 199); font-size: 35px; font-weight: bold; margin-bottom: 10px; padding-bottom: 10px; margin-top: -15px; text-align: center; margin-bottom: 500px;">Страница в разработке</h1>

  <?php } elseif ($lang->getTag() == 'ro-RO') { ?>
  <div class="page_prices">
    <div id="clear"></div>
<h1 style="color: rgb(47, 120, 199); font-size: 35px; font-weight: bold; margin-bottom: 10px; padding-bottom: 10px; margin-top: -15px; text-align: center; margin-bottom: 500px;">Pagina in constructie</h1>


<?php } elseif ($lang->getTag() == 'en-GB') {  ?>
      <div class="page_prices">
    <div id="clear"></div>
<h1 style="color: rgb(47, 120, 199); font-size: 35px; font-weight: bold; margin-bottom: 10px; padding-bottom: 10px; margin-top: -15px; text-align: center; margin-bottom: 500px;">Page in construction</h1>

    <?php } ?>