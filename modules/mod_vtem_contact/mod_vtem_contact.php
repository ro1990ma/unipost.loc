<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$document =& JFactory::getDocument();	
$document->addStyleSheet(JURI::root().'modules/mod_vtem_contact/assets/style.css');

if($params->get('enable_anti_spam') == 1){
$document->addScript(JURI::root().'modules/mod_vtem_contact/assets/captcha.js');
$vtonsubmit = 'onsubmit="return checkform(this, code)"';
$vtcaptcharhtml = '<tr><td valign="top" width="80px">
<script type="text/javascript">
document.write("<span class=\'vt_captcha\'>"+ a + " + " + b +"</span>");
</script>
</td><td align="left">
<input type="input" name="input" class="vt_inputbox"/>
</td></tr>' . "\n";
}

//Form Parameters
//$recipient = 'unipost.redirect@gmail.com';
$recipient = 'upe@unipost.md';
//$recipient = 'erwinskala@yandex.com';
$fromName = 'Unipost.MD Support';
$fromEmail = 'info@unipost.md';
$width = $params->get('width', '250px');
$require_name = $params->get('require_name') ? " required" : "";
$require_mail = $params->get('require_mail') ? " required validate-email" : "";
$require_subject = $params->get('require_subject') ? " required" : "";
$require_mess = $params->get('require_mess') ? " required" : "";
$NameLabel = $params->get('name_label', 'Name:');
$EmailLabel = $params->get('email_label', 'Email:');
$SubjectLabel = $params->get('subject_label', 'Subject:');
$MessageLabel = $params->get('message_label', 'Message:');
$buttonText = $params->get('button_text', 'Send Message');
$pageText = $params->get('page_text', 'Спасибо за обращение.');
$errorText = $params->get('error_text', 'Your message could not be sent. Please try again.');
$pre_text = $params->get('pre_text', '');
$mod_class_suffix = $params->get('moduleclass_sfx', '');
$url = $_SERVER['REQUEST_URI'];
$url = htmlentities($url, ENT_COMPAT, "UTF-8");

if (isset($_POST["vtem_email"])) {
  $lsUserName = $_POST["vtem_name"];
  $lsSubject = $_POST["vtem_subject"];
  $lsUserEmail = $_POST["vtem_email"];
  $lsMessage = $_POST["vtem_message"];
  $vtem_case =  $_POST["vtem_case"];
  $vtem_gorod =  $_POST["vtem_gorod"];
  $vtem_phone =  $_POST["vtem_phone"];
  $vtem_emailas =  $_POST["vtem_emailas"];
  $tema = 'Форма обратной сзвязи Unipost.md';
  
  $lsUserName = preg_replace ("/[^a-zA-ZА-Яа-я\s]/","",$lsUserName);
  $lsSubject = preg_replace ("/[^a-zA-ZА-Яа-я\s]/","",$lsSubject);
  $vtem_gorod = preg_replace ("/[^a-zA-ZА-Яа-я\s]/","",$vtem_gorod);
  $lsUserEmail = preg_replace ("/[^\.\-a-zA-ZА-Яа-я\s]/","",$lsUserEmail);
  $vtem_phone = preg_replace ("/[^0-9\+\s]/","",$vtem_phone);
  $vtem_emailas = preg_replace ("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/","",$vtem_emailas);
//$z= "asd ^&* Иванов Иван Иванович%^&";
//$z = preg_replace ("/[^a-zA-ZА-Яа-я\s]/","",$z);
//echo $z;
//  $ids = preg_replace('/[^0-9,]/', '', $ids);
  
  
  
	$lsBody = 'Пользователь оставил сообщение:'."\n";
  $lsBody .= "Причина обращения: $vtem_case" . "\n";
	$lsBody .= "Имя: $lsUserName" . "\n";
  $lsBody .= "Организация: $lsUserEmail" . "\n";
  $lsBody .= "Страна: $lsSubject" . "\n";
  $lsBody .= "Город: $vtem_gorod" . "\n";
  $lsBody .= "Телефон: $vtem_phone" . "\n";
	$lsBody .= "E-mail: $vtem_emailas" . "\n";
  $lsBody .= "Сообщение: " . "\n";
	$lsBody .= $lsMessage . "\n\n";
	$lsBody .= "---------------------------" . "\n";
		
    $mailSender = &JFactory::getMailer();
    $mailSender->addRecipient($recipient);
    $mailSender->setSender(array($fromEmail,$fromName));
    $mailSender->addReplyTo(array( $_POST["vtem_email"], '' ));
    $mailSender->setSubject($tema);
    $mailSender->setBody($lsBody);

    if ($mailSender->Send() !== true) {
      echo '<span style="color:#c00;font-weight:bold;">' . $errorText . '</span>';
      return true;
    }
    else {
      echo '<span style="font-weight:bold;">' . $pageText . '</span>';
      return true;
    }
} // end if posted



JHTML::_('behavior.formvalidation');


