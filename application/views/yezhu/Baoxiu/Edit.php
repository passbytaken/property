<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('yezhu/baoxiu')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> 维修报修 修改信息 </h3>  
<form class="form-horizontal" role="form" id="myform" name="myform" action="<?php echo base_url('yezhu/baoxiu/edit')?>" >
     <div class="panel panel-default">
      <div class="panel-heading">报修问题 :<?php echo $data_info['baoxiu_sj']?></div>
      <div class="panel-body">
     		<div class="form-group">
				<div class="col-sm-12 ">
					<textarea name="baoxiu_wt"  id="baoxiu_wt"  cols="45" rows="5" class="form-control  validate[required]" placeholder="请输入报修问题" ><?php echo isset($data_info['baoxiu_wt'])?$data_info['baoxiu_wt']:'' ?></textarea>
				</div>
			</div>
	 </div>	
	 </div>

     

    <div class="col-sm-offset-2 col-sm-8 ">
         	 <button type="submit" id="dosubmit" class="btn btn-primary btn-lg" >保存提交报修信息</button>
    </div>
     </div>
</form>

<script language="javascript" type="text/javascript">
<!--
	$(document).ready(function(e) {
		
	
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
								window.location.href='<?php echo base_url('yezhu/baoxiu')?>';
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
