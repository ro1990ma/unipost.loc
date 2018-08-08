<?php
defined('_JEXEC') or die;
 ?>
 			<?php 
				//Form Parameters
				$recipient = 'unipost.redirect@gmail.com';
				$first_form_fromName = 'Unipost.MD Support';
				$first_form_pre_text = JText::_('YOUR_QUESTION_3');
				$fromEmail = 'info@unipost.md';
				$require = JText::_('REQUIRED');
				$require_mail = JText::_('REQUIRED_MAIL');
				$url = $_SERVER['REQUEST_URI'];
				$url = htmlentities($url, ENT_COMPAT, "UTF-8");

	if (isset($_POST["first_form_submit"])) {

		    		$first_form_Subject = 'Форма заявки с сайта Unipost.md';
		//start page1
				    $first_form_Company = $_POST["req_title"];
				    $first_form_Contact_pers = $_POST["expr1"];
				    $first_form_Contact_pers1 = $_POST["expr2"];
				    $first_form_Contact_pers2 = $_POST["expr3"];
				    $first_form_Country = $_POST["ves_otpr"];
				    $what_send = $_POST["what_send"];
					$first_form_Index = $_POST["upakovka"];
					$first_form_Adress = $_POST["raion"];
					$first_form_Adress2 = $_POST["raion2"];
					$first_form_Tel = $_POST["poluchateli"];
					$first_form_Tel2 = $_POST["poluchateli2"];
					$first_form_Email = $_POST["adress"];
					$first_form_Email2 = $_POST["adress2"];
					$first_form_Info = $_POST["kol_adress"];
					$first_form_Info2 = $_POST["kol_adress2"];
					$first_form_Info3 = $_POST["kol_adress3"];
	
				    $first_form_Company_to = $_POST["kol_otpr"];
				    $first_form_Company_to1 = $_POST["kol_otpr1"];
				    $first_form_Company_to2 = $_POST["kol_otpr2"];
				    $first_form_Contact_pers_to = $_POST["srok_dostavki"];
				    $first_form_Country_to = $_POST["document"];
				    $first_form_Country_to2 = $_POST["document2"];
					$first_form_Index_to = $_POST["podbor"];
					$first_form_Adress_to = $_POST["office_adress"];
					$first_form_Tel_to = $_POST["sozvon"];
					$first_form_Tel_to1 = $_POST["sozvon1"];
					$first_form_Tel_to2 = $_POST["sozvon2"];
					$mail_adress = $_POST["mail_adress"];
					//end page4

				
					//page1
					$lsBody1 .= 'Наименование организации'."$first_form_Company" . "\n";
					$lsBody1 .= 'Вид курьерских услуг Вы ожидаете получить от нас'."$first_form_Contact_pers" . "\n"."$first_form_Contact_pers1" . "\n"."$first_form_Contact_pers2" . "\n";
					$lsBody1 .= 'Вес отправления в один адрес, кг'." $first_form_Country" . "\n";
					$lsBody1 .= 'Опишите что отправляете'." $what_send" . "\n";
					$lsBody1 .= 'Как упаковано?'." $first_form_Index" . "\n";
					$lsBody1 .= 'География доставок'." $first_form_Adress" . "\n"." $first_form_Adress2" . "\n";
					$lsBody1 .= 'Получатели'." $first_form_Tel" . "\n"." $first_form_Tel2" . "\n";
					$lsBody1 .= 'Адреса'." $first_form_Email" . "\n"." $first_form_Email2" . "\n";
					$lsBody1 .= "\n" . "Кол-во адресатов" . "\n";
					$lsBody1 .= 'В неделю'." $first_form_Info" . "\n";
					$lsBody1 .= 'В месяц'."$first_form_Info2" . "\n";
					$lsBody1 .= 'В день'."$first_form_Info3" . "\n";
					$lsBody1 .= 'Как часто вы готовы отдавать нам партии отправлений к доставке'."$first_form_Company_to" . "\n дней в неделю "."$first_form_Company_to1" . "\n"."$first_form_Company_to2" . "\n";
					$lsBody1 .= 'Желаемый вами срок доставки до '." $first_form_Contact_pers_to" . "\n";
					$lsBody1 .= 'Документ отчётности'." $first_form_Country_to" . "\n"." $first_form_Country_to2" . "\n";
					$lsBody1 .= 'Дополнительно запрашиваемые опции-услуги'." $first_form_Index_to" . "\n";
					$lsBody1 .= 'Укажите адрес вашего офиса'." $first_form_Adress_to" . "\n";
					$lsBody1 .= 'Дополнительная информация'." $first_form_Tel_to" . "\n"." $first_form_Tel_to1" . "\n"." $first_form_Tel_to2" . "\n";
					$lsBody1 .= 'E-mail:'." $mail_adress" . "\n";
					//end page4
					$lsBody1 .= "-------------------------------------------------------------------" . "\n";
						
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

 <div class="form_sec">
		<h3 class="main_title"><?php echo JText::_('REG_SEC_TITLE'); ?></h3>
		<div id="clear"></div>

<?php
     $lang =& JFactory::getLanguage();
     if($lang->getTag() == 'ru-RU'){ ?>
    <form id="multipage" action="" method="post">
				<table class="block_1">
					<tr>
						<td colspan="4"><label class="req_title">Наименование Вашей организации *</label>
                                                    <input style="width: 170px;" type="text" name="req_title" required="required" /></td>
					</tr>  
					<tr>
						<td colspan="4"><p>Отметьте какой вид курьерских услуг Вы ожидаете получить от нас</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="expr1" value="доставка налоговых накладных с возвратом нашего экземпляра."/> доставка налоговых накладных с возвратом нашего экземпляра</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" onclick="showHide('what_sendd',this,'what_s')" name="expr2" value="доставка рекламной и сувенирной продукции."/> доставка рекламной и сувенирной продукции</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="expr3" value="доставка прочей деловой и бухгалтерской документации"/> доставка прочей деловой и бухгалтерской документации</p></td>
					</tr>
					<tr id="what_sendd" style="display:none;">
						<td id="what_send" colspan="2"><p>Опишите что отправляете? </p></td>
						<td id="what_send2" colspan="2"><input style="width: 170px;" type="text" name="what_send" /></td>
					</tr>
					<tr>
						<td colspan="2"><p>Вес отправления в один адрес, кг</p></td>
						<td colspan="2"><input style="width: 170px;" type="text" name="ves_otpr" /></td>
					</tr>
					<tr>
						<td colspan="2"><p>Как упаковано? </p></td>
						<td colspan="2"><input style="width: 170px;" type="text" name="upakovka" /></td>
					</tr>
				</table>
				<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title">Кол-во адресатов</label></td>
					</tr>
					<tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress" /> в неделю</td>
					</tr>
					<tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress2" /> в месяц</td>
					</tr>
                                        <tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress3" /> в день</td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Как часто вы готовы отдавать нам партии отправлений к доставке</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr" value="раз в неделю" /> раз в неделю</p></td>
					</tr>
<!--					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr1" value="два раза в неделю"/> два раза в неделю</p></td>
					</tr>-->
<!--					<tr>
						<td colspan="4"><p><input type="text" name="kol_otpr1" value="два раза в неделю"/> дней в неделю</p></td>
					</tr>-->
					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr2" value="раз в месяц"/> раз в месяц</p></td>
					</tr>
                                        <tr>
						<td colspan="4"><p><input type="text" class="short" style="float:left;" name="kol_otpr1" value=""/> дней в неделю</p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Желаемый вами срок доставки до  <input class="short" style="float:none;" type="text" name="srok_dostavki" /> рабочих дней<p></td>
					</tr>
				</table>
				<div id="clear"></div>
				<table class="block_1">
					<tr>
						<td colspan="4"><label class="req_title">География доставок</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="raion" value="районы г. Кишинева и пригороды."/> районы г. Кишинева и пригороды</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="raion2" value="города Республики Молдова."/> города Республики Молдова</p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Получатели</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="poluchateli" value="юридические лица"/> юридические лица</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="poluchateli2" value="частные лица"/> частные лица</p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Адреса</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="adress" value="почтовые / где получатель ведёт деятельность"/> почтовые / где получатели ведут деятельность </p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="adress2" value="домашние/где проживает получатель"/> домашние/где проживают получатели</p></td>
					</tr>
				</table>
				<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title">Документ отчётности</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="document" value="возврат экземпляра «Заказчика»"/> возврат экземпляра «Заказчика»</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="document2" value="«Реестр доставок»" /> «Реестр доставок»</p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Дополнительно запрашиваемые опции-услуги</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="podbor" value="подбор отправлений из вашего офиса" /> подбор отправлений из вашего офиса</p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Укажите адрес вашего офиса <input class="short" style="float:none;" type="text" name="office_adress" /></p></td>
					</tr>
					<tr>
						<td colspan="4" style="height:10px;"></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon" value="созвон с получателями" /> созвон с получателями</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon1" value="упаковка отправлений" /> упаковка отправлений</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon2" value="адресная маркировка" /> адресная маркировка</p></td>
					</tr>
					<tr>
                                            <td colspan="4"><p>Введите Ваш E-mail * <input class="short" style="float:none;" required="required" type="text" name="mail_adress" /></p></td>
					</tr>

					
				</table>
				<div id="clear"></div>
				<input name="first_form_submit" class="send_form2" type="submit" value="отправить заявку"/>
	</form>
	<?php }  if($lang->getTag() == 'ro-RO'){  ?>

 <form id="multipage" action="" method="post">
				<table class="block_1">
					<tr>
						<td colspan="4"><label class="req_title">Denumirea organizației Dvs.</label>
						<input style="width: 170px;" type="text" name="req_title" /></td>
					</tr>  
					<tr>
						<td colspan="4"><p>Selectați ce fel de servicii de curierat vă așteptați să primiți de la noi:</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="expr1" value="доставка налоговых накладных с возвратом нашего экземпляра."/> livrarea facturilor fiscale cu revenirea exemplarului nostru.</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" onclick="showHide('what_sendd',this,'what_s')" name="expr2" value="доставка рекламной и сувенирной продукции."/> livrarea producției de publicitate și suvenir.</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="expr3" value="доставка прочей деловой и бухгалтерской документации"/> livrarea altelor documente de afaceri și contabilitate</p></td>
					</tr>
					<tr id="what_sendd" style="display:none;">
						<td id="what_send" colspan="2"><p>Descrieți ce trimiteți? :</p></td>
						<td id="what_send2" colspan="2"><input style="width: 170px;" type="text" name="what_send" /></td>
					</tr>
					<tr>
						<td colspan="2"><p>Greutate de trimiterea la o singură adresă, kg:</p></td>
						<td colspan="2"><input style="width: 170px;" type="text" name="ves_otpr" /></td>
					</tr>
					<tr>
						<td colspan="2"><p>Cum este împachetat? </p></td>
						<td colspan="2"><input style="width: 170px;" type="text" name="upakovka" /></td>
					</tr>
				</table>
				<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title">Numărul destinatarilor:</label></td>
					</tr>
					<tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress" /> pe săptămînă</td>
					</tr>
					<tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress2" /> pe lună</td>
					</tr>
                                        <tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress3" /> într-o zi</td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Cît de des dvs. puteţi să ne trimiteți seturi de trimiteri pregătite pentru expediere:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr" value="раз в неделю" /> o dată pe săptămînă</p></td>
					</tr>
<!--					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr1" value="два раза в неделю"/> două ori pe săptămână</p></td>
					</tr>-->
<!--                                        <tr>
						<td colspan="4"><p><input type="text" name="kol_otpr1" value="два раза в неделю"/> zile pe săptămână</p></td>
					</tr>-->
					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr2" value="раз в месяц"/> o dată pe lună</p></td>
					</tr>
                                        <tr>
						<td colspan="4"><p><input type="text" class="short" style="float:left;" name="kol_otpr1" value=""/> zile pe săptămână</p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Timp dorit de livrare pîna: <input class="short" style="float:none;" type="text" name="srok_dostavki" /> zile lucrătoare<p></td>
					</tr>
				</table>
				<div id="clear"></div>
				<table class="block_1">
					<tr>
						<td colspan="4"><label class="req_title">Geografia livrărilor:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="raion" value="районы г. Кишинева и пригороды."/> zonele de curent, la Chișinău și suburbii.</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="raion2" value="города Республики Молдова."/> orașul a Republicii Moldova. </p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Destinatarii:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="poluchateli" value="юридические лица"/> persoane juridice</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="poluchateli2" value="частные лица"/> persoane fizice</p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Adrese:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="adress" value="почтовые / где получатель ведёт деятельность"/> poştale / unde destinatarul îsi desfăşoară activitatea </p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="adress2" value="домашние/где проживает получатель"/> domicilii / unde locuieşte destinatar</p></td>
					</tr>
				</table>
				<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title">Document de raport:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="document" value="возврат экземпляра «Заказчика»"/> returnarea exemplarului «Beneficiarului»</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="document2" value="«Реестр доставок»" /> «Registru livrărilor»</p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Opţiuni și servicii solicitate adăugător:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="podbor" value="подбор отправлений из вашего офиса" /> ridicarea trimiterilor din birou Dvs.</p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Specificați adresa biroului dvs.: <input class="short" style="float:none;" type="text" name="office_adress" /></p></td>
					</tr>
					<tr>
						<td colspan="4" style="height:10px;"></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon" value="созвон с получателями" /> contactarea cu destinatar</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon1" value="упаковка отправлений" /> ambalarea trimiterelor</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon2" value="адресная маркировка" /> marcaj adresar</p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Întroduceți E-mail Dvs.: <input class="short" style="float:none;" type="text" name="mail_adress" /></p></td>
					</tr>

					
				</table>
				<div id="clear"></div>
				<input name="first_form_submit" class="send_form2" type="submit" value="<?php echo JText::_('SEND_FORM2'); ?>"/>
	</form>




	<?php }  if($lang->getTag() == 'en-GB'){   ?>

 <form id="multipage" action="" method="post">
				<table class="block_1">
					<tr>
						<td colspan="4"><label class="req_title">Name of your organization</label>
						<input style="width: 170px;" type="text" name="req_title" /></td>
					</tr>  
					<tr>
						<td colspan="4"><p>Mark what kind of courier services do you expect to receive from us:</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="expr1" value="доставка налоговых накладных с возвратом нашего экземпляра."/> delivery of tax bills with the return of our sample.</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" onclick="showHide('what_sendd',this,'what_s')" name="expr2" value="доставка рекламной и сувенирной продукции."/> delivery of advertising and souvenir production.</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="expr3" value="доставка прочей деловой и бухгалтерской документации"/> delivery of other business and accounting documents</p></td>
					</tr>
					<tr id="what_sendd" style="display:none;">
						<td id="what_send" colspan="2"><p>Desribe what you send? :</p></td>
						<td id="what_send2" colspan="2"><input style="width: 170px;" type="text" name="what_send" /></td>
					</tr>
					<tr>
						<td colspan="2"><p>The weight of delivery for one address, kg:</p></td>
						<td colspan="2"><input style="width: 170px;" type="text" name="ves_otpr" /></td>
					</tr>
					<tr>
						<td colspan="2"><p>How it is packed? </p></td>
						<td colspan="2"><input style="width: 170px;" type="text" name="upakovka" /></td>
					</tr>
				</table>
				<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title">Amount of beneficiaries:</label></td>
					</tr>
					<tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress" /> in a week</td>
					</tr>
					<tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress2" /> in a month</td>
					</tr>
                                        <tr>
						<td colspan="4"><input class="short" style="float:left;" type="text" name="kol_adress3" /> per day</td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">How often are you ready to give us lots of shipments for delivery:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr" value="раз в неделю" /> once a week</p></td>
					</tr>
<!--					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr1" value="два раза в неделю"/> twice a week</p></td>
					</tr>-->

					<tr>
						<td colspan="4"><p><input type="checkbox" name="kol_otpr2" value="раз в месяц"/> once a month</p></td>
					</tr>
                                        <tr>
						<td colspan="4"><p><input type="text" class="short" style="float:left;" name="kol_otpr1" value=""/> day per week</p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Desired time of delivery till: <input class="short" style="float:none;" type="text" name="srok_dostavki" /> working days<p></td>
					</tr>
				</table>
				<div id="clear"></div>
				<table class="block_1">
					<tr>
						<td colspan="4"><label class="req_title">Geography of deliveries:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="raion" value="районы г. Кишинева и пригороды."/> districts of Chisinau and suburbs.</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="raion2" value="города Республики Молдова."/> cities of the Republic of Moldova. </p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Receivers:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="poluchateli" value="юридические лица"/> juridical persons</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="poluchateli2" value="частные лица"/> private persons</p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Addresses:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="adress" value="почтовые / где получатель ведёт деятельность"/> postal / where the receiver conducts his activity</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="adress2" value="домашние/где проживает получатель"/> home / where the receiver lives</p></td>
					</tr>
				</table>
				<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title">Document statements:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="document" value="возврат экземпляра «Заказчика»"/> return of the «Client's» example</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="document2" value="«Реестр доставок»" /> «Register of deliveries»</p></td>
					</tr>
					<tr>
						<td colspan="4"><label class="req_title">Additional requested options-servicies:</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="podbor" value="подбор отправлений из вашего офиса" /> taking shipments from your office</p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Specify your office address: <input class="short" style="float:none;" type="text" name="office_adress" /></p></td>
					</tr>
					<tr>
						<td colspan="4" style="height:10px;"></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon" value="созвон с получателями" /> connection with receiver</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon1" value="упаковка отправлений" /> packing of shipments</p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" name="sozvon2" value="адресная маркировка" /> address marking</p></td>
					</tr>
					<tr>
						<td colspan="4"><p>Introduce your E-mail: <input class="short" style="float:none;" type="text" name="mail_adress" /></p></td>
					</tr>

					
				</table>
				<div id="clear"></div>
				<input name="first_form_submit" class="send_form2" type="submit" value="<?php echo JText::_('SEND_FORM2'); ?>"/>
	</form>

	<?php } ?>
	<div id="clear"></div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
	function showHide (it, box, it2) {
	  var vis = (box.checked) ? "table-row" : "none";
	  document.getElementById(it).style.display = vis;
	  document.getElementById(it2).style.display = vis;
	}
</script> 