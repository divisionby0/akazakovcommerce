<form class="camp-search-form" action = "<?php echo home_url(); ?>" method = "get">
	<input class="camp-search-txt" type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder = "Введите запрос" />
	<button class="camp-search-btn" type="image"><img src="<?=get_template_directory_uri()?>/images/search_button.png" /></button>
</form>