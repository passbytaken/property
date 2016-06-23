<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><h3 class="page-header"><a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url('Adminpanel/wuyefei_leixing/add')?>"><span class="glyphicon glyphicon-plus"></span> 添加 </a> 物业费类型列表 </h3>  
<?php if($data_list):?>
<form method="post" id="form_list" action="<?php echo base_url('Adminpanel/wuyefei_leixing/delete_all')?>" >
<div class="panel panel-default">
<div class="table-responsive">

        <table class="table table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th   nowrap="nowrap">物业费类型</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data_list as $k=>$v):?>
            <tr>
              <td><input type="checkbox" name="pid[]" value="<?php echo $v['wuyefei_leixing_id']?>" /></td>
                             <td><?php echo $v['wuyefei_leixing_name']?></td>
              <td>
              	<a href="<?php echo base_url('Adminpanel/wuyefei_leixing/readonly/'.$v['wuyefei_leixing_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
                <a href="<?php echo base_url('Adminpanel/wuyefei_leixing/edit/'.$v['wuyefei_leixing_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
                <a class="btn btn-default btn-xs" onclick="delete_this(<?php echo $v['wuyefei_leixing_id'];?>)"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                
              </td>
            </tr>
            <?php endforeach;?>
            
          </tbody>
        </table>
        
           
    	</div>
      <div class="pull-left"><br/>
          <div class="btn-group">
            <button type="button" class="btn btn-default" onclick="TS.Page.UI.ReverseChecked('pid[]')"><span class="glyphicon glyphicon-ok"></span> 反选</button>
            <button type="button" onclick="delete_all()"  class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> 删除勾选</button>
          </div>
  		</div>
      <div class="pull-right">
      <?php echo $pages;?>
      </div>
       
</div>
  </form>
  <?php else:?>
            	<div class="alert alert-warning" role="alert"> 暂无数据显示... 您可以进行新增操作 </div>
       <?php endif;?>
<script language="javascript" type="text/javascript">
<!--
	$(".datepicker").datepicker();
	function delete_all()
	{
		var _arr = TS.Common.Array.GetCheckedValue("pid[]");
		if(_arr.length==0)
		{
				alert("请先勾选明细");
				return false;
		}
		if(confirm('确定要删除吗?'))
		{
			$("#form_list").submit();
		}
	}
	
	function delete_this(v)
	{
		if(confirm('确定要删除吗?'))
		{
			window.location.href='<?php echo base_url('Adminpanel/wuyefei_leixing/')?>/delete_one/'+v;
		}
	}
-->
</script>
