/* JCE Editor - 2.3.2.1 | 05 March 2013 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
var LinkDialog={settings:{},init:function(){tinyMCEPopup.restoreSelection();var self=this,ed=tinyMCEPopup.editor,se=ed.selection,n,el;$('button#insert').click(function(e){self.insert();e.preventDefault();});$('button#help').click(function(e){self.openHelp();e.preventDefault();});tinyMCEPopup.resizeToInnerSize();if(!this.settings.file_browser){$('#href').removeClass('browser');}
$('span.email').click(function(){LinkDialog.createEmail();});$('#anchor_container').html(this.getAnchorListHTML('anchor','href'));WFLinkBrowser.init({onClick:function(v){self.insertLink(v);}});WFLinkSearch.init({onClick:function(v){self.insertLink(v);}});WFPopups.setup();var bh=$('#link-browser').innerHeight(),wh=$(window).height(),ww=$(window).width(),iw=$('#search-input').width();$(window).bind('resize',function(){$('#link-browser').height(bh+$(this).height()-wh);$('#search-input').width(iw+$(this).width()-ww);});if(!se.isCollapsed()){n=se.getNode();var state=false,v;function setText(state,v){if(state&&v){$('#text').val(v);$('#text').attr('disabled',false);}else{$('#text').val(tinyMCEPopup.getLang('dlg.selection','Element Selection'));$('#text').attr('disabled',true);$('#text').addClass('disabled');}}
if(n){n=ed.dom.getParent(n,'A')||n;if(n.nodeName=='A'){var c=n.childNodes;if(c.length==1&&c[0].nodeType==3){state=true;v=se.getContent({format:'text'});}}else{if(ed.dom.isBlock(n)||n.nodeName==='BODY'){v=se.getContent();state=/<([^>]+)>/.test(v)===false;}}}else{state=true;v=se.getContent({format:'text'});}
setText(state,v);}
$.Plugin.init();TinyMCE_Utils.fillClassList('classlist');$.each(this.settings.attributes,function(k,v){if(parseInt(v)===0){$('#attributes-'+k).hide();}});if(n&&n.nodeName=='A'){$('#insert').button('option','label',tinyMCEPopup.getLang('update','Update',true));var href=decodeURIComponent(ed.convertURL(ed.dom.getAttrib(n,'href')));$('#href').val(href);$.each(['title','id','style','dir','lang','tabindex','accesskey','class','charset','hreflang','target'],function(i,k){$('#'+k).val(ed.dom.getAttrib(n,k));});$('#dir').val(ed.dom.getAttrib(n,'dir'));$('#rev').val(ed.dom.getAttrib(n,'rev'),true);if(href.charAt(0)=='#'){$('#anchor').val(href);}
$('#classes').val(ed.dom.getAttrib(n,'class'));$('#target').val(ed.dom.getAttrib(n,'target'));var data=WFPopups.getPopup(n)||{};$('#rel').val(function(){var v=data.rel;if($.type(v)!=="string"){v=ed.dom.getAttrib(n,'rel');}
v=ed.dom.encode(v);if($('option[value="'+v+'"]',this).length==0){$(this).append(new Option(v,v));$(this).val(v);}
return v;});}else{$.Plugin.setDefaults(this.settings.defaults);}
if(ed.settings.schema=='html5'&&ed.settings.validate){$('#rev').parent().parent().hide();}
window.focus();},getAnchorListHTML:function(id,target){var ed=tinyMCEPopup.editor,name;var nodes=ed.dom.select('.mceItemAnchor');var html="";html+='<select id="'+id+'" class="mceAnchorList" onchange="this.form.'+target+'.value=';html+='this.options[this.selectedIndex].value;">';html+='<option value="">---</option>';tinymce.each(nodes,function(n){if(n.nodeName=='SPAN'){name=ed.dom.getAttrib(n,'data-mce-name')||ed.dom.getAttrib(n,'id');}else{if(!n.href){name=ed.dom.getAttrib(n,'name')||ed.dom.getAttrib(n,'id');}}
if(name){html+='<option value="#'+name+'">'+name+'</option>';}});html+='</select>';return html;},checkPrefix:function(n){var v=$(n).val();if(Validator.isEmail(v)&&!/^\s*mailto:/i.test(v)){$.Dialog.confirm(tinyMCEPopup.getLang('link_dlg.is_email','The URL you entered seems to be an email address, do you want to add the required mailto: prefix?'),function(state){if(state){$(n).val('mailto:'+v);}
LinkDialog.insert();});}else if(/^\s*www./i.test(v)){$.Dialog.confirm(tinyMCEPopup.getLang('link_dlg.is_external','The URL you entered seems to be an external link, do you want to add the required http:// prefix?'),function(state){if(state){$(n).val('http://'+v);}
LinkDialog.insert();});}else{this.insertAndClose();}},insert:function(){var ed=tinyMCEPopup.editor,se=ed.selection;AutoValidator.validate(document);if($('#href').val()==''){$.Dialog.alert(ed.getLang('link_dlg.no_href','A URL is required. Please select a link or enter a URL'));$('#href').focus();return false;}
if(se.isCollapsed()&&$('#text').val()==''){$.Dialog.alert(ed.getLang('link_dlg.no_text','Please enter some text for the link'));$('#text').focus();return false;}
return this.checkPrefix($('#href'));},insertAndClose:function(){tinyMCEPopup.restoreSelection();var ed=tinyMCEPopup.editor,se=ed.selection,n=se.getNode(),args={},el;var attribs=['href','title','target','id','style','class','rel','rev','charset','hreflang','dir','lang','tabindex','accesskey','type'];tinymce.each(attribs,function(k){var v=$('#'+k).val();if(k=='href'){v=$.String.buildURI(v);}
if(k=='class'){v=$('#classlist').val()||$('#classes').val()||'';}
args[k]=v;});var selector='a[data-mce-link]';args['data-mce-link']=null;if(se.isCollapsed()){ed.execCommand('mceInsertContent',false,'<a href="#" data-mce-link="1">'+$('#text').val()+'</a>',{skip_undo:1});tinymce.each(ed.dom.select(selector),function(link){ed.dom.setAttribs(link,args);el=link;});}else{var styles;if(tinymce.isWebKit){if(n&&n.nodeName=='IMG'){styles=n.style.cssText;}}
ed.execCommand('mceInsertLink',false,{'href':'#','data-mce-link':'1'},{skip_undo:1});tinymce.each(ed.dom.select(selector),function(link){ed.dom.setAttribs(link,args);el=link;});if(!$('#text').is(':disabled')&&el){ed.dom.setHTML(el,$('#text').val());}
if(styles){ed.dom.setAttrib(n,'style',styles);}}
WFPopups.createPopup(el);tinyMCEPopup.close();},setClasses:function(v){$.Plugin.setClasses(v);},setTargetList:function(v){$('#target').val(v);},setClassList:function(v){$('#classlist').val(v);},insertLink:function(v){$('#href').val(tinyMCEPopup.editor.documentBaseURI.toRelative(v));},createEmail:function(){var ed=tinyMCEPopup.editor;var fields='<div class="formElm"><label for="email_to">'+ed.getLang('link_dlg.to','To')+'</label>'+'<textarea id="email_mailto" class="email"></textarea>'+'</div>'+'<div class="formElm"><label for="email_cc">'+ed.getLang('link_dlg.cc','CC')+'</label>'+'<textarea id="email_cc" class="email"></textarea>'+'</div>'+'<div class="formElm"><label for="email_bcc">'+ed.getLang('link_dlg.bcc','BCC')+'</label>'+'<textarea id="email_bcc" class="email"></textarea>'+'</div>'+'<div class="formElm"><label for="email_subject">'+ed.getLang('link_dlg.subject','Subject')+'</label>'+'<textarea id="email_subject" class="email"></textarea>'+'</div>';$.Dialog.dialog(ed.getLang('link_dlg.email','Create E-Mail Address'),fields,{width:300,height:250,buttons:[{text:ed.getLang('dlg.ok','Ok'),click:function(){var args=[],errors=0;$.each(['mailto','cc','bcc','subject'],function(i,s){var v=$('#email_'+s).val();if(v){v=v.replace(/\n\r/g,'');$.each(v.split(','),function(i,o){if(s!=='subject'){if(!Validator.isEmail(o)){$.Dialog.alert(s+ed.getLang('link_dlg.invalid_email',' is not a valid e-mail address!'));errors++;}}});args.push((s=='mailto')?v:s+'='+v);}});if(errors==0){if(args.length){$('#href').val('mailto:'+args.join('&').replace(/&/,'?'));}}
$(this).dialog('destroy').remove();},icons:{primary:'ui-icon-check'}},{text:ed.getLang('dlg.cancel','Cancel'),click:function(){$(this).dialog('destroy').remove();},icons:{primary:'ui-icon-close'}}]});},openHelp:function(){$.Plugin.help('link');}};tinyMCEPopup.onInit.add(LinkDialog.init,LinkDialog);