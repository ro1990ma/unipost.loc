<?php
/* ------------------------------------------------------------------------
  # mod_klixo_particles  - Version 1.5.1
  # ------------------------------------------------------------------------
  # Copyright (C) 2012-2013 Klixo. All Rights Reserved.
  # @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
  # Author: JF Thier Klixo
  # Website: http://www.Klixo.se
  ------------------------------------------------------------------------- */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.html.html');
jimport('joomla.form.formfield');

$path = JURI::root() . "modules/mod_klixo_particles/customfields/slider_min.css";
JHtml::stylesheet($path);

class JFormFieldslider extends JFormField {

    protected $type = 'slider';

    protected function getTitle() {
        return $this->getLabel();
    }

    protected function getInput() {
        $document = &JFactory::getDocument();

        $document->addScriptDeclaration("
            window.addEvent('domready', function() {
                
                var slider = $('slider_" . $this->id . "');
                new Slider(slider, slider.getElement('.knob'), 
                    {
                     range: [" . $this->element['range'] . "],
                     initialStep: " . $this->value . "*" . $this->element['divider'] . ", 
                     steps :100,

                    onChange: function(value){
                         if (value) {
                             $('" . $this->id . "').value =value/" . $this->element['divider'] . ";
                        }
                     } ,
                    onComplete: function(value){
                        if (value) {
                             $('" . $this->id . "').value =value/" . $this->element['divider'] . ";
                         }
                    } 
             });	
         });

        ");

        return '<div>  <div id="slider_' . $this->id . '" class="slider"><div class="knob"></div></div><input id="' . $this->id . '" name= "' . $this->name . '" type="text" size="5" readonly="readonly" style="" value="' . $this->value . '" /></div>';
    }

}
?>