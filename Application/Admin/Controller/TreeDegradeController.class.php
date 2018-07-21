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
			 $ar['process_time']=strtotime($ar['process_time']);
			 $ar['update_time']=NOW_TIME;
             $ar['update_person']=$_SESSION['user']['true_name'];
             $ar['degrade_tid']=$tid;


           $map['degrade_tid']=$tid;
           $data['degrade_up_to_date']=0;
           M("degrade")->where($map)->data($data)->save();

           $bmap['tid']=$tid;
           $bdata['tree_status']="降级";
           M("tree_base")->where($bmap)->data($bdata)->save();




           $result=M("degrade")->data($ar)->add();
           if($result){
                $this->success("树障降级功",U("Admin/Tree/base/tid/{$tid}"));
            }
            else{   
                $this->error('树障降级失败');
                
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