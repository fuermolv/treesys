<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Controller\AdminBaseController;

use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;

/**
 * 后台首页控制器
 */
class TreePlanController extends AdminBaseController {
    /**
     * 首页
     */
  
    

    public function check_plan() 
    {
         
        $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;
        $line_name = I('get.line_name');
        $start_tower = I('get.start_tower');
        $voltage_degree = I('get.voltage_degree');
        $plan_type = I('get.plan_type');

           if (!empty( $plan_type))
        {
             $map['check_source']=$plan_type;
            
        }
           if (!empty( $voltage_degree))
        {
             $map['voltage_degree']=$voltage_degree;
            
        }
        if (!empty( $line_name))
        {
             $map['device_name']=$line_name;
            
        }
          if (!empty($start_tower))
        {
             
             $map['star_tower']=$start_tower;
        }

          if(!empty($start_s_time) and !empty($end_s_time))
            {
              $smap['check_plan_time']= array('between',array(convTime($start_s_time),convTime($end_s_time)));
                 
            }
            if(!empty($start_s_time) and empty($end_s_time))
            {
              $smap['check_plan_time']= array('EGT',convTime($start_s_time));
                 
            }

             if(empty($start_s_time) and !empty($end_s_time))
            {
              $smap['check_plan_time']= array('ELT',convTime($end_s_time));
                 
            }
 
         // $map['check_plan_time']=array("GT",NOW_TIME);

        $model= M("plan_check");

        $count =$model->alias('plan')->join('__DEVICE_LINE__ dl ON plan.check_line_id=dl.did', 'LEFT')->where($map)->count();


        $limit = 20;
        $orderBy='danger_degree_serial desc,check_plan_time ';
        $page = new_page($count, $limit);
        $list =$model->alias('plan')->join('__DEVICE_LINE__ dl ON plan.check_line_id=dl.did', 'LEFT')->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
        $data = array('data' => $list, 'page' => $page->show());


         
        $this->assign('data', $data['data']);
        $this->assign('pagehtml', $data['page']);
        $this->assign('querydata', $querydata);


         $this->display();
       }



    public function export_check_plan()
    {
  
        // $this->make_check_plan();

        $model= M("plan_check");
        $limit = 200;
        $map['check_plan_time']=array("GT",NOW_TIME);
        $orderBy="danger_degree_serial desc,check_plan_time";
        $checkdata=$model->alias('plan')->join('__DEVICE_LINE__ dl ON plan.check_line_id=dl.did', 'LEFT')->where($map)->order($orderBy)->limit($limit)->select();
        $data = array();
       foreach ($checkdata as $cd){
          $temp_data=array();
          array_push($temp_data,$cd['check_group']);
          array_push($temp_data,$cd['voltage_degree']);
          array_push($temp_data,$cd['device_name']);
          array_push($temp_data,$cd['check_start_tower']);
          array_push($temp_data,$cd['check_end_tower']);
          array_push($temp_data,$cd['danger_degree']);
          array_push($temp_data,date("Y-m-d",$cd['check_plan_time']));
          array_push($temp_data,date("Y-m-d",$cd['last_check_time']));
          array_push($data,$temp_data);
       }
       

        
        $header="所属班组,电压等级,线路名称,起始杆塔,结束杆塔,隐患等级,计划巡查时间,最近巡查时间";
        create_csv($data,$header,"巡查计划.csv");
    }

   


