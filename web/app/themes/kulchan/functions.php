<?php
add_action('wp_enqueue_scripts', 'theme_styles_script');

function theme_styles_script(){

    wp_register_style('plugin_css', get_stylesheet_directory_uri() . '/css/plugins.css', array(), '1.0', 'all');
    wp_enqueue_style('plugin_css'); // Enqueue it!
    wp_register_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css', array(), '1.0', 'all');
    wp_enqueue_style('font-awesome'); // Enqueue it!
    wp_register_style('owl_css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), '1.0', 'all');
    wp_enqueue_style('owl_css'); // Enqueue it!
    wp_register_style('style', get_stylesheet_directory_uri() . '/css/style.css', array(), '1.0', 'all');

    wp_enqueue_style('style'); // Enqueue it!

    if (!is_admin()) {
        wp_deregister_script('jquery'); // Deregister WordPress jQuery

        wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/vendor/jquery-3.2.0.min.js', array(), NULL, true); // Load Google CDN jQuery
        wp_enqueue_script('jquery'); // Enqueue it!
        wp_register_script('modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', array(), NULL, true); // Load Google CDN jQuery
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('magnific', get_stylesheet_directory_uri() . '/js/vendor/jquery.magnific-popup.min.js', array(), NULL, true); // Load Google CDN jQuery
        wp_enqueue_script('magnific'); // Enqueue it!
        wp_register_script('owljs', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(), NULL, true); // Load Google CDN jQuery
        wp_enqueue_script('owljs'); // Enqueue it!
        wp_register_script('pluginjs', get_stylesheet_directory_uri() . '/js/plugins.js', array(), NULL, true); // Load Google CDN jQuery
        wp_enqueue_script('pluginjs'); // Enqueue it!
        wp_register_script('main', get_stylesheet_directory_uri() . '/js/main.js', array(), NULL, true); // Load Google CDN jQuery

        $translation_array = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'themeurl' => get_stylesheet_directory_uri()
        );
        wp_localize_script('main', 'script_wp_vars', $translation_array);

        wp_enqueue_script('main'); // Enqueue it!



    }
}
add_action( 'wp_ajax_suscribe_handle', 'suscribe_handle' );
add_action( 'wp_ajax_nopriv_suscribe_handle', 'suscribe_handle' );

function suscribe_handle()
{
    global $wpdb;

    $email=$_POST['email'];


    $email_t=$email."\n";


    wp_mail("info@kulchan.com","kulchan subscribe Form",$email_t);
    echo "success";
    wp_die();
}
