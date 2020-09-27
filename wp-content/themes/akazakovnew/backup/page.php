
<?php get_header(); ?>
   
        <?if(is_page(52)):?>
         <main class = "page52"><div id = "content" class = "site-content <?if(is_page(2)):?>history_content<?endif;?>">
                 <h1 class="main_title">Статьи</h1>
            <?query_posts(array('paged' => get_query_var('paged')));
            if( have_posts() ){
                while( have_posts() ){
                    the_post();?>
                   <div class="one_post">
                    <div class="h_thumb">
                        <h2><?php the_title(); ?></h2>
                        <div class="comments_block">
                            <span>
                                <?php comments_number('нет комментариев', '1 комменатрий', '% комментариев'); ?>
                            </span>
                        </div>
                    </div>
                        <div class="thumbnail">
                             <?php if ( has_post_thumbnail()) { ?>
                             <?php the_post_thumbnail("blog-featured"); ?>
                            <?}else{?>
                                <img alt="нет изображения" class="attachment-post-thumbnail wp-post-image" src="http://kazakovcommercenew/wp-content/themes/akazakov/images/nofotob.gif">
                            <?}?>

                        </div>
                       
                        <div class="single_post_content">
                                <?php the_excerpt();?>
                        </div>
                        <div class="read_more">
                            <a href="<?php the_permalink() ?>">Читать полностью<span class="icon_arrow_r"></span><span class="icon_arrow_r"></span></a>
                        </div>
                    </div>
               <?}wp_pagenavi(); wp_reset_query();
               
               }else{?>
            
        <?}?>
        <?else:?>
        <?
    if (!is_page(array(311,316,2281))):?>
                 <main>
                 <div id = "content" class = "site-content <?if(is_page(2)):?>history_content<?endif;?>">
        <?endif;?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div>
                <?php get_template_part( 'content', get_post_format() ); ?>
            </div>
            <?php endwhile; ?>
        <?endif;?>
    </div>
    <?
if(!is_page(array(2,49,46,311,316,2281))):?>
        <?php get_sidebar();?>
    <?endif;?>
<? get_footer(); ?>
