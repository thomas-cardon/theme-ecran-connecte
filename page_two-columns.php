<?php /* Template Name: Colonne droite */ ?>
<?php get_header(); ?>
        <main id="content-twocolumns">
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