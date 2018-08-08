<?php
	// If the user is already logged in, redirect to the profile page.
	$user = JFactory::getUser();
	$db = JFactory::getDbo();
	jimport( 'joomla.error.error' );
	@require_once("./components/com_users/views/profile/tmpl/func.php");
?>

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 






<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'print_page', 'height=400,width=800');
        mywindow.document.write('</head><body>');
        mywindow.document.write('<h1>UNIPOST-EXPRES SRL</h1>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        return true;

    }

</script>
<style>
@media print{
        div.profile_track button.back{display:none;}}
</style>


<button style="float:right; cursor:pointer;margin-right: 10px;" type="button" value="Print Div" onclick="PrintElem('#print_page')"><img src="../images/print.png" alt=""></button>
	
	<div  class="profile_track" id="print_page" style="clear:both;">
			<h3 class="profile_track_title"><?php echo JText::_('CONTROL_PANEL_FORM_TITLE'); ?></h3>
			<button onclick="history.back();" class="back"><?php echo JText::_('CONTROL_PANEL_FORM_BACK'); ?></button>
		<?php
			$track_hawb = $_POST['track_nr'];
			$hawb_num =0;
			if (isset($track_hawb) && !empty($track_hawb)) {
					$db->getQuery(true);
					$db->setQuery("SELECT * FROM #__form_out WHERE form_hawb='373-".htmlspecialchars(trim($track_hawb))."'");
					$track_package = $db->loadObject();
					if (count($track_package) > 0 && (!empty($track_package))) {
					if ($hawb_num != 0) echo "<div id='clear'></div><hr class='profile_hr' />";
					$hawb_num++;
					printf("<br><p class='left'>%s:</p><p class='right'><strong>%s</strong></p>",JText::_('CONTROL_PANEL_FORM_LABEL_1'),$track_package->form_hawb);
					printf("<p class='left'>%s:</p><p class='right'>%s ,%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_2'),$track_package->form_s_company,$track_package->form_org);
					printf("<p class='left'>%s:</p><p class='right'>%s ,%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_3'),$track_package->form_r_company,$track_package->form_dest);
					//if(isset($track_package->form_id)){
					//printf("<p class='left'>%s:</p><p class='right'><a class='a_track' href='http://gdalliance.com/Track/Shipment_Tracking.aspx?ShipmentNumber=%s,&type=2'>%s</a></p>",JText::_("CONTROL_PANEL_FORM_LABEL_4"),$track_package->form_id,JText::_("CONTROL_PANEL_FORM_LABEL_5"));
					//}
					printf("<p class='left'>%s:</p><p class='right'>%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_6'),$track_package->form_pieces);
					printf("<p class='left'>%s:</p><p class='right'>%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_7'),$track_package->form_weight);
					if ($track_package->form_type == 1) {
						$send_type = "DOCS";
					} else {
						$send_type = "NDOCS";
					}
					printf("<p class='left'>%s:</p><p class='right'>%s</p>",JText::_('CONTROL_PANEL_FORM_LABEL_8'),$send_type);
					printf("<div id='clear'></div>");
					printf("<h3 class='profile_track_history_title'>%s</h3>",JText::_('CONTROL_PANEL_HISTORY_TITLE'));
					printf("<div id='clear'></div>");
					printf("<table class='history'>");
					printf("<tr>");
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_HAWB'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_COUNTRY'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_DATE'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_CURR_STATUS'));
					printf("<th>%s</th>",JText::_('CONTROL_PANEL_HISTORY_COMMENT'));
					printf("</tr>");
					if($track_hawb != ''){
					$db->getQuery(true);
					$db->setQuery("SELECT * FROM #__form_history WHERE number='".$track_package->form_unique_id."' ORDER BY date DESC");
					$track_package_history = $db->loadObjectList();
						
						$user = JFactory::getUser();
 
       				 
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

						printf("<tr  class='this_form_history'><td>%s</td>",$track_hawb);
						printf("<td>%s</td>",$history_location);
						printf("<td>%s</td>",$val_history->date);
						printf("<td>%s</td>",getStatus($val_history->activity));
						printf("<td>%s</td></tr>",$val_history->comments);

					}
			}
			
					printf("</table>");
				} else {
					printf("<div class='track_notice'>".JText::_('NAKLADNAYA').$_POST['track_nr'].JText::_('NETU')."</div>");
				}
			} else {
					printf("<div class='track_notice'>".JText::_('NAKLADNAYA_VVEDITE')."</div>");
			} 
		?>
	</div>
	
	<div id="clear"></div>