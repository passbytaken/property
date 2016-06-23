<?php defined('IN_MEMBER') or exit('No permission resources.'); ?>
<script language="javascript" type="text/javascript">
<!--
if(top!=self)
	if(self!=top) top.location=self.location;
-->
</script>
<form class="form-signin" role="form" action="<?php echo current_url()?>" method="post" name="myform">
  <h1><img src="<?php echo ADMIN_IMG_PATH?>logo_small.png" alt="领东东后台登录" /></h1>
  
  <input type="text" name="username" class="form-control" placeholder="请输入管理帐号" required autofocus>
  <input type="password" name="password" class="form-control" placeholder="请输入管理密码" required>
  <div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> 记住我
    </label>
  </div>
  <button class="btn  btn-primary btn-block" type="submit">登录</button>
</form>