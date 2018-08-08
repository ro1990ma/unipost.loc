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
<p class="sub">Тарифы на предоставляемые услуги</p>

<?php
echo JHtml::_('tabs.start', 'services_tab_nav', $options);
echo '<div id="clear"></div>';
	echo JHtml::_('tabs.panel', JText::_('PANEL_1_TITLE'), 'service_1');
?>

<p class="prices_right">
	Увидеть НАС и сэкономить!!!<br />
	ВЫ можете получить скидку 5% при отправке <a href="./inform#art_34" title="Содержимое DOCS::" class="tt">ДОКУМЕНТОВ/DOCS</a> из офиса  «Unipost-Express».
<br />
	Данное предложение действует при отправках в: <br />Румынию, Украину, Россию, Белоруссию и Казахстан.
<br />
<br />
</p>
<div id="page_tabs">
							<ul>
								<li><a class="tab" href="#tabs1-1"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_1_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-2"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_2_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-3"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_3_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-4"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_4_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-5"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_5_TITLE'); ?></a></li>
							</ul>
						<!-- TAB #1 ==================================================================== -->				
							<div id="tabs1-1">
								<p class="prices_right">
									<strong>Международная курьерская экспресс доставка по территории Румынии:</strong>
								<br />
								<br />
								Тариф указан в <span style="color: #a50006;">ЕВРО/EUR</span>. Оплата производится в молдавских леях по соотношению к ЕВРО по курсу 
								НБМ на день приёма отправления к доставке. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>0 AND country<=10");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- Срок доставки указан в рабочих днях стран: <a class="tt" title="Отправитель::" href="./inform#art_7">отправителя</a>, транзита и <a class="tt" title="Получатель::" href="./inform#art_8">получателя</a>. День приёма отправления к доставке - не учитывается.
											<br />
											<br />
											- Тариф рассчитывается за вес <a class="tt" title="Отправление считается готовым к пересылке::" href="./inform#art_27">отправления готового к пересылке</a>. Фирменный конверт «Unipost-Express» вмещает 0,70 кг документации формата А4. Конверт «Unipost-Express» вместе с бланком почтовой накладной весит 0,09 кг.
											<br />
											<br />
											Тарифы за доставку отправлений категории: НЕ ДОКУМЕНТЫ (<a href="./inform#art_25" title="Содержимое NDOCS::" class="tt">NDOCS</a>)  и  ДОКУМЕНТЫ (<a href="./inform#art_34" title="Содержимое DOCS::" class="tt">DOCS</a>) свыше 5,00 кг, вы можете узнать сделав <a class="online_help" href="#">он-лайн запрос </a> на сайте или позвонив нам в офис. 
									</p>
							</div>
						<!-- TAB #2 ==================================================================== -->				
							<div id="tabs1-2">
								<p class="prices_right">
									<strong>Международная курьерская экспресс доставка по территории Украины:</strong>
								<br />
								<br />
								Тариф указан в <span style="color: #a50006;">ЕВРО/EUR</span>. Оплата производится в молдавских леях по соотношению к ЕВРО по курсу 
								НБМ на день приёма отправления к доставке. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>20 AND country<=30");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											<strong>Украина 1:</strong> Винница, Днепропетровск, Донецк, Житомир, Запорожье, Ивано-Франковск, Кировоград, Кременчуг, Кривой Рог, Луганск, Луцк, Львов, Мариуполь, Николаев, Полтава, Ровно, Суммы, Тернополь, Ужгород, Харьков, Херсон, Хмельницкий, Черкассы, Чернигов, Черновцы.
											<br />
											<br />
											Остальная территория Украины – всегда уточняйте у оператора о возможности курьерской доставки в требуемый вам населённый пункт.
											<br />
									        <br />
										    - Срок доставки указан в рабочих днях стран: <a class="tt" title="Отправитель::" href="./inform#art_7">отправителя</a>, транзита и <a class="tt" title="Получатель::" href="./inform#art_8">получателя</a>. День приёма отправления к доставке - не учитывается.
											<br />
											<br />
											- Тариф рассчитывается за вес <a class="tt" title="Отправление считается готовым к пересылке::" href="./inform#art_27">отправления готового к пересылке</a>. Фирменный конверт «Unipost-Express» вмещает 0,70 кг документации формата А4. Конверт «Unipost-Express» вместе с бланком почтовой накладной весит 0,09 кг.
										    <br />
										    <br />
										    Тарифы за доставку отправлений категории: НЕ ДОКУМЕНТЫ (<a href="./inform#art_25" title="Содержимое NDOCS::" class="tt">NDOCS</a>)  и  ДОКУМЕНТЫ (<a href="./inform#art_34" title="Содержимое DOCS::" class="tt">DOCS</a>) свыше 5,00 кг, вы можете узнать сделав <a class="online_help" href="#">он-лайн запрос </a> на сайте или позвонив нам в офис.
									</p>
							</div>			
						<!-- TAB #3 ==================================================================== -->
							<div id="tabs1-3">
								<p class="prices_right">
									<strong>Международная курьерская экспресс доставка по территории России:</strong>
								<br />
								<br />
								Тариф указан в <span style="color: #a50006;">ЕВРО/EUR</span>. Оплата производится в молдавских леях по соотношению к ЕВРО по курсу 
								НБМ на день приёма отправления к доставке. 
								</p>
								<br />
								<?php
									
								?>
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>10 AND country<=20 ORDER BY country");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
										<strong>Россия 1:</strong> Белгород, Брянск, Великий Новгород, Владимир, Волгоград, Вологда, Воронеж, Иваново, Казань, Калуга, Киров, Кострома, Краснодар, Курск, Липецк, Нижний Новгород, Орел, Пенза, Псков, Ростов-на-Дону, Рязань, Самара, Саратов, Смоленск, Тамбов, Тверь, Тольятти, Тула, Чебоксары, Ярославль.
										<br />
										<br />
										К данной тарифной зоне также относятся: <br />
										- города Московской области, находящиеся до 50 км от МКАД;<br />
										Уточняйте у оператора о возможности курьерской доставки в требуемый вам город/населённый пункт.
										<br />
										<br />
										<strong>Россия 2:</strong> Альметьевск, Архангельск, Астрахань, Барнаул, Бор, Бугульма, Екатеринбург, Ижевск, Йошкар-Ола, Калининград, Колпино, Красноярск, Магнитогорск, Минеральные Воды, Мурманск, Набережные Челны, Нижнекамск, Нижний Тагил, Новороссийск, Новосибирск, Омск, Оренбург, Пермь, Петрозаводск, Пятигорск, Саранск, Саров, Сочи, Ставрополь, Старый Оскол, Сургут, Сыктывкар, Таганрог, Томск, Тюмень, Ульяновск, Уфа, Челябинск, Череповец.
										<br />
										<br />
										К данной тарифной зоне также относятся: <br />
										- города Московской области, находящиеся далее 50 км от МКАД;<br />
										- города/населённые пункты Ленинградской области находящиеся до 50 км от КАД Санкт-Петербурга;<br />
										Уточняйте у оператора о возможности курьерской доставки в требуемый вам город/населённый пункт.
										<br />
										<br />
										<strong>Россия 3:</strong> Абакан, Ангарск, Березники, Бийск, Биробиджан, Благовещенск, Братск, Верхняя Пышма, Верхняя Салда, Владивосток, Владикавказ, Волгодонск, Горно-Алтайск, Грозный, Горно-Алтайск, Ессентуки, Иркутск, Каменск-Уральский, Кемерово, Кисловодск, Комсомольск-на-Амуре, Курган, Кызыл, Майкоп, Махачкала, Миасс, Назрань, Нальчик, Невинномысск, Нижневартовск, Новокузнецк, Новоуральск, Новый Уренгой, Норильск, Ноябрьск, Первоуральск, Петропавловск-Камчатский, Рубцовск, Северодвинск, Стерлитамак, Улан-Удэ, Усолье-Сибирское, Хабаровск, Ханты-Мансийск, Черкесск, Чита, Элиста, Южно-Сахалинск, Якутск.
										<br />
										<br />
										К данной тарифной зоне также относятся: <br />
										- города/населённые пункты Ленинградской области находящиеся до 200 км от КАД Санкт-Петербурга;<br />
										Уточняйте у оператора о возможности курьерской доставки в требуемый вам город/населённый пункт.
										<br />
										<br />
										<strong>Россия 4:</strong> Анадырь, Магадан, Мирный, Надым, Нарьян-Мар, Радужный, Салехард.
										<br />
										<br />
										К данной тарифной зоне также относятся: <br />
										- города/населённые пункты Ленинградской области находящиеся далее 200 км от КАД Санкт-Петербурга;<br />
										Уточняйте у оператора о возможности курьерской доставки в требуемый вам город/населённый пункт.
										<br />
									    <br />
										- Срок доставки указан в рабочих днях стран: <a class="tt" title="Отправитель::" href="./inform#art_7">отправителя</a>, транзита и <a class="tt" title="Получатель::" href="./inform#art_8">получателя</a>. День приёма отправления к доставке - не учитывается.
										<br />
										<br />
										- Тариф рассчитывается за вес <a class="tt" title="Отправление считается готовым к пересылке::" href="./inform#art_27">отправления готового к пересылке</a>. Фирменный конверт «Unipost-Express» вмещает 0,70 кг документации формата А4. Конверт «Unipost-Express» вместе с бланком почтовой накладной весит 0,09 кг.
										<br />
										<br />
										Тарифы за доставку отправлений категории: НЕ ДОКУМЕНТЫ (<a href="./inform#art_25" title="Содержимое NDOCS::" class="tt">NDOCS</a>)  и  ДОКУМЕНТЫ (<a href="./inform#art_34" title="Содержимое DOCS::" class="tt">DOCS</a>) свыше 5,00 кг, вы можете узнать сделав <a class="online_help" href="#">он-лайн запрос </a> на сайте или позвонив нам в офис.
									</p>
							</div>			
						<!-- TAB #4 ==================================================================== -->
							<div id="tabs1-4">
								<p class="prices_right">
									<strong>Международная курьерская экспресс доставка по территории Белоруссии:</strong>
								<br />
								<br />
								Тариф указан в <span style="color: #a50006;">ЕВРО/EUR</span>. Оплата производится в молдавских леях по соотношению к ЕВРО по курсу 
								НБМ на день приёма отправления к доставке. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>30 AND country<=40");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											Остальная территория Белоруссии - всегда уточняйте у оператора о возможности курьерской доставки в требуемый вам населённый пункт.
                                            <br />
									        <br />
										    - Срок доставки указан в рабочих днях стран: <a class="tt" title="Отправитель::" href="./inform#art_7">отправителя</a>, транзита и <a class="tt" title="Получатель::" href="./inform#art_8">получателя</a>. День приёма отправления к доставке - не учитывается.
											<br />
											<br />
											- Тариф рассчитывается за вес <a class="tt" title="Отправление считается готовым к пересылке::" href="./inform#art_27">отправления готового к пересылке</a>. Фирменный конверт «Unipost-Express» вмещает 0,70 кг документации формата А4. Конверт «Unipost-Express» вместе с бланком почтовой накладной весит 0,09 кг.
										    <br />
										    <br />
										    Тарифы за доставку отправлений категории: НЕ ДОКУМЕНТЫ (<a href="./inform#art_25" title="Содержимое NDOCS::" class="tt">NDOCS</a>)  и  ДОКУМЕНТЫ (<a href="./inform#art_34" title="Содержимое DOCS::" class="tt">DOCS</a>) свыше 5,00 кг, вы можете узнать сделав <a class="online_help" href="#">он-лайн запрос </a> на сайте или позвонив нам в офис.
									</p>
							</div>			
						<!-- TAB #5 ==================================================================== -->
							<div id="tabs1-5">
								<p class="prices_right">
									<strong>Международная курьерская экспресс доставка по территории Казахстана:</strong>
								<br />
								<br />
								Тариф указан в <span style="color: #a50006;">ЕВРО/EUR</span>. Оплата производится в молдавских леях по соотношению к ЕВРО по курсу 
								НБМ на день приёма отправления к доставке. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>40 AND country<=50");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											<strong>Казахстан 1:</strong> Астана, Кзыл-Орда, Караганда, Семипалатинск, Тараз, Шымкент, Талды-Курган, Кустанай, Павлодар.
											<br />
											<br />
											<strong>Казахстан 2:</strong> Актау, Атырау, Уральск, Актюбинск, Петропавловск, и остальные города. 
											<br />
											Всегда уточняйте у оператора о возможности курьерской доставки в требуемый вам населённый пункт.
											<br />
									        <br />
										    - Срок доставки указан в рабочих днях стран: <a class="tt" title="Отправитель::" href="./inform#art_7">отправителя</a>, транзита и <a class="tt" title="Получатель::" href="./inform#art_8">получателя</a>. День приёма отправления к доставке - не учитывается.
											<br />
											<br />
											- Тариф рассчитывается за вес <a class="tt" title="Отправление считается готовым к пересылке::" href="./inform#art_27">отправления готового к пересылке</a>. Фирменный конверт «Unipost-Express» вмещает 0,70 кг документации формата А4. Конверт «Unipost-Express» вместе с бланком почтовой накладной весит 0,09 кг.
										    <br />
										    <br />
										    Тарифы за доставку отправлений категории: НЕ ДОКУМЕНТЫ (<a href="./inform#art_25" title="Содержимое NDOCS::" class="tt">NDOCS</a>)  и  ДОКУМЕНТЫ (<a href="./inform#art_34" title="Содержимое DOCS::" class="tt">DOCS</a>) свыше 5,00 кг, вы можете узнать сделав <a class="online_help" href="#">он-лайн запрос </a> на сайте или позвонив нам в офис.
									</p>
						</div>

