<?php
defined('_JEXEC') or die;
?>
	<?php
     $lang =& JFactory::getLanguage();
     if($lang->getTag() == 'ru-RU') { ?>

<!--<script src="<?php echo JURI::base(); ?>templates/rew/js/anim_image.js"></script>-->

									<div class="form_left">
										<h3 class="form_title">Введите номер накладной</h3>
										<form id="track_1" action="<?php echo $_POST['track_nr']; ?>" method="post" name="track_main">
											<label for="track_nr">HAWB: 373 - </label>
												<input type="text" lenght="15" maxlength="15" value="" placeholder="  введите номер накладной " name="track_nr" />
											<button name="track_do" type="submit">отследить</button>
											<input type="hidden" name="show_form" value="track_package_guest" />
										</form>
									</div>
									<jdoc:include type="modules" name="slider_main" style="xhtml"/>
									<jdoc:include type="modules" name="subslider" style="none"/>
									<jdoc:include type="modules" name="news_main" style="xhtml"/>
									<jdoc:include type="modules" name="currency_right" style="xhtml"/>
									<table class="tg-table">
									  <tr>
										<th colspan="3">Курс валют на <?php echo "<strong>".$data_currency."</strong>";?> от BNM</th>
									  </tr>
									  <tr>
										<td width="25%"><img src="<?echo $this->baseurl.'/templates/'.$this->template.'/images/USD.png';?>" width="16px" height="10px"></td>
										<td width="30%">USD</td>
										<td width="45%"><?php echo $USD;?></td>
									  </tr>
									  <tr>
										<td width="25%"><img src="<?echo $this->baseurl.'/templates/'.$this->template.'/images/EUR.png';?>" width="16px" height="10px"></td>
										<td width="30%">EUR</td>
										<td width="45%"><?php echo $EUR;?></td>
									  </tr>
									</table>
									<div class="shop">
									<a class="int_shop2" href="https://www.unipost.md/ru/mail-frowarding">
                                                                            <p class="sevis_dost">Сервис доставки товаров интернет-магазинов</p>
                                                                            <div class="div_block_index"><img id="div_block12" src="<?php echo JUri::base().'templates/'.$this->template.'/images/shop2.png';?>"></div>
                                                                            <div class="a_black2">Mail Forwarding</div>
                                                                            <div class="a_block3">получить адрес</div>
                                                                            
                                                                            
                                                                           
									
									</a>
									</div>
									<jdoc:include type="modules" name="our_partners" style="xhtml"/>
                                                                        

									
<?php } elseif ($lang->getTag() == 'ro-RO') { ?>
	<div class="form_left">
										<h3 class="form_title">Introduceți numărul HAWB</h3>
										<form id="track_1" action="" method="post" name="track_main">
											<label for="track_nr">HAWB: 373 - </label>
												<input type="text" lenght="15" maxlength="15" value="" placeholder="Introduceți numărul HAWB  " name="track_nr" />
											<button name="track_do" type="submit">urmarire </button>
											<input type="hidden" name="show_form" value="track_package_guest" />
										</form>
									</div>
									<jdoc:include type="modules" name="slider_main" style="xhtml"/>
									<jdoc:include type="modules" name="subslider" style="none"/>
									<jdoc:include type="modules" name="news_main" style="xhtml"/>
									<jdoc:include type="modules" name="currency_right" style="xhtml"/>
									<table class="tg-table">
									  <tr>
										<th colspan="3">Curs valutar pe <?php echo "<strong>".$data_currency."</strong>";?></th>
									  </tr>
									  <tr>
										<td width="25%"><img src="<?echo $this->baseurl.'/templates/'.$this->template.'/images/USD.png';?>" width="16px" height="10px"></td>
										<td width="30%">USD</td>
										<td width="45%"><?php echo $USD;?></td>
									  </tr>
									  <tr>
										<td width="25%"><img src="<?echo $this->baseurl.'/templates/'.$this->template.'/images/EUR.png';?>" width="16px" height="10px"></td>
										<td width="30%">EUR</td>
										<td width="45%"><?php echo $EUR;?></td>
									  </tr>
									</table>
									<div class="shop">
									<a class="int_shop" href="./?do=reg_shop">Deservirea<br/>
                                                                            
                                                                            
									pentru<br/>
									<strong class="a_black">internet<br/>
									magazine</strong></a>
									</div>
									<jdoc:include type="modules" name="our_partners" style="xhtml"/>

<?php } elseif ($lang->getTag() == 'en-GB') {  ?>
			<div class="form_left">
										<h3 class="form_title">Enter shipment number </h3>
										<form id="track_1" action="" method="post" name="track_main">
											<label for="track_nr">HAWB: 373 - </label>
												<input type="text" lenght="15" maxlength="15" value="" placeholder="  Enter shipment number  " name="track_nr" />
											<button name="track_do" type="submit">track</button>
											<input type="hidden" name="show_form" value="track_package_guest" />
										</form>
									</div>
									<jdoc:include type="modules" name="slider_main" style="xhtml"/>
									<jdoc:include type="modules" name="subslider" style="none"/>
									<jdoc:include type="modules" name="news_main" style="xhtml"/>
									<jdoc:include type="modules" name="currency_right" style="xhtml"/>
									<table class="tg-table">
									  <tr>
										<th colspan="3">Exchange rate for <?php echo "<strong>".$data_currency."</strong>";?></th>
									  </tr>
									  <tr>
										<td width="25%"><img src="<?echo $this->baseurl.'/templates/'.$this->template.'/images/USD.png';?>" width="16px" height="10px"></td>
										<td width="30%">USD</td>
										<td width="45%"><?php echo $USD;?></td>
									  </tr>
									  <tr>
										<td width="25%"><img src="<?echo $this->baseurl.'/templates/'.$this->template.'/images/EUR.png';?>" width="16px" height="10px"></td>
										<td width="30%">EUR</td>
										<td width="45%"><?php echo $EUR;?></td>
									  </tr>
									</table>
									<div class="shop">
									<a class="int_shop" href="./?do=reg_shop">Service<br/>
									for<br/>
									<strong class="a_black">online<br/>
									stores</strong></a>
									</div>



									<jdoc:include type="modules" name="our_partners" style="xhtml"/>

		<?php } ?>

										<script>
									(function () {

    var lang = 'en';

    try {
        lang = window.location.toString().match('www./unipost\.md\/([^/]+)/')[1];
    }
    catch (exception) {
    }

    // Each time form is submitted, update url
    jQuery('[name=track_nr]').closest('form').submit(handleFormSubmit);

    function handleFormSubmit(event) {
        var trackNo = jQuery(this).find('[name=track_nr]').val();
        try {
            event.preventDefault();
            event.stopPropagation();
            jQuery(this)
                .off('submit', handleFormSubmit)
                .attr('action', 'https://www.unipost.md/' + lang + '/track/' + trackNo)
                .submit();
        }
        catch (exception) {
        }
    }
 
    // If url contains /track/*** then do form submission.
    try {
        var m = window.location.toString().match(/track\/([^/]+)$/);
        if (m) {
            history.replaceState({}, null, 'https://www.unipost.md/' + lang);
            jQuery('[name=track_nr]').val(m[1]).closest('form').submit();
        }
    }
    catch (exception) {
    }

})();
</script> 