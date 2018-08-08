<?php
// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

include_once 'func.php';

JHtml::_('behavior.framework', true);

$app        = JFactory::getApplication();
$doc        = JFactory::getDocument();
$menu         = $app->getMenu();

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/general.css', $type = 'text/css', $media = 'screen,projection');

$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_calc_req_miss.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_profile.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_request.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/form_shop.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/form_sec.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_main.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_slider.css', $type = 'text/css', $media = 'screen,projection');
  if ($menu->getActive() == $menu->getDefault()) {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/form_track.css', $type = 'text/css', $media = 'screen,projection');
  } elseif (($menu->getActive()->id == 103)) {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_about.css', $type = 'text/css', $media = 'screen,projection');
  } elseif (($menu->getActive()->id == 104)) {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_services.css', $type = 'text/css', $media = 'screen,projection');
  } elseif (($menu->getActive()->id == 105)) {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_info.css', $type = 'text/css', $media = 'screen,projection');
  } elseif (($menu->getActive()->id == 106)) {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_prices.css', $type = 'text/css', $media = 'screen,projection');
  } elseif (($menu->getActive()->id == 107)) {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_adv_serv.css', $type = 'text/css', $media = 'screen,projection');
  } elseif (($menu->getActive()->id == 108)) {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/page_contacts.css', $type = 'text/css', $media = 'screen,projection');
  }
    
    $current_action = htmlspecialchars($_POST['show_form']) ? htmlspecialchars($_POST['show_form'])  : htmlspecialchars($_GET['do']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
    <head>
      <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "url": "https://www.unipost.md",
  "logo": "https://www.unipost.md/templates/rew/images/logo.png",
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "+373 22 277 027",
    "contactType": "customer service"
  }]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "url": "https://www.unipost.md/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://query.unipost.md/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "UniPost",
  "url": "https://www.unipost.md",
  "sameAs": [
    "https://www.facebook.com/unipost.md/?ref=ts&fref=ts"
  ]
}
</script>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"ItemList",
  "itemListElement":[
    {
      "@type":"ListItem",
      "position":1,
      "url":"https://www.unipost.md/ru/services"
    },
    {
      "@type":"ListItem",
      "position":2,
      "url":"https://www.unipost.md/ru/inform"
    },
    {
      "@type":"ListItem",
      "position":3,
      "url":"https://www.unipost.md/ru/prices"
    },
    {
      "@type":"ListItem",
      "position":4,
      "url":"https://www.unipost.md/ru/vacancy"
    },
    {
      "@type":"ListItem",
      "position":5,
      "url":"https://www.unipost.md/ro/services"
    },
    {
      "@type":"ListItem",
      "position":6,
      "url":"https://www.unipost.md/ro/inform"
    },
    {
      "@type":"ListItem",
      "position":7,
      "url":"https://www.unipost.md/ro/prices"
    },
    {
      "@type":"ListItem",
      "position":8,
      "url":"https://www.unipost.md/ro/vacancy"
    }
  ]
}
</script>
    
<meta name="viewport" content="width=1000px, target-densitydpi=device-dpi">
      <jdoc:include type="head" />
      <script>
      window.addEvent('domready', function() {
        //store titles and text
        $$('a.tt').each(function(element,index) {
          var content = element.get('title').split('::');
          element.store('tip:title', content[0]);
          element.store('tip:text', content[1]);
        });
        
        //create the tooltips
        var tipz = new Tips('.tt',{
          className: 'tt',
          offset: {x: 0, y: 16},
          fixed: false,
          hideDelay: 100,
          showDelay: 50
        });
        
      });