<?php	 
	echo JHtml::_('tabs.panel', JText::_('PANEL_2_TITLE'), 'service_2');
?>
								<p class="prices_right">
									<strong>Международная курьерская экспресс доставка в более 200 стран мира:</strong>
									<br />
									<br />
									Letter Express - тариф для доставки <a class="tt" title="Курьерское экспресс отправление/Отправление::" href="./inform#art_2">международных курьерских экспресс отправлений</a> содержащих - <a href="./inform#art_34" title="Содержимое DOCS::" class="tt">ДОКУМЕНТЫ/DOCS</a> и упакованные в фирменный конверт «Unipost-Express». Вес отправляемых ДОКУМЕНТОВ не должен превышать 0,40 кг. Конверт «Unipost-Express» вместе с почтовой накладной весит 0,09 кг. Общий вес отправления Letter Express не должен превышать 0,49 кг.
                                    <br />
								    <br />
								    Тариф указан в <span style="color: #a50006;">ЕВРО/EUR</span>. Оплата производится в молдавских леях по соотношению к ЕВРО по курсу 
								    НБМ на день приёма отправления к доставке.									
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>100 AND country<=400 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight05);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											* - Срок доставки указан в рабочих днях стран: <a class="tt" title="Отправитель::" href="./inform#art_7">отправителя</a>, транзита и <a class="tt" title="Получатель::" href="./inform#art_8">получателя</a>. День приёма отправления к доставке - не учитывается.
											<br />
											<br />
											- Тариф рассчитывается за вес <a class="tt" title="Отправление считается готовым к пересылке::" href="./inform#art_27">отправления готового к пересылке</a>. Фирменный конверт «Unipost-Express» вмещает 0,70 кг документации формата А4. Конверт «Unipost-Express» вместе с бланком почтовой накладной весит 0,09 кг.
											<br />
											<br />
											Тарифы за доставку отправлений категории: НЕ ДОКУМЕНТЫ (<a href="./inform#art_25" title="Содержимое NDOCS::" class="tt">NDOCS</a>)  и  ДОКУМЕНТЫ (<a href="./inform#art_34" title="Содержимое DOCS::" class="tt">DOCS</a>) свыше 0,5 кг, вы можете узнать воспользовавшись <a href="./?do=calc">тарифным калькулятором</a>. 
											<br />
											<br />
											Если вы не обнаружили в таблице требуемую вам страну, тогда контактируйте с нашим  оператором по <a href="./contacts">телефону</a> или  узнайте, с помощью <a class="online_help" href="#">он-лайн запроса</a>, обслуживаем ли мы нужную вам страну.
									</p>
