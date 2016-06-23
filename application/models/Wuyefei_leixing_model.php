<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Wuyefei_leixing_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'wuyefei_leixing';
		parent::__construct();
	}
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE `t_aci_wuyefei_leixing`
(
`wuyefei_leixing_name` varchar(250) DEFAULT NULL COMMENT '物业费类型',
`wuyefei_leixing_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`wuyefei_leixing_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        
    /**
     * 下拉框数据源:物业费类型
     * @return array
     */
    function dropdown_datasource($where='',$limit = '', $order = '', $group = '', $key='')
    {
    	$datalist = $this->select($where,'wuyefei_leixing_id,wuyefei_leixing_name',$limit,$order,$group,$key);
        return $datalist;
    }
    
    /**
     * 下拉框数据源:物业费类型选择中项值
     * @return array
     */
    function dropdown_value($id=0)
    {
    	$data_info = $this->get_one(array('wuyefei_leixing_id'=>$id),'wuyefei_leixing_name');
        if($data_info)
        {
        	return  implode("-",$data_info);
        }
        return NULL;
    }
        }

// END Wuyefei_leixing_model class

/* End of file Wuyefei_leixing_model.php */
/* Location: ./Wuyefei_leixing_model.php */
?>