<?php $current_user = wp_get_current_user(); ?>
</main>
<?php if(in_array("television", $current_user->roles)) { ?>
    <footer id="footer_tv">
<?php } else { ?>
    <footer id="footer_user">
<?php }?>
<?php if(is_user_logged_in() && ! in_array("technicien", $current_user->roles)) { ?>
        <div id="footer-left">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer gauche') ) : endif; ?>
        </div>
        <div id="footer-right">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer droite') ) : endif; ?>
        </div>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : endif; ?>
    <?php wp_footer(); ?>
    </footer>
<?php } ?>