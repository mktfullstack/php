<?php
/*
 * The Template for displaying all posts
 * 
 */
$pwe_redux_demo = get_option('redux_demo');
get_header(); ?>

<div class="banner-container">
    <?php if(isset($pwe_redux_demo['blog_banner']['url']) && $pwe_redux_demo['blog_banner']['url'] != ''){?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo esc_url($pwe_redux_demo['blog_banner']['url']);?>" alt=""> </div>
    <?php }else{?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo get_template_directory_uri();?>/assets/images/topbanner.jpeg" alt=""> </div>
    <?php } ?>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> 
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?php printf( esc_html__( 'Tag Archives: %s', 'pwe' ), single_tag_title( '', false ) ); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog -->
<div class="blog-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <?php 
                while (have_posts()): the_post();
                    $blog_meta = get_post_meta(get_the_ID(),'_cmb_blog_meta', true);
                    ?>
                    <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                        <a href="<?php the_permalink();?>" class="blog-img"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="img-fluid" alt=""></a>
                        <div class="desc"> <span><small><?php the_time(get_option( 'date_format'));?> | <?php echo esc_attr($blog_meta); ?></small></span>
                            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <p><?php if(isset($pwe_redux_demo['blog_excerpt'])){?>
                                <?php echo esc_attr(pwe_excerpt($pwe_redux_demo['blog_excerpt'])); ?>
                            <?php }else{?>
                                <?php echo esc_attr(pwe_excerpt(40)); 
                            }
                            ?></p>
                            <div class="btn-contact"><a href="<?php the_permalink();?>"><span><?php echo esc_html__( 'Read More', 'pwe' )?></span></a></div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- Pagination -->
                <?php pwe_pagination();?>
            </div>
            <div class="col-sm-4">
                <div class="pwe-sidebar-part animate-box" data-animate-effect="fadeInLeft">
                    <?php get_sidebar();?>
                </div>
            </div>
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

<?php
get_footer();
?>