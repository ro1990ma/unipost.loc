<?php
	defined('_JEXEC') or die;
$document =& JFactory::getDocument();	
?>
	<div class="page_miss_call">
		<h3 class="miss_call_title"><?php echo JText::_('PAGE_MISSED_CALLS'); ?></h3>
		<div id="clear"></div>
		<div class="miss_call_desc">
		<?php echo JText::_('HOTELI_UZNATI'); ?>
		</div>
		<div id="clear"></div>
<!-- 		<div class="miss_call_page_left">

		<?php 
		//Form Parameters
		$recipient = 'unipost.redirect@gmail.com';
		$sec_form_fromName = 'Unipost.MD Support';
		$sec_form_pre_text = '<strong>'.JText::_('PAGE_MISSED_CALLS').'<i style="color:red;">'.JText::_('CALL_BACK').'</i><br />'.JText::_('ZAPOLNITE_POLE').'</strong><br />';
		$sec_form_SubjectLabel = JText::_('YOUR_QUESTION');
		$sec_form_CompanyLabel = JText::_('COMPANY');
		$sec_form_NameLabel = JText::_('CONTACT_PERSON');
		$sec_form_PhoneLabel = JText::_('PHONE_FOR_CALL');
		$sec_form_buttonText = JText::_('SEND_TO');
		$sec_form_pageText = JText::_('THANK_YOU');
		$sec_form_errorText = JText::_('YOUR_MESSAGE_SEND');

		if (isset($_POST["sec_form_submit"])) {
		    $sec_form_Subject = $_POST["sec_form_subject"];
		    $sec_form_Company = $_POST["sec_form_company"];
		    $sec_form_Name = $_POST["sec_form_name"];
		    $sec_form_Phone = $_POST["sec_form_phone"];
			$sec_form_Email = $_POST["sec_form_email"];
			$lsBody2 = JText::_('DOZVON')."\n";
			$lsBody2 .= JText::_('CONTACT_MAN')."$sec_form_Name" . "\n";
			$lsBody2 .= JText::_('COMPANY_NAME')."$sec_form_Company" . "\n";
			$lsBody2 .= JText::_('NR_PHONE')."$sec_form_Phone" . "\n";
			$lsBody2 .= JText::_('MAIL')."$sec_form_Email" . "\n";
		    $lsBody2 .= JText::_('QUESTION')."\n";
			$lsBody2 .= $sec_form_Subject . "\n\n";
			$lsBody2 .= "-------------------------------------------------------------------" . "\n";

		    $mailSender2 = &JFactory::getMailer();
		    $mailSender2->addRecipient($recipient);
		    $mailSender2->setSender(array($fromEmail,$sec_form_Name));
		    $mailSender2->addReplyTo(array( $_POST["sec_form_email"], '' ));
		    $mailSender2->setSubject($sec_form_Subject);
		    $mailSender2->setBody($lsBody2);

		    if ($mailSender2->Send() !== true) {
		      $err_mesage2 = '<span style="color:#c00;font-weight:bold;">' . $sec_form_errorText . '</span>';
		    }
		    else {
		      $err_mesage2 = '<span style="font-weight:bold;">' . $sec_form_pageText . '</span>';
		    }
		} // end if posted
		echo $sec_form_pre_text;
		print '<form name="sec_form" action="' . $url . '" method="post" class="form-validate" '.$onsubmit.'>';
		print '<table border="0">';
		print '<tr><td>' . $sec_form_SubjectLabel . '</td><td><textarea class="'.$require.'" cols="31" rows="2" name="sec_form_subject"></textarea></td></tr>';
		// print email input
		print '<tr><td>' . $sec_form_CompanyLabel . '</td><td><input class="'.$require.'" type="text" name="sec_form_company"/></td></tr>';
		// print email input
		print '<tr><td>' . $sec_form_NameLabel . '</td><td><input class="'.$require.'" type="text" name="sec_form_name"/></td></tr>';
		// print subject input
		print '<tr><td>' . $sec_form_PhoneLabel . '</td><td><input class="'.$require.'" type="text" name="sec_form_phone"/></td></tr>';
		print $captcharhtml;
		// print button
		print '<tr><td colspan="2" style="text-align:center;"><input name="sec_form_submit" type="submit" value="' . $sec_form_buttonText . '"/></td></tr></table></form>';
		echo $err_mesage2;
		unset($err_mesage2);
?>

</div> -->
<!-- 		<div class="miss_call_page_right">
	<div class="desc_left">
	<strong><?php echo JText::_('YOUR_QUESTION_2'); ?><br/><?php echo JText::_('OPERATOR'); ?><i style="color:green;"><?php echo JText::_('CONSULTANT_EFIR'); ?></i></strong>
	</div>
	<button><?php echo JText::_('ONLINE_CONS'); ?></button>