<?php
	echo JHtml::_('tabs.panel', JText::_('PANEL_3_TITLE'), 'service_3');
?>
<div id="page_tabs3">
							<ul>
								<li><a class="tab" href="#tabs3-1"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_1_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs3-2"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_2_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs3-3"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_3_TITLE'); ?></a></li>
							</ul>
						<!-- TAB #1 ==================================================================== -->				
							<div id="tabs3-1">
								<p class="prices_right">
									Экспресс-тариф: доставка в адрес получателя в течении 3-х часов после принятия отправления в офисе отправителя. Заявки принимаются только до 13-00.<br />
									Отправления вручаются под ФИО/Подпись/Печать.
									<br />    
									<br />    
									Стандартный тариф: доставка в адрес получателя на следующий день до 12-00 часов после дня принятия отправления в офисе отправителя.<br />
									Отправления вручаются под ФИО/Подпись/Печать.
									<br>
									<br>
									Тариф указан в <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>400 AND country<=425 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- в указанные тарифы входит созвон с получателем для уточнения графика работы и прочего;
											<br />
											<br />
											- ожидание курьером получателя на адресе доставки  – до 5-ти  минут. 
											<br>
											<br>
											Если вы заинтересованы в адресной доставке, под подпись получателя, большого количества отправлений, тогда <a href="./?do=reg_sec" >заполните анкету</a>
									</p>
							</div>
						<!-- TAB #3 ==================================================================== -->				
							<div id="tabs3-2">
								<p class="prices_right">
									Экспресс-тариф: доставка в адрес получателя в течении 3-х часов после принятия отправления в офисе отправителя. Заявки принимаются только до 13-00.<br />
									Отправления вручаются под ФИО/Подпись/Печать.
									<br />    
									<br />    
									Стандартный тариф: доставка в адрес получателя на следующий день до 12-00 часов после дня принятия отправления в офисе отправителя.<br />
									Отправления вручаются под ФИО/Подпись/Печать.
									<br>
									<br>
									Тариф указан в <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>425 AND country<=450 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- в указанные тарифы входит созвон с получателем для уточнения графика работы и прочего;
											<br />
											<br />
											- ожидание курьером получателя на адресе доставки  – до 5-ти  минут.
                                            <br>
											<br>
											Если вы заинтересованы в адресной доставке, под подпись получателя, большого количества отправлений, тогда <a href="./?do=reg_sec" >заполните анкету</a>											
									</p>
							</div>
						<!-- TAB #3 ==================================================================== -->				
							<div id="tabs3-3">
								<p class="prices_right">
									Экспресс-тариф: доставка в адрес получателя в течении 3-х часов после принятия отправления в офисе отправителя. Заявки принимаются только до 13-00.<br />
									Отправления вручаются под ФИО/Подпись/Печать.
									<br />    
									<br />    
									Стандартный тариф: доставка в адрес получателя на следующий день до 12-00 часов после дня принятия отправления в офисе отправителя.<br />
									Отправления вручаются под ФИО/Подпись/Печать.
									<br>
									<br>
									Тариф указан в <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>450 AND country<=475 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- в указанные тарифы входит созвон с получателем для уточнения графика работы и прочего;
											<br />
											<br />
											- ожидание курьером получателя на адресе доставки  – до 5-ти  минут. 
											<br>
											<br>
											Если вы заинтересованы в адресной доставке, под подпись получателя, большого количества отправлений, тогда <a href="./?do=reg_sec" >заполните анкету</a>
									</p>
							</div>
