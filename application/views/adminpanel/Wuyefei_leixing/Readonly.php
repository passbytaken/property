<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Adminpanel//wuyefei_leixing')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> 物业费类型 查看信息 </h3>  
<div class="form-horizontal" >
     <div class="panel panel-default">
      <div class="panel-heading">基本信息</div>
      <div class="panel-body">
  	  		<div class="form-group">
				<label for="wuyefei_leixing_name" class="col-sm-2 control-label">物业费类型</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['wuyefei_leixing_name'])?$data_info['wuyefei_leixing_name']:'' ?>
				</div>
			</div>
	      </div>
     </div>

</div>

