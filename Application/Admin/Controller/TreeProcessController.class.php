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

    
}