print '<div id="vtemcontact1" class="vtem-contact-form vtem_contact ' . $mod_class_suffix . '">
       <form name="vtemailForm" id="vtemailForm" action="' . $url . '" method="post" ' .$vtonsubmit . ' class="form-validate">' . "\n" .
      '<div class="vtem_contact_intro_text">'.$pre_text.'</div>' . "\n";


           $lang =& JFactory::getLanguage();
     if($lang->getTag() == 'ru-RU') { 
print '<table border="0">';
// print subject input
print '<tr><td>Причина обращения <span style="color: red;">*</span>:</td><td><select required="required" class="vt_inputbox" name="vtem_case"/><option value="Благодарность">Благодарность</option><option value="Предложение">Предложение</option><option value="Жалоба">Жалоба</option></select></td></tr>' . "\n";
print '<tr><td>Контактное лицо <span style="color: red;">*</span>:</td><td><input class="vt_inputbox required" type="text" onblur="replacer_Name()" id="vtem_name" name="vtem_name"/></td></tr>' . "\n"; 
print '<tr><td>Организация <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_email()" name="vtem_email"/></td></tr>' . "\n";
print '<tr><td>Страна <span style="color: red;">*</span>:</td><td><input class="vt_inputbox required" type="text" onblur="replacer_subject()" name="vtem_subject"/></td></tr>' . "\n";
print '<tr><td>Город <span style="color: red;">*</span>:</td><td><input class="vt_inputbox required" type="text" onblur="replacer_gorod()" name="vtem_gorod"/></td></tr>' . "\n";
print '<tr><td>Телефон <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_phone()" name="vtem_phone"/></td></tr>' . "\n";
// print email input
print '<tr><td>E-mail <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox validate-email required" type="text" name="vtem_emailas"/></td></tr>' . "\n";
// print message input
print '<tr><td valign="top">Ваше сообщение <span style="color: red;">*</span>:</td><td><textarea required="required" class="required vt_inputbox'.$require_mess.'" name="vtem_message" cols="40" rows="4"></textarea></td></tr>' . "\n";
print $vtcaptcharhtml;
// print button
print '<tr><td colspan="2"><input name="vtbutton" id="vtbutton" class="vtem_contact_button validate" type="submit" value="Отправить"/><input name="vtbutton" id="vtbutton" class="vtem_contact_button reset" type="reset" value="Сброс"/></td></tr></table></form></div>' . "\n";
} elseif($lang->getTag() == 'ro-RO'){
  print '<table border="0">';
// print subject input
print '<tr><td>Motivul adresării <span style="color: red;">*</span>:</td><td><select required="required" class="required vt_inputbox" name="vtem_case"/><option value="Mulțumire">Mulțumire</option><option value="Ofertă">Ofertă</option><option value="Reclamație">Reclamație</option></select></td></tr>' . "\n";
print '<tr><td>Persoana de contact <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_Name()" name="vtem_name"/></td></tr>' . "\n";
print '<tr><td>Organizație <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_email()" name="vtem_email"/></td></tr>' . "\n";
print '<tr><td>Țara <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_subject()" name="vtem_subject"/></td></tr>' . "\n";
print '<tr><td>Oraș <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_gorod()" name="vtem_gorod"/></td></tr>' . "\n";
print '<tr><td>Telefon <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_phone()" name="vtem_phone"/></td></tr>' . "\n";
// print email input
print '<tr><td>E-mail <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required validate-email" type="text" name="vtem_emailas"/></td></tr>' . "\n";
// print message input
print '<tr><td valign="top">Measajul dvs. <span style="color: red;">*</span>:</td><td><textarea required="required" class="required vt_inputbox'.$require_mess.'" name="vtem_message" cols="40" rows="4"></textarea></td></tr>' . "\n";
print $vtcaptcharhtml;
// print button
print '<tr><td colspan="2"><input name="vtbutton" id="vtbutton" class="vtem_contact_button validate" type="submit" value="Trimite"/><input name="vtbutton" id="vtbutton" class="vtem_contact_button reset" type="reset" value="Reset"/></td></tr></table></form></div>' . "\n";

} else {
    print '<table border="0">';
// print subject input
print '<tr><td>Reason of request <span style="color: red;">*</span>:</td><td><select class="required vt_inputbox" name="vtem_case"/><option value="Gratitude">Gratitude</option><option value="Offer">Offer</option><option value="Complaint">Complaint</option></select></td></tr>' . "\n";
print '<tr><td>Contact person <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_Name()" name="vtem_name"/></td></tr>' . "\n";
print '<tr><td>Organization <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_email()" name="vtem_email"/></td></tr>' . "\n";
print '<tr><td>Country <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_subject()" name="vtem_subject"/></td></tr>' . "\n";
print '<tr><td>City <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_gorod()" name="vtem_gorod"/></td></tr>' . "\n";
print '<tr><td>Phone <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required" type="text" onblur="replacer_phone()" name="vtem_phone"/></td></tr>' . "\n";
// print email input
print '<tr><td>E-mail <span style="color: red;">*</span>:</td><td><input required="required" class="vt_inputbox required validate-email" type="text" name="vtem_emailas"/></td></tr>' . "\n";
// print message input
print '<tr><td valign="top">Your message :</td><td><textarea required="required" class="required vt_inputbox'.$require_mess.'" name="vtem_message" cols="40" rows="4"></textarea></td></tr>' . "\n";
print $vtcaptcharhtml;
// print button
print '<tr><td colspan="2"><input name="vtbutton" id="vtbutton" class="vtem_contact_button validate" type="submit" value="Send"/><input name="vtbutton" id="vtbutton" class="vtem_contact_button reset" type="reset" value="Reset"/></td></tr></table></form></div>' . "\n";
} 
?>
<!--<script src="<?=  JURI::base() ?>modules/mod_vtem_contact/jquery.validate.min.js"></script>-->
