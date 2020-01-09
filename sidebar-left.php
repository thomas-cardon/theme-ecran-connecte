<?php if (is_user_logged_in()) { ?>
    <?php if (get_theme_mod('sidebar_left_display', 'hide') == 'show') : ?>
        <div class="sidebar" id="sidebar-left">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Colonne Gauche')) :
                if (get_theme_mod('sidebar_right_display', 'show') == 'hide') {
                    the_widget('WidgetInformation');
                }
            endif; ?>
        </div>
    <?php endif; ?>
<?php } ?>