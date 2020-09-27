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

if ( post_password_required() ) {
	echo get_the_password_form();

	return;
}
/**
 * @deprecated
 */
$check = new CheckUserAvailability();
$result = $check->execute();

if($result["result"] == true){
	showContent($result["apiKey"], $result["userEmail"], $result["courseTag"]);
}
else{
	$errorKey = $result["error"];
	if($errorKey == AppError::$NOT_LOGGED_IN){
		echo "<div style='width: 100%; text-align: center;'>";
		echo apply_filters( 'learn_press_content_item_protected_message', sprintf( __( 'This content is protected, please <a href="%s">login</a> and enroll course to view this content!', 'learnpress' ), learn_press_get_login_url( learn_press_get_current_url() ) ) );
		echo "</div>";
	}
	else{
		echo "<h1>".Locales::getText($errorKey) ."</h1>";
	}
}

function showContent($apiKey, $userEmail, $courseTag){
	$getRemoteTagsQuery = new GetRemoteEmailTags($apiKey, $userEmail);
	$remoteTags = $getRemoteTagsQuery->execute();

	$courseAvailableForCurrentEmail = in_array($courseTag, $remoteTags);

	if($courseAvailableForCurrentEmail != true){
		echo "<h2>Чтобы увидеть курс вам нужно его купить !</h2>";
	}

	//do_action( 'learn_press_before_main_content' );
	//do_action( 'learn_press_before_single_course' );
	//do_action( 'learn_press_before_single_course_summary' );

	/**
	 * @since 3.0.0
	 */
	//do_action( 'learn-press/before-main-content' );

	//do_action( 'learn-press/before-single-course' );

	?>
	<div id="learn-press-course" class="course-summary">
		<?php
		/**
		 * @since 3.0.0
		 *
		 * @see learn_press_single_course_summary()
		 */
		do_action( 'learn-press/single-course-summary' );
		?>
	</div>
	<?php

	/**
	 * @since 3.0.0
	 */
	//do_action( 'learn-press/after-main-content' );

	//do_action( 'learn-press/after-single-course' );

	/**
	 * @deprecated
	 */
	//do_action( 'learn_press_after_single_course_summary' );
	//do_action( 'learn_press_after_single_course' );
	//do_action( 'learn_press_after_main_content' );
}