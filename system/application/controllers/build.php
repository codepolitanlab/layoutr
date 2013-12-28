<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Build extends CI_Controller {

	// theme components
	public $components = array(
		'mainstyle'	=> 'default',
		'boxed'		=> 'boxed',
		'metadata'	=> 'metadata',
		'layout'	=> 'layout1',
		'header'	=> 'header1',
		'content'	=> 'home1',
		'footer'	=> 'footer1'
		);

	public $framework = 'bootstrap';

	function __construct()
	{
		parent::__construct();

		// load lex parser library
		include_once(APPPATH.'libraries/Lex/Parser.php');

		$this->components['template_path'] = base_url().TEMPLATEPATH;
		$this->components['theme_path'] = base_url().THEMEPATH;
	}

	// preview page
	public function index()
	{
		$parser = new Lex\Parser();

		$data = $this->components;

		// overide component with parsed uri string
		$params = $this->uri->uri_to_assoc(3);

		if(isset($params['s'])) $data['mainstyle'] = $params['s'];
		if(isset($params['m'])) $data['metadata'] = $params['m'];
		if(isset($params['l'])) $data['layout'] = $params['l'];
		if(isset($params['h'])) $data['header'] = $params['h'];
		if(isset($params['c'])) $data['content'] = $params['c'];
		if(isset($params['f'])) $data['footer'] = $params['f'];
		if(isset($params['boxed'])) $data['boxed'] = 'boxed';

		// this is for main style
		$style = file_exists(theme_path($this->framework.'/css/styles/'.$data['mainstyle'].'/'.$this->framework.'.css'))? $data['mainstyle'] : null;

		// this is custom style
		// for layout
		$layoutfile = strpos($data['layout'], '__')? strstr($data['layout'], '__', true): $data['layout'];
		$layoutcss = file_exists(theme_path('bootstrap/css/custom/layouts/'.$layoutfile.'.css'))? $layoutfile : false;
		
		// for header
		$headerfile = strpos($data['header'], '__')? strstr($data['header'], '__', true): $data['header'];
		$headercss = file_exists(theme_path('bootstrap/css/custom/headers/'.$headerfile.'.css'))? $headerfile : false;

		// for content
		$contentfile = strpos($data['content'], '__')? strstr($data['content'], '__', true): $data['content'];
		$contentcss = file_exists(theme_path('bootstrap/css/custom/contents/'.$contentfile.'.css'))? $contentfile : false;

		// for footer
		$footerfile = strpos($data['footer'], '__')? strstr($data['footer'], '__', true): $data['footer'];
		$footercss = file_exists(theme_path('bootstrap/css/custom/footers/'.$footerfile.'.css'))? $footerfile : false;

		// add main and custom styles
		$data['style'] = $style;
		$data['layoutcss'] = $layoutcss;
		$data['headercss'] = $headercss;
		$data['contentcss'] = $contentcss;
		$data['footercss'] = $footercss;

		$template = $parser->parse(get_layout('layout1'), $data, 'Build::the_callback');
		$template = $parser->parseVariables($template, $data);
		
		$this->output->set_output($template);
	}

	/*
	 * $name 		partial.(headers|contents|footers|metadata|switcher) 
	 * $attributes 	file
	 */
	function the_callback($name, $attributes, $content)
	{
		$parser = new Lex\Parser();

		// tag name
		$type = explode('.', $name);

		// specify file extension
		$ext = '';
		if(isset($attributes['ext']))
			$ext = $attributes['ext'];

		// if file attribute specified
		if(isset($attributes['file']))
		{
			// if segment 2 name specified
			if(isset($type[1]))
			{
				// for partial template
				if($type[0] == 'partials')
					return $parser->parse(get_partial( $type[1].'/'.$attributes['file'].$ext ));
			} 

			// if segment 1 name not specified, i.e. {{ partials file="" }}
			else {

				// load from root partials/
				return $parser->parse(get_partial( $attributes['file'].$ext ));
			}
		} 

		// if file attribute not specified, then load from root templates/
		else {
			return $parser->parse(get_template( $type[1].$ext ));
		}

		return $content;
	}

	function build_switcher($params = array())
	{
		$parser = new Lex\Parser();
		
		$data['styles'] = scandir(theme_path("/{$this->framework}/css/styles/"));

		print_r($data['styles']);

		// this id for delete '.' and '..' folders
		array_shift($styles); array_shift($styles);

		$data['metadatas'] = $this->filter_array(scandir(template_path('partials/metadata/')));
		$data['layouts'] = $this->filter_array(scandir(template_path('layouts/')));
		$data['headers'] = $this->filter_array(scandir(template_path('partials/headers/')));
		$data['contents'] = $this->filter_array(scandir(template_path('partials/contents/')));
		$data['footers'] = $this->filter_array(scandir(template_path('partials/footers/')));

		return $parser->parse(get_template('switcher'), $data);
	}

	function filter_array($array){
		$result = array();
		foreach ($array as $value) {
			if($value != '.' && $value != '..'){
				$result[] = substr($value, 0, count($value) - 5); // remove .html or .css
			}
		}
		return $result;
	}

}

/* End of file build.php */
/* Location: ./application/controllers/build.php */