<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Yezhu_model','Baoxiu_model',"Wuyefei_model","Wuyefei_leixing_model"));
	}
	
	public function Index()
	{
		$startDate = '2015-01-01 00:00:00';
		$endDate = date('Y-m-d H:i:s');
		$sql ="SELECT wuyefei_cjsj,sum(wuyefei_fy) as sumtotal FROM t_aci_Wuyefei WHERE wuyefei_cjsj>='{$startDate}' and wuyefei_cjsj<='{$endDate}' group by wuyefei_cjsj order by wuyefei_cjsj asc";
		
		//物业类型
		$wylx = $this->Wuyefei_leixing_model->select();
		$datalist = array();
		foreach($wylx as $k=>$v)
		{
			for($i=1;$i<12;$i++)
			{
				$datalist[$v['wuyefei_leixing_name']][$i] = intval($this->Wuyefei_model->sum('wuyefei_fy',"year(wuyefei_cjsj)=".date("Y")." and month(wuyefei_cjsj)=".$i." and wuyefei_leixing_id=".$v['wuyefei_leixing_id']));
			}
		}
		
		$this->view('index',array("datalist"=>$datalist,"count_yezhu"=>$this->Yezhu_model->count(),"count_baoxiu"=>$this->Baoxiu_model->count(),"sum_total"=>$this->Wuyefei_model->sum("wuyefei_fy"),"staff_fullname"=>$this->session->userdata['staff_fullname'],'staff_username'=>$this->session->userdata['staff_username']));
	}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('adminpanel/manage/logout'));
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
			$rtime = $this->Times_model->get_one(array('username'=>$username,'is_admin'=>1));
			$maxloginfailedtimes = 5;
			if($rtime)
			{
				if($rtime['times'] > $maxloginfailedtimes) {
					$minute = 60-floor((SYS_TIME-$rtime['logintime'])/60);
					$this->showmessage('密码尝试次数过多，被锁定一个小时');
				}
			}
			
			//查询帐号，默认组1为超级管理员
			$r = $this->Staff_model->get_one(array('username'=>$username));
			if(!$r) $this->showmessage('用户名或密码不正确','/adminpanel/login');
			$password = md5(md5(trim($_POST['password']).$r['encrypt']));
			
			$ip = $this->input->ip_address();
			if($r['password'] != $password) {
				if($rtime && $rtime['times'] < $maxloginfailedtimes) {
					$times = $maxloginfailedtimes-intval($rtime['times']);
					$this->Times_model->update(array('login_ip'=>$ip,'is_admin'=>1,'times'=>' +1'),array('username'=>$username));
				} else {
					$this->Times_model->delete(array('username'=>$username,'is_admin'=>1));
					$this->Times_model->insert(array('username'=>$username,'login_ip'=>$ip,'is_admin'=>1,'login_time'=>SYS_TIME,'times'=>1));
					$times = $maxloginfailedtimes;
				}
				$this->showmessage('密码错误您还有'.$times.'机会');
			}
			
			$this->Times_model->delete(array('username'=>$username));
			if($r['is_lock'])	$this->showmessage('您的帐号已被锁定，暂时无法登录');
			$this->Staff_model->update(array('last_login_ip'=>$ip,'last_login_time'=>SYS_TIME),array('staff_id'=>$r['staff_id']));
			
			$this->session->set_userdata('staff_id',$r['staff_id']);
			$this->session->set_userdata('staff_fullname',$r['fullname']);
			$this->session->set_userdata('staff_username',$username);
			$this->session->set_userdata('staff_group_id',$r['group_id']);
			
			
			$this->session->set_userdata('lock_screen', 0);
		
			$this->showmessage('登录成功',site_url(ADMIN_URL_PATH));
			
		}else {
			$this->load->helper('admin');
			$this->view('login',NULL,false);
		}
	}
}