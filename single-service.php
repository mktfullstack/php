<?php

/**

 * The Template for displaying all single posts

 */

$pwe_redux_demo = get_option('redux_demo');

get_header(); ?>

<?php 
while (have_posts()): the_post();
    ?>

    <div class="banner-container">
        <?php if(isset($pwe_redux_demo['services_banner']['url']) && $pwe_redux_demo['services_banner']['url'] != ''){?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo esc_url($pwe_redux_demo['services_banner']['url']);?>" alt=""> </div>
    <?php }else{?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo get_template_directory_uri();?>/assets/images/topbanner.jpeg" alt=""> </div>
    <?php } ?>
        <div class="banner-head">
            <div class="banner-head-padding banner-head-margin">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12"> <span class="heading-meta"><?php if(isset($pwe_redux_demo['services_details_meta']) && $pwe_redux_demo['services_details_meta'] != ''){?>
                        <?php echo htmlspecialchars_decode(esc_attr($pwe_redux_demo['services_details_meta']));?>
                    <?php }else{?>
                        <?php echo esc_html__( 'our services', 'pwe' );
                    }
                    ?></span>
                            <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?php the_title();?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us -->
    <div class="about-section pt-0 pb-60">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 animate-box" data-animate-effect="fadeInLeft"> <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="img-fluid mb-30" alt=""> </div>
                <div class="col-md-7 animate-box" data-animate-effect="fadeInLeft">
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing -->
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