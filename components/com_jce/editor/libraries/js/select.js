/* JCE Editor - 2.3.2.1 | 05 March 2013 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function($){$.widget("ui.combobox",{options:{label:'Add Value',change:$.noop},_init:function(options){var self=this;$(this.element).removeClass('mceEditableSelect').addClass('editable');$('<span role="button" class="editable-edit" title="'+this.options.label+'"></span>').insertAfter(this.element).click(function(e){if($(this).hasClass('disabled'))
return;self._onChangeEditableSelect(e);});if($(this.element).is(':disabled')){$(this.element).next('span.editable-edit').addClass('disabled');}},_onChangeEditableSelect:function(e){var self=this;this.input=document.createElement('input');$(this.input).attr('type','text').addClass('editable-input').val($(this.element).val()).insertBefore($(this.element)).width($(this.element).width());$(this.input).blur(function(){self._onBlurEditableSelectInput();}).keydown(function(e){self._onKeyDown(e);});$(this.element).hide();this.input.focus();},_onBlurEditableSelectInput:function(){var self=this,o,found,v=$(this.input).val();if(v!=''){if($('option[value="'+v+'"]',this.element).is('option')){$(this.element).val(v);}else{if(!found){var pattern=$(this.element).data('pattern');if(pattern&&!new RegExp('^(?:'+pattern+')$').test(v)){var n=new RegExp('('+pattern+')').exec(v);v=n?n[0]:'';}
if(v!=''){if($('option[value="'+v+'"]',this.element).length==0){$(this.element).append(new Option(v,v));}
$(this.element).val(v);}}}
self.options.change.call(self,v);}else{$(this.element).val('')||$('option:first',this.element).attr('selected','selected');}
$(this.element).show();$(this.input).remove();},_onKeyDown:function(e){if(e.which==13||e.which==27){this._onBlurEditableSelectInput();}},destroy:function(){$.Widget.prototype.destroy.apply(this,arguments);}});$.extend($.ui.combobox,{version:"2.3.2.1"});})(jQuery);