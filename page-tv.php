<?php get_header('tv'); ?>
    <!-- MAIN -->
    <main>
      <div class="container-fluid px-0" style="background-color: #F2EFF2 !important;">
        <div class="row flex-nowrap">
            <section class="col py-3">
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
            <?php get_sidebar('tv'); ?>
        </div>
      </div>
    </main>
<?php get_footer('tv'); ?>
