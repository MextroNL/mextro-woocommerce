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
            <!-- Title -->
            <p id="pagetitle" class="blogtitle"></p>
            <h2 class="blogtitle"><?php the_title(); ?></h2>
            <!-- Subtitle -->
            <h3 class="blog-subtitle"><?php echo get_the_date(); ?></h3>
            <!-- Content -->
            <div class="single-content"><?php the_content(); ?></div>

            <!-- Image -->
            <div class="blog-thumbnail" id="img_click">
                <a href="<?php echo get_the_post_thumbnail_url(); ?>">
                    <?php the_post_thumbnail('large'); ?>
                </a>
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

    <script type="text/javascript"> $('.single-thumbnail a').simpleLightbox(); </script>
<?php get_footer(); ?>