<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
         <h2 class="page-header"></h2>

    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:300px"></div>
    <!-- ECharts单文件引入 -->
    <script type="text/javascript">
        // 路径配置
        require.config({
            paths: {
                echarts: 'http://echarts.baidu.com/build/dist'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/line',
				'echarts/chart/bar'
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main')); 
                option = {
				title : {
					text: '物业费图形报表',
					subtext: '2015年'
				},
				tooltip : {
					trigger: 'axis'
				},
				legend: {
					data:['<?php echo implode("','",array_keys($datalist))?>']
				},
				calculable : true,
				xAxis : [
					{
						type : 'category',
						data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
					}
				],
				yAxis : [
					{
						type : 'value'
					}
				],
				series : [
				<?php foreach($datalist as $k=>$v):?>
					{
						name:'<?php echo $k?>',
						type:'bar',
						data:[<?php echo implode(",",$v)?>],
						markPoint : {
							data : [
								{type : 'max', name: '最大值'},
								{type : 'min', name: '最小值'}
							]
						},
						markLine : {
							data : [
								{type : 'average', name: '平均值'}
							]
						}
					},
			   <?php endforeach;?>
				]
			};
				myChart.setOption(option);
				
            }
        );
    </script>

          <div class="row placeholders">
            <div class="col-xs-12 col-sm-4 ">
             <p class="circle" ><i class="fa fa-user fa-5x"></i></p>
              <h4>业主</h4>
              <span class="text-muted">共：<?php echo $count_yezhu;?> 户</span>
            </div>
            <div class="col-xs-12 col-sm-4 ">
              <p class="circle" ><i class="fa fa-wrench fa-5x"></i></p>
              <h4>报修</h4>
              <span class="text-muted">共：<?php echo $count_baoxiu;?> 条记录</span>
            </div>
            <div class="col-xs-12 col-sm-4 ">
            <p class="circle" ><i class="fa fa-money fa-5x"></i></p>
              <h4>物业共收费</h4>
              <span class="text-muted">共：<?php echo $sum_total;?> 元</span>
            </div>
          </div>
