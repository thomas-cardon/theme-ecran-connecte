<?php

include_once 'inc/customizer/custom_colors.php';
include_once 'inc/customizer/custom_sidebar.php';
include_once 'inc/customizer/custom_schedule.php';
include_once 'inc/customizer/custom_footer.php';

add_filter('auto_update_plugin', '__return_true');
add_filter('auto_update_theme', '__return_true');


/**
 * Used by hook: 'customize_preview_init'
 * @see add_action('customize_preview_init',$func)
 */
function mytheme_customizer_live_preview()
{
    wp_enqueue_script(
        'mytheme-themecustomizer',            //Give the script an ID
        get_template_directory_uri() . '/assets/js/theme-customizer.js',//Point to file
        array('jquery', 'customize-preview'),    //Define dependencies
        '',                        //Define a version (optional)
        true                        //Put script in footer?
    );
}

add_action('customize_preview_init', 'mytheme_customizer_live_preview');

/**
 * Charge les fichiers CSS et Javascript
 */
function add_theme_scripts()
{
    wp_enqueue_style('bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', false, '', 'all');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', false, '1.0', 'all');
    wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/css/header.css', false, '1.0', 'all');
    wp_enqueue_style('content-style', get_template_directory_uri() . '/assets/css/content.css', false, '1.0', 'all');
    wp_enqueue_style('sidebar-style', get_template_directory_uri() . '/assets/css/sidebar.css', false, '1.0', 'all');
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/css/footer.css', false, '1.0', 'all');
    wp_enqueue_script( 'theme-jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array (), '', false);
    wp_enqueue_script( 'theme-jqueryUI', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array ( 'jquery' ), '', false);
    wp_enqueue_script('theme-menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '', false);
    wp_enqueue_script('theme-custom', get_template_directory_uri() . '/assets/js/customizer.js', array('jquery'), '', true);
    wp_enqueue_script('theme-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '', true);
    wp_enqueue_script('theme-bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '', true);
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');

/**
 * CSS pour la partie admin
 */
function admin_css()
{

    $admin_handle = 'admin_css';
    $admin_stylesheet = get_template_directory_uri() . '/assets/css/admin.css';

    wp_enqueue_style($admin_handle, $admin_stylesheet);
}

add_action('admin_print_styles', 'admin_css', 11);

/**
 * Change l'image du logo
 */
function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri()."/assets/images/logo.png" ?>);
            height: 65px;
            width: 320px;
            background-size: 120px 120px;
            background-repeat: no-repeat;
            padding-bottom: 60px;
        }
    </style>
<?php }

add_action('login_enqueue_scripts', 'my_login_logo');

/**
 * Ajoute une nouvelle feuille de style pour la page de connexion
 */
function my_login_stylesheet()
{
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/assets/css/login.css');
}

add_action('login_enqueue_scripts', 'my_login_stylesheet');

//Met la bonne heure
global $wpdb;
date_default_timezone_set('Europe/Paris');
$wpdb->time_zone = 'Europe/Paris';

//error_reporting(E_ERROR);

/**
 * Enlève la barre admin de Wordpress
 */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

/**
 * Seul les admins peuvent aller sur wp-admin
 */
add_action('init', 'wpm_admin_redirection');
function wpm_admin_redirection()
{
    //Si on essaye d'accéder à L'administration Sans avoir le rôle administrateur
    if (is_admin() && !current_user_can('administrator')) {
        // On redirige vers la page d'accueil
        wp_redirect(home_url());
        exit;
    }
}

/**
 * Change l'url du logo
 * @return mixed
 */
function my_login_logo_url()
{
    return $_SERVER['HTTP_HOST'];
}

add_filter('login_headerurl', 'my_login_logo_url');

/**
 * Change le titre de du logo
 * @return string
 */
function my_login_logo_url_title()
{
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'my_login_logo_url_title');

$args = array(
    'width' => 345,
    'height' => 100,
    'default-image' => get_template_directory_uri() . 'assets/images/header.png',
    'uploads' => true,
);
add_theme_support('custom-header', $args);

$args = array(
    'default-color' => '#ffffff',
    'default-image' => '%1$s/images/background.jpg',
);
add_theme_support('custom-background', $args);

$args = array(
    'default-color' => '#ffffff',
    'default-image' => '%1$s/images/background.jpg',
);
add_theme_support('custom-header-background', $args);

// Les différentes sidebars
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Header',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer gauche',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer droite',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Colonne Gauche',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Colonne Droite',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}