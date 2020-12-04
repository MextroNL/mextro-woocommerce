<?php
/**
 * Template Name: Post List
 *
 * @package WordPress
 */
?>

<?php get_header(); ?>
    <div class="container" id="content">

        <form name="search" class="search_input" method="post" action="<?php the_permalink();?>#content">
            <!--Searchbar-->
            <input type="search" onchange="document.filters.submit()" name="search" placeholder="Recherchez des plantes" <?php if(isset($_REQUEST['search'])){echo 'value="' . $_REQUEST['search'] . '"';}?> id="search_posts">
            <button type="submit" name="submit" id="searchicon">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <form name="filters" class="filter_form" method="get" action="<?php the_permalink();?>#content">
        <!--Post per page-->
            <div class="amount_filter">
                <label class="wrap" for="posts_per_page" id="amountLabel">Plantes par page:</label>
                <select onchange="document.filters.submit()" name="posts_per_page" id="number_filter">
                    <option value="4" <?php selected(4,$_REQUEST['posts_per_page']);?>>4</option>
                    <option value="8" <?php selected(8,$_REQUEST['posts_per_page']);?>>8</option>
                    <option value="16" <?php selected(16,$_REQUEST['posts_per_page']);?>>16</option>
                    <option value="-1" <?php selected(-1,$_REQUEST['posts_per_page']);if( isset($_REQUEST['search'])) {echo 'selected="selected"';}?>>Tous</option>
                </select>
            </div>
        <!--Beroep Filter-->
            <div class="function_filter">
                <label class="wrap" for="tag_filter" id="functionLabel">Types:</label>
                <select onchange="document.filters.submit()" name="tag_filter" id="tag_filter">
                    <option value="0" <?php selected(0,$_REQUEST['tag_filter']);if( isset($_REQUEST['search'])) {echo 'selected="selected"';}?>>Tous</option>
                    <option value="regulier" <?php selected('regulier',$_REQUEST['tag_filter']);?>>R&#233;gulier</option>
                    <option value="autofloraison" <?php selected('autofloraison',$_REQUEST['tag_filter']);?>>Autofloraison</option>
                    <option value="feminissee" <?php selected('feminissee',$_REQUEST['tag_filter']);?>>F&#233;miniss&#233;e</option>
                </select>
            </div>
        </form>





        <?php
        //Search

        $clean_code = preg_replace('/[^a-zA-Z0-9 ]/', '', $_REQUEST['search']);

        $nospace = rtrim($clean_code);

        $searchwords = preg_replace('/\s+/', '+', $nospace);


//        if(isset($_REQUEST['search']) && $a = 1){
//        echo 'Zoekresultaten voor: "' . $nospace . '"<br>';
//        }





        //Post Per Page Loop
        if( isset($_REQUEST['posts_per_page'] )) {
            $posts_per_page = $_REQUEST['posts_per_page'];
        }
        elseif( isset($_REQUEST['search'])){
            $posts_per_page = -1; // Search Results
        }
        else {
            $posts_per_page = 4; // default value
        }

        //Beroep Filter Loop
        if( isset($_REQUEST['tag_filter'] )) {
            $tag_filter = $_REQUEST['tag_filter'];
        }
        elseif( isset($_REQUEST['search'])){
            $tag_filter = 0; // Search Results
        }
        else {
            $tag_filter = 0; // default value
        }


        ?>

<!--Loop-->

        <?php

        // Define custom query parameters
        $custom_query_args = array(
            's' => $searchwords,
            'posts_per_page' => $posts_per_page,
            'tag' => $tag_filter,
            'cat' => 4

        );

        // Get current page and append to custom query parameters array
        $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

        // Instantiate custom query
        $custom_query = new WP_Query( $custom_query_args );

        // Pagination fix
        $temp_query = $wp_query;
        $wp_query   = NULL;
        $wp_query   = $custom_query;

        // Output custom query loop
        if ( $custom_query->have_posts() ) :
            $totalPosts = $custom_query->found_posts; //Shows Total Posts
            if(!empty($_REQUEST['search']) && $totalPosts > 1){
                echo '<h2 id="results">Il y a ' . $totalPosts . ' r&#233;sultats pour: "' . $nospace . '".</h2>';
            }
            elseif(!empty($_REQUEST['search']) && $totalPosts == 1){
                echo '<h2 id="results">Il y a ' . $totalPosts . ' r&#233;sultat pour: "' . $nospace . '".</h2>';
            }

            while ( $custom_query->have_posts() ) :
            $custom_query->the_post();?>
                <div class="row post-block" id="post-<?php the_ID(); ?>">
                    <div class="col-5">
                        <!-- Thumbnail -->
                        <a href="<?php the_permalink(); ?>#content"><div class="recipe-thumbnail"><?php the_post_thumbnail('small'); ?></div></a>
                        <!-- Thumbnail End -->
                    </div>
                    <div class="col-7">
                        <!-- Title -->
                        <a href="<?php the_permalink(); ?>#content"><h2 class="post-title"><?php the_title(); ?></h2></a>
                        <!-- Subtitle -->
                        <h3 class="post-subtitle"><?php
                            $posttags = get_the_tags();
                            if ($posttags) {
                                foreach($posttags as $tag) {
                                    echo $tag->name . ' ';
                                }
                            }
                            ?></h3>
                        <!-- Content -->
                        <p class="post-content"><?php echo wp_trim_words( get_the_content(), 40, '...' );?></p>
                        <a href="<?php the_permalink(); ?>#content" class="single-button">Voir plante</a>
                    </div>

                </div>
            <?php
            endwhile;
            $totalPosts = $custom_query->found_posts; //Shows Total Posts
        elseif (!empty($_REQUEST['search']) && $totalPosts == 0):
            echo '<h2 id="results">Pas de resultats pour: "' . $nospace . '"</h2>';
        else:
            echo '<h2 id="results">En ce moment il n&#39;y a pas de plantes.</h2><style>@media screen and (max-width: 800px){.container{padding-bottom:20vmax}}</style>';


        endif;
        // Reset postdata
        wp_reset_postdata();

        // Custom query loop pagination
        echo '<nav><div id="page-nav">';
        previous_posts_link( '<i class="fas fa-chevron-circle-left" id="prev-button"></i>' );
        if ($posts_per_page > 0 && $totalPosts > $posts_per_page){
            echo '<h4 id="page-number">' . $custom_query_args['paged'] . '</h4>';
        }
        next_posts_link( '<i class="fas fa-chevron-circle-right" id="next-button"></i>', $custom_query->max_num_pages );
        echo '</div></nav>';

        // Reset main query object
        $wp_query = NULL;
        $wp_query = $temp_query;






        //Query Vars
        //            $showedPosts = $custom_query->post_count; //Shows shown posts on a page
        //            $_GET['shown_post_nr'] = $showedPosts;
        //                echo $_GET['shown_post_nr'] . '<br>';
        //
        //            $pageNumber = $custom_query_args['paged'];
        //            $postNumber = $pageNumber * $showedPosts;
        //            echo 'Post Count' . $showedPosts . '<br>';
        //            echo 'Found Posts' . $countPosts . '<br>';
        //
        //            echo $postNumber . ' van de ' . $countPosts . ' vacatures getoond';

        //if found posts < post per page ^-^
        //pagenumber*showedposts

        ?>
    </div>


<?php get_footer(); ?>