<?php

if (! function_exists('proxyImage')) {
	function proxyImage($imgLink) {
		return 'https://res.cloudinary.com/bbbd/image/fetch/w_100/v1542084333/' . $imgLink;
		
	}
	
	
}


