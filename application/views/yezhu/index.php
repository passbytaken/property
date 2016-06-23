<?php defined('IN_MEMBER') or exit('No permission resources.'); ?>
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
            <li><a  href="<?php echo base_url('yezhu/')?>">首页</a></li>
            <li><a href="<?php echo base_url('yezhu/staff/change_pwd')?>">修改密码</a></li>
            <li><a href="<?php echo base_url('yezhu/manage/logout')?>">退出</a></li>
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
              <a href="#"  class="list-group-item active">你好，<?php echo $this->session->userdata('yezhu_fullname');?></a>
              <a class="list-group-item " href="<?php echo base_url('yezhu/staff/change_pwd')?>">修改密码</a>
            </div>
           
            
            <div class="list-group">
            <a href="#"  class="list-group-item disabled">物业报修改管理</a>
            <a href="<?php echo base_url("yezhu/baoxiu/index")?>" class="list-group-item">报修列表</a>
            <a href="<?php echo base_url("yezhu/baoxiu/add")?>" class="list-group-item">添加报修信息</a>
            </div>
            
            
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