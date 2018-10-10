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

// function clearFields(){
//   $('#type_speed_eco, #type_speed_exp').prop("checked", false);
//   $("#weight_kg, .place_length, .place_width, .place_height").val("");
//   $("#wei").val("");
//   $("#calc_places_lenght").val(0);
// }

// clearFields();

$("#weight_kg").keyup(function(e){
  var str = $(this).val();
  var rezult = str.match(/[^0-9.]/g);

  if(rezult == null){
    $('.fizical_weight').removeClass("alert");
    $("#error_by_enter_value").addClass("hidden");
  }else{
    $('.fizical_weight').addClass("alert");
    $("#error_by_enter_value").removeClass("hidden");
  }

});

$(".place_length, .place_width, .place_height").keyup(function(e){
  var entered_value = $(this).val();
  var rezult_str = entered_value.match(/[^0-9.]/g);

  if(rezult_str == null){
    $(this).removeClass("alert");
  }else{
    $(this).addClass("alert");
  }

});


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
  // var volweight = funcCalcVolumeWeight($('#len').attr('value'), $('#wid').attr('value'), $('#hei').attr('value'));
  var v1 = "";
  var v2 = "";
  var v3 = "";
  var sum = 0;
  // var sum_vg = 0;

  v1 = $(this).closest(".place-box").find(".place_length").val();
  v2 = $(this).closest(".place-box").find(".place_width").val();
  v3 = $(this).closest(".place-box").find(".place_height").val();

  var volweight = funcCalcVolumeWeight(v1, v2, v3);

  // $('#wei').attr('value', volweight);
  $(this).closest(".places-row").find(".place_vol_weight").attr('value', volweight);

  $(".place_vol_weight").each(function(){
    if($(this).val() != 0){
      sum += parseFloat($(this).val());
    }
    $('#wei').attr('value', sum);
  });

}
  $('.place_length').keyup(fn);
  $('.place_width').keyup(fn);
  $('.place_height').keyup(fn);

  $('.place_length').ForceNumericOnly();
  $('.place_width').ForceNumericOnly();
  $('.place_height').ForceNumericOnly();

  $('#weight_kg').ForceNumericOnly();
  fn();
}
setCalcHandle();

$('select').change(function() {
  $(this).siblings('select').children('option[value=' + this.value + ']').attr('disabled', true).siblings().removeAttr('disabled');
});


