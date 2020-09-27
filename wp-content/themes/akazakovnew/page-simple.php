<?php
/**
 * The template for displaying the simple page.
 * Template name: page-simple
 */
get_header();

while ( have_posts() ) : the_post();
	$pageMeta = get_post_meta( $post->ID, false, 1 );
	$pageLink = get_permalink($post->ID);
    //echo "<p>page meta:</p>";
    //var_dump($pageMeta);
    $backgroundUrl = $pageMeta['wpcf-photo-ps'][0];
?>
    <div class="head_story" style="background:url(<?php echo $backgroundUrl; ?>)">
        <div class="story">
            <h1><?php $post->post_title ?></h1>
            <?php the_content($post->post_content); ?>
        </div>
<?
		if(	(empty($pageMeta['wpcf-text1-sp'][0]) === false) or (empty($pageMeta['wpcf-text2-sp'][0]) === false) )
?>
        <div class="story_losung">
            <div class="d_l">
                <h3><?php echo $pageMeta['wpcf-text1-sp'][0]; ?> <span><?php echo $pageMeta['wpcf-text2-sp'][0];?></span></h3>
                <span class="arrow_loz"></span>
            </div>
        </div>
    </div>
	<main>
		<div id = "content" class = "site-content history_content">

            <div>
                                
                <div class="history_array">
<?
				if(empty($pageMeta['wpcf-textbv'][0]) === false){
					echo apply_filters ("the_content", $pageMeta['wpcf-textbv'][0]);
				}
				if(empty($pageMeta['wpcf-video-sp'][0]) === false){
?>
					<div class="video_block2" style="max-width:849px;">
	                    <iframe width="849" height="463" src="<?php echo $pageMeta['wpcf-video-sp'][0];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
                                <div class="fb-like" data-href="<?php echo $pageLink; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                            </li>
                            <li>
                                <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                            </li>
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
                        <div class="fb-comments" data-href="<?php echo $pageLink; ?>" data-width="475" data-numposts="5"></div>
                    </div>
                </div>
            </div>

    	</div> <!-- #content -->
	</main>    
<?php endwhile; ?>
	<?php //get_sidebar();?>
<?php get_footer(); ?>