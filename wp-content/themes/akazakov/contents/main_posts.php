<?
$check = '';
if ( get_post_meta( get_the_ID(), 'camp_in_slider', 'yes' ) )
	$check = 'checked';
?>
<?php if ( is_sticky() && is_home() && ! is_page() ) : ?>
<!--	<h2 class = "camp-featured-post"> -->
	<h2 class = "camp-post-title">
		<?php _e( 'Featured post', 'camp' ); ?>
	</h2>
<?php endif; ?>
<header class = "camp-post-header">
	<h3 class = "camp-post-title">
		<a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>

</header>
<div class="post_content">
    <?php the_post_thumbnail("category-thumb"); ?>
    <div class="other_post">
    <p class = "camp-post-meta">
    <span><span class="post_icon icon_date"></span><?php printf( get_the_date( 'j F, Y' ) ); ?></span>
        <?php if ( is_attachment() && wp_attachment_is_image() )
            echo __( 'in', 'camp' ) . ' <a href = "' .  get_permalink( $post->post_parent ) . '">' . get_the_title( $post->post_parent ) . '</a>';
        else if ( has_category() ) ?>
         <span><span class="post_icon icon_category"></span>        <?the_category( ' ' );?></span>
		 <span><span class="post_icon icon_view"></span> 
			<span class="view_count">
				<? 
					//$count_key = 'post_views_count'; echo getPostViews($post->ID, $count_key);
				?>
				--
			</span>
		 </span>
         <span><span class="post_icon icon_comment"></span> <?php comments_number('нет комментариев', '1 комменатрий', '% комментариев'); ?></span>
	</p>
<?php if ( is_attachment() && wp_attachment_is_image() ) : ?>
	<nav>
		<span class = "prev-img-link">
			<?php previous_image_link( false, __( '&larr; Previous', 'camp' ) ); ?>
		</span>
		<span class = "next-img-link">
			<?php next_image_link( false, __( 'Next &rarr;', 'camp' ) ); ?>
		</span>
	</nav>
	<div class = "attachment">
		<?php echo wp_get_attachment_image( $post->ID, array( 500, 500 ) );
		the_excerpt(); ?>
	</div>
<?php endif;?>

        <div class="exc_post">
       <?
	if ( is_search() || is_home())
		the_excerpt();
	else
            the_content();
	wp_link_pages(); ?>
            <div class="like1">
                 <ul class="nostyle list_sots">
            <li>
                <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
            </li>
           
            <li>
                <g:plusone href="<?=the_permalink();?>/"></g:plusone>
            </li>
 <!--           <li>
                <div id="vk_like<?php echo get_the_ID(); ?>"></div>
                <script type="text/javascript">
                VK.Widgets.Like("vk_like<?php echo get_the_ID(); ?>", {
                    type: "button",
                    pageUrl:"<?php the_permalink();?>",
                    pageTitle: "<?php the_title(); ?>" });
                </script>
            </li> -->
             <li>
                <a class="twitter-share-button" href="https://twitter.com/share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-lang="ru">Tweet</a>
            </li>
        </ul>
            </div>
        </div>
<footer class = "camp-post-footer">
	<?php if ( get_the_tags() ) : ?>
		<p class = "camp-tags"><?php the_tags( __( 'Tags: ', 'camp' ) ); ?></p>
	<?php endif;
	if ( is_single() && current_user_can( 'publish_pages' ) && has_post_thumbnail() ) : ?>
		<form id = "meta-for-slider" method = "post" action = <?php echo get_permalink(); ?>>
			<label><?php _e( 'Add to slider?', 'camp' ); ?></label>
			<input name = "camp_add_to_slider" id = "check-for-slider" type = "checkbox" <?php echo $check; ?>>
			<input name = "save" type = "submit" value = "save">
		</form>
	<?php endif;
	comments_template(); ?>
</footer>
    </div>

</div>
            
