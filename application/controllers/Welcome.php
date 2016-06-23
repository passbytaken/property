<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends MY_Controller {
	
	var $items;
	function __construct()
	{
		parent::__construct();
	}
	
	function Index()
	{
		redirect("adminpanel");
	}
	
}