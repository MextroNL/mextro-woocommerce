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
                    <div class="block1content">
                        <?php the_content();?>
                    </div>
            <?php
                    endwhile;
            else:?>
                <h2 id="results">Er is nog geen inhoud op deze pagina.</h2>
            <?php endif; ?>
        <?php echo do_shortcode('[instagram-feed]'); ?>
    </div>

<?php
$content = get_the_content();
if (strlen($content) < 240) {
    echo "<style>@media screen and (max-width: 800px){.block1content{padding-bottom:20vmax}}</style>";
}
?>

<!--    <script type="text/javascript">-->
<!---->
<!--        if ($(".sent")[0]){-->
<!--            var all = document.getElementsByClassName('wpcf7-mail-sent-ok');-->
<!--            for (var i = 0; i < all.length; i++) {-->
<!--                all[i].style.color = '#fff';-->
<!--                all[i].style.backgroundColor = '#AEC5AD';-->
<!--                all[i].style.border = '3px solid #719570';-->
<!--                all[i].style.borderRadius = '1vmax';-->
<!--                all[i].style.margin = 'auto';-->
<!--                all[i].style.padding = '10px';-->
<!--            }-->
<!---->
<!--        } else {-->
<!--            // If class doesnt exist-->
<!--        }-->
<!--    </script>-->

    <script type="text/javascript"> $('.block1content a').simpleLightbox(); </script>


<?php get_footer(); ?>