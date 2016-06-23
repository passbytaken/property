<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends Member_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function Index()
	{
		redirect(base_url('yezhu/baoxiu/'));
	}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('yezhu/manage/logout'));
	}
	
	/**
	 * 登录
	 * ...
	 */
	public function login()
	{
		
		if(isset($_POST['username'])) {
			$username = isset($_POST['username']) ? trim($_POST['username']) : $this->showmessage('用户名不能为空',HTTP_REFERER);

			$this->load->model('Times_model');
			//密码错误剩余重试次数
			$rtime = $this->Times_model->get_one(array('username'=>$username,'is_admin'=>0));
			$maxloginfailedtimes = 5;
			if($rtime)
			{
				if($rtime['times'] > $maxloginfailedtimes) {
					$minute = 60-floor((SYS_TIME-$rtime['logintime'])/60);
					$this->showmessage('密码尝试次数过多，被锁定一个小时');
				}
			}
			
			//查询帐号，默认组1为超级管理员
			$r = $this->Yezhu_model->get_one(array('yezhu_username'=>$username));
			
		
			if(!$r) $this->showmessage('用户名或密码不正确',site_url('yezhu/login'));
			$password = md5(md5(trim($_POST['password'])));
			
			$ip = $this->input->ip_address();
			
			if($r['yezhu_password'] != $password) {
				if($rtime && $rtime['times'] < $maxloginfailedtimes) {
					$times = $maxloginfailedtimes-intval($rtime['times']);
					$this->Times_model->update(array('login_ip'=>$ip,'is_admin'=>0,'times'=>' +1'),array('username'=>$username));
				} else {
					$this->Times_model->delete(array('username'=>$username,'is_admin'=>0));
					$this->Times_model->insert(array('username'=>$username,'login_ip'=>$ip,'is_admin'=>0,'login_time'=>SYS_TIME,'times'=>1));
					$times = $maxloginfailedtimes;
				}
				$this->showmessage('密码错误您还有'.$times.'机会');
			}
			
			$this->Times_model->delete(array('username'=>$username));
			
			$this->session->set_userdata('yezhu_id',$r['yezhu_id']);
			$this->session->set_userdata('yezhu_fullname',$r['yezhu_xm']);
			$this->session->set_userdata('yezhu_username',$username);
			
			$this->session->set_userdata('lock_screen', 0);
		
			$this->showmessage('登录成功',site_url('yezhu'));
			
		}else {
			$this->load->helper('admin');
			$this->view('login',NULL,false);
		}
	}
}