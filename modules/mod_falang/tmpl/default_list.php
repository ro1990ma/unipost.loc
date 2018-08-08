<?php

/**

 * @package		Joomla.Site

 * @subpackage	mod_falang

 * @license		GNU General Public License version 2 or later; see LICENSE.txt

 */



// no direct access

defined('_JEXEC') or die('Restricted access');



?>







<ul class="<?php echo $params->get('inline', 1) ? 'lang-inline' : 'lang-block';?>">

    <?php foreach($list as $language):?>

     <?php  
     $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
//     $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 

     $add=''; ?>
    <?php if ($host=='unipost.md/ru/?do=calc' || $host=='unipost.md/ro/?do=calc' || $host=='unipost.md/en/?do=calc' || $host=='www.unipost.md/ru/?do=calc' || $host=='www.unipost.md/ro/?do=calc' || $host=='www.unipost.md/en/?do=calc') {
        $add='?do=calc';
    }
    if ($host=='unipost.md/ru/?do=command' || $host=='unipost.md/ro/?do=command' || $host=='unipost.md/en/?do=command' || $host=='www.unipost.md/ru/?do=command' || $host=='www.unipost.md/ro/?do=command' || $host=='www.unipost.md/en/?do=command') {
        $add='?do=command';
    }    
    if ($host=='unipost.md/ru/?do=reg_sec' || $host=='unipost.md/ro/?do=reg_sec' || $host=='unipost.md/en/?do=reg_sec' || $host=='www.unipost.md/ru/?do=reg_sec' || $host=='www.unipost.md/ro/?do=reg_sec' || $host=='www.unipost.md/en/?do=reg_sec') {
        $add='?do=reg_sec';
    } 
     if ($host=='unipost.md/ru/?do=call_missed' || $host=='unipost.md/ro/?do=call_missed' || $host=='unipost.md/en/?do=call_missed' || $host=='www.unipost.md/ru/?do=call_missed' || $host=='www.unipost.md/ro/?do=call_missed' || $host=='www.unipost.md/en/?do=call_missed') {
        $add='?do=call_missed';
    } 
    if ($host=='unipost.md/ru/?do=reg_shop' || $host=='unipost.md/ro/?do=reg_shop' || $host=='unipost.md/en/?do=reg_shop' || $host=='www.unipost.md/ru/?do=reg_shop' || $host=='www.unipost.md/ro/?do=reg_shop' || $host=='www.unipost.md/en/?do=reg_shop') {
        $add='?do=reg_shop';
    } 
         if (strpos($_SERVER['REQUEST_URI'], "track") !== false){ 
        $add='track';
    }
//    echo $language->sef;
    ?>
        <!-- >>> [FREE] >>> -->

        <?php if ($params->get('show_active', 0) || !$language->active):?>

            <li class="<?php echo $language->active ? 'lang-active' : '';?>" dir="<?php echo JLanguage::getInstance($language->lang_code)->isRTL() ? 'rtl' : 'ltr' ?>">

                <?php if ($language->display) { ?>
<?php   if (strpos($_SERVER['REQUEST_URI'], "track") !== false){  ?>


   <a href="<?php echo $language->sef ?>/<?php echo $add; ?>/<?php echo substr($language->link, 4) ?>">
 
                        <?php if ($params->get('image', 1)):?>

                            <?php echo JHtml::_('image', 'mod_falang/'.$language->image.'.gif', $language->title_native, array('title'=>$language->title_native), true);?>

                        <?php endif; ?>

                        <?php if ($params->get('show_name', 1)):?>

                            <?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef);?>

                        <?php endif; ?>

                    </a>
<?php } else { ?>
                    <a href="<?php echo $language->link;?><?php echo $add; ?>">

                        <?php if ($params->get('image', 1)):?>

                            <?php echo JHtml::_('image', 'mod_falang/'.$language->image.'.gif', $language->title_native, array('title'=>$language->title_native), true);?>

                        <?php endif; ?>

                        <?php if ($params->get('show_name', 1)):?>

                            <?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef);?>

                        <?php endif; ?>

                    </a>
                    <?php } ?>
                <?php } else { ?>

                    <?php if ($params->get('image', 1)):?>

                        <?php echo JHtml::_('image', 'mod_falang/'.$language->image.'.gif', $language->title_native, array('title'=>$language->title_native,'style'=>'opacity:0.5'), true);?>

                    <?php endif; ?>

                    <?php if ($params->get('show_name', 1)):?>

                        <?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef);?>

                    <?php endif; ?>

                <?php } ?>

            </li>

        <?php endif;?>

        <!-- <<< [FREE] <<< -->

    <?php endforeach;?>

</ul>

