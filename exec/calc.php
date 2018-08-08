<?php
defined('_JEXEC') or die;
session_start();

  $db = JFactory::getDbo();
  $db->getQuery(true);
  $db->setQuery("SELECT id,name_en FROM uni_countries WHERE id>100 AND id<=400 ORDER BY name_en ASC");
  $query_countries_to = $db->loadObjectList();
?>
  <div class="page_calc">
    <h3 class="page_title"><?php echo JText::_('CALC_TITLE1'); ?></h3>
        <div id="clear"></div>
<?php
  if(isset($_POST['do_page_calc'])){
   $_SESSION['calc_size_kg'] = $_POST['calc_size_kg'];
   $_SESSION['calc_weight_kg'] = $_POST['calc_weight_kg'];
   $_SESSION['tariff'] = $_POST['tariff'];
   $_SESSION['calc_to_country'] = $_POST['calc_to_country'];
   $_SESSION['type_docs_ndocs'] = $_POST['type_docs_ndocs'];
   $_SESSION['conv'] = $_POST['conv'];
   $_SESSION['calc_size_lenght'] = $_POST['calc_size_lenght'];
   $_SESSION['calc_size_width'] = $_POST['calc_size_width'];
   $_SESSION['calc_size_height'] = $_POST['calc_size_height'];
   $_SESSION['type_hu_you'] = $_POST['type_hu_you'];
   $_SESSION['type_speed'] = $_POST['type_speed'];
   $_SESSION['calc_size_x'] = $_POST['calc_size_x'];
   $_SESSION['calc_size_y'] = $_POST['calc_size_y'];
   $_SESSION['calc_size_z'] = $_POST['calc_size_z'];
   $_SESSION['calc_volume_kg'] = $_POST['calc_volume_kg'];



(int)$speed_dost = $_POST['type_speed'];

      (float)$weight_m3 = $_POST['calc_size_kg'];
      if ($_POST['calc_size_kg'] < $_POST['calc_weight_kg']) {
        (float)$weight_m3 = $_POST['calc_weight_kg'];
      }
      if (($weight_m3>0) && ($weight_m3<=0.5)) {
        $price_suffix = "weight05";
      } elseif (($weight_m3>0.5) && ($weight_m3<=1.0)) {
        $price_suffix = "weight10";
      } elseif (($weight_m3>1.0) && ($weight_m3<=1.5)) {
        $price_suffix = "weight15";
      } elseif (($weight_m3>1.5) && ($weight_m3<=2.0)) {
        $price_suffix = "weight20";
      } elseif (($weight_m3>2.0) && ($weight_m3<=2.5)) {
        $price_suffix = "weight25";
      } elseif (($weight_m3>2.5) && ($weight_m3<=3.0)) {
        $price_suffix = "weight30";
      } elseif (($weight_m3>3.0) && ($weight_m3<=3.5)) {
        $price_suffix = "weight35";
      } elseif (($weight_m3>3.5) && ($weight_m3<=4.0)) {
        $price_suffix = "weight40";
      } elseif (($weight_m3>4.0) && ($weight_m3<=4.5)) {
        $price_suffix = "weight45";
      } elseif (($weight_m3>4.5) && ($weight_m3<=5.0)) {
        $price_suffix = "weight50";
      } elseif (($weight_m3>5.0) && ($weight_m3<=5.5)) {
        $price_suffix = "weight50";
      } else {
        $price_suffix = "weight05";
      }
      $db->getQuery(true);
      $db->setQuery("SELECT * FROM uni_prices WHERE country=".$_POST['calc_to_country']);
      $query_countries_price = $db->loadObject();

//      print_r($query_countries_price);
//      echo $query_countries_price->econom." ECONOM<br>";//23
//      echo $query_countries_price->weight05." weight05<br>";//26
//      echo $query_countries_price->weight10." weight10<br>";//26
//      echo $query_countries_price->weight15." weight15<br>";//26


      if ($_POST['tariff'] == true OR $speed_dost==1) {
        $price1 = $query_countries_price->econom;
        $price_base = 65;

        if($weight_m3>10){
            $weight_count=$weight_m3-10;
            $price=$price_base+$weight_count*3;
        }else{
         $price=$price_base;
        }

         $query_countries_price->ndox = 0;
        (float)$final_price = (int)$price+$query_countries_price->ndox+$query_countries_price->expense+$query_countries_price->other_expense;
        (float)$final_price = $final_price*(float)$EUR;
      } else {
          if ($_POST['type_docs_ndocs'] == 1) {

              $query_countries_price->ndox = 0;
          }
 		  $disableda = "";
          if ($_POST['conv'] == 1) {
       		if ($_POST['calc_weight_kg'] > 0.7){
       	$delay=0;
header("Refresh: $delay;");
		 echo '<script>alert("' . JText::_('ERROR_CONV') . '");</script>';
		 return false;

             }

            $price = $query_countries_price->$price_suffix != '' ? $query_countries_price->$price_suffix:0;

            $price_base = 34;
            if($weight_m3>0.5){
                $weight_count=$weight_m3-0.5;
                $weight_kol=ceil($weight_count)*2;
                $price=$price_base+$weight_kol*6;
            }else{
             $price=$price_base;
            }


            (float)$final_price = $price+$query_countries_price->ndox+$query_countries_price->expense+$query_countries_price->other_expense;
            (float)$final_price = (float)$final_price*(float)$EUR;
          }
          else {

            if (($weight_m3>5.0) && ($weight_m3<=5.5)) {
            $price_inc = $query_countries_price->weight_inc;
          } elseif (($weight_m3>5.5) && ($weight_m3<=6.0)) {
             $price_suffix = "weight50";
             $price_inc = 2*$query_countries_price->weight_inc;
          } elseif (($weight_m3>6.0) && ($weight_m3<=6.5)) {
             $price_suffix = "weight50";
             $price_inc = 3*$query_countries_price->weight_inc;
          } elseif (($weight_m3>6.5) && ($weight_m3<=7.0)) {
             $price_suffix = "weight50";
             $price_inc = 4*$query_countries_price->weight_inc;
          } elseif (($weight_m3>7.0) && ($weight_m3<=7.5)) {
             $price_suffix = "weight50";
             $price_inc = 5*$query_countries_price->weight_inc;
          } elseif (($weight_m3>7.5) && ($weight_m3<=8.0)) {
             $price_suffix = "weight50";
             $price_inc = 6*$query_countries_price->weight_inc;
          } elseif (($weight_m3>8.0) && ($weight_m3<=8.5)) {
             $price_suffix = "weight50";
             $price_inc = 7*$query_countries_price->weight_inc;
          } elseif (($weight_m3>8.5) && ($weight_m3<=9.0)) {
             $price_suffix = "weight50";
             $price_inc = 8*$query_countries_price->weight_inc;
          } elseif (($weight_m3>9.0) && ($weight_m3<=9.5)) {
             $price_suffix = "weight50";
             $price_inc = 9*$query_countries_price->weight_inc;
          } elseif (($weight_m3>9.5) && ($weight_m3<=10.0)) {
             $price_suffix = "weight50";
             $price_inc = 10*$query_countries_price->weight_inc;
          } elseif (($weight_m3>10.0) && ($weight_m3<=10.5)) {
             $price_suffix = "weight50";
             $price_inc = 11*$query_countries_price->weight_inc;
          } elseif (($weight_m3>10.5) && ($weight_m3<=11.0)) {
             $price_suffix = "weight50";
             $price_inc = 12*$query_countries_price->weight_inc;
          } elseif (($weight_m3>11.0) && ($weight_m3<=11.5)) {
             $price_suffix = "weight50";
             $price_inc = 13*$query_countries_price->weight_inc;
          } elseif (($weight_m3>11.5) && ($weight_m3<=12.0)) {
             $price_suffix = "weight50";
             $price_inc = 14*$query_countries_price->weight_inc;
          } elseif (($weight_m3>12.5) && ($weight_m3<=13.0)) {
             $price_suffix = "weight50";
             $price_inc = 15*$query_countries_price->weight_inc;
          } elseif (($weight_m3>13.0) && ($weight_m3<=13.5)) {
             $price_suffix = "weight50";
             $price_inc = 16*$query_countries_price->weight_inc;
          } elseif (($weight_m3>13.5) && ($weight_m3<=14.0)) {
             $price_suffix = "weight50";
             $price_inc = 17*$query_countries_price->weight_inc;
          } elseif (($weight_m3>14.0) && ($weight_m3<=14.5)) {
             $price_suffix = "weight50";
             $price_inc = 18*$query_countries_price->weight_inc;
          } elseif (($weight_m3>14.5) && ($weight_m3<=15.0)) {
             $price_suffix = "weight50";
             $price_inc = 19*$query_countries_price->weight_inc;
          } elseif (($weight_m3>15.0) && ($weight_m3<=15.5)) {
             $price_suffix = "weight50";
             $price_inc = 20*$query_countries_price->weight_inc;
          } elseif (($weight_m3>15.5) && ($weight_m3<=16.0)) {
             $price_suffix = "weight50";
             $price_inc = 21*$query_countries_price->weight_inc;
          } elseif (($weight_m3>16.0) && ($weight_m3<=16.5)) {
             $price_suffix = "weight50";
             $price_inc = 22*$query_countries_price->weight_inc;
          } elseif (($weight_m3>16.5) && ($weight_m3<=17.0)) {
             $price_suffix = "weight50";
             $price_inc = 23*$query_countries_price->weight_inc;
          } elseif (($weight_m3>17.0) && ($weight_m3<=17.5)) {
             $price_suffix = "weight50";
             $price_inc = 24*$query_countries_price->weight_inc;
          } elseif (($weight_m3>17.5) && ($weight_m3<=18.0)) {
             $price_suffix = "weight50";
             $price_inc = 25*$query_countries_price->weight_inc;
          } elseif (($weight_m3>18.0) && ($weight_m3<=18.5)) {
             $price_suffix = "weight50";
             $price_inc = 26*$query_countries_price->weight_inc;
          } elseif (($weight_m3>18.5) && ($weight_m3<=19.0)) {
             $price_suffix = "weight50";
             $price_inc = 27*$query_countries_price->weight_inc;
          } elseif (($weight_m3>19.0) && ($weight_m3<=19.5)) {
             $price_suffix = "weight50";
             $price_inc = 28*$query_countries_price->weight_inc;
          } elseif (($weight_m3>19.5) && ($weight_m3<=20.0)) {
             $price_suffix = "weight50";
             $price_inc = 29*$query_countries_price->weight_inc;
          } elseif (($weight_m3>20.0) && ($weight_m3<=20.5)) {
             $price_suffix = "weight50";
             $price_inc = 30*$query_countries_price->weight_inc;
          } elseif (($weight_m3>20.5) && ($weight_m3<=21.0)) {
             $price_suffix = "weight50";
             $price_inc = 31*$query_countries_price->weight_inc;
          } elseif (($weight_m3>21.0) && ($weight_m3<=21.5)) {
             $price_suffix = "weight50";
             $price_inc = 32*$query_countries_price->weight_inc;
          } elseif (($weight_m3>21.5) && ($weight_m3<=22.0)) {
             $price_suffix = "weight50";
             $price_inc = 33*$query_countries_price->weight_inc;
          } elseif (($weight_m3>22.0) && ($weight_m3<=22.5)) {
             $price_suffix = "weight50";
             $price_inc = 34*$query_countries_price->weight_inc;
          } elseif (($weight_m3>22.5) && ($weight_m3<=23.0)) {
             $price_suffix = "weight50";
             $price_inc = 35*$query_countries_price->weight_inc;
          } elseif (($weight_m3>23.0) && ($weight_m3<=23.5)) {
             $price_suffix = "weight50";
             $price_inc = 36*$query_countries_price->weight_inc;
          } elseif (($weight_m3>23.5) && ($weight_m3<=24.0)) {
             $price_suffix = "weight50";
             $price_inc = 37*$query_countries_price->weight_inc;
          } elseif (($weight_m3>24.0) && ($weight_m3<=24.5)) {
             $price_suffix = "weight50";
             $price_inc = 38*$query_countries_price->weight_inc;
          } elseif (($weight_m3>24.5) && ($weight_m3<=25.0)) {
             $price_suffix = "weight50";
             $price_inc = 39*$query_countries_price->weight_inc;
          } elseif (($weight_m3>25.0) && ($weight_m3<=25.5)) {
             $price_suffix = "weight50";
             $price_inc = 40*$query_countries_price->weight_inc;
          } elseif (($weight_m3>25.5) && ($weight_m3<=26.0)) {
             $price_suffix = "weight50";
             $price_inc = 41*$query_countries_price->weight_inc;
          } elseif (($weight_m3>26.0) && ($weight_m3<=26.5)) {
             $price_suffix = "weight50";
             $price_inc = 42*$query_countries_price->weight_inc;
          } elseif (($weight_m3>26.5) && ($weight_m3<=27.0)) {
             $price_suffix = "weight50";
             $price_inc = 43*$query_countries_price->weight_inc;
          } elseif (($weight_m3>27.0) && ($weight_m3<=27.5)) {
             $price_suffix = "weight50";
             $price_inc = 44*$query_countries_price->weight_inc;
          } elseif (($weight_m3>27.5) && ($weight_m3<=28.0)) {
             $price_suffix = "weight50";
             $price_inc = 45*$query_countries_price->weight_inc;
          } elseif (($weight_m3>28.0) && ($weight_m3<=28.5)) {
             $price_suffix = "weight50";
             $price_inc = 46*$query_countries_price->weight_inc;
          } elseif (($weight_m3>28.5) && ($weight_m3<=29.0)) {
             $price_suffix = "weight50";
             $price_inc = 47*$query_countries_price->weight_inc;
          } elseif (($weight_m3>29.0) && ($weight_m3<=29.5)) {
             $price_suffix = "weight50";
             $price_inc = 48*$query_countries_price->weight_inc;
          } elseif (($weight_m3>29.5) && ($weight_m3<=30.0)) {
             $price_suffix = "weight50";
             $price_inc = 49*$query_countries_price->weight_inc;
          } elseif (($weight_m3>30.0) && ($weight_m3<=30.5)) {
             $price_suffix = "weight50";
             $price_inc = 50*$query_countries_price->weight_inc;
          } elseif (($weight_m3>30.5) && ($weight_m3<=31.0)) {
             $price_suffix = "weight50";
             $price_inc = 51*$query_countries_price->weight_inc;
          } elseif (($weight_m3>31.0) && ($weight_m3<=31.5)) {
             $price_suffix = "weight50";
             $price_inc = 52*$query_countries_price->weight_inc;
          } elseif (($weight_m3>31.5) && ($weight_m3<=32.0)) {
             $price_suffix = "weight50";
             $price_inc = 53*$query_countries_price->weight_inc;
          } elseif (($weight_m3>32) && ($weight_m3<=32.5)) {
             $price_suffix = "weight50";
             $price_inc = 54*$query_countries_price->weight_inc;
          } elseif (($weight_m3>32.5) && ($weight_m3<=33)) {
             $price_suffix = "weight50";
             $price_inc = 55*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>33) && ($weight_m3<=33.5)) {
             $price_suffix = "weight50";
             $price_inc = 56*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>33.5) && ($weight_m3<=34)) {
             $price_suffix = "weight50";
             $price_inc = 57*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>34) && ($weight_m3<=34.5)) {
             $price_suffix = "weight50";
             $price_inc = 58*$query_countries_price->weight_inc;
          }   elseif (($weight_m3>34.5) && ($weight_m3<=35)) {
             $price_suffix = "weight50";
             $price_inc = 59*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>35) && ($weight_m3<=35.5)) {
             $price_suffix = "weight50";
             $price_inc = 60*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>35.5) && ($weight_m3<=36)) {
             $price_suffix = "weight50";
             $price_inc = 61*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>36) && ($weight_m3<=36.5)) {
             $price_suffix = "weight50";
             $price_inc = 62*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>36.5) && ($weight_m3<=37)) {
             $price_suffix = "weight50";
             $price_inc = 63*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>37) && ($weight_m3<=37.5)) {
             $price_suffix = "weight50";
             $price_inc = 64*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>37.5) && ($weight_m3<=38)) {
             $price_suffix = "weight50";
             $price_inc = 65*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>38) && ($weight_m3<=38.5)) {
             $price_suffix = "weight50";
             $price_inc = 66*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>38.5) && ($weight_m3<=39)) {
             $price_suffix = "weight50";
             $price_inc = 67*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>39) && ($weight_m3<=39.5)) {
             $price_suffix = "weight50";
             $price_inc = 68*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>39.5) && ($weight_m3<=40)) {
             $price_suffix = "weight50";
             $price_inc = 69*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>40.5) && ($weight_m3<=41)) {
             $price_suffix = "weight50";
             $price_inc = 70*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>41) && ($weight_m3<=41.5)) {
             $price_suffix = "weight50";
             $price_inc = 71*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>41.5) && ($weight_m3<=42)) {
             $price_suffix = "weight50";
             $price_inc = 72*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>42) && ($weight_m3<=42.5)) {
             $price_suffix = "weight50";
             $price_inc = 73*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>42.5) && ($weight_m3<=43)) {
             $price_suffix = "weight50";
             $price_inc = 74*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>43) && ($weight_m3<=43.5)) {
             $price_suffix = "weight50";
             $price_inc = 75*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>43.5) && ($weight_m3<=44)) {
             $price_suffix = "weight50";
             $price_inc = 76*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>44) && ($weight_m3<=44.5)) {
             $price_suffix = "weight50";
             $price_inc = 77*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>44.5) && ($weight_m3<=45)) {
             $price_suffix = "weight50";
             $price_inc = 78*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>45) && ($weight_m3<=45.5)) {
             $price_suffix = "weight50";
             $price_inc = 79*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>45.5) && ($weight_m3<=46)) {
             $price_suffix = "weight50";
             $price_inc = 80*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>46) && ($weight_m3<=46.5)) {
             $price_suffix = "weight50";
             $price_inc = 81*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>46.5) && ($weight_m3<=47)) {
             $price_suffix = "weight50";
             $price_inc = 82*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>47) && ($weight_m3<=47.5)) {
             $price_suffix = "weight50";
             $price_inc = 83*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>47.5) && ($weight_m3<=48)) {
             $price_suffix = "weight50";
             $price_inc = 84*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>48) && ($weight_m3<=48.5)) {
             $price_suffix = "weight50";
             $price_inc = 85*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>48.5) && ($weight_m3<=49)) {
             $price_suffix = "weight50";
             $price_inc = 86*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>49) && ($weight_m3<=49.5)) {
             $price_suffix = "weight50";
             $price_inc = 87*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>49.5) && ($weight_m3<=50)) {
             $price_suffix = "weight50";
             $price_inc = 88*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>50) && ($weight_m3<=50.5)) {
             $price_suffix = "weight50";
             $price_inc = 89*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>50.5) && ($weight_m3<=51)) {
             $price_suffix = "weight50";
             $price_inc = 90*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>51) && ($weight_m3<=51.5)) {
             $price_suffix = "weight50";
             $price_inc = 91*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>51.5) && ($weight_m3<=52)) {
             $price_suffix = "weight50";
             $price_inc = 92*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>52) && ($weight_m3<=52.5)) {
             $price_suffix = "weight50";
             $price_inc = 93*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>52.5) && ($weight_m3<=53)) {
             $price_suffix = "weight50";
             $price_inc = 94*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>53) && ($weight_m3<=53.5)) {
             $price_suffix = "weight50";
             $price_inc = 95*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>53.5) && ($weight_m3<=54)) {
             $price_suffix = "weight50";
             $price_inc = 96*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>54) && ($weight_m3<=54.5)) {
             $price_suffix = "weight50";
             $price_inc = 97*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>54.5) && ($weight_m3<=55)) {
             $price_suffix = "weight50";
             $price_inc = 98*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>55) && ($weight_m3<=55.5)) {
             $price_suffix = "weight50";
             $price_inc = 99*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>55.5) && ($weight_m3<=56)) {
             $price_suffix = "weight50";
             $price_inc = 100*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>56) && ($weight_m3<=56.5)) {
             $price_suffix = "weight50";
             $price_inc = 101*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>56.5) && ($weight_m3<=57)) {
             $price_suffix = "weight50";
             $price_inc = 102*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>57) && ($weight_m3<=57.5)) {
             $price_suffix = "weight50";
             $price_inc = 103*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>57.5) && ($weight_m3<=58)) {
             $price_suffix = "weight50";
             $price_inc = 104*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>58) && ($weight_m3<=58.5)) {
             $price_suffix = "weight50";
             $price_inc = 105*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>58.5) && ($weight_m3<=59)) {
             $price_suffix = "weight50";
             $price_inc = 106*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>59) && ($weight_m3<=59.5)) {
             $price_suffix = "weight50";
             $price_inc = 107*$query_countries_price->weight_inc;
          }  elseif (($weight_m3>59.5) && ($weight_m3<=60)) {
             $price_suffix = "weight50";
             $price_inc = 108*$query_countries_price->weight_inc;
          }

            $price = $query_countries_price->$price_suffix!='' ? $query_countries_price->$price_suffix:0;

            $price_base = 34;
            if($weight_m3>0.5){
                $weight_count=$weight_m3-0.5;
                $weight_kol=$weight_count*2;
                $price=$price_base+ceil($weight_kol)*6;
            }else{
             $price=$price_base;
            }

            (float)$final_price = $price+$query_countries_price->ndox+$query_countries_price->expense+$query_countries_price->other_expense+$price_inc;
            (float)$final_price = (float)$final_price*(float)$EUR;
          }
          //echo (float)$weight_m3."<br>";
          //echo $price."<br>";
          //echo $price_suffix."<br>";
          //echo $query_countries_price->$price_suffix;
          //echo "<br /><br /><br />";
          //print_r($query_countries_price);
      }
      $db->getQuery(true);
      $db->setQuery("SELECT * FROM uni_countries WHERE id=".$_POST['calc_to_country']);
      $query_country_name = $db->loadObject();

              if($speed_dost==1)$speed_total="5-8 рабочих дней";
              if($speed_dost==0)$speed_total="3-5 рабочих дней";
              if($speed_dost==2)$speed_total="рабочих дня";
      printf("<table class='calc_response'>");
      printf("<tr><td class='info'>%s</td><td class='data'>%s</td></tr>",JText::_("PAGE_CALC_RS_COUNTRY"),$query_country_name->name_en);
      printf("<tr><td class='info'>%s</td><td class='data'>%.3f %s</td></tr>",JText::_("PAGE_CALC_RS_WEIGHT"),$weight_m3,JText::_("PAGE_CALC_RS_WEIGHT_KG"));
      printf("<tr><td class='info'>%s</td><td class='data'>%s %s</td></tr>",JText::_("PAGE_CALC_RS_TERM"),$speed_total,JText::_("PAGE_CALC_RS_TERM_D"));
      printf("<tr><td class='info'>%s</td><td class='data right'>%s &euro;</td></tr>",JText::_("PAGE_CALC_RS_PRICE"),$price=='' ? 0:$price+$price_inc);
        printf("<tr><td class='info'>%s</td><td class='data right'>+%s &euro;</td></tr>",JText::_("PAGE_CALC_RS_NDOX"),$query_countries_price->ndox=='' ? 0:$query_countries_price->ndox);

      printf("<tr><td class='info'>%s</td><td class='data right'>+%s &euro;</td></tr>",JText::_("PAGE_CALC_RS_ADD_EXPENSES"),$query_countries_price->expense=='' ? 0:$query_countries_price->expense);
      printf("<tr style='border:none;'><td class='info'>%s</td><td class='data right'>%s &euro;</td></tr>",JText::_("PAGE_CALC_RS_BORDER"),$query_countries_price->other_expense=='' ? 0:$query_countries_price->other_expense);
      echo "<tr style='border:none;'><td colspan='2' style='text-align:center;'><hr style='width:100%;height:1px;color:#333;background-color: #555;margin:2px auto;border:none;'/></td></tr>";
      printf("<tr style='border:none;'><td class='info' style='font-weight:bold;'>%s</td><td class='data right'>%.2f %s</td></tr>",JText::_("PAGE_CALC_RS_TEMP_PRICE"),$final_price,JText::_("PAGE_CALC_RS_TEMP_PRICE_CURRENCY"));
