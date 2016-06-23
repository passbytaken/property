<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 模块名称：物业费类型 
 * 版本号：1 
 * 最后生成时间： 
 */
class Wuyefei_leixing extends Admin_Controller {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
		$this->load->model(array('Wuyefei_leixing_model'));
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
        
        $orderby = "wuyefei_leixing_id desc";
        $dir = $order=  NULL;
		        
        $where ="";
        $_arr = NULL;//从URL GET
        		$data_list = $this->Wuyefei_leixing_model->listinfo($where,'*',$orderby , $page_no, $this->Wuyefei_leixing_model->page_size,'',$this->Wuyefei_leixing_model->page_size,page_list_url('adminpanel/wuyefei_leixing/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
            	}
        }
    	$this->view('lists',array('data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this->Wuyefei_leixing_model->pages));
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
			$_arr['wuyefei_leixing_name'] = isset($_POST["wuyefei_leixing_name"])?trim(safe_replace($_POST["wuyefei_leixing_name"])):exit(json_encode(array('status'=>false,'tips'=>'物业费类型 不能为空')));
			if($_arr['wuyefei_leixing_name']=='')exit(json_encode(array('status'=>false,'tips'=>'物业费类型 不能为空')));
			
            $new_id = $this->Wuyefei_leixing_model->insert($_arr);
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
        $data_info =$this->Wuyefei_leixing_model->get_one(array('wuyefei_leixing_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $status = $this->Wuyefei_leixing_model->delete(array('wuyefei_leixing_id'=>$id));
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
			$where = $this->Wuyefei_leixing_model->to_sqls($pidarr, '', 'wuyefei_leixing_id');
			$status = $this->Wuyefei_leixing_model->delete($where);
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
        
        $data_info =$this->Wuyefei_leixing_model->get_one(array('wuyefei_leixing_id'=>$id));
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	//接收POST参数
			$_arr['wuyefei_leixing_name'] = isset($_POST["wuyefei_leixing_name"])?trim(safe_replace($_POST["wuyefei_leixing_name"])):exit(json_encode(array('status'=>false,'tips'=>'物业费类型 不能为空')));
			if($_arr['wuyefei_leixing_name']=='')exit(json_encode(array('status'=>false,'tips'=>'物业费类型 不能为空')));
			
            $status = $this->Wuyefei_leixing_model->update($_arr,array('wuyefei_leixing_id'=>$id));
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
        $data_info =$this->Wuyefei_leixing_model->get_one(array('wuyefei_leixing_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $this->view('readonly',array('data_info'=>$data_info));
    }
}

// END Wuyefei_leixing class

/* End of file Wuyefei_leixing.php */
/* Location: ./Wuyefei_leixing.php */
?>