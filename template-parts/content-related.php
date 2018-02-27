
	<?php 
		$orig_post = $post;
		global $post;
		$tags = wp_get_post_tags($post->ID);
		if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		$args=array(
		'category__in ' => $tag_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page'=>5, // Number of related posts that will be shown.
		'caller_get_posts'=>1
		);
		$my_query = new wp_query( $args );
		if( $my_query->have_posts() ) {

		echo '<div id="relatedposts"><h3>Related Posts</h3><ul>';

		while( $my_query->have_posts() ) {
		$my_query->the_post(); ?>

		<li><div class="relatedthumb"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>
		<div class="relatedcontent">
		<h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<?php the_time('M j, Y') ?>
		</div>
		</li>
		<? }
		echo '</ul></div>';
		}
		}
		$post = $orig_post;
		wp_reset_query(); 
	?>
