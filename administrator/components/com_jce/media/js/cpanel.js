/* JCE Editor - 2.3.2.1 | 05 March 2013 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function($){$.jce.CPanel={init:function(options){if(options.feed){$('ul.newsfeed').addClass('loading').html('<li>'+options.labels.feed+'</li>');$.getJSON("index.php?option=com_jce&view=cpanel&task=feed",{},function(r){$('ul.newsfeed').removeClass('loading').empty();$.each(r.feeds,function(k,n){$('ul.newsfeed').append('<li><a href="'+n.link+'" target="_blank" title="'+n.title+'">'+n.title+'</a></li>');});});}
if(options.updates){$.getJSON("index.php?option=com_jce&view=updates&task=update&step=check",{},function(r){if(r){if($.type(r)=='string'){r=$.parseJSON(r);}
if(r.error){var $list=$('div#jce ul.adminformlist').append('<li><span>'+options.labels.updates+'</span><span class="updates error">'+r.error+'</span></li>');return false;}
if(r.length){var $list=$('div#jce ul.adminformlist').append('<li><span>'+options.labels.updates+'</span><span class="updates"><a title="'+options.labels.updates+'" class="updates" href="#">'+options.labels.updates_available+'</a></span></li>');$('a.updates',$list).click(function(e){$('#toolbar-updates button').click();$('#toolbar-updates a.updates').each(function(){$.jce.createDialog(this,{src:$(this).attr('href'),options:{'width':780,'height':560}});e.preventDefault();});});}}});}
$('#newsfeed_enable').click(function(e){$('#toolbar-options button').click();$('#toolbar-popup-options a.modal, #toolbar-config a.modal').each(function(){$.jce.createDialog(this,{src:$(this).attr('href'),options:{'width':780,'height':560}});});e.preventDefault();});}};})(jQuery);