<!DOCTYPE html>

<html lang="zxx">

<?php $pwe_redux_demo = get_option('redux_demo'); ?>

<head>

    <!-- Meta Tags -->

    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {?>

        <?php if(isset($pwe_redux_demo['favicon']['url'])){?>

            <link rel="shortcut icon" href="<?php echo esc_url($pwe_redux_demo['favicon']['url']); ?>">

        <?php } ?>

    <?php } ?>

    <?php wp_head(); ?> 


</head>

<body <?php body_class(); ?>>

<div id="pwe-page"> <a href="#" class="js-pwe-nav-toggle pwe-nav-toggle"><i></i></a>
    <!-- Sidebar Section -->
    <aside id="pwe-aside">
        <!-- Logo -->
        <?php if(isset($pwe_redux_demo['logo_text']) && $pwe_redux_demo['logo_text'] != ''){?>
        <h1 id="pwe-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo htmlspecialchars_decode(esc_attr($pwe_redux_demo['logo_text']));?>
<span><?php echo htmlspecialchars_decode(esc_attr($pwe_redux_demo['logo_meta']));?></span></a>
        </h1>
        <?php }else{?>
        <h1 id="pwe-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">PWE<i>®</i><span>weddings <small>&#8226;</small> events</span></a>
        </h1>
        <?php } ?>
        <!-- Menu -->
        <nav id="pwe-main-menu">
            <?php 
                wp_nav_menu( 
                    array( 
                        'theme_location' => 'one-page',
                        'container' => '',
                        'menu_class' => '', 
                        'menu_id' => '',
                        'menu'            => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'echo'            => true,
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new pwe_wp_bootstrap_navwalker(),
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class=" %2$s">%3$s</ul>',
                        'depth'           => 0,        
                    )
                ); ?>
        </nav>
        <!-- Sidebar Footer -->
        <div class="pwe-footer">
            <div class="separator"></div>
            <?php if($pwe_redux_demo['header_phone_number'] != '' && $pwe_redux_demo['header_mail'] != ''){?>
            <p><?php echo esc_attr($pwe_redux_demo['header_phone_number']); ?>
                <br /><?php echo esc_attr($pwe_redux_demo['header_mail']); ?></p>
            <?php } ?>
            <div class="social"> 
                <?php if($pwe_redux_demo['header_link_facebook'] != ''){?>
                    <a href="<?php echo esc_url($pwe_redux_demo['header_link_facebook']);?>"><i class="ti-facebook"></i></a> 
                <?php } ?>
                <?php if($pwe_redux_demo['header_link_twitter'] != ''){?>
                    <a href="<?php echo esc_url($pwe_redux_demo['header_link_twitter']);?>"><i class="ti-twitter-alt"></i></a> 
                <?php } ?>
                <?php if($pwe_redux_demo['header_link_instagram'] != ''){?>
                    <a href="<?php echo esc_url($pwe_redux_demo['header_link_instagram']);?>"><i class="ti-instagram"></i></a> 
                <?php } ?>
                <?php if($pwe_redux_demo['header_link_pinterest'] != ''){?>
                    <a href="<?php echo esc_url($pwe_redux_demo['header_link_pinterest']);?>"><i class="ti-pinterest"></i></a>
                <?php } ?> 
            </div>
        </div>
    </aside>
    <!-- Main Section -->
<div id="pwe-main"> 