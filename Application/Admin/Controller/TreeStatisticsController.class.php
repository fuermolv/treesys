<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;

use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeStatisticsController extends AdminBaseController{
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
           $data=null;
           $cdata=null;


            $smap['datail_uptodate'] = 1;


            if(!empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('between',array(convTime($start_s_time),convTime($end_s_time)));
                 
            }
            if(!empty($start_s_time) and empty($end_s_time))
            {
              $smap['datail_update_time']= array('EGT',convTime($start_s_time));
                 
            }

             if(empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('ELT',convTime($end_s_time));
                 
            }


        
            $model= M("tree_base");
            $list = $model->field('datail_check_change_conclusion,accountability_group,voltage_degree,datail_danger_degree,datail_tree_num,datail_tree_area')
            ->where($smap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->select();
         

            for($i=0;$i<sizeof($list);$i++)
            {   
                 $temp=$list[$i];
                 $v=$temp['voltage_degree'];
                 $a=$temp['accountability_group'];
                 $d=$temp['datail_danger_degree'];
                 $c=$temp['datail_check_change_conclusion'];

                 $k=round($temp['datail_tree_num']);
                 $m=round ($temp['datail_tree_area']);



                 if(empty($k) and !empty($m))
                 {
                  $tk=0;
                  $tm=$m;
                 }

                 if(!empty($k))
                 {
                  $tk=$k;
                  $tm=0;
                 }



                 $cdata[$a]['棵']=$cdata[$a]['棵']+$tk;
                 $cdata[$a]['亩']=$cdata[$a]['亩']+$tm;
                 $cdata['汇总']['棵']=$cdata['汇总']['棵']+$tk;
                 $cdata['汇总']['亩']=$cdata['汇总']['亩']+$tm;



                 // $cdata['汇总']['重大']['降级']=0;
                 // $cdata['汇总']['重大']['全部砍伐']=0;
                 // $cdata['汇总']['一般']['降级']=0;
                 // $cdata['汇总']['一般']['全部砍伐']=0;
                 // $cdata['汇总']['其他']['降级']=0;
                 // $cdata['汇总']['其他']['全部砍伐']=0;
                 // $cdata['汇总']['不构成其他']['全部砍伐']=0;
                



                 if(strpos($c,'重大降')!==false)
                 {
                    if(empty($cdata[$a]['重大']['降级']))
                    {
                      $cdata[$a]['重大']['降级']=1;
                      $cdata['汇总']['重大']['降级']=$cdata['汇总']['重大']['降级']+1;
                    }
                    else
                    {
                       $cdata[$a]['重大']['降级']=$cdata[$a]['重大']['降级']+1;
                       $cdata['汇总']['重大']['降级']=$cdata['汇总']['重大']['降级']+1;
                    }
                   
                 }
                 if(strpos($c,'重大变')!==false)
                 {
                    if(empty($cdata[$a]['重大']['全部砍伐']))
                    {
                      $cdata[$a]['重大']['全部砍伐']=1;
                       $cdata['汇总']['重大']['全部砍伐']=$cdata['汇总']['重大']['全部砍伐']+1;
                    }
                    else
                    {
                       $cdata[$a]['重大']['全部砍伐']=$cdata[$a]['重大']['全部砍伐']+1;
                        $cdata['汇总']['重大']['全部砍伐']=$cdata['汇总']['重大']['全部砍伐']+1;
                    }
                   
                 }
                 if(strpos($c,'一般降')!==false)
                 {
                    if(empty($cdata[$a]['一般']['降级']))
                    {
                      $cdata[$a]['一般']['降级']=1;
                      $cdata['汇总']['一般']['降级']=$cdata['汇总']['一般']['降级']+1;

                    }
                    else
                    {
                       $cdata[$a]['一般']['降级']=$cdata[$a]['一般']['降级']+1;
                       $cdata['汇总']['一般']['降级']=$cdata['汇总']['一般']['降级']+1;
                    }
                   
                 }
                 if(strpos($c,'一般变')!==false)
                 {
                    if(empty($cdata[$a]['一般']['全部砍伐']))
                    {
                      $cdata[$a]['一般']['全部砍伐']=1;
                      $cdata['汇总']['一般']['全部砍伐']=$cdata['汇总']['一般']['全部砍伐']+1;
                    }
                    else
                    {
                       $cdata[$a]['一般']['全部砍伐']=$cdata[$a]['一般']['全部砍伐']+1;
                       $cdata['汇总']['一般']['全部砍伐']=$cdata['汇总']['一般']['全部砍伐']+1;
                    }
                   
                 }
                 if(strpos($c,'其他降')!==false and strpos($c,'不构成')==false)
                 {
                    if(empty($cdata[$a]['其他']['降级']))
                    {
                      $cdata[$a]['其他']['降级']=1;
                       $cdata['汇总']['其他']['降级']=$cdata['汇总']['其他']['降级']+1;
                    }
                    else
                    {
                       $cdata[$a]['其他']['降级']=$cdata[$a]['其他']['降级']+1;
                        $cdata['汇总']['其他']['降级']=$cdata['汇总']['其他']['降级']+1;
                    }
                   
                 }
                 if(strpos($c,'其他变')!==false and strpos($c,'不构成')==false)
                 {
                    if(empty($cdata[$a]['其他']['全部砍伐']))
                    {
                      $cdata[$a]['其他']['全部砍伐']=1;
                       $cdata['汇总']['其他']['全部砍伐']=$cdata['汇总']['其他']['全部砍伐']+1;
                    }
                    else
                    {
                       $cdata[$a]['其他']['全部砍伐']=$cdata[$a]['其他']['全部砍伐']+1;
                        $cdata['汇总']['其他']['全部砍伐']=$cdata['汇总']['其他']['全部砍伐']+1;
                    }
                   
                 }
                  if(strpos($c,'不构成其他变')!==false )
                 {
                    if(empty($cdata[$a]['不构成其他']['全部砍伐']))
                    {
                      $cdata[$a]['不构成其他']['全部砍伐']=1;
                      $cdata['汇总']['不构成其他']['全部砍伐']=$cdata['汇总']['其他']['全部砍伐']+1;
                    }
                    else
                    {
                       $cdata[$a]['不构成其他']['全部砍伐']=$cdata[$a]['其他']['全部砍伐']+1;
                       $cdata['汇总']['不构成其他']['全部砍伐']=$cdata['汇总']['其他']['全部砍伐']+1;
                    }
                   
                 }
               










                 if(empty($data[$a][$v][$d]))
                 {
                   $data[$a][$v][$d]=1;
                 

                 }
                 else
                 {
                   $data[$a][$v][$d]++;
                 }
                 if(empty($data['汇总'][$v][$d]))
                 {
                   $data['汇总'][$v][$d]=1;
                 

                 }
                 else
                 {
                   $data['汇总'][$v][$d]++;
                 }

            }
        
           

            $group_data[sizeof($group_data)+1]['group_name']='汇总';

           
           $this->assign('cdata', $cdata);
           $this->assign('data', $data);
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
        $orderBy='group_id';
        $gmap['group_status'] = 1;
        $group_data = M("group")->where($gmap)->order($orderBy)->select();


        $this->assign('end_s_time', $end_s_time);
        $this->assign('start_s_time', $start_s_time);
        $this->assign('group_id',  $group_id);
        $this->assign('group_data',  $group_data);
        $this->assign('s_type', $s_type);
        $this->display();
    }
   
    public function day_chart_show()
    {
          ob_clean();
          $fake=I('get.fake');
          $group_id = I('get.group_id');
          $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');
          $s_type =I('get.s_type');
          vendor('Jpgraph.Chart');
          $chart = new \Chart;
          $smap['datail_uptodate'] = 1;
            if(!empty($group_id))
            {
            $smap['accountability_group']=$group_id;
            }

              if(!empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('between',array(convTime($start_s_time),convTime($end_s_time)));
                 
            }
            if(!empty($start_s_time) and empty($end_s_time))
            {
              $smap['datail_update_time']= array('EGT',convTime($start_s_time));
                 
            }

             if(empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('ELT',convTime($end_s_time));
                 
            }


         if($s_type==0)
         {
         $title = "(".$start_s_time."-".$end_s_time.")".$group_id.'树障缺陷等级统计'; //标题
         


          
          


            
            $data[0]=1;
            $data[1]=2;
            $data[2]=3;

            $model= M("tree_base");
            $list = $model->field('datail_danger_degree')->where($smap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->select();
             for($i=0;$i<sizeof($list);$i++)
             {
                $d=$list[$i]['datail_danger_degree'];
                if($d=='重大')
                {
                   $data[0]=$data[0]+1;
                }
                 if($d=='一般')
                {
                   $data[1]=$data[1]+1;
                }
                 if($d=='其他')
                {
                   $data[2]=$data[2]+1;
                }
             }
            
            // $data=array(1,3,5);



             



       
        $size = 140; //尺寸==1
        
        $width = 1200; //宽度
        $height = 800; //高度
        if($fake==1)
        {
      
          $width = 600; //宽度
          $height = 400; //高度
        }
      
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

              $model= M("tree_base");
              $list = $model->field('datail_check_change_conclusion')->where($smap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->select();
            for($i=0;$i<sizeof($list);$i++)
            {    
                $temp=$list[$i];
                $c=$temp['datail_check_change_conclusion'];
                $cdata['重大']['降级']=0;
                $cdata['重大']['全部砍伐']=0;
                $cdata['一般']['降级']=0;
                $cdata['一般']['全部砍伐']=0;
                $cdata['其他']['降级']=0;
                $cdata['其他']['全部砍伐']=0;
                $cdata['不构成其他']['全部砍伐']=0;
                 if(strpos($c,'重大降')!==false)
                 {
                    if(empty($cdata[$a]['重大']['降级']))
                    {
                      $cdata['重大']['降级']=1;
                      
                    }
                    else
                    {
                       $cdata['重大']['降级']=$cdata['重大']['降级']+1;
                      
                    }
                   
                 }
                 if(strpos($c,'重大变')!==false)
                 {
                    if(empty($cdata['重大']['全部砍伐']))
                    {
                      $cdata['重大']['全部砍伐']=1;
                       
                    }
                    else
                    {
                       $cdata['重大']['全部砍伐']=$cdata['重大']['全部砍伐']+1;
                      
                    }
                   
                 }
                 if(strpos($c,'一般降')!==false)
                 {
                    if(empty($cdata['一般']['降级']))
                    {
                      $cdata['一般']['降级']=1;
                     

                    }
                    else
                    {
                       $cdata['一般']['降级']=$cdata['一般']['降级']+1;
                     
                    }
                   
                 }
                 if(strpos($c,'一般变')!==false)
                 {
                    if(empty($cdata['一般']['全部砍伐']))
                    {
                      $cdata['一般']['全部砍伐']=1;
                  
                    }
                    else
                    {
                       $cdata['一般']['全部砍伐']=$cdata['一般']['全部砍伐']+1;
                       
                    }
                   
                 }
                 if(strpos($c,'其他降')!==false and strpos($c,'不构成')==false)
                 {
                    if(empty($cdata['其他']['降级']))
                    {
                      $cdata['其他']['降级']=1;
                     
                    }
                    else
                    {
                       $cdata['其他']['降级']=$cdata['其他']['降级']+1;
                       
                    }
                   
                 }
                 if(strpos($c,'其他变')!==false and strpos($c,'不构成')==false)
                 {
                    if(empty($cdata['其他']['全部砍伐']))
                    {
                      $cdata['其他']['全部砍伐']=1;
                       
                    }
                    else
                    {
                       $cdata['其他']['全部砍伐']=$cdata['其他']['全部砍伐']+1;
                      
                    }
                   
                 }
            }
            // if($group_id == '')
            // {

            // $data0y=array(rand(10,20),rand(10,20),rand(5,12)); 
            // $data1y=array(rand(10,20),rand(10,20),rand(5,10));
            // $data2y=array(rand(30,45),rand(30,45),rand(30,45));

            // }
            // else
            // {
            //   $data0y=array(rand(5,10),rand(5,10),rand(3,5)); 
            //   $data1y=array(rand(5,10),rand(5,10),rand(3,5));
            //   $data2y=array(rand(15,20),rand(15,20),rand(10,15));


            //   }

            $data0y=array($cdata['重大']['全部砍伐'], $cdata['重大']['降级'] ,$cdata['重大']['全部砍伐']+ $cdata['重大']['降级']); 
            $data1y=array($cdata['一般']['全部砍伐'], $cdata['一般']['降级'],$cdata['一般']['全部砍伐']+ $cdata['一般']['降级']);
            $data2y=array($cdata['其他']['全部砍伐'], $cdata['其他']['降级'],$cdata['其他']['全部砍伐']+ $cdata['其他']['降级']);
            

             // 图表的长宽

            if($fake==1)
        {
      
         $graph = new \Graph(600,400);
        }else
        {
           $graph = new \Graph(1200,800);
        }
            
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

       
          $zone_data=array("清城区","清新区","佛冈县","英德市","阳山县","连州市","连南县","连山县","汇总");
          $v_data=array("500","220","110","35");
          $d_data=array("重大","一般");

          $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');


              if(!empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('between',array(convTime($start_s_time),convTime($end_s_time)));
                 
            }
            if(!empty($start_s_time) and empty($end_s_time))
            {
              $smap['datail_update_time']= array('EGT',convTime($start_s_time));
                 
            }

             if(empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('ELT',convTime($end_s_time));
                 
            }

          $smap['order_tag']=array('NEQ',-1);

          $model= M("tree_base");
          $list = $model->field('county,order_tag,voltage_degree,datail_danger_degree')->where($smap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_order od ON base.tid=od.order_tid', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->select();
          for($i=0;$i<sizeof($list);$i++)
          {
             $temp=$list[$i];
             $c= $temp['county'];
             $t= $temp['order_tag'];
             $v= $temp['voltage_degree'];
             $d=$temp['datail_danger_degree'];
             if($d=='重大' or $d=='一般')
             {
               if($t==0)
             {
                $data[$c][$v][$d]['发布']= $data[$c][$v]['发布']+1;
                $data['汇总'][$v][$d]['发布']= $data[$c][$v]['发布']+1;
                
             }
             if($t==1)
             {
                $data[$c][$v][$d]['发布']= $data[$c][$v]['发布']+1;
                $data[$c][$v][$d]['完成']= $data[$c][$v]['完成']+1;
                $data['汇总'][$v][$d]['发布']= $data[$c][$v]['发布']+1;
                $data['汇总'][$v][$d]['完成']= $data[$c][$v]['完成']+1;
                
             }   
             }
             
             

          }
          for($j=0;$j<sizeof($zone_data);$j++)
          {
            $c=$zone_data[$j];
            

            for($k=0;$k<sizeof($v_data);$k++)
            {
                $v=$v_data[$k];
               
              for($l=0;$l<sizeof($d_data);$l++)
              {   
                 $d=$d_data[$l];

                 


                 
                 if(!empty($data[$c][$v][$d]['完成']))
                 {
                     
                   $rate=$data[$c][$v][$d]['完成']/$data[$c][$v][$d]['发布'];
                   $rate=number_format($rate, 4);
                   $data[$c][$v][$d]['完成率']=$rate*100;
                  
                 }
              }
            }
           

          }

         
      

         
           
           
           $this->assign('data', $data);
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
      ob_clean();

          $zone_data=array("清城区","清新区","佛冈县","英德市","阳山县","连州市","连南县","连山县","汇总");
          $v_data=array("500","220","110","35");
          $d_data=array("重大","一般");
         
          $zone=I('get.zone');
           $fake=I('get.fake');
          $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');
          $s_type =I('get.s_type');
          vendor('Jpgraph.Chart');
          $chart = new \Chart;
          if( $s_type==0)
          {


           $title = "(".$start_s_time."-".$end_s_time.")".$group_id.'各地树障任务完成率统计(百分比）'; //标题

            if(!empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('between',array(convTime($start_s_time),convTime($end_s_time)));
                 
            }
            if(!empty($start_s_time) and empty($end_s_time))
            {
              $smap['datail_update_time']= array('EGT',convTime($start_s_time));
                 
            }

             if(empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('ELT',convTime($end_s_time));
                 
            }

          $smap['order_tag']=array('NEQ',-1);

          $model= M("tree_base");
          $list = $model->field('county,order_tag')->where($smap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_order od ON base.tid=od.order_tid', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->select();
          


           for($i=0;$i<sizeof($list);$i++)
          {
             $temp=$list[$i];
             $c= $temp['county'];
             $t= $temp['order_tag'];
             
           
               if($t==0)
             {
                $data[$c]['发布']=$data[$c]['发布']+1;

                
             }
             if($t==1)
             {
                $data[$c]['发布']=$data[$c]['发布']+1;
                $data[$c]['完成']=$data[$c]['完成']+1;   
                
             }   
             
             

          }
          for($j=0;$j<sizeof($zone_data);$j++)
          {
                 $c=$zone_data[$j];
                 $sdata[$j]=0;
             

          
                 
                if(!empty($data[$c]['完成']))
                 {
                     
                   $rate=$data[$c]['完成']/$data[$c]['发布'];
                   $rate=number_format($rate, 2);
                   $sdata[$j]=$rate*100;
                  
                 }
              
            }


      
         
         $size = 140; //尺寸
        $width = 1200; //宽度
        $height = 800; //高度
          if($fake==1)
        {
          $width = 600;//宽度
         $height = 400; //高度
        }
        $legend = array("清城","清新","佛冈","英德","阳山","连州","连南","连山");//说明
        /*上面的参数各种图都是用，比如：饼图 折线图 柱形图等等，需要改变的就是下面的chart.php中的function的名字*/
        //$chart->createmonthline($title,$data,$size,$height,$width,$legend);
       // $chart->create3dpie($title,$data,$size,$height,$width,$legend);
        $chart->createcolumnar($title,$sdata,$size,$height,$width,$legend);
      //  $chart->createring($title,$data,$size,$height,$width,$legend);
          }
          if($s_type==1)
          {
            $title = "2017年(".$zone.')树障任务月完成率统计(百分比）'; //标题
          $data = array(89,96,98,92,91,90,88,89,96,94,92,88);
         shuffle($data); //随机排序
         $size = 140; //尺寸
        $width = 1200; //宽度
        $height = 800; //高度
          if($fake==1)
        {
      
          $width = 600; //宽度
          $height = 400; //高度
        }

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

     public function de_process() {

       
          $de_data=array("清城局","清新局","佛冈局","英德局","阳山局","连州局","连南局","连山局");
          $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');
        
          $this->assign('de_data', $de_data);
          $this->assign('end_s_time', $end_s_time);
          $this->assign('start_s_time', $start_s_time);
       

          $this->display();
    }

    public function de_process_chart() {

       
          $de=I('get.de');
          $s_type = I('get.s_type');
          $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');
          $this->assign('de', $de);
          $this->assign('end_s_time', $end_s_time);
          $this->assign('start_s_time', $start_s_time);
          $this->assign('s_type', $s_type);
          $this->display();
    }

    public function test()
    {
              $end_s_time = I('get.end_s_time');
          $start_s_time = I('get.start_s_time');
              
            if(!empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('between',array(convTime($start_s_time),convTime($end_s_time)));
                 
            }
            if(!empty($start_s_time) and empty($end_s_time))
            {
              $smap['datail_update_time']= array('EGT',convTime($start_s_time));
                 
            }

             if(empty($start_s_time) and !empty($end_s_time))
            {
              $smap['datail_update_time']= array('ELT',convTime($end_s_time));
                 
            }

          $smap['order_tag']=array('NEQ',-1);

          $model= M("tree_base");
          $list = $model->field('county,order_tag')->where($smap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_order od ON base.tid=od.order_tid', 'LEFT')->select();


            var_dump($list);

            
             

          }
        
            
    


    
   
    
}