</div>
<?php
echo JHtml::_('tabs.end');
?>
		<div id="clear"></div>
	</div>

	<?php } elseif ($lang->getTag() == 'ro-RO') { ?>
	<div class="page_prices">
		<h1 class="prices_title"><?php echo JText::_('PAGE_PRICES_TITLE'); ?></h1>
		<div id="clear"></div>
<p class="sub">Tarifele pentru serviciile prestate</p>

<?php
echo JHtml::_('tabs.start', 'services_tab_nav', $options);
echo '<div id="clear"></div>';
	echo JHtml::_('tabs.panel', JText::_('PANEL_1_TITLE'), 'service_1');
?>
<p class="prices_right">
	Asociați-vă cu noi pentru a realiza economii!!!<br />
	beneficiați de reduceri 5% la expedirea <a href="./inform#art_34" title="Conținutul DOCS::" class="tt">DOCUMENTELOR/DOCS</a> din oficiul «Unipost-Express».
<br />
	Prezenta ofertă este valabilă la expediere în: <br />România, Ucraina, Rusia, Belarus și Kazahstan.
<br />
<br />
</p>
<div id="page_tabs">
							<ul>
								<li><a class="tab" href="#tabs1-1"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_1_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-2"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_2_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-3"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_3_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-4"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_4_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-5"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_5_TITLE'); ?></a></li>
							</ul>
						<!-- TAB #1 ==================================================================== -->				
							<div id="tabs1-1">
								<p class="prices_right">
									<strong>Curierat rapid international de livrări pe teritoriul României:</strong>
								<br />
								<br />
								Tariful este indicat în <span style="color: #a50006;">EURO/EUR</span>. Achitarea se efectuează în lei moldovenești la rata 
								BNM în ziua primirii coletului pentru livrare. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>0 AND country<=10");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- Termenul livrării este indicat în zile lucrătoare din țările: <a class="tt" title="Expeditoru::" href="./inform#art_7">expeditorului</a>, de tranzit și ale <a class="tt" title="Destinatar::" href="./inform#art_8">destinatarului</a>. Ziua primirii coletului spre livrare - nu se ia în calcul.
											<br />
											<br />
											- Tariful este calculat în funcție de greutatea <a class="tt" title="Trimiterea este pregătită pentru expediere::" href="./inform#art_27">trimiterii pregătite pentru livrare</a>. Plicul de firmă «Unipost-Express» este prevăzut pentru 0,70 kg de documentație în formatul А4. Plicul «Unipost-Express» împreună cu formularul tip al facturii poștale cântărește 0,09 kg.
											<br />
											<br />
											Tarifele pentru livrarea coletelor de categoriile: NON DOCUMENTE (<a href="./inform#art_25" title="Conținutul NDOCS::" class="tt">NDOCS</a>)  și DOCUMENTE (<a href="./inform#art_34" title="Conținutul DOCS::" class="tt">DOCS</a>) depășind 5,00 kg, le aflați prin <a class="online_help" href="#">interpelare on-line </a> pe site sau la telefonul oficiului. 
									</p>
							</div>
						<!-- TAB #2 ==================================================================== -->				
							<div id="tabs1-2">
								<p class="prices_right">
									<strong>Curierat rapid international de livrări pe teritoriul Ucrainei:</strong>
								<br />
								<br />
								Tariful este indicat <span style="color: #a50006;">EURO/EUR</span>. Achitarea se efectuează în lei moldovenești la rata 
								BNM în ziua primirii coletului pentru livrare. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>20 AND country<=30");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											<strong>Ucraina 1:</strong> Vinița, Dnepropetrovsk, Donețk, Jitomir, Zaporojie, Ivano-Francovsk, Kirovograd, Kremenciug, Krivoi Rog, Lugansk, Luțk, Lvov, Mariupol, Nikolaev, Poltava, Rovno, Sumî, Ternopol, Ujgorod, Harkov, Herson, Hmelnițlii, Cerkassî, Cernigov, Cernăuți.
											<br />
											<br />
											Restul teritoriului Ucrainei – întotdeauna precizați la operator oportunitățile de livrare în localitatea necesară dvs.
											<br />
									        <br />
										    - Termenul livrării este indicat în zile lucrătoare din țările: <a class="tt" title="Expeditor::" href="./inform#art_7">expeditorului</a>, de tranzit și <a class="tt" title="Destinatar::" href="./inform#art_8">destinatarului</a>. Ziua primirii coletului spre livrare - nu se ia în calcul.
											<br />
											<br />
											- Tariful este calculat în funcție de greutatea <a class="tt" title="Trimiterea este pregătită pentru expediere::" href="./inform#art_27">trimiterii pregătite pentru livrare</a>. Plicul de firmă «Unipost-Express» este prevăzut pentru 0,70 kg de documentație în formatul А4. Plicul «Unipost-Express» împreună cu formularul tip al facturii poștale cântărește 0,09 kg.
										    <br />
										    <br />
										    Tarifele pentru livrarea coletelor de categoriile: NON DOCUMENTE (<a href="./inform#art_25" title="Conținutul NDOCS::" class="tt">NDOCS</a>)  și DOCUMENTE (<a href="./inform#art_34" title="Conținutul DOCS::" class="tt">DOCS</a>) depășind 5,00 kg, le aflați prin <a class="online_help" href="#">interpelare on-line </a> pe site sau la telefonul oficiului.
									</p>
							</div>			
						<!-- TAB #3 ==================================================================== -->
							<div id="tabs1-3">
								<p class="prices_right">
									<strong>Curierat rapid international de livrări pe teritoriul Rusiei:</strong>
								<br />
								<br />
								Tariful este indicat în <span style="color: #a50006;">EURO/EUR</span>. Achitarea se efectuează în lei moldovenești la rata 
								BNM în ziua primirii coletului pentru livrare. 
								</p>
								<br />
								<?php
									
								?>
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>10 AND country<=20 ORDER BY country");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
										<strong>Rusia 1:</strong> Belgorod, Breansk, Velikii Novgorod, Vladimir, Volgograd, Vologda, Voronej, Ivanovo, Kazani, Kaluga, Kirov, Kostroma, Krasnodar, Kursk, Lipețk, Nijnii Novgorod, Oriol, Penza, Pskov, Rostov-pe-Don, Reazani, Samara, Saratov, Smolensk, Tambov, Tveri, Toliatti, Tula, Ceboksarî, Iaroslavl.
										<br />
										<br />
										La această zonă tarifară se referă la fel: <br />
										- orașele Regiunii Moscova, situate la 50 de km de la Șoseaua de Centură Moscova;<br />
										Precizați la operator oportunitățile de livrare în orașul/ localitatea necesară dvs.
										<br />
										<br />
										<strong>Rusia 2:</strong> Almetievsk, Arhanghelsk, Astrahan, Barnaul, Bor, Bugulma, Ekaterinburg, Ijevsk, Ioșkar-Ola, Kaliningrad, Kolpino, Krasnoiarsk, Magnitogorsk, Mineralinîie Vodî, Murmansk, Naberejnîe Celnî, Nijnekamsk, Nijnii Taghil, Novorossiisk, Novosibirsk, Omsk, Orenburg, Permi, Petrozavodsk, Piatigorsk, Saransk, Sarov, Soci, Stavropol, Starîi Oskol, Surgut, Sîktîvkar, Taganrog, Tomsk, Tiumen, Ulianovsk, Ufa, Celiabinsk, Cerepoveț.
										<br />
										<br />
										La această zonă tarifară se referă la fel: <br />
										- orașele Regiunii Moscova, situate mai departe de 50 de km de la Șoseaua de Centură Moscova;<br />
										- orașele/localitățile regiunii Leningrad, situate mai aproape de 50 de km de la Șoseaua de Centură Sankt-Petersburg;<br />
										Precizați la operator oportunitățile de livrare în orașul/ localitatea necesară dvs.
										<br />
										<br />
										<strong>Rusia 3:</strong> Abakan, Angarsk, Berezniki, Biisk, Birobidjan, Blagoveșcensk, Bratsk, Verhneea Pîșma, Verhneea Salda, Vladivostok, Vladikavkaz, Volgodonsk, Gorno-Altaisk, Groznîi, Essentuki, Irkutsk, Kamensk-Uralskii, Kemerovo, Kislovodsk, Komsomolsk-pe-Amur, Kurgan, Kîizîl, Maikop, Mahacikala, Miass, Nazran, Nalcik, Nevinnomîssk, Nijnevartovsk, Novokuznețk, Novouralsk, Novîi Urengoi, Norilsk, Noiabrsk, Pervouralsk, Petropavlovsk-Kamciatskii, Rubțovsk, Severodvinsk, Sterlitamak, Ulan-Ude, Usolie-Sibirskoe, Habarovsk, Hantî-Mansiisk, Cerkessk, Cita, Elista, Iujno-Sahalinsk, Iakutsk.
										<br />
										<br />
										La această zonă tarifară se referă la fel: <br />
										- orașele/localitățile regiunii Leningrad, situate mai aproape de 200 de km de la Șoseaua de Centură Sankt-Petersburg;<br />
										Precizați la operator oportunitățile de livrare în orașul/ localitatea necesară dvs.
										<br />
										<br />
										<strong>Rusia 4:</strong> Anadîri, Magadan, Mirnîi, Nadîm, Narian-Mar, Radujnîi, Salehard.
										<br />
										<br />
										La această zonă tarifară se referă la fel: <br />
										- orașele/localitățile regiunii Leningrad, situate mai departe de 200 de km de la Șoseaua de Centură Sankt-Petersburg;<br />
										Precizați la operator oportunitățile de livrare în orașul/ localitatea necesară dvs.
										<br />
									    <br />
										- Termenul livrării este indicat în zile lucrătoare din țările: <a class="tt" title="Expeditor::" href="./inform#art_7">expeditorului</a>, de tranzit și <a class="tt" title="Destinatar::" href="./inform#art_8">destinatarului</a>. Ziua primirii coletului spre livrare - nu se ia în calcul.
										<br />
										<br />
										- Tariful este calculat în funcție de greutatea <a class="tt" title="Trimiterea este pregătită pentru expediere::" href="./inform#art_27">trimiterii pregătite pentru livrare</a>. Plicul de firmă «Unipost-Express» este prevăzut pentru 0,70 kg de documentație în formatul А4. Plicul «Unipost-Express» împreună cu formularul tip al facturii poștale cântărește 0,09 kg.
										<br />
										<br />
										Tarifele pentru livrarea coletelor de categoriile: NON DOCUMENTE (<a href="./inform#art_25" title="Conținutul NDOCS::" class="tt">NDOCS</a>)  și DOCUMENTE (<a href="./inform#art_34" title="Conținutul DOCS::" class="tt">DOCS</a>) depășind 5,00 kg, le aflați prin <a class="online_help" href="#">interpelare on-line </a> pe site sau la telefonul oficiului.
									</p>
							</div>			
						<!-- TAB #4 ==================================================================== -->
							<div id="tabs1-4">
								<p class="prices_right">
									<strong>Curierat rapid international de livrări pe teritoriul Belarusului:</strong>
								<br />
								<br />
								Tariful este indicat <span style="color: #a50006;">EURO/EUR</span>. Achitarea se efectuează în lei moldovenești la rata 
								BNM în ziua primirii coletului pentru livrare. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>30 AND country<=40");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											Restul teritoriului Belarusului - întotdeauna precizați la operator oportunitățile de livrare în localitatea necesară dvs.
                                            <br />
									        <br />
										    - Termenul livrării este indicat în zile lucrătoare din țările: <a class="tt" title="Expeditor::" href="./inform#art_7">expeditorului</a>, de trranzit și <a class="tt" title="Destinatar::" href="./inform#art_8">destinatarului</a>. Ziua primirii coletului spre livrare - nu se ia în calcul.
											<br />
											<br />
											- Tariful este calculat în funcție de greutatea <a class="tt" title="Trimiterea este pregătită pentru expediere::" href="./inform#art_27">trimiterii pregătite pentru livrare</a>. Plicul de firmă «Unipost-Express» este prevăzut pentru 0,70 kg de documentație în formatul А4. Plicul «Unipost-Express» împreună cu formularul tip al facturii poștale cântărește 0,09 kg.
										    <br />
										    <br />
										    Tarifele pentru livrarea coletelor de categoriile: NON DOCUMENTE (<a href="./inform#art_25" title="Conținutul NDOCS::" class="tt">NDOCS</a>)  și DOCUMENTE (<a href="./inform#art_34" title="Conținutul DOCS::" class="tt">DOCS</a>) depășind 5,00 kg, le aflați prin <a class="online_help" href="#">interpelare on-line </a> pe site sau la telefonul oficiului.
									</p>
							</div>			
						<!-- TAB #5 ==================================================================== -->
							<div id="tabs1-5">
								<p class="prices_right">
									<strong>Curierat rapid international de livrări pe teritoriul Kazahstanului:</strong>
								<br />
								<br />
								Tariful este indicat <span style="color: #a50006;">EURO/EUR</span>. Achitarea se efectuează în lei moldovenești la rata 
								BNM în ziua primirii coletului pentru livrare. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>40 AND country<=50");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											<strong>Kazahstan 1:</strong> Astana, Kîzîl-Orda, Karaganda, Semipalatinsk, Taraz, Șîmkent, Taldîkurgan, Kustanai, Pavlodar.
											<br />
											<br />
											<strong>Kazahstan 2:</strong> Aktau, Atîrau, Uralsk, Aktiubinsk, Petropavlovsk și alte orașe. 
											<br />
											Întotdeauna precizați la operator oportunitățile de livrare în localitatea necesară dvs.
											<br />
									        <br />
										    - Termenul livrării este indicat în zile lucrătoare din țările: <a class="tt" title="Expeditor::" href="./inform#art_7">expeditorului</a>, de trranzit și <a class="tt" title="Destinatar::" href="./inform#art_8">destinatarului</a>. Ziua primirii coletului spre livrare - nu se ia în calcul.
											<br />
											<br />
											- Tariful este calculat în funcție de greutatea <a class="tt" title="Trimiterea este pregătită pentru expediere::" href="./inform#art_27">trimiterii pregătite pentru livrare</a>. Plicul de firmă «Unipost-Express» este prevăzut pentru 0,70 kg de documentație în formatul А4. Plicul «Unipost-Express» împreună cu formularul tip al facturii poștale cântărește 0,09 kg.
										    <br />
										    <br />
										    Tarifele pentru livrarea coletelor de categoriile: NON DOCUMENTE (<a href="./inform#art_25" title="Conținutul NDOCS::" class="tt">NDOCS</a>)  și DOCUMENTE (<a href="./inform#art_34" title="Conținutul DOCS::" class="tt">DOCS</a>) depășind 5,00 kg, le aflați prin <a class="online_help" href="#">interpelare on-line </a> pe site sau la telefonul oficiului.
									</p>
						</div>

<?php	 
	echo JHtml::_('tabs.panel', JText::_('PANEL_2_TITLE'), 'service_2');
?>
								<p class="prices_right">
									<strong>Curierat rapid international de livrare în peste 200 de țări ale lumii:</strong>
									<br />
									<br />
									Letter Express - tariful pentru livrarea prin <a class="tt" title="Trimitere prin curierat rapid/Trimitere::" href="./inform#art_2">curierat rapid international  a expedierilor</a> ce conțin - <a href="./inform#art_34" title="Conținutul DOCS::" class="tt">DOCUMENTE/DOCS</a> și ambalate în plic de firmă «Unipost-Express». Greutatea DOCUMENTELOR expediate nu trebuie să depășească 0,40 kg. Plicul «Unipost-Express» împreună cu factura poștală cântărește 0,09 kg. Greutatea totală a coletului Letter Express nu trebuie să depășească 0,49 kg.
                                    <br />
								    <br />
								    Tariful este indicat <span style="color: #a50006;">EURO/EUR</span>. Achitarea se efectuează în lei moldovenești la rata 
								BNM în ziua primirii coletului pentru livrare.									
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>100 AND country<=400 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight05);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											* - termenul livrării este indicat în zile lucrătoare din țările: <a class="tt" title="Expeditor::" href="./inform#art_7">expeditorului</a>, de tranzit și <a class="tt" title="Destinatar::" href="./inform#art_8">destinatarului</a>. Ziua primirii coletului spre livrare - nu se ia în calcul.
											<br />
											<br />
											- Tariful este calculat în funcție de greutatea <a class="tt" title="Trimiterea este pregătită pentru expediere::" href="./inform#art_27">trimiterii pregătite pentru livrare</a>. Plicul de firmă «Unipost-Express» este prevăzut pentru 0,70 kg de documentație în formatul А4. Plicul «Unipost-Express» împreună cu formularul tip al facturii poștale cântărește 0,09 kg.
											<br />
											<br />
											Tarifele pentru livrarea coletelor de categoriile: NON DOCUMENTE (<a href="./inform#art_25" title="Conținutul NDOCS::" class="tt">NDOCS</a>)  și DOCUMENTE (<a href="./inform#art_34" title="Conținutul DOCS::" class="tt">DOCS</a>) depășind 0,5 kg, o puteți afla cu ajutorul <a href="./?do=calc">calculatorului tarifar</a>. 
											<br />
											<br />
											Dacă nu ați găsit în tabelă țara de care aveți nevoie, preluați legătura cu operatorul nostru <a href="./contacts">la telefon</a> sau aflați cu ajutorul <a class="online_help" href="#">interpelării on-line</a>, dacă noi deservim țara de care aveți nevoie.
									</p>
