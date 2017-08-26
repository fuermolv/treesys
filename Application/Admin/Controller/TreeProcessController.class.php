<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeProcessController extends AdminBaseController 
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
        $tree_id = I('get.tid');
        $model = new TreeDetailModel();
        $map['record_tid'] = $tree_id;
        $orderBy = 'record_id desc';
        $data=M("tree_process_record")->where($map)->order($orderBy)->select();

       $this->assign('data', $data);
       $this->assign('tree_id',$tree_id);

       $content=$this->fetch();
       $this->ajaxReturn($content);
   }
   public function delete() 
   {
        
   }
   public function add()
   {

 
        $content=$this->fetch();
        $this->ajaxReturn($content);
     
      
   }
   public function file()
   {

 
        $content=$this->fetch();
        $this->ajaxReturn($content);
     
      
   }
   public function uploadfile()
   {

 
        $content=$this->fetch();
        $this->ajaxReturn($content);
     
      
   }

    
}