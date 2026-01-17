<?php
/**
 * The Weddings & Social Services Detail template file
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
        set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/wedding_banner.png');
        get_template_part('template-parts/Banner');
        ?>

        <div class="pb_100 pt_100">
            <?php
            // Three Image Text Sections
            $three_image_text_section_1 = array(
                'image' => get_template_directory_uri() . '/assets/images/img_01.png',
                'items' => array(
                    array(
                        'heading' => '300+ Weddings Curated',
                        'description' => 'From intimate ceremonies to grand celebrations, planned.'
                    ),
                    array(
                        'heading' => '20+ Wedding Styles Delivered',
                        'description' => 'Traditional, modern, and themed weddings tailored to vision.'
                    ),
                    array(
                        'heading' => '10+ Years of Wedding Expertise',
                        'description' => 'A decade of creating timeless and memorable experiences.'
                    ),
                )
            );

            $three_image_text_section_2 = array(
                'image' => get_template_directory_uri() . '/assets/images/img_02.png',
                'paragraphs' => array(
                    'At AD-DARAH, we understand that every corporate event is an opportunity to create impact. Our versatile halls, premium amenities, and professional support ensure your event leaves a lasting impression.',
                    'AD-DARAH is Riyadh\'s premier destination for iconic events, built on a strong Saudi heritage while embracing modern innovation. From corporate summits to royal weddings, our venue represents elegance, excellence, and cultural pride.'
                )
            );

            $three_image_text_section_3 = array(
                'image' => get_template_directory_uri() . '/assets/images/img_03.png',
                'paragraphs' => array(
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor. Vivamus diam libero, sollicitudin eu nisl vitae, gravida dapibus orci.'
                )
            );

            include locate_template('template-parts/ThreeImageText.php');
            ?>

        </div>

    </div>
</main><!-- #main -->

<?php
get_footer();
?>