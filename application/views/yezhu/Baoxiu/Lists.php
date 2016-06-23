<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><h3 class="page-header"><a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url('yezhu/baoxiu/add')?>"><span class="glyphicon glyphicon-plus"></span> 添加报修 </a> 维修报修列表 </h3>  
<form class="form-inline" role="form" method="get">
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
<form method="post" id="form_list" action="<?php echo base_url('yezhu/baoxiu/delete_all')?>" >
<div class="panel panel-default">
<div class="table-responsive">

        <table class="table table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th nowrap="nowrap">报修时间</th>
              <th nowrap="nowrap">报修问题</th>
              <th nowrap="nowrap">报修状态</th>
              <th nowrap="nowrap">维修时间</th>
              <th nowrap="nowrap">维修费用</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data_list as $k=>$v):?>
            <tr>
              <td><?php echo $k+1?></td>
                            <td><?php echo $v['baoxiu_sj']?></td>
                            <td><?php echo $v['baoxiu_wt']?></td>
                            <td><?php echo $v['baoxiu_zt']?></td>
                            <td><?php echo $v['weixiu_sj']?></td>
                            <td><?php echo $v['weixiu_fy']?></td>
              <td>
              	<a href="<?php echo base_url('yezhu/baoxiu/readonly/'.$v['baoxiu_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
                 <?php if($v['baoxiu_zt']=="未处理"):?>
                <a href="<?php echo base_url('yezhu/baoxiu/edit/'.$v['baoxiu_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
                <a class="btn btn-default btn-xs" onclick="delete_this(<?php echo $v['baoxiu_id'];?>)"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                <?php endif;?>
              </td>
            </tr>
            <?php endforeach;?>
            
          </tbody>
        </table>
        
           
    	</div>
      <div class="pull-left"><br/>
     
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
	
	
	function delete_this(v)
	{
		if(confirm('确定要删除吗?'))
		{
			window.location.href='<?php echo base_url('yezhu/baoxiu/')?>/delete_one/'+v;
		}
	}
-->
</script>
