<?php $current_user = wp_get_current_user(); ?>
    </div>
    <footer>
<?php if (is_user_logged_in() && !in_array("technicien", $current_user->roles)) { ?>
    <div id="footer-left">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer gauche')) :
	        if(get_theme_mod('ecran_connecte_footer_alert', 'show') == 'show') {
		        the_widget('WidgetAlert');
	        }
        endif; ?>
    </div>
    <div id="footer-right">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer droite')) :
            the_widget('WidgetWeather');
        endif; ?>
    </div>
    </footer>
    <footer class="footer_wp">
        <?php wp_footer(); ?>
    </footer>

<?php } ?>