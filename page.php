<?php get_header();
$current_user = wp_get_current_user();

$id = "none";

if (in_array("television", $current_user->roles)) {
    $id = "-tv";
}
echo '
<!-- MAIN -->
<main id="content-' . $id . '">
    <section>';

if (have_posts()) {
    while (have_posts()) : the_post(); ?>
        <article class="post" id="post-<?php the_ID(); ?>">
            <div class="post_content"><?php the_content(); ?></div>
        </article>
    <?php endwhile;
}
echo '
    </section>
</main>';

get_footer();

echo '
    </body>
</html>';
