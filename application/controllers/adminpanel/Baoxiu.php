<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 模块名称：维修报修 
 * 版本号：1 
 * 最后生成时间： 
 */
class Baoxiu extends Admin_Controller {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
		$this->load->model(array('Yezhu_model','Baoxiu_model'));
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
        
        $orderby = "baoxiu_id desc";
        $dir = $order=  NULL;
		        
        $where ="";
        $_arr = NULL;//从URL GET
        if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
		        
			$_arr['yezhu_id'] = isset($_GET["yezhu_id"])?trim(safe_replace($_GET["yezhu_id"])):'';
        	if($_arr['yezhu_id']!="") $where_arr[] = "yezhu_id = '".$_arr['yezhu_id']."'";

        	$_arr['baoxiu_zt'] = isset($_GET["baoxiu_zt"])?trim(safe_replace($_GET["baoxiu_zt"])):'';
        	if($_arr['baoxiu_zt']!="") $where_arr[] = "baoxiu_zt = '".$_arr['baoxiu_zt']."'";

                
        
		        
        	if($where_arr)$where = implode(" and ",$where_arr);
        }

        		$data_list = $this->Baoxiu_model->listinfo($where,'*',$orderby , $page_no, $this->Baoxiu_model->page_size,'',$this->Baoxiu_model->page_size,page_list_url('adminpanel/baoxiu/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
					$data_list[$k]['yezhu_id'] = $this->Yezhu_model->dropdown_value($data_list[$k]["yezhu_id"]);            	}
        }
    	$this->view('lists',array('data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this->Baoxiu_model->pages));
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
			$_arr['yezhu_id'] = isset($_POST["yezhu_id"])?trim(safe_replace($_POST["yezhu_id"])):exit(json_encode(array('status'=>false,'tips'=>'业主 不能为空')));
			if($_arr['yezhu_id']=='')exit(json_encode(array('status'=>false,'tips'=>'业主 不能为空')));
			$_arr['baoxiu_sj'] = isset($_POST["baoxiu_sj"])?trim(safe_replace($_POST["baoxiu_sj"])):exit(json_encode(array('status'=>false,'tips'=>'报修时间 不能为空')));
			if($_arr['baoxiu_sj']=='')exit(json_encode(array('status'=>false,'tips'=>'报修时间 不能为空')));
			if($_arr['baoxiu_sj']!=''){
			if(!is_datetime($_arr['baoxiu_sj']))exit(json_encode(array('status'=>false,'tips'=>'报修时间 不能为空')));
			}
			$_arr['weixiu_sj'] = isset($_POST["weixiu_sj"])?trim(safe_replace($_POST["weixiu_sj"])):exit(json_encode(array('status'=>false,'tips'=>'维修时间 不能为空')));
			if($_arr['weixiu_sj']=='')exit(json_encode(array('status'=>false,'tips'=>'维修时间 不能为空')));
			if($_arr['weixiu_sj']!=''){
			if(!is_datetime($_arr['weixiu_sj']))exit(json_encode(array('status'=>false,'tips'=>'维修时间 不能为空')));
			}
			$_arr['baoxiu_wt'] = isset($_POST["baoxiu_wt"])?trim(safe_replace($_POST["baoxiu_wt"])):exit(json_encode(array('status'=>false,'tips'=>'报修问题 不能为空')));
			if($_arr['baoxiu_wt']=='')exit(json_encode(array('status'=>false,'tips'=>'报修问题 不能为空')));
			$_arr['baoxiu_yezhu_id'] = isset($this->user_id)?$this->user_id:0;
			$_arr['baoxiu_zt'] = isset($_POST["baoxiu_zt"])?trim(safe_replace($_POST["baoxiu_zt"])):exit(json_encode(array('status'=>false,'tips'=>'报修状态 不能为空')));
			if($_arr['baoxiu_zt']=='')exit(json_encode(array('status'=>false,'tips'=>'报修状态 不能为空')));
			$_arr['weixiu_fy'] = isset($_POST["weixiu_fy"])?trim(safe_replace($_POST["weixiu_fy"])):exit(json_encode(array('status'=>false,'tips'=>'维修费用 不能为空')));
			if($_arr['weixiu_fy']=='')exit(json_encode(array('status'=>false,'tips'=>'维修费用 不能为空')));
			if($_arr['weixiu_fy']!=''){
			if(!is_price($_arr['weixiu_fy']))exit(json_encode(array('status'=>false,'tips'=>'维修费用 不能为空')));
			}
			
            $new_id = $this->Baoxiu_model->insert($_arr);
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
        $data_info =$this->Baoxiu_model->get_one(array('baoxiu_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
		if($data_info['baoxiu_zt']=="已完成")$this->showmessage('此条报修已经完成，不能再进行修改');
        $status = $this->Baoxiu_model->delete(array('baoxiu_id'=>$id));
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
			$where = $this->Baoxiu_model->to_sqls($pidarr, '', 'baoxiu_id');
			$status = $this->Baoxiu_model->delete($where." and baoxiu_zt<>'已完成'");
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
        
        $data_info =$this->Baoxiu_model->get_one(array('baoxiu_id'=>$id));
		
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	
			 if($this->current_admin_groupid==2):
				//接收POST参数
				$_arr['yezhu_id'] = isset($_POST["yezhu_id"])?trim(safe_replace($_POST["yezhu_id"])):exit(json_encode(array('status'=>false,'tips'=>'业主 不能为空')));
				if($_arr['yezhu_id']=='')exit(json_encode(array('status'=>false,'tips'=>'业主 不能为空')));
				$_arr['baoxiu_sj'] = isset($_POST["baoxiu_sj"])?trim(safe_replace($_POST["baoxiu_sj"])):exit(json_encode(array('status'=>false,'tips'=>'报修时间 不能为空')));
				if($_arr['baoxiu_sj']=='')exit(json_encode(array('status'=>false,'tips'=>'报修时间 不能为空')));
				if($_arr['baoxiu_sj']!=''){
					if(!is_datetime($_arr['baoxiu_sj']))exit(json_encode(array('status'=>false,'tips'=>'报修时间 不能为空')));
				}
				$_arr['baoxiu_wt'] = isset($_POST["baoxiu_wt"])?trim(safe_replace($_POST["baoxiu_wt"])):exit(json_encode(array('status'=>false,'tips'=>'报修问题 不能为空')));
				if($_arr['baoxiu_wt']=='')exit(json_encode(array('status'=>false,'tips'=>'报修问题 不能为空')));
				
			
				
			endif;
			
			$_arr['weixiu_sj'] = isset($_POST["weixiu_sj"])?trim(safe_replace($_POST["weixiu_sj"])):exit(json_encode(array('status'=>false,'tips'=>'维修时间 不能为空')));
			if($_arr['weixiu_sj']=='')exit(json_encode(array('status'=>false,'tips'=>'维修时间 不能为空')));
			if($_arr['weixiu_sj']!=''){
			if(!is_datetime($_arr['weixiu_sj']))exit(json_encode(array('status'=>false,'tips'=>'维修时间 不能为空')));
			}
			$_arr['baoxiu_zt'] = isset($_POST["baoxiu_zt"])?trim(safe_replace($_POST["baoxiu_zt"])):exit(json_encode(array('status'=>false,'tips'=>'报修状态 不能为空')));
			if($_arr['baoxiu_zt']=='')exit(json_encode(array('status'=>false,'tips'=>'报修状态 不能为空')));
			$_arr['weixiu_fy'] = isset($_POST["weixiu_fy"])?trim(safe_replace($_POST["weixiu_fy"])):exit(json_encode(array('status'=>false,'tips'=>'维修费用 不能为空')));
			if($_arr['weixiu_fy']=='')exit(json_encode(array('status'=>false,'tips'=>'维修费用 不能为空')));
			if($_arr['weixiu_fy']!=''){
			if(!is_price($_arr['weixiu_fy']))exit(json_encode(array('status'=>false,'tips'=>'维修费用 不能为空')));
			}
			
            $status = $this->Baoxiu_model->update($_arr,array('baoxiu_id'=>$id));
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
			if($data_info['baoxiu_zt']=="已完成")$this->showmessage('此条报修已经完成，不能再进行修改');
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
        $data_info =$this->Baoxiu_model->get_one(array('baoxiu_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
			$data_info['yezhu_id'] = $this->Yezhu_model->dropdown_value($data_info["yezhu_id"]);        $this->view('readonly',array('data_info'=>$data_info));
    }
}

// END Baoxiu class

/* End of file Baoxiu.php */
/* Location: ./Baoxiu.php */
?>