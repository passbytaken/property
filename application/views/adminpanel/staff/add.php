<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<script type="text/javascript">
function openwinx(url,name,w,h) {
	if(!w) w=screen.width-4;
	if(!h) h=screen.height-95;
    window.open(url,name,"top=100,left=400,width=" + w + ",height=" + h + ",toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,status=no");
}
function upload_file(inputId)
{
	openwinx("/adminpanel/attachments/upload_file/"+inputId,"upload",450,350);
}
</script>
<form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data" name="myform" id="validate">
<div class="wrapper ">
<div class="fluid">
     <fieldset>
     	<div class="widget">
        	<div class="whead"><h6>基本信息</h6><div class="clear"></div></div>
            <div class="formRow2">
           					<div class="grid2"><label>用户名:</label></div>
                            <div class="grid4">
                            	<input type="text" name="info[username]"  id="username" value="" autocomplete="off" class="validate[required,minSize[3],maxSize[20],ajax[ajaxNameCall]]"></input> 
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>密码:</label></div>
                            <div class="grid4">
                            	<input type="password" name="info[password]"  id="password" value="" autocomplete="off" class="validate[required]"></input> 
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>确认密码:</label></div>
                            <div class="grid4">
                            	<input type="password" name="info[pwdconfirm]"  id="pwdconfirm" value="" autocomplete="off" class="validate[required,equals[password]]"></input> 
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>手机号码:</label></div>
                            <div class="grid4">
                            	<input type="text" name="info[mobilenumber]"  id="mobilenumber" size="30" class="validate[required,custom[phone]]"></input>
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>员工组:</label></div>
                            <div class="grid4">
                            	<?php echo form_select($grouplist, '', 'name="info[group_id]" class="validate[required]"',  '请选择' )?>
							</div>
                            <div class="clear"></div>
             </div>
	</div>
</fieldset>

<fieldset>
    <div class="widget">
        	<div class="whead"><h6>详细信息</h6><div class="clear"></div></div>
            <div class="formRow2">
           					<div class="grid2"><label>姓名:</label></div>
                            <div class="grid4">
                            	<input type="text" name="info[fullname]" class="validate[required]"  id="fullname" ></input>
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>性别:</label></div>
                            <div class="grid4">
                            	<label><input type="radio" value="m" name="info[sex]" checked="checked" /> 男</label> <label><input type="radio" value="f" name="info[sex]" /> 女</label>
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>email:</label></div>
                            <div class="grid4">
                            	<input type="text" name="info[email]"  id="email" ></input>
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>出生日期:</label></div>
                            <div class="grid4">
                            	<input type="text" name="info[birthday]" class="validate[required,custom[dateFormat]] datepicker" value="1990-01-01"  id="birthday"  ></input>
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>详细地址:</label></div>
                            <div class="grid4">
                            	<input type="text" name="info[address]"  id="address" size="60" ></input>
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>邮编:</label></div>
                            <div class="grid4">
                            	<input type="text" name="info[zip]"  id="zip" size="10"></input>
							</div>
                            <div class="clear"></div>
             </div>
             <div class="formRow2">
           					<div class="grid2"><label>照片:</label></div>
                            <div class="grid4">
                            	<label><input type="text"  name="info[avatar]"  id="avatar"  readonly="readonly"/></label> <input type="button" class="buttonM bBlack" onclick="javascript:upload_file('avatar')"/ value="图片上传">
							</div>
               <div class="clear"></div>
             </div>
             <div class="formRow2"><input type="submit" value="保存" class="buttonM bBlack formSubmit" name="dosubmit" /><div class="clear"></div></div>
	  </div>
     </fieldset>
      </div>
    </div>
</form>

    
</body>
</html>