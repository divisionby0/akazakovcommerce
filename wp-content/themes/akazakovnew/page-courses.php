<?php
/**
 * Template Name: Courses page template
 *
 * @package WordPress
 * @subpackage akazakovnew
 * @since akazakovnew
 */
get_header("courses"); // TODO переделать хедер под эту страницу

//do_action( 'learn_press_before_main_content' );
//do_action( 'learn-press/before-main-content' );
//do_action( 'learn_press_archive_description' );
//do_action( 'learn-press/archive-description' );

global $wpdb;
new CoursesPageContent($wpdb);

//do_action( 'learn-press/after-main-content' );
//do_action( 'learn_press_after_main_content' );

get_footer();
?>
