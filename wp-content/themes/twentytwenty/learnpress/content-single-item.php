<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-single-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
//do_action( 'learn-press/before-main-content' );
//do_action( 'learn-press/before-single-item' );

//$post_type = get_post_type();
//echo "<p>post type:".$post_type."</p>";
//echo "<p>user logged in: ".is_user_logged_in()."</p>";

$current_user = wp_get_current_user();

//echo "<p>current user:</p>";
//var_dump($current_user);

$permalink = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$isQuizPage = strpos($permalink, '/quizzes/');

if($isQuizPage == false){
	echo "<p>Not quiz page</p>";
}
else{
	echo "<p>is quiz page</p>";
	$questionId = get_the_ID();
	echo "<p>questionId:".$questionId."</p>";

	echo "<p>type:".learn_press_get_post_type( $questionId )."</p>";
}

//echo $current_user->user_email;
?>
	<div id="learn-press-course" class="course-summary">
		<?php
		do_action( 'learn-press/single-item-summary' );
		?>
	</div>

<?php

/**
 * @since 3.0.0
 */
//do_action( 'learn-press/after-main-content' );

//do_action( 'learn-press/after-single-course' );
