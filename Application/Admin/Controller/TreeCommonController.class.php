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

    
}