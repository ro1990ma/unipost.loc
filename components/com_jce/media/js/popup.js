/* JCE Editor - 2.3.2.1 | 05 March 2013 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function(win){var doc=win.document,body=doc.body;win.WFWindowPopup={init:function(width,height,click){this.width=parseInt(width);this.height=parseInt(height);this.resize();if(click){this.noclick();}},resize:function(){var x,oh=0;var vw=win.innerWidth||doc.documentElement.clientWidth||body.clientWidth||0;var vh=win.innerHeight||doc.documentElement.clientHeight||body.clientHeight||0;var divs=doc.getElementsByTagName('div');for(x=0;x<divs.length;x++){if(divs[x].className=='contentheading'){oh=divs[x].offsetHeight;}}
win.resizeBy(vw-this.width,vh-(this.height+oh));this.center();},center:function(){var vw=win.innerWidth||doc.documentElement.clientWidth||body.clientWidth||0;var vh=win.innerHeight||doc.documentElement.clientHeight||body.clientHeight||0;var x=(screen.width-vw)/2;var y=(screen.height-vh)/2;win.moveTo(x,y);},noclick:function(){doc.onmousedown=function(e){e=e||win.event;if(/msie/i.test(navigator.userAgent)){if(e.button==2)
return false;}else{if(e.which==2||e.which==3){return false;}}};doc.oncontextmenu=function(){return false;};}};})(window);