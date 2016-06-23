<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><h3 class="page-header">
<?php if($this->current_admin_groupid==2):?>
<a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url('Adminpanel/baoxiu/add')?>"><span class="glyphicon glyphicon-plus"></span> 添加 </a> 维修报修列表 <?php endif;?></h3>  

<form class="form-inline" role="form" method="get">
	<div class="form-group">
				<label for="yezhu_id" class="col-sm-3 control-label">业主</label>
				<div class="col-sm-7 ">
					<?php $options = process_datasource($this->Yezhu_model->dropdown_datasource())?>
					<select class="form-control "  name="yezhu_id"  id="yezhu_id">
						<option value="">==不限==</option>
<?php if($options)foreach($options as $option):?>
						<option value='<?php echo $option['val'];?>' <?php if(isset($data_info['yezhu_id'])&&($data_info['yezhu_id']==$option['val'])) { ?> selected="selected" <?php } ?>            ><?php echo $option['text'];?></option>
<?php endforeach;?>
					</select>

				</div>
			</div>
	<div class="form-group">
				<label for="baoxiu_zt" class="col-sm-5 control-label">报修状态</label>
				<div class="col-sm-7 ">
					<select class="form-control "  name="baoxiu_zt"  id="baoxiu_zt"><option value="">==不限==</option><option value='未处理' 
					<?php if(isset($data_info['baoxiu_zt'])&&($data_info['baoxiu_zt']=='未处理')) { ?> selected="selected" <?php } ?>              >未处理</option>
<option value='正在处理' 
					<?php if(isset($data_info['baoxiu_zt'])&&($data_info['baoxiu_zt']=='正在处理')) { ?> selected="selected" <?php } ?>              >正在处理</option>
<option value='已完成' 
					<?php if(isset($data_info['baoxiu_zt'])&&($data_info['baoxiu_zt']=='已完成')) { ?> selected="selected" <?php } ?>              >已完成</option>
</select>
				</div>
			</div>
<button type="submit" name="dosubmit" value="搜索" class="btn btn-success">搜索...</button></form>
<hr/>
<?php if($data_list):?>
<form method="post" id="form_list" action="<?php echo base_url('Adminpanel/baoxiu/delete_all')?>" >
<div class="panel panel-default">
<div class="table-responsive">

        <table class="table table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th   nowrap="nowrap">业主</th>
              <th   nowrap="nowrap">报修时间</th>
              <th   nowrap="nowrap">维修时间</th>
              <th   nowrap="nowrap">报修问题</th>
              <th   nowrap="nowrap">报修状态</th>
              <th   nowrap="nowrap">维修费用</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data_list as $k=>$v):?>
            <tr>
              <td><input type="checkbox" name="pid[]" value="<?php echo $v['baoxiu_id']?>" /></td>
                             <td><?php echo $v['yezhu_id']?></td>
                            <td><?php echo $v['baoxiu_sj']?></td>
                            <td><?php echo $v['weixiu_sj']?></td>
                            <td><?php echo $v['baoxiu_wt']?></td>
                            <td><?php echo $v['baoxiu_zt']?></td>
                            <td><?php echo $v['weixiu_fy']?></td>
              <td>
              	<a href="<?php echo base_url('Adminpanel/baoxiu/readonly/'.$v['baoxiu_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
                <?php if($v['baoxiu_zt']!="已完成"):?>
                <a href="<?php echo base_url('Adminpanel/baoxiu/edit/'.$v['baoxiu_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 处理</a>
               
                <a class="btn btn-default btn-xs" onclick="delete_this(<?php echo $v['baoxiu_id'];?>)"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                 <?php endif;?>
              </td>
            </tr>
            <?php endforeach;?>
            
          </tbody>
        </table>
        
           
    	</div>
      <div class="pull-left"><br/>
      <?php if($this->current_admin_groupid==2):?>
          <div class="btn-group">
            <button type="button" class="btn btn-default" onclick="TS.Page.UI.ReverseChecked('pid[]')"><span class="glyphicon glyphicon-ok"></span> 反选</button>
            <button type="button" onclick="delete_all()"  class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> 删除勾选</button>
          </div>
      <?php endif;?>
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
			window.location.href='<?php echo base_url('Adminpanel/baoxiu/')?>/delete_one/'+v;
		}
	}
-->
</script>
