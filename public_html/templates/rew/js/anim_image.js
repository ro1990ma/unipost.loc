jQuery(document).ready(function() {
//console.log(1);
      //миллисекунды зацикливания вызова функции ниже
	setInterval (blinke_funk, 150);

	function blinke_funk() { 
		var blinke_speed = 150; //миллисекунды анимации

		jQuery("#div_block1").fadeIn(blinke_speed).fadeOut(blinke_speed);

	}


console.log("TEST3"+document.location.search);
//jQuery("div#page_tabs ul li a").click(function(){
//    console.log("click");
//   jQuery(this).toggleClass('ui-state-active');
//});
});


