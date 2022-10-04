<?php
function my_acf_init() {
	$key = get_field('google_map','option');
	//acf_update_setting('google_api_key', $key);
}
add_action('acf/init', 'my_acf_init');