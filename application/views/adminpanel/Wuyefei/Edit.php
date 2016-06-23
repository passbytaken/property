<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Adminpanel//wuyefei')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> 物业费 修改信息 </h3>  
<form class="form-horizontal" role="form" id="myform" name="myform" action="<?php echo base_url('Adminpanel//wuyefei/edit')?>" >
     <div class="panel panel-default">
      <div class="panel-heading">基本信息</div>
      <div class="panel-body">
  	  		<div class="form-group">
				<label for="wuyefei_leixing_id" class="col-sm-2 control-label">物业费类型</label>
				<div class="col-sm-9 ">
					<?php $options = process_datasource($this->Wuyefei_leixing_model->dropdown_datasource())?>
					<select class="form-control  validate[required]"  name="wuyefei_leixing_id"  id="wuyefei_leixing_id">
						<option value="">==请选择==</option>
<?php if($options)foreach($options as $option):?>
						<option value='<?php echo $option['val'];?>' <?php if(isset($data_info['wuyefei_leixing_id'])&&($data_info['wuyefei_leixing_id']==$option['val'])) { ?> selected="selected" <?php } ?>            ><?php echo $option['text'];?></option>
<?php endforeach;?>
					</select>

				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_id" class="col-sm-2 control-label">业主</label>
				<div class="col-sm-9 ">
					<?php $options = process_datasource($this->Yezhu_model->dropdown_datasource())?>
					<select class="form-control  validate[required]"  name="yezhu_id"  id="yezhu_id">
						<option value="">==请选择==</option>
<?php if($options)foreach($options as $option):?>
						<option value='<?php echo $option['val'];?>' <?php if(isset($data_info['yezhu_id'])&&($data_info['yezhu_id']==$option['val'])) { ?> selected="selected" <?php } ?>            ><?php echo $option['text'];?></option>
<?php endforeach;?>
					</select>

				</div>
			</div>
	  		<div class="form-group">
				<label for="wuyefei_kssj" class="col-sm-2 control-label">费用开始时间</label>
				<div class="col-sm-9 ">
					<input type="text" name="wuyefei_kssj"  id="wuyefei_kssj"   value='<?php echo isset($data_info['wuyefei_kssj'])?$data_info['wuyefei_kssj']:'' ?>'  class="form-control datepicker  validate[required,custom[date]]"  placeholder="请输入费用开始时间" >
				</div>
			</div>
	  		<div class="form-group">
				<label for="wuyefei_jssj" class="col-sm-2 control-label">费用结束时间</label>
				<div class="col-sm-9 ">
					<input type="text" name="wuyefei_jssj"  id="wuyefei_jssj"   value='<?php echo isset($data_info['wuyefei_jssj'])?$data_info['wuyefei_jssj']:'' ?>'  class="form-control datepicker  validate[required,custom[date]]"  placeholder="请输入费用结束时间" >
				</div>
			</div>
            <div class="form-group">
				<label for="wuyefei_jssj" class="col-sm-2 control-label">收费日期</label>
				<div class="col-sm-9 ">
					<input type="text" name="wuyefei_cjsj"  id="wuyefei_cjsj"   value='<?php echo isset($data_info['wuyefei_cjsj'])?$data_info['wuyefei_cjsj']:'' ?>'  class="form-control datepicker  validate[required,custom[date]]"  placeholder="请输入收费日期" >
				</div>
			</div>
	  		<div class="form-group">
				<label for="wuyefei_fy" class="col-sm-2 control-label">费用</label>
				<div class="col-sm-9 ">
					<input type="number" name="wuyefei_fy"  id="wuyefei_fy"   value='<?php echo isset($data_info['wuyefei_fy'])?$data_info['wuyefei_fy']:'' ?>'   class="form-control  validate[required,custom[price]]" placeholder="请输入费用" >
				</div>
			</div>
	  		      </div>
     </div>

    <div class="col-sm-offset-2 col-sm-8 ">
         	 <button type="submit" id="dosubmit" class="btn btn-primary btn-lg" >保存</button>
    </div>
</form>

<script language="javascript" type="text/javascript">
<!--
	$(document).ready(function(e) {
		
		$(".datepicker").datepicker();
		$(".datetimepicker").datetimepicker({lang:'ch'});
		$(".timepicker").datepicker();
		$("#myform").validationEngine();
		
		$( "form" ).submit(function( event ) {
			event.preventDefault();
			$("#dosubmit").attr("disabled","disabled");
			if($("form").validationEngine('validate'))
			{
				$.ajax({
					type: "POST",
					url: "<?php echo current_url()?>",
					data:  $("#myform").serialize(),
					success:function(response){
						var dataObj=eval("("+response+")");
						if(dataObj.status)
						{
							setTimeout(function(){
								window.location.href='<?php echo base_url('Adminpanel//wuyefei')?>';
							},1000);
							
						}else
						{
							alert(dataObj.tips);
							$("#dosubmit").removeAttr("disabled");
						}
					},
					error: function (request, status, error) {
						$("#dosubmit").removeAttr("disabled");
						alert(request.responseText);
						
					}                  
				});
			}else
				$("#dosubmit").removeAttr("disabled");
			
		});
		
    });
-->
</script>
