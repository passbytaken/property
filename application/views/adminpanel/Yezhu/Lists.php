<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><h3 class="page-header"><a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url('Adminpanel/yezhu/add')?>"><span class="glyphicon glyphicon-plus"></span> 添加 </a> 业主信息列表 </h3>  
<form class="form-inline" role="form" method="get">
<div class="form-group">
<label for="keyword">关键词</label>
<input class="form-control" type="text" name="keyword"  value="<?php echo isset($data_info['keyword'])? $data_info['keyword']:"";?>" id="keyword" placeholder="请输入关键词"/></div>
	<div class="form-group">
				<label for="yezhu_dyh" class="col-sm-5 control-label">业主单元号</label>
				<div class="col-sm-7 ">
					<select class="form-control "  name="yezhu_dyh"  id="yezhu_dyh"><option value="">==不限==</option><option value='1栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='1栋')) { ?> selected="selected" <?php } ?>              >1栋</option>
<option value='2栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='2栋')) { ?> selected="selected" <?php } ?>              >2栋</option>
<option value='3栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='3栋')) { ?> selected="selected" <?php } ?>              >3栋</option>
<option value='4栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='4栋')) { ?> selected="selected" <?php } ?>              >4栋</option>
<option value='5栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='5栋')) { ?> selected="selected" <?php } ?>              >5栋</option>
<option value='6栋' 
					<?php if(isset($data_info['yezhu_dyh'])&&($data_info['yezhu_dyh']=='6栋')) { ?> selected="selected" <?php } ?>              >6栋</option>
</select>
				</div>
			</div>
<button type="submit" name="dosubmit" value="搜索" class="btn btn-success">搜索...</button></form>
<hr/>
<?php if($data_list):?>
<form method="post" id="form_list" action="<?php echo base_url('Adminpanel/yezhu/delete_all')?>" >
<div class="panel panel-default">
<div class="table-responsive">

        <table class="table table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th   nowrap="nowrap">业主单元号</th>
              <th   nowrap="nowrap">业主房号</th>
              <th   nowrap="nowrap">业主姓名</th>
              <th   nowrap="nowrap">业主性别</th>
              <th   nowrap="nowrap">业主联系手机</th>
              <th   nowrap="nowrap">业主用户名</th>
              <th   nowrap="nowrap">业主入住时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data_list as $k=>$v):?>
            <tr>
              <td><input type="checkbox" name="pid[]" value="<?php echo $v['yezhu_id']?>" /></td>
                             <td><?php echo $v['yezhu_dyh']?></td>
                            <td><?php echo $v['yezhu_fh']?></td>
                            <td><?php echo $v['yezhu_xm']?></td>
                            <td><?php echo $v['yezhu_xb']?></td>
                            <td><?php echo $v['yezhu_dh']?></td>
                            <td><?php echo $v['yezhu_username']?></td>
                            <td><?php echo $v['yezhu_rzsj']?></td>
              <td>
              	<a href="<?php echo base_url('Adminpanel/yezhu/readonly/'.$v['yezhu_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
                <a href="<?php echo base_url('Adminpanel/yezhu/edit/'.$v['yezhu_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
                <a class="btn btn-default btn-xs" onclick="delete_this(<?php echo $v['yezhu_id'];?>)"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                
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
			window.location.href='<?php echo base_url('Adminpanel/yezhu/')?>/delete_one/'+v;
		}
	}
-->
</script>
