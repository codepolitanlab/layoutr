<?php

	include "libs/raintpl/rain.tpl.class.php";

	raintpl::configure("tpl_dir", "layouts/" );
	raintpl::configure("cache_dir", "tmp/" );

	$tpl = new RainTPL;

	$layout = (isset($_GET['l'])) ? $_GET['l'] : 'homepage1';
	$html = $tpl->draw($layout,true);
    echo $html;
	
?>