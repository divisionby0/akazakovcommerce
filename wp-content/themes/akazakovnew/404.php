<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @subpackage Camp
 * @since Camp 1.0
 */

get_header(); ?>
	<div id = "content" class = "site-content">
		<div <?php post_class(); ?>>
			<header class = "camp-post-header">
				<h1 class = "camp-post-title">Ошибка 404</h1>
			</header>
			<p><?php _e( 'Ничего не найдено.', 'camp' ); ?></p>
			<?php get_search_form(); ?>
		</div> <!-- .post -->
	</div> <!-- #content -->
	<?php get_sidebar();
get_footer(); ?>