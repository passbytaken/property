<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('yezhu/baoxiu')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> 维修报修查看信息 </h3>  
<div class="form-horizontal"  >
     <div class="panel panel-default">
      <div class="panel-heading">基本信息</div>
      <div class="panel-body">
  	  		<div class="form-group">
				<label for="yezhu_id" class="col-sm-2 control-label">业主</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['yezhu_id'])?$data_info['yezhu_id']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="baoxiu_sj" class="col-sm-2 control-label">报修时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['baoxiu_sj'])?$data_info['baoxiu_sj']:'' ?>
				</div>
			</div>
            <div class="form-group">
				<label for="baoxiu_wt" class="col-sm-2 control-label">报修问题</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['baoxiu_wt'])?$data_info['baoxiu_wt']:'' ?>
				</div>
			</div>
            
	  		
	  		
	      </div>
     </div>

     <div class="panel panel-default">
      <div class="panel-heading">物业维修反馈信息</div>
      <div class="panel-body">
      		<div class="form-group">
				<label for="baoxiu_zt" class="col-sm-2 control-label">报修状态</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['baoxiu_zt'])?$data_info['baoxiu_zt']:'' ?>
				</div>
			</div>
  	  		<div class="form-group">
				<label for="weixiu_sj" class="col-sm-2 control-label">维修时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['weixiu_sj'])?$data_info['weixiu_sj']:'' ?>
				</div>
			</div>
	  		<div class="form-group">
				<label for="weixiu_fy" class="col-sm-2 control-label">维修费用</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['weixiu_fy'])?$data_info['weixiu_fy']:'' ?>
				</div>
			</div>
	      </div>
     </div>

</div>
