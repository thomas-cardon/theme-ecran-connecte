<?php

$current_user = wp_get_current_user();
if (is_user_logged_in() && !in_array("technicien", $current_user->roles)) {
    if( get_theme_mod( 'sidebar_right_display', 'show' ) == 'show' ) {
	    echo '<div class="sidebar" id="sidebar-right">';
            if (! function_exists('dynamic_sidebar') || ! dynamic_sidebar('Colonne Droite')) {
		    the_widget('WidgetInformation');
	    }
        echo '</div>';
    }
}