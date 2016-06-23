<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<div class="mai-title">
<h3><a class="btn btn-default btn-sm pull-right" href="javascript:window.history.go(-1)"> <span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
<?php if( $is_edit):?> 修改 : <?php echo $datainfo['username']?><?php else:?>添加<?php endif;?>  </h3>  </div>
<hr/>

<form  action="<?php echo current_url()?>" method="post" id="validateform" name="validateform" class="form-horizontal">
<?php if( $is_edit):?>
            <div class="form-group">
           					<div class="col-sm-2"><label>用户名:</label></div>
                            <div class="col-sm-6">
                            	<?php echo $datainfo['username']?>
							</div>
             </div>
<?php else:?>
			<div class="form-group">
           					<div class="col-sm-2"><label>用户名:</label></div>
                            <div class="col-sm-6">
                            	<input type="text" name="info[username]" class="form-control"   id="username" ></input>
							</div>
             </div>
<?php endif;?>
             <div class="form-group">
           					<div class="col-sm-2"><label>密码:</label></div>
                            <div class="col-sm-6">
                            	<input type="password" class="form-control" name="info[password]"  id="password" value="" autocomplete="off"  /> 不修改密码请留空
							</div>
             </div>
             <div class="form-group">
           					<div class="col-sm-2"><label>确认密码:</label></div>
                            <div class="col-sm-6">
                            	<input type="password" class="form-control" name="info[pwdconfirm]"  id="pwdconfirm" value="" autocomplete="off" /> 不修改密码请留空
							</div>
             </div>
             <div class="form-group">
           					<div class="col-sm-2"><label>姓名:</label></div>
                            <div class="col-sm-6">
                            	<input type="text" name="info[fullname]" class="form-control"   id="fullname" value="<?php echo $datainfo['fullname']?>"></input>
							</div>
                            <div class="clear"></div>
             </div>
             <div class="form-group">
           					<div class="col-sm-2"><label>EMAIL:</label></div>
                            <div class="col-sm-6">
                            	<input type="text" name="info[email]" class="form-control"   id="email" value="<?php echo $datainfo['email']?>"></input>
							</div>
                            <div class="clear"></div>
             </div>
             
             <div class="form-group">
           					<div class="col-sm-2"><label>管理组:</label></div>
                            <div class="col-sm-6">
                            	<?php echo form_select($grouplist, $datainfo['group_id'], 'name="info[group_id]" class="form-control"',  '请选择' )?>
							</div>
             </div>
             
             <div class="col-sm-offset-2 col-sm-8 ">
             <button  type="submit" id="dosubmit" class="btn btn-primary btn-lg">保 存 </button> 
   			 </div>
		
</form>
<script language="javascript" type="text/javascript">var id = <?php echo $datainfo['staff_id']?>; var is_edit = <?php echo $is_edit?"true":"false"?>; require(['/scripts/adminpanel/staff/edit.js']); </script>