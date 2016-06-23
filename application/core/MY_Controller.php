<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	private  $is_load_captcha;
	public $aci_config,$area_list;
	protected $page_data = array(
				'module_name' => '',
				'controller_name' => '',
				'method_name' => '',
	);
	
	
    function __construct(){
		parent::__construct();
		$this->load->driver('cache',array('adapter'=>'file'));
		$this->page_data['folder_name']=substr($this->router->directory, 0, -1) ;
	

		$this->page_data['controller_name']= $this->router->class;
		$this->page_data['method_name']= $this->router->method;
		$this->page_data['controller_info']= $this->config->item($this->page_data['controller_name'],'module');
		$this->load->vars($this->page_data);
	}
	
	protected function view($view_file,$sub_page_data=NULL,$autoload_header_footer_view= true)
	{
		$view_file= $this->page_data['folder_name'].DIRECTORY_SEPARATOR.$this->page_data['controller_name'].DIRECTORY_SEPARATOR.$view_file;
		
		$this->load->view(reduce_double_slashes($view_file),$sub_page_data);
	}
}

class Member_Controller extends MY_Controller{
	public $current_yezhu_id;
	public $current_yezhu_username;
	public $current_member_info;
	function __construct(){
		parent::__construct();
		$this->load->model(array('Yezhu_model'));
		define("IN_MEMBER", TRUE);
		self::check_member();
		
		$this->current_yezhu_username=$this->session->userdata('yezhu_username');
		$this->current_yezhu_id=$this->session->userdata('yezhu_id');
	}
	
	/**
	 * 判断用户是否已经登陆
	 */
	 protected function check_member() {
		 
	 	if(!$this->session->userdata('yezhu_id')&&!($this->router->directory=='yezhu/'&&strtolower($this->router->class)=='manage'&&strtolower($this->router->method)=='login'))
		{
			$this->showmessage('请您重新登录',site_url('yezhu/manage/login'));
			exit(0);
		}
		$this->current_member_info = $this->Yezhu_model->get_one(array('yezhu_id'=>$this->current_yezhu_id));
	}
	
	
	/**
	 * 自动模板调用
	 * 
	 * @param $module
	 * @param $template
	 * @param $istag
	 * @return unknown_type
	 */
	protected function view($view_file,$sub_page_data=NULL,$autoload_header_footer_view= true)
	{
		$view_file= $this->page_data['folder_name'].DIRECTORY_SEPARATOR.$this->page_data['controller_name'].DIRECTORY_SEPARATOR.$view_file;
		
		
		$page_data['current_yezhu_id']=$this->current_yezhu_id;//当前用户id
		
		$page_data['sub_page']=$this->load->view(reduce_double_slashes($view_file),$sub_page_data,true);
		if($autoload_header_footer_view)
		{
			$this->load->view('yezhu/header',$page_data);
			$this->load->view('yezhu/index',$page_data);
		 	$this->load->view('yezhu/footer',$page_data);
		}else
		{
			$this->load->view('yezhu/header',$page_data);
			$this->load->view(reduce_double_slashes($view_file),$sub_page_data);
			$this->load->view('yezhu/footer',$page_data);
		}
	}
	
	protected function showmessage($msg, $url_forward = '', $ms = 100, $dialog = '', $returnjs = '') {
		if($url_forward=='')$url_forward=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
		
		
		$datainfo = array("msg"=>$msg,"url_forward"=>$url_forward,"ms"=>$ms,"returnjs"=>$returnjs,"dialog"=>$dialog);
		echo $this->load->view('yezhu/header',NULL,true);
		echo $this->load->view('yezhu/message',$datainfo,true);
		echo $this->load->view('yezhu/footer',NULL,true);
		exit;
	}
}


class Admin_Controller extends MY_Controller{

	public $current_admin_id;
	public $current_admin_groupid;
	public $current_admin_username;
	function __construct(){
		parent::__construct();
		$this->load->model(array('Staff_model','Admin_role_priv_model'));
		define("IN_ADMIN", TRUE);
		self::check_admin();
		
		$this->current_admin_username=$this->session->userdata('staff_username');
		$this->current_admin_id=$this->session->userdata('staff_id');
		$this->current_admin_groupid=$this->session->userdata('staff_group_id');
		
		$this->_check_private();
	}
	
	protected function _check_private()
	{
		
		
		if($this->current_admin_id>0)
		{
			/*
			if($this->current_admin_groupid==2)return ;
			else {
				$datainfo = $this->Admin_role_priv_model->get_one(array('roleid'=>1,'m'=>$this->page_data['folder_name'],'c'=>$this->page_data['controller_name'],'d'=>$this->page_data['method_name']));
				print_r($datainfo);
				die();
				if(!$datainfo) $this->showmessage("你没有权限");
			}*/
		}
	}
	
	protected function showmessage($msg, $url_forward = '', $ms = 100, $dialog = '', $returnjs = '') {
		if($url_forward=='')$url_forward=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
		
		
		$datainfo = array("msg"=>$msg,"url_forward"=>$url_forward,"ms"=>$ms,"returnjs"=>$returnjs,"dialog"=>$dialog);
		echo $this->load->view('adminpanel/header',NULL,true);
		echo $this->load->view('adminpanel/message',$datainfo,true);
		echo $this->load->view('adminpanel/footer',NULL,true);
		exit;
	}
	
	/**
	 * 判断用户是否已经登陆
	 */
	 protected function check_admin() {
		 
	 	if(!$this->session->userdata('staff_id')&&!($this->router->directory=='adminpanel/'&&strtolower($this->router->class)=='manage'&&strtolower($this->router->method)=='login'))
		{
			$this->showmessage('请您重新登录',base_url('adminpanel/manage/login'));
			exit(0);
		}
	}
	
	
	/**
	 * 自动模板调用
	 * 
	 * @param $module
	 * @param $template
	 * @param $istag
	 * @return unknown_type
	 */
	protected function view($view_file,$sub_page_data=NULL,$autoload_header_footer_view= true)
	{
		$view_file= $this->page_data['folder_name'].DIRECTORY_SEPARATOR.$this->page_data['controller_name'].DIRECTORY_SEPARATOR.$view_file;
		
		
		if(isset($this->current_member_info))
		{
			$page_data['current_member_info']=$this->current_admin_info;
		}
		$page_data['current_admin_id']=$this->current_admin_id;//当前用户id
		$page_data['current_admin_groupid']=$this->current_admin_groupid;
		$page_data['admin_username']='';
		
		$page_data['sub_page']=$this->load->view(reduce_double_slashes($view_file),$sub_page_data,true);
		if($autoload_header_footer_view)
		{
			$this->load->view('adminpanel/header',$page_data);
			$this->load->view('adminpanel/index',$page_data);
		 	$this->load->view('adminpanel/footer',$page_data);
		}else
		{
			$this->load->view('adminpanel/header',$page_data);
			$this->load->view(reduce_double_slashes($view_file),$sub_page_data);
			$this->load->view('adminpanel/footer',$page_data);
		}
	}
}
