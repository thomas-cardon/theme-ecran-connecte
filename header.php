<?php

use Controllers\TelevisionController;

$current_user = wp_get_current_user();

echo '
<!DOCTYPE html>
<html lang="fr">
<!-- HEAD -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecran connecté</title>
    <!-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script> -->'.
    wp_head();
    if (in_array("television", $current_user->roles)) {
	    if(get_theme_mod('ecran_connecte_shecule_scroll', 'vert') == 'vert') {
		    echo '<script src="/wp-content/plugins/plugin-ecran-connecte/public/js/scroll.js"></script>';
	    }
        echo '<script src="/wp-content/themes/theme-ecran-connecte/assets/js/refresh.js"></script>';
    }
echo '</head><!-- BODY -->';

if ( in_array( 'television', $current_user->roles ) ) {
    echo '<body id="tv_body" '; echo body_class(). ' >';
} else {
	echo '<body '; echo body_class(). ' >';
}

wp_body_open();

if (class_exists(TelevisionController::class)) {
	$current_user = wp_get_current_user();
	if (in_array("television", $current_user->roles)) {
	    echo '
        <!-- HEADER -->
        <header class="logo-tv">
            <a href="'.wp_logout_url(home_url()).'" rel="home">
                <img src="'; echo header_image().'" alt="Logo du site"/>
            </a>
        </header>';
	} else {
		echo '
		<header>
			<a href="javascript:void(0);" class="icon" onclick="switchMenu()">&#9776;</a>
			<a href="'.esc_url(home_url()).'" rel="home">
	            <img class="logo" src="'; echo header_image().'" alt="Logo du site"/>
	        </a>
        </header>';
		include_once 'template-parts/navigation/menu.php';
	}
}
echo '<div class="flex-content">';

