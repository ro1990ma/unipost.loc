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
  console.log("ES");
  $('#block-ES-countries').removeClass('hidden');
  $('#block-RF-cities').addClass('hidden');

  $('.content-type').addClass('hidden');
  $('#package-type').addClass('hidden');
}
function selectRF(){
  console.log("RF");
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
}

function getFromTownRF(){
  console.log("getFromTownRF");
  $('#block-get-econom-RF').removeClass('hidden');
  $('#block-get-econom-ES').addClass('hidden');
}
