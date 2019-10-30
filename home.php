<?php get_header();
        $current_user = wp_get_current_user(); ?>
        <main <?php if(in_array("technicien", $current_user->roles)){  ?> id="content"> <?php } else { ?> id="content-twocolumns">
                <?php } ?>
            <section>
                <?php if(defined('TV_PLUG_PATH')) {
                    displaySchedule();
                }
                 ?>
            </section>
        </main>
        <?php get_sidebar(); ?>
        <?php include_once 'template-parts/footer/footer_front.php'; ?>
    </body>
</html>