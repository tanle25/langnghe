<?php
if (!function_exists('get_image_shop')) {
	function get_image_shop($name) {
		$image = config('admin.base_url').'storage/app/shops/'.$name;
		return $image;
	}
}

if (!function_exists('get_image_shop_doc')) {
	function get_image_shop_doc($name) {
		$image = config('admin.base_url').'storage/app/shop-docs/'.$name;
		return $image;
	}
}

if (!function_exists('get_image_thread')) {
	function get_image_thread($name) {
		$image = config('admin.base_url').'storage/app/threads/'.$name;
		return $image;
	}
}

if (!function_exists('get_image_product')) {
	function get_image_product($name) {
		$image = config('admin.base_url').'storage/app/products/'.$name;
		return $image;
	}
}

if (!function_exists('get_image_user')) {
	function get_image_user($name) {
		$image = config('admin.base_url').'storage/app/threads/no-image.png';
		return $image;
	}
}

