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
	// this is for main style
	$mainstyle = isset($_GET['s'])? $_GET['s']: 'bootstrap';
	$style = file_exists($theme_path.'css/styles/'.$mainstyle.'.css')? $mainstyle : null;

/* ================================================================== */

/* Get headers, content, footers list from folders =================== */
	function filter_array($array){
		$result = array();
		foreach ($array as $value) {
			if($value != '.' && $value != '..'){
				if(strpos($value,'.html')) $minus = 6; else $minus = 5;
				$result[] = substr($value, 0, count($value)-$minus); // remove .html or .css
			}
		}
		return $result;
	}
	$styles = filter_array(scandir("themes/$theme/css/styles/"));
	$pages = filter_array(scandir('template/shortcodes/pages/'));
	
/* ================================================================== */

/* Begin code ======================================================= */
	$tpl = new RainTPL;
	
	// assign some variables
	$tpl->assign('title', 'shortcodes');
	$tpl->assign('theme', $theme);
	$tpl->assign('theme_path', $theme_path);
	$tpl->assign('base_url', $base_url);
	$tpl->assign('style', $style);

	$page = isset($_GET['p'])? $_GET['p']: 'home';
	$tpl->assign('page', $page);

	// get pages list
	$tpl->assign('styles', $styles);
	$tpl->assign('pages', $pages);

	// render
	$tpl->draw('shortcodes/index'); 
/* ================================================================== */	

?>