</script>
                        
    </head>
      <body>
      <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99026436-1', 'auto');
  ga('send', 'pageview');
  setTimeout("ga('send', 'event', '15 seconds', 'read')",15000);
  </script>

    <?php $timezone  = +2;?>

        <div id="wrapper_main">
            <div id="header">
              
                <!-- <a href="./" title="Unipost-Express">Unipost-Express</a> -->
                <a href="./" class="logo"><img src="https://www.unipost.md/templates/rew/images/logo.png"></a>
              
              <div id="header_right">

              <div class="calc"><a href="./?do=calc"><?php echo JText::_('MAIN_HEADER_CALC_TITLE'); ?></a></div>
              <div class="do_req"><a href="./?do=command"><?php echo JText::_('MAIN_HEADER_DO_COMMAND'); ?></a></div>
              <!--<div class="do_req forw"><a href="./mail-frowarding">Mail Forwarding</a></div>-->
                                                        
              <div class="log_in"><jdoc:include type="modules" name="login_top" style="none"/></div>
              <div class="time_md"><? echo $time_md; ?></div>
              <div class="time_ny"><? echo $time_ny; ?></div>
              <div class="time_mw">Moscow: <?php echo gmdate("H:i:s", time() + 3600*($timezone+date("I"))); ?> </div>
              <div class="time_cr"><? echo $time_cr; ?></div>
              <div class="time_tk"><? echo $time_tk; ?></div>
              <div class="contacts_top"><?php echo JText::_('MAIN_HEADER_PHONE'); ?></div>
              <div class="contacts_button"><a href="./?do=call_missed"><?php echo JText::_('MAIN_HEADER_MISSED_CALL'); ?></a></div>
              </div>
            </div>
          <div id="menu_line"></div>
            <div id="wrapper_menu">
              <div class="menu_main">
                <jdoc:include type="modules" name="menu_main" style="none"/>
              </div>
            </div>
          <div id="menu_line"></div>      
            <div id="wrapper">
              <div class="inner_padding">
                  <jdoc:include type="modules" name="lang_changer" style="none"/>

  

                  <jdoc:include type="component" />
              <?php
                switch($current_action) {
                    case 'calc':
                        include_once('exec/calc.php');
                        $curent_used = true;
                      break;
                    case 'command':
                        include_once('exec/req.php');
                        $curent_used = true;
                      break;
                    case 'call_missed':
                        include_once('exec/missed_call.php');
                        $curent_used = true;
                      break;
                    case 'track_package_guest':
                        include_once('exec/track_main.php');
                        $curent_used = true;
                      break;
                    case 'reg_shop':
                        include_once('forms/form_shop.php');
                        $curent_used = true;
                      break;
                    case 'reg_sec':
                        include_once('forms/form_sec.php');
                        $curent_used = true;
                      break;
                    case 'slider_page1':
                        include_once('exec/slider_page1.php');
                        $curent_used = true;
                      break;
                    case 'slider_page2':
                        include_once('exec/slider_page2.php');
                        $curent_used = true;
                      break;
                    case 'slider_page3':
                        include_once('exec/slider_page3.php');
                        $curent_used = true;
                      break;
                    case 'slider_page4':
                        include_once('exec/slider_page4.php');
                        $curent_used = true;
                      break;
                    case 'slider_page5':
                        include_once('exec/slider_page5.php');
                        $curent_used = true;
                      break;
                    case 'slider_page6':
                        include_once('exec/slider_page6.php');
                        $curent_used = true;
                      break;
                    default:
                      $curent_used = false;
                      break;
                }
                if (!$curent_used) {
                      if ($menu->getActive() == $menu->getDefault()) {
                        require_once "./pages/main.php";
                      } elseif (($menu->getActive()->id == 103)) {
                      ?>
                      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
                      <?php
                        //require_once "./pages/about.php";
                      } elseif (($menu->getActive()->id == 104)) {
                        require_once "./pages/services.php";
                      } elseif (($menu->getActive()->id == 105)) {
                        require_once "./pages/info.php";
                      } elseif (($menu->getActive()->id == 106)) {
                        require_once "./pages/prices.php";
                      } elseif (($menu->getActive()->id == 107)) {
                        require_once "./pages/adv_services.php";
                      } elseif (($menu->getActive()->id == 135)) {
                        require_once "./pages/mail.php";
                      } elseif (($menu->getActive()->id == 108)) {
                      ?>
                      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
                      <?php
                        require_once "./pages/contacts.php";
                      }

                } ?>
              </div>
            </div>
        </div>
        <p id="back-top"><a href="#top"><span></span></a></p>
        <script>
      /*  $(document).ready(function(){


          // fade in #back-top
          $(function () {
            $(window).scroll(function () {
              if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
              } else {
                $('#back-top').fadeOut();
              }
            });

            // scroll body to 0px on click
            $('#back-top a').click(function () {
              $('body,html').animate({
                scrollTop: 0
              }, 800);
              return false;
            });
          });

        });*/
        </script>
        <div id="footer_line"></div>      
        <div id="footer">
            <div id="wrapper_footer">
              <div class="footer_row">
                <div class="copy_left">"© 2002 —<script type="text/javascript">document.write(new Date().getFullYear());</script> Unipost - Expres S.R.L"<br>
                <?php echo JText::_('MAIN_FOOTER_PHONE'); ?><br>
                <?php echo JText::_('MAIN_FOOTER_ADDRESS'); ?><br><br>
