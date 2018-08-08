<?php
$db = JFactory::getDbo();
$db->getQuery(true);
$db->setQuery("SELECT * FROM #__currency");
$db_currency = $db->loadObject();
$db_eur = $db_currency->current_val;
// Currency exchange rates START.
		$data= date("d.m.Y",time());
		$data_currency= date("d.m.y",time());
		@$currency = simplexml_load_file("http://www.bnm.md/md/official_exchange_rates?get_xml=1&date=".$data);
		$numb=0;
		$EUR=0;
		$USD=0;
		$RUB=0;
		foreach ($currency->Valute as $curr) {
			$numb+=1;
			if($numb == 1){
				$EUR = $curr->Value;
			}elseif($numb == 2){
				$USD = $curr->Value;
			}elseif($numb == 3){
				$RUB = $curr->Value;
			}
		   if($numb == 3){break;}
		}				
if ($db_eur !=0) {
	$EUR = $db_eur;
}
// Currency exchange rates END.
		$time_md = 'Chisinau : '.date("H:i:s",time()+3600);
		$time_ny = 'New York : '.date("H:i:s",time()+61200);
		$time_mw = 'Moscow : '.date("H:i:s",time());
		$time_cr = 'Cairo : '.date("H:i:s",time()-3600);
		$time_tk = 'Tokio : '.date("H:i:s",time()+21600);
?>