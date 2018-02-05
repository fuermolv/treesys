<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;

use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeStatisticsController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() {

       
          $sta_type = I('get.sta_type');
          $end_s_time = I('get.end_s_time');
            $start_s_time = I('get.start_s_time');
        
           $orderBy='group_id';
          
           $gmap['group_status'] = 1;
           $group_data = M("group")->where($gmap)->order($orderBy)->select();

           $this->assign('sta_type', $sta_type);
       
           $this->assign('end_s_time', $end_s_time);
           $this->assign('start_s_time', $start_s_time);

          $this->assign('group_data', $group_data);
          $this->display();
    }
    public function day_chart() {
        $group_id = I('get.group_id');
        $s_type = I('get.s_type');
        $end_s_time = I('get.end_s_time');
        $start_s_time = I('get.start_s_time');
        $this->assign('end_s_time', $end_s_time);
        $this->assign('start_s_time', $start_s_time);
        $this->assign('group_id',  $group_id);
        $this->assign('s_type', $s_type);
        $this->display();
    }
   
    public function day_chart_show()
    {
          $group_id = I('get.group_id');
          $end_s_time = I('get.end_s_time');
         $start_s_time = I('get.start_s_time');
         $s_type =I('get.s_type');
         vendor('Jpgraph.Chart');
         $chart = new \Chart;


         if($s_type==0)
         {
         $title = "(".$start_s_time."-".$end_s_time.")".$group_id.'树障缺陷等级统计'; //标题
        $data = array_rand(range(1,100),3);//数据(1到100中随机取12个)
        shuffle($data); //随机排序
        $size = 140; //尺寸
        $width = 1200; //宽度
        $height = 800; //高度
        $legend = array("重大缺陷","一般缺陷","其他缺陷");//说明
        /*上面的参数各种图都是用，比如：饼图 折线图 柱形图等等，需要改变的就是下面的chart.php中的function的名字*/
        //$chart->createmonthline($title,$data,$size,$height,$width,$legend);
        $chart->create3dpie($title,$data,$size,$height,$width,$legend);
      //  $chart->createcolumnar($title,$data,$size,$height,$width,$legend);
      //  $chart->createring($title,$data,$size,$height,$width,$legend);
       }
        if($s_type==1)
         {

             $t = "(".$start_s_time."-".$end_s_time.")".$group_id.'树障处理情况统计'; //标题

            vendor('Jpgraph.Jpgraph.jpgraph');   //必须的  
            vendor('Jpgraph.Jpgraph.jpgraph_bar');   //依具体情况引入 
            $data0y=array(rand(5,10),rand(5,10),rand(3,5)); 
            $data1y=array(rand(5,10),rand(5,10),rand(3,5));
            $data2y=array(rand(15,20),rand(15,20),rand(10,15));

             // 图表的长宽
            $graph = new \Graph(1200,800);
            $graph->SetScale("textlin");
            $graph->SetShadow();
            $graph->SetFrame(false); // No border around the graph
           
          //  $graph->SetShadow();

            //图表的外边距
          //  $graph->img->SetMargin(50,30,100,20);
           // Create the bar plots
            $b0plot = new \BarPlot($data0y);
            $b0plot->SetFillColor("green");
          
            $b0plot->value->Show();

            $b1plot = new \BarPlot($data1y);
            $b1plot->SetFillColor("orange");
      
            $b1plot->value->Show();

            $b2plot = new \BarPlot($data2y);
            $b2plot->SetFillColor("blue");
          
            $b2plot->value->Show();


            // Create the grouped bar plot
            $gbplot = new \GroupBarPlot(array($b0plot,$b1plot,$b2plot));
              // ...and add it to the graPH
            $graph->Add($gbplot);

            //设置图表的标题字体、大小
            $graph->title->Set(iconv("UTF-8","GB2312//IGNORE",$t));


           

            $legend = array("重大缺陷(砍伐/降级/总体)","一般缺陷(砍伐/降级/总体)","其他缺陷(砍伐/降级/总体)");//说明
            foreach ($legend as $k => $v) {
            $legend[$k] = iconv('utf-8', 'gb2312', $v);
            }
           



            $graph->xaxis->SetTickLabels($legend);
            $graph->xaxis->SetFont(FF_SIMSUN);

             //和上面标题对应，设置标题的字体和大小
            $graph->title->SetFont(FF_SIMSUN,FS_BOLD);
            $graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
            $graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
             $graph->legend->SetFont(FF_SIMSUN,FS_BOLD);
            $graph->legend->SetFrameWeight(1);
            $graph->legend->SetColumns(3);

            //生成本地图表，黙认留空，生成在当前目录，可以Stroke(“路径/文件名.png”)这样指定路径
            $graph->Stroke();
        
     
       }
 
    }

    public function zone_process() {

       
          $zone_data=array("清城","清新","佛冈","英德","阳山","连州","连南","连山");
          $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');
        
          $this->assign('zone_data', $zone_data);
          $this->assign('end_s_time', $end_s_time);
          $this->assign('start_s_time', $start_s_time);
       

          $this->display();
    }

    public function zone_process_chart() {

       
          $zone=I('get.zone');
           $s_type = I('get.s_type');
          $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');
          $this->assign('zone', $zone);
          $this->assign('end_s_time', $end_s_time);
          $this->assign('start_s_time', $start_s_time);
          $this->assign('s_type', $s_type);
          $this->display();
    }

     public function zone_process_chart_show() {

       
          $zone=I('get.zone');
          $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');
          $s_type =I('get.s_type');
          vendor('Jpgraph.Chart');
          $chart = new \Chart;
          if( $s_type==0)
          {
          $title = "(".$start_s_time."-".$end_s_time.")".$group_id.'各地完成率统计(百分比）'; //标题
          $data = array(rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98));
         shuffle($data); //随机排序
         $size = 140; //尺寸
        $width = 1200; //宽度
        $height = 800; //高度
        $legend = array("清城","清新","佛冈","英德","阳山","连州","连南","连山");//说明
        /*上面的参数各种图都是用，比如：饼图 折线图 柱形图等等，需要改变的就是下面的chart.php中的function的名字*/
        //$chart->createmonthline($title,$data,$size,$height,$width,$legend);
       // $chart->create3dpie($title,$data,$size,$height,$width,$legend);
        $chart->createcolumnar($title,$data,$size,$height,$width,$legend);
      //  $chart->createring($title,$data,$size,$height,$width,$legend);
          }
          if($s_type==1)
          {
            $title = "2017年(".$zone.')月完成率统计(百分比）'; //标题
          $data = array(rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98),rand(80,98));
         shuffle($data); //随机排序
         $size = 140; //尺寸
        $width = 1200; //宽度
        $height = 800; //高度
        $legend = array("一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月");//说明
        /*上面的参数各种图都是用，比如：饼图 折线图 柱形图等等，需要改变的就是下面的chart.php中的function的名字*/
        $chart->createmonthline($title,$data,$size,$height,$width,$legend);
       // $chart->create3dpie($title,$data,$size,$height,$width,$legend);
    //$chart->createcolumnar($title,$data,$size,$height,$width,$legend);
      //  $chart->createring($title,$data,$size,$height,$width,$legend);

          }




          $this->assign('zone', $zone);
          $this->assign('end_s_time', $end_s_time);
          $this->assign('start_s_time', $start_s_time);
          $this->display();

    }


    
   
    
}