<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cambodia_Tour_guide
 */

get_header(); ?>
	
	<?php 

	$images = get_field('_image_gallery');
	$size = 'post-slide'; // (thumbnail, medium, large, full or custom size)

	if( $images ): ?>
	<div class="flexslider">
		<ul class="slides">
	        <?php foreach( $images as $image ): ?>
	            <li>
	            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
	            </li>
	        <?php endforeach; ?>
	    </ul>
	</div>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );		

			//the_post_navigation();

			$args = array(
				'category__in' => wp_get_post_categories($post->ID), 
				'numberpost'	=>4
			);
			$relatedpost=get_posts($args);
			if (count($relatedpost)>0) {
				echo '<div id="relatedpost">';
					foreach ($relatedpost as $post) { ?>

						<article id="post-<?php the_ID(); ?>">						
							<?php cambodia_tour_guide_post_thumbnail(); ?>
							<header class="entry-header">
								<?php							
									the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								?>

							</header><!-- .entry-header -->
							<div class="entry-content">							
								<?php echo wp_trim_words( get_the_content(), 18, '...' ); ?>														
							</div><!-- .entry-content -->

						</article><!-- #post-<?php the_ID(); ?> -->

					<?php }
				echo '</div>';
			}


			// If comments are open or we have at least one comment, load up the comment template.
			//if ( comments_open() || get_comments_number() ) :
				//comments_template();
			//endif;

		endwhile; // End of the loop.
		?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
