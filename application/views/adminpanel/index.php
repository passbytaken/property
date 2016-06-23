<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<style type="text/css">
.objbody{overflow:hidden}
.navbar-inverse{ background-color:#373943; }
.navbar-inverse a:link,.navbar-right a:link{color:#e5e9ee}
</style>

<div class="white-bg">
<?php if(!isset($hidden_menu)):?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo SITE_NAME?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a  href="<?php echo base_url('adminpanel/')?>">首页</a></li>
            <li><a href="<?php echo base_url('adminpanel/staff/change_pwd')?>">修改密码</a></li>
            <li><a href="<?php echo base_url('adminpanel/manage/logout')?>">退出</a></li>
          </ul>
        </div>
      </div>
    </nav>
<?php endif;?>
    <div class="container-fluid">

      <div class="row">
<?php if(!isset($hidden_menu)):?>
        <div class="col-sm-3 col-md-2 sidebar">
        	<div class="list-group">
              <a href="#"  class="list-group-item active">你好，<?php echo $this->session->userdata('staff_fullname');?></a>
              <a class="list-group-item " href="<?php echo base_url('adminpanel/staff/change_pwd')?>">修改密码</a>
            </div>
            
            <?php if($this->current_admin_groupid==2):?>
            <div class="list-group">
              <a class="list-group-item " href="<?php echo base_url('adminpanel/staff/index')?>">用户列表<span class="badge orderbadge"></span></a>
            </div>
           
            
            <div class="list-group">
            <a href="#"  class="list-group-item active">管理业主信息</a>
            <a href="<?php echo base_url("adminpanel/yezhu/index")?>" class="list-group-item">业主信息列表</a>
            <a href="<?php echo base_url("adminpanel/yezhu/add")?>" class="list-group-item">添加业主信息信息</a>
            </div>
            
            <div class="list-group">
            <a href="#"  class="list-group-item active">管理物业费</a>
            <a href="<?php echo base_url("adminpanel/wuyefei/index")?>" class="list-group-item">物业费列表</a>
            <a href="<?php echo base_url("adminpanel/wuyefei/add")?>" class="list-group-item">添加物业费信息</a>
            <a href="<?php echo base_url("adminpanel/wuyefei_leixing/index")?>" class="list-group-item">物业费类型列表</a>
            <a href="<?php echo base_url("adminpanel/baoxiu/index")?>" class="list-group-item">维修报修列表</a>
            <a href="<?php echo base_url("adminpanel/baoxiu/add")?>" class="list-group-item">添加维修报修信息</a>
<!--                新增地图模块-->
                <a href="<?php echo base_url("adminpanel/map/map")?>" class="list-group-item">地图</a>
            </div>
            
            <?php else:?>
            
            <div class="list-group">
              <a class="list-group-item " href="<?php echo base_url('adminpanel/staff/change_pwd')?>">修改密码</a>
            </div>
            
            <div class="list-group">
            <a href="#"  class="list-group-item active">管理物业费</a>
            <a href="<?php echo base_url("adminpanel/baoxiu/index")?>" class="list-group-item">维修报修列表</a>
            </div>
            
            <?php endif;?>
            
            
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" style="padding-bottom:20px;">
<?php else:?>
<style type="text/css">
body{ padding-top: 10px;
  padding-bottom: 0px;}
</style>
        <div class="col-sm-12" >
<?php endif;?>
          <?php echo $sub_page?>
         
        </div>
      </div>
    </div>
</div>