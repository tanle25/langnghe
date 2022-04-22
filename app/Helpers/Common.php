<?php
if (!function_exists('get_client_ip')) {
	function get_client_ip() {
	   	$ip = false;
	    if(isset($_SERVER)) 
	    {
	        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        {
	            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	        }
	        elseif(isset($_SERVER['HTTP_CLIENT_IP']))
	        {
	            $ip = $_SERVER['HTTP_CLIENT_IP'];
	        }
	        elseif(isset($_SERVER['HTTP_X_FORWARDED']))
	        {
	            $ip = $_SERVER['HTTP_X_FORWARDED'];
	        }
	        elseif(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
	        {
	            $ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
	        }
	        elseif(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        {
	            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
	        }
	        elseif(isset($_SERVER['HTTP_FORWARDED']))
	        {
	            $ip = $_SERVER['HTTP_FORWARDED'];
	        }
	        else
	        {
	            $ip = $_SERVER['REMOTE_ADDR'];
	        }
	    }
	    else
	    {
	        if(getenv('HTTP_X_FORWARDED_FOR'))
	        {
	            $ip = getenv('HTTP_X_FORWARDED_FOR');
	        }
	        elseif(getenv('HTTP_CLIENT_IP'))
	        {
	            $ip = getenv('HTTP_CLIENT_IP');
	        }
	        else
	        {
	            $ip = getenv('REMOTE_ADDR');
	        }
	    }
	    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
	}
}

