<?php
/**
 * Template Name: Blog
 *
 * @package WordPress
 */
?>

<?php get_header(); ?>
    <div class="container" id="content">
            <?php
            $category_id = 3;
            echo '<h3 class="cat-description">Les nouvelles les plus r&#233;centes</h3>';

            $catquery = new WP_Query( 'cat='. $category_id . '&posts_per_page=-1' );

            if ( $catquery->have_posts() ) :
                while($catquery->have_posts()) : $catquery->the_post();
                    ?>

                    <?php if ($catquery->current_post % 2 == 0): ?>
                        <!--Post Content Start-->
                        <div class="row post-block" id="post-<?php the_ID(); ?>">
                            <div class="col-6">
                                <!-- Title -->
                                <a href="<?php the_permalink(); ?>#content"> <h4 class="post-title"><?php the_title(); ?></h4></a>
                                <!-- Subtitle -->
                                <h5 class="post-subtitle"><?php echo get_the_date(); ?></h5>

                                <!-- Content -->
                                <p class="post-content"><?php echo wp_trim_words( get_the_content(), 25, '...' );?></p>
                                <a href="<?php the_permalink(); ?>#content" class="single-button">Lire</a>
                            </div>
                            <div class="col-6">
                                <!-- Thumbnail -->
                                <a href="<?php the_permalink(); ?>#content"><div class="post-thumbnail"><?php the_post_thumbnail('medium_large'); ?></div></a>
                                <!-- Thumbnail End -->
                            </div>
                        </div>
                        <!--Post Content End-->
                    <?php else: ?>
                        <div class="row post-block" id="post-<?php the_ID(); ?>">
                            <div class="col-6">
                                <!-- Thumbnail -->
                                <a href="<?php the_permalink(); ?>#content"><div class="post-thumbnail"><?php the_post_thumbnail('medium_large'); ?></div></a>
                                <!-- Thumbnail End -->
                            </div>
                            <div class="col-6">
                                <!-- Title -->
                                <a href="<?php the_permalink(); ?>#content"> <h4 class="post-title"><?php the_title(); ?></h4></a>
                                <!-- Subtitle -->
                                <h5 class="post-subtitle"><?php echo get_the_date(); ?></h5>

                                <!-- Content -->
                                <p class="post-content"><?php echo wp_trim_words( get_the_content(), 25, '...' );?></p>
                                <a href="<?php the_permalink(); ?>#content" class="single-button">Lire</a>
                            </div>
                        </div>
                        <!--Post Content End-->
                    <?php endif;?>

                <?php
                endwhile;
            else:
                echo '<h4 id="results">' . $blog_error . '</h4>';
            endif; ?>





            <?php wp_reset_query(); // reset the query ?>
    </div>

<?php
$content = get_the_content();
if (strlen($content) < 240) {
    echo "<style>@media screen and (max-width: 800px){.block1content{padding-bottom:20vmax}}</style>";
}
?>



<?php get_footer(); ?>