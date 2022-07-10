<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
$pwe_redux_demo = get_option('redux_demo');
get_header(); ?> 

<div class="banner-container">
    <?php if(isset($pwe_redux_demo['404_image']['url']) && $pwe_redux_demo['404_image']['url'] != ''){?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo esc_url($pwe_redux_demo['404_image']['url']);?>" alt=""> </div>
    <?php }else{?>
        <div class="banner-img"> <img class="banner-img-width" src="<?php echo get_template_directory_uri();?>/assets/images/topbanner.jpeg" alt=""> </div>
    <?php } ?>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?php echo esc_html__( 'Error', 'pwe' );?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?php echo esc_html__( '404 Error', 'pwe' );?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="error-section pt-0 pb-60">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <h1><?php if(isset($pwe_redux_demo['404_title']) && $pwe_redux_demo['404_title'] != ''){?>
                    <?php echo htmlspecialchars_decode(esc_attr($pwe_redux_demo['404_title']));?>
                <?php }else{?>
                    <?php echo esc_html__( '404', 'pwe' );
                }?></h1>
                <h2><?php if(isset($pwe_redux_demo['404_subtitle']) && $pwe_redux_demo['404_subtitle'] != ''){?>
                    <?php echo htmlspecialchars_decode(esc_attr($pwe_redux_demo['404_subtitle']));?>
                <?php }else{?>
                    <?php echo esc_html__( 'Oops! That page can’t be found', 'pwe' );
                }?></h2>
                <div class="text"><?php if(isset($pwe_redux_demo['404_text']) && $pwe_redux_demo['404_text'] != ''){?>
                    <?php echo htmlspecialchars_decode(esc_attr($pwe_redux_demo['404_text']));?>
                <?php }else{?>
                    <?php echo esc_html__( 'Sorry, but the page you are looking for does not existing', 'pwe' );
                }?></div>
                <a href="<?php echo esc_url(home_url('/')) ?>" class="theme-btn btn-style-seven"><span class="txt"><?php if(isset($pwe_redux_demo['404_button']) && $pwe_redux_demo['404_button'] != ''){?>
                    <?php echo htmlspecialchars_decode(esc_attr($pwe_redux_demo['404_button']));?>
                <?php }else{?>
                    <?php echo esc_html__( 'Go to home page', 'pwe' );
                }?></span></a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>