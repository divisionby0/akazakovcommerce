<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


	// If there is more than 1 image attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image attachment, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}

?>
<div class="attachment">
    <div class="content">
		<p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
			$attachment_width  = apply_filters( 'twentyten_attachment_size', 700 );
			$attachment_height = apply_filters( 'twentyten_attachment_height', 700 );
			echo wp_get_attachment_image( $post->ID, array( $attachment_width, $attachment_height ) ); // filterable image width with, essentially, no limit for image height.
		?></a></p>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php previous_image_link( false, "<< Предыдущая" ); ?></div>
			<div class="nav-next"><?php next_image_link( false, "Следующая >>" ); ?></div>
		</div><!-- #nav-below -->
    </div>
    <div class="single_other">
        <p class = "camp-post-meta">
            <span><span class="post_icon icon_date"></span><?php printf( get_the_date( 'j F, Y' ) ); ?></span>
            <?php if ( is_attachment() && wp_attachment_is_image() )
            echo __( 'Из статьи: ', 'camp' ) . ' <a href = "' .  get_permalink( $post->post_parent ) . '">' . get_the_title( $post->post_parent ) . '</a>';
            else if ( has_category() ) ?>
            <span><span class="post_icon icon_category"></span>     <?the_category( ' ' );?></span>
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
    </div>
</div>
