requirejs(['jquery','aci','bootstrap','message'],
	function($,aci) {
		
		$(document).ready(function(e) {
            
			$("#validateform").submit(function(e){
				e.preventDefault();
				$("#dosubmit").attr("disabled","disabled");
				
				$.scojs_message('正在保存..', $.scojs_message.TYPE_WAIT);
				$.ajax({
					type: "POST",
					url: is_edit?SITE_URL+"adminpanel/staff/edit/"+id:SITE_URL+"adminpanel/staff/add/",
					data:  $("#validateform").serialize(),
					success:function(response){
						var dataObj=jQuery.parseJSON(response);
						if(dataObj.status)
						{
							$.scojs_message('操作成功,正在返回列表页...', $.scojs_message.TYPE_OK);
							aci.GoUrl(SITE_URL+'adminpanel/staff/index',1);
						}else
						{
							$.scojs_message(dataObj.tips, $.scojs_message.TYPE_ERROR);
							$("#dosubmit").removeAttr("disabled");
						}
					},
					error: function (request, status, error) {
						$.scojs_message(request.responseText, $.scojs_message.TYPE_ERROR);
						$("#dosubmit").removeAttr("disabled");
					}                  
				})
			});
			
        });
		
});