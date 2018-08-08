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
		<h1 class="prices_title"><?php echo JText::_('PAGE_PRICES_TITLE'); ?></h1>
		<div id="clear"></div>
<p>- Экспорт/Отправка международных курьерских экспресс отправлений из Республики Молдова по всему миру.<br />Тариф за доставку  рассчитывается исходя из веса и размеров <a href="/ru/inform#art_27">отправления готового к пересылке</a>.  <a href="/ru/inform#art_31">Доставочные тарифы</a> и сроки доставки отправлений категории: <a href="/ru/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/ru/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/ru/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Экспорт/Отправка международных курьерских отправлений из Республики Молдова в страны Евросоюза и в определённые города Российской Федерации по доставочному тарифу ECONOM.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/ru/inform#art_27"><a href="/ru/inform#art_27">отправления готового к пересылке</a></a>.<br />Доставочный тариф ECONOM и сроки доставки для отправлений категории: <a href="/ru/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/ru/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/ru/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Импорт/ Получение международных курьерских экспресс отправлений в Республику Молдова из любой страны мира.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/ru/inform#art_27">отправления готового к пересылке</a>. Доставочные тарифы и сроки доставки отправлений категории: <a href="/ru/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/ru/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/ru/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Импорт/Получение международных курьерских отправлений в Республику Молдова из стран Евросоюза и из определённых городов Российской Федерации по доставочному тарифу ECONOM.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/ru/inform#art_27">отправления готового к пересылке</a>. Доставочные тарифы и сроки доставки отправлений категории: <a href="/ru/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/ru/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/ru/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Курьерская, срочная доставка отправлений по адресам г. Кишинева и его пригородам.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
	<p><br></p>
