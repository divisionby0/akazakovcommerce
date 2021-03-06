<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @subpackage Camp
 * @since Camp 1.0
 */

get_header(); ?>
<main>
	<?php if ( have_posts() ) :
		$first = true; ?>
		<div id = "content" class = "site-content">

		<h3 class="main_title">
			<?php printf( __( 'Tag: %s', 'camp'), single_tag_title( '', false ) ); ?>
		</h3>
			<?php while ( have_posts() ) : the_post(); ?>
				<div <?php post_class(); ?>>
					<?php get_template_part( 'content', get_post_format() );
						if ( ! $first ) : ?> <!-- remove top-link for first post -->
							<a class = "camp-top-link" href = "javascript: scroll(0,0)">[<?php _e( 'Top', 'camp' ) ?>]</a>
					<?php endif; $first = false; ?>
				</div> <!-- .post -->
			<?php endwhile; ?>
			<nav class = "camp-paging">
				<?php do_action( 'camp_post_nav' ); ?>
			</nav>
		</div> <!-- #content -->
	<?php else : ?>
		<div class = "camp-post">
			<?php get_template_part( 'content', 'none' ); ?>
		</div>
	<?php endif;
	get_sidebar();
get_footer(); ?>