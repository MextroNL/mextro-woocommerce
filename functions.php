<?php


//Header Image
$args = array(
    'flex-width'    => false,
    'width'         => 1920,
    'flex-height'    => false,
    'height'        => 617,
    'default-image' => get_template_directory_uri() . '/images/ahlogo.png',
);
add_theme_support( 'custom-header', $args );

//WooCommerce
//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_theme_support( 'wc-product-gallery-zoom' );



//function mytheme_add_woocommerce_support() {
//    add_theme_support( 'woocommerce' );
//}
//add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//Logo

add_theme_support( 'custom-logo' );

//Admin Bar (Development)
function adminBar(){
    if ( is_user_logged_in() ) {
        show_admin_bar(true);
    } else {
        show_admin_bar(false);
    }
}
add_action('init', 'adminBar');

//Custom Post Fields Loop
function awardsLoop($fieldName = ''){
    $fieldGet = $fieldName;
    $values = get_field($fieldGet);

    if($values) {
        echo '<ul>';

        foreach($values as $value)
        {
            echo '<li>' . $value . '</li>';
        }

        echo '</ul>';
    }

    return;
}


//Style Prepare
wp_enqueue_style('style', get_stylesheet_uri());

//Title
add_theme_support( 'title-tag' );

//Post Thumbnail
add_theme_support( 'post-thumbnails' );

//Register Navbar
function register_menus() {
    register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_menus' );

//Register Language
function register_lang() {
    register_nav_menu('lang-menu',__( 'Language Menu' ));
}
add_action( 'init', 'register_lang' );


// Register Custom Navigation Walker
require_once get_template_directory() . '/resources/class-wp-bootstrap-navwalker.php';


//      Index Widgets
register_sidebar( array(
    'name' => 'Index Widget 1',
    'id' => 'index-widget-1',
    'description' => 'Appears in the second block of the home page',
    'before_widget' => '<div class="index-1 index-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="index-widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' => 'Index Widget 2',
    'id' => 'index-widget-2',
    'description' => 'Appears in the second block of the home page',
    'before_widget' => '<div class="index-2 index-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="index-widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' => 'Index Widget 3',
    'id' => 'index-widget-3',
    'description' => 'Appears in the second block of the home page',
    'before_widget' => '<div class="index-3 index-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="index-widget-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' => 'Index Widget 4',
    'id' => 'index-widget-4',
    'description' => 'Appears in the second block of the home page',
    'before_widget' => '<div class="index-4 index-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="index-widget-title">',
    'after_title' => '</h3>',
) );


//      Footer Widgets
register_sidebar( array(
    'name' => 'Footer Widget 1',
    'id' => 'footer-widget-1',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div class="col-4 footer-1 footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' => 'Footer Widget 2',
    'id' => 'footer-widget-2',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div class="col-4 footer-2 footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
) );
register_sidebar( array(
    'name' => 'Footer Widget 3',
    'id' => 'footer-widget-3',
    'description' => 'Appears in the footer area',
    'before_widget' => '<div class="col-4 footer-3 footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
) );

//Billing form
add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['first_name']['placeholder'] = 'Prénom';
    $address_fields['last_name']['placeholder'] = 'Nom';
    $address_fields['company']['placeholder'] = 'Nom de l’entreprise (Optionel)';
    $address_fields['country']['label'] = 'Pays:';
    $address_fields['address_1']['placeholder'] = 'Adresse';
    $address_fields['address_2']['placeholder'] = 'Lieu-dit, Appartement, bureau, etc. (optionnel)';
    $address_fields['postcode']['placeholder'] = 'Code postal';
    $address_fields['phone']['placeholder'] = 'Téléphone';
    $address_fields['city']['placeholder'] = 'Ville/Village';
    $address_fields['email']['placeholder'] = 'E-Mail';
    return $address_fields;
}

add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
function override_billing_checkout_fields( $fields ) {
    $fields['billing']['billing_phone']['placeholder'] = 'Téléphone';
    $fields['billing']['billing_email']['placeholder'] = 'E-Mail';
    return $fields;
}


?>
<?php
// Add the code below to your theme's functions.php file to add a confirm password field on the register form under My Accounts.
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
    global $woocommerce;
    extract( $_POST );
    if ( strcmp( $password, $password2 ) !== 0 ) {
        return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
    }
    return $reg_errors;
}
add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
    ?>
    <p class="form-row form-row-wide">
        <input type="password" placeholder="Confirmez le mot de passe" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
    </p>
    <?php
}
?>
