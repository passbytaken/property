<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Yezhu_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'yezhu';
		parent::__construct();
	}
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE `t_aci_yezhu`
(
`yezhu_dyh` varchar(250) DEFAULT NULL COMMENT '业主单元号',
`yezhu_fh` varchar(250) DEFAULT NULL COMMENT '业主房号',
`yezhu_xm` varchar(250) DEFAULT NULL COMMENT '业主姓名',
`yezhu_xb` varchar(250) DEFAULT NULL COMMENT '业主性别',
`yezhu_dh` varchar(50) DEFAULT NULL COMMENT '业主联系手机',
`yezhu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`yezhu_username` varchar(50) DEFAULT NULL COMMENT '业主用户名',
`yezhu_password` varchar(50) DEFAULT NULL COMMENT '业主登录密码',
`yezhu_rzsj` date DEFAULT NULL COMMENT '业主入住时间',
PRIMARY KEY (`yezhu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        
    /**
     * 下拉框数据源:业主信息
     * @return array
     */
    function dropdown_datasource($where='',$limit = '', $order = '', $group = '', $key='')
    {
    	$datalist = $this->select($where,'yezhu_id,yezhu_dyh,yezhu_fh,yezhu_xm',$limit,$order,$group,$key);
        return $datalist;
    }
    
    /**
     * 下拉框数据源:业主信息选择中项值
     * @return array
     */
    function dropdown_value($id=0)
    {
    	$data_info = $this->get_one(array('yezhu_id'=>$id),'yezhu_dyh,yezhu_fh,yezhu_xm');
        if($data_info)
        {
        	return  implode("-",$data_info);
        }
        return NULL;
    }
            
    /**
     * 业主用户名判断唯一性
     * @return bool
     */
    function check_unique_yezhu_username($str=0)
    {
    	$str = trim($str);
    	$c = $this->count(array('yezhu_username'=>$str));
        return $c;
    }
    
    }

// END Yezhu_model class

/* End of file Yezhu_model.php */
/* Location: ./Yezhu_model.php */
?>