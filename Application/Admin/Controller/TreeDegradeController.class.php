<?php
namespace Admin\Controller;

use Common\Controller\AdminBaseController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;


class TreeDegradeController extends AdminBaseController{

	public function add(){
		if(IS_GET){
			 $this->error('树障降级失败');

		}else{

			 $tid = I('post.tid');
			 $ar=$_POST;


       if (count($ar)!=9){
          $this->error('树障降级/处理失败,表单所有项为必填');
          return ;
       }



			 $ar['detail_last_time']=strtotime($ar['detail_last_time']);
			 $ar['datail_update_time']=NOW_TIME;
       $ar['datail_update_person']=$_SESSION['user']['true_name'];
       $ar['detail_tid']=$tid;


           $map['detail_tid']=$tid;
           $map['datail_uptodate']=1;
           $data['datail_uptodate']=0;
           // $lastest_data= M("tree_detail")->where($map)->find();
           M("tree_detail")->where($map)->data($data)->save();
     

      
    $dd=$ar['datail_danger_degree'];
    if($dd=='重大')
    {
      $ar['datail_danger_degree_num']=6;
    }
    if($dd=='一般')
    {
      $ar['datail_danger_degree_num']=5;
    }
    if($dd=='其他')
    {
      $ar['datail_danger_degree_num']=4;
    }
    if($dd=='不构成其他')
    {
      $ar['datail_danger_degree_num']=3;
    }
    if($dd=='处理后无树竹')
    {
      $ar['datail_danger_degree_num']=2;
    }
    if($dd=='一直无树竹')
    {
      $ar['datail_danger_degree_num']=1;
    }
          
          $bmap['tid']=$tid;

          $bdata['tree_type']=$ar['datail_tree_type'];
          $bdata['tree_height']=$ar['datail_tree_height'];
          $bdata['tree_area']=$ar['datail_tree_area'];
          $bdata['tree_num']=$ar['datail_tree_num'];
          $bdata['tree_cut']=1;
           if ($ar['deg_type']=="degrade"){

           

            $bdata['tree_status']="降级";
            $ar['detail_source']="树障降级";
           }else{

             

             $bdata['tree_status']="已处理";
             $ar['detail_source']="闭环";

           }
           
           $tree_base_model= M("tree_base");
           $tree_base_model->where($bmap)->data($bdata)->save();
         

    
           $result=M("tree_detail")->data($ar)->add();
           if($result){
                $this->success("树障降级/处理成功",U("Admin/Tree/base/tid/{$tid}"));
            }
            else{   
                $this->error('树障降级/处理失败');
                
            }


            
		}

	}

  public function index() {
      
        //$device_lines = session('device_li
      $orderBy = I('get.orderBy');
      $line_id = I('get.line_id');
      $county = I('get.county');
      $town = I('get.town');
      $voltage_degree = I('get.voltage_degree');
      $datail_danger_degree=I('get.datail_danger_degree');
      $accountability_group=I('get.accountability_group');
      
      $village = I('get.village');
      $limit = 15;
      $group_id = I('get.group_id');
      $star_tower = I('get.star_tower');
      

      if(empty($accountability_group))
      {
        $device_lines = S('device_lines');
        if(empty($device_lines)or $device_lines==FALSE)
        {
          $device_lines = M("device_line")->where($map)->select();
          S('device_lines',$device_lines,3600);
        }
        
      }
      else
      {
        $device_lines = S('device_lines'.md5($accountability_group));
        if(empty($device_lines)or $device_lines==FALSE)
        {
          $map['accountability_group']=$accountability_group;
          $device_lines = M("tree_base")->field('device_name')->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->where($map)->group('device_name')->select();
          S('device_lines'.md5($accountability_group),$device_lines,3600);
        }
      }
      $querydata['device_lines'] = $device_lines;
      
      



      $gmap['group_status'] = 1;
      $groups = M("group")->where($gmap)->select();
      $querydata['device_groups'] = $groups;



       
      if (!empty($line_id)) 
      {
        $map['device_name'] = $line_id;
        
      } else {
        $lines = array(-1);
        
      }

       

      if (!empty($star_tower)and is_numeric($star_tower)) {
        $map['star_tower'] = array("EGT",$star_tower);
      }



      if (!empty($voltage_degree)) {
        $map['voltage_degree'] = $voltage_degree;
      }
      if (!empty($datail_danger_degree)) 
      {

        $map['process_danger_degree'] = $process_danger_degree;
      }
      if (empty($orderBy)) {
        
        $orderBy = 'process_time desc';
      }
      if (!empty($accountability_group)) {
        $map['accountability_group'] = $accountability_group;
        
      }

      $map['tree_status'] = "降级";

      
      
      $model = M("degrade");
      $map['datail_uptodate'] = 1;
      $map['degrade_up_to_date'] = 1;

      $count = $model->where($map)->alias('deg')->join('treesys_tree_base base ON deg.degrade_tid=base.tid ', 'LEFT')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->count();

      $page = new_page($count, $limit);
      $list = $model->where($map)->alias('deg')->join('treesys_tree_base base ON deg.degrade_tid=base.tid ', 'LEFT')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();

 
      $data = array('data' => $list, 'page' => $page->show());


      
      foreach ($data['data'] as &$d)
      {
        

        if(!empty($d['start_tower_addtion']))
        {   
          $d['star_tower']=$d['star_tower']."+".$d['start_tower_addtion'];
        }
        if(!empty($d['end_tower_addtion']))
        {
          $d['end_tower']=$d['end_tower']."+".$d['end_tower_addtion'];
        }
      }
      
      

      $this->assign('group_id', $group_id);
      $this->assign('querydata', $querydata);
      $this->assign('data', $data['data']);
      $this->assign('pagehtml', $data['page']);
      $this->display();
    }

    public function history() {

        $tree_id = I('get.tid');
      
        $model = M("degrade");
        $map['degrade_tid'] = $tree_id;
        $orderBy = 'process_time desc';
    
        $data=$model->where($map)->order($orderBy)->select();
    
        
       $this->assign('data', $data);
       $this->assign('group_id',$group_id);
       $this->assign('tree_id',$tree_id);
       $this->display();

   }



  


}