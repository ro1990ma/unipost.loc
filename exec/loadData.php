<?php

$mysql_db_hostname = "ns3.host-md.net";
$mysql_db_user = "1224-unipost";
$mysql_db_password = "UN1-p0st";
$mysql_db_database = "1224-unipost";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user,$mysql_db_password) or die("Could not connect database");
//Create a new connection
mysql_select_db($mysql_db_database, $con) or die("Could not select database");
// select database

$loadType=$_POST['loadType'];
$loadId=$_POST['loadId'];

if($loadType == "state"){
   $sql="SELECT region_id,name FROM uni_region WHERE country_id='".$loadId."' ORDER BY name ASC LIMIT 0,50";
}else{
   $sql="SELECT city_id,name FROM uni_city WHERE country_id='".$loadId."' ORDER BY name ASC";
}
$result = mysql_query($sql) || die(mysql_error());

$res = mysql_query($sql);

$check = mysql_num_rows($res);
if($check > 0){
   $HTML="";
   while($row=mysql_fetch_array($res)){
      $HTML.="<option value='".$row['0']."'>".$row['1']."</option>";
   }
   echo $HTML;
}
?>