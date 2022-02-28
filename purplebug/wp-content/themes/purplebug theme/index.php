<?php get_header(); ?>

    <div class="container">
        <div class="row">
        	<div class="col-12 col-xl-6">
				<div class="row content p-3">
					<?php require_once('templates/categories.php') ?>
				</div>
        	</div>
			<div id="left-sidebar" class="col-12 col-xl-3">
				<?php get_template_part( '/templates/middle-portion', 'left' ); ?>
			</div>
			<div id="right-sidebar" class="col-12 col-xl-3">
				<?php get_template_part( '/templates/right-portion', 'right' ); ?>
			</div>
		</div>
    </div>
<?php get_footer(); ?>