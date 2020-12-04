<?php
/**
 * Template Name: Menu
 *
 * @package WordPress
 */
?>

<?php get_header(); ?>
    <div class="container" id="content">
                <div class="block1content prijslijst">
                    <div class="row eten">
                        <div class="col-sm-6 price-col">
                            <h3>Breakfast</h3>
                            <?php echo do_shortcode('[mprm_items view="simple-list" categ="9" tags_list="" item_ids="" col="1" price_pos="right" categ_name="none" show_attributes="0" excerpt="0" price="1" tags="0" ingredients="0" link_item="0" desc_length=""]'); ?>
                            <?php echo do_shortcode('[mprm_items view="simple-list" categ="14" tags_list="" item_ids="" col="1" price_pos="right" categ_name="only_text" show_attributes="0" excerpt="0" price="1" tags="0" ingredients="0" link_item="0" desc_length=""]'); ?>

                        </div>
                        <div class="col-sm-6 price-col">
                            <h3>Lunch</h3>
                            <?php echo do_shortcode('[mprm_items view="simple-list" categ="15" tags_list="" item_ids="" col="1" price_pos="right" categ_name="only_text" show_attributes="0" excerpt="0" price="1" tags="0" ingredients="0" link_item="0" desc_length=""]'); ?>
                            <?php echo do_shortcode('[mprm_items view="simple-list" categ="16" tags_list="" item_ids="" col="1" price_pos="right" categ_name="only_text" show_attributes="0" excerpt="0" price="1" tags="0" ingredients="0" link_item="0" desc_length=""]'); ?>
                            <?php echo do_shortcode('[mprm_items view="simple-list" categ="17" tags_list="" item_ids="" col="1" price_pos="right" categ_name="only_text" show_attributes="0" excerpt="0" price="1" tags="0" ingredients="0" link_item="0" desc_length=""]'); ?>



                        </div>
                    </div>


                    <h3 style="text-align: center;">Dranken</h3>
                    <div class="row dranken">

                        <div class="col-sm-4 price-col">
                            <?php echo do_shortcode('[mprm_items view="simple-list" categ="11" tags_list="" item_ids="" col="1" price_pos="right" categ_name="only_text" show_attributes="0" excerpt="0" price="1" tags="0" ingredients="0" link_item="0" desc_length=""]'); ?>

                        </div>
                        <div class="col-sm-4 price-col">
                            <?php echo do_shortcode('[mprm_items view="simple-list" categ="12" tags_list="" item_ids="" col="1" price_pos="right" categ_name="only_text" show_attributes="0" excerpt="0" price="1" tags="0" ingredients="0" link_item="0" desc_length=""]'); ?>

                        </div>
                        <div class="col-sm-4 price-col">
                            <?php echo do_shortcode('[mprm_items view="simple-list" categ="13" tags_list="" item_ids="" col="1" price_pos="right" categ_name="only_text" show_attributes="0" excerpt="0" price="1" tags="0" ingredients="0" link_item="0" desc_length=""]'); ?>
                        </div>
                    </div>
                </div>

    </div>



<?php
$content = get_the_content();
if (strlen($content) < 240) {
    echo "<style>@media screen and (max-width: 800px){.block1content{padding-bottom:20vmax}}</style>";
}
?>

    <script type="text/javascript"> $('.block1content a').simpleLightbox(); </script>

<?php get_footer(); ?>