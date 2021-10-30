<?php get_header(); ?>
    <!-- MAIN -->
    <main>
        <div style="background-color: var(--color-primary-900) !important;">
            <section class="content-area content-thin">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="article-full">
                        <header>
                            <!-- <h2><?php the_title(); ?></h2> -->
                        </header>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; else : ?>
                    <article>
                        <p>Sorry, no page was found!</p>
                    </article>
                <?php endif; ?>
            </section>
            <?php //get_sidebar(); ?>
        </div>
    </main>
<?php get_footer(); ?>
