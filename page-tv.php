<?php get_header('tv'); ?>
    <!-- MAIN -->
    <main>
      <div class="container-fluid px-0" style="background-color: #F2EFF2 !important;">
        <div class="row flex-nowrap">
            <section class="col px-5 py-3">
              <?php the_content(); ?>
              <?php the_widget('WidgetAlert'); ?>
            </section>
            <?php get_sidebar('tv'); ?>
        </div>
      </div>
    </main>
<?php get_footer('tv'); ?>
