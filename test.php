<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php the_title(); ?> - <?php bloginfo('name'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--        <link rel="stylesheet" href="--><?php //echo get_stylesheet_directory_uri(); ?><!--/style.css">-->
    <!--        <link rel="stylesheet" type="text/css" href="--><?php //echo get_stylesheet_directory_uri(); ?><!--/resources/Lightbox/simpleLightbox.min.css">-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/46636d4f0f.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css">
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/woocommerce/cart/quantity.js"></script>
    <!--        <script src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/resources/Lightbox/simpleLightbox.min.js"></script>-->



    <?php include 'language-strings.php'; ?>
    <?php wp_head(); ?>

</head>

<body>

<?php
// Fix menu overlap
if ( is_admin_bar_showing() ) echo '<div style="min-height: 32px;"></div>';
?>
<div class="page-wrapper" id="animated_bg">

    <!--Center Logo Start-->
    <div class="logo-wrapper">
        <!--Image-->
        <?php the_custom_logo(); ?>

    </div>
    <div class="navbar language_menu">

        <?php
        wp_nav_menu( array(
            'theme_location'    => 'lang-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'navbar-nav nav-fill',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>


    </div>
    <h2 id="tagline"><?php bloginfo('description'); ?></h2>

    <!--Center Logo End-->


    <!--Navigation Start-->
    <nav class="navbar fixed-top navbar-expand-sm">
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

    <!--    Header Image-->
    <div class="header" id="headerimg">
        <?php
        if ( is_single() && has_post_thumbnail() ){
            //echo '<img id="headerimg" alt="headerimg" src="'; header_image(); echo '"/>';
        }
        elseif ( has_post_thumbnail() ) {the_post_thumbnail();}
        else {
            //echo '<img id="headerimg" alt="headerimg" src="'; header_image(); echo '"/>';
        }
        ?>
    </div>
    <!--    Header Image End-->


    <!--Pagetitle-->
    <?php
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID;


    if (is_single()){
        ?>
        <h1 class="pagetitle"><?php echo category_description( $category_id ); ?></h1>
        <?php
    }
    else{
        ?>
        <h1 class="pagetitle"><?php the_title(); ?></h1>
        <?php
    }
    ?>




    <!--Account file-->



    <div class="container account" id="content">
        <div class="account-content">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    //Page Content
                    ?>
                    <?php the_content();?>

                <?php
                endwhile;
            else:?>
                <h2 id="results">Er is nog geen inhoud op deze pagina.</h2>
            <?php endif; ?>

            <!--        --><?php
            //        $content = get_the_content();
            //        if (strlen($content) < 240) {
            //            echo "<style>@media screen and (max-width: 800px){.account{padding-bottom:25vmax}}</style>";
            //        }
            //        ?>
        </div>
    </div>




    <!--Theme Footer-->






    <footer class="container-fluid footer-block">

        <div class="footer-widget-wrapper">
            <div class="navbar language_menu" id="footer-lang">

                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'lang-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'navbar-nav nav-fill',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ) );
                ?>


            </div>
            <?php
            if(is_active_sidebar('footer-widget-1')){
                dynamic_sidebar('footer-widget-1');
            }

            if(is_active_sidebar('footer-widget-2')){
                dynamic_sidebar('footer-widget-2');
            }

            if(is_active_sidebar('footer-widget-3')){
                dynamic_sidebar('footer-widget-3');
            }

            ?>
        </div>
        <div class="copyrightbottom">
            <a href=""><?php echo bloginfo('name') . " &copy; " . date("Y") . " - Made by Mextro";?></a>
        </div>
    </footer>
</div>
</div>
<!--<script>-->
<!--    VANTA.FOG({-->
<!--        el: "#animated_bg",-->
<!--        highlightColor: 0x799870,-->
<!--        midtoneColor: 0x799870,-->
<!--        lowlightColor: 0x799870,-->
<!--        baseColor: 0x567925,-->
<!--        blurFactor: 0.2,-->
<!--        speed: 0.40,-->
<!--        zoom: 0.50-->
<!--    })-->
<!--</script>-->
<?php wp_footer(); ?>
</body>
</html>
