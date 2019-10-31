        <?php get_header(); ?>
        <main id="content">
            <section>
                <?php if(have_posts()) : ?>
                    <?php while(have_posts()) : the_post(); ?>
                        <article class= "post" id="post-<?php the_ID(); ?>">
                            <h1><?php the_title(); ?></h1>
                            <div class= "post_content"><?php the_content(); ?></div>
                        </article>
                    <?php endwhile; ?>
                    <div class="comments-template"> <?php comments_template(); ?> </div>
                    <?php previous_post_link() ?> <?php next_post_link() ?>
                <?php else : ?> <p>Désolé, aucun article ne correspond à vos critères.</p>
                <?php endif; ?>
            </section>
        </main>
        <?php get_footer(); ?>
    </body>
</html>