<?php
	echo JHtml::_('tabs.panel', JText::_('PANEL_3_TITLE'), 'service_3');
?>
<div id="page_tabs3">
							<ul>
								<li><a class="tab" href="#tabs3-1"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_1_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs3-2"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_2_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs3-3"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_3_TITLE'); ?></a></li>
							</ul>
						<!-- TAB #1 ==================================================================== -->				
							<div id="tabs3-1">
								<p class="prices_right">
									Tariful expres: livrarea pe adresa destinatarului timp de 3 ore după depunerea coletului la oficiul expeditorului. Comenzile sunt primite doar până la 13-00.<br />
									Coletele sunt înmânate destinatarului la prezentarea actului de identitate/contra semnătură/sigiliu.
									<br />    
									<br />    
									Tariful standard: livrarea pe adresa destinatarului până la 12:00 în următoarea zi după data primirii coletului la oficiul   expeditorului.<br />
									Coletele sunt înmânate destinatarului la prezentarea actului de identitate/contra semnătură/sigiliu.
									<br>
									<br>
									Tariful este indicat în <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>400 AND country<=425 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- în tarifele indicate este  inclus prețul legăturii telefonice cu destinatarul pentru precizarea graficului de lucru și altora;
											<br />
											<br />
											- timpul de așteptare a destinatarului de către curier pe adresa livrării – până la  5 minute. 
											<br>
											<br>
											Dacă sunteți cointeresat în livrarea pe adresă, contra semnătura destinatarului, a unui număr mai mare de colete, <a href="./?do=reg_sec" >completați ancheta</a>
									</p>
							</div>
						<!-- TAB #3 ==================================================================== -->				
							<div id="tabs3-2">
								<p class="prices_right">
									Tariful expres: livrarea pe adresa destinatarului timp de 3 ore după depunerea coletului la oficiul expeditorului. Comenzile sunt primite doar până la 13-00.<br />
									Coletele sunt înmânate destinatarului la prezentarea actului de identitate/contra semnătură/sigiliu.
									<br />    
									<br />    
									Tariful standard: livrarea pe adresa destinatarului până la 12:00 în următoarea zi după data primirii coletului la oficiul   expeditorului.<br />
									Coletele sunt înmânate destinatarului la prezentarea actului de identitate/contra semnătură/sigiliu.
									<br>
									<br>
									Tariful este indicat în <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>425 AND country<=450 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- în tarifele indicate este  inclus prețul legăturii telefonice cu destinatarul pentru precizarea graficului de lucru și altora;
											<br />
											<br />
											- timpul de așteptare a destinatarului de către curier pe adresa livrării – până la  5 minute. 
											<br>
											<br>
											Dacă sunteți cointeresat în livrarea pe adresă, contra semnătura destinatarului, a unui număr mai mare de colete, <a href="./?do=reg_sec" >completați ancheta</a>											
									</p>
							</div>
						<!-- TAB #3 ==================================================================== -->				
							<div id="tabs3-3">
								<p class="prices_right">
									Tariful expres: livrarea pe adresa destinatarului timp de 3 ore după depunerea coletului la oficiul expeditorului. Comenzile sunt primite doar până la 13-00.<br />
									Coletele sunt înmânate destinatarului la prezentarea actului de identitate/contra semnătură/sigiliu.
									<br />    
									<br />    
									Tariful standard: livrarea pe adresa destinatarului până la 12:00 în următoarea zi după data primirii coletului la oficiul   expeditorului.<br />
									Coletele sunt înmânate destinatarului la prezentarea actului de identitate/contra semnătură/sigiliu.
									<br>
									<br>
									Tariful este indicat în <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>450 AND country<=475 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- în tarifele indicate este  inclus prețul legăturii telefonice cu destinatarul pentru precizarea graficului de lucru și altora;
											<br />
											<br />
											- timpul de așteptare a destinatarului de către curier pe adresa livrării – până la  5 minute. 
											<br>
											<br>
											Dacă sunteți cointeresat în livrarea pe adresă, contra semnătura destinatarului, a unui număr mai mare de colete, <a href="./?do=reg_sec" >completați ancheta</a>
									</p>
							</div>
