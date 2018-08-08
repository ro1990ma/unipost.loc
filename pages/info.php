<?php
defined('_JEXEC') or die;
?>
			<script type="text/javascript" src="templates/rew/js/jquery.js"></script>
			<script>
				function set_active(art){
					$('p#inf').removeClass('active');
					$('#'+art).parent().addClass('active');
					var top = $('#'+art).parent().offset().top-300;
					$('body,html').delay(500);
					$('body,html').animate({'scrollTop': top}, 300);
				};
				$(document).ready(function() {
					var url = location.hash.slice(1);
					var hash = url.substring(url.indexOf("#") + 1);
					set_active(url);
				});
			</script>

	