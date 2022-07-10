<?php
/**
 * The Template for displaying all single posts
 */
$pwe_redux_demo = get_option('redux_demo');
get_header(); ?>

<?php 
while (have_posts()): the_post();
    $blog_meta = get_post_meta(get_the_ID(),'_cmb_blog_meta', true);
    ?>

<div class="banner-container">
    <?php if(isset($pwe_redux_demo['blog_details_banner']['url']) && $pwe_redux_demo['blog_details_banner']['url'] != ''){?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo esc_url($pwe_redux_demo['blog_details_banner']['url']);?>" alt=""> </div>
    <?php }else{?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo get_template_directory_uri();?>/assets/images/topbanner-2.jpeg" alt=""> </div>
    <?php } ?>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?php echo esc_attr($blog_meta); ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?php the_title();?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Post -->
<div class="post-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 image-content animate-box" data-animate-effect="fadeInLeft"> <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="img-fluid mb-30" alt=""> </div>
        </div>
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
            </div>
        </div>
        <?php comments_template();?>
    </div>
</div>
<!-- Clients -->
<div class="clients-section clients">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme">
                <div class="client-logo">
                    <a><img src="<?php echo get_template_directory_uri();?>/assets/images/clients/1.jpg" alt=""></a>
                </div>
                <div class="client-logo">
                    <a><img src="<?php echo get_template_directory_uri();?>/assets/images/clients/2.jpg" alt=""></a>
                </div>
                <div class="client-logo">
                    <a><img src="<?php echo get_template_directory_uri();?>/assets/images/clients/3.jpg" alt=""></a>
                </div>
                <div class="client-logo">
                    <a><img src="<?php echo get_template_directory_uri();?>/assets/images/clients/4.jpg" alt=""></a>
                </div>
                <div class="client-logo">
                    <a><img src="<?php echo get_template_directory_uri();?>/assets/images/clients/5.jpg" alt=""></a>
                </div>
                <div class="client-logo">
                    <a><img src="<?php echo get_template_directory_uri();?>/assets/images/clients/6.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php endwhile; ?>
<?php
get_footer();
?>