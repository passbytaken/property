<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
 <h3 class="page-header">修改密码</h3>
 	<form class="form-signin" role="form" action="<?php echo current_url()?>" method="post" name="myform">
        <h2 class="form-signin-heading">请输入您的帐号信息</h2>
        <input type="password" name="password1" class="form-control" placeholder="请输入原密码" required>
        <input type="password" name="password2" class="form-control" placeholder="请输入新密码" required>
        <input type="password" name="password3" class="form-control" placeholder="请再次输入新密码" required>
 
        <button name="dosubmit" class="btn  btn-primary btn-block" type="submit">保存修改</button>
      </form>