//
      printf("</table>");
      //echo "<br />";
      //echo "Страна куда: ".$_POST['calc_to_country']."<br>";
      //echo "Город куда: ".$_POST['calc_to_city']."<br>";
      //echo "Конверт:".$_POST['conv']."<br>";
      //echo "Коробка:".$_POST['box']."<br>";
      //echo "Вес: ".$_POST['calc_weight_kg']."<br>";
      //echo "Габариты, длина: ".$_POST['calc_size_lenght']."<br>";
      //echo "Габариты, ширина: ".$_POST['calc_size_width']."<br>";
      //echo "Габариты, высота: ".$_POST['calc_size_height']."<br>";
      //echo "Обьёмный вес: ".$_POST['calc_size_kg']."<br>";
      if ($weight_m3 != 0) {
        //printf("Обьёмный вес: %0.3f <br>",$weight_m3);
      }
      echo "<div class='podhodit'>".JText::_('PAGE_CALC_PODHODIT')."</div>";
      echo "<a class='btl-buttonsubmit btn' href='https://unipost.md/ru/?do=calc'>".JText::_('BACK')."</a>";
      //echo "<input class='btl-buttonsubmit btn' type='submit' onclick='history.back(-1);' value='".JText::_('BACK')."'/>";
      //echo "<a href='./?do=command' class='btl-buttonsubmit btn'>Оформить заказ</a>";
  } else {
  ?>
      <label><?php echo JText::_("PAGE_CALC_INFO"); ?></label>
      <form id="page_calc" action="" method="post" name="calculate_package">
      <div style="width:55%; float: left;" class="form_block">
        <div class="field">
          <!--<label class="calc_s_title"><?php echo JText::_("PAGE_CALC_SEND_FROM"); ?></label>-->
        </div>


        <div class="field docs">
            <p style="width:230px;"><label style="line-height:30px;height:30px;" for="type_hu_you"><?php echo JText::_("PAGE_CALC_TYPE_YOU_HU_WANT"); ?></label></p>

        <!--
            <select id="DOCS_NDOCS" style="width: 258px;margin:0;" onChange="showMe('letter_wrapper', this,0)" name="input_DOCS_NDOCS">
                  <option value="1" selected="selected">DOCS</option>
                  <option value="0">NDOCS</option>
            </select>-->

            <div id="input_NDOCS" style="display: inline;margin-right:30px;" >
                  <input style="width:auto;height:auto;float:left;" value="0"
                    onclick="showMe('letter_wrapper', this,0)"
                    checked="checked"
                    type="radio"
                    id="type_hu_send"
                    name="type_hu_you"/>

                  <label for="type_hu_send"><?php echo JText::_("PAGE_CALC_TYPE_YOU_HU_DO_SEND"); ?></label>
            </div>
            <div id="input_DOCS" style="display: inline;" >
                  <input style="width:auto;height:auto;float:left;" value="1"
                    onclick="hideMe('letter_wrapper', this,0)"
                    <?php //* echo ($_SESSION['type_hu_you'] == '0') ? 'checked="checked"' : ($_SESSION['type_hu_you'] == '')?'checked="checked"':''; //?>
                    type="radio"
                    id="type_hu_rec"
                    name="type_hu_you"/>
                  <label for="type_hu_rec"><?php echo JText::_("PAGE_CALC_TYPE_YOU_HU_DO_REC"); ?></label>
            </div>
        </div>



        <div class="field docs">
            <p style="width:230px;"><label style="line-height:30px;height:30px;" for="type_speed"><?php echo JText::_("PAGE_CALC_SEND_SELECT_TARIF"); ?></label></p>

            <div id="_input_DOCS" style="display: inline;margin-right:30px;">
                  <input style="width:auto;height:auto;" value="1" onclick="hideMe('letter_wrapper', this,0)" <?php echo ($_SESSION['type_speed'] == '1') ? 'checked="checked"' : ($_SESSION['type_speed'] == '')?'checked="checked"':''; ?> type="radio" id="type_speed_eco" name="type_speed"/>
                  <label for="type_speed_eco" id="lfor_type_speed_eco"><?php echo JText::_("PAGE_CALC_TYPE_SPEED_ECO"); ?></label>
            </div>

            <div id=_"input_NDOCS" style="display: inline;margin-right:30px;">
                  <input style="width:auto;height:auto;" value="0" onclick="showMe('letter_wrapper', this,0)" <?php echo ($_SESSION['type_speed'] == '0') ? 'checked="checked"' : ''; ?>  type="radio" id="type_speed_exp" name="type_speed"/>
                  <label for="type_speed_exp" id="lfor_type_speed_exp"><?php echo JText::_("PAGE_CALC_TYPE_SPEED_EXP"); ?></label>
            </div>
            <!--<div id="input_STAND" style="display: inline;margin-right:30px;">
                  <input style="width:auto;height:auto;" value="2" onclick="hideMe('letter_wrapper', this,0)" <?php echo ($_SESSION['type_speed'] == '2') ? 'checked="checked"' : ($_SESSION['type_speed'] == '')?'checked="checked"':''; ?> type="radio" id="type_speed_sta" name="type_speed"/><?php echo JText::_("PAGE_CALC_TYPE_SPEED_STA"); ?>
            </div>-->
        </div>

        <div class="field docs">
          <p style="width:230px;"><label style="line-height:30px;height:30px;" for=""><?php echo JText::_("PAGE_CALC_SEND_TO_COUNTRYS"); ?></label></p>
          <div id="countrys_eu" style="display: inline;margin-right:30px;">
              <input style="width:auto;height:auto;"
                value="1"
                onclick="hideMe('letter_wrapper', this,0)"
                <?php echo ($_SESSION['to_eu'] == '1') ? 'checked="checked"' : ($_SESSION['to_eu'] == '')?'checked="checked"':''; ?>
                type="radio"
                id="to_countrys_eu"
                name="to_countries_eu"/>
              <?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?>
          </div>
          <div id="cities_rf" style="display: inline;margin-right:30px;">
              <input style="width:auto;height:auto;" value="1" onclick="hideMe('letter_wrapper', this,0)" <?php echo ($_SESSION['to_rf'] == '1') ? 'checked="checked"' : ($_SESSION['to_rf'] == '')?'checked="checked"':''; ?> type="radio" id="to_sities_rf" name="to_cities_rf"/>
              <?php echo JText::_("PAGE_CALC_CITIES_RF"); ?>
          </div>
        </div>









<!--    <div class="field" id="letter_wrapper" style="display:none;">
            <input style="float:left;width:auto;" type="checkbox" id="letter" name="tariff"/><label style="line-height:45px;height:45px;" for="letter"><?php echo JText::_("PAGE_CALC_SEND_TARIF_DESC"); ?></label>
            <div id="clear"></div>
        </div>-->
        <div class="dostupnosti" style="float:left; display:none;color: #129014; font-size: 12px;">
          <?php echo JText::_("USLUGA_LETTER_EXPRESS"); ?>
        </div>

        <div class="field ">
            <p><?php echo JText::_("PAGE_CALC_SEND_TO"); ?></p>
            <select id="to_country" name="calc_to_country" onchange="changeFunc();">
                  <option value="-1" ><?php echo JText::_("PAGE_CALC_SEND_SELECT"); ?></option>
            <?php
            $disable = '';
              foreach($query_countries_to as $calc_price_val_to) {?>
               <option value='<?php echo $calc_price_val_to->id;?>' <?php echo ($_SESSION['calc_to_country'] == $calc_price_val_to->id) ? 'selected="selected"' : ''; ?> ><?php echo $calc_price_val_to->name_en;?></option>
           <?php     }
           ?>
            </select>

        </div>





                <div id="letter_error" style="float:left; display:none; color:red; font-size:12px;line-height: 30px;">
                 <?php echo JText::_("NET_DOSTUPA_LETTER"); ?>
        </div>
<div id="israel_error" style="float:left; display:none; color:red; font-size:12px;line-height: 30px;">
  <?php echo JText::_("DOSTUP_NDOX"); ?>
</div>
<!--         <div class="field city" style="display:none;">
    <p>Населённый пункт</p>
              <select name="calc_to_city" id="city_dropdown">
                <option value="-1">Выберите город</option>
              </select>
    <span id="city_loader"></span>
    onchange="selectState(this.options[this.selectedIndex].value)"
</div> -->
            <div class="field header">
              <label class="calc_s_title"><?php echo JText::_("PAGE_CALC_SEND_INF"); ?></label>
            </div>
        <div class="field docs">
            <p style="width:230px;"><label style="line-height:30px;height:30px;" for="type_docs_ndocs"><?php echo JText::_("PAGE_CALC_TYPE_DOCS_NDOCS_INF"); ?>:</label></p>

        <!--
            <select id="DOCS_NDOCS" style="width: 258px;margin:0;" onChange="showMe('letter_wrapper', this,0)" name="input_DOCS_NDOCS">
                  <option value="1" selected="selected">DOCS</option>
                  <option value="0">NDOCS</option>
            </select>-->

      <div id="input_NDOCS" style="display: inline;margin-right:30px;">
            <input style="width:auto;height:auto;" value="0" onclick="showMe('letter_wrapper', this,0)" <?php echo ($_SESSION['type_docs_ndocs'] == '0') ? 'checked="checked"' : ''; ?>  type="radio" id="type_docs_ndocs" name="type_docs_ndocs"/>NDOCS
            </div>
            <div id="input_DOCS" style="display: inline;">
            <input style="width:auto;height:auto;" value="1" onclick="hideMe('letter_wrapper', this,0)" <?php echo ($_SESSION['type_docs_ndocs'] == '1') ? 'checked="checked"' : ($_SESSION['type_docs_ndocs'] == '')?'checked="checked"':''; ?> type="radio" id="type_docs_docs" name="type_docs_ndocs"/>DOCS
            </div>
        </div>

        <div id="clear"></div>
        <div id="letter_sub">
            <div class="field">
              <label style="line-height:30px;height:30px;" for="convert"><?php echo JText::_("PAGE_CALC_PACKAGE"); ?></label>
            <div class="field" style="float:left;clear:none;" onload="hideMe()">
                <input type="hidden" name="conv" value="0" />
                <input type="hidden" name="box" value="0" />
                <input style="width:auto;height:auto;float:left;" id="convert" type="radio" value="1" name="conv" <?php echo ($_SESSION['conv'] == '1') ? 'checked="checked"' : (empty($_SESSION['conv']))?'checked="checked"':''; ?>  onclick="showMe('weights', this, 1)"/><label for="conv"><?php echo JText::_("PAGE_CALC_PACKAGE_CONV"); ?></label>
                <input style="width:auto;height:auto;float:left;margin-left:26px;" id="box" class="last" type="radio" value="2" name="conv" <?php echo ($_SESSION['conv'] == '2') ? 'checked="checked"' : ''; ?> onclick="hideMe('weights', this, 1)"/><label for="box"><?php echo JText::_("PAGE_CALC_PACKAGE_BOX"); ?></label>
            </div>

            <div class="field">
                <p><?php echo JText::_("PAGE_CALC_WEIGHT_KG"); ?><?php echo $_SESSION['calc_weight_kg'];?></p>
                <input id="weight_kg" style="width:86px;" type="text" oninput="proverka()" min="0" max="30" value="<?php echo $_SESSION['calc_weight_kg']; ?>" placeholder=""  name="calc_weight_kg" />
            <div id="weight_kg_error" style="display: none; color:red;  float: right;  max-width: 200px;  margin-top: 10px;  margin-left: 5px;">
              <?php echo JText::_("FIZICAL_WEIGHT"); ?>
            </div>
            </div>

            <div class="field"  style="display:none;">
                <p><?php echo JText::_("PAGE_CALC_SIZE"); ?></p>
                <input id="calc_size_x" style="width:50px;" type="text" oninput="proverka()" min="0" max="300" value="<?php echo $_SESSION['calc_size_x']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SIZE_X"); ?>"  name="calc_size_x" />
                <input id="calc_size_y" style="width:50px;" type="text" oninput="proverka()" min="0" max="300" value="<?php echo $_SESSION['calc_size_y']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SIZE_Y"); ?>"  name="calc_size_y" />
                <input id="calc_size_z" style="width:50px;" type="text" oninput="proverka()" min="0" max="300" value="<?php echo $_SESSION['calc_size_z']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SIZE_Z"); ?>"  name="calc_size_z" />
            <div id="weight_size_error" style="display: none; color:red;  float: right;  max-width: 200px;  margin-top: 10px;  margin-left: 5px;">
              <?php echo JText::_("PAGE_CALC_SIZE_ERR"); ?>
            </div>
            </div>

            <div class="field"  style="display:none;">
                <p><?php echo JText::_("PAGE_CALC_VOLUME_KG"); ?><?php echo $_SESSION['calc_volume_kg'];?></p>
                <input id="volume_kg" style="width:86px;" type="text" oninput="proverka()" min="0" max="30" value="<?php echo $_SESSION['calc_volume_kg']; ?>" placeholder=""  name="calc_volume_kg" />
            <div id="volume_kg_error" style="display: none; color:red;  float: right;  max-width: 200px;  margin-top: 10px;  margin-left: 5px;">
              <?php echo JText::_("FIZICAL_VOLUME"); ?>
            </div>
            </div>


            <div class="max_weight_message" style="float:left; color:red;line-height:30px; display:none;">
                <?php echo JText::_("MAXIMUM_WEIGHT"); ?>
            </div>
            <div class="field field_s" id="weights" style="display:block;">
                <p><?php echo JText::_("PAGE_CALC_SIZES"); ?></p>
                <input class="short" type="text" style="width:86px;" id="len" value="<?php echo $_SESSION['calc_size_lenght']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SPACE_L"); ?>" name="calc_size_lenght" />x
                <input class="short" type="text" id="wid" value="<?php echo $_SESSION['calc_size_width']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SPACE_W"); ?>" name="calc_size_width" />x
                <input class="short" type="text" id="hei" value="<?php echo $_SESSION['calc_size_height']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SPACE_H"); ?>" name="calc_size_height" />
            </div>

            <div class="field" id="weight2" style="display:block;">
                <p><?php echo JText::_("PAGE_CALC_VOLUME_SIZE"); ?></p>
                <input style="width:86px;" id="wei" type="text" readonly="readonly" value="<?php echo $_SESSION['calc_size_kg']; ?>" maxlength="7" placeholder="" name="calc_size_kg"/>
                 <div id="weight2_error" style="display: none; color:red;  float: right;  max-width: 200px;  margin-top: 10px;  margin-left: 5px;">
                 <?php echo JText::_("VOLUME_WEIGHT"); ?>
                 </div>
                  </div>
            </div>

        </div>
        <div id="clear"></div>
        <button type="submit" class="btl-buttonsubmit" id="do_calculate"name="do_page_calc"><?php echo JText::_("PAGE_CALC_DO_CALC"); ?></button>
      </div>
      </form>
      <div class="form_img"></div>
      <div id="clear"></div>
  <?php
  }
  ?>
  </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">


