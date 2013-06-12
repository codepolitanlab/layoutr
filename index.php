<?php
	// folder theme name, set this to your own theme
	$base_url = 'http://localhost/layoutr/';
	$theme = "bootstrap";
	$theme_path = "themes/$theme/";

/* iclude rainTPL and configure it ================================== */
	include "raintpl/rain.tpl.class.php";
	raintpl::configure('base_url', $base_url);
	raintpl::configure("tpl_dir", "template/" );
	raintpl::configure("cache_dir", "tmp/" );
	raintpl::configure( 'path_replace', false );
/* ================================================================== */
	
/* set some variables =============================================== */
	// parse uri for layout
	$layout = isset($_GET['l'])? $_GET['l']: 'layout1';
	

	// this is custom style, make it the same name with its layout, otherwise it will use default style
	$style = file_exists($theme_path.'css/'.$layout.'.css')? $layout : null;

/* ================================================================== */

/* Get headers, content, footers list from folders =================== */
	function filter_array($array){
		$result = array();
		foreach ($array as $value) {
			if($value != '.' && $value != '..'){
				$result[] = substr($value, 0, count($value)-6); // remove .html
			}
		}
		return $result;
	}
	$layouts = filter_array(scandir('template/layouts/'));
	$headers = filter_array(scandir('template/partials/headers/'));
	$contents = filter_array(scandir('template/partials/contents/'));
	$footers = filter_array(scandir('template/partials/footers/'));

	
/* ================================================================== */

/* Begin code ======================================================= */
	$tpl = new RainTPL;
	
	// assign some variables
	$tpl->assign('theme', $theme);
	$tpl->assign('theme_path', $theme_path);
	$tpl->assign('base_url', $base_url);
	$tpl->assign('style', $style);
	$tpl->assign('layout', $layout);

	// get layout list
	$tpl->assign('layouts', $layouts);
	$tpl->assign('headers', $headers);
	$tpl->assign('contents', $contents);
	$tpl->assign('footers', $footers);

	$header = isset($_GET['h'])? $_GET['h']: 'header1';
	$tpl->assign('header', $header);

	$content = isset($_GET['c'])? $_GET['c']: '1col';
	$tpl->assign('content', $content);	

	$footer = isset($_GET['f'])? $_GET['f']: 'footer1';
	$tpl->assign('footer', $footer);

	// render
	$tpl->draw('layouts/'.$layout); 
/* ================================================================== */	

?>