<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @subpackage Camp
 * @since Camp 1.0
 */
get_header(); ?>

<main>
	<div id="content" class="site-content">
            <h2 class="main_title">Статьи</h2>
		<?php if ( have_posts() ) :
			$first = true;
                        $i=0;
			while ( have_posts() ) : the_post(); ?>
                            <div class="main-post-dot<? echo $i==9 ? ' last_not_dot':''?>" post_id="<?=$post->ID?>">
                                <?php get_template_part( 'content', get_post_format() );
                                if ( ! $first ) : ?> <!-- remove top-link for first post -->
                                    <a class = "camp-top-link" href = "javascript: scroll(0,0)">[<?php _e( 'Top', 'camp' ) ?>]</a>
                                <?php endif;
                                $first = false; ?>
                            </div>
                            <?$i++;?>
			<?php endwhile; ?>
			<nav class = "camp-paging">
				<?php do_action( 'camp_post_nav' ); ?>
			</nav>
		<?php else : ?>
			<div class = "camp-post">
				<?php get_template_part( 'content', 'none' ); ?>
			</div>
		<?php endif; ?>
                <div class="down_content">
                    <a href="/blog">Перейти в блог <span class='icon_arrow_r'></span><span class='icon_arrow_r'></span></a>
                </div>
	</div> <!-- #content -->
	<?php get_sidebar();

get_footer(); ?>