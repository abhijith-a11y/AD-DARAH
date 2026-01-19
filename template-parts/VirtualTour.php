<?php
/**
 * Virtual Tour Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/VirtualTour');
 */

// Single panorama image - using free online 360-degree image for demonstration
// Replace with your actual 360-degree image when available
$panorama_image = 'https://raw.githubusercontent.com/google/marzipano/master/demos/equirectangular/equirectangular.jpg';
?>

<section class="virtual-tour-container">
    <div id="pano"></div>

    <div id="sceneList">
        <ul class="scenes"></ul>
    </div>

    <div id="titleBar">
        <h1 class="sceneName"></h1>
    </div>

    <a href="javascript:void(0)" id="autorotateToggle">
        <img class="icon off" src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/play.png'); ?>">
        <img class="icon on" src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/pause.png'); ?>">
    </a>

    <a href="javascript:void(0)" id="fullscreenToggle">
        <img class="icon off"
            src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/fullscreen.png'); ?>">
        <img class="icon on"
            src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/windowed.png'); ?>">
    </a>

    <a href="javascript:void(0)" id="sceneListToggle">
        <img class="icon off"
            src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/expand.png'); ?>">
        <img class="icon on"
            src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/collapse.png'); ?>">
    </a>

    <a href="javascript:void(0)" id="viewUp" class="viewControlButton viewControlButton-1">
        <img class="icon" src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/up.png'); ?>">
    </a>
    <a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
        <img class="icon" src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/down.png'); ?>">
    </a>
    <a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">
        <img class="icon" src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/left.png'); ?>">
    </a>
    <a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
        <img class="icon" src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/right.png'); ?>">
    </a>
    <a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
        <img class="icon" src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/plus.png'); ?>">
    </a>
    <a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
        <img class="icon" src="<?php echo esc_url(get_template_directory_uri() . '/virtual-tour/img/minus.png'); ?>">
    </a>
</section>