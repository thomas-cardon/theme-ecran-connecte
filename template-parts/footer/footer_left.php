<?php
?>
<div id="footer_left">
    <?php if (is_user_logged_in()) { ?>
	    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer gauche')) :
		    the_widget('WidgetWeather');
	    endif; ?>
    <?php } ?>
</div>
<div id="footer_right">
    <?php if (is_user_logged_in()) { ?>
	    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer droite')) :
    if(get_theme_mod('ecran_connecte_footer_alert', 'show') == 'show') {
	    the_widget('WidgetAlert');
    }

	    endif; ?>
    <?php } ?>
</div>

<div id="footer">
    <?php if (is_user_logged_in()) { ?>
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) : endif; ?>
    <?php } ?>
    <?php wp_footer(); ?>
</div>