<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

	global $page, $paged, $woocommerce, $main_theme, $webcoupeData;
	$webcoupeData->getPageData(get_the_ID());
    $permalink = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $isLessonPage = strpos($permalink, '/lessons/');
    $isQuizPage = strpos($permalink, '/quizzes/');
    $isCoursesPage = strpos($permalink, '/courses/');

    if($isQuizPage == true || $isQuizPage == 1){
       echo '<div id="quizPage" style="display: none;">true</div>';
    }
?>


<div class="one_post" post_id="<?=$post->ID?>">
 <div class="h_thumb">
     <h1><?php the_title(); ?></h1>
     <?php 
        if($isLessonPage == false){
            ?>
            <div class="comments_block"><span><?php comments_number('нет комментариев', '1 комменатрий', '% комментариев'); ?></span></div>
            <?php
        }
     ?>
  </div>
    <div class="thumbnail">
        <?php the_post_thumbnail("blog-featured"); ?>
    </div>
    
    <div class="single_post_content">
            <?php
            if($isLessonPage == true){
                $check = new CheckUserAvailability();
                $result = $check->execute();

                if($result["result"] == true){
                    the_content();
                    showSingleOtherPart($post);
                }
                else{
                    $errorKey = $result["error"];
                    echo "<h1>".Locales::getText($errorKey) ."</h1>";
                }
            }
            else{
                // TODO not courses or course or lesson page - do standard actions
                the_content();
                showSingleOtherPart($post);
            }
            ?>
    </div>
<?php
	if(empty($webcoupeData->pageData['meta']['wpcf-rp-content'][0]) === false){
?>
		<div class="related-posts">
			<span class="title"><?=$webcoupeData->pageData['meta']['wpcf-rp-title'][0]?></span>
			<?=apply_filters( 'the_content', $webcoupeData->pageData['meta']['wpcf-rp-content'][0] )?>
		</div>
<?php	
	}
    if ($isLessonPage == false && $isCoursesPage == false) {
?>
        <div class="down_content">
            <?php previous_post_link('%link', ''.__('Следующая статья').'<span class="icon_arrow_r"></span><span class="icon_arrow_r"></span>'); ?>

            <?php //next_post_link('%link');?>
        </div>

        <div class="single_comments">
            <span class="commentstitle">Оставьте комментарий</span>
            <?php comments_template(); ?>
        </div>
    <?php
    }
?>
</div>