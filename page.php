<?php
/**
 * Template Name: Page
 *
 * @package WordPress
 */
?>

<?php get_header(); ?>
    <div class="container" id="content">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                //Page Content
                ?>
                    <div class="block1content"  <?php if (is_page( 'contact' )){ echo 'style="text-align:center!important"'; } ?>>
                        <?php the_content();?>
                    </div>
            <?php
                    endwhile;
            else:?>
                <h2 id="results">Er is nog geen inhoud op deze pagina.</h2>
            <?php endif; ?>

        <?php if (is_page( 'pro-tect' or 'nouvelles' or 'contact' )){ echo do_shortcode('[instagram-feed]'); } ?>
    </div>

<?php
$content = get_the_content();
if (strlen($content) < 240) {
    echo "<style>@media screen and (max-width: 800px){.block1content{padding-bottom:20vmax}}</style>";
}
?>




<?php get_footer(); ?>