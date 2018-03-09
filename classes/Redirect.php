<?php

class Redirect {
	private function __construct() {}
	
	public static function to($url = null) {
		if($url) {
			if (is_numeric($url)) {
				switch($url) {
					case 404:
						header('HTTP/1.0 404 Not Found');
						include 'includes/errors/404.php';
						exit();
					break;
				}
			}
			header('Location:'.$url.'.php');
			exit();
		}
	}
	
}