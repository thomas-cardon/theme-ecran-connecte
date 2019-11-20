<?php get_header();
$current_user = wp_get_current_user(); ?>
<?php

$id = "content-twocolumns";
$model = new AdminModel();
$results = $model->getModif('column');
$col = $results[0]->content;
if ($col == 'left' || $col == 'two') {
    if (!wp_is_mobile()) {
        get_sidebar('left');
    }
}

$id = $col;

if (in_array("technicien", $current_user->roles)) {
    $id = "none";
} else if (in_array("technicien", $current_user->roles)) {
    $id = "-tv";
}
echo '<main id="content-' . $id . '">
    <section>';
if (defined('TV_PLUG_PATH')) {
    displaySchedule();
}
echo '
</section>
</main>';
if ($col == 'left' || $col == 'two') {
    if (wp_is_mobile()) {
        get_sidebar('left');
    }
}

if($col == 'right' || $col == 'two') {
    get_sidebar();
}

include_once 'template-parts/footer/footer_front.php'; ?>
</body>
</html>