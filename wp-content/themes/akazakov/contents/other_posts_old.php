<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="one_other_post">
  <div class="h_thumb">
            <h1><span><?php the_title(); ?></span></h1>
           </div>
    <div class="thumbnail">
         <?php the_post_thumbnail("blog-featured"); ?>

    </div>
    <div class="single_post_content">
            <?php the_content();?>
    </div>
    <div class="single_other">
        <p class = "camp-post-meta">
            <span><span class="post_icon icon_date"></span><?php printf( get_the_date( 'j F, Y' ) ); ?></span>
            <?php if ( is_attachment() && wp_attachment_is_image() )
            echo __( 'in', 'camp' ) . ' <a href = "' .  get_permalink( $post->post_parent ) . '">' . get_the_title( $post->post_parent ) . '</a>';
            else if ( has_category() ) ?>
            <span><span class="post_icon icon_category"></span>     <?the_category( ' ' );?></span>
            <span><span class="post_icon icon_comment"></span> <?php comments_number('нет комментариев', '1 комменатрий', '% комментариев'); ?></span>
	</p>
    </div>
</div>
