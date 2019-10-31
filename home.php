<?php get_header();
        $current_user = wp_get_current_user(); ?>
<?php //if (! wp_is_mobile() ) {
//    get_sidebar('left');
//}
$id = "content-twocolumns";

if(in_array("technicien", $current_user->roles)) {
    $id = "content";
} else if(in_array("technicien", $current_user->roles)){
    $id = "content_tv";
} ?>
        <main id="<?php $id ?>">
            <section>
                <?php if(defined('TV_PLUG_PATH')) {
                    displaySchedule();
                }
                 ?>
            </section>
        </main>
        <?php
//        if (wp_is_mobile()) {
//            get_sidebar('left');
//        }
        get_sidebar(); ?>
        <?php include_once 'template-parts/footer/footer_front.php'; ?>
    </body>
</html>