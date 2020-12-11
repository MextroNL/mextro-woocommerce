<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 */
?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Sous Construction - <?php bloginfo('name'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>style.css">

        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/resources/Lightbox/simpleLightbox.min.css">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="<?php echo get_stylesheet_directory_uri(); ?>/resources/Lightbox/simpleLightbox.min.js"></script>
        <script src="https://use.fontawesome.com/46636d4f0f.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css">



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
    <div class="constructionblock">


        <div class="container">
            <h1 class="pagetitle"><b>Attendez!</b><br>Le Site est encore sous construction!</h1>
            <span class="construction-icon"><i class="fas fa-tools"></i></span>
            <a href="https://www.instagram.com/pro_tect_france/"><span class="construction-icon"><i class="fab fa-instagram"></i></span></a>
            <a href="https://www.instagram.com/pro_tect_france/"><h2 class="subheading">Voir Instagram</h2></a>

        </div>
        <!--Container End-->
    </div>


</div>
</div>
</div>
</div>
</div>

<!--Theme Footer-->
<footer class="container-fluid footer-block">
    <div class="copyrightconstruction">
        <a href=""><?php echo bloginfo('name') . " &copy; " . date("Y") . " - Made by Mextro";?></a>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
