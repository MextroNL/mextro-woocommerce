<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 */
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>404 Not Found - <?php bloginfo('name'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/resources/Lightbox/simpleLightbox.min.css">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/46636d4f0f.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/resources/Lightbox/simpleLightbox.min.js"></script>



        <?php include 'language-strings.php'; ?>

    </head>

<body>
<?php
// Fix menu overlap
if ( is_admin_bar_showing() ) echo '<div style="min-height: 32px;"></div>';
?>
<div class="page-wrapper">
    <!--Center Logo Start-->
    <div class="logo-wrapper">
        <!--Image-->
        <?php the_custom_logo(); ?>
    </div>
    <!--Center Logo End-->

    <!--Navigation Start-->
    <nav class="navbar fixed-top navbar-expand-sm navbar">
        <!--Collapse Button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="false">
            <span class="hamburger-icon fas fa-bars"></span>
        </button>
        <!--Main Menu-->
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'main-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse main-nav',
            'container_id'      => 'collapsibleNavbar',
            'menu_class'        => 'navbar-nav nav-fill w-100',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>

        <!--Main Menu End-->
    </nav>
    <!--Navigation End-->

    <div class="errorblock">


        <div class="container">
            <h1 class="pagetitle"><b>404</b><br><?php echo $error_message; ?></h1>
            <a href="<?php echo home_url()?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/images/404_binoculars.png" class="error-icon" width="200" height="200" alt="user holding binoculars"></a>
            <a href="<?php echo home_url()?>"><h2 class="subheading"><?php echo $return_home; ?></h2></a>

        </div>
        <!--Container End-->
    </div>



<?php get_footer(); ?>