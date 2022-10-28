<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION

//load bootstrap
function load_bootstrap()
{
    wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css");
    wp_enqueue_script("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js", null, null, true);
}
add_action("wp_enqueue_scripts", "load_bootstrap");


//function that prints type of device on every product page (using hooks)
function print_device_type() {
    ?>
    <span class="device_wrapper">Device: <span class="device"><?php the_field("device") ?></span></span>
    <?php
}
add_action("woocommerce_product_meta_start", "print_device_type");


//delete title on the page and wordpress branding
function delete_site_branding()
{
    remove_action('storefront_header', 'storefront_site_branding', 20);
}
add_action('init', 'delete_site_branding');

//delete storefront searchfield located in header
function delete_header_searchfield()
{
    remove_action('storefront_header', 'storefront_product_search', 40);
}
add_action('init', 'delete_header_searchfield');

//banner for free shipping offer
function free_shipping_banner()
{
    ?>
    <div class="free_shipping_banner">
        <p>Free shipping on all orders over 680€</p>
    </div>
    <?php
}
add_action("storefront_before_header", "free_shipping_banner");

//create hero banner on the front page
/* function create_hero_banner(){
    ?>
    <div class="hero_banner">
        
    </div>
    <?php
}
add_action("storefront_before_content", "create_hero_banner"); */

function add_image_storefront_primary_navigation()
{
    echo '<a href="' . get_home_url() . '"> <div class="logo"> <img src="' . get_stylesheet_directory_uri() . '/images/izone_logo.png"> </div> </a>';
}
add_action('storefront_header', 'add_image_storefront_primary_navigation', 50);
