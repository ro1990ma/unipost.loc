			<?php 
				//Form Parameters
				//unipost.redirect@gmail.com
				$recipient = 'unipost.redirect@gmail.com';
				$first_form_fromName = 'Unipost.MD Support';
				$first_form_pre_text = JText::_('YOUR_QUESTION_3');
				$fromEmail = 'info@unipost.md';
				$require = JText::_('REQUIRED');
				$require_mail = JText::_('REQUIRED_MAIL');
				$url = $_SERVER['REQUEST_URI'];
				$url = htmlentities($url, ENT_COMPAT, "UTF-8"); 
                                
                                
                                $count_mest=$this->params->get('kol_mest');
                                $count_mest_def=$this->params->get('kol_mest_def');
                                
                                



	if (isset($_POST["first_form_submit"])) {

		    		$first_form_Subject = 'Заказ с сайта Unipost.md';
		//start page1
				    $first_form_Company = $_POST["req_from_company"];
				    $first_form_Contact_pers = $_POST["req_from_contact_pers"];
				    $first_form_Country = $_POST["req_from_country"];
					$first_form_Index = $_POST["req_from_index"];
					$first_form_Adress = $_POST["req_from_adress"];
					$first_form_Tel = $_POST["req_from_tel"];
					$first_form_Email = $_POST["req_from_mail"];
					$first_form_Info = $_POST["req_from_use_info"];
		//end page1

		//start page2
				    $first_form_Company_to = $_POST["req_to_company"];
				    $first_form_Contact_pers_to = $_POST["req_to_contact_pers"];
				    $first_form_Country_to = $_POST["req_to_country"];
					$first_form_Index_to = $_POST["req_to_index"];
					$first_form_Adress_to = $_POST["req_to_adress"];
					$first_form_Tel_to = $_POST["req_to_tel"];
					$first_form_Email_to = $_POST["req_to_mail"];
					$first_form_Info_to = $_POST["req_to_use_info"];
		//end page2

		//start page3
				    $req_to_country_sv = $_POST["req_to_country_sv"];
				    $calc_size_lenght = $_POST["calc_size_lenght"];
				    $calc_size_width = $_POST["calc_size_width"];
					$req_to_company_kg = $_POST["req_to_company_kg"];
                                        $req_to_contact_pers_otpr = $_POST["req_to_contact_pers_otpr"];
					$req_to_contact_pers_volume = $_POST["req_to_contact_pers_volume"];
					$req_to_mail_opisanie = $_POST["req_to_mail_opisanie"];
					$invoice_price = $_POST["invoice_price"];
					$select_currency = $_POST["select_currency"];
					$invoice_price2 = $_POST["invoice_price2"];
					$select_currency2 = $_POST["select_currency2"];
					//end page3
                                        
                                        $calc_size_lenght_gab = $_POST["calc_size_lenght_gab"];
					$calc_size_width_gab = $_POST["calc_size_width_gab"];
					$calc_size_height_gab = $_POST["calc_size_height_gab"];
                                        

                                        

					//start page4
					$req_to_date = $_POST["req_to_date"];
					$imia_fam = $_POST["imia_fam"];
					$kont_tel = $_POST["kont_tel"];
					$payer = $_POST["payer"];
					$sposob_oplati = $_POST["sposob_oplati"];
					$datepicker2 = $_POST["datepicker2"];
					$from_time = $_POST["from_time"];
					$to_time = $_POST["to_time"];
					//end page4

				
					//page1
					$lsBody1 .= "\n" . "Отправитель" . "\n";
					$lsBody1 .= 'Компания:'."$first_form_Company" . "\n";
					$lsBody1 .= 'Контактное лицо:'."$first_form_Contact_pers" . "\n";
					$lsBody1 .= 'Страна:'." $first_form_Country" . "\n";
					$lsBody1 .= 'Почтовый индекс:'." $first_form_Index" . "\n";
					$lsBody1 .= 'Адрес:'." $first_form_Adress" . "\n";
					$lsBody1 .= 'Телефон:'." $first_form_Tel" . "\n";
					$lsBody1 .= 'Электронная почта:'." $first_form_Email" . "\n";
					$lsBody1 .= 'Полезная информация:'." $first_form_Info" . "\n";
					//page2
					$lsBody1 .= "\n" . "Получатель" . "\n";
					$lsBody1 .= 'Компания:'."$first_form_Company_to" . "\n";
//					$lsBody1 .= 'Контактное лицо:'."$first_form_Contact_pers_to" . "\n";
					$lsBody1 .= 'Страна:'." $first_form_Country_to" . "\n";
					$lsBody1 .= 'Почтовый индекс:'." $first_form_Index_to" . "\n";
					$lsBody1 .= 'Адрес:'." $first_form_Adress_to" . "\n";
					$lsBody1 .= 'Телефон:'." $first_form_Tel_to" . "\n";
					$lsBody1 .= 'Электронная почта:'." $first_form_Email_to" . "\n";
					$lsBody1 .= 'Полезная информация:'." $first_form_Info_to" . "\n";
					//page3
					$lsBody1 .= "\n" . "Сведения об отправлении" . "\n";
					$lsBody1 .= 'Вид отправления:'."$req_to_country_sv" . "(1-документы, 0-недокументы)" . "\n";
//					$lsBody1 .= 'Кол-во мест:'."$calc_size_lenght" . "\n" . " Упаковка:" . "$calc_size_width" . "(0-не упакованы, 1-упакованы)" . "\n";
					$lsBody1 .= 'Кол-во мест:'."$calc_size_lenght" . "\n";
					$lsBody1 .= 'Вес кг.:'."$req_to_company_kg" . "\n";
					$lsBody1 .= 'Габариты:'."$calc_size_lenght_gab" . "X" . "$calc_size_width_gab" . "X" . "$calc_size_height_gab" . "\n";
                                        
                                        if($count_mest>1){
                                            for($i=2; $i<=$count_mest; $i++){
                                                if(isset($_POST["calc_size_lenght_gab_".$i])){
                                        $calc_size_lenght_gab_{$i} = $_POST["calc_size_lenght_gab_".$i];
					$calc_size_width_gab_{$i} = $_POST["calc_size_width_gab_".$i];
					$calc_size_height_gab_{$i} = $_POST["calc_size_height_gab_".$i]; 
                                        
//                                      $lsBody1 .= $calc_size_lenght_gab_{$i}."TTT";
                                        $lsBody1 .= 'Габариты:'.$i.' '.$calc_size_lenght_gab_{$i} . "X" . $calc_size_width_gab_{$i} . "X" . $calc_size_height_gab_{$i} . "\n";
                                            }}
                                        }
                                        
					$lsBody1 .= 'Контактное лицо:'."$req_to_contact_pers_otpr" . "\n";
					$lsBody1 .= 'Объёмный вес, кг:'."$req_to_contact_pers_volume" . "\n";
					$lsBody1 .= 'Описание содержимого:'."$req_to_mail_opisanie" . "\n";
					$lsBody1 .= "\n" . "Стоимость содержимого отправления" . "\n";
					$lsBody1 .= 'Инвойсная стоим. товара:'."$invoice_price" . "$select_currency" . "\n";
					$lsBody1 .= 'Объявленная стоимость:'."$invoice_price2" . "$select_currency2" . "\n";
					//start page4
					$lsBody1 .= "\n" . "Условия доставки" . "\n";
//					$lsBody1 .= 'Крайний срок доставки:'."$req_to_date" . "\n";
					$lsBody1 .= 'Имя, фамилия размещающего заказ:'."$imia_fam" . "\n";
					$lsBody1 .= 'Контактный номер телефона:'."$kont_tel" . "\n";
					$lsBody1 .= 'Плательщик:'."$payer" . "(0-Отправитель, 1-Получатель)" . "\n";
					$lsBody1 .= 'Способ оплаты:'."$sposob_oplati" . "(1-Наличные, 2-По счету, 3-договор)" . "\n";
					$lsBody1 .= 'Дата подбора от отправителя:'. "$datepicker2" . "\n";
					$lsBody1 .= 'Время подбора:'. "от " . "$from_time" . " до " . "$to_time" . "\n";
					//end page4
					$lsBody1 .= "-------------------------------------------------------------------" . "\n";
					
//                                        echo $lsBody1;
                                        
                                        
				    $mailSender = &JFactory::getMailer();
				    $mailSender->addRecipient($recipient);
				    $mailSender->setSender(array($fromEmail,$first_form_Name));
				    $mailSender->addReplyTo(array( $_POST["req_from_mail"], '' ));
				    $mailSender->setSubject($first_form_Subject);
				    $mailSender->setBody($lsBody1);

				    if ($mailSender->Send() !== true) {
				      $err_mesage1 = '<span style="color:#c00;font-weight:bold;">' . $first_form_errorText . '</span>';
				    }
				    else {
				      $err_mesage1 =  '<span style="font-weight:bold;">' . $first_form_pageText . '</span>';
				    }
				} // end if posted
				?>
  
