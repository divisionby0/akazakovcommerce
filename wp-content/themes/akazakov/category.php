<?php
/**
 * The template for displaying Category pages
 *
 * @subpackage Camp
 * @since Camp 1.0
 */

get_header(); ?>
<main>
	<?php if ( have_posts() ) :
		$first = true; ?>
                   
		<div id = "content" class = "site-content">
                     <h1 class="main_title"><? echo single_cat_title( '', false )?></h1>
			<?php while ( have_posts() ) : the_post(); ?>
				<div>
					<?php get_template_part( 'content', get_post_format() );
					if ( ! $first ) : ?> <!-- remove top-link for first post -->
						<a class = "camp-top-link" href = "javascript: scroll(0,0)">[<?php _e( 'Top', 'camp' ) ?>]</a>
					<?php endif;
					$first = false; ?>
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