<?php

use Controllers\InformationController;
use Models\Information;

$current_user = wp_get_current_user();

$id = "none";

if ( get_theme_mod( 'sidebar_right_display', 'show' ) == 'show' && get_theme_mod( 'sidebar_left_display', 'hide' ) == 'show' ) {
	$id = "two";
} else if ( get_theme_mod( 'sidebar_right_display', 'show' ) == 'show' || get_theme_mod( 'sidebar_left_display', 'show' ) == 'show' ) {
	$id = "right";
}

if ( in_array( "technicien", $current_user->roles ) ) {
	$id = "none";
} else if ( in_array( "technicien", $current_user->roles ) ) {
	$id = "-tv";
}

if (defined( "TV_PLUG_PATH")) {
	$model  = new Information();
	$result = $model->getListInformationEvent();
	if ($result && in_array( "television", $current_user->roles )) {

	    $controller = new InformationController();
		echo '
        <!DOCTYPE html>
        <html lang="fr">
        <!-- HEAD -->
        <head>
            <title>Ecran connecté</title>
            <meta charset="utf-8">
            <script src="/wp-content/plugins/plugin-ecran-connecte/public/js/scroll.js"></script>';
            wp_head();
            echo '
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>'; ?>
        <!-- BODY -->
        <body id="event" <?php body_class(); ?>>
        <?php
        echo '
        <!-- MAIN -->
            <main id="content-event">
                <section>';
	    $controller->displayEvent();
		echo '
            </section>
        </main>
        <!-- FOOTER -->
        <footer>';
		wp_footer();
		echo '</footer>';
	} else {
		displayHome($id);
	}
} else {
	displayHome($id);
} ?>

</body>
</html>


<?php

function displayHome($id) {
	get_header();
	if ( ! wp_is_mobile() ) {
		get_sidebar( 'left' );
	}
	echo '
	<!-- MAIN -->
    <main id="content-' . $id . '">
        <section>';
	if ( have_posts() ) {
		while ( have_posts() ) : the_post(); ?>
            <article class="post" id="post-<?php the_ID(); ?>">
                <!--    <h2><a href="<?php //the_permalink(); ?>" title="<?php //the_title(); ?>"><?php //the_title(); ?></a></h2> -->
                <div class="post_content"><?php the_content(); ?></div>
            </article>
		<?php endwhile;
	}
	echo '
        </section>
    </main>';
	if ( wp_is_mobile() ) {
		get_sidebar( 'left' );
	}
	get_sidebar();

	if ( get_theme_mod( 'ecran_connecte_footer_weather', 'right' ) == 'hide' ) {
		include_once 'template-parts/footer/footer_alert.php';
	} else if ( get_theme_mod( 'ecran_connecte_footer_weather', 'right' ) == 'right' ) {
		include_once 'template-parts/footer/footer_front.php';
	} else if ( get_theme_mod( 'ecran_connecte_footer_weather', 'right' ) == 'left' ) {
		include_once 'template-parts/footer/footer_left.php';
	} else {
		get_footer();
    }
}