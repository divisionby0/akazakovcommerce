<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @subpackage Camp
 * @since Camp 1.0
 */

//echo "is_attachment: ".is_attachment()."<br>"; 
//echo "wp_attachment_is_image: ".wp_attachment_is_image()."<br>";
if(is_attachment()){
    include "contents/attachment.php";		
}
else if(is_home()){
    include "contents/main_posts.php";
}elseif(is_category()){
    include "contents/category_posts.php";
}elseif(is_single()){
    include "contents/single_posts.php";
}elseif(is_page(2)){
    include "contents/category_history.php";
}elseif(is_page(49)){
    include "contents/content_proj.php";
}elseif(is_page(46)){
    include "contents/content_contact.php";
}elseif(is_page(311)){
    include "contents/content_land.php";
//}elseif(is_page(316)){
}elseif(is_page(2281)){
    include "contents/landing_content.php";
}else{
    include "contents/other_posts.php";
}?>
<div class="clear"></div>
