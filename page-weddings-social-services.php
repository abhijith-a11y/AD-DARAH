<?php
/**
 * The Weddings & Social Services template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="home-page">
        <?php
        // Banner Section
        set_query_var('banner_title', 'Weddings & Social Services');
        set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/about-banner.png');
        get_template_part('template-parts/Banner');
        ?>

        <?php
        // Page content can be added here
        // You can add more sections similar to page-about.php
        // For example: ImageTextSection, testimonials, etc.
        ?>
    </div>
</main><!-- #main -->

<?php
get_footer();

