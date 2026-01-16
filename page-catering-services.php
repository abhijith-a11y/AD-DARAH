<?php
/**
 * The Catering Services template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="home-page">
        <?php
        // Banner Section
        set_query_var('banner_title', 'Catering Services');
        set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/catering_banner.png');
        get_template_part('template-parts/Banner');
        ?>

        <?php
        // Image Text Section
        $image_text_image = get_template_directory_uri() . '/assets/images/catering_01.png';
        $image_text_headline_1 = 'Exceptional Culinary Experiences by';
        $image_text_headline_2 = 'AD-DARAH';
        $image_text_paragraphs = array(
            "From intimate gatherings to grand banquets, our catering team delivers world-class dining that celebrates Saudi flavors and global excellence.",
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor."
        );
        $image_text_button_text = 'Explore Catering Services';
        $image_text_button_link = '#';

        include locate_template('template-parts/ImageTextSection.php');
        ?>

    </div>
</main><!-- #main -->

<?php
get_footer();
?>

