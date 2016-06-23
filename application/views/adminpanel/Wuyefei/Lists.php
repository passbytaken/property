<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><h3 class="page-header"><a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url('Adminpanel/wuyefei/add')?>"><span class="glyphicon glyphicon-plus"></span> 添加 </a> 物业费列表 </h3>  
<form class="form-inline" role="form" method="get">
	<div class="form-group">
				<label for="wuyefei_leixing_id" class="col-sm-5 control-label">物业费类型</label>
				<div class="col-sm-7 ">
					<?php $options = process_datasource($this->Wuyefei_leixing_model->dropdown_datasource())?>
					<select class="form-control "  name="wuyefei_leixing_id"  id="wuyefei_leixing_id">
						<option value="">==不限==</option>
<?php if($options)foreach($options as $option):?>
						<option value='<?php echo $option['val'];?>' <?php if(isset($data_info['wuyefei_leixing_id'])&&($data_info['wuyefei_leixing_id']==$option['val'])) { ?> selected="selected" <?php } ?>            ><?php echo $option['text'];?></option>
<?php endforeach;?>
					</select>

				</div>
			</div>
	<div class="form-group">
				<label for="yezhu_id" class="col-sm-3 control-label">业主</label>
				<div class="col-sm-6 ">
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
            <label class="control-label" >交费时间</label>
            <input class="form-control datepicker" type="text" value="<?php echo isset($data_info['wuyefei_kssj_1'])?$data_info['wuyefei_kssj_1']:'' ?> " name="wuyefei_kssj_1"  id="wuyefei_kssjwuyefei_kssj1"  placeholder="开始时间"/> - 
            <input class="form-control datepicker" type="text" value="<?php echo isset($data_info['wuyefei_kssj_2'])?$data_info['wuyefei_kssj_2']:'' ?> " name="wuyefei_kssj_2"  id="wuyefei_kssjwuyefei_kssj2"  placeholder="结束时间"/>
            </div>
        <button type="submit" name="dosubmit" value="搜索" class="btn btn-success">搜索...</button></form>
<hr/>
<?php if($data_list):?>
<form method="post" id="form_list" action="<?php echo base_url('Adminpanel/wuyefei/delete_all')?>" >
<div class="panel panel-default">
<div class="table-responsive">

        <table class="table table-hover dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th   nowrap="nowrap">物业费类型</th>
              <th   nowrap="nowrap">业主</th>
              <th   nowrap="nowrap">费用开始时间</th>
              <th   nowrap="nowrap">费用结束时间</th>
              <th   nowrap="nowrap">收费日期</th>
              <th   nowrap="nowrap">费用</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data_list as $k=>$v):?>
            <tr>
              <td><input type="checkbox" name="pid[]" value="<?php echo $v['wuyefei_id']?>" /></td>
                             <td><?php echo $v['wuyefei_leixing_id']?></td>
                            <td><?php echo $v['yezhu_id']?></td>
                            <td><?php echo $v['wuyefei_kssj']?></td>
                            <td><?php echo $v['wuyefei_jssj']?></td>
                            <td><?php echo $v['wuyefei_cjsj']?></td>
                            <td><?php echo $v['wuyefei_fy']?></td>
              <td>
              	<a href="<?php echo base_url('Adminpanel/wuyefei/readonly/'.$v['wuyefei_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
                <a href="<?php echo base_url('Adminpanel/wuyefei/edit/'.$v['wuyefei_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
                <a class="btn btn-default btn-xs" onclick="delete_this(<?php echo $v['wuyefei_id'];?>)"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                
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
			window.location.href='<?php echo base_url('Adminpanel/wuyefei/')?>/delete_one/'+v;
		}
	}
-->
</script>
