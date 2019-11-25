<?php get_header();
$current_user = wp_get_current_user(); ?>
<?php

$id = "none";
if (!wp_is_mobile()) {
    get_sidebar('left');
}

if (get_theme_mod('sidebar_right_display', 'show') == 'show' && get_theme_mod('sidebar_left_display', 'hide') == 'show') {
    $id = "two";
} else if (get_theme_mod('sidebar_right_display', 'show') == 'show' || get_theme_mod('sidebar_left_display', 'show') == 'show') {
    $id = "right";
}

if (in_array("technicien", $current_user->roles)) {
    $id = "none";
} else if (in_array("technicien", $current_user->roles)) {
    $id = "-tv";
}
echo '<main id="content-' . $id . '">
    <section>'; ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article class="post" id="post-<?php the_ID(); ?>">
            <!--    <h2><a href="<?php //the_permalink(); ?>" title="<?php //the_title(); ?>"><?php //the_title(); ?></a></h2> -->
            <div class="post_content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
<?php endif;
echo '
</section>
</main>';
if (wp_is_mobile()) {
    get_sidebar('left');
}

get_sidebar();

if(get_theme_mod('ecran_connecte_footer_weather', 'right') == 'hide') {
	include_once 'template-parts/footer/footer_alert.php';
} else if (get_theme_mod('ecran_connecte_footer_weather', 'right') == 'right') {
	include_once 'template-parts/footer/footer_front.php';
} else if (get_theme_mod('ecran_connecte_footer_weather', 'right') == 'left') {
	include_once 'template-parts/footer/footer_left.php';
} ?>

</body>
</html>