</div> -->
<div class="miss-call-image">
	<img style="float: right;" src="/images/about/miss-call.png">
</div>
		<div class="miss_call_page_left">

<?php 
				//Form Parameters
				$recipient = 'unipost.redirect@gmail.com';
				$first_form_fromName = 'Unipost.MD Support';
				//$first_form_pre_text = JText::_('YOUR_QUESTION_3');
				$first_form_pre_text = '<strong>'.JText::_('PAGE_MISSED_CALLS').'<i style="color:red;">'.JText::_('CALL_BACK').'</i><br />'.JText::_('ZAPOLNITE_POLE').'</strong><br />';
				$fromEmail = 'info@unipost.md';
				$require = JText::_('REQUIRED');
				$require_mail = JText::_('REQUIRED_MAIL');
				$first_form_SubjectLabel = JText::_('YOUR_QUESTION_4');
				$first_form_CompanyLabel = JText::_('COMPANY_NAME');
				$first_form_NameLabel = JText::_('CONTACT_PERSON');
				$first_form_PhoneLabel = JText::_('NR_PHONE');
				$first_form_EmailLabel = JText::_('MAIL_REQUIRED');
				$first_form_buttonText = JText::_('SEND');
				$first_form_pageText = JText::_('THANK_YOU_MESS');
				$first_form_errorText = JText::_('MESS_SEND');
				$url = $_SERVER['REQUEST_URI'];
				$url = htmlentities($url, ENT_COMPAT, "UTF-8");

				if (isset($_POST["first_form_submit"])) {
				    $first_form_Subject = $_POST["first_form_subject"];
				    $first_form_Company = $_POST["first_form_company"];
				    $first_form_Name = $_POST["first_form_name"];
				    $first_form_Phone = $_POST["first_form_phone"];
					$first_form_Email = $_POST["first_form_email"];
					$lsBody1 = JText::_('DONT_CALL')."\n";
					$lsBody1 .= JText::_('CONTACT_MAN')."$first_form_Name" . "\n";
					$lsBody1 .= JText::_('COMPANY_NAME')."$first_form_Company" . "\n";
					$lsBody1 .= JText::_('NR_PHONE')." $first_form_Phone" . "\n";
					$lsBody1 .= JText::_('MAIL')."$first_form_Email" . "\n";
				    $lsBody1 .= JText::_('QUESTION')."\n";
					$lsBody1 .= $first_form_Subject . "\n\n";
					$lsBody1 .= "-------------------------------------------------------------------" . "\n";
						
				    $mailSender = &JFactory::getMailer();
				    $mailSender->addRecipient($recipient);
				    $mailSender->setSender(array($fromEmail,$first_form_Name));
				    $mailSender->addReplyTo(array( $_POST["first_form_email"], '' ));
				    $mailSender->setSubject($first_form_Subject);
				    $mailSender->setBody($lsBody1);

				    if ($mailSender->Send() !== true) {
				      $err_mesage1 = '<span style="color:#c00;font-weight:bold;">' . $first_form_errorText . '</span>';
				    }
				    else {
				      $err_mesage1 =  '<span style="font-weight:bold;">' . $first_form_pageText . '</span>';
				    }
				} // end if posted
				JHTML::_('behavior.formvalidation');
				echo $first_form_pre_text;
				print '<form name="first_form" action="' . $url . '" method="post" class="form-validate" '.$onsubmit.'>';
				print '<table border="0">';
				print '<tr><td>' . $first_form_SubjectLabel . '</td><td><textarea class="'.$require.'" cols="31" rows="2" name="first_form_subject"></textarea></td></tr>';
				// print email input
				print '<tr><td>' . $first_form_CompanyLabel . '</td><td><input class="'.$require.'" type="text" name="first_form_company"/></td></tr>';
				// print email input
				print '<tr><td>' . $first_form_NameLabel . '</td><td><input class="'.$require.'" type="text" name="first_form_name"/></td></tr>';
				// print subject input
				print '<tr><td>' . $first_form_PhoneLabel . '</td><td><input class="'.$require.'" type="text" name="first_form_phone"/></td></tr>';
				// print email input
				print '<tr><td>' . $first_form_EmailLabel . '</td><td><input type="text" name="first_form_email"/></td></tr>';
				// print button  class="'.$require_mail.'"
				print '<tr><td colspan="2" style="text-align:center;"><input name="first_form_submit" type="submit" value="' . $first_form_buttonText . '"/></td></tr></table></form>';
				echo $err_mesage1;
?>

		</div>
		<div id="clear"></div>
	</div>