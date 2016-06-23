<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<div class="mai-title"><h3>
<a class="btn btn-success btn-sm pull-right" href="<?php echo base_url('adminpanel/staff/add')?>"> <span class="glyphicon glyphicon-plus"></span> 添加新员工 </a> 员工列表 </h3>  </div>
<hr/>

<div class="wrapper">
<form name="myform" id="myform" action="<?php echo base_url('adminpanel/staff/delete')?>" metdod="post" onsubmit="return checkuid();">
        <table class="table" id="checkAll">
        <thead>
            <tr>
                <th></th>
                <th>状态</th>
                <th>用户组</th>
                <th>用户名</th>
                <th>姓名</th>
                <th>E-MAIL</th>
                <th>操作</th>
            </tr>
        </thead>
<tbody>
<?php
	if($datalist){
	foreach($datalist as $k=>$v) {
?>
    <tr>
		<td><input type="checkbox" value="<?php echo $v['staff_id']?>" name="userid[]"></td>
		<td><?php echo $v['is_lock']?"锁定":"正常"?></td>
		<td><?php echo isset($grouplist[$v['group_id']])?$grouplist[$v['group_id']]:'';?></td>
		<td><?php echo $v['username']?></td>
        <td><?php echo $v['fullname']?></td>
		<td><?php echo $v['email']?></td>
		<td>
			<a href="javascript:edit(<?php echo $v['staff_id']?>, '<?php echo $v['username']?>')" class="btn btn-default"> 修改</a>	</td>
    </tr>
<?php
	}}

?>
</tbody>
			</tbody>
     		<tfoot>
                <tr>
                    <td colspan="10">
                         <input type="submit" class="btn btn-default" name="dosubmit" value="删除" onclick="return confirm('您确定要删除吗')"/>
<input type="button" class="btn btn-default" name="dosubmit" onclick="lock()" value="锁定"/>
<input type="button" class="btn btn-default" name="dosubmit" onclick="unlock()" value="解锁"/>
                        <?php echo $pages?>
                    </td>
                </tr>
            </tfoot>

</table>
</form>
</div></div>
<script type="text/javascript">
<!--
function edit(id, name) {
		window.location.href='<?php echo base_url('adminpanel/staff/edit/')?>/'+id;
}

function lock()
{
	$("#myform").attr('action','<?php echo base_url('adminpanel/staff/lock/')?>/');
	document.myform.submit();
}

function unlock()
{
	$("#myform").attr('action','<?php echo base_url('adminpanel/staff/unlock/')?>/');
	document.myform.submit();
}

function checkuid() {
	var ids='';
	$("input[name='userid[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});
	if(ids=='') {
		alert('请先选择员工');
		return false;
	} else {
		return true;
	}
}

//-->
</script>