<?php
$db = JFactory::getDbo();
$db->getQuery(true);
$db->setQuery("SELECT * FROM #__currency");
$db_currency = $db->loadObject();

function getStatus($statusCode='0') {
	switch ($statusCode) {
		case '1':
			$statusResponse = "24/48 hrs delay/ntl holiday";
			break;
		case '2':
			$statusResponse = "24/48 hrs delay/aircraft problem ";
			break;
		case '3':
			$statusResponse = "24/48 hrs delay/bad weather";
			break;
		case '4':
			$statusResponse = "24/48 hrs delay/flight cancel ";
			break;
		case '5':
			$statusResponse = "24/48 hrs delay/offload";
			break;
		case '6':
			$statusResponse = "2nd rqst 2 org 4 instr";
			break;
		case '7':
			$statusResponse = "adv 2 ag 2 call cnee 4 verbal pod";
			break;
		case '8':
			$statusResponse = "adv 2 ag 2 del (date/time)";
			break;
		case '9':
			$statusResponse = "adv 2 ag 2 del free dom";
			break;
		case '10':
			$statusResponse = "adv ag 2 destroy";
			break;
		case '11':
			$statusResponse = "adv ag 2 return";
			break;
		case '12':
			$statusResponse = "adv ag 2 update";
			break;
		case '13':
			$statusResponse = "agent searching";
			break;
		case '14':
			$statusResponse = "airline checking 4 shpt";
			break;
		case '15':
			$statusResponse = "checking w/agent 4 pod/status";
			break;
		case '16':
			$statusResponse = "cnee moved";
			break;
		case '17':
			$statusResponse = "cnee notified";
			break;
		case '18':
			$statusResponse = "cnee will hand in ppwrk";
			break;
		case '19':
			$statusResponse = "cnee will pay t&d";
			break;
		case '20':
			$statusResponse = "customs cleared";
			break;
		case '21':
			$statusResponse = "Pick up from shipper";
			break;
		case '22':
			$statusResponse = "del will re-attempt tomorrow";
			break;
		case '23':
			$statusResponse = "dest check new cnee info";
			break;
		case '24':
			$statusResponse = "hold in customs";
			break;
		case '25':
			$statusResponse = "in customs/cnee notified";
			break;
		case '26':
			$statusResponse = "incomplete address";
			break;
		case '27':
			$statusResponse = "krea ...";
			break;
		case '28':
			$statusResponse = "missing/ag tracing short";
			break;
		case '29':
			$statusResponse = "not in /closed on del";
			break;
		case '30':
			$statusResponse = "ofd";
			break;
		case '31':
			$statusResponse = "onfwdd by post";
			break;
		case '32':
			$statusResponse = "onfwrd";
			break;
		case '33':
			$statusResponse = "onfwrd by subcontractor";
			break;
		case '34':
			$statusResponse = "original-comm-inv missing";
			break;
		case '35':
			$statusResponse = "ph call 2 org 4 instr";
			break;
		case '36':
			$statusResponse = "ph# missing";
			break;
		case '37':
			$statusResponse = "pod rqstd at ag";
			break;
		case '38':
			$statusResponse = "ppwrk missing fm cnee";
			break;
		case '39':
			$statusResponse = "proforma inv missing";
			break;
		case '40':
			$statusResponse = "recvd at Dest";
			break;
		case '41':
			$statusResponse = "refused/ rqst 2 org 4 instr";
			break;
		case '42':
			$statusResponse = "reminder 2 cnee";
			break;
		case '43':
			$statusResponse = "rqst 2 ag 4 pod dtls";
			break;
		case '44':
			$statusResponse = "rqst 2 org 2 cnfrm chrgs";
			break;
		case '45':
			$statusResponse = "rqst 2 org 4 org com inv";
			break;
		case '46':
			$statusResponse = "rqst 2 org 4 instr";
			break;
		case '47':
			$statusResponse = "scanned in";
			break;
		case '48':
			$statusResponse = "shppr will ctc cnee";
			break;
		case '49':
			$statusResponse = "shpt del";
			break;
		case '50':
			$statusResponse = "shpt del/pod asap";
			break;
		case '51':
			$statusResponse = "shpt held 4 p/u";
			break;
		case '52':
			$statusResponse = "status rqstd at ag";
			break;
		case '53':
			$statusResponse = "t&d frm cnee missing";
			break;
		case '54':
			$statusResponse = "t&d frm cnee recvd";
			break;
		case '55':
			$statusResponse = "transit";
			break;
		case '56':
			$statusResponse = "wait 4 payment fm cnee";
			break;
		case '57':
			$statusResponse = "wrong address";
			break;
		case '58':
			$statusResponse = "wrong ph#";
			break;
		case '59':
			$statusResponse = "shpt manifested";
			break;
		default:
			$statusResponse = "Not defined!";
			break;
	}
	return $statusResponse;
}

