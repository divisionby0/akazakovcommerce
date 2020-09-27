<?php
/**
 * Template Name: Blog page template
 *
 * @package WordPress
 * @subpackage akazakovnew
 * @since akazakovnew
 */
get_header();

$themeUrl = get_template_directory_uri();
$noFotoThumb = $themeUrl."images/nofotob.gif";
$siteContentClass = "site-content";

echo "<main class='page52'><div id='content' class='".$siteContentClass."'>";
echo "<h1 class='main_title'>Статьи</h1>";
query_posts(array('paged' => get_query_var('paged')));

if(have_posts()){
    while(have_posts()){
        global $post;
        the_post();
        echo "<div class='one_post'>";

        echo "<div class='h_thumb'>";

        echo "<h2>";
        the_title();
        echo "</h2>";

        echo "<div class='comments_block'>";
        echo "<span>";
        comments_number('нет комментариев', '1 комментарий', '% комментариев');
        echo "</span>";
        echo "</div>";

        echo "</div>";

        echo "<div class='thumbnail'>";
        if(has_post_thumbnail()){
            the_post_thumbnail("blog-featured");
        }
        else{
            echo "<img alt='нет изображения' class='attachment-post-thumbnail wp-post-image' src='".$noFotoThumb."'/>";
        }
        echo "</div>";

        echo "<div class='single_post_content'>";
        the_excerpt();
        echo "</div>";

        echo "<div class='read_more'>";
        echo "<a href='".get_permalink( $post )."'>Читать полностью";
        echo "<span class='icon_arrow_r'></span>";
        echo "<span class='icon_arrow_r'></span>";
        echo "</a>";
        echo "</div>";

        echo "</div>";
    }
    wp_pagenavi();
    wp_reset_query();
}
else{
    echo "<h1>NO BLOG RECORDS</h1>";
}
echo "</div></main>";
get_footer();