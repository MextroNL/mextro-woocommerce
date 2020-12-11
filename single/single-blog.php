
            <?php
            /*
             * Template Name: Single Blog
             * Template Post Type: news
             */
            ?>
            <?php get_header(); ?>
            <div class="page-content" id="content">
                <div class="container">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- Posts loop -->
                    <!-- Terug Knop -->

                    <div class="single-title">
                        <div class="go-back"><a href="<?php echo home_url() . '/nouvelles/#content';?>"><i class="fas fa-chevron-circle-left"></i><span class="terug"> Nouvelles</span></a></div>
                    </div>



                    <div class="row post-block" id="post-<?php the_ID(); ?>">
                        <div class="col-6">
                            <!-- Thumbnail -->
                            <a href="<?php echo get_the_post_thumbnail_url() ?>"
                               class="swipebox " rel="post-gallery-<?php the_ID(); ?>">
                                <div class="single-post-thumbnail">
                                    <?php echo the_post_thumbnail('small'); ?>
                                </div>
                            </a>
                            <?php echo do_shortcode( '[post_gallery]' ); ?>
                            <!-- Thumbnail End -->
                        </div>
                        <div class="specs col-6">
                            <!-- Title -->
                            <h2 class="blogtitle"><?php the_title(); ?></h2>
                            <!-- Content -->

                        </div>
                        <div class="single-content"><?php the_content(); ?></div>
                    </div>



                </div>


                <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <?php
            $content = get_the_content();
            if (strlen($content) < 240) {
                echo "<style>.page-content{padding-bottom:20vmax}</style>";
            }
            ?>





            <?php get_footer(); ?>