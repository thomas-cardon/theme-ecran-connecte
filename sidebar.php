<?php
$current_user = wp_get_current_user();
if (is_user_logged_in() && !in_array("technicien", $current_user->roles)) { ?>
    <?php if( get_theme_mod( 'sidebar_right_display', 'show' ) == 'show' ) : ?>
        <div class="sidebar" id="sidebar-right">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Colonne Droite')) :
                the_widget('WidgetInformation');
            endif; ?>
        </div>
    <?php endif ?>

<?php } ?>