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
        $dead_line_time_begin = I('get.dead_line_time_begin');
        $dead_line_time_end = I('get.dead_line_time_end');
        $line_id = I('get.line_id');
        $county = I('get.county');
        $town = I('get.town');
        $voltage_degree = I('get.voltage_degree');
        $datail_danger_degree=I('get.datail_danger_degree');
        $tree_status=I('get.tree_status');
        $star_tower=I('get.star_tower');
        $end_tower=I('get.end_tower');
        $village = I('get.village');
        $limit = 15;
        $group_id = I('get.group_id');
        //确定班组线路
        $map['id'] = $group_id;
        $lienes = M("auth_rule")->where($map)->select();
        $map = null;
        $map['did'] = array('in', $lienes[0]['group_device']);
        if($lienes[0]['group_device'][0]=-1)
        {
        	$map=null;
        }
        $device_lines = M("device_line")->where($map)->select();
        $querydata['device_lines'] = $device_lines;
        $map = null;
        //选出县镇乡
        if (!empty($county)) {
            $map['fid'] = $county;
            $map['sid'] = 0;
            $querydata['towns'] = M("areas")->where($map)->select();
        }
        $map = null;
        if (!empty($town)) {
            $map['sid'] = $town;
            $querydata['villages'] = M("areas")->where($map)->select();
        }
        $map = null;
        if (!empty($line_id)) 
        {
            $map['device_name'] = $line_id;

        } else {
            $lines = array(-1);
            foreach ($device_lines as $d) {
                array_push($lines, $d['did']);
            }
            $map['line_id'] = array('in', $lines);
        }

        if (!empty($town)) {
            $tamp_map['id']=$town;
            $temp=M("areas")->where($tamp_map)->field('name')->select();
            $map['town'] = $temp[0]['name'] ;
            
        }
        if (!empty($county)) {
            $tamp_map['id']=$county;
            $temp=M("areas")->where($tamp_map)->field('name')->select();
            $map['county'] =$temp[0]['name']  ;
            
        }
        if (!empty($village)) {
            $tamp_map['id']=$village;
            $temp=M("areas")->where($tamp_map)->field('name')->select();
            $map['village'] = $temp[0]['name'] ;
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
        if (!empty($star_tower)) 
        {
            $map['star_tower'] = array('EGT',$star_tower);
        }
        if (!empty($end_tower)) 
        {
            $map['end_tower'] = array('ELT',$end_tower);
        }
        if (empty($orderBy)) {
            $orderBy = 'tid desc';
        }

        
        // $data=D('TreeBase')->getPage(new TreeBaseModel(),$map,$order,$limit);
        $model = new TreeBaseModel();
        $count = $model->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')
        ->count();
        $map['datail_uptodate'] = 1;
        $page = new_page($count, $limit);
        $list = $model
        /*->field('detail.tid as tree_id,base.*,dl.*')*/->where($map)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->join('treesys_tree_detail detail ON base.tid=detail.detail_tid ', 'LEFT')->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
        $data = array('data' => $list, 'page' => $page->show());
       
        
         //var_dump( $model->getLastSql());
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
        if($result){
            $this->success("成功删除树片",U("Admin/Tree/index/group_id/{$group_id}"));
            }
            else{   
                $this->error('删除树片失败');}
    }
    public function add() {
        $line_id = I('get.line_id');
        $county = I('get.county');
        $town = I('get.town');
        $voltage_degree = I('get.voltage_degree');
        $village = I('get.village');
        $group_id = I('get.group_id');
        //确定班组线路
        $map['id'] = $group_id;
        $lienes = M("auth_rule")->where($map)->select();
        $map = null;
        $map['did'] = array('in', $lienes[0]['group_device']);
        $device_lines = M("device_line")->where($map)->select();
        $querydata['device_lines'] = $device_lines;
        $map = null;
        //选出县镇乡
        if (!empty($county)) {
            $map['fid'] = $county;
            $map['sid'] = 0;
            $querydata['towns'] = M("areas")->where($map)->select();
        }
        $map = null;
        if (!empty($town)) {
            $map['sid'] = $town;
            $querydata['villages'] = M("areas")->where($map)->select();
        }
        $map = null;
        if(IS_POST)
        {
            $user_id=$_SESSION['user']['id'];
            $map['id']=$user_id;
            $user=M("users")->where($map)->select();
            $ar=$_POST;
            $base_data['line_id']=$line_id;
            $base_data['star_tower']=$ar['star_tower'];
            $base_data['end_tower']=$ar['end_tower'];
            $base_data['danger_num']=$ar['danger_num'];
            $base_data['first_check_person']=$ar['first_check_person'];
            
            $base_data['accountability_department']=$ar['accountability_department'];
            $base_data['accountability_group']=$ar['accountability_group'];
            $base_data['accountability_person']=$user[0]['true_name'];
            $base_data['accountability_number']=$ar['accountability_number'];
            $base_data['county']=$ar['data_county'];
            $base_data['town']=$ar['data_town'];
            $base_data['village']=$ar['data_village'];
            $base_data['owner']=$ar['owner'];
            $base_data['owner_phone']=$ar['owner_phone'];
            $base_data['accountability_person']=$ar['accountability_person'];
            $base_data['tree_age']=$ar['tree_age'];
            $base_data['tree_status']=$ar['tree_status'];
            $base_data['tree_type']=$ar['tree_type'];
            $base_data['tree_danger']=$ar['tree_danger'];
            $base_data['tree_danger_num']=$ar['tree_danger_num'];
            $base_data['tree_danger_num_unit']=$ar['tree_danger_num_unit'];
            $base_data['tree_danger_area']=$ar['tree_danger_area'];
            $base_data['tree_danger_area_unit']=$ar['tree_danger_area_unit'];
            $base_data['tree_danger_height']=$ar['tree_danger_height'];
            $base_data['average_radius']=$ar['average_radius'];
            $base_data['average_height']=$ar['average_height'];
            $base_data['dead_line_time']=strtotime($ar['dead_line_time']);
            $base_data['first_upload_time']=strtotime($ar['first_upload_time']);            
            $base_data['last_update_time']=NOW_TIME;              
            $base_data['first_check_time']=strtotime($ar['datail_check_time']);
            $base_data['processed']=$ar['processed'];
            $TreeBase=D("TreeBase");
            $result = $TreeBase->add($base_data);
            
            $detail_data['detail_tid']=$result;
            $detail_data['datail_danger_degree']=$ar['datail_danger_degreee'];
            $detail_data['datail_final_danger']=$ar['datail_final_danger'];
            $detail_data['datail_check_person']=$ar['datail_check_person'];
            $detail_data['datail_tree_type']=$ar['datail_tree_type'];
            $detail_data['datail_tree_height']=$ar['datail_tree_height'];
            $detail_data['datail_tree_num']=$ar['datail_tree_num'];
            $detail_data['datail_tree_num_unit']=$ar['datail_tree_num_unit'];
            $detail_data['datail_tree_area']=$ar['datail_tree_area'];
            $detail_data['datail_tree_area_unit']=$ar['datail_tree_area_unit'];
            $detail_data['datail_tree_horizontal']=$ar['datail_tree_horizontal'];
            $detail_data['datail_tree_vertical']=$ar['datail_tree_vertical'];
            $detail_data['datail_tree_grand_height']=$ar['datail_tree_grand_height'];
            $detail_data['datail_tree_over']=$ar['datail_tree_over'];
            $detail_data['datail_update_time']=NOW_TIME;
            $detail_data['datail_check_time']=strtotime($ar['datail_check_time']);
            $detail_data['datail_check_posistion_conclusion']=$ar['datail_check_posistion_conclusion'];
            $detail_data['datail_check_process_conclusion']=$ar['datail_check_process_conclusion'];
            $detail_data['datail_check_change_conclusion']=$ar['datail_check_change_conclusion'];
            $detail_data['datail_check_person']=$ar['datail_check_person'];
            $detail_data['datail_update_person']=$user[0]['true_name'];
            $detail_data['datail_update_group']=$ar['datail_update_group'];
            $result = D("TreeDetail")->addData($detail_data);
            if($result){
                // var_dump($base_data,$TreeBase->_sql());                
            $this->success("成功添加树片",U("Admin/Tree/index/group_id/{$group_id}"));
            }
            else{   
                $this->error('新增树片失败');}
        }
        else
        {
            $this->assign('group_id', $group_id);
            $this->assign('querydata', $querydata);
            $this->display();
        }

    }
    public function edit() {
        if(IS_GET){
            if(I('get.edit_index')==1){
                
                $edit_tid = I('get.edit_tid'); 
                $map=null;
                $map['tid']=$edit_tid;
                $edit_tid_data=D("TreeBase")->where($map)->select() ;

                // 查询线路名称
                $map=null;
                $map['did']=$edit_tid_data[0]["line_id"];
                $line_name=M("device_line")->field('voltage_degree,device_name')->where($map)->select() ;
                // var_dump($line_name);
                $editTidData=$edit_tid_data[0];
                $editTidData['voltage_degree']=$line_name[0]["voltage_degree"];
                
                $editTidData['line_name']=$line_name[0]["voltage_degree"].'kV'.$line_name[0]["device_name"];
                //查询可以选择的线路
                $group_id = I('get.group_id');
                $map=null;
                $map['id'] = $group_id;
                $edit_lienes = M("auth_rule")->where($map)->select();
                $map = null;
                $map['did'] = array('in', $edit_lienes[0]['group_device']);
                $edit_device_lines = M("device_line")->where($map)->select();
                $querydata['device_lines'] = $edit_device_lines;
                if (!empty($editTidData['county'])) {
                    $map=null;
                    $map['name']=$editTidData['county'];
                    $county_id=M("areas")->field('id')->where($map)->select();
                    $map=null;
                    $map['fid'] = $county_id[0]['id'];
                    $map['sid'] = 0;
                    $town_id= M("areas")->where($map)->select();
                    $querydata['towns']=$town_id;
                }
                $map = null;
                if (!empty($editTidData['town'])) {
                    $map['name']=$editTidData['town'];
                    $town_id=M("areas")->field('id')->where($map)->select();
                    $map=null;
                    $map['sid'] = $town_id[0]['id'];
                    $querydata['villages'] = M("areas")->where($map)->select();
                }

                $this->assign('querydata', $querydata); 
                $this->assign('edit_tid', $edit_tid);
                $this->assign('group_id', $group_id);
                $this->assign('editTidData', $editTidData);
                $content=$this->fetch();
                $this->ajaxReturn($content); 
            }                
            }

        if(IS_POST)
        {
            $group_id = I('post.group_id');
            $user_id=$_SESSION['user']['id'];
            $map['id']=$user_id;
            $user=M("users")->where($map)->select();
            $ar=$_POST;
            $map=array(
                'tid'=>$ar['tid']
                );
            // $base_data['line_id']=$line_id;  
            unset($ar['group_id']); 
            unset($ar['tid']); 
           // var_dump($map);    
            $ar['accountability_person']=$user[0]['true_name'];
            $ar['last_update_time']=NOW_TIME;  
            $result = D("TreeBase")->editData($map,$ar);
            if($result){
                $this->success("成功修改树片",U("Admin/Tree/index/group_id/{$group_id}"));
                }
                else{   
                    $this->error('修改树片失败');}
 
        // else{
            // $this->assign('group_id', $group_id);
            // $this->assign('querydata', $querydata); 
            // $content=$this->fetch();
            
        }
    } 
    
}