<?php

defined('_JEXEC') or die;
$db = JFactory::getDbo();
$db->getQuery(true);
$db->setQuery("SELECT id,name_en FROM uni_countries ORDER BY name_en ASC");
$qr_countries_from = $db->loadObjectList();
$db->getQuery(true);
$db->setQuery("SELECT id,name_en FROM uni_countries ORDER BY name_en ASC");
$qr_countries_to = $db->loadObjectList();

?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<?php
     $lang =& JFactory::getLanguage();
     if($lang->getTag() == 'ru-RU'){
         $iazik="ru";
     }elseif($lang->getTag() == 'ro-RO'){
         $iazik="ro";
     }else{
        $iazik="en"; 
     }
     if($lang->getTag() == 'ru-RU'){ ?>
<script type="text/javascript">
jQuery(function(e){e.datepicker.regional.ru={closeText:"Закрыть",prevText:"&#x3C;Пред",nextText:"След&#x3E;",currentText:"Сегодня",monthNames:["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],monthNamesShort:["Янв","Фев","Мар","Апр","Май","Июн","Июл","Авг","Сен","Окт","Ноя","Дек"],dayNames:["воскресенье","понедельник","вторник","среда","четверг","пятница","суббота"],dayNamesShort:["вск","пнд","втр","срд","чтв","птн","сбт"],dayNamesMin:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],weekHeader:"Нед",dateFormat:"dd.mm.yy",firstDay:1,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},e.datepicker.setDefaults(e.datepicker.regional.ru)});
</script>
<?php } elseif($lang->getTag() == 'ro-RO'){ ?>
<script type="text/javascript">
jQuery(function(e){e.datepicker.regional.ro={closeText:"Închide",prevText:"&#x3C;Prec",nextText:"Urm&#x3E;",currentText:"Astăzi",monthNames:["Ianuarie","Fubruarie","Martie","Aprilie","Mai","Iunie","Iulie","August","Septembrie","Octombrie","Noiembrie","Decembrie"],monthNamesShort:["Ian","Feb","Mar","Apr","Mai","Iun","Iul","Aug","Sep","Oct","Noi","Dec"],dayNames:["duminică","luni","marți","miercuri","joi","vineri","sîmbătă"],dayNamesShort:["dum","lun","mar","mie","joi","lun","sîm"],dayNamesMin:["Dm","Ln","Ma","Mi","Joi","Vin","Sîm"],weekHeader:"Săp",dateFormat:"dd.mm.yy",firstDay:1,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},e.datepicker.setDefaults(e.datepicker.regional.ro)});
</script>
<?php } ?>



<script type="text/javascript">

	$(function() {
		$( "#datepicker" ).datepicker({
			showOn: "button",
			buttonImage: "<?php echo JURI::base();?>templates/rew/images/date_picker.png",
			buttonImageOnly: true,
			dateFormat: "dd.mm.yy",
			
		});
		$( "#datepicker2" ).datepicker({
			showOn: "button",
			buttonImage: "<?php echo JURI::root();?>templates/rew/images/date_picker.png",
			buttonImageOnly: true,
			dateFormat: "dd.mm.yy"
		});
	});
</script>

<script src="<?php echo JURI::base(); ?>templates/rew/js/jquery.multipage.js"></script>

	<script type="text/javascript">
		$(window).ready(function() {
			$('#multipage').multipage({
				'stayLinkable': false,      // whether or not the id of the page will be appended to the url as a hashtag for permalinking purposes
				'submitLabel': "<?php echo JText::_('SEND_PHORM'); ?>",    // default label for the last page's submit button, if not included in form
				'nextLabel': "<?php echo JText::_('SEND_NEXT'); ?>",
				'backLabel': "<?php echo JText::_('SEND_BACK'); ?>",
				'hideLegend': false,        // should the plugin hide the <legend> tags?  useful in concert with externally generated nav
				'hideSubmit': false,         // should the plugin hide the submit button?
				'generateNavigation': true, // should the plugin generate its own navigation buttons?
				'activeDot': '<div class="req_navigation_active"></div>',          // the dot used to represent an active page in the nav
				'inactiveDot': '<div class="req_navigation"></div>'       // the dot used to represent an inactive page in the nav
			});


			});

	</script>
	
	
	<div class="page_req">
		<h3 class="main_title"><?php echo JText::_('DO_REQ_TITLE'); ?></h3>
		<div id="clear"></div> 
	<div id="multi_req">
    <form id="multipage" name="first_form" action="<?php echo $url; ?>" method="post" class="form-validate" <?php echo $onsubmit; ?>> 
		<fieldset id="page1">
				<div class="field_desc"> 
				<p class="desc">
				<b style="color:red;"><?php echo JText::_('ATENTION'); ?></b><?php echo JText::_('UBEDITESI'); ?><a href="<?php echo "https://".$_SERVER['HTTP_HOST']."/".$iazik."/inform/?zap=1";?>" class="tt" title="<?php echo JText::_('VIDI_EXPRESS_OTPRAV'); ?>"><?php echo JText::_('SPISOK'); ?></a><?php echo JText::_('ILI'); ?><a href="<?php echo "https://".$_SERVER['HTTP_HOST']."/".$iazik."/inform/?zap=1";?>" class="tt" title="<?php echo JText::_('VIDI_EXPRESS_OTPRAV'); ?>"><?php echo JText::_('OGRANICHENIH_TOVAROV'); ?></a><?php echo JText::_('PREDMET_PERESILKA'); ?><br />
				<?php echo JText::_('UTOCHNITE_SROKI'); ?><br><strong style="color:red;">(022) 260 005 / 277027</strong>
				</p>
				</div>
			<div id="clear"></div>
				<table class="page_1">
					<tr>
						<td colspan="2"><label class="req_title"><?php echo JText::_('SENDER'); ?></label></td>
					</tr>
					<tr>						
						<td><p><?php echo JText::_('COMPANY_N'); ?></p></td>
						<td><input type="text" id="req_from_company" placeholder="<?php echo JText::_('COMPANY_N'); ?>" name="req_from_company" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('CONTACT_PERSSON_FIELD'); ?></p></td>
						<td><input type="text" id="req_from_contact_pers" placeholder="<?php echo JText::_('CONTACT_PERSSON_FIELD'); ?>" name="req_from_contact_pers" /></td>
					</tr>

					<tr>
						<td><p><?php echo JText::_('COUNTRY_IES'); ?></p></td>
						<td>


						<select id="country_list" name="req_from_country" onchange="selectState(this.options[this.selectedIndex].value)">
						   		<option value="-1" selected="selected"><?php echo JText::_('SELECT_COUNTRY'); ?></option>
						<?php
							foreach($qr_countries_from as $calc_price_val_from) {


								$country_name = $calc_price_val_from->name_en;

								if ($calc_price_val_from->name_en == 'Russia 1') {
									$country_name = 'RUSSIA-Moskow';
								} elseif ($calc_price_val_from->name_en == 'Russia 2') {
									$country_name = 'RUSSIA-St.Petersburg';
								} elseif ($calc_price_val_from->name_en == 'Russia 3') {
									$country_name = 'RUSSIA-Rest of territory';
								} elseif ($calc_price_val_from->name_en == 'Kazakhstan 1') {
									$country_name = 'KAZAKHSTAN-Almata';
								} elseif ($calc_price_val_from->name_en == 'Kazakhstan 2') {
									$country_name = 'KAZAKHSTAN-Rest of territory';
								} elseif ($calc_price_val_from->name_en == 'Odessa') {
									$country_name = 'UKRAINE-Odessa';
								} elseif ($calc_price_val_from->name_en == 'Ucraine 1') {
									$country_name = 'UKRAINE-Kiev';
								} elseif ($calc_price_val_from->name_en == 'Rest territory of Russia') {
									$country_name = 'RUSSIA-Rest of territory';
								} elseif ($calc_price_val_from->name_en == 'Rest territory of Ucraine') {
									$country_name = 'UKRAINE-Rest of territory';
								} elseif ($calc_price_val_from->name_en == 'Rest territory of Ucraine') {
									$country_name = 'UKRAINE-Rest of territory';
								} elseif ($calc_price_val_from->name_en == 'Kiev ') {
									$country_name = 'BELARUS-Minsk';
								} elseif ($calc_price_val_from->name_en == 'Rest territory of Belarus ') {
									$country_name = 'BELARUS-Rest of territory';
								} elseif ($calc_price_val_from->name_en == 'Bucharest') {
									$country_name = 'ROMANIA-Bucharest';
								} elseif ($calc_price_val_from->name_en == 'or.Chisinau - Sculeni') {
									$country_name = 'MOLDOVA-Chisianu';
								} elseif ($calc_price_val_from->name_en == 'Balti') {
									$country_name = 'MOLDOVA-Rest of territory';
								}



									if ($calc_price_val_from->name_en == 'Russia 3' || $calc_price_val_from->name_en == 'Alma-Ati' ||  $calc_price_val_from->name_en == 'Minsk'|| $calc_price_val_from->name_en == 'Moscow' || $calc_price_val_from->name_en == 'Saint-Petersburg' || $calc_price_val_from->name_en == 'Russia 4' || $calc_price_val_from->name_en == 'mun.Chisinau - Bacioi' ||$calc_price_val_from->name_en == 'mun.Chisinau - Bubueci' || $calc_price_val_from->name_en == 'mun.Chisinau - Budesti' || $calc_price_val_from->name_en == 'mun.Chisinau - Ciorescu' || $calc_price_val_from->name_en == 'mun.Chisinau - Codru' || $calc_price_val_from->name_en == 'mun.Chisinau - Colonita' || $calc_price_val_from->name_en == 'mun.Chisinau - Cricova' || $calc_price_val_from->name_en == 'mun.Chisinau - Cruzesti' || $calc_price_val_from->name_en == 'mun.Chisinau - Dobrogea' || $calc_price_val_from->name_en == 'mun.Chisinau - Dumbrava' || $calc_price_val_from->name_en == 'mun.Chisinau - Durlesti' || $calc_price_val_from->name_en == 'mun.Chisinau - Ghidighici' || $calc_price_val_from->name_en == 'mun.Chisinau - Gratiesti' || $calc_price_val_from->name_en == 'mun.Chisinau - Revaca' || $calc_price_val_from->name_en == 'mun.Chisinau - Singera' || $calc_price_val_from->name_en == 'mun.Chisinau - Stauceni' || $calc_price_val_from->name_en == 'mun.Chisinau - Tohatino' || $calc_price_val_from->name_en == 'mun.Chisinau - Truseni' || $calc_price_val_from->name_en == 'mun.Chisinau - Vadul lui Voda' || $calc_price_val_from->name_en == 'mun.Chisinau - Vatra' || $calc_price_val_from->name_en == 'or.Chisinau - Botanica' || $calc_price_val_from->name_en == 'or.Chisinau - Buiucani' || $calc_price_val_from->name_en == 'or.Chisinau - Center' || $calc_price_val_from->name_en == 'or.Chisinau - Ciocana' || $calc_price_val_from->name_en == 'or.Chisinau - raion Aeroport' || $calc_price_val_from->name_en == 'or.Chisinau - Rîșcani' || $calc_price_val_from->name_en == 'or.Chisinau - Telecentru' )  {
									} else {
								printf("<option value='%s'>%s</option>",$country_name,$country_name);
									}


				}
					?>
						</select>

							<p id="error_country" style="display:none;float:right; color:red;    margin: 10px 0;">Для того чтобы узнать стоимость доставки для городов которых нет в списке, просим Вас обратиться к нам по телефону.</p>

						</td>
					</tr>

					<tr>
						<td><p><?php echo JText::_('INDEX_POCHTA'); ?></p></td>
						<td><input type="text" id="req_from_index" placeholder="<?php echo JText::_('INDEX_POCHTA'); ?>" name="req_from_index" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('ADRESS'); ?></p></td>
						<td><input type="text" id="req_from_adress" placeholder="<?php echo JText::_('ADRESS'); ?>" name="req_from_adress" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('PHONE_FREE'); ?></p></td>
						<td><input type="text" id="req_from_tel" placeholder="<?php echo JText::_('PHONE_FREE'); ?>" name="req_from_tel" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('MAIL_PROPISI'); ?></p></td>
						<td><input type="text" id="req_from_mail" placeholder="<?php echo JText::_('MAIL_PROPISI'); ?>" name="req_from_mail" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('SPECIAL_INFO'); ?></p></td>
						<td><input type="text" id="req_from_use_info" placeholder="<?php echo JText::_('SPECIAL_INFO'); ?>" name="req_from_use_info" /></td>
					</tr>
				</table>
		</fieldset>

		<fieldset id="page2">
				<table class="page_2">
					<tr>
						<td colspan="2"><label class="req_title"><?php echo JText::_('POLUCHATELI'); ?></label></td>
					</tr>
					<tr>						
						<td><p><?php echo JText::_('COMPANY_N'); ?></p></td>
						<td><input type="text" id="req_to_company" placeholder="<?php echo JText::_('COMPANY_N'); ?>" name="req_to_company" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('CONTACT_PERSSON_FIELD'); ?></p></td>
						<td><input type="text" id="req_to_contact_pers" placeholder="<?php echo JText::_('CONTACT_PERSSON_FIELD'); ?>" name="req_to_contact_pers" /></td>
					</tr>

					<tr>
						<td><p><?php echo JText::_('COUNTRY_IES'); ?></p></td>
						<td>

						<select id="country_list_to"  name="req_to_country" onchange="selectState2(this.options[this.selectedIndex].value)">
						   		<option value="-1" selected="selected"><?php echo JText::_('COUNTRY_IES_SELECT'); ?></option>
						<?php 
							foreach($qr_countries_to as $calc_price_val_to) {
							

								$country_name2 = $calc_price_val_to->name_en;

								if ($calc_price_val_to->name_en == 'Russia 1') {
									$country_name2 = 'RUSSIA-Moskow';
								} elseif ($calc_price_val_to->name_en == 'Russia 2') {
									$country_name2 = 'RUSSIA-St.Petersburg';
								} elseif ($calc_price_val_to->name_en == 'Russia 3') {
									$country_name2 = 'RUSSIA-Rest of territory';
								} elseif ($calc_price_val_to->name_en == 'Kazakhstan 1') {
									$country_name2 = 'KAZAKHSTAN-Almata';
								} elseif ($calc_price_val_to->name_en == 'Kazakhstan 2') {
									$country_name2 = 'KAZAKHSTAN-Rest of territory';
								} elseif ($calc_price_val_to->name_en == 'Odessa') {
									$country_name2 = 'UKRAINE-Odessa';
								} elseif ($calc_price_val_to->name_en == 'Ucraine 1') {
									$country_name2 = 'UKRAINE-Kiev';
								} elseif ($calc_price_val_to->name_en == 'Rest territory of Russia') {
									$country_name2 = 'RUSSIA-Rest of territory';
								} elseif ($calc_price_val_to->name_en == 'Rest territory of Ucraine') {
									$country_name2 = 'UKRAINE-Rest of territory';
								} elseif ($calc_price_val_to->name_en == 'Rest territory of Ucraine') {
									$country_name2 = 'UKRAINE-Rest of territory';
								} elseif ($calc_price_val_to->name_en == 'Kiev ') {
									$country_name2 = 'BELARUS-Minsk';
								} elseif ($calc_price_val_to->name_en == 'Rest territory of Belarus ') {
									$country_name2 = 'BELARUS-Rest of territory';
								} elseif ($calc_price_val_to->name_en == 'Bucharest') {
									$country_name2 = 'ROMANIA-Bucharest';
								} elseif ($calc_price_val_to->name_en == 'Rest territory of Romania') {
									$country_name2 = 'ROMANIA-Rest of territory';
								} elseif ($calc_price_val_to->name_en == 'or.Chisinau - Sculeni') {
									$country_name2 = 'MOLDOVA-Chisianu';
								} elseif ($calc_price_val_to->name_en == 'Balti') {
									$country_name2 = 'MOLDOVA-Rest of territory';
								}


									if ($calc_price_val_to->name_en == 'Russia 3' || $calc_price_val_from->name_en == 'Alma-Ati' || $calc_price_val_to->name_en == 'Minsk'|| $calc_price_val_to->name_en == 'Moscow' || $calc_price_val_to->name_en == 'Saint-Petersburg' || $calc_price_val_to->name_en == 'Russia 4' || $calc_price_val_to->name_en == 'mun.Chisinau - Bacioi' ||$calc_price_val_to->name_en == 'mun.Chisinau - Bubueci' || $calc_price_val_to->name_en == 'mun.Chisinau - Budesti' || $calc_price_val_to->name_en == 'mun.Chisinau - Ciorescu' || $calc_price_val_to->name_en == 'mun.Chisinau - Codru' || $calc_price_val_to->name_en == 'mun.Chisinau - Colonita' || $calc_price_val_to->name_en == 'mun.Chisinau - Cricova' || $calc_price_val_to->name_en == 'mun.Chisinau - Cruzesti' || $calc_price_val_to->name_en == 'mun.Chisinau - Dobrogea' || $calc_price_val_to->name_en == 'mun.Chisinau - Dumbrava' || $calc_price_val_to->name_en == 'mun.Chisinau - Durlesti' || $calc_price_val_to->name_en == 'mun.Chisinau - Ghidighici' || $calc_price_val_to->name_en == 'mun.Chisinau - Gratiesti' || $calc_price_val_to->name_en == 'mun.Chisinau - Revaca' || $calc_price_val_to->name_en == 'mun.Chisinau - Singera' || $calc_price_val_to->name_en == 'mun.Chisinau - Stauceni' || $calc_price_val_to->name_en == 'mun.Chisinau - Tohatino' || $calc_price_val_to->name_en == 'mun.Chisinau - Truseni' || $calc_price_val_to->name_en == 'mun.Chisinau - Vadul lui Voda' || $calc_price_val_to->name_en == 'mun.Chisinau - Vatra' || $calc_price_val_to->name_en == 'or.Chisinau - Botanica' || $calc_price_val_to->name_en == 'or.Chisinau - Buiucani' || $calc_price_val_to->name_en == 'or.Chisinau - Center' || $calc_price_val_to->name_en == 'or.Chisinau - Ciocana' || $calc_price_val_to->name_en == 'or.Chisinau - raion Aeroport' || $calc_price_val_to->name_en == 'or.Chisinau - Rîșcani' || $calc_price_val_to->name_en == 'or.Chisinau - Telecentru')  {
									} else {
								printf("<option value='%s'>%s</option>",$country_name2,$country_name2);
									}

							}
						?>
						</select>
						<p id="error_country_to" style="display:none;float:right; color:red;    margin: 10px 0;">Для того чтобы узнать стоимость доставки для городов которых нет в списке, просим Вас обратиться к нам по телефону.</p>
						</td>
					</tr>

					<tr>
						<td><p><?php echo JText::_('INDEX_POCHTA'); ?></p></td>
						<td><input type="text" id="req_to_index" placeholder="<?php echo JText::_('INDEX_POCHTA'); ?>" name="req_to_index" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('ADRESS'); ?></p></td>
						<td><input type="text" id="req_to_adress" placeholder="<?php echo JText::_('ADRESS'); ?>" name="req_to_adress" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('PHONE_FREE'); ?></p></td>
						<td><input type="text" id="req_to_tel" placeholder="<?php echo JText::_('PHONE_FREE'); ?>" name="req_to_tel" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('MAIL_PROPISI'); ?></p></td>
						<td><input type="text" id="req_to_mail" placeholder="<?php echo JText::_('MAIL_PROPISI'); ?>" name="req_to_mail" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('SPECIAL_INFO'); ?></p></td>
						<td><input type="text" id="req_to_use_info" placeholder="<?php echo JText::_('SPECIAL_INFO'); ?>" name="req_to_use_info" /></td>
					</tr>
				</table>
		</fieldset>

		<fieldset id="page3">
				<div class="field">
					<label class="req_title"><?php echo JText::_('SVEDENIA'); ?><?php echo JText::_('SVEDENIA_SENDINGS'); ?></label>
				</div>
				<table class="page_3">
					<tr>
						<td><p><?php echo JText::_('VID_OTPRAV'); ?></p></td>
						<td colspan="3"><select id="req_to_country_sv" name="req_to_country_sv">
								<option value="1"><?php echo JText::_('DOCUMENTS'); ?></option>
								<option value="0"><?php echo JText::_('NOT_DOCUMENTS'); ?></option>
						</select></td>
					</tr>
                                        
<!--					<tr>
						<td><p><?php echo JText::_('COL_MEST'); ?></p></td>
						<td><input class="short" type="text" value="" placeholder="1" id="calc_size_lenght" name="calc_size_lenght" /></td>
						<td colspan="2"><input class="radio" type="radio" value="1" name="calc_size_width" checked="true" /><p><?php echo JText::_('UPAKOVANI'); ?></p>
							<input class="radio" type="radio" value="0" name="calc_size_width" /><p><?php echo JText::_('NE_UPAKOVANI'); ?></p></td>
					</tr>-->
                                       <?php 
//                                       $count_mest=$this->params->get('kol_mest');
//                                       $count_mest_def=$this->params->get('kol_mest_def');
//         
                                        ?>
                                        <tr>
						<td><p><?php echo JText::_('COL_MEST'); ?></p></td>
                                                
						<td colspan="1"><select class="calc_size_lenght" onchange="addMest()" id="calc_size_lenght" name="calc_size_lenght">
                                                        <?php 
//                                                        $count_mest=4;
                                                        
                                                        for($i=1; $i<=$count_mest; $i++){
                                                            if($i!=$count_mest_def)
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                            else
                                                            echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';    
                                                            
                                                        }
                                                        ?>
						
						</select>
                                                

                                                </td>
<!--                                                <td colspan="1"><input class="radio" type="radio" value="1" name="calc_size_width" checked="true" /><p><?php echo JText::_('UPAKOVANI'); ?></p>
                                                    <input class="radio" type="radio" value="0" name="calc_size_width" /><p><?php echo JText::_('NE_UPAKOVANI'); ?></p></td>-->
					</tr>

                                        
                                        
                                        
                                        
                                        
					<tr>
						<td><p><?php echo JText::_('VES_KG'); ?></p></td>
						<td colspan="3"><input type="text" id="req_to_company_kg" placeholder="0" name="req_to_company_kg" /></td>
					</tr>
					<tr id="gabariti_1">
                                                <input type="hidden" id="GABARITI" value="<?php echo JText::_('GABARITI'); ?>" name="GABARITI" />
                                                <input type="hidden" id="GABARITI_SM" value="<?php echo JText::_('GABARITI_SM'); ?>" name="GABARITI_SM" />
                                                <input type="hidden" id="LENGHT" value="<?php echo JText::_('LENGHT'); ?>" name="LENGHT" />
                                                <input type="hidden" id="WIDTH" value="<?php echo JText::_('WIDTH'); ?>" name="WIDTH" />
                                                <input type="hidden" id="HEIGHT" value="<?php echo JText::_('HEIGHT'); ?>" name="HEIGHT" />
						<td><p><?php echo JText::_('GABARITI'); ?> <?php echo JText::_('GABARITI_SM'); ?></p></td>
						<td colspan="3"><input class="short" type="text" id="len" onchange="setCalcHandle()" placeholder=" <?php echo JText::_('LENGHT'); ?>" name="calc_size_lenght_gab" /> x <input class="short" onchange="setCalcHandle()" id="wid" type="text" placeholder="<?php echo JText::_('WIDTH'); ?>" name="calc_size_width_gab" /> x <input class="short" id="hei" onchange="setCalcHandle()" type="text" placeholder="<?php echo JText::_('HEIGHT'); ?>" name="calc_size_height_gab" /></td>
					</tr>
<!--					<tr>
						<td><p><?php echo JText::_('CONTACT_PERSSON_FIELD'); ?></p></td>
						<td colspan="3"><input type="text" id="req_to_contact_pers_otpr" placeholder="<?php echo JText::_('CONTACT_PERSSON_FIELD'); ?>" name="req_to_contact_pers_otpr" /></td>
					</tr>-->
					<tr>
						<td><p><?php echo JText::_('VOLUME_KG'); ?></p></td>
						<td colspan="3"><input type="text" id="req_to_contact_pers_volume" readonly="readonly" placeholder="0,0" name="req_to_contact_pers_volume" /></td>

					</tr>
                                        <tr>

                                                <td colspan="2"><div id="weight2_error" style="display: none; color:red;  float: right;  width: 200px;  margin-top: 10px;  margin-left: 5px;">
                                                <?php echo JText::_("VOLUME_WEIGHT"); ?> 
                                                    </div></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('OPISANIE_SODERJANIE'); ?> <img class="pop_info tt" src="<?php echo JUri::base().'templates/'.$this->template.'/images/info.png';?>" title="<?php echo JText::_('OPIS_AND_KOL_SOD'); ?>" alt="info"></p></td>
                                                <td colspan="3"><input type="text" id="req_to_mail_opisanie" placeholder="<?php echo JText::_('OPISANIE_SODERJANIE'); ?>" name="req_to_mail_opisanie" /></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title"><?php echo JText::_('STOIMOSTI_SODERJ'); ?></label></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('INVOICE'); ?></p></td>
						<td style="width:100px;"><input class="short" type="text" placeholder="100" name="invoice_price" /></td>
						<td colspan="2"><select class="currency" id="select_currency" name="select_currency">
								<option value="eur">&euro;</option>
								<option value="dollar">&dollar;</option>
						</select></td>
					</tr>
					<tr>
             <td><p><!--<a href="./" class="tt" title="<?php echo JText::_('VIDI_EXPRESS_OTPRAV'); ?>">--><a href="<?php echo "https://".$_SERVER['HTTP_HOST']."/".$iazik."/inform/?zap=2";?>"><?php echo JText::_('STOIMOSTI_OBIAV'); ?></a></p></td>
						<td style="width:100px;"><input class="short" type="text" placeholder="100" name="invoice_price2" /></td>
						<td colspan="2"><select  class="currency" id="select_currency2" name="select_currency2">
								<option value="eur">&euro;</option>
								<option value="dollar">&dollar;</option>
						</select></td>
					</tr>
				</table>
		</fieldset>

        
                <fieldset id="page4">
                    
                    
 				<div class="field">
					<label class="req_title req_111"><?php echo JText::_('DANNIE_RAZMESH'); ?></label>
				</div>
                    				<table class="page_4">
					<tr>
						<td><p><?php echo JText::_('IMIA_FAM'); ?> *</p></td>
						<td><input type="text" id="imia_fam" required="required" placeholder="<?php echo JText::_('IMIA_FAM'); ?>" name="imia_fam" /></td>
					</tr>
                                        <tr>
						<td><p><?php echo JText::_('KONTAKT_TEL'); ?> *</p></td>
                                                <td><input type="text" id="kont_tel" required="required" placeholder="<?php echo JText::_('KONTAKT_TEL'); ?>" name="kont_tel" /></td>
					</tr>
                                                </table>
                </fieldset>   
        
        <input name="first_form_submit" id="send_form_zakaz" class="send_form" type="submit" value="<?php echo JText::_('SEND_FORM'); ?>"/>
		<fieldset id="page4" style="display:none;">
							<div class="field">
					<label class="req_title"><?php echo JText::_('USLOVIA_OTPR'); ?></label>
				</div>
				<table class="page_4">
					<tr>
						<td><p><?php echo JText::_('KRAINII_SROK'); ?></p></td>
						<td><input type="text" class="short" id="datepicker" placeholder="<?php echo date("d.m.Y",time()); ?>" name="req_to_date" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('PAYER'); ?></p></td>
						<td><input type="radio" name="payer" value="0" class="radio" checked="true" /><p><?php echo JText::_('SENDER'); ?></p></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="radio" name="payer" value="0" class="radio" /> <p><?php echo JText::_('POLUCHATELI'); ?></p></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('SPOSOB_OPLATI'); ?></p></td>
						<td><select id="sposob_oplati" name="sposob_oplati">
								<option value="1"><?php echo JText::_('NALICHKA'); ?></option>
								<option value="2"><?php echo JText::_('PO_SCHETU'); ?></option>
								<option value="3"><?php echo JText::_('DOGOVOR'); ?></option>
						</select></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('PODBOR_OTPR'); ?></p></td>
						<td><input class="short" type="text" id="datepicker2" placeholder="<?php echo date("d.m.Y",time()); ?>" name="datepicker2" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('DATE_PODBOR'); ?></p></td>
						<td><?php echo JText::_('FROM'); ?> <input class="short" maxlength="5" type="text" placeholder="09:00" name="from_time" /><?php echo JText::_('DO'); ?><input class="short" maxlength="5" type="text" placeholder="19:00" name="to_time" />
						</td>
					
					</tr>
				</table>
					<input name="first_form_submit" class="send_form" type="submit" value="<?php echo JText::_('SEND_FORM'); ?>"/>
		</fieldset>
	
	</form>
	</div>
	<div id="multi_right">&nbsp;
	</div>
	<div id="clear"></div>
</div>

<script>
// Numeric only control handler
jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};



//    function funcCalcVolumeWeight(l, w, h) {
//        l = Number(l); l = isNaN(l) ? 0 : l;
//        w = Number(w); w = isNaN(w) ? 0 : w;
//        h = Number(h); h = isNaN(h) ? 0 : h;
//
//        return (l * w * h / 5000).toFixed(3);
//    }
//    
//    function setCalcHandle() {
//        var fn = function () {
//console.log("setCalcHandle");
//            var volweight = funcCalcVolumeWeight($('#len').attr('value'), $('#wid').attr('value'), $('#hei').attr('value'));
//            $('#req_to_contact_pers_volume').attr('value', volweight);
//
//      if ($('#req_to_contact_pers_volume').val() > 60)
//      {
//           $("#weight2_error").css("display","block");
//            $("#do_calculate").attr("disabled", "true");
//      }
//      else 
//      {
//         $("#weight2_error").css("display","none");
//        $("#do_calculate").removeAttr('disabled');
//      } 
//
//
//
//
//
//        }
//   
//        $('#len').keyup(fn);
//        $('#wid').keyup(fn);
//        $('#hei').keyup(fn);
//        $('#len').ForceNumericOnly();
//        $('#wid').ForceNumericOnly();
//        $('#hei').ForceNumericOnly();
//        $('#wei').ForceNumericOnly();
//        $('#weight_kg').ForceNumericOnly();
//        fn();
//    }
    setCalcHandle();


    $("#country_list").append($("#country_list option").remove().sort(function(a, b) {
    var at = $(a).text(), bt = $(b).text();
    return (at > bt)?1:((at < bt)?-1:0);
}));

        $("#country_list_to").append($("#country_list_to option").remove().sort(function(a, b) {
    var at = $(a).text(), bt = $(b).text();
    return (at > bt)?1:((at < bt)?-1:0);
}));


        $('#country_list').change(function() {
 if($("select#country_list option:selected").val()=='BELARUS-Rest of territory' || $("select#country_list option:selected").val()=='KAZAKHSTAN-Rest of territory' || $("select#country_list option:selected").val()=='ROMANIA-Rest of territory' || $("select#country_list option:selected").val()=='RUSSIA-Rest of territory' || $("select#country_list option:selected").val()=='UKRAINE-Rest of territory' || $("select#country_list option:selected").val()=='MOLDOVA-Rest of territory' ) {
          $("#error_country").css("display","block");

          $(".multipage_next").attr("onclick", "");
          $(".multipage_next").removeAttr('href');
        } else {
        	 $("#error_country").css("display","none");
        $(".multipage_next").attr("onclick", "return $('#multipage').nextpage();");
        $(".multipage_next").addAttr('href');
        	
        
        }
});

                $('#country_list_to').change(function() {
 if($("select#country_list_to option:selected").val()=='BELARUS-Rest of territory' || $("select#country_list_to option:selected").val()=='KAZAKHSTAN-Rest of territory' || $("select#country_list_to option:selected").val()=='ROMANIA-Rest of territory' || $("select#country_list_to option:selected").val()=='RUSSIA-Rest of territory' || $("select#country_list option:selected").val()=='UKRAINE-Rest of territory' || $("select#country_list_to option:selected").val()=='MOLDOVA-Rest of territory' ) {
          $("#error_country_to").css("display","block");

          $(".multipage_next").attr("onclick", "");
          $(".multipage_next").removeAttr('href');
        } else {
        	 $("#error_country_to").css("display","none");
        $(".multipage_next").attr("onclick", "return $('#multipage').nextpage();");
        $(".multipage_next").addAttr('href');
        	
        
        }
});
</script>