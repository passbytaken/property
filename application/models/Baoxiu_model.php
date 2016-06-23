<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AutoCodeIgniter.com
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 源项目		AutoCodeIgniter
 * 作者：		AutoCodeIgniter.com Dev Team
 * 版权：		Copyright (c) 2015 , AutoCodeIgniter com.
 * 项目名称：维修报修 MODEL
 * 版本号：1 
 * 最后生成时间： 
 */
class Baoxiu_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'baoxiu';
		parent::__construct();
	}
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE `t_aci_baoxiu`
(
`yezhu_id` varchar(250) DEFAULT NULL COMMENT '业主',
`baoxiu_sj` datetime DEFAULT NULL COMMENT '报修时间',
`weixiu_sj` datetime DEFAULT NULL COMMENT '维修时间',
`baoxiu_wt` text COMMENT '报修问题',
`baoxiu_yezhu_id` varchar(50) DEFAULT NULL COMMENT '报修业主ID',
`baoxiu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`baoxiu_zt` varchar(250) DEFAULT NULL COMMENT '报修状态',
`weixiu_fy` decimal(10,2) DEFAULT '0.00' COMMENT '维修费用',
PRIMARY KEY (`baoxiu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        }

// END Baoxiu_model class

/* End of file Baoxiu_model.php */
/* Location: ./Baoxiu_model.php */
?>