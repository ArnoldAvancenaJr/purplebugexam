<?php

	$first_category = wp_get_post_terms( get_the_ID(), 'category' )[0]->name;
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'category_name' => $first_category,
		'posts_per_page' => 5,
	);
	$arr_posts = new WP_Query( $args );	  
	if ( $arr_posts->have_posts() ) :	  
		while ( $arr_posts->have_posts() ) :
			$arr_posts->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="row archive-page-content">
				<div class="col-12 col-xl-6">
				<div class="row no-gutters mb-2">
					<div class="meta-time mr-auto">
						<small><?php the_time( 'F j, Y' ) ?></small>
					</div>
					<div class="meta-author mr-auto">
						<small><?php echo '<span><i class="fa fa-user text-secondary" style="font-size:15px"></i></span>'.' '.get_the_author() ?></small>
					</div>
					<div class="meta-commen mr-auto">
						<small><?php echo '<span class=""><i class="fa fa-comments text-secondary" style="font-size:15px"></i></span>' . ' ' . comment_count() ?></small>
					</div>		
					<div class="meta-author mr-auto">
						<small><?php echo '<span><i class="fa fa-eye text-secondary" style="font-size:15px"></i></span>'.' '. getPostViews(get_the_ID()); ?></small>
					</div>
				</div>
				<figure>
					<a href="<?php the_permalink(); ?>">
						<img class="img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" onerror="javascript:this.src='<?php echo get_template_directory_uri() . "/assets/img/No_image.png"; ?>'" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
					</a>
				</figure>
				<div class="categories-cats">
				<?php
				$category = get_the_category();
				if ( !empty( $category[0]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
				endif;
				if ( !empty( $category[1]->cat_name ) ) :
					echo '<a href="' . get_category_link($category[1]->term_id) . '">' . $category[1]->cat_name . '</a>';
				endif;
				?>
			</div>
			</div>
			<div class="col-12 col-xl-6 archive-content-section">
				<div class="section">				
					<div>
						<div>
						<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>
				</div>
			</div>
			</div>
			</article>
			<?php
		endwhile;
	endif;
 ?>