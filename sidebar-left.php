<?php if (is_user_logged_in()) { ?>
    <div class="sidebar" id="sidebar-left">
        <ul>
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Colonne Gauche')) :
                $admin = new AdminModel();
            $results = $admin->getModif('column');
            if($results[0]->content == 'left') {
                the_widget('WidgetInformation');
            }

            endif; ?>
        </ul>
    </div>
<?php } ?>