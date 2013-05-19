<?php
	// parse uri
	$uri = explode("/", $_SERVER['REQUEST_URI']);
	
	include "libs/raintpl/rain.tpl.class.php";
	
	raintpl::configure('base_url', 'http://localhost/layoutr/');
	raintpl::configure("tpl_dir", "layouts/" );
	raintpl::configure("cache_dir", "tmp/" );

	$tpl = new RainTPL;
	
	$layout = (isset($uri[2])) ? $uri[2] : 'homepage1';
	$tpl->draw($layout);
	
?>