// Numeric only control handler
jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 ||
                key == 9 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};
//проверка физического веса
 function proverka(){
if ($('#weight_kg').val() > 30){
           $("#weight_kg_error").css("display","block");
            $("#do_calculate").attr("disabled", "true");
 } else
      {
        $("#weight_kg_error").css("display","none");
        $("#do_calculate").removeAttr('disabled');
      }
    }
    // Вычисление объёмного веса
    function funcCalcVolumeWeight(l, w, h) {
        l = Number(l); l = isNaN(l) ? 0 : l;
        w = Number(w); w = isNaN(w) ? 0 : w;
        h = Number(h); h = isNaN(h) ? 0 : h;

        return (l * w * h / 5000).toFixed(3);
    }
    function setCalcHandle() {
        var fn = function () {

            var volweight = funcCalcVolumeWeight($('#len').attr('value'), $('#wid').attr('value'), $('#hei').attr('value'));
            $('#wei').attr('value', volweight);

      if ($('#wei').val() > 60)
      {
           $("#weight2_error").css("display","block");
            $("#do_calculate").attr("disabled", "true");
      }
      else
      {
         $("#weight2_error").css("display","none");
        $("#do_calculate").removeAttr('disabled');
      }





        }

        $('#len').keyup(fn);
        $('#wid').keyup(fn);
        $('#hei').keyup(fn);
        $('#len').ForceNumericOnly();
        $('#wid').ForceNumericOnly();
        $('#hei').ForceNumericOnly();
        $('#wei').ForceNumericOnly();
        $('#weight_kg').ForceNumericOnly();
        fn();
    }
    setCalcHandle();
