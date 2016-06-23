<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Staff_model extends Base_Model {
	
	var $page_size=10;
	
	public function __construct() {
		$this->table_name = 'staff';
		parent::__construct();
	}
	
	function default_info()
	{
		return array('staff_id'=>0,'username'=>'','fullname'=>'','email'=>'','group_id'=>0);
	}
	
}
