<!DOCTYPE html>
<html lang="en">
    <head>
		<title><?php bloginfo( 'name' ); ?>&nbsp;by Arnold Avancena</title>
		<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <?php wp_head(); ?>        
    </head>

<body <?php body_class(); ?>>
<header id="header-top-design">
	<div class="container">
        <div class="row">
        	<div class="col-12 col-xl-6">
				<div class="headline-container">
					<div class="headline">
						<span class="headline-label">HEADLINE</span>	
						<button class="header-buttons pl-2 pr-2">
							<i class="fa fa-angle-left header-left-right-icons"></i>
						</button>		
						<button class="header-buttons pl-2 pr-2">
							<i class="fa fa-angle-right header-left-right-icons"></i>
						</button>				
					</div>
					<marquee id="myMarquee" class="m-auto" width="70%" onmouseover="this.stop()" onmouseout="this.start()">
					<div class="d-inline-flex">
						<?php 
							$news = new WP_Query( array( 
								'type'					=> 'post',
								'posts_per_page'		=> 6,
								'ignore_sticky_posts'	=> 1
								) );
							if ( $news->have_posts() ) :
								while ( $news->have_posts() ) : $news->the_post();
						?>
						<article id="post-<?php the_ID() ?>" <?php post_class('news-container') ?> >
							<div class="col-12 pl-0 d-inline-flex">
								<header class="pl-2 pr-2 pb-1 pt-1">
									<?php the_title( sprintf( '<p class="text-uppercase d-flex  align-content-center flex-wrap header-links"><a href="%s" class="text-white" title="'.get_the_title().'">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
								</header>
							</div>
						</article>
						<?php endwhile ?> 
					</div>
					<?php endif; wp_reset_postdata(); ?>
					</marquee>					
				</div>				
			</div>						   
    	</div>
	</div>	
</header>

<div class="main-nav-container container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php if ( get_theme_mod( 'site_title_option' ) == 'text-only' ||  get_theme_mod( 'site_title_option' ) == '' ) : ?>
					<div class="pt-2 pb-2">
						<h1 class="site-title mb-0">
							<a <?php echo get_theme_mod( 'header_textcolor' );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<?php $description = get_bloginfo( 'description', 'display' );?>
						<h2 class="mb-0 sub-title-header"<?php echo get_theme_mod( 'header_textcolor' );?>"><?php echo $description; ?></h2>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid hero mb-5">
	<div class="container">
		<div class="row">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb header-breadcrumb-links">
					<?php echo get_breadcrumb(); ?>
				</ol>
			</nav>
			<div class="col-12 col-xl-10 header-title-div">
				<?php echo display_header_details(); ?>	
				
			</div>
			<?php if ( is_single() ) {
					}elseif ( is_archive() ) {
						require_once 'templates/filter-header.php';
					}	
				?>
		</div>
	</div>
</div>

<!-- Scroll Top -->
<div class="container">	
	<button id="btn-scroll-top" class="scroll-top-arrow" style="display: none;">
		<i class="fa fa-chevron-up text-white" style="font-size:24px"></i>
	</button>
</div>