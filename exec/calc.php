<?php
defined('_JEXEC') or die;
session_start();

  $db = JFactory::getDbo();
  $db->getQuery(true);
  $db->setQuery("SELECT id,name_en FROM uni_countries WHERE id>100 AND id<=400 ORDER BY name_en ASC");
  //$query_countries_to = $db->loadObjectList();

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

  $db->setQuery("SELECT * FROM uni_tarif2_rf_post ORDER BY name_ru ASC");
  $special_rf_towns = $db->loadObjectList();

  $db->setQuery("SELECT * FROM uni_tarif2_rf_get ORDER BY name_ru ASC");
  $special_rf_get = $db->loadObjectList();

?>
  <div class="page_calc">
    <h3 class="page_title"><?php echo JText::_('CALC_TITLE1'); ?></h3>
    <div id="clear"></div>
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

    if ($_POST['calc_weight_kg'] > $_POST['calc_size_kg']){
      $weight = (float)$_POST['calc_weight_kg'];  // физический вес
    }else{
      $weight = (float)$_POST['calc_size_kg'];    // объёмный вес
    }

    // $weight = (float)$_POST['calc_weight_kg'];

    if($_POST['type_hu_you'] == 0){ // отправить
      if($_POST['type_speed'] == 0){ // эконом

        if($_POST['destination'] == 0){ // страны ес
          if ($_POST['calc_to_es_country'] != -1){ //если выбранна страна

            $target_table = 1;
            $t1_terms = "6-10";

            $id = $_POST['calc_to_es_country'];
            $country_obj = null;

            foreach($query_countries_eu_t1 as $item){
              if ($item->id == $id){
                $country_obj = $item;
                break;
              }
            }

            if($weight <= 10){
              (float)$price = (float)$country_obj->tarif_less_10kg;
            }else{
              $weight_over = $weight - 10;
              (float)$price = ((float)$country_obj->tarif_plus_1kg * (float)$weight_over) + (float)$country_obj->tarif_less_10kg;
            }

            if (isset($_POST['dispatch_from']) && $_POST['dispatch_from'] == 0){
              $price = $price - 1.80;
            }

            $final_price = (float)$price * (float)$EUR;
          }
        }

        if($_POST['destination'] == 1){ // города рф
          if ($_POST['calc_to_rf_cities'] != -1){

            $target_table = 2;
            $id = $_POST['calc_to_rf_cities'];
            $city_obj = null;

            foreach($query_city_rf_t2 as $item){
              if ($item->id == $id){
                $city_obj = $item;
                break;
              }
            }

            if($weight <= 20.5){
              // для специяльных городов РФ. таб.1.1
              if ($city_obj->special != 0){

                $special_cod = $city_obj->special;

                foreach($special_rf_towns as $item){
                  if ($item->special_id == $special_cod){
                    $special_rf_town = $item;
                    break;
                  }
                }

                if($weight <= 0.5){
                  (float)$price = (float)$special_rf_town->tarif_less_05;
                }else{
                  $weight1 = (float)(($weight - 0.5) / 0.5);
                  (float)$price = (float)$special_rf_town->tarif_less_05 + ((float)$weight1 * (float)$special_rf_town->tarif_next_05);
                }

                $city_obj->terms = $special_rf_town->terms;

              }else{
                (float)$price = (float)$city_obj->tarif_less_20;
              }
            }


            if($weight > 20.5){
              $weight_over = (float)(($weight - 20.50) / 0.5);
              (float)$price = (float)$city_obj->tarif_less_20 + ((float)$weight_over * (float)$city_obj->tarif_next_05);
            }


            if (isset($_POST['dispatch_from']) && $_POST['dispatch_from'] == 1){
              $price = $price + 1.80;
            }


            (float)$final_price = (float)$price*(float)$EUR;

          }
        }
      }

      if($_POST['type_speed'] == 1){ // экспресс
        if ($_POST['tarif_express_export_countries'] != -1){

          $target_table = 3;

          $id = $_POST['tarif_express_export_countries'];
          $country_t3 = null;

          foreach($query_tarif_express_export_t3 as $item){
            if ($item->id == $id){
              $country_t3 = $item;
              break;
            }
          }

          if ($_POST['type_docs_ndocs'] == 1){//документы

            if($weight <= 0.5){
              (float)$price = (float)$country_t3->doc_less05;
            }else{

              $weight_over = floor(($weight - 0.5) / 0.5);
              (float)$price = (float)$country_t3->doc_less05 + ((float)$country_t3->doc_more05 * $weight_over); //если за каждых 0,5 кг
            }
          }

          if ($_POST['type_docs_ndocs'] == 0){//недокументы
            if($weight <= 0.5){
              (float)$price = (float)$country_t3->not_doc_less05;
            }else{
              // $weight_over = floor(((float)$weight / 0.5));
              $weight_over = ( ((float)$weight - 0.5) / 0.5);
              (float)$price = (float)$country_t3->not_doc_more05 * (float)$weight_over;
            }
          }

          if (isset($_POST['dispatch_from']) && $_POST['dispatch_from'] == 0){
            $price = $price - 1.80;
          }

          (float)$final_price = (float)$price*(float)$EUR;

        }
      }
    }

