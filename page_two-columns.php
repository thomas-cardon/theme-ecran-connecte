<?php /* Template Name: Colonne droite */ ?>
<?php get_header();
$id = "content-twocolumns";
if(in_array("technicien", $current_user->roles)) {
$id = "content";
} else if(in_array("television", $current_user->roles)){
$id = "content_tv";
}
echo '<main id="'.$id.'">'; ?>
            <section>
                <?php if(have_posts()) :
                    while(have_posts()) : the_post(); ?>
                        <article class= "post" id="post-<?php the_ID(); ?>">
                            <div class= "post_content"><?php the_content(); ?></div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </section>
        </main>
        <?php get_sidebar(); ?>
        <?php include_once 'template-parts/footer/footer_front.php'; ?>
    </body>
</html>