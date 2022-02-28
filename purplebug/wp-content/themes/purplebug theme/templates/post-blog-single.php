<article id="post-<?php the_ID() ?>" <?php post_class('single-content pt-3') ?>>
	<?php if ( get_theme_mod( 'thumbnail_display' ) == 0 ) : ?>
	<figure class="pl-3 pr-3 thumbnail-image">
		<a href="<?php the_permalink(); ?>">
			<img class="img-single" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" onerror="javascript:this.src='<?php echo get_template_directory_uri() . "/assets/img/No_image.png"; ?>'" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		</a>
	</figure>
	<?php endif; ?>
	<div class="section">	
		<div class="categories-cats mb-3 pl-3 pr-3">
				<?php
				$category = get_the_category();
				if ( !empty( $category[0]->cat_name ) ) :
					echo '<a class="front-page-category" href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
				endif;
			
				?>
		</div>
		<hr class="front-page-separator">
		<div class="col-12 col-md-12 pl-3 pr-3 pb-3 content-container">
	
			<div class="single-post-content text-dark aritcle-content-img mb-4">
				<?php the_content() ?>
			</div>
			
		</div>
	</div>
    <!-- Start Pagination -->
			<?php 
			global $count;
			$posts = get_posts(  );
			$count = count($posts);
			?>
			<?php if ( $count > 1 ) : ?>
			<div class ="row mb-4 mt-4 ml-0 mr-0 page-contianer">

					<?php
					$prevPost = get_previous_post();
					if ( !empty( $prevPost ) ){
					?>
						<div class="col-12 col-sm-5 page-btn-single prev-left"> 
					<?php
					$prevthumbnail = get_the_post_thumbnail($prevPost->ID);
					 previous_post_link('
						<h5 class="post-nav-title-next" title="'.get_the_title($prevPost->ID).'">
							%link
						</h5>', ''.'%title', false);
					?>
						</div>
					<?php
					}else{
					?>
					<div class="col-12 col-sm-5"></div>
					<?php } ?>

				<div class="col-12 col-sm-2 btn-single text-center">
					<?php 
						$prevPost = get_previous_post();
						if ( !empty( $prevPost ) ){
					 ?>
					<i class="fa fa-angle-double-left"></i>
					<?php 
						}
					 ?>
					<?php
						$nextPost = get_next_post();
						if ( !empty( $nextPost ) ){
					 ?>
					<i class="fa fa-angle-double-right"></i>
					<?php 
						} 
					?>
				</div>			

				<?php
				$nextPost = get_next_post();
				if ( !empty( $nextPost ) ){
				?>
					<div class="col-12 col-sm-5 page-btn-single next-right">
				<?php
					$nextthumbnail = get_the_post_thumbnail($nextPost->ID);
					 next_post_link('
						<h5 class="post-nav-title-next" title="'.get_the_title($nextPost->ID).'">%link
						</h5>', '%title'.'', false);
				?>
					</div>
				<?php
				}
				?>
			</div>
			<?php endif; ?>
			<!-- End Pagination -->
			<?php if ( get_theme_mod( 'authorbox_option' ) == 0 ): ?>
			<!-- Start Author Box -->
			<div class="author-container mb-4">
				<div class="p-2 author-box-title">ABOUT THE AUTHOR</div>
				<div class="media author-box">
				    <div class="media-figure">
				        <?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
				    </div>
				    <div class="media-body">
				        <h4 class="text-uppercase"><?php the_author(); ?></h4>
				        <p><?php the_author_meta('description'); ?></p>
				      
				    </div>
				</div>
			</div>
			<?php endif ?>
			<!-- End of Author Box -->
			<?php if ( get_theme_mod('related_display') == 0 ): ?>
			<!-- Start Related Post -->
			<div class="col-12 mb-4 p-0 related-container">
				<?php 
				global $count;
				$posts = get_posts(  );
				$count = count($posts);
				?>
				<?php if ( $count > 1 ) : ?>
				<div class="title-related">
					<p class="titles p-2 mb-0 text-uppercase">Related Posts</p>
				</div>
				<div class="col-12 p-0 mt-4">
                    <?php                
                        get_template_part( 'templates/related', 'single' );
                    ?>
				</div>
				<?php endif ?>
				<!-- End Related Post -->
			</div>
			<?php endif; ?>
			
			</div>
</article>