$('select').change(function() {

    $(this)
        .siblings('select')
        .children('option[value=' + this.value + ']')
        .attr('disabled', true)
        .siblings().removeAttr('disabled');

});
$("input#letter").live("click", function(){
        if($(this).is(":checked")) {
          document.getElementById('weight_kg').value='0.49';
           // $("#letter_sub").hide();
            $(".dostupnosti").css("display","block");
            $(".field.header").css("display","none");
            $(".field.docs").css("display","none");
            $("#letter_sub").css("display","none");
       $("option[value='222']").attr("disabled", "true");
       $("option[value='223']").attr("disabled", "true");
       $("option[value='224']").attr("disabled", "true");
       $("option[value='225']").attr("disabled", "true");
       $("option[value='226']").attr("disabled", "true");
       $("option[value='227']").attr("disabled", "true");
       $("option[value='228']").attr("disabled", "true");
       $("option[value='229']").attr("disabled", "true");
       $("option[value='230']").attr("disabled", "true");
       $("option[value='231']").attr("disabled", "true");
       $("option[value='232']").attr("disabled", "true");
       $("option[value='233']").attr("disabled", "true");
       $("option[value='234']").attr("disabled", "true");
       $("option[value='235']").attr("disabled", "true");
       $("option[value='236']").attr("disabled", "true");
       $("option[value='237']").attr("disabled", "true");
       $("option[value='238']").attr("disabled", "true");
       $("option[value='239']").attr("disabled", "true");
       $("option[value='240']").attr("disabled", "true");
       $("option[value='241']").attr("disabled", "true");
       $("option[value='242']").attr("disabled", "true");
       $("option[value='243']").attr("disabled", "true");
       $("option[value='244']").attr("disabled", "true");
            //$("input#wei").show();
            $("input#wei").val('0');
         // $("#input_NDOCS").hide();
            $("#type_docs_docs").attr("checked","true");
            $("#type_docs_ndocs").removeAttr('checked');
        } else {
          document.getElementById('weight_kg').value='';
          $(".field.header").css("display","block");
            $(".field.docs").css("display","block");
            $("#letter_sub").css("display","block");
          $("#letter_error").css("display","none");
            $(".dostupnosti").css("display","none");
       $("option[value='222']").removeAttr('disabled');
       $("option[value='223']").removeAttr('disabled');
       $("option[value='224']").removeAttr('disabled');
       $("option[value='225']").removeAttr('disabled');
       $("option[value='226']").removeAttr('disabled');
       $("option[value='227']").removeAttr('disabled');
       $("option[value='228']").removeAttr('disabled');
       $("option[value='229']").removeAttr('disabled');
       $("option[value='230']").removeAttr('disabled');
       $("option[value='231']").removeAttr('disabled');
       $("option[value='232']").removeAttr('disabled');
       $("option[value='233']").removeAttr('disabled');
       $("option[value='234']").removeAttr('disabled');
       $("option[value='235']").removeAttr('disabled');
       $("option[value='236']").removeAttr('disabled');
       $("option[value='237']").removeAttr('disabled');
       $("option[value='238']").removeAttr('disabled');
       $("option[value='239']").removeAttr('disabled');
       $("option[value='240']").removeAttr('disabled');
       $("option[value='241']").removeAttr('disabled');
       $("option[value='242']").removeAttr('disabled');
       $("option[value='243']").removeAttr('disabled');
       $("option[value='244']").removeAttr('disabled');
            $("#letter_sub").show();
          $("#input_NDOCS").show();
            $("#type_docs_docs").attr("checked","true");
        }
});

   function changeFunc() {
    var selectBox = document.getElementById("to_country");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
     $("#letter_error").css("display","none");
    if(selectedValue==141){
 $("#input_NDOCS").css("display","none");
          $("#israel_error").css("display","block");
          return false;
    } else {
          $("#input_NDOCS").css("display","inline-block");
          $("#israel_error").css("display","none");
          return true;}
   }


