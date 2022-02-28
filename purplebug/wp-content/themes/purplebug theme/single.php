<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <?php                
                        get_template_part( 'templates/post-blog', 'single' );
                ?>
                <div id="left-sidebar" class="col-12 col-xl-3">
                    <?php get_template_part( '/templates/middle-portion', 'left' ); ?>
			    </div>
			    <div id="right-sidebar" class="col-12 col-xl-3">
                    <?php get_template_part( '/templates/right-portion', 'right' ); ?>
			    </div>
		    </div>		
        </div>
    </div>
<?php get_footer(); ?>