//получить_____________________________________________________________


    if ($_POST["type_hu_you"] == 1){ // получить
      if($_POST['type_speed'] == 0){ //эконом

        if ($_POST['receiver'] == 0){// в страны ес
          if ($_POST['tarif_econom_import_ES'] != -1){ //если выбранна страна


            $id = $_POST['tarif_econom_import_ES'];
            $country_t4 = null;
            $target_table = 4;
            $t4_terms = "5-9";

            foreach($econom_import_country_t4 as $item){
              if ($item->id == $id){
                $country_t4 = $item;
                break;
              }
            }

            if($weight <= 10){
               (float)$price = (float)$country_t4->tarif_less10;
            }else{
               // $weight_over = floor((float)$weight - 10); // округление
               $weight_over = (float)$weight - 10;
               (float)$price = ((float)$country_t4->tarif_plus_one * (float)$weight_over) + (float)$country_t4->tarif_less10;
            }

            if (isset($_POST['dispatch_from']) && $_POST['dispatch_from'] == 0){
              $price = $price - 1.80;
            }

            (float)$final_price = (float)$price * (float)$EUR;

          }
        }

        if ($_POST['receiver'] == 1){// в города рф
          if ($_POST['tarif_econom_import_RF'] != -1){ //если выбран город РФ

            $id = $_POST['tarif_econom_import_RF'];
            $town_t5 = null;
            $target_table = 5;

            foreach($towns_rf_t5 as $item){
              if ($item->id == $id){
                $town_t5 = $item;
                break;
              }
            }

            // Получение оп тарифу эконом из городов РФ
            if($weight <= 20.5){
              if ($town_t5->spec != 0){
                  $cod = $town_t5->spec;

                  foreach($special_rf_get as $item){
                    if ($item->special_id == $cod){
                      $special_getter = $item;
                      break;
                    }
                  }

                  if($weight <= 0.5){
                    (float)$price = (float)$special_getter->tarif_less_05;
                  }else{
                    $weight1 = (float)(($weight - 0.5) / 0.5);
                    (float)$price = (float)$special_getter->tarif_less_05 + ((float)$weight1 * (float)$special_getter->tarif_next_05);
                  }
                  $town_t5->terms = $special_getter->terms;

              }else{
                  (float)$price = (float)$town_t5->tarif_less_20;
              }
            }


            if($weight > 20.5){
              // $weight_over = floor(($weight - 20.50) / 0.5); //округление
              $weight_over = (($weight - 20.50) / 0.5);
              (float)$price = (float)$town_t5->tarif_less_20 + ((float)$weight_over * (float)$town_t5->tarif_next_05);
            }

            if (isset($_POST['dispatch_from']) && $_POST['dispatch_from'] == 1){
              $price = $price + 1.80;
            }

            (float)$final_price = (float)$price*(float)$EUR;

          }
        }
      }

      if($_POST['type_speed'] == 1){ //экспресс

        if ($_POST['tarif_express_import_global'] != -1){
          $id = $_POST['tarif_express_import_global'];
          $target_table = 6;
          $country_t6 = null;

          foreach($express_import_country_t6 as $item){
            if ($item->id == $id){
              $country_t6 = $item;
              break;
            }
          }


          if ($_POST['type_docs_ndocs'] == 1){//документы
            if($weight <= 0.5){
              (float)$price = (float)$country_t6->doc_less_05;
            }else{
              (float)$price = (float)$country_t6->doc_less_05 + (float)$country_t6->doc_more_05;
            }
          }

          if ($_POST['type_docs_ndocs'] == 0){//недокументы
            if($weight <= 0.5){
              (float)$price = (float)$country_t6->other_less_05;
            }else{
              $weight_over = floor(((float)$weight / 0.5));
              (float)$price = (float)$country_t6->other_more_05 * (float)$weight_over;
            }
          }


          if (isset($_POST['dispatch_from']) && $_POST['dispatch_from'] == 0){
            $price = $price - 1.50;
          }

          (float)$final_price = (float)$price * (float)$EUR;

        }


      }
    }

    // для каждого вида тарифа отдельная таблицы, на случай, индивидуальных изменений к отдельному тарифу
    if ($target_table == 1){
      printf("<h3>Тариф отправить эконом в страны ЕС</h3>");
      printf("<table class='calc_response'>");
      printf("<tr><td class='info'>%s</td><td class='data'>%s</td></tr>",               JText::_("PAGE_CALC_RS_COUNTRY"), $country_obj->name_ru);
      printf("<tr><td class='info'>%s</td><td class='data'>%.3f %s</td></tr>",          JText::_("PAGE_CALC_RS_WEIGHT"),  $weight, JText::_("PAGE_CALC_RS_WEIGHT_KG"));
      printf("<tr><td class='info'>%s</td><td class='data'>%s %s</td></tr>",            JText::_("PAGE_CALC_RS_TERM"),    $t1_terms ,JText::_("PAGE_CALC_RS_TERM_D"));
      printf("<tr><td class='info'>%s</td><td class='data right'>%s &euro;</td></tr>",  JText::_("PAGE_CALC_RS_PRICE"),   $price=='' ? 0:$price );
      printf("<tr style='border:none;'><td class='info' style='font-weight:bold;'>%s</td><td class='data right'>%.2f %s</td></tr>",JText::_("PAGE_CALC_RS_TEMP_PRICE"),$final_price,JText::_("PAGE_CALC_RS_TEMP_PRICE_CURRENCY"));
      printf("</table>");
      echo "<div class='podhodit'>".JText::_('PAGE_CALC_PODHODIT')."</div>";
      echo "<a class='btl-buttonsubmit btn' href='https://unipost.md/ru/?do=calc'>".JText::_('BACK')."</a>";
    }

    if ($target_table == 2){
      printf("<h3>Тариф отправить эконом в города РФ.</h3>");
      printf("<table class='calc_response'>");
      printf("<tr><td class='info'>%s</td><td class='data'>%s</td></tr>",               JText::_("PAGE_CALC_RS_TOWN"),    $city_obj->name_ru);
      printf("<tr><td class='info'>%s</td><td class='data'>%.3f %s</td></tr>",          JText::_("PAGE_CALC_RS_WEIGHT"),  $weight, JText::_("PAGE_CALC_RS_WEIGHT_KG"));
      printf("<tr><td class='info'>%s</td><td class='data'>%s %s</td></tr>",            JText::_("PAGE_CALC_RS_TERM"),    $city_obj->terms, JText::_("PAGE_CALC_RS_TERM_D"));
      printf("<tr><td class='info'>%s</td><td class='data right'>%s &euro;</td></tr>",  JText::_("PAGE_CALC_RS_PRICE"),   $price=='' ? 0:$price );
      printf("<tr style='border:none;'><td class='info' style='font-weight:bold;'>%s</td><td class='data right'>%.2f %s</td></tr>",JText::_("PAGE_CALC_RS_TEMP_PRICE"),$final_price,JText::_("PAGE_CALC_RS_TEMP_PRICE_CURRENCY"));
      printf("</table>");
      echo "<div class='podhodit'>".JText::_('PAGE_CALC_PODHODIT')."</div>";
      echo "<a class='btl-buttonsubmit btn' href='https://unipost.md/ru/?do=calc'>".JText::_('BACK')."</a>";
    }

    if ($target_table == 3){
      printf("<h3>Тариф отправить экспрэсс.</h3>");
      printf("<table class='calc_response'>");
      printf("<tr><td class='info'>%s</td><td class='data'>%s</td></tr>",               "тип содержимого:", "документы/недокументы");
      printf("<tr><td class='info'>%s</td><td class='data'>%s</td></tr>",               JText::_("PAGE_CALC_RS_COUNTRY"), $country_t3->name_ru);
      printf("<tr><td class='info'>%s</td><td class='data'>%.3f %s</td></tr>",          JText::_("PAGE_CALC_RS_WEIGHT"),  $weight, JText::_("PAGE_CALC_RS_WEIGHT_KG"));
      printf("<tr><td class='info'>%s</td><td class='data'>%s %s</td></tr>",            JText::_("PAGE_CALC_RS_TERM"),    $country_t3->term, JText::_("PAGE_CALC_RS_TERM_D"));
      printf("<tr><td class='info'>%s</td><td class='data right'>%s &euro;</td></tr>",  JText::_("PAGE_CALC_RS_PRICE"),   $price=='' ? 0:$price );
      printf("<tr style='border:none;'><td class='info' style='font-weight:bold;'>%s</td><td class='data right'>%.2f %s</td></tr>",JText::_("PAGE_CALC_RS_TEMP_PRICE"),$final_price,JText::_("PAGE_CALC_RS_TEMP_PRICE_CURRENCY"));
      printf("</table>");
      echo "<div class='podhodit'>".JText::_('PAGE_CALC_PODHODIT')."</div>";
      echo "<a class='btl-buttonsubmit btn' href='https://unipost.md/ru/?do=calc'>".JText::_('BACK')."</a>";
    }

    if ($target_table == 4){
      printf("<h3>Тариф получить эконом в страны ЕС</h3>");
      printf("<table class='calc_response'>");
      printf("<tr><td class='info'>%s</td><td class='data'>%s</td></tr>",               JText::_("PAGE_CALC_RS_COUNTRY"), $country_t4->name_ru);
      printf("<tr><td class='info'>%s</td><td class='data'>%.3f %s</td></tr>",          JText::_("PAGE_CALC_RS_WEIGHT"),  $weight, JText::_("PAGE_CALC_RS_WEIGHT_KG"));
      printf("<tr><td class='info'>%s</td><td class='data'>%s %s</td></tr>",            JText::_("PAGE_CALC_RS_TERM"),    $t4_terms, JText::_("PAGE_CALC_RS_TERM_D"));
      printf("<tr><td class='info'>%s</td><td class='data right'>%s &euro;</td></tr>",  JText::_("PAGE_CALC_RS_PRICE"),   $price=='' ? 0:$price );
      printf("<tr style='border:none;'><td class='info' style='font-weight:bold;'>%s</td><td class='data right'>%.2f %s</td></tr>",JText::_("PAGE_CALC_RS_TEMP_PRICE"),$final_price,JText::_("PAGE_CALC_RS_TEMP_PRICE_CURRENCY"));
      printf("</table>");
      echo "<div class='podhodit'>".JText::_('PAGE_CALC_PODHODIT')."</div>";
      echo "<a class='btl-buttonsubmit btn' href='https://unipost.md/ru/?do=calc'>".JText::_('BACK')."</a>";
    }

    if ($target_table == 5){
      printf("<h3>Тариф получить эконом в города РФ</h3>");
      printf("<table class='calc_response'>");
      printf("<tr><td class='info'>%s</td><td class='data'>%s</td></tr>",               JText::_("PAGE_CALC_RS_COUNTRY"), $town_t5->name_ru);
      printf("<tr><td class='info'>%s</td><td class='data'>%.3f %s</td></tr>",          JText::_("PAGE_CALC_RS_WEIGHT"),  $weight, JText::_("PAGE_CALC_RS_WEIGHT_KG"));
      printf("<tr><td class='info'>%s</td><td class='data'>%s %s</td></tr>",            JText::_("PAGE_CALC_RS_TERM"),    $town_t5->terms, JText::_("PAGE_CALC_RS_TERM_D"));
      printf("<tr><td class='info'>%s</td><td class='data right'>%s &euro;</td></tr>",  JText::_("PAGE_CALC_RS_PRICE"),   $price=='' ? 0:$price );
      printf("<tr style='border:none;'><td class='info' style='font-weight:bold;'>%s</td><td class='data right'>%.2f %s</td></tr>",JText::_("PAGE_CALC_RS_TEMP_PRICE"),$final_price,JText::_("PAGE_CALC_RS_TEMP_PRICE_CURRENCY"));
      printf("</table>");
      echo "<div class='podhodit'>".JText::_('PAGE_CALC_PODHODIT')."</div>";
      echo "<a class='btl-buttonsubmit btn' href='https://unipost.md/ru/?do=calc'>".JText::_('BACK')."</a>";
    }


    if ($target_table == 6){
      printf("<h3>Тариф получить экспресс</h3>");
      printf("<table class='calc_response'>");
      printf("<tr><td class='info'>%s</td><td class='data'>%s</td></tr>",               JText::_("PAGE_CALC_RS_COUNTRY"), $country_t6->name_ru);
      printf("<tr><td class='info'>%s</td><td class='data'>%.3f %s</td></tr>",          JText::_("PAGE_CALC_RS_WEIGHT"),  $weight, JText::_("PAGE_CALC_RS_WEIGHT_KG"));
      printf("<tr><td class='info'>%s</td><td class='data'>%s %s</td></tr>",            JText::_("PAGE_CALC_RS_TERM"),    $country_t6->terms, JText::_("PAGE_CALC_RS_TERM_D"));
      printf("<tr><td class='info'>%s</td><td class='data right'>%s &euro;</td></tr>",  JText::_("PAGE_CALC_RS_PRICE"),   $price=='' ? 0:$price );
      printf("<tr style='border:none;'><td class='info' style='font-weight:bold;'>%s</td><td class='data right'>%.2f %s</td></tr>",JText::_("PAGE_CALC_RS_TEMP_PRICE"),$final_price,JText::_("PAGE_CALC_RS_TEMP_PRICE_CURRENCY"));
      printf("</table>");
      echo "<div class='podhodit'>".JText::_('PAGE_CALC_PODHODIT')."</div>";
      echo "<a class='btl-buttonsubmit btn' href='https://unipost.md/ru/?do=calc'>".JText::_('BACK')."</a>";
    }
  }else{
  ?>
      <label><?php echo JText::_("PAGE_CALC_INFO"); ?></label>
      <form id="page_calc" action="" method="post" name="calculate_package">
      <div class="form_block">

        <!-- отправить -->
        <div class="field docs eq0">
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

        <div class="field docs eq1">
          <p class="calc-p"><label for="type_speed"><?php echo JText::_("PAGE_CALC_SEND_SELECT_TARIF"); ?></label></p>
          <!-- эконом -->
          <div class="radio-block">
            <input value="0" type="radio" id="type_speed_eco" class="type-econom" name="type_speed"/>
            <label for="type_speed_eco"><?php echo JText::_("PAGE_CALC_TYPE_SPEED_ECO"); ?></label>
          </div>
          <!-- экспресс -->
          <div class="radio-block">
            <input value="1" type="radio" id="type_speed_exp" class="type-express" name="type_speed"/>
            <label for="type_speed_exp"><?php echo JText::_("PAGE_CALC_TYPE_SPEED_EXP"); ?></label>
          </div>
          <div class="error-msg-right hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG1"); ?></div>
        </div>


        <div class="field docs eq2 hidden" id="block-send-to-ES-RF">
          <p class="calc-p"><label for=""><?php echo JText::_("PAGE_CALC_SEND_TO_COUNTRYS"); ?></label></p>
          <!-- доставить в страны ес -->
          <div class="radio-block">
            <input type="radio" id="to_countrys_eu" name="destination" value="0" onclick="selectES()"/>
            <label for="to_countrys_eu"> <?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?></label>
          </div>
          <!-- доставить в города рф -->
          <div class="radio-block">
            <input type="radio" id="to_sities_rf" name="destination" value="1" onclick="selectRF()"/>
            <label for="to_sities_rf"><?php echo JText::_("PAGE_CALC_CITIES_RF"); ?></label>
          </div>
          <div class="error-msg-right hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG2"); ?></div>
        </div>

        <!-- отправить эконом в ЕС-->
        <div class="field hidden" id="block-ES-countries">
          <p class="calc-p">
            <label for="to_es"> <?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?> </label>
          </p>
          <select id="to_es" name="calc_to_es_country" onchange="changeEScountry();">
            <?php if (isset($query_countries_eu_t1)){ ?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?></option>
            <?php }else{?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_NO_DATA"); ?></option>
            <?php }?>

            <?php
              foreach($query_countries_eu_t1 as $country_eu) {?>
                <option value='<?php echo $country_eu->id;?>'<?php echo($_SESSION['country_eu'] == $country_eu->id) ? 'selected="selected"' : ''; ?>
                  data-name='<?php echo $country_eu->name_ru; ?>'
                  data-price1='<?php echo $country_eu->tarif_less_10kg; ?>'
                  data-price2='<?php echo $country_eu->tarif_plus_1kg; ?>'
                  data-terms="<?php echo JText::_("PAGE_CALC_TERMS1"); ?>"
                  >
                  <?php echo $country_eu->name_ru;?>
                </option>
            <?php }?>
          </select>
          <div class="error-msg-sub hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG3"); ?></div>
        </div>

        <!-- отправить эконом в РФ-->
        <div class="field hidden" id="block-RF-cities">
          <p class="calc-p">
            <label for="to_rf"> <?php echo JText::_("PAGE_CALC_CITIES_RF"); ?></label>
          </p>
          <select id="to_rf" name="calc_to_rf_cities" onchange="changeRFcity();">
            <?php if (isset($query_city_rf_t2)){ ?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_CITIES_RF"); ?></option>
            <?php }else{?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_NO_DATA"); ?></option>
            <?php }?>

            <?php
              $disable = '';
              foreach($query_city_rf_t2 as $city_rf) {?>
                <option value='<?php echo $city_rf->id;?>' <?php echo ($_SESSION['city_rf'] == $city_rf->id) ? 'selected="selected"' : ''; ?>

                  <?php if ($city_rf->special != 0){
                    $option_class = 'special';
                  }else{
                    $option_class = '';
                  }?>
                  class="<?php echo $option_class; ?>">

                  <?php echo $city_rf->name_ru; ?>
                </option>
            <?php }?>
          </select>
          <div class="error-msg-sub hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG4"); ?></div>
        </div>
        <!-- тариф отправить экспресс -->
        <div class="field hidden" id="block-all-countries">
          <p class="calc-p"><label for=""><?php echo JText::_("PAGE_CALC_SEND_TO_COUNTRYS"); ?></label></p>
          <select id="tarif_express_export_countries" name="tarif_express_export_countries" onchange="">
            <?php if (isset($query_city_rf_t2)){ ?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_SEND_SELECT"); ?></option>
            <?php }else{?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_NO_DATA"); ?></option>
            <?php }?>

            <?php
              foreach($query_tarif_express_export_t3 as $tarif_t3) {?>
                <option value='<?php echo $tarif_t3->id;?>'
                  <?php echo ($_SESSION['tarif_expres_export'] == $tarif_t3->id) ? 'selected="selected"' : ''; ?>
                  data-name='<?php echo $tarif_t3->name_ru; ?>'
                  data-docless05='<?php echo $tarif_t3->doc_less05; ?>'
                  data-docmore05='<?php echo $tarif_t3->doc_more05; ?>'
                  data-ndocless05='<?php echo $tarif_t3->not_doc_less05; ?>'
                  data-ndocmore05='<?php echo $tarif_t3->not_doc_more05; ?>'
                  data-term='<?php echo $tarif_t3->term; ?>'>
                  <?php echo $tarif_t3->name_ru;?>
                </option>
            <?php }?>
          </select>
          <div class="error-msg-sub hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG5"); ?></div>
        </div>

        <!-- получить эконом -->
        <div class="field hidden" id="block-get-from-ES-RF">
          <p class="calc-p"><label for=""><?php echo JText::_("PAGE_CALC_GET_FROM"); ?></label></p>
          <div class="radio-block">
            <input id="get_from_country_es" type="radio" name="receiver" value="0" onclick="getFromCountryES()"/>
            <label for="get_from_country_es"> <?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?></label>
          </div>
          <div class="radio-block">
            <input id="get_from_town_rf" type="radio" name="receiver" value="1" onclick="getFromTownRF()"/>
            <label for="get_from_town_rf"><?php echo JText::_("PAGE_CALC_CITIES_RF"); ?></label>
          </div>
          <div class="error-msg-right hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG6"); ?></div>
        </div>


        <div class="field hidden" id="block-get-econom-ES">
          <p class="calc-p">
            <label for="tarif_econom_import_ES"><?php echo JText::_("PAGE_CALC_COUNTRIS_EU"); ?></label>
          </p>
          <select id="tarif_econom_import_ES" name="tarif_econom_import_ES">

            <?php if (isset($econom_import_country_t4)){ ?>
              <option value="-1" ><?php echo  JText::_("PAGE_CALC_SEND_SELECT") ?></option>
            <?php }else{?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_NO_DATA"); ?></option>
            <?php }?>

            <?php foreach($econom_import_country_t4 as $country) {?>
              <option value='<?php echo $country->id;?>'<?php echo($_SESSION['country_eu'] == $country->id) ? 'selected="selected"' : ''; ?> >
                <?php echo $country->name_ru;?>
              </option>
            <?php }?>
          </select>
          <div class="error-msg-sub hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG5"); ?></div>
        </div>

        <div class="field hidden" id="block-get-econom-RF">
          <p class="calc-p">
            <label for="tarif_econom_import_RF"><?php echo JText::_("PAGE_CALC_CITIES_RF"); ?></label>
          </p>
          <select id="tarif_econom_import_RF" name="tarif_econom_import_RF">
            <?php if (isset($towns_rf_t5)){ ?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_SELECT_TOWN") ?></option>
            <?php }else{?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_NO_DATA"); ?></option>
            <?php }?>

            <?php foreach($towns_rf_t5 as $town) {?>
              <option value='<?php echo $town->id;?>'<?php echo($_SESSION['country_eu'] == $town->id) ? 'selected="selected"' : ''; ?>

                <?php if ($town->spec != 0){
                  $option_class = 'special';
                }else{
                  $option_class = '';
                }?>
                class="<?php echo $option_class; ?>">

                <?php echo $town->name_ru;?>
              </option>
            <?php }?>

          </select>
          <div class="error-msg-sub hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG5"); ?></div>
        </div>

        <div class="field hidden" id="block-get-express-import">
          <p class="calc-p"><label for="tarif_express_import_global"><?php echo JText::_("PAGE_CALC_GET_FROM"); ?></label></p>
          <select id="tarif_express_import_global" name="tarif_express_import_global">
            <?php if (isset($express_import_country_t6)){ ?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_SEND_SELECT") ?></option>
            <?php }else{?>
              <option value="-1" ><?php echo JText::_("PAGE_CALC_NO_DATA"); ?></option>
            <?php }?>

            <?php foreach($express_import_country_t6 as $country) {?>
              <option value='<?php echo $country->id;?>'<?php echo($_SESSION['country_global'] == $country->id) ? 'selected="selected"' : ''; ?> >
                <?php echo $country->name_ru;?>
              </option>
            <?php }?>
          </select>
          <div class="error-msg-sub hidden"><?php echo JText::_("PAGE_CALC_ERROR_MSG5"); ?></div>
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
          <div id="input_NDOCS">
            <input value="0" <?php echo ($_SESSION['type_docs_ndocs'] == '0') ? 'checked="checked"' : ''; ?>  type="radio" id="type_docs_ndocs" name="type_docs_ndocs"/>NDOCS
          </div>
          <div id="input_DOCS">
            <input value="1" <?php echo ($_SESSION['type_docs_ndocs'] == '1') ? 'checked="checked"' : ($_SESSION['type_docs_ndocs'] == '')?'checked="checked"':''; ?> type="radio" id="type_docs_docs" name="type_docs_ndocs"/>DOCS
          </div>
        </div>

        <div id="clear"></div>
        <div id="letter_sub">
          <div class="field">
            <div id="package-type">
              <label style="line-height:30px;height:30px;" for="convert"><?php echo JText::_("PAGE_CALC_PACKAGE"); ?></label>
              <div class="field" style="float:left;clear:none;" onload="hideMe()">
                <input type="hidden" name="conv" value="0"/>
                <input type="hidden" name="box" value="0"/>
                <div class="radio-block">
                  <input id="convert" type="radio" value="1" name="conv"
                  <?php echo ($_SESSION['conv'] == '1') ? 'checked="checked"' : (empty($_SESSION['conv']))?'checked="checked"':''; ?>
                  onclick="showMe('weights', this, 1)"/>
                  <label for="conv"><?php echo JText::_("PAGE_CALC_PACKAGE_CONV"); ?></label>
                </div>
                <div class="radio-block">
                  <input id="box" class="last" type="radio" value="2" name="conv" <?php echo ($_SESSION['conv'] == '2') ? 'checked="checked"' : ''; ?> onclick="hideMe('weights', this, 1)"/><label for="box"><?php echo JText::_("PAGE_CALC_PACKAGE_BOX"); ?></label>
                </div>

              </div>
            </div>

          <div class="field _hidden">
              <p><?php echo JText::_("PAGE_CALC_WEIGHT_KG"); ?><?php echo $_SESSION['calc_weight_kg'];?></p>
              <input type="text" id="weight_kg" oninput="checkWeight()" value="" placeholder="введите вес"  name="calc_weight_kg" class="t1" />
              <div id="express_es_error" class="hidden"><?php echo JText::_("FIZICAL_WEIGHT_SEND_EXPRESS_ES_ERROR"); ?></div>
              <div id="express_rf_error" class="hidden"><?php echo JText::_("FIZICAL_WEIGHT_SEND_EXPRESS_RF_ERROR"); ?></div>
          </div>

          <div class="max_weight_message" style="float:left; color:red;line-height:30px; display:none;">
              <?php echo JText::_("MAXIMUM_WEIGHT"); ?>
          </div>

          <!-- Количество мест -->
          <div class="field" id="places-count">
            <p class="calc-p"><label for="calc_places_lenght"><?php echo JText::_("PAGE_CALC_COUNT_PLACES"); ?></label></p>

            <select class="calc_places_lenght" onchange="addPlaces()" id="calc_places_lenght" name="calc_places_lenght">
              <!-- <option value="-1" ><?php //echo "выберите кол-во мест"; ?></option> -->

              <?php
                $count_mest=10;
                for($i=1; $i<=$count_mest; $i++){
                  echo '<option value="' . $i . '" >' . $i . '</option>';
                }?>

            </select>
          </div>

          <div class="field">
            <div class="places-row">
              <p>Размеры отправляемых мест, см</p>
              <div class="place-box">
                <input type="text" class="short place_length" id="len_0" value="" placeholder="длина" name="calc_size[0][lenght]">x
                <input type="text" class="short place_width" id="wid_0" value="" placeholder="ширина" name="calc_size[0][width]">x
                <input type="text" class="short place_height" id="hei_0" value="" placeholder="высота" name="calc_size[0][height]">
              </div>
              <input type="text" class="short place_weight" id="weight_0" value="" placeholder="вec" name="calc_size[0][weight]">
              <input type="text" class="short place_vol_weight hidden" id="vol_weight_0" value="" name="calc_size[0][vol_weight]">
            </div>
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
            <input value="0" type="radio" id="sentFromOffice" name="dispatch_from" >
          </div>

          <div class="field" id="getCurrierBlock">
            <label for="getCurrierToAdress"><?php echo JText::_("PAGE_CALC_GET_CURRIER_TO_ADRESS"); ?></label>
            <input value="1" type="radio" id="getCurrierToAdress" name="dispatch_from">
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
