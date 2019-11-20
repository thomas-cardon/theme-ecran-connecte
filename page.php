<?php get_header();
$current_user = wp_get_current_user(); ?>
<?php

$id = "none";

if(is_front_page()) {
    $model = new AdminModel();
    $results = $model->getModif('column');
    $col = $results[0]->content;
    if ($col == 'left' || $col == 'two') {
        if (!wp_is_mobile()) {
            get_sidebar('left');
        }
    }
    $id = $col;
}

if (in_array("technicien", $current_user->roles)) {
    $id = "none";
} else if (in_array("technicien", $current_user->roles)) {
    $id = "-tv";
}
echo '<main id="content-' . $id . '">
    <section>';

//$content = file_get_contents("https://www.nuitdelinfo.com/inscription/sites/55");
//$res = explode ('Partcipants', $content);
//echo $res[0];

?>
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
if ($col == 'left' || $col == 'two') {
    if (wp_is_mobile()) {
        get_sidebar('left');
    }
}

if(is_front_page()) {
    if ($col == 'right' || $col == 'two') {
        get_sidebar();
    }
    include_once 'template-parts/footer/footer_front.php';
} else {
    get_footer();
} ?>

</body>
</html>