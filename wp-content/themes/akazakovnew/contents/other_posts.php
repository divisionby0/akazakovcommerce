<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<h2>other_posts.php</h2>
<div class="one_post" post_id="<?=$post->ID?>">
 <div class="h_thumb">
            <h2><span><?php the_title(); ?></span></h2>
            <div class="comments_block"><span><?php comments_number('нет комментариев', '1 комменатрий', '% комментариев'); ?></span></div>
        </div>
    <div class="thumbnail">
         <?php if ( has_post_thumbnail()) { ?>
         <?php the_post_thumbnail("blog-featured"); ?>
        <?}else{?>
            <img alt="нет изображения" class="attachment-post-thumbnail wp-post-image" src="http://alexandrkazakov.com/wp-content/themes/akazakov/images/nofotob.gif">
        <?}?>

            </div>
    <div class="single_post_content">
            <?php the_excerpt();?>
    </div>
    <div class="read_more">
        <a href="<?php the_permalink() ?>">Читать полностью<span class="icon_arrow_r"></span><span class="icon_arrow_r"></span></a>
    </div>
<!--    <div class="like right-l"></div>-->
</div>
