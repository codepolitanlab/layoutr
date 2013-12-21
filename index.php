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
	// parse query string
	$mainstyle = isset($_GET['s'])? $_GET['s']: 'default';
	$metadata = isset($_GET['m'])? $_GET['m']: 'metadata';
	$layout = isset($_GET['l'])? $_GET['l']: 'layout1';
	$header = isset($_GET['h'])? $_GET['h']: 'header1';
	$content = isset($_GET['c'])? $_GET['c']: 'home1';
	$footer = isset($_GET['f'])? $_GET['f']: 'footer1';
	$boxed = isset($_GET['boxed'])? 'boxed': '';
	
	// this is for main style
	$style = file_exists($theme_path.'css/styles/'.$mainstyle.'/bootstrap.css')? $mainstyle : null;

	// this is custom style
	// for layout
	$layoutfile = strpos($layout, '__')? strstr($layout, '__', true): $layout;
	$layoutcss = file_exists($theme_path.'css/custom/layouts/'.$layoutfile.'.css')? $layoutfile : null;

	// for header
	$headerfile = strpos($header, '__')? strstr($header, '__', true): $header;
	$headercss = file_exists($theme_path.'css/custom/headers/'.$headerfile.'.css')? $headerfile : null;

	// for content
	$contentfile = strpos($content, '__')? strstr($content, '__', true): $content;
	$contentcss = file_exists($theme_path.'css/custom/contents/'.$contentfile.'.css')? $contentfile : null;

	// for footer
	$footerfile = strpos($footer, '__')? strstr($footer, '__', true): $footer;
	$footercss = file_exists($theme_path.'css/custom/footers/'.$footerfile.'.css')? $footerfile : null;

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
	$styles = scandir("themes/$theme/css/styles/");
	array_shift($styles); array_shift($styles);
	$metadatas = filter_array(scandir('template/partials/metadata/'));
	$layouts = filter_array(scandir('template/layouts/'));
	$headers = filter_array(scandir('template/partials/headers/'));
	$contents = filter_array(scandir('template/partials/contents/'));
	$footers = filter_array(scandir('template/partials/footers/'));

	
/* ================================================================== */

/* Begin code ======================================================= */
	$tpl = new RainTPL;
	
	// assign some variables
	$tpl->assign('title', 'layoutr');
	$tpl->assign('theme', $theme);
	$tpl->assign('theme_path', $theme_path);
	$tpl->assign('base_url', $base_url);
	$tpl->assign('layout', $layout);

	// custom styles
	$tpl->assign('style', $style);
	$tpl->assign('layoutcss', $layoutcss);
	$tpl->assign('headercss', $headercss);
	$tpl->assign('contentcss', $contentcss);
	$tpl->assign('footercss', $footercss);

	/* OPTIONS */
	// option list
	$tpl->assign('styles', $styles);
	$tpl->assign('metadata', $metadata);
	$tpl->assign('metadatas', $metadatas);
	$tpl->assign('layouts', $layouts);
	$tpl->assign('headers', $headers);
	$tpl->assign('contents', $contents);
	$tpl->assign('footers', $footers);
	// options value
	$tpl->assign('header', $header);
	$tpl->assign('content', $content);	
	$tpl->assign('footer', $footer);
	$tpl->assign('boxed', $boxed);
	
	// render
	$tpl->draw('layouts/'.$layout);
/* ================================================================== */	

?>