</div>
<?php
echo JHtml::_('tabs.end');
?>
		<div id="clear"></div>
	</div>


<?php } elseif ($lang->getTag() == 'en-GB') {  ?>
			<div class="page_prices">
		<h1 class="prices_title"><?php echo JText::_('PAGE_PRICES_TITLE'); ?></h1>
		<div id="clear"></div>
<p class="sub">Tariffs for offered services</p>

<?php
echo JHtml::_('tabs.start', 'services_tab_nav', $options);
echo '<div id="clear"></div>';
	echo JHtml::_('tabs.panel', JText::_('PANEL_1_TITLE'), 'service_1');
?>
<p class="prices_right">
	See US and save with us!!!<br />
	YOU can receive 5% discount for shipping <a href="./inform#art_34" title="Content DOCS::" class="tt">DOCUMENTS/DOCS</a> from «Unipost-Express» office.
<br />
	This offer is valid for shipments to: <br />Romania, Ukraine, Russia, Belorusia and Kazakhstan.
<br />
<br />
</p>
<div id="page_tabs">
							<ul>
								<li><a class="tab" href="#tabs1-1"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_1_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-2"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_2_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-3"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_3_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-4"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_4_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs1-5"><?php echo JText::_('PAGE_ADV_SERV_TAB_1_5_TITLE'); ?></a></li>
							</ul>
						<!-- TAB #1 ==================================================================== -->				
							<div id="tabs1-1">
								<p class="prices_right">
									<strong>International courier express delivery to Romania territory:</strong>
								<br />
								<br />
								Tariffs are indicated in <span style="color: #a50006;">EURO/EUR</span>. The payment is made in moldavian lei on the exchange rate of the EURO 
								NBM rate on the day the shipment was taken for delivery. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>0 AND country<=10");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- Term of delivery is specified in working days of the countries: <a class="tt" title="Sender::" href="./inform#art_7">sender</a>, transit and <a class="tt" title="Receiver::" href="./inform#art_8">receiver</a>. Receiving day of the shipment for delivery – is not taken into consideration.
											<br />
											<br />
											- Tariff is calculated for weight of the <a class="tt" title="Shipment is considered ready for the departure::" href="./inform#art_27">shipment ready for departure</a>. «Unipost-Express» company envelope can hold  0,70 kg of A4 documentation together with postal blank bill of landing that weights 0,09 kg.
											<br />
											<br />
											Tariffs for delivery of the shipments of category: NON DOCUMENTS (<a href="./inform#art_25" title="Content NDOCS::" class="tt">NDOCS</a>)  and DOCUMENTS (<a href="./inform#art_34" title="Content DOCS::" class="tt">DOCS</a>) with weight over 5,00 kg, you can find out using <a class="online_help" href="#">online request </a> on the website and by contacting our office. 
									</p>
							</div>
						<!-- TAB #2 ==================================================================== -->				
							<div id="tabs1-2">
								<p class="prices_right">
									<strong>International courier express delivery on the Ukraine territory:</strong>
								<br />
								<br />
								Tariffs are indicated in <span style="color: #a50006;">EURO/EUR</span>. The payment is made in moldavian lei on the exchange rate of the EURO 
								NBM rate on the day the shipment was taken for delivery. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>20 AND country<=30");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											<strong>Ukraine 1:</strong> Vinnitsa, Dnepropetrovsk, Donetsk, Zhytomyr, Ivano-Frankivsk, Kirovohrad, Kremenchug, Krivoy Rog, Lugansk, Lutsk, Lviv, Mariupol, Nikolaev, Poltava, Rivne, Sumy, Ternopil, Uzhgorod, Kharkiv, Kherson, Khmelnytsky, Cherkasy, Chernihiv Chernivtsi.
											<br />
											<br />
											The rest of Ukraine territory – always specify at the operator about the possibility of courier delivery in the needed locality.
											<br />
									        <br />
										    - Term of delivery is specified in working days of the countries: <a class="tt" title="Sender::" href="./inform#art_7">sender</a>, transit and <a class="tt" title="Receiver::" href="./inform#art_8">receiver</a>. Receiving day of the shipment for delivery – is not taken into consideration.
											<br />
											<br />
											- Tariff is calculated for weight of the <a class="tt" title="Shipment is considered ready for the departure::" href="./inform#art_27">shipment ready for departure</a>. «Unipost-Express» company envelope can hold  0,70 kg of A4 documentation together with postal blank bill of landing that weights 0,09 kg.
											<br />
											<br />
											Tariffs for delivery of the shipments of category: NON DOCUMENTS (<a href="./inform#art_25" title="Content NDOCS::" class="tt">NDOCS</a>)  and DOCUMENTS (<a href="./inform#art_34" title="Content DOCS::" class="tt">DOCS</a>) with weight over 5,00 kg, you can find out using <a class="online_help" href="#">online request </a> on the website and by contacting our office. 
									</p>
							</div>			
						<!-- TAB #3 ==================================================================== -->
							<div id="tabs1-3">
								<p class="prices_right">
									<strong>International courier express delivery on the Russia teritory:</strong>
								<br />
								<br />
								Tariffs are indicated in <span style="color: #a50006;">EURO/EUR</span>. The payment is made in moldavian lei on the exchange rate of the EURO 
								NBM rate on the day the shipment was taken for delivery. 
								</p>
								<br />
								<?php
									
								?>
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>10 AND country<=20 ORDER BY country");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
										<strong>Russia 1:</strong> Belgorod, Bryansk, Novgorod, Vladimir, Volgograd, Vologda, Voronezh, Ivanovo, Kazan, Kaluga, Kirov, Kostroma, Moscow, Kursk, Lipetsk, Nizhny Novgorod, Orel, Penza, Pskov, Rostov-on-Don, Ryazan , Samara, Saratov, Smolensk, Tambov, Tver, Togliatti, Tula, Cheboksary, Yaroslavl.
										<br />
										<br />
										This tariff zone also icludes: <br />
										- Moscow city regions, situated till 50 km from Moscow Automobile Ring Road;<br />
										Specify at the operator about the possibility of courier delivery in the necessary for you city/locality.
										<br />
										<br />
										<strong>Russia 2:</strong> Almetyevsk, Arkhangelsk, Astrakhan, Barnaul, Bohr, Bugulma, Ekaterinburg, Izhevsk, Yoshkar-Ola, Kaliningrad, Kolpino, Krasnoyarsk, Magnitogorsk, Mineralnye Vody, Murmansk, Naberezhnye Chelny, Nizhnekamsk, Nizhniy Tagil, Novorossiysk, Novosibirsk, Omsk, Orenburg, Perm, Petrozavodsk, Pyatigorsk, Saransk, Sarov, Sochi, Stavropol, Stary Oskol, Surgut, Syktyvkar, Taganrog, Tomsk, Tyumen, Ulyanovsk, Ufa, Chelyabinsk, Cherepovets.
										<br />
										<br />
										This tariff zone also icludes: <br />
										- Moscow region cities, situated at 50 km from Moscow Automobile Ring Road;<br />
										- cities/localities of the Leningrad region situated till 50 km from Saint-Petersburg Ring Road;<br />
										Specify at the operator about the possibility of courier delivery in the necessary for you city/locality.
										<br />
										<br />
										<strong>Russia 3:</strong> Abakan, Angarsk, Berezniki, Voronezh, Birobidzhan, Blagoveshchensk, Bratsk, Pyshma, Verkhnyaya Salda, Vladivostok, Vladikavkaz, Volgodonsk, Gorno-Altaisk, Grozny, Gorno-Altaisk, Essentuki, Irkutsk, Kamensk-Ural, Kemerovo, Kislovodsk , Komsomolsk-on-Amur, Kurgan, Kyzyl, Maikop, Makhachkala, Miass, Nazran, Nalchik, Nevinnomyssk, Nizhnevartovsk, Novokuznetsk, Novoural'sk, Novy Urengoy, Norilsk, Noyabrsk, Pervouralsk, Petropavlovsk-Kamchatsky, Rubtsovsk, Severodvinsk, Sterlitamak, Ulan Ude, Sibirskoye, Khabarovsk, Khanty-Mansiysk, Cherkessk, Chita, Elista, Yuzhno-Sakhalinsk, Yakutsk.
										<br />
										<br />
										This tariff zone also icludes: <br />
										- cities/locations of the Leningrad region situated till 200 km from  Saint-Petersburg Ring Road;<br />
										Specify at the operator about the possibility of courier delivery in the necessary for you city/locality.
										<br />
										<br />
										<strong>Russia 4:</strong> Anadyr, Magadan, Mirny, Nadim, Naryan-Mar, Raduzhny, Salekhard.
										<br />
										<br />
										This tariff zone also icludes: <br />
										- cities/localities of the Leningrad region situated till 50 km from Saint-Petersburg Ring Road;<br />
										Specify at the operator about the possibility of courier delivery in the necessary for you city/locality.
										<br />
									    <br />
										- Term of delivery is specified in working days of the countries: <a class="tt" title="Sender::" href="./inform#art_7">sender</a>, transit and <a class="tt" title="Receiver::" href="./inform#art_8">receiver</a>. Receiving day of the shipment for delivery – is not taken into consideration.
										<br />
										<br />
										- Tariff is calculated for weight of the <a class="tt" title="Shipment is considered ready for the departure::" href="./inform#art_27">shipment ready for departure</a>. «Unipost-Express» company envelope can hold  0,70 kg of A4 documentation together with postal blank bill of landing that weights 0,09 kg.
										<br />
										<br />
										Tariffs for delivery of the shipments of category: NON DOCUMENTS (<a href="./inform#art_25" title="Content NDOCS::" class="tt">NDOCS</a>)  and DOCUMENTS (<a href="./inform#art_34" title="Content DOCS::" class="tt">DOCS</a>) with weight over 5,00 kg, you can find out using <a class="online_help" href="#">online request </a> on the website and by contacting our office. 
									</p>
							</div>			
						<!-- TAB #4 ==================================================================== -->
							<div id="tabs1-4">
								<p class="prices_right">
									<strong>International courier express delivery on the Belorussia teritory:</strong>
								<br />
								<br />
								Tariffs are indicated in <span style="color: #a50006;">EURO/EUR</span>. The payment is made in moldavian lei on the exchange rate of the EURO 
								NBM rate on the day the shipment was taken for delivery. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>30 AND country<=40");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											The rest of Belorussia teritory – always specify at the operator the posibility of courier shipment to the needed location.
                                            <br />
									        <br />
										    - Term of delivery is specified in working days of the countries: <a class="tt" title="Sender::" href="./inform#art_7">sender</a>, transit and <a class="tt" title="Receiver::" href="./inform#art_8">receiver</a>. Receiving day of the shipment for delivery – is not taken into consideration.
										    <br />
										    <br />
										    - Tariff is calculated for weight of the <a class="tt" title="Shipment is considered ready for the departure::" href="./inform#art_27">shipment ready for departure</a>. «Unipost-Express» company envelope can hold  0,70 kg of A4 documentation together with postal blank bill of landing that weights 0,09 kg.
										    <br />
										    <br />
										    Tariffs for delivery of the shipments of category: NON DOCUMENTS (<a href="./inform#art_25" title="Content NDOCS::" class="tt">NDOCS</a>)  and DOCUMENTS (<a href="./inform#art_34" title="Content DOCS::" class="tt">DOCS</a>) with weight over 5,00 kg, you can find out using <a class="online_help" href="#">online request </a> on the website and by contacting our office. 
									</p>
							</div>			
						<!-- TAB #5 ==================================================================== -->
							<div id="tabs1-5">
								<p class="prices_right">
									<strong>International courier express delivery on the Kazakhstan teritory:</strong>
								<br />
								<br />
								Tariffs are indicated in <span style="color: #a50006;">EURO/EUR</span>. The payment is made in moldavian lei on the exchange rate of the EURO 
								NBM rate on the day the shipment was taken for delivery. 
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_FIRST_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>40 AND country<=50");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->weight05);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											<strong>Kazakhstan 1:</strong> Astana, Kyzyl-Orda, Karaganda, Semipalatinsk, Taraz, Shymkent, Taldykorgan, Kostanay, Pavlodar.
											<br />
											<br />
											<strong>Kazakhstan 2:</strong> Aktau, Atyrau, Uralsk, Aktobe, Petropavlovsk, and the rest of the city. 
											<br />
											Specify at the operator about the possibility of courier delivery in the necessary for you locality.
											<br />
									        <br />
										    - Term of delivery is specified in working days of the countries: <a class="tt" title="Sender::" href="./inform#art_7">sender</a>, transit and <a class="tt" title="Receiver::" href="./inform#art_8">receiver</a>. Receiving day of the shipment for delivery – is not taken into consideration.
										    <br />
										    <br />
										    - Tariff is calculated for weight of the <a class="tt" title="Shipment is considered ready for the departure::" href="./inform#art_27">shipment ready for departure</a>. «Unipost-Express» company envelope can hold  0,70 kg of A4 documentation together with postal blank bill of landing that weights 0,09 kg.
										    <br />
										    <br />
										    Tariffs for delivery of the shipments of category: NON DOCUMENTS (<a href="./inform#art_25" title="Content NDOCS::" class="tt">NDOCS</a>)  and DOCUMENTS (<a href="./inform#art_34" title="Content DOCS::" class="tt">DOCS</a>) with weight over 5,00 kg, you can find out using <a class="online_help" href="#">online request </a> on the website and by contacting our office. 
									</p>
						</div>

<?php	 
	echo JHtml::_('tabs.panel', JText::_('PANEL_2_TITLE'), 'service_2');
?>
								<p class="prices_right">
									<strong>International corier express delivery in more than 200 of the wold countries:</strong>
									<br />
									<br />
									Letter Express - tariff for delivery of <a class="tt" title="Courier express shipment/Shipment::" href="./inform#art_2">international courier express shipments</a> that contain - <a href="./inform#art_34" title="Content DOCS::" class="tt">DOCUMENTATION/DOCS</a> and packaged in «Unipost-Express» company envelope. The weight of delivered DOCUMENTATION should not be more than 0,40 kg. Envelope «Unipost-Express» together with postal invoice weights 0,09 kg. The total weight of the shipment Letter Express should not be more than 0,49 kg.
                                    <br />
								    <br />
								    Tariffs are indicated in <span style="color: #a50006;">EURO/EUR</span>. The payment is made in moldavian lei on the exchange rate of the EURO 
								NBM rate on the day the shipment was taken for delivery.									
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_3_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>100 AND country<=400 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->period);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight05);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
									
											- Term of delivery is specified in working days of the countries: <a class="tt" title="Sender::" href="./inform#art_7">sender</a>, transit and <a class="tt" title="Receiver::" href="./inform#art_8">receiver</a>. Receiving day of the shipment for delivery – is not taken into consideration.
										    <br />
										    <br />
										    - Tariff is calculated for weight of the <a class="tt" title="Shipment is considered ready for the departure::" href="./inform#art_27">shipment ready for departure</a>. «Unipost-Express» company envelope can hold  0,70 kg of A4 documentation together with postal blank bill of landing that weights 0,09 kg.
										    <br />
										    <br />
										    Tariffs for delivery of the shipments of category: NON DOCUMENTS (<a href="./inform#art_25" title="Content NDOCS::" class="tt">NDOCS</a>)  and DOCUMENTS (<a href="./inform#art_34" title="Content DOCS::" class="tt">DOCS</a>) with weight over 0,5 kg, you can find out using <a href="./?do=calc">tariff calculator</a>
										    <br />
										    <br />
										    If you did not find the necessary country in the table, than contact our operator on the <a href="./contacts">phone</a> or find out by <a class="online_help" href="#">online request</a>, if we serve the country you need.
									</p>
