<?php
/* ------------------------------------------------------------------------
  # mod_klixo_particles  - Version 1.5.2 - 20140404
  # ------------------------------------------------------------------------
  # Copyright (C) 2012-2014 Klixo. All Rights Reserved.
  # @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
  # Author: JF Thier Klixo
  # Website: http://www.Klixo.se
  ------------------------------------------------------------------------- */

defined('_JEXEC') or die('Restricted access');
$modID = "klixo_Particles_" . $module->id;
?>

<?php if ($playMode != "screen") : ?>
    <div class="_klixo_Particles <?php echo $moduleclass_sfx; ?>" id="<?php echo $modID ?>">
    <?php endif ?>

    <script type="text/javascript">
        if (typeof (jQuery) === 'undefined') {
            jQuery = jQuery.noConflict();
        }
        var playMode = '<?php echo $playMode ?>';

        (function($) {
            var particles;
            $(window).load(function() {

                if (playMode === "module") {
                    $('#<?php echo $modID ?>').css({
                        width: <?php echo $moduleWidth ?>,
                        height:<?php echo $moduleHeight ?>,
                        position: "absolute"
                    });
                }

                particles = new $.particleSystem({
                    spritesNum: <?php echo $spritesQty ?>,
                    content: '<?php echo $spriteURL ?>',
                    hTurbulence: <?php echo $turbulence ?>,
                    hSpeed: <?php echo $hSpeed ?>,
                    vSpeed: <?php echo $vSpeed ?>,
                    spriteWidth: <?php echo $imgWidth ?>,
                    spriteHeight: <?php echo $imgHeight ?>,
                    playMode: '<?php echo $playMode ?>',
                    moduleID: '<?php echo $modID ?>'
                });
                particles.init();
                setInterval(function() {
                    particles.animSprites();
                }, <?php echo $refreshRate ?>);

            });

            if (playMode === "screen") {
                var delay;
                $(window).resize(function() {
                    clearTimeout(delay);
                    delay = setTimeout(function() {
                        particles.resetAnim();
                    }, 100);
                });
            }
        })(jQuery);
    </script>

    <?php if ($playMode != "screen") : ?>
    </div>
<?php endif; ?>