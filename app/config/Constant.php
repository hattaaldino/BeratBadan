<?php
	define('BASE_URL', 'http://localhost/beratbadan/');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'berat');

	function base_url($uri=''){
		return BASE_URL . $uri;
	}
	
?>