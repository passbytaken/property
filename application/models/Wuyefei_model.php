<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Wuyefei_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'wuyefei';
		parent::__construct();
	}
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE `t_aci_wuyefei`
(
`wuyefei_leixing_id` varchar(250) DEFAULT NULL COMMENT '物业费类型',
`yezhu_id` varchar(250) DEFAULT NULL COMMENT '业主',
`wuyefei_kssj` date DEFAULT NULL COMMENT '费用开始时间',
`wuyefei_jssj` date DEFAULT NULL COMMENT '费用结束时间',
`wuyefei_fy` decimal(10,2) DEFAULT '0.00' COMMENT '费用',
`wuyefei_cjsj` varchar(50) DEFAULT NULL COMMENT '创建时间',
`wuyefei_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`wuyefei_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        }

// END Wuyefei_model class

/* End of file Wuyefei_model.php */
/* Location: ./Wuyefei_model.php */
?>