<?php
/**
 * The template for displaying all single posts
 *
 * @subpackage Camp
 * @since Camp 1.0
 */

get_header(); ?>
<main>
	<div id = "content" class = "site-content">
<!--            <h3 class="main_title">Статьи</h3>-->
		<?php if ( have_posts() ) : the_post(); ?>
			<div>
				<?php get_template_part( 'content', get_post_format() ); 
                                       //comments_template(); 
									   ?>
			</div>
		<?php endif; ?>
		<nav class = "camp-paging">
			
		</nav>
	</div> <!-- #content -->
	<?php get_sidebar();
get_footer(); ?>