<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 模块名称：业主信息 
 * 版本号：1 
 * 最后生成时间： 
 */
class Yezhu extends Admin_Controller {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
		$this->load->model(array('Yezhu_model'));
        $this->load->helper(array('auto_codeIgniter_helper','array'));
  
  
	}
    
    /**
     * 默认首页列表
     * @param int $pageno 当前页码
     * @return void
     */
    function index($page_no=0,$sort_id=0)
    {
    	$page_no = max(intval($page_no),1);
        
        $orderby = "yezhu_id desc";
        $dir = $order=  NULL;
		        
        $where ="";
        $_arr = NULL;//从URL GET
        if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
			$_arr['keyword'] =isset($_GET['keyword'])?safe_replace(trim($_GET['keyword'])):'';
			if($_arr['keyword']!="") $where_arr[] = "concat(yezhu_fh,yezhu_xm,yezhu_dh) like '%{$_arr['keyword']}%'";
                
			$_arr['yezhu_dyh'] = isset($_GET["yezhu_dyh"])?trim(safe_replace($_GET["yezhu_dyh"])):'';
        	if($_arr['yezhu_dyh']!="") $where_arr[] = "yezhu_dyh = '".$_arr['yezhu_dyh']."'";

                
        
		        
        	if($where_arr)$where = implode(" and ",$where_arr);
        }

        		$data_list = $this->Yezhu_model->listinfo($where,'*',$orderby , $page_no, $this->Yezhu_model->page_size,'',$this->Yezhu_model->page_size,page_list_url('adminpanel/yezhu/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
            	}
        }
    	$this->view('lists',array('data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this->Yezhu_model->pages));
    }
    
     /**
     * 新增数据
     * @param AJAX POST 
     * @return void
     */
    function add()
    {
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	//接收POST参数
			$_arr['yezhu_dyh'] = isset($_POST["yezhu_dyh"])?trim(safe_replace($_POST["yezhu_dyh"])):exit(json_encode(array('status'=>false,'tips'=>'业主单元号 不能为空')));
			if($_arr['yezhu_dyh']=='')exit(json_encode(array('status'=>false,'tips'=>'业主单元号 不能为空')));
			$_arr['yezhu_fh'] = isset($_POST["yezhu_fh"])?trim(safe_replace($_POST["yezhu_fh"])):exit(json_encode(array('status'=>false,'tips'=>'业主房号 不能为空')));
			if($_arr['yezhu_fh']=='')exit(json_encode(array('status'=>false,'tips'=>'业主房号 不能为空')));
			$_arr['yezhu_xm'] = isset($_POST["yezhu_xm"])?trim(safe_replace($_POST["yezhu_xm"])):exit(json_encode(array('status'=>false,'tips'=>'业主姓名 不能为空')));
			if($_arr['yezhu_xm']=='')exit(json_encode(array('status'=>false,'tips'=>'业主姓名 不能为空')));
			$_arr['yezhu_xb'] = isset($_POST["yezhu_xb"])?trim(safe_replace($_POST["yezhu_xb"])):exit(json_encode(array('status'=>false,'tips'=>'业主性别 不能为空')));
			if($_arr['yezhu_xb']=='')exit(json_encode(array('status'=>false,'tips'=>'业主性别 不能为空')));
			$_arr['yezhu_dh'] = isset($_POST["yezhu_dh"])?trim(safe_replace($_POST["yezhu_dh"])):exit(json_encode(array('status'=>false,'tips'=>'业主联系手机 不能为空')));
			if($_arr['yezhu_dh']=='')exit(json_encode(array('status'=>false,'tips'=>'业主联系手机 不能为空')));
			if($_arr['yezhu_dh']!=''){
			if(!is_mobile($_arr['yezhu_dh']))exit(json_encode(array('status'=>false,'tips'=>'业主联系手机 不能为空')));
			}
				$_arr['yezhu_username'] = isset($_POST["yezhu_username"])?trim(safe_replace($_POST["yezhu_username"])):exit(json_encode(array('status'=>false,'tips'=>'业主用户名 不能为空')));;
	$_arr['o_yezhu_username'] = isset($_POST["o_yezhu_username"])?trim(safe_replace($_POST["o_yezhu_username"])):exit(json_encode(array('status'=>false,'tips'=>'业主用户名 不能为空')));;
			if($_arr['yezhu_username']=='')exit(json_encode(array('status'=>false,'tips'=>'业主用户名 不能为空')));
		if(trim($_arr['o_yezhu_username'])!=trim($_arr['yezhu_username'])){
			$_count = $this->Yezhu_model->check_unique_yezhu_username(trim($_arr['yezhu_username']));
			if($_count) exit(json_encode(array('status'=>false,'tips'=>'业主用户名已经存在，请重新更换')));;
}
			unset($_arr['o_yezhu_username']);

				$_arr['yezhu_password'] = isset($_POST["yezhu_password"])?trim(safe_replace($_POST["yezhu_password"])):exit(json_encode(array('status'=>false,'tips'=>'业主登录密码 不能为空')));;
	$_arr['o_yezhu_password'] = isset($_POST["o_yezhu_password"])?trim(safe_replace($_POST["o_yezhu_password"])):exit(json_encode(array('status'=>false,'tips'=>'业主登录密码 不能为空')));;
			if(trim($_arr['o_yezhu_password'])!=trim($_arr['yezhu_password'])){
			exit(json_encode(array('status'=>false,'tips'=>'业主登录密码两次输入不就致')));;
}
			unset($_arr['o_yezhu_password']);

			if($_arr['yezhu_password']=='')exit(json_encode(array('status'=>false,'tips'=>'业主登录密码 不能为空')));
			
			$_arr['yezhu_password'] = md5(md5($_arr['yezhu_password']));
			$_arr['yezhu_rzsj'] = isset($_POST["yezhu_rzsj"])?trim(safe_replace($_POST["yezhu_rzsj"])):exit(json_encode(array('status'=>false,'tips'=>'业主入住时间 不能为空')));
			if($_arr['yezhu_rzsj']=='')exit(json_encode(array('status'=>false,'tips'=>'业主入住时间 不能为空')));
			if($_arr['yezhu_rzsj']!=''){
			if(!is_date($_arr['yezhu_rzsj']))exit(json_encode(array('status'=>false,'tips'=>'业主入住时间 不能为空')));
			}
			
            $new_id = $this->Yezhu_model->insert($_arr);
            if($new_id)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息新增成功','new_id'=>$new_id)));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息新增失败','new_id'=>0)));
            }
        }else
        {
        	$this->view('add');
        }
    }
    
     /**
     * 删除单个数据
     * @param int id 
     * @return void
     */
    function delete_one($id=0)
    {
    	$id = intval($id);
        $data_info =$this->Yezhu_model->get_one(array('yezhu_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $status = $this->Yezhu_model->delete(array('yezhu_id'=>$id));
        if($status)
        {
        	$this->showmessage('删除成功');
        }else
        	$this->showmessage('删除失败');
    }
    
    /**
     * 删除选中数据
     * @param post pid 
     * @return void
     */
    function delete_all()
    {
        if(isset($_POST))
		{
			$pidarr = isset($_POST['pid']) ? $_POST['pid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this->Yezhu_model->to_sqls($pidarr, '', 'yezhu_id');
			$status = $this->Yezhu_model->delete($where);
			if($status)
			{
				$this->showmessage('操作成功', HTTP_REFERER);
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
    }
    
     /**
     * 修改数据
     * @param int id 
     * @return void
     */
    function edit($id=0)
    {
    	$id = intval($id);
        
        $data_info =$this->Yezhu_model->get_one(array('yezhu_id'=>$id));
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	//接收POST参数
			$_arr['yezhu_dyh'] = isset($_POST["yezhu_dyh"])?trim(safe_replace($_POST["yezhu_dyh"])):exit(json_encode(array('status'=>false,'tips'=>'业主单元号 不能为空')));
			if($_arr['yezhu_dyh']=='')exit(json_encode(array('status'=>false,'tips'=>'业主单元号 不能为空')));
			$_arr['yezhu_fh'] = isset($_POST["yezhu_fh"])?trim(safe_replace($_POST["yezhu_fh"])):exit(json_encode(array('status'=>false,'tips'=>'业主房号 不能为空')));
			if($_arr['yezhu_fh']=='')exit(json_encode(array('status'=>false,'tips'=>'业主房号 不能为空')));
			$_arr['yezhu_xm'] = isset($_POST["yezhu_xm"])?trim(safe_replace($_POST["yezhu_xm"])):exit(json_encode(array('status'=>false,'tips'=>'业主姓名 不能为空')));
			if($_arr['yezhu_xm']=='')exit(json_encode(array('status'=>false,'tips'=>'业主姓名 不能为空')));
			$_arr['yezhu_xb'] = isset($_POST["yezhu_xb"])?trim(safe_replace($_POST["yezhu_xb"])):exit(json_encode(array('status'=>false,'tips'=>'业主性别 不能为空')));
			if($_arr['yezhu_xb']=='')exit(json_encode(array('status'=>false,'tips'=>'业主性别 不能为空')));
			$_arr['yezhu_dh'] = isset($_POST["yezhu_dh"])?trim(safe_replace($_POST["yezhu_dh"])):exit(json_encode(array('status'=>false,'tips'=>'业主联系手机 不能为空')));
			if($_arr['yezhu_dh']=='')exit(json_encode(array('status'=>false,'tips'=>'业主联系手机 不能为空')));
			if($_arr['yezhu_dh']!=''){
			if(!is_mobile($_arr['yezhu_dh']))exit(json_encode(array('status'=>false,'tips'=>'业主联系手机 不能为空')));
			}
				$_arr['yezhu_username'] = isset($_POST["yezhu_username"])?trim(safe_replace($_POST["yezhu_username"])):exit(json_encode(array('status'=>false,'tips'=>'业主用户名 不能为空')));;
	$_arr['o_yezhu_username'] = isset($_POST["o_yezhu_username"])?trim(safe_replace($_POST["o_yezhu_username"])):exit(json_encode(array('status'=>false,'tips'=>'业主用户名 不能为空')));;
			if($_arr['yezhu_username']=='')exit(json_encode(array('status'=>false,'tips'=>'业主用户名 不能为空')));
		if(trim($_arr['o_yezhu_username'])!=trim($_arr['yezhu_username'])){
			$_count = $this->Yezhu_model->check_unique_yezhu_username(trim($_arr['yezhu_username']));
			if($_count) exit(json_encode(array('status'=>false,'tips'=>'业主用户名已经存在，请重新更换')));;
}
			unset($_arr['o_yezhu_username']);

				$_arr['yezhu_password'] = isset($_POST["yezhu_password"])?trim(safe_replace($_POST["yezhu_password"])):exit(json_encode(array('status'=>false,'tips'=>'业主登录密码 不能为空')));;
	$_arr['o_yezhu_password'] = isset($_POST["o_yezhu_password"])?trim(safe_replace($_POST["o_yezhu_password"])):exit(json_encode(array('status'=>false,'tips'=>'业主登录密码 不能为空')));;
			if(trim($_arr['o_yezhu_password'])!=trim($_arr['yezhu_password'])){
			exit(json_encode(array('status'=>false,'tips'=>'业主登录密码两次输入不就致')));;
}
			unset($_arr['o_yezhu_password']);

			 if(trim($_arr['yezhu_password']) == "")unset($_arr['yezhu_password']);
			 else $_arr['yezhu_password'] = md5(md5($_arr['yezhu_password']));
			$_arr['yezhu_rzsj'] = isset($_POST["yezhu_rzsj"])?trim(safe_replace($_POST["yezhu_rzsj"])):exit(json_encode(array('status'=>false,'tips'=>'业主入住时间 不能为空')));
			if($_arr['yezhu_rzsj']=='')exit(json_encode(array('status'=>false,'tips'=>'业主入住时间 不能为空')));
			if($_arr['yezhu_rzsj']!=''){
			if(!is_date($_arr['yezhu_rzsj']))exit(json_encode(array('status'=>false,'tips'=>'业主入住时间 不能为空')));
			}
			
            $status = $this->Yezhu_model->update($_arr,array('yezhu_id'=>$id));
            if($status)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息修改成功')));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息修改失败')));
            }
        }else
        {
        	if(!$data_info)$this->showmessage('信息不存在');
        	$this->view('edit',array('data_info'=>$data_info));
        }
    }
    
     /**
     * 只读查看数据
     * @param int id 
     * @return void
     */
    function readonly($id=0)
    {
    	$id = intval($id);
        $data_info =$this->Yezhu_model->get_one(array('yezhu_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $this->view('readonly',array('data_info'=>$data_info));
    }
}

// END Yezhu class

/* End of file Yezhu.php */
/* Location: ./Yezhu.php */
?>