<p>- Курьерская доставка отправлений по адресам г.Кишинева и его пригородам.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
</p>
<p><br></p>
<p>- Курьерская доставка бухгалтерской документации строгой отчётности по адресам г.Кишинева и его пригородам.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/ru/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Курьерская доставка: печатных изданий, сувенирно-рекламной продукции в требуемые сроки.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/ru/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Обслуживание компаний по курьерской доставке между их офисами в г.Кишиневе.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/ru/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Курьерская доставка отправлений по территории Республики Молдова.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
</p>
<p><br></p>
<p> </p>


		<div id="clear"></div>
	</div>

	<?php } elseif ($lang->getTag() == 'ro-RO') { ?>
<div class="page_prices">
		<h1 class="prices_title"><?php echo JText::_('PAGE_PRICES_TITLE'); ?></h1>
		<div id="clear"></div>
<p>- Экспорт/Отправка международных курьерских экспресс отправлений из Республики Молдова по всему миру.<br />Тариф за доставку  рассчитывается исходя из веса и размеров <a href="/ro/inform#art_27">отправления готового к пересылке</a>.  <a href="/ro/inform#art_31">Доставочные тарифы</a> и сроки доставки отправлений категории: <a href="/ro/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/ro/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/ro/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Экспорт/Отправка международных курьерских отправлений из Республики Молдова в страны Евросоюза и в определённые города Российской Федерации по доставочному тарифу ECONOM.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/ro/inform#art_27"><a href="/ro/inform#art_27">отправления готового к пересылке</a></a>.<br />Доставочный тариф ECONOM и сроки доставки для отправлений категории: <a href="/ro/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/ro/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/ro/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Импорт/ Получение международных курьерских экспресс отправлений в Республику Молдова из любой страны мира.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/ro/inform#art_27">отправления готового к пересылке</a>. Доставочные тарифы и сроки доставки отправлений категории: <a href="/ro/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/ro/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/ro/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Импорт/Получение международных курьерских отправлений в Республику Молдова из стран Евросоюза и из определённых городов Российской Федерации по доставочному тарифу ECONOM.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/ro/inform#art_27">отправления готового к пересылке</a>. Доставочные тарифы и сроки доставки отправлений категории: <a href="/ro/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/ro/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/ro/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Курьерская, срочная доставка отправлений по адресам г. Кишинева и его пригородам.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
	<p><br></p>
<p>- Курьерская доставка отправлений по адресам г.Кишинева и его пригородам.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
</p>
<p><br></p>
<p>- Курьерская доставка бухгалтерской документации строгой отчётности по адресам г.Кишинева и его пригородам.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/ro/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Курьерская доставка: печатных изданий, сувенирно-рекламной продукции в требуемые сроки.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/ro/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Обслуживание компаний по курьерской доставке между их офисами в г.Кишиневе.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/ro/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Курьерская доставка отправлений по территории Республики Молдова.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
</p>
<p><br></p>
<p> </p>


		<div id="clear"></div>
	</div>	





<?php } elseif ($lang->getTag() == 'en-GB') {  ?>
			<div class="page_prices">
		<h1 class="prices_title"><?php echo JText::_('PAGE_PRICES_TITLE'); ?></h1>
		<div id="clear"></div>
<p>- Экспорт/Отправка международных курьерских экспресс отправлений из Республики Молдова по всему миру.<br />Тариф за доставку  рассчитывается исходя из веса и размеров <a href="/en/inform#art_27">отправления готового к пересылке</a>.  <a href="/en/inform#art_31">Доставочные тарифы</a> и сроки доставки отправлений категории: <a href="/en/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/en/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/en/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Экспорт/Отправка международных курьерских отправлений из Республики Молдова в страны Евросоюза и в определённые города Российской Федерации по доставочному тарифу ECONOM.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/en/inform#art_27"><a href="/en/inform#art_27">отправления готового к пересылке</a></a>.<br />Доставочный тариф ECONOM и сроки доставки для отправлений категории: <a href="/en/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/en/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/en/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Импорт/ Получение международных курьерских экспресс отправлений в Республику Молдова из любой страны мира.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/en/inform#art_27">отправления готового к пересылке</a>. Доставочные тарифы и сроки доставки отправлений категории: <a href="/en/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/en/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/en/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Импорт/Получение международных курьерских отправлений в Республику Молдова из стран Евросоюза и из определённых городов Российской Федерации по доставочному тарифу ECONOM.<br />Тариф за доставку рассчитывается исходя из веса и размеров <a href="/en/inform#art_27">отправления готового к пересылке</a>. Доставочные тарифы и сроки доставки отправлений категории: <a href="/en/inform#art_34">ДОКУМЕНТЫ</a> и <a href="/en/inform#art_25">НЕ ДОКУМЕНТЫ</a>, вы можете узнать, воспользовавшись <a href="/en/?do=calc">тарифным калькулятором</a>.</p>
<p><br></p>
<p>- Курьерская, срочная доставка отправлений по адресам г. Кишинева и его пригородам.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
	<p><br></p>
<p>- Курьерская доставка отправлений по адресам г.Кишинева и его пригородам.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
</p>
<p><br></p>
<p>- Курьерская доставка бухгалтерской документации строгой отчётности по адресам г.Кишинева и его пригородам.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/en/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Курьерская доставка: печатных изданий, сувенирно-рекламной продукции в требуемые сроки.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/en/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Обслуживание компаний по курьерской доставке между их офисами в г.Кишиневе.<br />Если вашу фирму интересует данная услуга, тогда заполните <a href="/en/?do=reg_sec">форму запроса</a>, и мы пришлём вам на e-mail тарифное предложение, согласно критериям вашего запроса.</p>
<p><br></p>
<p>- Курьерская доставка отправлений по территории Республики Молдова.<br />
	<table style="border: 1px solid #adadad;">
		<tbody>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
			<tr style="border: 1px solid #adadad;">
				<td style="border: 1px solid #adadad;">1</td>
				<td style="border: 1px solid #adadad;">2</td>
				<td style="border: 1px solid #adadad;">3</td>
			</tr>
		</tbody>
	</table>
</p>
<p><br></p>
<p> </p>


		<div id="clear"></div>
	</div>


		<?php } ?>