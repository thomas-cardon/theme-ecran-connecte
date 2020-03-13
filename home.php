<?php

get_header();

$current_user = wp_get_current_user();

$id = "none";

if (! wp_is_mobile()) {
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
echo '
<script src="/wp-content/themes/theme-ecran-connecte/assets/js/refresh.js"></script>
<main id="content-' . $id . '">
    <section>';
if (have_posts()) {
	while (have_posts()) : the_post();
        echo '
            <article class="post" id="post-'.the_ID().'">
                <div class="post_content">'. the_content().'</div>
            </article>';
	endwhile;
}
echo '
    </section>
</main>';

if (wp_is_mobile()) {
	get_sidebar('left');
}

get_sidebar();

if (get_theme_mod('ecran_connecte_footer_weather', 'right') == 'hide') {
	include_once 'template-parts/footer/footer_alert.php';
} else if (get_theme_mod('ecran_connecte_footer_weather', 'right') == 'right') {
	include_once 'template-parts/footer/footer_front.php';
} else if (get_theme_mod('ecran_connecte_footer_weather', 'right') == 'left') {
	include_once 'template-parts/footer/footer_left.php';
}

echo '
    </body>
</html>';