$("#do_calculate").live("click", function(){
	if($("select#to_country option:selected").val()==-1 && $("#weight_kg").val() == '' && $("#len").val() == '' && $("#wid").val() == '' && $("#hei").val() == '') {
            $("select#to_country, #weight_kg, #len, #wid, #hei").css("border-color","red");
            return false;
        }
        if($("select#to_country option:selected").val()==-1 ) {
            $("select#to_country").css("border-color","red");
            return false;
        }
        if ($("#weight_kg").val() == '' ) {
		$("#weight_kg").css("border-color","red");
		return false;
        }
        if ($("#box").prop("checked") == 1) {
	        if ($("#len").val() == '') {
	        	$("#len").css("border-color","red");
			return false;
	        }
	        if ($("#wid").val() == '') {
	        	$("#wid").css("border-color","red");
			return false;
	        }
	        if ($("#hei").val() == '') {
	        	$("#hei").css("border-color","red");
			return false;
	        }
        }

         var selectBox = document.getElementById("to_country");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if(selectedValue==222){
       $("#letter_error").css("display","block");
      return false;
    } else {
      $("#letter_error").css("display","none");
      return true;
    }
});
function showMe (it, box, it2) {

  var vis = (box.checked) ? "none" : "block";
  document.getElementById(it).style.display = vis;
  if (it2) {
  $("input#wei").removeAttr('readonly');
  $("#weight2").hide();
  document.getElementById('wei').value='0' ;
    $(".max_weight_message").show();

  };
}

function hideMe (it, box, it2) {
  var vis = (box.checked) ? "block" : "none";
  document.getElementById(it).style.display = vis;
  if (it2) {
    $("input#wei").attr("readonly","true");
    $("#weight2").show();
    $(".max_weight_message").hide();

  };
}

var doc = $('input#type_docs_docs"').prop('checked');
(doc == true) ? $('#letter_wrapper').show() : $('#letter_wrapper').hide();

var box = $('input#box').prop('checked');
//(box == true) ? $('#weights, #weight2').show() : $('#weights, #weight2').hide();

$('.my-ctrl-1').click(function(){
  $('.my-field-2').hide();
  $('.my-field-1').show();
});

$('.my-ctrl-2').click(function(){
  $('.my-field-1').hide();
  $('.my-field-2').show();
});

</script>
<style>
.my-field-2{
  display:none;
}
</style>
<?php
session_write_close(); ?>