  public function cut_plan()
    {
           
         $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;
        $line_name = I('get.line_name');
        $start_tower = I('get.start_tower');
        $voltage_degree = I('get.voltage_degree');
           if (!empty( $voltage_degree))
        {
             $map['voltage_degree']=$voltage_degree;
            
        }
        if (!empty( $line_name))
        {
             $map['device_name']=$line_name;
            
        }
          if (!empty($start_tower))
        {
             
             $map['cut_start_tower']=$start_tower;
        }

          if(!empty($start_s_time) and !empty($end_s_time))
            {
              $smap['cut_plan_time']= array('between',array(convTime($start_s_time),convTime($end_s_time)));
                 
            }
            if(!empty($start_s_time) and empty($end_s_time))
            {
              $smap['cut_plan_time']= array('EGT',convTime($start_s_time));
                 
            }

             if(empty($start_s_time) and !empty($end_s_time))
            {
              $smap['cut_plan_time']= array('ELT',convTime($end_s_time));
                 
            }



        $model= M("plan_cut");

        $count =$model->alias('plan')->join('__DEVICE_LINE__ dl ON plan.cut_line_id=dl.did', 'LEFT')->where($map)->count();


        $limit = 20;
        $orderBy='cut_plan_time ';
        $page = new_page($count, $limit);
        $list =$model->alias('plan')->join('__DEVICE_LINE__ dl ON plan.cut_line_id=dl.did', 'LEFT')->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
        $data = array('data' => $list, 'page' => $page->show());


         
        $this->assign('data', $data['data']);
        $this->assign('pagehtml', $data['page']);
        $this->assign('querydata', $querydata);


         $this->display();
    }



    public function export_cut_plan()

    {
 

        $model= M("plan_cut");
        $limit = 200;
        $map['cut_plan_time']=array("GT",NOW_TIME);
        $orderBy="cut_plan_time";
        $checkdata=$model->alias('plan')->join('__DEVICE_LINE__ dl ON plan.cut_line_id=dl.did', 'LEFT')->where($map)->order($orderBy)->limit($limit)->select();
        $data = array();
       foreach ($checkdata as $cd){
          $temp_data=array();
        
          array_push($temp_data,$cd['voltage_degree']);
          array_push($temp_data,$cd['device_name']);
          array_push($temp_data,$cd['cut_start_tower']);
          array_push($temp_data,$cd['cut_end_tower']);
          array_push($temp_data,date("Y-m-d",$cd['cut_plan_time']));
         array_push($temp_data,$cd['agg_name']);
         
          array_push($data,$temp_data);
       }
       

        
        $header="电压等级,线路名称,起始杆塔,结束杆塔,计划清斩时间,请赔协议名称";
        create_csv($data,$header,"清斩计划.csv");
       
    }

