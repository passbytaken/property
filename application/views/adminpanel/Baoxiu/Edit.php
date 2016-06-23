<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Adminpanel/baoxiu')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> 维修报修 修改信息 </h3>  
<form class="form-horizontal" role="form" id="myform" name="myform" action="<?php echo base_url('Adminpanel/baoxiu/edit')?>" >
     <div class="panel panel-default">
      <div class="panel-heading">基本信息</div>
      <div class="panel-body">
      		<?php if($this->current_admin_groupid==2):?>
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
				<label for="baoxiu_sj" class="col-sm-2 control-label">报修时间</label>
				<div class="col-sm-9 ">
					<input type="text" name="baoxiu_sj"  id="baoxiu_sj"   value='<?php echo isset($data_info['baoxiu_sj'])?$data_info['baoxiu_sj']:'' ?>'  class="form-control datetimepicker  validate[required,custom[datetime]]"  placeholder="请输入报修时间" >
				</div>
			</div>
	  		
	  		<div class="form-group">
				<label for="baoxiu_wt" class="col-sm-2 control-label">报修问题</label>
				<div class="col-sm-9 ">
					<textarea name="baoxiu_wt"  id="baoxiu_wt"  cols="45" rows="5" class="form-control  validate[required]" placeholder="请输入报修问题" > <?php echo isset($data_info['baoxiu_wt'])?$data_info['baoxiu_wt']:'' ?></textarea>
				</div>
			</div>
            
            <?php else:?>
            <div class="form-group">
				<label for="baoxiu_sj" class="col-sm-2 control-label">业主</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo $this->Yezhu_model->dropdown_value($data_info['yezhu_id'])?>
				</div>
			</div>
            
            <div class="form-group">
				<label for="baoxiu_sj" class="col-sm-2 control-label">报修时间</label>
				<div class="col-sm-9 form-control-static "> <?php echo isset($data_info['baoxiu_sj'])?$data_info['baoxiu_sj']:'' ?> 
				</div>
			</div>
	  		
	  		<div class="form-group">
				<label for="baoxiu_wt" class="col-sm-2 control-label">报修问题</label>
				<div class="col-sm-9 form-control-static "> <?php echo isset($data_info['baoxiu_wt'])?$data_info['baoxiu_wt']:'' ?> 
				</div>
			</div>
            <?php endif;?>
	  		
	  		      </div>
     </div>

     <div class="panel panel-default">
      <div class="panel-heading">维修信息</div>
      <div class="panel-body">
      		<div class="form-group">
				<label for="weixiu_sj" class="col-sm-2 control-label">维修时间</label>
				<div class="col-sm-9 ">
					<input type="text" name="weixiu_sj"  id="weixiu_sj"   value='<?php echo isset($data_info['weixiu_sj'])?$data_info['weixiu_sj']:'' ?>'  class="form-control datetimepicker  validate[required,custom[datetime]]"  placeholder="请输入维修时间" >
				</div>
			</div>
  	  		<div class="form-group">
				<label for="baoxiu_zt" class="col-sm-2 control-label">报修状态</label>
				<div class="col-sm-9 ">
					<select class="form-control  validate[required]"  name="baoxiu_zt"  id="baoxiu_zt"><option value="">==请选择==</option><option value='未处理' 
					<?php if(isset($data_info['baoxiu_zt'])&&($data_info['baoxiu_zt']=='未处理')) { ?> selected="selected" <?php } ?>              >未处理</option>
<option value='正在处理' 
					<?php if(isset($data_info['baoxiu_zt'])&&($data_info['baoxiu_zt']=='正在处理')) { ?> selected="selected" <?php } ?>              >正在处理</option>
<option value='已完成' 
					<?php if(isset($data_info['baoxiu_zt'])&&($data_info['baoxiu_zt']=='已完成')) { ?> selected="selected" <?php } ?>              >已完成</option>
</select>
				</div>
			</div>
	  		<div class="form-group">
				<label for="weixiu_fy" class="col-sm-2 control-label">维修费用</label>
				<div class="col-sm-9 ">
					<input type="number" name="weixiu_fy"  id="weixiu_fy"   value='<?php echo isset($data_info['weixiu_fy'])?$data_info['weixiu_fy']:'' ?>'   class="form-control  validate[required,custom[price]]" placeholder="请输入维修费用" >
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
		
		$(".datetimepicker").datetimepicker({lang:'ch'});
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
								window.location.href='<?php echo base_url('Adminpanel/baoxiu')?>';
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
