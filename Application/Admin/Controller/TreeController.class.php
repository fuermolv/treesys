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



        // $map = null;
        //选出县镇乡
        // if (!empty($county)) {
        //     $map['fid'] = $county;
        //     $map['sid'] = 0;
        //     $querydata['towns'] = M("areas")->where($map)->select();
        // }
        // $map = null;
        // if (!empty($town)) {
        //     $map['sid'] = $town;
        //     $querydata['villages'] = M("areas")->where($map)->select();
        // }
    	$map = null;
    	if (!empty($line_id)) 
    	{
    		$map['device_name'] = $line_id;
    		
    	} else {
    		$lines = array(-1);
    		
    	}

        // if (!empty($town)) {
        //     $tamp_map['id']=$town;
        //     $temp=M("areas")->where($tamp_map)->field('name')->select();
        //     $map['town'] = $temp[0]['name'] ;
    	
        // }
        // if (!empty($county)) {
        //     $tamp_map['id']=$county;
        //     $temp=M("areas")->where($tamp_map)->field('name')->select();
        //     $map['county'] =$temp[0]['name']  ;
    	
        // }
        // if (!empty($village)) {
        //     $tamp_map['id']=$village;
        //     $temp=M("areas")->where($tamp_map)->field('name')->select();
        //     $map['village'] = $temp[0]['name'] ;
        // }


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
    	$data=$model->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')
    	->join('treesys_order od ON base.tid=od.order_tid ', 'LEFT')->select();

    	
    	

    	if(!empty($data[0]['start_tower_addtion']))
    	{
    		
    		$data[0]['star_tower']=$data[0]['star_tower']."+".$data[0]['start_tower_addtion'];
    	}
    	if(!empty($data[0]['end_tower_addtion']))
    	{
    		$data[0]['end_tower']=$data[0]['end_tower']."+".$data[0]['end_tower_addtion'];
    	}

    	
    	
    	$orderBy='serial';
    	$conf_data = M("order_configure")->order($orderBy)->select();
    	$this->assign('conf_data', $conf_data);
    	
    	
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
    // public function add() {
    //     if(IS_POST)
    //     {
    //         $user_id=$_SESSION['user']['id'];
    //         $map['id']=$user_id;
    //         $user=M("users")->where($map)->select();
    //         $ar=$_POST;



    //         $device_name=$ar['line_id'];
    	
    //         $line_map['device_name']=$device_name;
    	
    //         $line_data=M("device_line")->where($line_map)->select();


    	
    	

    //          if(empty($line_data[0]))
    //         {
    //           $new_line_data['device_name']=$device_name;


    //           $new_line_data['voltage_degree']=$ar['voltage_degree'];
    //           $new_line_id=M("device_line")->data($new_line_data)->where($new_line_data)->add();
    //           $base_data['line_id']=$new_line_id;
    //         } 
    //         else
    //         {
    //           $base_data['line_id']=$line_data[0]['did'];
    //         }


    //         if (!empty($ar['county'])) 
    //         {
    //         $tamp_map=null;
    //         $tamp_map['id']=$ar['county'];
    //         $temp=M("areas")->where($tamp_map)->field('name')->select();
    //         $ar['county'] = $temp[0]['name'] ;
    	
    //         }
    //     if (!empty($ar['town'])) {
    //         $tamp_map=null;
    //         $tamp_map['id']=$ar['town'];
    //         $temp=M("areas")->where($tamp_map)->field('name')->select();
    //         $ar['town']=$temp[0]['name']  ;
    	
    //     }
    //     if (!empty($ar['village'])) {
    //         $tamp_map=null;
    //         $tamp_map['id']=$ar['village'];
    //         $temp=M("areas")->where($tamp_map)->field('name')->select();
    //         $ar['village'] = $temp[0]['name'] ;
    //     }
    	



    //         $base_data['accountability_department']=$ar['accountability_department'];
    //         $base_data['accountability_number']=$ar['accountability_number'];
    //         $base_data['accountability_group']=$ar['accountability_group'];
    //         $base_data['accountability_person']=$ar['accountability_person'];
    //         $base_data['county']=$ar['county'];
    //         $base_data['town']=$ar['town'];
    //         $base_data['village']=$ar['village'];
    //         //$base_data['line_id']=$line_id;
    //         $base_data['star_tower']=$ar['star_tower'];
    //         $base_data['end_tower']=$ar['end_tower'];
    //         $base_data['danger_num']=$ar['danger_num'];
    //         $base_data['first_check_person']=$ar['first_check_person'];
    //         $base_data['first_check_time']=strtotime($ar['first_check_time']);
    //         $base_data['first_upload_time']=strtotime($ar['first_upload_time']);            
    //         $base_data['tree_status']=$ar['tree_status'];
    //         $base_data['tree_type']=$ar['tree_type'];
    //         $base_data['tree_danger']=$ar['tree_danger'];
    //         $base_data['tree_danger_num']=$ar['tree_danger_num'];
    //         $base_data['tree_danger_num_unit']=$ar['tree_danger_num_unit'];
    //         $base_data['tree_danger_area']=$ar['tree_danger_area'];
    //         $base_data['tree_danger_area_unit']=$ar['tree_danger_area_unit'];
    //         $base_data['tree_danger_height']=$ar['tree_danger_height'];
    //         $base_data['average_radius']=$ar['average_radius'];
    //         $base_data['average_height']=$ar['average_height']; 
    //         $base_data['dead_line_time']=strtotime($ar['dead_line_time']);
    //         $base_data['processed']=$ar['processed'];
    //         $base_data['tree_property']=$ar['tree_property'];
    //         $base_data['new_plant']=$ar['new_plant'];
    //         $base_data['defect_type']=$ar['defect_type'];
    //         $base_data['survival']=$ar['survival']; 

    //         $TreeBase=D("TreeBase");
    //         $result = $TreeBase->add($base_data);
    	
    	
    	
    //        if($result){
    	
    //         $this->success("成功添加树片",U("Admin/Tree/index/group_id/{$group_id}"));
    //         }
    //         else{   
    //             $this->error('新增树片失败');
    //         }                       
    //          $this->ajaxReturn($result);

    //     }
    	
    //     else
    //     {
    //         $line_id = I('get.line_id');
    //         $county = I('get.county');
    //         $town = I('get.town');
    //         $voltage_degree = I('get.voltage_degree');
    //         $village = I('get.village');
    //         $group_id = I('get.group_id');
    //         //确定班组线路
    //         $map['id'] = $group_id;
    //         $lienes = M("auth_rule")->where($map)->select();
    	
    //         $map = null;
    	
    //         $map['did'] = array('in', $lienes[0]['group_device']);
    //         if($lienes[0]['group_device'][0]=-1)
    //         {
    //          $map=null;
    //         }
    //         $device_lines = M("device_line")->where($map)->select();
    //         $querydata['device_lines'] = $device_lines;
    //         $map = null;
    //         //选出县镇乡
    //         if (!empty($county)) {
    //             $map['fid'] = $county;
    //             $map['sid'] = 0;
    //             $querydata['towns'] = M("areas")->where($map)->select();
    //         }
    //         $map = null;
    //         if (!empty($town)) {
    //             $map['sid'] = $town;
    //             $querydata['villages'] = M("areas")->where($map)->select();
    //         }
    //         $map = null;
    //         $gmap['group_status'] = 1;
    //         $groups = M("group")->where($gmap)->select();
    //         $querydata['device_groups'] = $groups;

    //         $this->assign('group_id', $group_id);
    //         $this->assign('querydata', $querydata);
    //         $this->display();
    //     }

    // }
    	public function edit() {
    		if(IS_GET){
    			
    			
    			$tid = I('get.tid'); 
    			$map=null;
    			$map['tid']=$tid;
    			$edit_tid_data=D("TreeBase")->where($map)->select() ;
    			$this->assign('tid', $tid);
    	
    			$this->assign('editTidData', $editTidData);
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
    			if($result){
    				$this->success("成功修改树片",U("Admin/Tree/base/tid/{$tid}"));
    			}
    			else{   
    				$this->error('修改树片失败');}
    				
    			}
    		} 


    		
    	}