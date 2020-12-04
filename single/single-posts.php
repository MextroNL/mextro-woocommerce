<?php
/*
 * Template Name: Single Post
 * Template Post Type: posts
 */
?>
<?php get_header(); ?>
    <h2 class="single-subtitle">Graines Cannabis</h2>
    <div class="page-content" id="content">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Posts loop -->
            <!-- Terug Knop -->
                <div class="go-back"><a href="<?php echo home_url() . '/especes/#content';?>"><i class="fas fa-chevron-circle-left"></i><span class="terug"> Plantes</span></a></div>
            <div class="row singlepostrow">
                <div class="col-6">
                    <!-- Image -->
                    <div class="single-thumbnail" id="img_click">
                        <a href="<?php echo get_the_post_thumbnail_url(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Title -->
                    <h1 id="pagetitle" class="singletitle"><?php the_title(); ?></h1>
                    <!-- Subtitle -->

                    <!-- Tags -->
                    <h3 class="post-subtitle"><?php
                        $posttags = get_the_tags();
                        if ($posttags) {
                            foreach($posttags as $tag) {
                                echo $tag->name . ' ';
                            }
                        }
                        ?></h3>
                    <!-- Content -->
                    <div class="single-content"><?php the_content(); ?></div>
<!--                    <a href="--><?php //the_permalink(); ?><!--over-ons/#content" class="perma-button">Acheter --><?php //the_title(); ?><!--</a>-->
                </div>


                <?php endwhile; ?>
                <?php endif; ?>
            </div>
                </div>
            </div>




<?php
$content = get_the_content();
if (strlen($content) < 240) {
    echo "<style>.page-content{padding-bottom:20vmax}</style>";
}
?>

    <script type="text/javascript"> $('.single-thumbnail a').simpleLightbox(); </script>

<?php get_footer(); ?>