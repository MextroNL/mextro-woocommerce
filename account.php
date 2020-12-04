<?php
/**
 * Template Name: Account
 *
 * @package WordPress
 */
?>

<?php get_header(); ?>
    <div class="container account" id="content">
        <div class="account-content">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                //Page Content
                ?>
                    <?php the_content();
                $content = get_the_content();
                if (strlen($content) < 240) {
                    echo "<style>@media screen and (max-width: 800px){.account{padding-bottom:10vmax}}</style>";
                }
                    ?>

            <?php
            endwhile;
        else:?>
            <h2 id="results">Er is nog geen inhoud op deze pagina.</h2>
        <?php endif; ?>






