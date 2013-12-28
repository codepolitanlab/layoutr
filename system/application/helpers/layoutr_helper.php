<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('theme_path'))
{
	function theme_path($path = '')
	{
		$CI =& get_instance();
		return THEMEPATH.$path;
	}
}

if ( ! function_exists('template_path'))
{
	function template_path($path = '')
	{
		$CI =& get_instance();
		return TEMPLATEPATH.$path;
	}
}

if ( ! function_exists('theme_url'))
{
	function theme_url($path = '')
	{
		$CI =& get_instance();
		return $CI->config->base_url().THEMEPATH.$path;
	}
}

if ( ! function_exists('template_url'))
{
	function template_url($path = '')
	{
		$CI =& get_instance();
		return $CI->config->base_url().TEMPLATEPATH.$path;
	}
}

if ( ! function_exists('get_layout'))
{
	function get_layout($layout = '', $ext = '.php')
	{
		if(strpos('.php', $layout))
			$ext = '';

		return read_file(TEMPLATEPATH.'/layouts/'.$layout.$ext);
	}
}

if ( ! function_exists('get_partial'))
{
	function get_partial($file = '', $ext = '.php')
	{
		if(strpos('.php', $file))
			$ext = '';

		return read_file(TEMPLATEPATH.'/partials/'.$file.$ext);
	}
}

if ( ! function_exists('get_template'))
{
	function get_template($file = '', $ext = '.php')
	{
		if(strpos('.php', $file))
			$ext = '';

		return read_file(TEMPLATEPATH.$file.$ext);
	}
}
