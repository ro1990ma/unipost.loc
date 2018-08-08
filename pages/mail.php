<?php
defined('_JEXEC') or die;
?>
	<?php
     $lang =& JFactory::getLanguage();
     if($lang->getTag() == 'ru-RU') { ?>
<div  class="item-page_about">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
	<div id="clear"></div>
	<div  class="content">
<style>
	.item-page{display:none;}
	h1.contacts_title {
    color: rgb(47, 120, 199);
    font-size: 22px;
    font-family: "Tahoma";
    font-weight: bold;
    margin-bottom: 10px;
    padding-bottom: 10px;
    margin-top: -15px;
}
.form-group label{width:85px;display:inline-block;text-align:right;margin-right:20px;color:#000; font-family:Helvetica;font-size:14px;}
.form-group input,.form-group select{border:1px solid #cccccc;line-height:40px;;padding-left:15px;width:325px;border-radius:3px;margin-bottom:24px; 
    font-size: 14px;}
table{margin-top:50px;}
.form-group select{height:42px;width:342px;}
.sendform{margin-left:108px;}
.sendform button{background-color:#27ae60;border:0;color:#fff; font-family:Helvetica; font-size:17px;padding:15px 40px;border-radius:3px;cursor:pointer;}
table td{vertical-align: top;}
.modal-body{margin-bottom: 200px;}
.modal_wind{    width: 100%;
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 50000;}
.statusMsg{    text-align: center;
    font-size: 20px;
    position: relative;
    width: 750px;
    height: 400px;
    margin: 0px auto;
    background-color: #fff;
    top: 10%;
    padding: 50px;}
    .statusMsg p{margin-bottom:25px;}
</style>
<h1 class="contacts_title" style="font-size:18px;">Получите бесплатно свой адрес в Европе для отправки/получения  на него, купленных вами товаров в интернет –магазинах стран Евросоюза, с последущей переадресацией посылок на ваш адрес в Молдове.</h1>
<p style="font-size:16px;">Заполнив данную регистрационную форму, вы получите персонализированный вашими данными, почтовый адрес в Германии или Латвии, по которым находятся сортировочные, логистические терминалы наших партнёров, участников международного посылочного сервиса <a href="/ru/inform#art_1818">SHIPOTEKA ®</a>.</p> <br>
<p style="font-size:16px;">Mail Forwarding (Мэил Форвардинг) —  сервис по предоставлению вам почтового адреса для доставки на него товаров, в стране, в которой вы хотите купить эти товары в онлайн-магазине, с последующим перенаправлением посылок с товарами уже на ваш почтовый адрес в стране проживания. Также этот сервис предоставляет вам ряд сопутствующих услуг связанных с обслуживанием ваших посылок.</p> 
 <!-- start -->
<table>
	<tr><td colspan="2"><p style="font-size:18px; padding-left: 15px;">*Заполняйте форму только латинскими буквами<br>&nbsp;</p></td></tr>
    <tr><td>

            <div class="modal-body">
              <!--   <h3  class="tr" key="datele">COMPLETAȚI DATELE DVS. PERSONALE</h3> -->
              	<div class="modal_wind" style="display:none;">
              		 <p class="statusMsg" style="text-align:center;     font-size: 20px;"></p>
              	</div>
       
                <form role="form" method="post">
                    <div class="form-group">
                    	<label for="name">Имя</label>
                        <input type="text" class="form-control tr_hold"  id="name" placeholder="Nicolai"/>
                    </div>
                 		<div class="form-group">
                    	<label for="surname">Фамилия</label>
                        <input type="text" class="form-control tr_hold"  id="surname" placeholder="Smirnov"/>
                    </div>
                    <div class="form-group">
                        <label for="city">Страна</label>
                        <input type="text" class="form-control tr_hold"  id="country" placeholder="Moldova"/>
                    </div>
                    <div class="form-group">
                    	<label for="city">Город</label>
                        <input type="text" class="form-control tr_hold"  id="city" placeholder="Chisinau"/>
                    </div>
                       <div class="form-group">
                    	<label for="adress">Адрес</label>
                        <input type="text" class="form-control tr_hold"  id="adress" placeholder="bd. Stefan Cel Mare 128, ap. 65"/>
                    </div>
                      <div class="form-group">
                    	<label for="phone">Телефон</label>
                        <input type="text" class="form-control tr_hold"  id="phone" placeholder="+373 (__) __ - __ - __"/>
                    </div>

                        <div class="form-group">
                    	<label for="mail">Email</label>
                        <input type="text" class="form-control tr_hold"  id="mail" placeholder="smirnovkolea89@mail.md"/>
                    </div>
                    <div class="form-group">
                    	<label for="sklad">Склад</label>
                    	<select name="sklad" id="sklad">
                    		<option value="" disabled selected>Выберите наш склад в Европе</option>
                    		<option value="germany">Германия</option>
                    	</select>
                    </div>
                      <div class="form-group sendform">
                         <button type="button" class="btn btn-primary submitBtn tr" onclick="submitContactForm()">Получить адрес</button>
                       </div>
                </form>
            </div>

	</td>
	<td>
		<img src="./images/mail.png" alt="">

	</td></tr>
            </table>


      <!-- <p style="font-size:16px; margin-top:-135px;"><span style="color:rgb(47, 120, 199); font-weight: bold;">Mail Forwarding (Мэил Форвардинг)</span> —  сервис по предоставлению вам почтового адреса для доставки на него товаров, в стране, в которой вы хотите купить эти товары в онлайн-магазине, с последующим перенаправлением посылок с товарами уже на ваш почтовый адрес в стране проживания. Также этот сервис предоставляет вам ряд сопутствующих услуг связанных с обслуживанием ваших посылок.</p> <br><br><br>-->
     
<!-- start -->



<script>
$(".modal_wind").click(function(){ $(".modal_wind").hide(); });

function submitContactForm(){
    var name = $('#name').val();
    var surname = $('#surname').val();
    var city = $('#city').val();
    var adress = $('#adress').val();
    var phone = $('#phone').val();  
    var mail = $('#mail').val();
    var sklad = $('#sklad').val();
     
function eliminateDuplicates(arr) {
    var i, len = arr.length,
        out = [],
        obj = {};

    for (i = 0; i < len; i++) {
        obj[arr[i]] = 0;
    }
    for (i in obj) {
        out.push(i);
    }
    return out;
}


var uniqid = function(str) {
    var len = str.length;
    var chars = [];
    for (var i = 0; i < len; i++) {

        chars[i] = str[Math.floor((Math.random() * len))];

    }

    var filtered = eliminateDuplicates(chars);

    return filtered.join('');


}


var iniq = uniqid('1234567890');


    if(name.trim() == '' ){
        alert('Введите ваше имя!');
        $('#name').focus();
        return false;
    }else if(surname.trim() == '' ){
        alert('Введите вашу фамилию!');
        $('#surname').focus();
        return false;
    }else if(city.trim() == '' ){
        alert('Введите ваш город!');
        $('#city').focus();
        return false;
    }else if(adress.trim() == '' ){
        alert('Введите ваш адрес!');
        $('#adress').focus();
        return false;
    }else if(phone.trim() == '' ){
        alert('Введите ваш номер телефона!');
        $('#phone').focus();
        return false;
    }else if(mail.trim() == '' ){
        alert('Введите ваш Email!');
        $('#mail').focus();
        return false;
    }else if(sklad.trim() == '' ){
        alert('Выберите склад!');
        $('#sklad').focus();
        return false;
    }else{
        $.ajax({
            type:'POST', 
            url:'/submit_form.php', 
            data:'contactFrmSubmit=1&name='+name+'&surname='+surname+'&city='+city+'&adress='+adress+'&phone='+phone+'&mail='+mail+'&sklad='+sklad+'&iniq='+iniq,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('.statusMsg').html('<p style="color:#2866b4;text-align:center; font-size:25px">Вы успешно отправили заявку!</p><p><img src="./images/check.png"></p><p>В скором времени на ваш электронный ящик вы получите</p><p>адрес нашего склада в Европе и все инструкции по его использованию.</p><br><p>Если у вас есть вопросы? Обращайтесь к нам по телефону +373 (22) 27-70-27</p>');
                    $('.modal_wind').show();
                }else{
                    $('.statusMsg').html('<span style="color:red;text-align:center;">Introduceți datele dvs-tră.</span>');
                    $('.modal_wind').hide();
                }
                $('.submitBtn').removeAttr("disabled");
            }
        });
    } 
}
</script>
</div> 
	</div>
	<div id="clear"></div>
</div>
<?php } elseif ($lang->getTag() == 'ro-RO') { ?>
	<div  class="item-page_about">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
	<div id="clear"></div>
	<div  class="content">
<style>
	.item-page{display:none;}
	h1.contacts_title {
    color: rgb(47, 120, 199);
    font-size: 22px;
    font-family: "Tahoma";
    font-weight: bold;
    margin-bottom: 10px;
    padding-bottom: 10px; 
    margin-top: -15px;
}
    p.conttitle {
    color: rgb(47, 120, 199);
    font-size: 20px;
    font-family: "Tahoma";
    font-weight: bold;
    margin-bottom: 10px;
    padding-bottom: 10px; 
    margin-top: -15px;
}
.form-group label{width:85px;display:inline-block;text-align:right;margin-right:20px;color:#000; font-family:Helvetica;font-size:14px;}
.form-group input,.form-group select{border:1px solid #cccccc;line-height:40px;;padding-left:15px;width:325px;border-radius:3px;margin-bottom:24px;}
table{margin-top:50px;}
.form-group select{height:42px;width:342px;}
.sendform{margin-left:108px;}
.sendform button{background-color:#27ae60;border:0;color:#fff; font-family:Helvetica; font-size:16px;padding:15px 40px;border-radius:3px;cursor:pointer;}
table td{vertical-align: top;}
.modal-body{margin-bottom: 200px;}
.modal_wind{    width: 100%;
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 50000;}
.statusMsg{    text-align: center;
    font-size: 20px;
    position: relative;
    width: 750px;
    height: 400px;
    margin: 0px auto;
    background-color: #fff;
    top: 10%;
    padding: 50px;}
    .statusMsg p{margin-bottom:25px;}
</style>
<h1 class="contacts_title">Получите свой адрес в Европе для получения посылок</h1>
<p>Заполнив данную форму вы получите свой личный почтовый адрес в Европе,</p> 
<p>пользуюясь которым у вас появиться возможность получать посылку со всего мира. </p>
<!-- <p class="conttitle">Что такое Mail Forwarding?</h2>
<p style="font-size:16px;">Mail Forwarding (Мэил Форвардинг) —  сервис по предоставлению вам почтового адреса для доставки на него товаров, в стране, в которой вы хотите купить эти товары в онлайн-магазине, с последующим перенаправлением посылок с товарами уже на ваш почтовый адрес в стране проживания. Также этот сервис предоставляет вам ряд сопутствующих услуг связанных с обслуживанием ваших посылок.</p> 
 --><!-- start -->
<table>
	<td>

            <div class="modal-body">
              <!--   <h3  class="tr" key="datele">COMPLETAȚI DATELE DVS. PERSONALE</h3> -->
              	<div class="modal_wind" style="display:none;">
              		 <p class="statusMsg" style="text-align:center;     font-size: 20px;"></p>
              	</div>
       
                <form role="form" method="post">
                    <div class="form-group">
                    	<label for="name">Имя</label>
                        <input type="text" class="form-control tr_hold"  id="name" placeholder="Николай"/>
                    </div>
                 		<div class="form-group">
                    	<label for="surname">Фамилия</label>
                        <input type="text" class="form-control tr_hold"  id="surname" placeholder="Смирнов"/>
                    </div>
                    <div class="form-group">
                    	<label for="city">Город</label>
                        <input type="text" class="form-control tr_hold"  id="city" placeholder="Кишинев"/>
                    </div>
                       <div class="form-group">
                    	<label for="adress">Адрес</label>
                        <input type="text" class="form-control tr_hold"  id="adress" placeholder="бул. Штефан чал Маре 128, кв. 65"/>
                    </div>
                      <div class="form-group">
                    	<label for="phone">Телефон</label>
                        <input type="text" class="form-control tr_hold"  id="phone" placeholder="+373 (__) __ - __ - __"/>
                    </div>

                        <div class="form-group">
                    	<label for="mail">Email</label>
                        <input type="text" class="form-control tr_hold"  id="mail" placeholder="ivanov@mail.md"/>
                    </div>
                    <div class="form-group">
                    	<label for="sklad">Склад</label>
                    	<select name="sklad" id="sklad">
                    		<option value="" disabled selected>Выберите наш склад в Европе</option>
                    		<option value="germany">Германия</option>
                    	</select>
                    </div>
                      <div class="form-group sendform">
                         <button type="button" class="btn btn-primary submitBtn tr" onclick="submitContactForm()">Получить адрес</button>
                       </div>
                </form>
            </div>

	</td>
	<td>
		<img src="./images/mail.png" alt="">
	</td>
        
            </table>
<!-- start -->

<script>
$(".modal_wind").click(function(){ $(".modal_wind").hide(); });

function submitContactForm(){
    var name = $('#name').val();
    var surname = $('#surname').val();
    var city = $('#city').val();
    var adress = $('#adress').val();
    var phone = $('#phone').val();  
    var mail = $('#mail').val();
    var sklad = $('#sklad').val();
     
function eliminateDuplicates(arr) {
    var i, len = arr.length,
        out = [],
        obj = {};

    for (i = 0; i < len; i++) {
        obj[arr[i]] = 0;
    }
    for (i in obj) {
        out.push(i);
    }
    return out;
}


var uniqid = function(str) {
    var len = str.length;
    var chars = [];
    for (var i = 0; i < len; i++) {

        chars[i] = str[Math.floor((Math.random() * len))];

    }

    var filtered = eliminateDuplicates(chars);

    return filtered.join('');


}


var iniq = uniqid('1234567890');


    if(name.trim() == '' ){
        alert('Введите ваше имя!');
        $('#name').focus();
        return false;
    }else if(surname.trim() == '' ){
        alert('Введите вашу фамилию!');
        $('#surname').focus();
        return false;
    }else if(city.trim() == '' ){
        alert('Введите ваш город!');
        $('#city').focus();
        return false;
    }else if(adress.trim() == '' ){
        alert('Введите ваш адрес!');
        $('#adress').focus();
        return false;
    }else if(phone.trim() == '' ){
        alert('Введите ваш номер телефона!');
        $('#phone').focus();
        return false;
    }else if(mail.trim() == '' ){
        alert('Введите ваш Email!');
        $('#mail').focus();
        return false;
    }else if(sklad.trim() == '' ){
        alert('Выберите склад!');
        $('#sklad').focus();
        return false;
    }else{
        $.ajax({
            type:'POST', 
            url:'/submit_form.php', 
            data:'contactFrmSubmit=1&name='+name+'&surname='+surname+'&city='+city+'&adress='+adress+'&phone='+phone+'&mail='+mail+'&sklad='+sklad+'&iniq='+iniq,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('.statusMsg').html('<p style="color:#2866b4;text-align:center; font-size:25px">Вы успешно отправили заявку!</p><p><img src="./images/check.png"></p><p>В скором времени на ваш эллектронный ящик вы получите</p><p>адрес нашего склада в Европе и все инструкции по его использованию.</p><br><p>Если у вас есть вопросы? Обращайтесь к нам по телефону +373 (22) 27-70-27</p>');
                    $('.modal_wind').show();
                }else{
                    $('.statusMsg').html('<span style="color:red;text-align:center;">Introduceți datele dvs-tră.</span>');
                    $('.modal_wind').hide();
                }
                $('.submitBtn').removeAttr("disabled");
            }
        });
    } 
}
</script>
</div> 
	</div>
	<div id="clear"></div>
</div>
		<?php } ?>