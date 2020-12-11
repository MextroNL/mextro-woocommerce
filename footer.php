</div>
</div>
</div>
</div>
</div>
<?php
if (is_page( 'Compte' ) ):
    echo "
</div>
</div>
</div>
</div>
</div>" ;
endif;
?>
<?php
if ( is_product_category() ):
    echo "<style>.footer-block{
display: flex!important;
}</style>" ;
endif;
?>
<!--Theme Footer-->
<footer class="container-fluid footer-block">

    <div class="footer-widget-wrapper">
        <div class="navbar language_menu" id="footer-lang">

            <?php
            wp_nav_menu( array(
                'theme_location'    => 'lang-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => '',
                'container_id'      => '',
                'menu_class'        => 'navbar-nav nav-fill',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>


        </div>
        <?php
        if(is_active_sidebar('footer-widget-1')){
            dynamic_sidebar('footer-widget-1');
        }

        if(is_active_sidebar('footer-widget-2')){
            dynamic_sidebar('footer-widget-2');
        }

        if(is_active_sidebar('footer-widget-3')){
            dynamic_sidebar('footer-widget-3');
        }

        ?>
    </div>
    <div class="copyrightbottom">
        <a href=""><?php echo bloginfo('name') . " &copy; " . date("Y") . " - Made by Mextro";?></a>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</div>
</body>
</html>
