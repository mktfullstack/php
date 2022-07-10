<?php

/**

 * The Template for displaying all single posts

 */

$pwe_redux_demo = get_option('redux_demo');

get_header(); ?>

<?php 
while (have_posts()): the_post();
$portfolio_meta = get_post_meta(get_the_ID(),'_cmb_portfolio_meta', true);
    ?>

<div class="banner-container">
    <?php if(isset($pwe_redux_demo['portfolio_banner']['url']) && $pwe_redux_demo['portfolio_banner']['url'] != ''){?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo esc_url($pwe_redux_demo['portfolio_banner']['url']);?>" alt=""> </div>
    <?php }else{?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo get_template_directory_uri();?>/assets/images/topbanner-1.jpeg" alt=""> </div>
    <?php } ?>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta">.<?php echo esc_attr($portfolio_meta); ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?php the_title();?></h2> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio -->
<div class="pwe-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        </div>
        <!-- Gallery -->
        <div class="row mb-60">
            <?php $gallery = get_post_gallery( get_the_ID(), false );

            if(isset($gallery['ids'])){    
                $gallery_ids = $gallery['ids'];
                $img_ids = explode(",",$gallery_ids);
                $i=0; $j=0;?>
                <?php   
                foreach( $img_ids AS $img_id ){ 
                    $image_src = wp_get_attachment_image_src($img_id,'');
                    ?>
                    <div class="col-md-4 gallery-item animate-box" data-animate-effect="fadeInLeft">
                        <a href="<?php echo esc_url($image_src[0]); ?>" title="Eleanor & Stefano" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="<?php echo esc_url($image_src[0]); ?>" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                                <div class="gallery-detail text-center"> <i class="ti-plus"></i> </div>
                            </div>
                        </a>
                    </div>
                <?php } } ?>

        </div>
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