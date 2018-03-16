<?php
namespace Admin\Controller;
use Common\Controller\PublicBaseController;

/**
 * 后台首页控制器
 */
class TreeCommonController extends PublicBaseController 
{
    /**
     * 首页
     */
    public function _initialize()
    {
      parent::_initialize();
    }
    public function index() 
    {
        
    }
    public function search_line()
    {
         $qword = I('get.qword');
         $qword='%'.$qword.'%';
        $map['device_name']= array('like',$qword);
         $group_id = I('get.group_id');
         if(!empty($group_id))
         {
             $g_map['id'] = $group_id;
             $lienes = M("auth_rule")->where($g_map)->select();
             $map['did'] = array('in', $lienes[0]['group_device']);
         }

      
         $model=M("_device_line");
         $data=$model->where($map)->select();
        
        
         $this->ajaxReturn($data);
    }
    public function freshForm(){
        $edit_line_id = I('get.edit_line_id');
        $edit_county = I('get.edit_county');
        $edit_town = I('get.edit_town');
        $edit_voltage_degree = I('get.edit_voltage_degree');
        $edit_village = I('get.edit_village');
        $edit_tid = I('get.edit_tid'); 
        // $group_id = I('get.group_id');
        //         //确定班组线路       
        // $map=null;
        // $map['id'] = $group_id;
        // $edit_lienes = M("auth_rule")->where($map)->select();
                
        $map = null;
        // $map['did'] = array('in', $edit_lienes[0]['group_device']);
        $edit_device_lines = M("device_line")->where($map)->select();
        $querydata['device_lines'] = $edit_device_lines;
                
        $map = null;
        //选出县镇乡
        if (!empty($edit_county)) {
            $map['fid'] = $edit_county;
             $map['sid'] = 0;
            $querydata['towns'] = M("areas")->where($map)->select();
        }
        $map = null;
        if (!empty($edit_town)) {
            $map['sid'] = $edit_town;
            $querydata['villages'] = M("areas")->where($map)->select();
        }
        // var_dump($querydata); 
        $this->assign('group_id', $group_id);
        // $this->assign('edit_line_id', $edit_line_id);
        // $this->assign('edit_county', $edit_county);
        // $this->assign('edit_town', $edit_town);
        // $this->assign('edit_village', $edit_village);
        // $this->assign('edit_voltage_degree', $edit_voltage_degree);
        $this->assign('edit_tid', $edit_tid);
        $this->assign('querydata', $querydata);
        
        $content=$this->fetch();
        $this->ajaxReturn($content);
    } 

    
}