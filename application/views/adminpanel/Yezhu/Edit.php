<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Adminpanel//yezhu')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> 业主信息 修改信息 </h3>  
<form class="form-horizontal" role="form" id="myform" name="myform" action="<?php echo base_url('Adminpanel//yezhu/edit')?>" >
     <div class="panel panel-default">
      <div class="panel-heading">基本信息</div>
      <div class="panel-body">
  	  		<div class="form-group">
				<label for="yezhu_dyh" class="col-sm-2 control-label">业主单元号</label>
				<div class="col-sm-9 ">
					<select class="form-control  validate[required]"  name="yezhu_dyh"  id="yezhu_dyh"><option value="">==请选择==</option><option value='1栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='1栋')) { ?> selected="selected" <?php } ?>              >1栋</option>
<option value='2栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='2栋')) { ?> selected="selected" <?php } ?>              >2栋</option>
<option value='3栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='3栋')) { ?> selected="selected" <?php } ?>              >3栋</option>
<option value='4栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='4栋')) { ?> selected="selected" <?php } ?>              >4栋</option>
<option value='5栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='5栋')) { ?> selected="selected" <?php } ?>              >5栋</option>
<option value='6栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='6栋')) { ?> selected="selected" <?php } ?>              >6栋</option>
</select>
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_fh" class="col-sm-2 control-label">业主房号</label>
				<div class="col-sm-9 ">
					<input type="text" name="yezhu_fh"  id="yezhu_fh"  value='<?php echo isset($data_info['yezhu_fh'])?$data_info['yezhu_fh']:'' ?>'  class="form-control validate[required]"  placeholder="请输入业主房号" >
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_xm" class="col-sm-2 control-label">业主姓名</label>
				<div class="col-sm-9 ">
					<input type="text" name="yezhu_xm"  id="yezhu_xm"  value='<?php echo isset($data_info['yezhu_xm'])?$data_info['yezhu_xm']:'' ?>'  class="form-control validate[required]"  placeholder="请输入业主姓名" >
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_xb" class="col-sm-2 control-label">业主性别</label>
				<div class="col-sm-9 ">
					<select class="form-control  validate[required]"  name="yezhu_xb"  id="yezhu_xb"><option value="">==请选择==</option><option value='先生' 
					<?php if(isset($data_info['yezhu_xb'])&&($data_info['yezhu_xb']=='先生')) { ?> selected="selected" <?php } ?>              >先生</option>
<option value='女士' 
					<?php if(isset($data_info['yezhu_xb'])&&($data_info['yezhu_xb']=='女士')) { ?> selected="selected" <?php } ?>              >女士</option>
</select>
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_dh" class="col-sm-2 control-label">业主联系手机</label>
				<div class="col-sm-9 ">
					<input type="text" name="yezhu_dh"  id="yezhu_dh"   value='<?php echo isset($data_info['yezhu_dh'])?$data_info['yezhu_dh']:'' ?>'   class="form-control  validate[required,custom[mobile]]"  placeholder="请输入业主联系手机" >
				</div>
			</div>
	      </div>
     </div>

     <div class="panel panel-default">
      <div class="panel-heading">高级信息</div>
      <div class="panel-body">
  	  	<input type="hidden" name="o_yezhu_username"  id="o_yezhu_username" value="<?php echo isset($data_info['yezhu_username'])?$data_info['yezhu_username']:'' ?>"  >	<div class="form-group">
				<label for="yezhu_username" class="col-sm-2 control-label">业主用户名</label>
				<div class="col-sm-9 ">
					<input type="text" name="yezhu_username"  id="yezhu_username"   value="<?php echo isset($data_info['yezhu_username'])?$data_info['yezhu_username']:'' ?>"  autocomplete="off" class="form-control username  validate[required,minSize[3],maxSize[20]]"  placeholder="请输入业主用户名" >
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_password" class="col-sm-2 control-label">业主登录密码</label>
				<div class="col-sm-9 ">
					<input type="password" name="o_yezhu_password"  id="o_yezhu_password"    autocomplete="off"  class="form-control password "  placeholder="请输入业主登录密码" >
				</div>
			</div>
	<div class="form-group">
				<label for="yezhu_password" class="col-sm-2 control-label">确认业主登录密码</label>
				<div class="col-sm-9 ">
					<input type="password" name="yezhu_password"  id="yezhu_password"    autocomplete="off" class="form-control   validate[equals[yezhu_password]]"  placeholder="请再次输入业主登录密码" >
				</div>
			</div>
	  		<div class="form-group">
				<label for="yezhu_rzsj" class="col-sm-2 control-label">业主入住时间</label>
				<div class="col-sm-9 ">
					<input type="text" name="yezhu_rzsj"  id="yezhu_rzsj"   value='<?php echo isset($data_info['yezhu_rzsj'])?$data_info['yezhu_rzsj']:'' ?>'  class="form-control datepicker  validate[required,custom[date]]"  placeholder="请输入业主入住时间" >
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
								window.location.href='<?php echo base_url('Adminpanel//yezhu')?>';
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
