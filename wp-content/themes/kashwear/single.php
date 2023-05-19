<?php get_header(); ?>
<?php get_specific_post(8); ?>
<?php
while (have_posts()) {
    the_post();
?>
    <div id="main-product-detail" class="product-detail spaced-row cf">

        <div class="slide-left-bg flex-row v-center">
            <div class="gallery embroidery-gallery flex-50">
                <div class="mobile-slideshow embroidery-slide" style="display:block; padding:2%;">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="slideshow slick-initialized slick-slider">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mobile-slideshow embroidery-slide">
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="product-form section new-pt-cart-button">
                    <div class="input-row quantity-submit-row">
                        <input type="submit" onclick="" value="Contact Us">
                    </div>
                </div>
            </div>
        </div>
        <div style="width:100%">
            <div class="des-left description user-content below-desc lightboximages padded-row" style="    margin: 0 5%; width: 90%;">
                <?php the_content(); ?>
            </div>
        </div>
    <?php
}
    ?>
    </div>
    <?php get_specific_post(13); ?>
    <?php get_footer(); ?>