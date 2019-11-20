<?php ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php wp_head(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/> <!-- leave this for stats -->
        <title><?php bloginfo('name') ?><?php if (is_404()) : ?> &raquo; <?php _e('Not Found') ?><?php elseif (is_home()) : ?> &raquo; <?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?></title>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>
        <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>"/>
        <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>"/>
        <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
        <link rel="manifest" href="/manifest.json"/>
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script src="/wp-content/themes/theme-ecran-connecte/assets/js/jquery-3.3.1.min.js"></script>
        <script src="/wp-content/themes/theme-ecran-connecte/assets/js/jquery-ui.min.js"></script>
        <script src="/wp-content/themes/theme-ecran-connecte/assets/js/refresh.js"></script>
        <?php wp_get_archives('type=monthly&format=link'); ?> <?php //comments_popup_script(); <?php wp_head(); ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
<?php if (class_exists(Television::class)) {
    $current_user = wp_get_current_user();
    if (in_array("television", $current_user->roles)) { ?>
        <a href="<?php echo wp_logout_url(home_url()); ?>" class="logo-tv" rel="home">
            <img src="<?php header_image(); ?>" alt="Logo du site"/>
        </a>
        </header>
    <?php } else { ?>
        <a href="javascript:void(0);" class="icon" onclick="switchMenu()">&#9776;</a>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" rel="home">
            <img src="<?php header_image(); ?>" alt="Logo du site"/>
        </a>
        </header>
        <?php include_once 'template-parts/navigation/menu.php'; ?>
    <?php }
} ?>
<div class="flex-row">
