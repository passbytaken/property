<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('staff_model'));
		$this->load->helper('array');
		$this->load->helper('admin');
	}
	
	function _group_option()
	{
		return array(1=>'物业维修员',2=>'管理员');
	}
	
	
	/**
	 * 新增员工
	 * ...
	 */
	function add()
	{
	
		if(isset($_POST['info'])&&is_ajax()) {
			$info=$_POST['info'];
			if(!$this->_checkname($info['username'])){
				exit( json_encode(array('status'=>false,'tips'=>"用户名已经存在")));
			}
			
			if(trim($info['password'])!="")
			{
				if($info['password']!=$info['pwdconfirm']) exit( json_encode(array('status'=>false,'tips'=>"密码重复输入不对")));
				
				
				unset($info['pwdconfirm']);
			}
			else
			{
				exit( json_encode(array('status'=>false,'tips'=>"密码不能为空")));
			}
			
			if(intval($info['group_id'])==0) exit( json_encode(array('status'=>false,'tips'=>"请选择管理组")));
			
			$info['last_login_ip'] = $this->input->ip_address();
			$info['created']=date('Y-m-d',SYS_TIME);
			$info['last_login_time']=SYS_TIME;
			$info['password'] = md5(md5($info['password']));
			unset($info['pwdconfirm']);
			
			$status=$this->Staff_model->insert($info);
			if($status)
				echo json_encode(array('status'=>true,'tips'=>"ok"));
			else
				echo json_encode(array('status'=>false,'tips'=>"false"));
		}else 
		{
			$this->view('edit',array('require_js'=>true,'datainfo'=>$this->Staff_model->default_info(),'show_validator'=>true,'is_edit'=>false,'grouplist'=>$this->_group_option()));
		}
		
	}
	
	function edit($staffid=0)
	{
		$staffid=intval($staffid);
		$datainfo=$this->Staff_model->get_one(array('staff_id'=>$staffid));
		if(!$datainfo)
		{
			$this->showmessage('员工不存在');
			die();
		}
		if(isset($_POST['info'])&&is_ajax()) {
			$info=$_POST['info'];
			
			if(trim($info['password'])!="")
			{
				if($info['password']!=$info['pwdconfirm']) exit( json_encode(array('status'=>false,'tips'=>"密码重复输入不对")));
				
				$info['password'] = md5(md5($info['password']));
				unset($info['pwdconfirm']);
			}
			else
			{
				unset($info['pwdconfirm']);
				unset($info['password']);
			}
			if(intval($info['group_id'])==0) exit( json_encode(array('status'=>false,'tips'=>"请选择管理组")));

				
			$status=$this->Staff_model->update($info,array('staff_id'=>$staffid));
			if($status)
				echo json_encode(array('status'=>true,'tips'=>"ok"));
			else
				echo json_encode(array('status'=>false,'tips'=>"false"));
		}else 
		{
			$this->view('edit',array('datainfo'=>$datainfo,'is_edit'=>true,'require_js'=>true,'grouplist'=>$this->_group_option()));
		}
	}
	
	function index($pageno=0)
	{
		$groupid = isset($_GET['groupid']) ? intval($_GET['groupid']) : '';
		$sortid=isset($_GET['sortid'])?intval($_GET['sortid']):0;
		$pageno=intval($pageno);
		$pageno=max(intval($pageno),1);//页
		
		$orderby=($sortid>0)?'staff_id asc':'staff_id asc';
		
		$_result_list = $this->staff_model->listinfo("",'*',$orderby , $pageno, $this->staff_model->page_size,'staff_id',$this->staff_model->page_size);
	
		$this->view('lists',array('grouplist'=>$this->_group_option(),'groupid'=>$this->current_admin_groupid,'datalist'=>$_result_list,'pages'=>$this->staff_model->pages));
		
	}
	
	function change_pwd($projectid=0,$pageno=0)
	{
		$datainfo = $this->staff_model->get_one(array('staff_id'=>$this->current_admin_id));
		if(!$datainfo)$this->showmessage('系统错误',base_url('/adminpanel/manage/logout'));
		if(isset($_POST['dosubmit'])) {
			
			$password1 =  isset_trim($_POST['password1'])?$_POST['password1']:$this->showmessage('旧密码不能为空');
			$password2 =  isset_trim($_POST['password2'])?$_POST['password2']:$this->showmessage('新密码不能为空');
			$password3 =  isset_trim($_POST['password3'])?$_POST['password3']:$this->showmessage('新密码不能为空');

			if($password2!=$password3)$this->showmessage('两次密码不一致');
			
			
			$password1 = md5(md5($password1));
			$c= $this->staff_model->count(array('staff_id'=>$this->current_admin_id,'password'=>$password1));
			if(intval($c)!=1)$this->showmessage('旧密码错误');
			
			$password2 = md5(md5($password2));
			$status=$this->staff_model->update(array('password'=>$password2),array('staff_id'=>$this->current_admin_id));
			if($status)
			{
				$this->showmessage('密码修改成功，请重新登录',base_url('adminpanel/manage/logout'));
			}else 
			{
				$this->showmessage('密码修改失败');
			}
		}else 
		$this->view('change_pwd',array('datainfo'=>$datainfo,'jquery_jgrowl'=>true));
	}
	
	/**
	 * 检查用户名
	 * @param string $username	用户名
	 * @return $status {-4：用户名禁止注册;-1:用户名已经存在 ;1:成功}
	 */
	function public_checkname_ajax()
	{
		$username = isset($_GET['fieldValue']) && trim($_GET['fieldValue']) ? trim($_GET['fieldValue']) : exit(0);
		$validateId = isset($_GET['fieldId']) && trim($_GET['fieldId']) ? trim($_GET['fieldId']) : exit(0);
		$arrayToJs = array();
		$arrayToJs[0] = $validateId;
		if(!$this->_checkname($username)){
			$arrayToJs[1] = false;
			echo json_encode($arrayToJs);
			die();
		}else
			$arrayToJs[1] = true;
			echo json_encode($arrayToJs);
	}
	
	/**
	 * 检查用户名
	 * ...
	 * @param string $username
	 */
	private function _checkname($username) {
		$username =  trim($username);
		if ($this->Staff_model->get_one(array('username'=>$username))){
			return false;
		}
		return true;
	}
	/**
	 * 删除员工
	 * ...
	 */
	function delete()
	{
		if(isset($_GET['dosubmit'])) {
			$aidarr = isset($_GET['userid']) ? $_GET['userid'] : $this->showmessage('无效参数', HTTP_REFERER);
			//$aidarr = isset($_POST['userid']) ? $_POST['userid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this->Staff_model->to_sqls($aidarr, '', 'staff_id') .' And group_id <'.$this->current_admin_groupid;
			$status = $this->Staff_model->delete($where);
		
			if($status)
			{
				$this->showmessage('操作成功', base_url('adminpanel/staff/index'));
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
	}
	
	/**
	 * 锁定
	 * ...
	 */
	function lock()
	{
		if(isset($_GET['userid'])) {
			$aidarr = isset($_GET['userid']) ? $_GET['userid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this->Staff_model->to_sqls($aidarr, '', 'staff_id');
			
			$status = $this->Staff_model->update(array('is_lock'=>true),$where);
		
			if($status)
			{
				$this->showmessage('操作成功', base_url('adminpanel/staff/index'));
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
	}
	
	/**
	 * 
	 * 解锁...
	 */
	function unlock()
	{
		if(isset($_GET['userid'])) {
			$aidarr = isset($_GET['userid']) ? $_GET['userid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this->Staff_model->to_sqls($aidarr, '', 'staff_id');
			$status = $this->Staff_model->update(array('is_lock'=>false),$where);
	
			if($status)
			{
				$this->showmessage('操作成功', base_url('adminpanel/staff/index'));
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
	}

}