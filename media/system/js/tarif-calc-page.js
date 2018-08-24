// Numeric only control handler
jQuery.fn.ForceNumericOnly = function(){
  return this.each(function()
  {
    $(this).keydown(function(e)
    {
      var key = e.charCode || e.keyCode || 0;
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
  }else{
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


function setCalcHandle(){
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
  $(this).siblings('select').children('option[value=' + this.value + ']').attr('disabled', true).siblings().removeAttr('disabled');
});


 // суммирование весов--------------------------------------------------------
 function calcWeight(){

   var weight_sum = 0;
   $('.places-row').each(function(i,e){
     if ($(this).find(".place_weight").val() != ""){
       weight = parseFloat($(this).find(".place_weight").val());
       weight_sum += weight;
     }
   });
  $("#weight_kg").val(weight_sum);

   if (weight_sum == 0){
     error = 1;
   }
 }


$("#do_calculate").live("click", function(){
  var error = 0;

  if ($("#weight_kg").val() == 0){
    error = 1;
  }


  if ($(".places-row").size() != 0){
    // валидация габаритов----------------
    $('.places-row').each(function(i,e){
      console.log("валидация размеров 1");
      var ln = 0;
      var wd = 0;
      var hg = 0;
      var sum = 0;

      //длина
      if ($(this).find(".place_length").val() == ""){
        $(this).find(".place_length").addClass('alert');
      }else{
        $(this).find(".place_length").removeClass('alert');
      }
      //ширина
      if ($(this).find(".place_width").val() == ""){
        $(this).find(".place_width").addClass('alert');
      }else{
        $(this).find(".place_width").removeClass('alert');
      }
      //высота
      if ($(this).find(".place_height").val() == ""){
        $(this).find(".place_height").addClass('alert');
      }else{
        $(this).find(".place_height").removeClass('alert');
      }

      ln = parseFloat($(this).find(".place_length").val());
      wd = parseFloat($(this).find(".place_width").val());
      hg = parseFloat($(this).find(".place_height").val());

      if ((ln > 0) && (wd > 0) && (hg > 0)){
        sum = (ln + wd + hg);
      }else {
        error = 1;
      }

      if (sum > 750){
        $(this).find(".place-box").addClass("alert");
        error = 1;
      }else{
        $(this).find(".place-box").removeClass("alert");
      }
    });

    calcWeight();
  }

  //отправить
  if ( $("#type_hu_send").is(':checked') == true ){

    // если не выбран не эконом не экспресс
    if ( ($('#type_speed_eco').is(':checked') == false) && ($('#type_speed_exp').is(':checked') == false) ){
      $('.eq1').addClass('alert');
      error = 1;
    }else{
      $('.eq1').removeClass('alert');
    }


    // если выбран эконом
    if (($('#type_speed_eco').is(':checked') == true)){
      //если не выбранна не страны ЕС не города РФ
      if ( ($('#to_countrys_eu').is(':checked') == false) && ($('#to_sities_rf').is(':checked') == false) ){
        $('.eq1').removeClass('alert');
        $('.eq2').addClass('alert');
        error = 1;
      }else{
        $('.eq2').removeClass('alert');
      }


      // если не выбранна страна ЕС из списка
      if (($("#to_countrys_eu").is(':checked') == true) && ($("select#to_es option:selected").val()==-1)){
        $("select#to_es").addClass("alert");
        error = 1;
      }else{
        $("select#to_es").removeClass("alert");
      }

      //если не выбран город РФ из списка
      if (($("#to_sities_rf").is(':checked') == true) && ($("select#to_rf option:selected").val()==-1)){
        $("select#to_rf").addClass("alert");
        error = 1;
      }else{
        $("select#to_rf").removeClass("alert");
      }


      // ограничение веся для тарифа эконом по странам ЕС
      if ( ($("#to_countrys_eu").is(':checked') == true) ){

        if ($("select#to_es option:selected").val() != -1){
          $(".place_weight").each(function(i,e){
            if ( ($(this).val() == "") || ($(this).val() > 70) ){
              error = 1;
              $(this).addClass("alert");
            }else{
              $(this).removeClass("alert");
            }
          });
        }

      }

      // ограничение веся для тарифа эконом по городам РФ
      if ( ($("#to_sities_rf").is(':checked') == true) && ($("select#to_rf option:selected").val() != -1) ){

        $(".place_weight").each(function(i,e){
          if ( ($(this).val() == "") || ($(this).val() > 80) ){
            error = 1;
            $(this).addClass("alert");
          }else{
            $(this).removeClass("alert");
          }
        });

      }
    }
    // отправить экспресс
    if (($('#type_speed_exp').is(':checked') == true)){

      if ($("select#tarif_express_export_countries option:selected").val()==-1){
        $("#tarif_express_export_countries").addClass("alert");
        error = 1;
      }else{
        $("#tarif_express_export_countries").removeClass("alert");
      }

      // проверка веса для каждого места при получить-экспресс
      if ($("select#tarif_express_export_countries option:selected").val() != -1){
        $(".place_weight").each(function(i,e){
          if ($(this).val() == ""){
            error = 1;
            $(this).addClass("alert");
          }else{
            $(this).removeClass("alert");
          }
        });
      }


    }
  }
//----------------------------------------------------------------------------

  if ( $("#type_hu_rec").is(':checked') == true ){ //получить
    // эконом
    if ( ($('#type_speed_eco').is(':checked') == false) && ($('#type_speed_exp').is(':checked') == false) ){
      $('.eq1').addClass('alert');
      error = 1;
    }else{
      $('.eq1').removeClass('alert');
    }
    //страны ЕС
    if ( ($("#type_speed_eco").is(':checked') == true) && ($("#get_from_country_es").is(':checked') == false) && ($("#get_from_town_rf").is(':checked') == false) ){
      $(".eq1").removeClass("alert");
      $("#block-get-from-ES-RF").addClass("alert");
      error = 1;
    }
    //выбранная страна
    if ( ($("#get_from_country_es").is(':checked') == true) && ($("select#tarif_econom_import_ES option:selected").val() == -1) ){
      $("#block-get-from-ES-RF").removeClass("alert");
      $("#tarif_econom_import_ES").addClass("alert");
      error = 1;
    }else{
      $("#tarif_econom_import_ES").removeClass("alert");
    }


    //города РФ
    if ( ($("#get_from_town_rf").is(':checked') == true) && ($("select#tarif_econom_import_RF option:selected").val() == -1) ){
      $("#block-get-from-ES-RF").removeClass("alert");
      $("#tarif_econom_import_RF").addClass("alert");
      error = 1;
    }else{
      $("#tarif_econom_import_RF").removeClass("alert");
    }

    if ( ($('#type_speed_exp').is(":checked") == true) && ($("select#tarif_express_import_global option:selected").val() == -1) ){
      $("#tarif_express_import_global").addClass("alert");
      error = 1;
    }else{
      $("#tarif_express_import_global").removeClass("alert");
    }

    if ( ($('#type_speed_exp').is(":checked") == true) && ($("select#tarif_express_import_global option:selected").val() != -1) ){
      $(".place_weight").each(function(i,e){
        if ($(this).val() == ""){
          error = 1;
          $(this).addClass("alert");
        }else{
          $(this).removeClass("alert");
        }
      });
    }

    //валидация веса для получить эконом---------------------------------
    if (($('#type_speed_eco').is(':checked') == true)){

      // получить эконом для ес
      if ( ($("#get_from_country_es").is(':checked') == true) && ($("select#tarif_econom_import_ES option:selected").val() != -1) ){
        $(".place_weight").each(function(i,e){
          if ( ($(this).val() == "") || ($(this).val() > 70) ){
            error = 1;
            $(this).addClass("alert");
          }else{
            $(this).removeClass("alert");
          }
        });
      }

      if ( ($("#get_from_town_rf").is(':checked') == true) && ($("select#tarif_econom_import_RF option:selected").val() != -1) ){
        $(".place_weight").each(function(i,e){
          if ( ($(this).val() == "") || ($(this).val() > 80) ){
            error = 1;
            $(this).addClass("alert");
          }else{
            $(this).removeClass("alert");
          }
        });
      }

    }
  }

  $("#weight_kg, #len, #wid, #hei").each(function(i,e){
    $(this).removeClass('alert');
    if($(this).val() == ""){
      $(this).addClass('alert');
      error = 1;
    }
  });

  console.log("error status: " + error + "");
  if (error == 0){
    return true;
  }else{
    return false;
  }

});


$('#do_cancel').live("click", function(){
  $("#len, #wid, #hei, #wei, #weight_kg").val("");
  $("#to_es, #to_rf, #tarif_express_export_countries, #tarif_express_import_global").val("-1");
  $("#type_speed_eco, #type_speed_exp, #to_countrys_eu, #to_sities_rf, #get_from_country_es, #get_from_town_rf").attr("checked", false);


  $('#gabarits').html("");
  $('#calc_places_lenght').val(0);
});


function showMe (it, box, it2) {
  var vis = (box.checked) ? "none" : "block";
  document.getElementById(it).style.display = vis;
  if (it2){
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


// клик Отправить/получить (1й ряд)
$('.type-send').on("click", function(){

  if($('.type-econom').is(':checked')){
    sendEconom();
  }
  if($('.type-express').is(':checked')){
    sendExpress();
  }
});

$('.type-rec').on("click", function(){
  if($('.type-econom').is(':checked')){
    recEconom();
  }
  if($('.type-express').is(':checked')){
    recExpress();
  }
});
//------------------------------------------

//клик Эконом/экспресс (2й ряд)

$('.type-econom').on('click', function(e){
  if($('.type-send').is(':checked')){
    sendEconom();
  }
  if($('.type-rec').is(':checked')){
    recEconom();
  }
});


$('.type-express').on('click', function(e){
  if($('.type-send').is(':checked')){
    sendExpress();
  }
  if($('.type-rec').is(':checked')){
    recExpress();
  }
});


//функции обработчики radiobutton
function sendEconom(){
  console.log("Отправить эконом");
  $('#block-send-to-ES-RF').removeClass('hidden');
  $('#block-all-countries').addClass("hidden");
  $('#block-get-from-ES-RF').addClass("hidden");
  $('#block-get-express-import').addClass("hidden");
  $('#block-get-econom-ES, #block-get-econom-RF').addClass('hidden');
  $('#to_countrys_eu, #to_sities_rf').attr('checked', false);
}
function sendExpress(){
  console.log("Отправить экспресс");
  $("#block-all-countries").removeClass("hidden");
  $('.content-type, #package-type').removeClass('hidden');
  $('#block-send-to-ES-RF').addClass('hidden');
  $('#block-ES-countries, #block-RF-cities').addClass('hidden');
  $('#to_countrys_eu, #to_sities_rf').attr('checked', false)
  $('#block-get-express-import').addClass("hidden");
}
function recEconom(){
  console.log("Получить эконом");
  $("#block-get-from-ES-RF").removeClass("hidden");
  $('#block-send-to-ES-RF').addClass("hidden");
  $('#block-ES-countries, #block-RF-cities').addClass("hidden");
  $('#block-get-express-import').addClass("hidden");
  $('#block-all-countries').addClass("hidden");
}
function recExpress(){
  console.log("Получить экспресс");
  $("#block-get-from-ES-RF").addClass("hidden");
  $('#block-get-econom-ES, #block-get-econom-RF').addClass("hidden");
  $('#get_from_country_es, #get_from_town_rf').attr('checked', false);
  $('#block-get-express-import').removeClass("hidden");
  $('#block-all-countries').addClass("hidden");
  // скрыть Характер содержимого и Требуемый тип упаковки
  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}


function selectES(){
  $('#block-ES-countries').removeClass('hidden');
  $('#block-RF-cities').addClass('hidden');
  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}
function selectRF(){
  $('#block-RF-cities').removeClass('hidden');
  $('#block-ES-countries').addClass('hidden');
  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}

function changeEScountry(){
  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}

function changeRFcity(){
  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}

function getFromCountryES(){
  console.log("getFromTownES");
  $('#block-get-econom-ES').removeClass('hidden');
  $('#block-get-econom-RF').addClass('hidden');

  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}

function getFromTownRF(){
  console.log("getFromTownRF");
  $('#block-get-econom-RF').removeClass('hidden');
  $('#block-get-econom-ES').addClass('hidden');

  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}

// габариты для мест
function addPlaces(){
  var count = $("#calc_places_lenght option:selected").text();
  var row = "";
  $('#gabarits').html("");

  for(var i=0; i<count; i++){
    row = '<div class="places-row">' +
      '<p>Размеры отправляемых мест, см</p>' +
      '<div class="place-box">' +
      '<input type="text" class="short place_length" id="len_' + i + '" value="" placeholder="длина"   name="calc_size[' + i + '][lenght]">x' +
      '<input type="text" class="short place_width" id="wid_' + i + '" value="" placeholder="ширина"  name="calc_size[' + i + '][width]">x' +
      '<input type="text" class="short place_height" id="hei_' + i + '" value="" placeholder="высота"  name="calc_size[' + i + '][height]">' +
      '</div>' +
      '<input type="text" class="short place_weight" id="weight_' + i + '" value="" placeholder="вec"  name="calc_size[' + i + '][weight]">' +
      '</div>';
    $('#gabarits').append(row);
  }

  $(".place_weight").on("keyup", function(){
    if ($("#type_speed_eco")){

      if ( $("#to_countrys_eu").is(":checked") ){
        if ($(this).val() > 70){
          $(this).addClass("alert");
        }else{
          $(this).removeClass("alert");
        }
      }

      if ( $("#to_sities_rf").is(":checked") ){
        if ($(this).val() > 80){
          $(this).addClass("alert");
        }else{
          $(this).removeClass("alert");
        }
      }
    }

  });


  $('.place_length, .place_width, .place_height, .place_weight').ForceNumericOnly();
}

function checkWeight(){
  //ограничение веса по экспресс эконом для ес
  if ($("#to_countrys_eu").is(":checked")){
    if ($('#weight_kg').val() > 70){
      $("#express_es_error").removeClass("hidden");
    }else{
      $("#express_es_error").addClass("hidden");
    }
  }
  // ограничение веса по тариф экспресс эконом для РФ
  if ($("#to_sities_rf").is(":checked")){
    if ($('#weight_kg').val() > 80){
      $("#express_rf_error").removeClass("hidden");
    }else{
      $("#express_rf_error").addClass("hidden");
    }
  }
}
