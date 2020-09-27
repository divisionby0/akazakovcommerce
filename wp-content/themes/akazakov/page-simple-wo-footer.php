<?php
/**
 * The template for displaying the simple page.
 *
 * Template name: page-simple-wo-footer
 *
 */
 get_header(); ?>
<style>
.comment_history{display:block!important;}
.facebook_comment{width:100%!important;}
@media only screen and (max-width: 950px) {
    .head_story{
        background: none; margin-top:0px;
        min-height: 470px; height:auto; width:100%;
    }
	.history_content{margin-top: 10px;}
    .story{
        width: 93%;
        height: auto;
    }
	.story{position: relative;}
    .story_losung{
        bottom: 0px; background: none repeat scroll 0 0 rgba(55, 72, 80, 1);
		left: 0px; width:100%;     position: relative;
    }
	.story_losung h3{font-size: 15px;}
	.d_l{margin-left: auto;
    margin-right: auto;
    text-align: center;}
}
@media only screen and (max-width: 920px) {
    .head_story{
        width: 100%;
	}
	.history_array>iframe {
		max-width: 100%;
		height: auto;
	}
}
@media only screen and (max-width: 800px){
	.history_array{
		display: block!important;
	}
}
@media only screen and (max-width: 640px) {
    .head_story {
        min-width: 320px;
    }
    .story{
        width: 88%;
    }}
</style>


<?php while ( have_posts() ) : the_post(); ?>
<?
	$pageMeta = get_post_meta( $post->ID, false, 1 );
	$pageLink = get_permalink($post->ID);
//	echo "pageMeta: <pre>".var_export($pageMeta,true)."</pre>";
	//echo "pageLink: <pre>".var_export($pageLink,true)."</pre>";
	//if(empty($webcoupeData->pageData['meta']['wpcf-rp-content'][0]) === false){
?>
    <div class="head_story" style="background:url(<?=$pageMeta['wpcf-photo-ps'][0]?>)">
        <div class="story">
            <h1><?=$post->post_title?></h1>
            <? the_content($post->post_content); ?>
            </p>
        </div>
<?
		if(	(empty($pageMeta['wpcf-text1-sp'][0]) === false) or (empty($pageMeta['wpcf-text2-sp'][0]) === false) )
?>
        <div class="story_losung">
            <div class="d_l">
                <h3><?=$pageMeta['wpcf-text1-sp'][0]?> <span><?=$pageMeta['wpcf-text2-sp'][0]?></span></h3>
                <span class="arrow_loz"></span>
            </div>
        </div>
    </div>
	<main>
		<div id = "content" class = "site-content history_content">
            
            <?
            	//echo "post: <pre>".var_export($post,true)."</pre>";
				
			?>

            <div>
                <?php //get_template_part( 'content', get_post_format() ); ?>
                                
                <div class="history_array">
<?
				if(empty($pageMeta['wpcf-textbv'][0]) === false){
					echo apply_filters ("the_content", $pageMeta['wpcf-textbv'][0]);;
				}
				if(empty($pageMeta['wpcf-video-sp'][0]) === false){
?>
					<div class="video_block2" style="max-width:849px;">
	                    <iframe width="849" height="463" src="<?=$pageMeta['wpcf-video-sp'][0]?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
<?
				}
				if(empty($pageMeta['wpcf-textuv'][0]) === false){
					echo apply_filters ("the_content", $pageMeta['wpcf-textuv'][0]);;
				}
				
?>
                    <div class="history_like">
                        <ul class="nostyle list_sots">
                            <li>
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=1429009427341658";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-like" data-href="<?=$pageLink?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                            </li>
                            <li>
                                <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                            </li>
<!--                            <li>
                                <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
                                    {lang: 'ru',
                                    size:'medium'}
                                </script>
                                <g:plusone></g:plusone>
                            </li> -->
                        </ul>
                
                
                    </div>
                </div>
                <div class="comment_history">
                    <div class="facebook_comment">
                    <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.12&appId=1440499629514081&autoLogAppEvents=1';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                    
                        
                        <div class="fb-comments" data-href="<?=$pageLink?>" data-width="475" data-numposts="5"></div>
                    </div>
                </div>
            </div>

    	</div> <!-- #content -->
	</main>    
<?php endwhile; ?>
	<?php //get_sidebar();?>
