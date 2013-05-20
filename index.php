<?php
/* iclude rainTPL and configure it ================================== */
	include "raintpl/rain.tpl.class.php";
	raintpl::configure('base_url', 'http://localhost/layoutr/');
	raintpl::configure("tpl_dir", "layouts/" );
	raintpl::configure("cache_dir", "tmp/" );
/* ================================================================== */
	
/* set some variables =============================================== */
	// parse uri for layout
	$uri = explode("/", $_SERVER['REQUEST_URI']);
	$layout = (!empty($uri[2])) ? $uri[2] : 'layout1';
	
	// folder theme name, set this to your own theme
	$theme = "bootstrap";
	$theme_path = "themes/$theme/";

	// this is custom style, make it the same name with its layout, otherwise it will use default style
	$style = file_exists($theme_path.$layout.'.css')? $layout : null;

/* ================================================================== */

/* Begin code ======================================================= */
	$tpl = new RainTPL;
	
	// assign some variables
	$tpl->assign('theme', $theme);
	$tpl->assign('theme_path', $theme_path);
	$tpl->assign('style', $style);

	$header = isset($_GET['h'])? $_GET['h']: 'header1';
	$tpl->assign('header', $header);

	$content = isset($_GET['c'])? $_GET['c']: 'content1';
	$tpl->assign('content', $content);	

	$footer = isset($_GET['f'])? $_GET['f']: 'footer1';
	$tpl->assign('footer', $footer);

	// render
	$tpl->draw($layout); 
/* ================================================================== */	

?>