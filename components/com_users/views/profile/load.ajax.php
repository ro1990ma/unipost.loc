<?php
// check we have data
if(!isset($_GET["field_name"])) die("error with data");
if(!isset($_GET["type"]))        die("Error with data");
 
// define vars (should do more checking here)
$field_name    =    $_GET["field_name"];
$form_type    =    $_GET["type"];
$num        =    $_GET["num"];
$placeholder  =  $_GET["placeholder"];
$placeholder_lim  =  $_GET["placeholder_lim"];
if($num >= 31){
		$form_type = "none";
};
switch($form_type){
 case "item":
	 echo '<div class="field"><label for="track_nr">HAWB - </label><input type="text" value="" placeholder="'.$placeholder.'" name="hawb_id_[]" /></div>';
	 echo '<div class="field"><label for="track_nr">HAWB - </label><input type="text" value="" placeholder="'.$placeholder.'" name="hawb_id_[]" /></div>';
	 break;
 default:
	echo '<div class="field"><label>'.$placeholder_lim.'</label></div><div id="clear"></div>';
 break;
}
?>