<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambodia_Tour_guide
 */

get_header(); ?>
	
	<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="<?php echo get_template_directory_uri().'/images/slider/bayon-temple.jpg'; ?>" />
			</li>
			<li>
				<img src="<?php echo get_template_directory_uri().'/images/slider/history-tours.jpg'; ?>" />
			</li>
			<li>
				<img src="<?php echo get_template_directory_uri().'/images/slider/slideshow_1.jpg'; ?>" />
			</li>
			<li>
				<img src="<?php echo get_template_directory_uri().'/images/slider/slideshow_2.jpg'; ?>" />
			</li>
		</ul>
	</div>
	

	<div class="content-aboutus">
			<h1>WELCOME TO ANGKOR WAT SHARED TOURS</h1>
			<p>
				We've been pioneering unique journeys in Asia for more than two decades. Across each of the ten countries we operate in, we've developed in-depth tours that go far beyond the surface to reveal the heart of each destination. Along with our team of local and in-destination travel experts and time-tested logistics, we combine encyclopedic knowledge of the region with a progressive vision to make us one of Asia's most trusted and exciting DMCs.
			</p>
	</div>
	<div id="home-page">
		<?php 
			if(have_posts()):
				 $j = 0; // counter
				while (have_posts()) : the_post();
					 $j++; ?>
					<article id="post-<?php the_ID(); ?>" class="<?php echo (($j+3) % 4 == 0) ? ' first' : ''; echo ($j % 4 == 0) ? ' last' : '';?>">
						<?php cambodia_tour_guide_post_thumbnail(); ?>
						<header class="entry-header">
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif; ?>
						</header><!-- .entry-header -->						

						<div class="entry-content">
							<?php if (!is_singular()): ?>
								<?php echo wp_trim_words( get_the_content(), 18, '...' ); ?>
							<?php endif ?>
							<?php if (is_singular()): ?>
								<?php
									the_content( sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cambodia-tour-guide' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										get_the_title()
									) );

									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cambodia-tour-guide' ),
										'after'  => '</div>',
									) );
								?>
							<?php endif; ?>
						</div><!-- .entry-content -->

					</article><!-- #post-<?php the_ID(); ?> -->
					<?php 
				endwhile;
			endif;
		?>
	</div>
	

<?php

get_footer();