    public function make_check_plan()
    {
        
        // //巡检记录
        // $tmodel= M("tree_base");
        // $tmap['tree_status']="未处理";
        // $TreeData=$tmodel->where($tmap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->select();
        
        // foreach ($TreeData as $t){

        //     $last_chek_time=$t['detail_last_time'];

        //     if ($last_chek_time !=0){

        //         $danger_degree=$t['datail_danger_degree'];
                
        //         if ($danger_degree=="重大")
        //         {
        //             $plan_data['check_plan_time']=strtotime("+7days",$last_chek_time);
        //         }
        //         if ($danger_degree=="一般")
        //         {
        //             $plan_data['check_plan_time']=strtotime("+1months",$last_chek_time);
        //         }
        //         if ($danger_degree=="其他")
        //         {
        //             $plan_data['check_plan_time']=strtotime("+3months",$last_chek_time);
        //         }
        //         $plan_data['check_create_time']=NOW_TIME;
        //         $plan_data['danger_degree']=$t['datail_danger_degree'];
        //         $plan_data['danger_degree_serial']=$t['datail_danger_degree_num'];
        //         $plan_data['check_tid']=$t['tid'];
        //         $plan_data['check_line_id']=$t['did'];
        //         $plan_data['check_start_tower']=$t['star_tower'];
        //         $plan_data['check_end_tower']=$t['end_tower'];
        //         $plan_data['check_source']="人工巡检";
        //         $plan_data['check_group']=$t['accountability_group'];
        //         $plan_data['last_check_time']=$last_chek_time;
        //         M("plan_check")->data($plan_data)->add();

        //     }

        // }


       //飞行计划
       $plan_data=null;
       $flymodel= M("fly");
       $FlyData=$flymodel->alias('fly')->join('__DEVICE_LINE__ dl ON fly.fly_line_name=dl.device_name', 'LEFT')->select();
       foreach ($FlyData as $f){


  

             $last_chek_time=$f['fly_time'];

            if ($last_chek_time !=0){

                $danger_degree=$f['fly_danger_degree'];
                
                if ($danger_degree=="重大")
                {
                    $plan_data['check_plan_time']=strtotime("+7days",$last_chek_time);
                }
                if ($danger_degree=="一般")
                {
                    $plan_data['check_plan_time']=strtotime("+1months",$last_chek_time);
                }
                if ($danger_degree=="其他")
                {
                    $plan_data['check_plan_time']=strtotime("+3months",$last_chek_time);
                }
                $plan_data['check_create_time']=NOW_TIME;
                $plan_data['danger_degree']=$f['fly_danger_degree'];
                $plan_data['danger_degree_serial']=$f['fly_danger_serial'];
                $plan_data['check_line_id']=$f['did'];
                $plan_data['check_start_tower']=$f['star_tower'];
                $plan_data['check_end_tower']=$f['end_tower'];
                $plan_data['check_source']="飞行报告";
                $plan_data['last_check_time']=$last_chek_time;




       	    $plan_map['check_source']="飞行报告";
       	    $plan_map['check_start_tower']=$plan_data['check_start_tower'];
       	    $plan_map['check_end_tower']=$plan_data['check_end_tower'];
       	    $plan_map['check_line_id']=$plan_data['check_line_id'];

       	    $c=M("plan_check");
       	  
       	    $exist_plan=$c->where($plan_map)->select();
       	 


       	    if (empty($exist_plan) or count($exist_plan)<1)
       	    {
                  M("plan_check")->data($plan_data)->add();

                   
       	    }
       	    else
       	    {

       	    	 $old_check_time=$exist_plan[0]['check_plan_time'];

       	    
       	    	 if ($old_check_time > $plan_data['check_plan_time'])
       	    	 {
       	    	 	//更新原有记录

       	    	 	M("plan_check")->where($plan_map)->save($plan_data);
       	    	 }

       	    }

               

            }

       }
        $this->success('生成成功','',5);

       

    }
    public function make_cut_plan()
    {
        
        $tmodel= M("tree_base");
        $tmap['tree_status']="翻生";
        $TreeData=$tmodel->where($tmap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->limit(1000)->select();
        foreach ($TreeData as $t){

        $start_tower=$t['star_tower'];

        if (!empty($start_tower))
        {
             
        $start_tower_int=intval($start_tower);
      
        $end_tower_int=$start_tower_int+1;
        $map['ag_line_name']=$t['device_name'];
        $map['ag_start_tower']=array('ELT',$start_tower_int);
        $map['ag_end_tower']=array('EGT',$end_tower_int);
        $model= M("agreement");
        $agg_data =$model->where($map)->select();
      
        if (sizeof($agg_data)>0){
            
            $last_chek_time=$t['detail_last_time'];
            if ($last_chek_time !=0 and !empty($last_chek_time)){
                 $plan_data['cut_plan_time']=strtotime("+12months",$last_chek_time);
            }else{
                 $plan_data['cut_plan_time']=strtotime("+12months",$NOW_TIME);

            }
                $plan_data['agg_name']=$agg_data[0]['ag_file_path'];
                $plan_data['check_create_time']=NOW_TIME;
              
                $plan_data['cut_tid']=$t['tid'];
                $plan_data['cut_line_id']=$t['did'];
                $plan_data['cut_start_tower']=$t['star_tower'];
                $plan_data['cut_end_tower']=$t['end_tower'];
                $plan_data['cut_source']="翻生树障";
                $plan_data['last_check_time']=$last_chek_time;
                M("plan_cut")->data($plan_data)->add();
            
        }


        


        }
        
    }
  }

   
   


}