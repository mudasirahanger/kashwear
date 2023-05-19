<?php get_header(); ?>
<?php get_specific_post(8); 
$page_ids = get_queried_object_id(); // Replace with the IDs of the pages you want to retrieve

    $page = get_post($page_id);
    if ($page) {
        $page_title = $page->post_title;
        $page_content = $page->post_content;
?>
<div class="cf about-bg">
    <div class="user-content row-spacing lightboximages">
     <div class="about-pk">
        <div class="about-text-pk">
             <?php echo $page_content; ?>
        </div>
     </div>
    </div>

</div>
<?php 
}
get_specific_post(13); ?>
<?php get_footer(); ?>