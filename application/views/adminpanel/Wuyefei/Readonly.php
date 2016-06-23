<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Adminpanel//wuyefei')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> 物业费查看信息 </h3>  
<div class="form-horizontal"  >
     <div class="panel panel-default">
      <div class="panel-heading">基本信息</div>
      <div class="panel-body">
  	  		<div class="form-group">
				<label for="wuyefei_leixing_id" class="col-sm-2 control-label">物业费类型</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['wuyefei_leixing_id'])?$data_info['wuyefei_leixing_id']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_id" class="col-sm-2 control-label">业主</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_id'])?$data_info['yezhu_id']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="wuyefei_kssj" class="col-sm-2 control-label">费用开始时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['wuyefei_kssj'])?$data_info['wuyefei_kssj']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="wuyefei_jssj" class="col-sm-2 control-label">费用结束时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['wuyefei_jssj'])?$data_info['wuyefei_jssj']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="wuyefei_fy" class="col-sm-2 control-label">费用</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['wuyefei_fy'])?$data_info['wuyefei_fy']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="wuyefei_cjsj" class="col-sm-2 control-label">创建时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['wuyefei_cjsj'])?$data_info['wuyefei_cjsj']:'' ?>
				</div>
			</div>
	      </div>
     </div>

</div>
