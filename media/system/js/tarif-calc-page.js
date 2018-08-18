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


$("input#letter").live("click", function(){
  if($(this).is(":checked")){
    document.getElementById('weight_kg').value='0.49';

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
  }else{
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


function changeFunc(){
  var selectBox = document.getElementById("to_country");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  $("#letter_error").css("display","none");

  if(selectedValue==141){
    $("#input_NDOCS").css("display","none");
    $("#israel_error").css("display","block");
    return false;
  }else{
    $("#input_NDOCS").css("display","inline-block");
    $("#israel_error").css("display","none");
    return true;
  }
}


$("#do_calculate").live("click", function(){
  if(
    $("select#to_country option:selected").val()==-1
    && $("#weight_kg").val() == ''
    && $("#len").val() == ''
    && $("#wid").val() == ''
    && $("#hei").val() == ''
  ){
    $("select#to_country, #weight_kg, #len, #wid, #hei").css("border-color","red");
    return false;
  }

  if ($("select#to_country option:selected").val()==-1 ){
    $("select#to_country").css("border-color","red");
    return false;
  }

  if ($("#weight_kg").val() == '' ){
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
  }else{
    $("#letter_error").css("display","none");
    return true;
  }
});


$('#do_cancel').live("click", function(){
  $("#len").val("");
  $("#wid").val("");
  $("#hei").val("");
  $("#wei").val("");
  $("#weight_kg").val("");
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

  // t1_country = $('#to_es').find(":selected").attr("data-name");
  // t1_tarif1 = $('#to_es').find(":selected").attr("data-price1");
  // t1_tarif2 = $('#to_es').find(":selected").attr("data-price2");
  // t1_terms = $('#to_es').find(":selected").attr("data-terms");
  //
  // $("#t1_country").val(t1_country);
  // $("#t1_tarif1").val(t1_tarif1);
  // $("#t1_tarif2").val(t1_tarif2);
  // $("#t1_terms").val(t1_terms);
}

function changeRFcity(){
  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}

function getFromCountryES(){
  console.log("getFromTownES");
  $('#block-get-econom-ES').removeClass('hidden');
  $('#block-get-econom-RF').addClass('hidden');
}

function getFromTownRF(){
  console.log("getFromTownRF");
  $('#block-get-econom-RF').removeClass('hidden');
  $('#block-get-econom-ES').addClass('hidden');
}

// габариты для мест
function addPlaces(){
  var count = $("#calc_places_lenght option:selected").text();
  var row = "";
  $('#gabarits').html("");

  for(var i=0; i<count; i++){
    row = '<div class="places-row">' +
      '<p>Габариты, см.</p>' +
      '<input class="short" type="text" id="len_' + i + '" value="" placeholder="длина" name="calc_size_lenght">x' +
      '<input class="short" type="text" id="wid_' + i + '" value="" placeholder=" ширина" name="calc_size_width">x' +
      '<input class="short" type="text" id="hei_' + i + '" value="" placeholder=" высота" name="calc_size_height">' +
      '</div>';
    $('#gabarits').append(row);
  }
}

function checkWeight(){
  //ограничение веса по экспресс эконом для ес
  if ($("#to_countrys_eu").is(":checked")){
    if ($('#weight_kg').val() > 60){
      $("#express_es_error").removeClass("hidden");
    }else{
      $("#express_es_error").addClass("hidden");
    }
  }
  // ограничение веса по тариф экспресс эконом для РФ
  if ($("#to_sities_rf").is(":checked")){
    if ($('#weight_kg').val() > 70){
      $("#express_rf_error").removeClass("hidden");
    }else{
      $("#express_rf_error").addClass("hidden");
    }
  }
}


$("#do_send").on("click", function(){

  if ($("#type_hu_send").is(":checked")){ // отправить
    if ($("#type_speed_eco").is(":checked")){ //эконом
      // в страны ес
      if(($("#to_countrys_eu").is(":checked")) && ($("#to_es option:selected").index() != 0) ){
        export_econom_to_es();
      }
      // в города рф
      if(($("#to_sities_rf").is(":checked")) && ($("#to_sities_rf option:select").index() != 0)){
        export_econom_rf();
      }

    }

    if ($("#type_speed_exp").is(":checked")){ //экспресс
      console.log("отправить экспресс");
    }
  }


  if ($("#type_hu_rec").is(":checked")){ //получить
    if ($("#type_speed_eco").is(":checked")){ // эконом
      console.log("получить эконом");
    }

    if ($("#type_speed_exp").is(":checked")){ // экспресс
      console.log("получить экспресс");
    }
  }


  function export_econom_to_es(){
    var country_name = $("#to_es option:selected").data("name");
    var tarif1 = parseFloat($("#to_es option:selected").data("price1"));
    var tarif2 = parseFloat($("#to_es option:selected").data("price2"));
    var terms = $("#to_es option:selected").data("terms");
    var weight = parseFloat($("#weight_kg").val());

    var ndoc = null; //сбор за недокументы
    var additional_cost = null; // дополнительные расходы
    var hawb = null; //сбор за таможенную очистку

    if(weight > 10){
      weight_over = weight - 10;
      price = (tarif2 * weight_over) + tarif1;
    }else{
      price = $("#es_tarif1").val();
    }

    $(".response_container").removeClass("hidden");
    $(".point-country-cell").text(country_name);
    $(".w-weight-cell").text(weight);
    $(".terms-cell").text(terms);
    $(".cost-cell").text(price);
    $(".ndox-cell").text(ndox-cell);
    $(".other-price-cell").text(additional_cost);
    $(".hawb").text(hawb);

    return price;
  }


  function export_econom_rf(){
    var weight = parseFloat($("#weight_kg").val());
    var town_names = $("#to_rf option:selected").data("name");
    var tarif1 = parseFloat($("#to_rf option:selected").data("tarif1"));
    var tarif2 = parseFloat($("#to_rf option:selected").data("tarif2"));

    if(weight <= 20.50){
      price = tarif1;
      console.log(price);
    }else{
      var weight_over = Math.floor((weight - 20.50) / 0.5);
      price = tarif1 + (weight_over * tarif2);
      console.log(price);
    }
  }

});