<?php echo JText::_('MAIN_FOOTER_COPYRIGHTS_L'); ?></div>
                <div class="copy_center"><?php echo JText::_('MAIN_FOOTER_COPYRIGHTS_C'); ?><br/>
                            <noindex><ul class="social">
                              <li class="fb"><a href="https://www.facebook.com/unipost.md/?ref=ts&fref=ts" title="Facebook" rel="nofollow" target="_blank">Facebook</a></li>
                              <li class="tw"><a href="#" title="Twitter" rel="nofollow">Twitter</a></li>
                              <li class="yt"><a href="#" title="YouTube" rel="nofollow">YouTube</a></li>
                            </ul></noindex>
                </div>
                <div class="copy_right"><?php echo JText::_('MAIN_FOOTER_COPYRIGHTS_R'); ?></div>
                <div id="counters"> 
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=44585797&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/44585797/3_0_236EC2FF_034EA2FF_1_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="44585797" data-lang="ru" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44585797 = new Ya.Metrika({
                    id:44585797,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44585797" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "2917120", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "topmailru-code");
</script><noscript><div>
<img src="//top-fwz1.mail.ru/counter?id=2917120;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
</div></noscript>
<!-- //Rating@Mail.ru counter -->

<!-- Top100 (Kraken) Counter -->
<script>
    (function (w, d, c) {
    (w[c] = w[c] || []).push(function() {
        var options = {
            project: 4499759
        };
        try {
            w.top100Counter = new top100(options);
        } catch(e) { }
    });
    var n = d.getElementsByTagName("script")[0],
    s = d.createElement("script"),
    f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src =
    (d.location.protocol == "https:" ? "https:" : "http:") +
    "//st.top100.ru/top100/top100.js";

    if (w.opera == "[object Opera]") {
    d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(window, document, "_top100q");
</script>

<noscript>
  <img src="//counter.rambler.ru/top100.cnt?pid=4499759" alt="Топ-100" />
</noscript>
<!-- END Top100 (Kraken) Counter -->
<!--LiveInternet counter--><script type="text/javascript">
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t44.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
</script><!--/LiveInternet-->

<!-- HotLog -->
<span id="hotlog_counter"></span>
<span id="hotlog_dyn"></span>
<script type="text/javascript"> var hot_s = document.createElement('script');
hot_s.type = 'text/javascript'; hot_s.async = true;
hot_s.src = 'http://js.hotlog.ru/dcounter/2553134.js';
hot_d = document.getElementById('hotlog_dyn');
hot_d.appendChild(hot_s);
</script>
<noscript>
<a href="http://click.hotlog.ru/?2553134" target="_blank">
<img src="http://hit20.hotlog.ru/cgi-bin/hotlog/count?s=2553134&im=71" border="0" 
title="HotLog" alt="HotLog"></a>
</noscript>
<!-- /HotLog -->

<!-- GoStats JavaScript Based Code -->
<script type="text/javascript" src="http://gostats.ru/js/counter.js"></script>
<script type="text/javascript">_gos='monster.gostats.ru';_goa=493772;
_got=5;_goi=1;_gol='рейтинг сайтов';_GoStatsRun();</script>
<noscript><a target="_blank" title="рейтинг сайтов" 
href="http://gostats.ru"><img alt="рейтинг сайтов" 
src="http://monster.gostats.ru/bin/count/a_493772/t_5/i_1/counter.png" 
style="border-width:0" /></a></noscript>
<!-- End GoStats JavaScript Based Code -->

<!--Openstat-->
<span id="openstat1"></span>
<script type="text/javascript">
var openstat = { counter: 1, next: openstat };
(function(d, t, p) {
var j = d.createElement(t); j.async = true; j.type = "text/javascript";
j.src = ("https:" == p ? "https:" : "http:") + "//openstat.net/cnt.js";
var s = d.getElementsByTagName(t)[0]; s.parentNode.insertBefore(j, s);
})(document, "script", document.location.protocol);
</script>
<script src="<?php echo JURI::base(); ?>templates/rew/js/anim_image.js"></script>
<!--/Openstat-->
                </div>

              </div>
            </div>
        </div>


                <jdoc:include type="modules" name="online-consult" style="xhtml"/>

        <jdoc:include type="modules" name="debug" />
        </body>
</html>