<?php
	echo JHtml::_('tabs.panel', JText::_('PANEL_3_TITLE'), 'service_3');
?>
<div id="page_tabs3">
							<ul>
								<li><a class="tab" href="#tabs3-1"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_1_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs3-2"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_2_TITLE'); ?></a></li>
								<li><a class="tab" href="#tabs3-3"><?php echo JText::_('PAGE_ADV_SERV_TAB_3_3_TITLE'); ?></a></li>
							</ul>
						<!-- TAB #1 ==================================================================== -->				
							<div id="tabs3-1">
								<p class="prices_right">
									Express-tariff: delivery to the recipient address in term of 3 hours after taking the shipment for delivery in the sender office. Applications are taken only till 13-00.<br />
									The shipments are handled out under Name/Signature/Stamp.
									<br />    
									<br />    
									Standart tariff: delivery to the recipient address on the next day till 12-00  after day of taking the shipment in the sender office.<br />
									The shipments are handled out under Name/Signature/Stamp.
									<br>
									<br>
									Tariff is indicated in <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>400 AND country<=425 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- indicated tariffs include calling the recipient to clarify schedule and other things;
											<br />
											<br />
											- the courier will wait the receiver on the address of delivery - till 5 minutes; 
											<br>
											<br>
											If you are interested in the address delivery of large number of shipments, under the receiver's signature then, <a href="./?do=reg_sec" >fill in the form</a>
									</p>
							</div>
						<!-- TAB #3 ==================================================================== -->				
							<div id="tabs3-2">
								<p class="prices_right">
									Express-tariff: delivery to the recipient address in term of 3 hours after taking the shipment for delivery in the sender office. Applications are taken only till 13-00.<br />
									The shipments are handled out under Name/Signature/Stamp.
									<br />    
									<br />    
									Standart tariff: delivery to the recipient address on the next day till 12-00  after day of taking the shipment in the sender office.<br />
									The shipments are handled out under Name/Signature/Stamp.
									<br>
									<br>
									Tariff is indicated in <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>425 AND country<=450 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- indicated tariffs include calling the recipient to clarify scedule and other things;
											<br />
											<br />
											- indicated tariffs include calling the recipient to clarify scedule and other things. 
											<br>
											<br>
											If you are interested in delivery to address, under recipient signature, many shipments, than  <a href="./?do=reg_sec" >fill in the form</a>											
									</p>
							</div>
						<!-- TAB #3 ==================================================================== -->				
							<div id="tabs3-3">
								<p class="prices_right">
									Express-tariff: delivery to the recipient address in term of 3 hours after taking the shipment for delivery in the sender office. Applications are taken only till 13-00.<br />
									The shipments are handled out under Name/Signature/Stamp.
									<br />    
									<br />    
									Standart tariff: delivery to the recipient address on the next day till 12-00  after day of taking the shipment in the sender office.<br />
									The shipments are handled out under Name/Signature/Stamp.
									<br>
									<br>
									Tariff is indicated in <span style="color: #a50006;">MDL</span>
								</p>
								<br />
								<p>
									<div id="clear"></div>
										<table class="prices">
												<tr>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_1_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_2_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_3_TITLE'); ?></th>
													<th><?php echo JText::_('PAGE_PRICES_MUN_TABLE_4_TITLE'); ?></th>
												</tr>
											<?php
												$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__prices WHERE country>450 AND country<=475 ORDER BY country ASC");
													$track_package_WORLD = $db->loadObjectList();
												foreach($track_package_WORLD as $prices_val) {
													$db->getQuery(true);
													$db->setQuery("SELECT * FROM #__countries WHERE id=".$prices_val->country);
													$track_package_Country = $db->loadObject();
													print "<tr>";
													printf("<td>%s</td>",$track_package_Country->$cur_lang);
													printf("<td>%s</td>",$prices_val->econom);
													printf("<td>%s</td>",$prices_val->weight10);
													printf("<td>%s</td>",$prices_val->weight_inc);
													print "</tr>";
												}
											?>
										</table>
								</p>
								<br />
									<p class="prices_right">
											- indicated tariffs include calling the recipient to clarify scedule and other things;
											<br />
											<br />
											- indicated tariffs include calling the recipient to clarify scedule and other things. 
											<br>
											<br>
											If you are interested in delivery to address, under recipient signature, many shipments, than  <a href="./?do=reg_sec" >fill in the form</a>											
									</p>
							</div>
</div>
<?php
echo JHtml::_('tabs.end');
?>
		<div id="clear"></div>
	</div>


		<?php } ?>