<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() {
    	
    
    	$orderBy = I('get.orderBy');
    	$line_id = I('get.line_id');
    	$county = I('get.county');
    	$town = I('get.town');
    	$voltage_degree = I('get.voltage_degree');
    	$datail_danger_degree=I('get.datail_danger_degree');
    	$tree_status=I('get.tree_status');
    	
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

    		$map['datail_danger_degree'] = $datail_danger_degree;
    	}
    	if (!empty($tree_status)) 
    	{
    		$map['tree_status'] = $tree_status;
    	}else{
            $map['tree_status'] = array("NEQ","已处理");
        }
    	if (empty($orderBy)) {
    		
    		$orderBy = 'datail_danger_degree_num desc';
    	}
    	if (!empty($accountability_group)) {
    		$map['accountability_group'] = $accountability_group;
    		
    	}

    	

    	
    	
    	$model = new TreeBaseModel();
    	$map['datail_uptodate'] = 1;
    	$count = $model->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')
    	->count();
    	$page = new_page($count, $limit);
    	$list = $model->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
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


     public function processed() {
    	
        //$device_lines = session('device_li
    	$orderBy = I('get.orderBy');
    	$line_id = I('get.line_id');
    	$county = I('get.county');
    	$town = I('get.town');
    	$voltage_degree = I('get.voltage_degree');
    	$datail_danger_degree=I('get.datail_danger_degree');
    	$tree_status=I('get.tree_status');
    	
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

    		$map['datail_danger_degree'] = $datail_danger_degree;
    	}
    	if (!empty($tree_status)) 
    	{
    		$map['tree_status'] = $tree_status;
    	}
    	if (empty($orderBy)) {
    		
    		$orderBy = 'datail_danger_degree_num desc';
    	}
    	if (!empty($accountability_group)) {
    		$map['accountability_group'] = $accountability_group;
    		
    	}

    	$map['tree_status'] = "已处理";

    	
    	
    	$model = new TreeBaseModel();
    	$map['datail_uptodate'] = 1;
    	$count = $model->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')
    	->count();
    	$page = new_page($count, $limit);
    	$list = $model->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
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





    
    public function base() 
    {

    	$tree_id = I('get.tid');
    	$group_id = I('get.group_id');
        //确定班组线路
    	
    	
    	
    	$model = new TreeBaseModel();
    	
    	$map['datail_uptodate'] = 1;
    	$map['tid']= $tree_id;

      

   

         $data=$model->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->select();



    	




    	
    	

    	if(!empty($data[0]['start_tower_addtion']))
    	{
    		
    		$data[0]['star_tower']=$data[0]['star_tower']."+".$data[0]['start_tower_addtion'];
    	}
    	if(!empty($data[0]['end_tower_addtion']))
    	{
    		$data[0]['end_tower']=$data[0]['end_tower']."+".$data[0]['end_tower_addtion'];
    	}

    	
    	
    	$orderBy='serial';
    	
    	
    	
    	$this->assign('group_id', $group_id);
    	$this->assign('tid', $tree_id);
    	
    	
    	$this->assign('data', $data);
     

    	
         $this->display();
    }

    public function delete() 
    {
    	$tid = I('get.tid');
    	$map['tid'] = $tid;
    	M("tree_base")->where(array($map))->delete();
    	$map=null;

    	$map['detail_tid'] = $tid;
    	$result = M("TreeDetail")->where(array($map))->delete();

    	$map=null;
    	$map['record_tid'] = $tid;
    	$result = M("treesys_tree_process_record")->where(array($map))->delete();

    	$map=null;
    	$map['oreder_tid'] = $tid;
    	$result = M("treesys_order")->where(array($map))->delete();

    	





    	if($result){
    		$this->success("成功删除树片",U("Admin/Tree/index/group_id/{$group_id}"));
    	}
    	else{   
    		$this->error('删除树片失败');}
    	}
   
    	public function edit() {
    		if(IS_GET){
    			
    			
    			$tid = I('get.tid'); 
    			$map=null;
    			$map['tid']=$tid;
                $map['datail_uptodate'] = 1;
               
                $model = new TreeBaseModel();

                $data=$model->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->find();

                if(!empty($data[0]['start_tower_addtion']))
                {
                    
                    $data[0]['star_tower']=$data[0]['star_tower']."+".$data[0]['start_tower_addtion'];
                }
                if(!empty($data[0]['end_tower_addtion']))
                {
                    $data[0]['end_tower']=$data[0]['end_tower']."+".$data[0]['end_tower_addtion'];
                }
                
                
                $this->assign('tid', $tid);
                
                $this->assign('editTidData', $data);
                $this->display(); 
                
            }

            if(IS_POST)
            {
             $tid = I('post.tid');

             $ar=$_POST;
             $map=array(
                'tid'=>$ar['tid']
            );
             
             unset($ar['group_id']); 
             unset($ar['tid']); 
             
             $ar['last_update_time']=NOW_TIME;
             $ar['last_update_person']=$_SESSION['user']['true_name'];


             $result = D("TreeBase")->editData($map,$ar);

         
           //留下历史记录
           $map=null;
           $map['detail_tid']=$tid;
           $map['datail_uptodate']=1;
           $data['datail_uptodate']=0;

          
           M("tree_detail")->where($map)->data($data)->save();

            $detail_data['detail_tid']=$tid;  

            $detail_data['datail_check_time']=NOW_TIME;
            $detail_data['datail_check_person']=$_SESSION['user']['true_name'];


            $detail_data['datail_update_time']=NOW_TIME;
            $detail_data['datail_update_person']=$_SESSION['user']['true_name'];
            $detail_data['datail_tree_num']=$ar['tree_num'];
            $detail_data['datail_tree_height']=$ar['tree_height'];
            $detail_data['datail_tree_area']=$ar['tree_area'];
            $detail_data['datail_danger_degree']=$ar['danger_degree'];
            $detail_data['detail_source']="数据修改";


            $dd=$ar['danger_degree'];
    if($dd=='重大')
    {
      $detail_data['datail_danger_degree_num']=6;
    }
    if($dd=='一般')
    {
      $detail_data['datail_danger_degree_num']=5;
    }
    if($dd=='其他')
    {
      $detail_data['datail_danger_degree_num']=4;
    }
    if($detail_data=='不构成其他')
    {
      $ar['datail_danger_degree_num']=3;
    }
    if($detail_data=='处理后无树竹')
    {
      $ar['datail_danger_degree_num']=2;
    }
    if($detail_data=='一直无树竹')
    {
      $detail_data['datail_danger_degree_num']=1;
    }

    M("tree_detail")->data($detail_data)->add();  
         
              







             if($result){
                $this->success("成功修改树障",U("Admin/Tree/base/tid/{$tid}"));
            }
            else{   
                $this->error('修改树障失败');
            }
             
             }
             
            
                
            
        } 


        
    }