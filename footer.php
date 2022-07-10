<?php $pwe_redux_demo = get_option('redux_demo'); ?>
<div id="pwe-footer2">
        <div class="pwe-narrow-content">
            <div class="row">
                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-1' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-2' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-3' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>