function getStatusSelect($active_sts,$selector_name) {
	$list_sts = "<select name=".$selector_name.">";
	for ($i=0; $i < 60; $i++) { 
		if ($i == (int)$active_sts) {
			$list_sts .= "<option value='$i' selected>".getStatus($i)."</option>";
			continue;
		}
		$list_sts .= "<option value='$i'>".getStatus($i)."</option>";
	}
	$list_sts .=  "</select>";
	return $list_sts;
}

function setHystory($id,$number,$location,$date,$statusCode,$comments) {
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	// Fields to update.
	$fields = array(
	    $db->quoteName('activity') . '=\''.$statusCode."'",
	    $db->quoteName('location') . '=\''.$location."'",
	    $db->quoteName('date') . '=\''.$date."'",
	    $db->quoteName('comments') . '=\''.$comments."'"
	);
	$conditions = array(
	    $db->quoteName('id') . '=\''.$id."'"
	);
	$query->update($db->quoteName('#__form_history'))->set($fields)->where($conditions);
	$db->setQuery($query);
	$result = $db->query();
	if ($result) {
		return "История накладной успешно изменена.";
	} else {
		return "Ощибка, повторите попытку - ".$db->getErrorMsg();
	}
}
function setInvoice($form_id,$form_unique_id,$form_hawb,$form_s_company,$form_org,$form_r_company,$form_dest,$form_pieces,$form_weight,$form_type) {
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	// Fields to update.
	$fields = array(
	    $db->quoteName('form_id') . '=\''.$form_id."'",
	    $db->quoteName('form_unique_id') . '=\''.$form_unique_id."'",
	    $db->quoteName('form_hawb') . '=\''.$form_hawb."'",
	    $db->quoteName('form_s_company') . '=\''.$form_s_company."'",
	    $db->quoteName('form_org') . '=\''.$form_org."'",
	    $db->quoteName('form_r_company') . '=\''.$form_r_company."'",
	    $db->quoteName('form_dest') . '=\''.$form_dest."'",
	    $db->quoteName('form_pieces') . '=\''.$form_pieces."'",
	    $db->quoteName('form_weight') . '=\''.$form_weight."'",
	    $db->quoteName('form_type') . '=\''.$form_type."'"
	);
	$conditions = array(
	    $db->quoteName('form_id') . '=\''.$form_id."'"
	);
	$query->update($db->quoteName('#__form_out'))->set($fields)->where($conditions);
	$db->setQuery($query);
	$result = $db->query();
	if ($result) {
		return "История накладной успешно изменена.";
	} else {
		return "Ощибка, повторите попытку - ".$db->getErrorMsg();
	}
}




function delHystory($id) {
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	// Fields to update.
	$conditions = array(
	    $db->quoteName('id') . '=\''.$id."'"
	);
	$query->delete($db->quoteName('#__form_history'))->where($conditions);
	$db->setQuery($query);
	$result = $db->query();
	if ($result) {
		return "История накладной успешно удалена.";
	} else {
		return "Ощибка, повторите попытку - ".$db->getErrorMsg();
	}
}

function assignPartner($HAWB,$partnerName) {
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	// Fields to update.
	$fields = array(
	    $db->quoteName('form_assign')." = concat(form_assign,'".$partnerName.",')"
	);
	$conditions = array(
	    $db->quoteName('form_hawb')." = '".$HAWB."'"
	);
	$query->update($db->quoteName('#__form_out'))->set($fields)->where($conditions);
	$db->setQuery($query);
	$result = $db->query();
	if ($result) {
		return "Накладная №".$HAWB." успешно присвоена.";
	} else {
		return "Ощибка, повторите попытку - ".$db->getErrorMsg();
	}
}
?>