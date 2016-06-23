<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends Member_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('staff_model'));
		$this->load->helper('array');
		$this->load->helper('admin');
	}
	
	
	function change_pwd($projectid=0,$pageno=0)
	{
		$datainfo = $this->Yezhu_model->get_one(array('yezhu_id'=>$this->current_yezhu_id));
		if(!$datainfo)$this->showmessage('系统错误',base_url('/yezhu/manage/logout'));
		if(isset($_POST['dosubmit'])) {
			
			$password1 =  isset_trim($_POST['password1'])?$_POST['password1']:$this->showmessage('旧密码不能为空');
			$password2 =  isset_trim($_POST['password2'])?$_POST['password2']:$this->showmessage('新密码不能为空');
			$password3 =  isset_trim($_POST['password3'])?$_POST['password3']:$this->showmessage('新密码不能为空');

			if($password2!=$password3)$this->showmessage('两次密码不一致');
			
			
			$password1 = md5(md5($password1));
			$c= $this->Yezhu_model->count(array('yezhu_id'=>$this->current_yezhu_id,'yezhu_password'=>$password1));
			if(intval($c)!=1)$this->showmessage('旧密码错误');
			
			$password2 = md5(md5($password2));
			$status=$this->Yezhu_model->update(array('yezhu_password'=>$password2),array('yezhu_id'=>$this->current_yezhu_id));
			if($status)
			{
				$this->showmessage('密码修改成功，请重新登录',base_url('yezhu/manage/logout'));
			}else 
			{
				$this->showmessage('密码修改失败');
			}
		}else 
		$this->view('change_pwd',array('datainfo'=>$datainfo));
	}
	

}