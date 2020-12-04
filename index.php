<?php
/**
 * Template Name: index
 *
 * @package WordPress
 */
?>

<?php get_header(); ?>
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                //Page Content
                ?>
                <div class="block1content">
                    <?php the_content();?>
                </div>
            <?php
            endwhile;
        else:?>
            <h2 id="results">Er is nog geen inhoud op deze pagina.</h2>
        <?php endif; ?>
    </div>

<?php
$content = get_the_content();
if (strlen($content) < 240) {
    echo "<style>@media screen and (max-width: 800px){.block1content{padding-bottom:20vmax}}</style>";
}
?>
<?php get_footer(); ?>