$("#do_calculate").live("click", function(){
  var error = 0;

  if ($("#weight_kg").val() == 0){
    error = 1;
    $("#weight_kg").addClass('alert');
  }else{
    $("#weight_kg").removeClass('alert');
  }

  if (  ($(".places-row").size() != 0) && ($("#convert").is(':checked') == false)  ){
    // валидация габаритов----------------
    $('.places-row').each(function(i,e){
      var ln = 0;
      var wd = 0;
      var hg = 0;
      var sum = 0;

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
        }else{
          error = 2;
        }

      if (sum > 750){
        $(this).find(".place-box").addClass("alert");
        error = 3;
      }else{
        $(this).find(".place-box").removeClass("alert");
      }
    });

  }else{
    $('.place_length, .place_width, .place_height').removeClass("alert");
  }

  //отправить
  if ( $("#type_hu_send").is(':checked') == true ){

    // если не выбран не эконом не экспресс
    if ( ($('#type_speed_eco').is(':checked') == false) && ($('#type_speed_exp').is(':checked') == false) ){
      $('.eq1').addClass('alert');
      $(".eq1").find(".error-msg-right").removeClass("hidden");
      error = 4;
    }else{
      $('.eq1').removeClass('alert');
      $(".eq1").find(".error-msg-right").addClass("hidden");

    }


    // если выбран эконом
    if (($('#type_speed_eco').is(':checked') == true)){
      //если не выбранна не страны ЕС не города РФ
      if ( ($('#to_countrys_eu').is(':checked') == false) && ($('#to_sities_rf').is(':checked') == false) ){
        $('.eq1').removeClass('alert');
        $('.eq2').addClass('alert');
        $(".eq2").find(".error-msg-right").removeClass("hidden");

        error = 5;
      }else{
        $('.eq2').removeClass('alert');
        $(".eq2").find(".error-msg-right").addClass("hidden");
      }


      // если не выбранна страна ЕС из списка
      if (($("#to_countrys_eu").is(':checked') == true) && ($("select#to_es option:selected").val()==-1)){
        $("select#to_es").addClass("alert");
        $("select#to_es").closest("#block-ES-countries").find(".error-msg-sub").removeClass("hidden");
        error = 6;
      }else{
        $("select#to_es").removeClass("alert");
        $("select#to_es").closest("#block-ES-countries").find(".error-msg-sub").addClass("hidden");
      }

      //если не выбран город РФ из списка
      if (($("#to_sities_rf").is(':checked') == true) && ($("select#to_rf option:selected").val()==-1)){
        $("select#to_rf").addClass("alert");
        $('.error-msg4').removeClass('hidden');
        error = 7;
      }else{
        $("select#to_rf").removeClass("alert");
        $('.error-msg4').addClass('hidden');
      }


      // ограничение веся для тарифа эконом по странам ЕС
      if ( ($("#to_countrys_eu").is(':checked') == true) ){

        if ($("select#to_es option:selected").val() != -1){

          if  ( ($("#weight_kg").val() == "") || (parseInt( $("#weight_kg").val() ) > 70) ){
            $("#weight_kg").addClass("alert");
            error = 8;
          }else{
            $("#weight_kg").removeClass("alert");
          }

        }
      }

      // ограничение веся для тарифа эконом по городам РФ
      if ($("#to_sities_rf").is(':checked') == true){

        if ($("select#to_rf option:selected").val() != -1){

          if  ( ($("#weight_kg").val() == "") || (parseInt( $("#weight_kg").val() ) > 80) ){
            $("#weight_kg").addClass("alert");
            error = 9;
          }else{
            $("#weight_kg").removeClass("alert");
          }

        }
      }

    }
    // отправить экспресс
    if (($('#type_speed_exp').is(':checked') == true)){

      var opt = $("select#tarif_express_export_countries option:selected").val();

      if ($("select#tarif_express_export_countries option:selected").val()==-1){
        $("#tarif_express_export_countries").addClass("alert");
        $("#tarif_express_export_countries").closest("#block-all-countries").find(".error-msg-sub").removeClass("hidden");
        error = 10;
      }
      // else if ( ($("#type_docs_ndocs").prop("checked") == true) && (opt == 8) ){ //если армения
      //   $("#tarif_express_export_countries").addClass("alert");
      //   $("#tarif_express_export_countries").closest("#block-all-countries").find(".error-msg-no-service").removeClass("hidden");
      //   error = 101;
      // }else if ( ($("#type_docs_ndocs").prop("checked") == true) && (opt == 13) ){// если беларусь
      //   $("#tarif_express_export_countries").addClass("alert");
      //   $("#tarif_express_export_countries").closest("#block-all-countries").find(".error-msg-no-service").removeClass("hidden");
      //   error = 101;
      // }
      else{
        $("#tarif_express_export_countries").closest("#block-all-countries").find(".error-msg-sub").addClass("hidden");
        $("#tarif_express_export_countries").closest("#block-all-countries").find(".error-msg-no-service").addClass("hidden");
        $("#tarif_express_export_countries").removeClass("alert");
      }

    }
  }
//----------------------------------------------------------------------------

  if ( $("#type_hu_rec").is(':checked') == true ){ //получить
    // эконом
    if ( ($('#type_speed_eco').is(':checked') == false) && ($('#type_speed_exp').is(':checked') == false) ){
      $('.eq1').addClass('alert');
      $(".eq1").find(".error-msg-right").removeClass("hidden");
      error = 11;
    }else{
      $('.eq1').removeClass('alert');
      $(".eq1").find(".error-msg-right").addClass("hidden");
    }
    //страны ЕС
    if ( ($("#type_speed_eco").is(':checked') == true) && ($("#get_from_country_es").is(':checked') == false) && ($("#get_from_town_rf").is(':checked') == false) ){
      $(".eq1").removeClass("alert");
      $("#block-get-from-ES-RF").addClass("alert");
      $("#block-get-from-ES-RF").find(".error-msg-right").removeClass("hidden");
      error = 12;
    }
    //выбранная страна
    if ( ($("#get_from_country_es").is(':checked') == true) && ($("select#tarif_econom_import_ES option:selected").val() == -1) ){
      $("#block-get-from-ES-RF").removeClass("alert");
      $("#block-get-from-ES-RF").find(".error-msg-right").addClass('hidden');

      $("#tarif_econom_import_ES").addClass("alert");
      $("#tarif_econom_import_ES").closest(".field").find('.error-msg-sub').removeClass("hidden");
      error = 13;
    }else{
      $("#tarif_econom_import_ES").removeClass("alert");
      $("#tarif_econom_import_ES").closest(".field").find('.error-msg-sub').addClass("hidden");
    }


    //города РФ
    if ( ($("#get_from_town_rf").is(':checked') == true) && ($("select#tarif_econom_import_RF option:selected").val() == -1) ){
      $("#block-get-from-ES-RF").removeClass("alert");
      $("#block-get-from-ES-RF").find(".error-msg-right").addClass("hidden");
      $("#tarif_econom_import_RF").addClass("alert");
      $("#tarif_econom_import_RF").closest(".field").find(".error-msg-sub").removeClass("hidden");
      error = 14;
    }else{
      $("#tarif_econom_import_RF").removeClass("alert");
      $("#tarif_econom_import_RF").closest(".field").find(".error-msg-sub").addClass("hidden");
    }


    if ($('#type_speed_exp').is(":checked") == true){ // экспресс

      if ($("select#tarif_express_import_global option:selected").val() == -1){  // если страна не выбранна
        $("#tarif_express_import_global").addClass("alert");
        $("#tarif_express_import_global").closest(".field").find(".error-msg-sub").removeClass("hidden");
        error = 15;
      }else{
        $("#tarif_express_import_global").removeClass("alert");
        $("#tarif_express_import_global").closest(".field").find(".error-msg-sub").addClass("hidden");
      }

      // если страна не выбранна, коробка/конверт - не выбранно
      if ( ($("#convert").is(':checked') == false) && ($("#box").is(':checked') == false)  ){
        $("#package-type").addClass('alert');
        error = 16;
      }else{
        $("#package-type").removeClass('alert');
      }

      // // если страна выбранна, коробка/конверт - не выбранно
      if ($("select#tarif_express_import_global option:selected").val() != -1){
        if ( ($("#convert").is(':checked') == false) && ($("#box").is(':checked') == false)  ){
          $("#package-type").addClass('alert');
          error = 17;
        }else{
          $("#package-type").removeClass('alert');
        }
      }

    }


    //валидация веса для получить эконом---------------------------------
    if (($('#type_speed_eco').is(':checked') == true)){

      // получить эконом для ес
      if ( ($("#get_from_country_es").is(':checked') == true) && ($("select#tarif_econom_import_ES option:selected").val() != -1) ){
        if ( ($("#weight_kg").val() == "") || (parseInt( $("#weight_kg").val() ) > 70) ){
          $("#weight_kg").addClass("alert");
          error = 18;
        }else{
          $("#weight_kg").removeClass("alert");
        }
      }

      if ( ($("#get_from_town_rf").is(':checked') == true) && ($("select#tarif_econom_import_RF option:selected").val() != -1) ){
        if  ( ($("#weight_kg").val() == "") || (parseFloat( $("#weight_kg").val() ) > 80) ){
          $("#weight_kg").addClass("alert");
          error = 19;
        }else{
          $("#weight_kg").removeClass("alert");
        }
      }

    }


    // получить экспресс <<
    if (($('#type_speed_exp').is(':checked') == true)){
      if ($("select#tarif_express_import_global option:selected").val() != -1){
        if ($("#type_docs_docs").is(':checked') == true){
          if ($("#convert").is(':checked') == true){

            if ( ($("#weight_kg").val() == "") || (parseFloat( $("#weight_kg").val() ) > 0.70) ){
              $("#weight_kg").addClass("alert");
              error = 20;
            }else{
              $("#weight_kg").removeClass("alert");
            }

          }
        }
      }
    }
    // получить экспресс >>

  }

  console.log("error status: " + error + "");
  if (error == 0){
    return true;
  }else{
    return false;
  }

});

