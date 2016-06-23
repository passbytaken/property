<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_role_priv_model extends Base_Model {
	public function __construct() {
		$this->table_name = 'admin_role_priv';
		parent::__construct();
	}
}
