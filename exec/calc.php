<?php
defined('_JEXEC') or die;
session_start();

  $db = JFactory::getDbo();
  $db->getQuery(true);
  $db->setQuery("SELECT id,name_en FROM uni_countries WHERE id>100 AND id<=400 ORDER BY name_en ASC");
  $query_countries_to = $db->loadObjectList();

  //Эконом тариф экспорт страны ЕС EUR 02.07.18 (1)
  $db->setQuery("SELECT * FROM 	uni_tarif1_econom_export_eu ORDER BY name_ru ASC");
  $query_countries_eu_t1 = $db->loadObjectList();

  //Спецпредложение  в города РФ по тарифу ECONOM», таблица 1.2.
  $db->setQuery("SELECT * FROM 	uni_tarif2_econom_city_rf ORDER BY name_ru ASC");
  $query_city_rf_t2 = $db->loadObjectList();

  //Тариф Экспресс ЭКСПОРТ для вэб ndox
  $db->setQuery("SELECT * FROM 	uni_tarif3_express_export_country ORDER BY name_ru ASC");
  $query_tarif_express_export_t3 = $db->loadObjectList();

  //эконом тариф импорт страны ЕС EUR 02.07.18
  $db->setQuery("SELECT * FROM 	uni_tarif4_econom_import_country ORDER BY name_ru ASC");
  $econom_import_country_t4 = $db->loadObjectList();

  $db->setQuery("SELECT * FROM 	uni_tarif5_econom_city_rf ORDER BY name_ru ASC");
  $towns_rf_t5 = $db->loadObjectList();

  $db->setQuery("SELECT * FROM uni_tarif6_express_import_country ORDER BY name_ru ASC");
  $express_import_country_t6 = $db->loadObjectList();
?>
  <div class="page_calc">
    <h3 class="page_title"><?php echo JText::_('CALC_TITLE1'); ?></h3>
    <div id="clear"></div>
    DO:
    <?php
      print_r($_POST);
    ?>