// clear form by click to cancel
// $('#do_cancel').live("click", function(){
//   $("#len_0, #wid_0, #hei_0, #wei, #weight_kg").val("");
//   $("#to_es, #to_rf, #tarif_express_export_countries, #tarif_express_import_global").val("-1");
//   $("#type_speed_eco, #type_speed_exp, #to_countrys_eu, #to_sities_rf, #get_from_country_es, #get_from_town_rf").attr("checked", false);
//
//   $('#gabarits').html("");
//   $('#calc_places_lenght').val(0);
//   location.reload();
// });


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

function convType(){
  $("#places-count, #gabarits0, #gabarits, #weight2").addClass("hidden");

  if ($("#type_docs_docs").prop("checked") == true){
    $("#weight2").addClass("hidden");
  }
}

function boxType(){
  $("#places-count, #gabarits0, #gabarits").removeClass("hidden");
  $("#weight2").removeClass("hidden");
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

  $('.content-type, #package-type').addClass('hidden');
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

  $('.content-type, #package-type').addClass('hidden');
}
function recExpress(){
  console.log("Получить экспресс");
  $("#block-get-from-ES-RF").addClass("hidden");
  $('#block-get-econom-ES, #block-get-econom-RF').addClass("hidden");
  $('#get_from_country_es, #get_from_town_rf').attr('checked', false);
  $('#block-get-express-import').removeClass("hidden");
  $('#block-all-countries').addClass("hidden");

  $('.content-type, #package-type').removeClass('hidden');

  // скрыть Характер содержимого и Требуемый тип упаковки
  // $('.content-type').addClass('hidden');
  // $('#package-type').addClass('hidden');
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
  var count = $("#calc_places_lenght option:selected").val();
  var row = "";
  $('#gabarits').html("");

  if ((window.location.search.split('=').pop() == 'ru') || (window.location.href.match("/ru/") != null)){
    var ln1 = "Длина";
    var ln2 = "Ширина";
    var ln3 = "Высота";
    var dim = "Размеры отправляемых мест, см:"
  }
  if ((window.location.search.split('=').pop() == 'en') || (window.location.href.match("/en/") != null)){
    var ln1 = "length";
    var ln2 = "width";
    var ln3 = "height";
    var dim = "Dimensions of the piece(s) to send, cm:"
  }
  if ((window.location.search.split('=').pop() == 'ro') || (window.location.href.match("/ro/") != null)){
    var ln1 = "lungimea";
    var ln2 = "lățime";
    var ln3 = "înălțimea";
    var dim = "Dimensiunile locului de expediere, cm:"
  }

  for(var i=0; i<count; i++){
    row = '<div class="places-row">' +
      '<p>' + dim + '</p>' +
      '<div class="place-box">' +
      '<input type="text" class="short place_length" id="len_' + i + '" value="" placeholder=' + ln1 + '   name="calc_size[' + i + '][lenght]">x' +
      '<input type="text" class="short place_width" id="wid_' + i + '" value="" placeholder=' + ln2 + '  name="calc_size[' + i + '][width]">x' +
      '<input type="text" class="short place_height" id="hei_' + i + '" value="" placeholder=' + ln3 + '  name="calc_size[' + i + '][height]">' +
      '</div>' +
      '<input type="text" class="short place_vol_weight hidden" id="vol_weight_' + i + '" value="" name="calc_size[' + i + '][vol_weight]">' +
      '</div>';
    $('#gabarits').append(row);
  }

  $('.place_length, .place_width, .place_height').ForceNumericOnly();

  setCalcHandle();
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

  // получить
  if ($("#get_from_country_es").is(":checked")){
    if ($('#weight_kg').val() > 70){
      $("#express_rf_error").addClass("hidden");
      $("#express_es_error").removeClass("hidden");
    }else{
      $("#express_es_error").addClass("hidden");
    }
  }

  if ($("#get_from_town_rf").is(":checked")){
    if ($('#weight_kg').val() > 80){
      $("#express_es_error").addClass("hidden");
      $("#express_rf_error").removeClass("hidden");
    }else{
      $("#express_rf_error").addClass("hidden");
    }
  }

}
