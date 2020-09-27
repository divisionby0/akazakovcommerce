<?php
/**
 * Template for displaying students of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/students.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$course = learn_press_get_course();

// Do not show if course is no require enrollment
if ( ! $course || ! $course->is_required_enroll() ) {
	return;
}
?>