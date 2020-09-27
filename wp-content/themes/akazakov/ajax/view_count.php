<?
require_once("../../../../wp-config.php"); 
$data = $_POST;
//echo "data: <pre>"; print_r($data); echo "</pre><br>";
if($data['mode'] == "set_view_count" and is_array($data['posts'])){
	$count_key = 'post_views_count'; 
	$xml = "<views>";
	foreach($data['posts'] as $post_id){
		$xml.= "<post post_id='".$post_id."' views_count='".setPostViews($post_id, $count_key)."'></post>";
	}
	$xml.= "</views>";
}
else if($data['mode'] == "get_view_count" and is_array($data['posts'])){
	$count_key = 'post_views_count'; 
	$xml = "<views>";
	foreach($data['posts'] as $post_id){
		$xml.= "<post post_id='".$post_id."' views_count='".getPostViews($post_id, $count_key)."'></post>";
	}
	$xml.= "</views>";
}
echo $xml;
?>