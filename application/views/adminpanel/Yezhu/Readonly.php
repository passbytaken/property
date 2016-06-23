<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Adminpanel//yezhu')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> 业主信息查看信息 </h3>  
<div class="form-horizontal"  >
     <div class="panel panel-default">
      <div class="panel-heading">基本信息</div>
      <div class="panel-body">
  	  		<div class="form-group">
				<label for="yezhu_dyh" class="col-sm-2 control-label">业主单元号</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_dyh'])?$data_info['yezhu_dyh']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_fh" class="col-sm-2 control-label">业主房号</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_fh'])?$data_info['yezhu_fh']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_xm" class="col-sm-2 control-label">业主姓名</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_xm'])?$data_info['yezhu_xm']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_xb" class="col-sm-2 control-label">业主性别</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_xb'])?$data_info['yezhu_xb']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_dh" class="col-sm-2 control-label">业主联系手机</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_dh'])?$data_info['yezhu_dh']:'' ?>
				</div>
			</div>
	      </div>
     </div>

     <div class="panel panel-default">
      <div class="panel-heading">高级信息</div>
      <div class="panel-body">
  	  		<div class="form-group">
				<label for="yezhu_username" class="col-sm-2 control-label">业主用户名</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_username'])?$data_info['yezhu_username']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_rzsj" class="col-sm-2 control-label">业主入住时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_rzsj'])?$data_info['yezhu_rzsj']:'' ?>
				</div>
			</div>
	      </div>
     </div>

</div>
