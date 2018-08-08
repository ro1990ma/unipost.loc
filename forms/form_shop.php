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

	if (isset($_POST["submit_shop"])) {

		    		$first_form_Subject = 'Форма заявки с сайта Unipost.md';
		//start page1
				    $req_brend = $_POST["req_brend"];
				    $req_jur_name = $_POST["req_jur_name"];
				    $req_address = $_POST["req_address"];
				    $req_office = $_POST["req_office"];
				    $req_name = $_POST["req_name"];
				    $req_mail = $_POST["req_mail"];

					$req_cat_prod = $_POST["req_cat_prod"];
					$req_command = $_POST["req_command"];
					$req_ves = $_POST["req_ves"];
					$req_mark = $_POST["req_mark"];

					$calc_day = $_POST["calc_day"];
					$calc_week = $_POST["calc_week"];
				    $calc_month = $_POST["calc_month"];
                                    
				    $dostav1 = $_POST["dostav1"];
				    $dostav2 = $_POST["dostav2"];
				    $expr1 = $_POST["expr1"];
				    $expr2 = $_POST["expr2"];
				    $expr3 = $_POST["expr3"];
				    $expr4 = $_POST["expr4"];
				    $expr5 = $_POST["expr5"];
				    $expr6 = $_POST["expr6"];
				    $exprNew3 = $_POST["exprNew3"];
					$cond1 = $_POST["cond1"];
					$cond2 = $_POST["cond2"];
					$cond3 = $_POST["cond3"];
					$cond4 = $_POST["cond4"];
					$cond5 = $_POST["cond5"];
					$cond6 = $_POST["cond6"];
					$cond7 = $_POST["cond7"];
					$cond8 = $_POST["cond8"];
					$cond9 = $_POST["cond9"];
					$cond10 = $_POST["cond10"];
					$cond11 = $_POST["cond11"];
					$cond12 = $_POST["cond12"];
					$cond13 = $_POST["cond13"];
					$cond14 = $_POST["cond14"];
					$cond15 = $_POST["cond15"];
					$cond16 = $_POST["cond16"];
					$opl_dost1 = $_POST["opl_dost1"];
					$opl_dost2 = $_POST["opl_dost2"];
					$req_period_perev = $_POST["req_period_perev"];
					//end page4

				
					//page1
					$lsBody1 .= "\n" . "Клиент/Заказчик" . "\n";
//					$lsBody1 .= 'БРЕНД:'."$req_brend" . "\n";
					$lsBody1 .= 'Юридическое название:'."$req_jur_name" . "\n";
					$lsBody1 .= 'Адрес веб-сайта:'." $req_address" . "\n";
					$lsBody1 .= 'Адрес офиса/склада:'." $req_office" . "\n";
					$lsBody1 .= 'Контактное лицо:'." $req_name" . "\n";
					$lsBody1 .= 'E-mail:'." $req_mail" . "\n";

					$lsBody1 .= "\n" . "Товар" . "\n";
					$lsBody1 .= 'Категория товаров:'." $req_cat_prod" . "\n";
					$lsBody1 .= 'Средняя стоимость одного заказа, лей:'." $req_command" . "\n";
					$lsBody1 .= 'Средний вес отправления, кг:'." $req_ves" . "\n";
					$lsBody1 .= 'Потребность в адресной маркировке:'." $req_mark" . "\n";
					$lsBody1 .= "\n" . "Количество доставок" . "\n";
					$lsBody1 .= 'В день:'." $calc_day" . "\n";
					$lsBody1 .= 'В неделю:'." $calc_week" . "\n";
					$lsBody1 .= 'В месяц:'."$calc_month" . "\n";
					
                                        $lsBody1 .= "\n" . "География доставок" . "\n";
					$lsBody1 .= "$dostav1" . "\n" ."$dostav2". "\n";
                                        
					$lsBody1 .= "\n" . "Вид услуги" . "\n";
					$lsBody1 .= "$expr1" . "\n" ."$expr2". "\n" ."$exprNew3". "\n";
					$lsBody1 .= 'Пакет документов для предоставления покупателю:'. "\n" ." $expr3" . "\n"." $expr4" . "\n"." $expr5" . "\n"." $expr6" . "\n";
					$lsBody1 .= 'Дополнительно необходимые услуги: '. "\n"." $cond1" . "\n"." $cond2" . "\n"." $cond3" . "\n"." $cond4" . "\n"." $cond5" . "\n"." $cond6" . "\n"." $cond7" . "\n"." $cond8" . "\n"." $cond9" . "\n"." $cond10" . "\n"." $cond11" . "\n"." $cond12" . " $req_period_perev". "\n"." $cond13" . "\n" . " $cond14" . "\n" . " $cond15" . "\n" . " $cond16"  .    "\n Оплата за доставку товара "." $opl_dost1" . "\n"." $opl_dost2";
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
 <div class="form_shop">
		<h3 class="main_title"><?php echo JText::_('DO_FORM_SHOP'); ?></h3>
		<div id="clear"></div>
    <form id="multipage" action="" method="post">
				<table class="block_1">
					<tr>
						<td colspan="2"><label class="req_title"><?php echo JText::_('KLIENT_ZAKAZ'); ?></label></td>
					</tr>
<!--					<tr>						
						<td><p><?php echo JText::_('BREND'); ?></p></td>
						<td><input style="width: 290px;" type="text" id="req_brend" name="req_brend" /></td>
					</tr>-->
					<tr>
						<td><p><?php echo JText::_('JURIDIC_NAME'); ?> *</p></td>
                                                <td><input style="width: 290px;" type="text" id="req_jur_name" required="required" name="req_jur_name" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('WEB_ADRESS'); ?> *</p></td>
						<td><input style="width: 290px;" type="text" id="req_address" required="required" name="req_address" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('ADRESS_OFFICE'); ?></p></td>
						<td><input style="width: 290px;" type="text" id="req_office" name="req_office" /></td>
					</tr>
						<tr>
						<td><p>Контактное лицо :</p></td>
						<td><input style="width: 290px;" type="text" id="req_name" name="req_name" /></td>
					</tr>
							<tr>
						<td><p><?php echo JText::_('MAIL'); ?> *</p></td>
						<td><input style="width: 290px;" type="text" id="req_mail" required="required" name="req_mail" /></td>
					</tr>
				</table>
				<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title"><?php echo JText::_('NR_DOSTAVOK'); ?></label></td>
					</tr>
					<tr>
						<td colspan="2"><p><?php echo JText::_('AN_DAY'); ?></p></td>
						<td colspan="2"><input style="width: 370px;" type="text" name="calc_day" /></td>
					</tr>
					<tr>
						<td colspan="2"><p><?php echo JText::_('AN_WEEK'); ?></p></td>
						<td colspan="2"><input style="width: 370px;" type="text" name="calc_week" /></td>
					</tr>
					<tr>
						<td colspan="2"><p><?php echo JText::_('AN_MONTH'); ?></p></td>
						<td colspan="2"><input style="width: 370px;" type="text" name="calc_month" /></td>
					</tr>
<!--					<tr>
						<td colspan="2">&nbsp;</td>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td colspan="2">&nbsp;</td>
					</tr>-->
				</table>
        
        
        			<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title"><?php echo JText::_('GEOG_DOST'); ?></label></td>
					</tr>
					<tr>
						<td colspan="2"><p><input type="checkbox" value="районы г. Кишинева" name="dostav1"/><?php echo JText::_('DOSTAVKA_RAION'); ?></p></td>
						<td colspan="2"><p><input type="checkbox" value="города Республики Молдова" name="dostav2"/><?php echo JText::_('DOSTAVKA_GOROD'); ?></p></td>
					</tr>
                                </table>
        
        
				<table class="block_1">
					<tr>
						<td colspan="2"><label class="req_title"><?php echo JText::_('PRODUCT'); ?></label></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('CAT_PROD'); ?></p></td>
						<td><input style="width: 180px;" type="text" id="req_cat_prod" name="req_cat_prod" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('STOIMOSTI_ZAKAZA'); ?></p></td>
						<td><input style="width: 180px;" type="text" id="req_command" name="req_command" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('VES_OTPR'); ?></p></td>
						<td><input style="width: 180px;" type="text" id="req_ves" name="req_ves" /></td>
					</tr>
					<tr>
						<td><p><?php echo JText::_('POTREBN_MARK'); ?></p></td>
						<td><input style="width: 180px;" type="text" id="req_mark" name="req_mark" /></td>
					</tr>
				</table>
				<table class="block_2">
					<tr>
						<td colspan="4"><label class="req_title"><?php echo JText::_('VID_USLUG'); ?></label></td>
					</tr>
					<tr>
						<td colspan="4"><p class="margin_bot_cut"><input type="checkbox" value="Экспресс ( в тот же день )" name="expr1"/><?php echo JText::_('EKSPRESS_NR_DAY'); ?></p></td>
						<td colspan="4"><p class="td_from_top_to_bot"><input type="checkbox" value="Эконом ( до 3х рабочих дней )" name="exprNew3"/><?php echo JText::_('ECONOM_NR_DAY'); ?></p></td>
                                        </tr>
					<tr>                                        
						<td colspan="4"><p class="margin_bot_cut"><input type="checkbox" value="Стандарт ( 2 рабочих дня )" name="expr2"/><?php echo JText::_('STANDART_NR_DAY'); ?></p></td>
					</tr>
                                        
					<tr>
						<td colspan="8"><label class="req_title">Пакет предоставляемых документов покупателю</label></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" value="Бланк заказа" name="expr3"/><?php echo JText::_('BLANK_ZAKAZ'); ?></p></td>
						<td colspan="4"><p><input type="checkbox" value="Кассовый чек" name="expr4"/><?php echo JText::_('CHEK_FACTURA'); ?></p></td>
					</tr>
					<tr>
						<td colspan="4"><p><input type="checkbox" value="Акт выполненных услуг" name="expr5"/><?php echo JText::_('AKT_RABOT'); ?></p></td>
						<td colspan="4"><p><input type="checkbox" value="Фактура/Налоговая накладная" name="expr6"/><?php echo JText::_('AKT_NALOG'); ?></p></td>
					</tr>
				</table>
				<div id="clear"></div>
				<hr/>
				<table class="last">

                                        
					<tr>
						<td></td>
						<td><p class="desc"><?php echo JText::_('USLOVIE_USLUG'); ?></p></td>
						<td><input type="checkbox" value="Доставка в рабочее время: Понедельник - Пятница с 9.00 до 18.00" name="cond15"/></td>
						<td><p><?php echo JText::_('DOST_RAB_DNEI'); ?></p></td>


					</tr>
<!--                                        <tr>
						<td></td>
						<td></td>
                                                <td><input type="checkbox" value="Возможность частичного отказа" name="cond1"/></td>
						<td><p><?php echo JText::_('CHASTI_ZAKAZ'); ?></p></td>
					</tr>-->
					<tr>
						<td><input type="checkbox" value="Оплата услуг по доставке (кем, когда)" name="cond4"/></td>
						<td><p><?php echo JText::_('OPLATA_USLUG'); ?></p></td>
						<td><input type="checkbox" value="Доставка по субботам: с 9.00 до 15.00 " name="cond16"/></td>
						<td><p><?php echo JText::_('DOST_RAB_SUB'); ?></p></td>

<!--						<td><input type="checkbox" value="Возможность примерить (в случае, если товар - одежда, обувь, аксессуар)" name="cond3"/></td>
						<td><p><?php echo JText::_('VOZM_PRIMEN'); ?></p></td>-->
					</tr>
                                        <tr>
						<td><input type="checkbox" value="Отправления с наложенным платежом за товар" name="cond6"/></td>
						<td><p><?php echo JText::_('OTPR_PLATEJ'); ?></p></td>
                                                <td><input type="checkbox" value="Доставка в нерабочее время: пон.-пят. с 18.00 до 20.00" name="cond11"/></td>
						<td><p><?php echo JText::_('DOST_NERAB_DNI'); ?></p></td>
					</tr>
					<tr>
					<tr>

                                                <td><input type="checkbox" value="Периодичность перевода денежных средств заказчику" name="cond12"/></td>
						<td><p>Периодичность перевода денежных средств заказчику<input style="width: 115px;" type="text" id="req_period_perev" name="req_period_perev" /></p></td>
                                                
						<td><input type="checkbox" value="Необходимость хранения невостребованного товара в офисе Unipost-Express с последующим возвратом Заказчику" name="cond5"/></td>
						<td><p><?php echo JText::_('NEVOST_TOVAR'); ?></p></td>
					</tr>
					<tr>
                                            <!--<td></td>-->
                                                <!--<td colspan="2"><input style="width: 290px;" type="text" id="req_period_perev" name="req_period_perev" /></td>-->
<!--						<td><input type="checkbox" value="Отправления с наложенным платежом за товар" name="cond6"/></td>
						<td><p><?php echo JText::_('OTPR_PLATEJ'); ?></p></td>
                                                
						<td><input type="checkbox" value="Необходимость возврата Заказчику подписанных покупателями товарных накладных" name="cond7"/></td>
						<td><p><?php echo JText::_('VOZVRAT_TOVAR'); ?></p></td>-->
					</tr>
					<tr>                                               
                                                <td><input type="checkbox" value="Возможность проверки получателем содержимого" name="cond10"/></td>
						<td><p><?php echo JText::_('VOZM_PROVERKA'); ?></p></td>
						<!--<td><input type="checkbox" value="Периодичность возврата Заказчику денежных средств по договору Поручения" name="cond8"/></td>
						<td><p><?php echo JText::_('PERIOD_VOZVRAT'); ?></p></td>-->
					</tr>
					<tr>

                                                <td><input type="checkbox" value="Возможность частичного отказа" name="cond13"/></td>
						<td><p><?php echo JText::_('VOZM_CHAST_OTKAZ'); ?></p></td>
                                                <td><input type="checkbox" value="Дата подбора от отправителя" name="cond2"/></td>
						<td><p><?php echo JText::_('PODBOR_OTPR'); ?></p></td>
					</tr>
<!--					<tr>

						<td><input type="checkbox" value="Возможность проверки получателем содержимого" name="cond10"/></td>
						<td><p><?php echo JText::_('VOZM_PROVERKA'); ?></p></td>
						<td><input type="checkbox" value="Доставка в нерабочее время: с 18.00 до 20.00" name="cond11"/></td>
						<td><p><?php echo JText::_('DOST_NERAB_DNI'); ?></p></td>
					</tr>-->
                                       <tr>
                                                <td><input type="checkbox" value="Возможность примерить (в случае, если товар - одежда, обувь, аксессуар)" name="cond14"/></td>
						<td><p><?php echo JText::_('VOZM_PRIMERIT'); ?></p></td>
						<!-- <td><input type="checkbox" value="Возможность частичного отказа" name="cond13"/></td>
						<td><p><?php echo JText::_('VOZM_CHAST_OTKAZ'); ?></p></td>
-->
					</tr>
				</table>
                                
                                <table class="block_1">
					<tr>
						<td colspan="4"><label class="req_title"><?php echo JText::_('OPLATA_ZA_DOSTAVKU'); ?></label></td>
					</tr>
					<tr>
						<td colspan="2"><p><input type="checkbox" value="продавец" name="opl_dost1"/><?php echo JText::_('OPLATA_ZA_PRODAV'); ?></p></td>
						<td colspan="2"><p><input type="checkbox" value="покупатель" name="opl_dost2"/><?php echo JText::_('OPLATA_ZA_POKUP'); ?></p></td>
					</tr>
                                </table>
				<div id="clear"></div>
				<button type="submit" name="submit_shop" value="<?php echo JText::_('JSUBMIT2'); ?>"><?php echo JText::_('JSUBMIT2'); ?></button>
	</form>
	<div id="clear"></div>
</div>