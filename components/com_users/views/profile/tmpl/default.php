<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript">

    function toggle_visibility(edit_invoice) {
       var e = document.getElementById(edit_invoice);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }

</script>
<script>
	function RefreshWindow()
{
         window.location.reload(true);
}
</script>
<style>
	#header{display: none;}
	html, body{background:none;}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
    function call() {
      var msg   = $('#edit_invoice').serialize();
        $.ajax({
          type: 'POST',
          url: './default.php',
          data: msg,
          success: function(data) {
            //$('.results').html(data);
            alert('Форма успешно сохранена');
           $("#this_form").css("display","none");
           $(".show_invoice").css("display","none");
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
 
    }
 function call2() {
      var msg   = $('#edit_action').serialize();
        $.ajax({
          type: 'POST',
          url: './default.php',
          data: msg,
          success: function(data) {
            //$('.results').html(data);
            alert('Форма успешно сохранена');
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
 
    }

     function call3() {
      var msg   = $('#add_action').serialize();
        $.ajax({
          type: 'POST',
          url: './default.php',
          data: msg,
          success: function(data) {
            //$('.results').html(data);
            alert('Форма успешно сохранена');
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
 
    }

    
</script>
<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tooltip');
$db = JFactory::getDbo();
$user =& JFactory::getUser();
$username = $user->get('username');
$edit_currency = $_GET['currency'];
@require_once("func.php");
$db->getQuery(true);
$db->setQuery("SELECT * FROM #__currency");
$db_currency = $db->loadObject();
$res_message = '';
if (isset($_POST['currency_val'])) {
	$query = $db->getQuery(true);
	$fields = $db->quoteName('current_val').'='.$_POST['currency_val'];
	$query->update($db->quoteName('#__currency'))->set($fields);
	$db->setQuery($query);
	$result = $db->query();
}

if (isset($_POST["assign_to_user"])) {
	$res_message = assignPartner($_POST["assign_to_hawb"],$_POST["assign_to_user"]);
}

if (isset($_POST['edit_hs_date'])){
	$id = $_POST['edit_hs_id'];
	$number = $_POST['edit_hs_number'];
	$location = $_POST['edit_hs_location'];
	$date = $_POST['edit_hs_date'];
	$activity = $_POST['edit_hs_activity'];
	$comments = $_POST['edit_hs_comments'];
	$res_message = setHystory($id,$number,$location,$date,$activity,$comments);
}

if (isset($_POST['edit_form_s_company'])){
	$form_id = $_POST['edit_form_id'];
	$form_unique_id = $_POST['edit_form_unique_id'];
	$form_hawb = $_POST['edit_form_hawb'];
	$form_s_company = $_POST['edit_form_s_company'];
	$form_org = $_POST['edit_form_org'];
	$form_r_company = $_POST['edit_form_r_company'];
	$form_dest = $_POST['edit_form_dest'];
	$form_pieces = $_POST['edit_form_pieces'];
	$form_weight = $_POST['edit_form_weight'];
	$form_type = $_POST['edit_form_type'];
	$res_message = setInvoice($form_id,$form_unique_id,$form_hawb,$form_s_company,$form_org,$form_r_company,$form_dest,$form_pieces,$form_weight,$form_type);
	}

if (isset($_POST['delete_hs_id'])){
	$id = $_POST['delete_hs_id'];
	$res_message = delHystory($id);
}
if (isset($_POST['edit_facture'])) {

}
if (isset($_POST['edit'])) {
	$editHistory = true;
	$deleteHistory = false;
	$hystory_edit_id = NULL;
	$hystory_delete_id = NULL;
} elseif (isset($_POST['delete'])) {
	$editHistory = false;
	$deleteHistory = true;
	$hystory_edit_id = NULL;
	$hystory_delete_id = NULL;
} else {
	$editHistory = false;
}

if (isset($_POST['add_id'])) {
	
		 $id= $_POST ['add_id'];
		 $number=$_POST ['add_number'];
		 $location= $_POST ['add_location'];
		 $date=$_POST ['add_date'];
		 $activity=$_POST ['add_activity'];
		 $comments=$_POST ['add_comments'];
$db = JFactory::getDBO();
$query = "INSERT INTO #__form_history (id, number, location, date, activity, comments)" . "VALUES('$id', '$number', '$location', '$date', '$activity', '$comments');"; 
$db->setQuery($query);
$add_history = $db->loadObject(); 
$result = mysql_query($query);
}
?>
	<div class="user_profile">
		<h3 class="main_title"><?php echo JText::_('YOUR_CONTROL_PANEL'); ?></h3>
		<h5><?php echo JText::_('CONTROL_PANEL_WELCOME')." ".$this->data->name; ?></h5>
		<div id="clear"></div>
		<div class="img_left"></div>
		<?php
			if(($username == "unipost" && ($edit_currency!=1)) && ($editHistory != true) && ($deleteHistory != true) && (!isset($_GET['assign']))) {
		?>
		<div class="profile_form_info">
		<h3 class="profile_form_title"><?php echo JText::_('CONDUCTION'); ?></h3>
		<?php
		if ($res_message !='') {
			echo "<div class='track_notice'>".$res_message."</div>";
		}
				echo "<a class='curency' href='./profile/?currency=1'>".JText::_('CURS')."</a><br /><br /><br />";
			}
		?>
		</div>
		<div style="clear:right; height:0px;"></div>

		<?php
			if(($username == "unipost" && ($edit_currency!=1)) && $editHistory != true && $deleteHistory != true && isset($_GET['assign'])) {
		?>
		<div class="profile_form_info">
		<h3 class="profile_form_title"><?php echo JText::_('NAKLADNAYA'); ?></h3>
		<?php
		if ($res_message !='') {
			echo "<div class='track_notice'>".$res_message."</div>";
		}
?>
			<button onclick="history.back();" class="back"><?php echo JText::_('CONTROL_PANEL_FORM_BACK'); ?></button>
			<form action="./" method="post" name="assign_hawb">
				<br />
				<select name="assign_to_user" id="assign">
					<option value="0"><?php echo JText::_('CHECK_USER'); ?></option>
					<?php
						$db->getQuery(true);
						$db->setQuery("SELECT * FROM #__users WHERE username != 'unipost'");
						$db_asset_to = $db->loadObjectList();
						foreach ($db_asset_to as $key=>$asset_user) {
							printf("<option value='%s'>%s</option>",$asset_user->username,$asset_user->username);
						}
					?>
				</select>
				<input type="hidden" value="<?php echo $_GET['assign']; ?>" name="assign_to_hawb"/>
				<br />
				<input type="submit" name="do_assign" value="<?php echo JText::_('PRISVOITI'); ?>"/>
			</form>

<?php
			}
		?>
		</div>
		<div style="clear:right; height:0px;"></div>

		<?php
		if ($editHistory == true) {
			$hystory_edit_id = $_POST['edit'];
		?>
			<div class="profile_form_info">
			<h3 class="profile_form_title"><?php echo JText::_('YOUR_CONTROL_PANEL'); ?></h3>
			<button onclick="history.back();" class="back"><?php echo JText::_('CONTROL_PANEL_FORM_BACK'); ?></button>
			<?php
			//редактирование истории 
					$db->getQuery(true);
					$db->setQuery("SELECT * FROM #__form_history WHERE id='".$hystory_edit_id."' ORDER BY date");
					$edit_del_package_history = $db->loadObject();
					//print_r($edit_del_package_history);
					//printf("<p class='left'>%s</p><p class='right'>%s</p>",$keys,htmlspecialchars($val_history->number));
					printf("<form name='edit_action' id='edit_action'  action='javascript:void(null);' onsubmit='call2()'   method='post'  class='history_edit'>");
					printf("<table class='history'>");
					printf("<tr>");
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_HAWB'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_COUNTRY'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_DATE'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_CURR_STATUS'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_COMMENT'));
					printf("</tr>");
					printf("<tr><td>%s</td>",$edit_del_package_history->id);
					printf("<td><input name='edit_hs_location' type='text' value='%s'/></td>",$edit_del_package_history->location);
					printf("<td><input name='edit_hs_date' type='text' value='%s'/></td>",$edit_del_package_history->date);
					printf("<td>%s</td>",getStatusSelect($edit_del_package_history->activity,'edit_hs_activity'));
					printf("<td><input name='edit_hs_comments' type='text' value='%s'/></td>",$edit_del_package_history->comments);
					printf("</tr>");	
					printf("</table>");
					printf("<input name='edit_hs_id' type='hidden' value='%s'/>",$edit_del_package_history->id);
					printf("<input name='edit_hs_number' type='hidden' value='%s'/>",$edit_del_package_history->number);
					//printf("<input name='edit_hs_date' type='hidden' value='%s'/>",date("Y-m-d H:i:s",time()));
					printf("<input type='submit' class='btn'  value=".JText::_('SAVE').">");	
					printf("</form>");
			?>
			</div>
		<?php
		} elseif ($deleteHistory == true) {
			$hystory_delete_id = $_POST['delete'];
		?>
			<div class="profile_form_info">
			<h3 class="profile_form_title"><?php echo JText::_('YOUR_CONTROL_PANEL'); ?></h3>
			<button onclick="history.back();" class="back"><?php echo JText::_('CONTROL_PANEL_FORM_BACK'); ?></button>
		<?php
					printf("<form name='delete_action' method='post' action=''>");
					printf("<input name='delete_hs_id' type='hidden' value='%s'/>",$hystory_delete_id);
					printf("<input type='submit' class='btn' value=".JText::_('PODTVERDITI').">");	
					printf("</form>");
		?>
			</div>
		<?php
		} elseif ($edit_currency == 1) {
		if ($result) {
			$res_message = JText::_('LEI_IZMENEN');
			header('Location: ./profile');
		}
		?>
		<div class="profile_form_info">
		<h3 class="profile_form_title"><?php echo JText::_('YOUR_CONTROL_PANEL'); ?></h3>
		<button onclick="history.back();" class="back"><?php echo JText::_('CONTROL_PANEL_FORM_BACK'); ?></button>
			<form action="" method="post">
				<br />
				<input type="text" name="currency_val" value="<?php echo $db_currency->current_val; ?>"/><br />
				<input type="submit" name="do_currency" value="<?php echo JText::_('CHANGE'); ?>"/>
			</form>
		</div>
		<?php
			} elseif(!isset($_POST['show_form']) && !isset($_GET['assign'])) {
		?>
		<div class="profile_form_right" >
			<h3 class="profile_form_title"><?php echo JText::_('CONTROL_PANEL_TITLE'); ?></h3>
			<form id="track_profile" action="<?php echo JRoute::_('');?>" method="post" name="track_profile">
				 <div id="form_data">
				<!-- the form fields will be loaded here via ajax -->
					<div class="field">
						<label for="track_nr">HAWB - </label>
						<input type="text" value="" placeholder="<?php echo JText::_('CONTROL_PANEL_PLACEHOLDER'); ?>" name="hawb_id_[]" />
					</div>
					<div class="field">
						<label for="track_nr">HAWB - </label>
						<input type="text" value="" placeholder="<?php echo JText::_('CONTROL_PANEL_PLACEHOLDER'); ?>" name="hawb_id_[]" />
					</div>
					<div class="field">
						<label for="track_nr">HAWB - </label>
						<input type="text" value="" placeholder="<?php echo JText::_('CONTROL_PANEL_PLACEHOLDER'); ?>" name="hawb_id_[]" />
					</div>
					<div class="field">
						<label for="track_nr">HAWB - </label>
						<input type="text" value="" placeholder="<?php echo JText::_('CONTROL_PANEL_PLACEHOLDER'); ?>" name="hawb_id_[]" />
					</div>
					<div class="field">
						<label for="track_nr">HAWB - </label>
						<input type="text" value="" placeholder="<?php echo JText::_('CONTROL_PANEL_PLACEHOLDER'); ?>" name="hawb_id_[]" />
					</div>
					<div class="field">
						<label for="track_nr">HAWB - </label>
						<input type="text" value="" placeholder="<?php echo JText::_('CONTROL_PANEL_PLACEHOLDER'); ?>" name="hawb_id_[]" />
					</div>
				</div>
				<span id="loading"></span>&nbsp;
				<a class="add_item" id="add_item" href="#"><?php echo JText::_('CONTROL_PANEL_MORE'); ?></a>
				<input type="hidden" name="show_form" value="track_profile" />
				<button name="track_do" class="sub" type="submit"><?php echo JText::_('CONTROL_PANEL_TRACK_DO'); ?></button>
			</form>
		</div>
		<?php
		} elseif(isset($_POST['show_form'])) {
		?>
		<div class="profile_form_right" >
			<h3 class="profile_form_title"><?php echo JText::_('CONTROL_PANEL_FORM_TITLE'); ?></h3>
			<button onclick="history.back();" class="back"><?php echo JText::_('CONTROL_PANEL_FORM_BACK'); ?></button>
			<div id="this_form">
		<?php
			$track_hawb = JRequest::getVar('hawb_id_');
			$hawb_num = 0;
			$EmptyFilterArray = array_filter($track_hawb);
			if (count($track_hawb) > 0 && (!empty($EmptyFilterArray))) {
				foreach ($track_hawb as $key=>$value){
						if($value == '') {continue;}
						$db->getQuery(true);
						$db->setQuery("SELECT * FROM #__form_out WHERE form_hawb='".htmlspecialchars(trim($value))."'");
						$track_package = $db->loadObject();
					if (count($track_package) > 0 && (!empty($track_package))) {
						label1:
							$assigned_to_check = explode(",", $track_package->form_assign);
								if (($username != 'unipost') && !in_array($username, $assigned_to_check)) {
									goto error_label;
								}
							if ($hawb_num != 0) echo "<div id='clear'></div><hr class='profile_hr'>";
						$hawb_num++;
						printf("<br><p class='left'>%s:</p><p class='right'><strong>%s</strong></p>",JText::_('CONTROL_PANEL_FORM_LABEL_1'),$track_package->form_hawb);
						printf("<p class='left'>%s:</p><p class='right'>%s ,%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_2'),$track_package->form_s_company,$track_package->form_org);
						printf("<p class='left'>%s:</p><p class='right'>%s ,%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_3'),$track_package->form_r_company,$track_package->form_dest);
							if(isset($track_package->form_gda)){
							printf("<p class='left'>%s:</p><p class='right'><a class='a_track' href='http://gdalliance.com/Track/Shipment_Tracking.aspx?ShipmentNumber=%s,&type=2'>%s</a></p>",JText::_("CONTROL_PANEL_FORM_LABEL_4"),$track_package->form_id,JText::_("CONTROL_PANEL_FORM_LABEL_5"));
							}
						printf("<p class='left'>%s:</p><p class='right'>%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_6'),$track_package->form_pieces);
						printf("<p class='left'>%s:</p><p class='right'>%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_7'),$track_package->form_weight);
							if ($track_package->form_type == 1) {
								$send_type = "DOX";
							} else {
								$send_type = "NDOX";
							}
						printf("<p class='left'>%s:</p><p class='right'>%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_8'),$send_type);


	//редактирование накладной
?>
</div>
<?php
	if ($username == "unipost"){
					$db->getQuery(true);
					$db->setQuery("SELECT * FROM #__form_out WHERE form_hawb='".htmlspecialchars(trim($value))."'");
					$edit_invoice = $db->loadObject();
					
					?>

					<button type="submit" class="show_invoice"  onclick="toggle_visibility('edit_invoice');"><?php echo JText::_('SHOW_INVOICE_EDIT'); ?></button>
					<?php
					//print_r($edit_del_package_history);
					//printf("<p class='left'>%s</p><p class='right'>%s</p>",$keys,htmlspecialchars($val_history->number));
				
					printf("<form name='edit_invoice'   method='post' action='javascript:void(null);' onsubmit='call()'   id='edit_invoice' style='padding: 20px; display:none;'>");
					printf("<table class='edit_invoice'>");
					printf("<tr>");
					printf("<td class='left'>%s:</p>",JText::_('CONTROL_PANEL_FORM_LABEL_2'));
					printf("<td><input name='edit_form_s_company' type='text' value='%s'/></td>",$edit_invoice->form_s_company);
					printf("<td><input name='edit_form_org' type='text' value='%s'/></td>",$edit_invoice->form_org);
					printf("</tr>");
					printf("<tr>");
					printf("<td class='left'>%s:</p>",JText::_('CONTROL_PANEL_FORM_LABEL_3'));
					printf("<td><input name='edit_form_r_company' type='text' value='%s'/></td>",$edit_invoice->form_r_company);
					printf("<td><input name='edit_form_dest' type='text' value='%s'/></td>",$edit_invoice->form_dest);
					printf("</tr>");
					printf("<tr>");
					printf("<td class='left'>%s:</p>",JText::_('CONTROL_PANEL_FORM_LABEL_6'));
					printf("<td><input name='edit_form_pieces' type='text' value='%s'/></td>",$edit_invoice->form_pieces);
					printf("</tr>");
					printf("<tr>");
					printf("<td class='left'>%s:</p>",JText::_('CONTROL_PANEL_FORM_LABEL_7'));
					printf("<td><input name='edit_form_weight' type='text' value='%s'/></td>",$edit_invoice->form_weight);
					printf("</tr>");
					printf("<tr>");
					printf("<td class='left'>%s:</p>",JText::_('CONTROL_PANEL_FORM_LABEL_8'));
					printf("<td><input name='edit_form_type' type='text' value='%s'/></td>",$edit_invoice->form_type);
					printf("</tr>");
					printf("<tr>");
					printf("<td></td>");
					printf("<td class='left'>%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_ANSWER'));
					printf("</tr>");
					printf("</table>");
					printf("<input name='edit_form_id' type='hidden' value='%s'/>",$edit_invoice->form_id);
					printf("<input name='edit_form_unique_id' type='hidden' value='%s'/>",$edit_invoice->form_unique_id);
					printf("<input name='edit_form_hawb' type='hidden' value='%s'/>",$edit_invoice->form_hawb);
					printf("<input type='submit' class='btn' name='Submit'  value=".JText::_('SAVE').">");	
					printf("</form>");
									}
					

 
						// if ($username == "unipost"){
						// 	printf("<p class='left'>%s:</p><p class='right'><a class='a_track' href='./profile/?assign=%s'>Присовить %s пользователя</a></p>",JText::_('CONTROL_PANEL_FORM_LABEL_9'),$track_package->form_hawb,$track_package->form_hawb);
						// }

						printf("<div id='clear'></div>");
						printf("</div>");
						printf("<div class='profile_form_right_full'>");
						printf("<h3 class='profile_form_history_title'>%s</h3>",JText::_('CONTROL_PANEL_HISTORY_TITLE'));
						printf("<table class='history'>");
						printf("<tr>");
						printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_HAWB'));
						printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_COUNTRY'));
						printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_DATE'));
						printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_CURR_STATUS'));
						printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_COMMENT'));
						if ($username == "unipost"){ printf("<th>%s</th>",JText::_('REDACT')); }
						printf("</tr>");
							if($value != ''){
								$db->getQuery(true);
								$db->setQuery("SELECT * FROM #__form_history WHERE number='".$track_package->form_unique_id."' ORDER BY date DESC");
								$track_package_history = $db->loadObjectList();
								//print_r($track_package_history);
							
			
							
									foreach ($track_package_history as $keys=>$val_history){
								if ($val_history->comments != NULL) {
											?>
							<style>
							tr.this_form_history:nth-child(3) td{background-color: #1ED634!important;}
							</style>
											<?php
										}
					$his_activity = getStatus($val_history->activity);
					$otpraviteli = $track_package->form_org;
					$standard_location = $val_history->location;
					$history_location = '';
					if ($his_activity == 'Pick up from shipper' || $his_activity == 'shpt manifested') {
					$history_location = $otpraviteli;
					} else {
					$history_location = $standard_location;	
					}
										//printf("<p class='left'>%s</p><p class='right'>%s</p>",$keys,htmlspecialchars($val_history->number));
										printf("<tr class='this_form_history'><td>%s</td>",$track_package->form_hawb);
										printf("<td>%s</td>",$history_location); //location
										printf("<td>%s</td>",$val_history->date);
										printf("<td>%s</td>",getStatus($val_history->activity));
										printf("<td>%s</td>",$val_history->comments);
										if ($username == "unipost") { 
											printf("<td><form name='edit' method='post' action=''><button type='submit' name='edit' value='%s'>".JText::_('REDACT_BUTTON')."</button></form><form name='delete' method='post' action=''> <button type='submit' name='delete' value='%s'>".JText::_('DELETE_BUTTON')."</button></form></td></tr>",$val_history->id,$val_history->id);
										}
									}	
							}

						printf("</table>");
						//добавить новую запись
							if ($username == "unipost") { 
								$db->getQuery(true);
								$db->setQuery("SELECT * FROM #__form_history WHERE number='".$track_package->form_unique_id."' ORDER BY date DESC");
								$track_package_history = $db->loadObjectList();
								//print_r($track_package_history);
					printf("<form name='add_action' id='add_action' method='post' action='javascript:void(null);' onsubmit='call3()'>");
					printf("<table class='history'>");
					printf("<tr>");
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_COUNTRY'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_DATE'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_CURR_STATUS'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_COMMENT'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_SAVE'));
					printf("</tr>");
					printf("<tr>");
					printf("<td><input name='add_location' type='text' value='%s'/></td>",$add_history->add_location);
					printf("<td><input name='add_date' type='text' value='%s'/></td>",$add_history->add_date);
					printf("<td>%s</td>",getStatusSelect($add_history->activity,'add_activity'));
					printf("<td><input name='add_comments' type='text' value='%s'/></td>",$add_history->add_comments);
					printf("<td><input type='submit' class='btn' value=".JText::_('SAVE').">");
					printf("</tr>");	
					printf("</table>");
					printf("<input name='add_id' type='hidden' value='%s'/>",$add_history->id);
					printf("<input name='add_number' type='hidden' value='%s'/>",$track_package->form_unique_id);
					printf("</form>");
						}

?>


<?php 

					} else {
						$db->getQuery(true);
						$db->setQuery("SELECT * FROM #__form_in WHERE form_hawb='".htmlspecialchars(trim($value))."'");
						$track_package = $db->loadObject();
						if (count($track_package) > 0 && (!empty($track_package))) {
							goto label1; 
						}
						error_label:
						printf("<div class='track_notice'>".JText::_('NAKLAD_ERROR')."</div>");
					}
				}
			} else {
					printf("<div class='track_notice'>".JText::_('ENTER_INVOICE')."</div>");
			}
	}
		?>
		</div>
<div id="clear"></div>
</div>
	<script>
		window.addEvent('domready', function() {
		var counter = 6;
		function new_rows(){
			counter += 2;
			var myHTMLRequest = new Request({
				url:'<?php echo JURI::base(); ?>components/com_users/views/profile/load.ajax.php',
				method:'get',
				autoCancel:true,
				data: {'type':'item','field_name':'add',num:counter,'placeholder':'<?php echo JText::_('CONTROL_PANEL_PLACEHOLDER'); ?>','placeholder_lim':'<?php echo JText::_('CONTROL_PANEL_MORE_LIMIT'); ?>'},
				onRequest: function() {
					$('loading').set('html','<img src=\"<?php echo JURI::base(); ?>images/ajax-loader.gif\">');
				},	onComplete: function(responseText) {
						var new_rows = new Element('div', {
							'html': responseText
						});
						// inject new fields at bottom
						new_rows.inject($('form_data'),'bottom');
						//    remove loading image
						$('loading').set('text','');
						//    scroll down to new form fields
						var myFx = new Fx.Scroll(window).toElement('hawb_id['+(counter)+']');
					}
			}).send();
		}
		$('add_item').addEvent('click', function(e){
			e.stop();  // stop the default submission of the form
			if(counter <= 29) {	new_rows();	} else {
				$(this).hide();
			}
			});
			//load first set of rows - all rows are loaded via ajax
		});
	</script>