<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreePlanController extends AdminBaseController {
    /**
     * 首页
     */
  
    
   
    public function index() 
    {
        $data = array(
            '1,2,3,4,5',
            '6,7,8,9,0',
            '1,3,5,6,7'
            );
        $header='用户名,密码,头像,性别,手机号';


       create_csv($data,$header,"test.csv");
    }

 

   
   

    
}