<?php
  if(isset($_POST['do_page_calc'])){
    $_SESSION['calc_size_kg'] =        $_POST['calc_size_kg'];
    $_SESSION['calc_weight_kg'] =      $_POST['calc_weight_kg'];
    $_SESSION['tariff'] =              $_POST['tariff'];
    $_SESSION['calc_to_country'] =     $_POST['calc_to_country'];
    $_SESSION['type_docs_ndocs'] =     $_POST['type_docs_ndocs'];
    $_SESSION['conv'] =                $_POST['conv'];
    $_SESSION['calc_size_lenght'] =    $_POST['calc_size_lenght'];
    $_SESSION['calc_size_width'] =     $_POST['calc_size_width'];
    $_SESSION['calc_size_height'] =    $_POST['calc_size_height'];
    $_SESSION['type_hu_you'] =         $_POST['type_hu_you'];
    $_SESSION['type_speed'] =          $_POST['type_speed'];
    $_SESSION['calc_size_x'] =         $_POST['calc_size_x'];
    $_SESSION['calc_size_y'] =         $_POST['calc_size_y'];
    $_SESSION['calc_size_z'] =         $_POST['calc_size_z'];
    $_SESSION['calc_volume_kg'] =      $_POST['calc_volume_kg'];


    $count_mest=$this->params->get('kol_mest');
    $count_mest_def=$this->params->get('kol_mest_def');


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

    }else{
      if ($_POST['type_docs_ndocs'] == 1){
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
      }else {

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
    printf("</table>");

    if ($weight_m3 != 0) {
      //printf("Обьёмный вес: %0.3f <br>",$weight_m3);
    }
    echo "<div class='podhodit'>".JText::_('PAGE_CALC_PODHODIT')."</div>";
    echo "<a class='btl-buttonsubmit btn' href='https://unipost.md/ru/?do=calc'>".JText::_('BACK')."</a>";
    //echo "<input class='btl-buttonsubmit btn' type='submit' onclick='history.back(-1);' value='".JText::_('BACK')."'/>";
    //echo "<a href='./?do=command' class='btl-buttonsubmit btn'>Оформить заказ</a>";
  }else{
  ?>
    <pre>
      <?php
        //  print_r($_SESSION);
      ?>
    </pre>
      <label><?php echo JText::_("PAGE_CALC_INFO"); ?></label>
      <form id="page_calc" action="" method="post" name="calculate_package">
      <div class="form_block">
        <!-- отправить -->
        <div class="field docs">
          <p class="calc-p"><label for="type_hu_you"><?php echo JText::_("PAGE_CALC_TYPE_YOU_HU_WANT"); ?></label></p>
          <div class="radio-block">
            <input value="0" type="radio" id="type_hu_send" class="type-send" name="type_hu_you" checked="checked"/>
            <label for="type_hu_send"><?php echo JText::_("PAGE_CALC_TYPE_YOU_HU_DO_SEND"); ?></label>
          </div>
          <!-- получить -->
          <div class="radio-block">
            <input value="1" type="radio" id="type_hu_rec" class="type-rec" name="type_hu_you"/>
            <label for="type_hu_rec"><?php echo JText::_("PAGE_CALC_TYPE_YOU_HU_DO_REC"); ?></label>
          </div>
        </div>

        <div class="field docs">
          <p class="calc-p"><label for="type_speed"><?php echo JText::_("PAGE_CALC_SEND_SELECT_TARIF"); ?></label></p>
          <!-- эконом -->
          <div class="radio-block">
            <!-- onclick="selectTarifType('econom',this)"  -->
            <input value="1" type="radio" id="type_speed_eco" class="type-econom" name="type_speed"
            <?php //echo ($_SESSION['type_speed'] == '1') ? 'checked="checked"' : ($_SESSION['type_speed'] == '')?'checked="checked"':''; ?> />
            <label for="type_speed_eco"><?php echo JText::_("PAGE_CALC_TYPE_SPEED_ECO"); ?></label>
          </div>
          <!-- экспресс -->
          <div class="radio-block">
            <!-- onclick="selectTarifType('express',this)" -->
            <input value="0" type="radio" id="type_speed_exp" class="type-express" name="type_speed"
            <?php //echo ($_SESSION['type_speed'] == '0') ? 'checked="checked"' : ''; ?>/>
            <label for="type_speed_exp"><?php echo JText::_("PAGE_CALC_TYPE_SPEED_EXP"); ?></label>
          </div>
        </div>


        <div class="field docs hidden" id="block-send-to-ES-RF">
          <p class="calc-p"><label for=""><?php echo JText::_("PAGE_CALC_SEND_TO_COUNTRYS"); ?></label></p>
          <!-- доставить в страны ес -->
          <div class="radio-block">
            <input type="radio" id="to_countrys_eu" name="destination" value="0" onclick="selectES()"
            <?php //echo ($_SESSION['to_eu'] == '1') ? 'checked="checked"' : ($_SESSION['to_eu'] == '')?'checked="checked"':''; ?> />
            <label for="to_countrys_eu"> <?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?></label>
          </div>
          <!-- доставить в города рф -->
          <div class="radio-block">
            <input type="radio" id="to_sities_rf" name="destination" value="1" onclick="selectRF()"
            <?php //echo ($_SESSION['to_rf'] == '1') ? 'checked="checked"' : ($_SESSION['to_rf'] == '')?'checked="checked"':''; ?> />
            <label for="to_sities_rf"><?php echo JText::_("PAGE_CALC_CITIES_RF"); ?></label>
          </div>
        </div>

        <!-- отправить эконом в ЕС-->
        <div class="field hidden" id="block-ES-countries">
          <select id="to_es" name="calc_to_es_country" onchange="changeEScountry();">
            <option value="-1" ><?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?></option>
            <?php
              foreach($query_countries_eu_t1 as $country_eu) {?>
                <option value='<?php echo $country_eu->id;?>'<?php echo($_SESSION['country_eu'] == $country_eu->id) ? 'selected="selected"' : ''; ?> >
                  <?php echo $country_eu->name_ru;?>
                </option>
            <?php }?>
          </select>
        </div>

        <!-- отправить эконом в РФ-->
        <div class="field hidden" id="block-RF-cities">
          <select id="to_rf" name="calc_to_rf_cities" onchange="changeRFcity();">
            <option value="-1" ><?php echo JText::_("PAGE_CALC_CITIES_RF"); ?></option>
            <?php
              $disable = '';
              foreach($query_city_rf_t2 as $city_rf) {?>
                <option value='<?php echo $city_rf->id;?>' <?php echo ($_SESSION['city_rf'] == $city_rf->id) ? 'selected="selected"' : ''; ?> >
                  <?php echo $city_rf->name_ru;?>
                </option>
            <?php }?>
          </select>
        </div>
        <!-- тариф отправить экспресс -->
        <div class="field hidden" id="block-all-countries">
          <p class="calc-p"><label for=""><?php echo JText::_("PAGE_CALC_SEND_TO_COUNTRYS"); ?></label></p>
          <select id="tarif_express_export_countries" name="tarif_express_export_countries" onchange="">
            <option value="-1" ><?php echo "Выберите страну"; ?></option>
            <?php
              foreach($query_tarif_express_export_t3 as $tarif_expres_export) {?>
                <option value='<?php echo $tarif_expres_export->id;?>' <?php echo ($_SESSION['tarif_expres_export'] == $tarif_expres_export->id) ? 'selected="selected"' : ''; ?> >
                  <?php echo $tarif_expres_export->name_ru;?>
                </option>
            <?php }?>
          </select>
        </div>

        <!-- получить эконом -->
        <div class="field hidden" id="block-get-from-ES-RF">
          <p class="calc-p"><label for=""><?php echo JText::_("PAGE_CALC_GET_FROM"); ?>1</label></p>
          <div class="radio-block">
            <input id="get_from_country_es" type="radio" name="receiver" value="0" onclick="getFromCountryES()"/>
            <label for="get_from_country_es"> <?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?></label>
          </div>
          <div class="radio-block">
            <input id="get_from_town_rf" type="radio" name="receiver" value="1" onclick="getFromTownRF()"/>
            <label for="get_from_town_rf"><?php echo JText::_("PAGE_CALC_CITIES_RF"); ?></label>
          </div>
        </div>


        <div class="field hidden" id="block-get-econom-ES">
          <label for="tarif_econom_import_ES">страны ЕС:</label>
          <select id="tarif_econom_import_ES" name="tarif_econom_import_ES" onchange="">
            <option value="-1" ><?php echo  JText::_("PAGE_CALC_SEND_SELECT") ?>ES</option>

            <?php foreach($query_countries_eu_t4 as $country) {?>
              <option value='<?php echo $country->id;?>'<?php echo($_SESSION['country_eu'] == $country->id) ? 'selected="selected"' : ''; ?> >
                <?php echo $country->name_ru;?>
              </option>
            <?php }?>

          </select>
        </div>

        <div class="field hidden" id="block-get-econom-RF">
          <label for="tarif_econom_import_RF">города РФ:</label>
          <select id="tarif_econom_import_RF" name="" onchange="">
            <option value="-1" ><?php echo JText::_("PAGE_CALC_SELECT_TOWN") ?>RF</option>

            <?php foreach($towns_rf_t5 as $town) {?>
              <option value='<?php echo $town->id;?>'<?php echo($_SESSION['country_eu'] == $town->id) ? 'selected="selected"' : ''; ?> >
                <?php echo $town->name_ru;?>
              </option>
            <?php }?>

          </select>
        </div>

        <div class="field hidden" id="block-get-express-import">
          <p class="calc-p"><label for="tarif_express_import_global">Получить ИЗ:</label></p>

          <select id="tarif_express_import_global" name="" onchange="">
            <option value="-1" ><?php echo JText::_("PAGE_CALC_SEND_SELECT") ?></option>

            <?php foreach($express_import_country_t6 as $country) {?>
              <option value='<?php echo $country->id;?>'<?php echo($_SESSION['country_global'] == $country->id) ? 'selected="selected"' : ''; ?> >
                <?php echo $country->name_ru;?>
              </option>
            <?php }?>

          </select>
        </div>




        <div class="dostupnosti" style="float:left; display:none;color: #129014; font-size: 12px;">
          <?php echo JText::_("USLUGA_LETTER_EXPRESS"); ?>
        </div>


        <div id="letter_error" style="float:left; display:none; color:red; font-size:12px;line-height: 30px;">
          <?php echo JText::_("NET_DOSTUPA_LETTER"); ?>
        </div>
        <div id="israel_error" style="float:left; display:none; color:red; font-size:12px;line-height: 30px;">
          <?php echo JText::_("DOSTUP_NDOX"); ?>
        </div>

        <div class="field header">
          <label class="calc_s_title"><?php echo JText::_("PAGE_CALC_SEND_INF"); ?></label>
        </div>

        <div class="field docs content-type">
          <p class="calc-p"><label for="type_docs_ndocs"><?php echo JText::_("PAGE_CALC_TYPE_DOCS_NDOCS_INF"); ?>:</label></p>
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
            <div id="package-type">
              <label style="line-height:30px;height:30px;" for="convert"><?php echo JText::_("PAGE_CALC_PACKAGE"); ?></label>
              <div class="field" style="float:left;clear:none;" onload="hideMe()">
                <input type="hidden" name="conv" value="0" />
                <input type="hidden" name="box" value="0" />
                <input style="width:auto;height:auto;float:left;" id="convert" type="radio" value="1" name="conv" <?php echo ($_SESSION['conv'] == '1') ? 'checked="checked"' : (empty($_SESSION['conv']))?'checked="checked"':''; ?>  onclick="showMe('weights', this, 1)"/><label for="conv"><?php echo JText::_("PAGE_CALC_PACKAGE_CONV"); ?></label>
                <input style="width:auto;height:auto;float:left;margin-left:26px;" id="box" class="last" type="radio" value="2" name="conv" <?php echo ($_SESSION['conv'] == '2') ? 'checked="checked"' : ''; ?> onclick="hideMe('weights', this, 1)"/><label for="box"><?php echo JText::_("PAGE_CALC_PACKAGE_BOX"); ?></label>
              </div>
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
              <p><?php echo JText::_("PAGE_CALC_SIZES_PLACES"); ?></p>
              <input class="short" type="text" style="width:86px;" id="len" value="<?php echo $_SESSION['calc_size_lenght']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SPACE_L"); ?>" name="calc_size_lenght" />x
              <input class="short" type="text" id="wid" value="<?php echo $_SESSION['calc_size_width']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SPACE_W"); ?>" name="calc_size_width" />x
              <input class="short" type="text" id="hei" value="<?php echo $_SESSION['calc_size_height']; ?>" placeholder="<?php echo JText::_("PAGE_CALC_SPACE_H"); ?>" name="calc_size_height" />
          </div>


          <!-- Количество мест -->
          <div class="field" id="places-count">
            <p class="calc-p"><label for="calc_places_lenght"><?php echo JText::_("PAGE_CALC_COUNT_PLACES"); ?></label></p>

            <select class="calc_places_lenght" onchange="addPlaces()" id="calc_places_lenght" name="calc_places_lenght">
              <option value="-1" ><?php echo "выберите кол-во мест"; ?></option>

              <?php
                $count_mest=10;
                for($i=1; $i<=$count_mest; $i++){
                  echo '<option value="' . $i . '" >' . $i . '</option>';
                }?>

            </select>
          </div>

          <div class="field" id="gabarits">

          </div>


          <div class="field" id="weight2" style="display:block;">
              <p><?php echo JText::_("PAGE_CALC_VOLUME_SIZE"); ?></p>
              <input style="width:86px;" id="wei" type="text" readonly="readonly" value="<?php echo $_SESSION['calc_size_kg']; ?>" maxlength="7" placeholder="" name="calc_size_kg"/>
               <div id="weight2_error" style="display: none; color:red;  float: right;  max-width: 200px;  margin-top: 10px;  margin-left: 5px;">
               <?php echo JText::_("VOLUME_WEIGHT"); ?>
               </div>
                </div>
          </div>

          <div class="field" id="sentFromOfficeBlock">
            <label for="sentFromOffice"><?php echo JText::_("PAGE_CALC_SENT_FROME_OFFICE"); ?></label>
            <input value="1" type="radio" id="sentFromOffice" name="sent_from_office" checked="checked">
          </div>

          <div class="field" id="getCurrierBlock">
            <label for="getCurrierToAdress"><?php echo JText::_("PAGE_CALC_GET_CURRIER_TO_ADRESS"); ?></label>
            <input value="1" type="radio" id="getCurrierToAdress" name="get_currier_to_adress">
          </div>

        </div>
        <div id="clear"></div>

        <div class="btn-group">
          <button type="submit" class="btl-buttonsubmit" id="do_calculate"name="do_page_calc"><?php echo JText::_("PAGE_CALC_DO_CALC"); ?></button>
          <button type="button" class="btl-buttonsubmit" id="do_cancel"> <?php echo JText::_("PAGE_CALC_DO_CANCEL"); ?></button>
        </div>

      </div>
      </form>
      <div class="form_img"></div>
      <div id="clear"></div>
  <?php } ?>
  </div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="/media/system/js/tarif-calc-page.js" type="text/javascript"></script>
<script type="text/javascript"></script>

<?php
session_write_close(); ?>
