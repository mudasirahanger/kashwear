<?php
get_header();
get_specific_post(8);
$category_title = single_cat_title('', false);
$category_description = category_description();
?>

<div class="lightgray-bg">
    <div class="">
        <div class="page-header cf margin-d-40">
            <h1 class="majortitle new-collection-title"><?php echo $category_title; ?> </h1>
            <div class="user-content lightboximages">
                <?php if (!empty($category_description)) { ?>
                    <h3 class="kani-collection-text"><?php echo $category_description; ?></h3>
                <?php } ?>
            </div>
        </div><!-- /.page-header -->
    </div>
</div>
<?php
// Start the loop
// Get the category ID for the current category page
$category_id = get_queried_object_id();
$args = array(
    'post_type' => 'products',
    'posts_per_page' => -1,
    'cat' => $category_id,
);
$products_query = new WP_Query($args);

?>
<div class="collection-row">
    <div class="column-collection-filter">
        <div style="position: -webkit-sticky;
    position: sticky;
    top: 10px;">
    <div class="tags nav-row cat-normal mobile-hidden">
    <?php 
     $current_category = get_queried_object();
     if ($current_category) {
         $args = array(
             'taxonomy' => 'category',
             'child_of' => $current_category->term_id,
             'hide_empty' => 0,
         );
         $categories = get_categories($args);         
          echo '<ul>';
          if ($categories) {
                  echo '<li><a href="' . get_category_link($category_id) . '">All</a></li>';
              foreach ($categories as $category) {
                  echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
             }
          echo '</ul>';        
            } else {
                echo '<li><a href="' . get_category_link($category_id) . '">All</a></li>';
            }
        } else {

        }
    ?>
      </div>
        </div>
    </div>
    <div class="column-collection-products">
        <div class="collection-listing kani-collection-list embroidery-list cf">
            <div class="product-list">
                <?php
                // Loop 
                while ($products_query->have_posts()) : $products_query->the_post();  ?>
                    <div data-product-id="<?php  ?>" class="product-block">
                        <div class="block-inner" style="height: 447px;">
                            <div class="image-cont" style="opacity: 1; max-width: 296px;">
                                <a class="image-link more-info" href="<?php the_permalink(); ?>">
                                    <div class="reveal">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </div>
                                </a>
                                <a class="hover-info more-info" href="<?php the_permalink(); ?>">
                                    <div class="inner">
                                        <div class="innerer">
                                            <div class="title"><?php the_title(); ?></div>
                                        </div>
                                    </div>
                                    <div class="bg"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
// Reset Post Data
wp_reset_postdata();
get_specific_post(13);
get_footer();
?>