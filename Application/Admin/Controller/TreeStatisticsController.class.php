<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;

use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeStatisticsController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() {

       
          $sta_type = I('get.sta_type');
          $end_s_time = I('get.end_s_time');
            $start_s_time = I('get.start_s_time');
          $map['monitor']=1;
          $orderBy='id';
          $group_data =M("auth_rule")->where($map)->order($orderBy)->select();

          
           $this->assign('sta_type', $sta_type);
       
           $this->assign('end_s_time', $end_s_time);
           $this->assign('start_s_time', $start_s_time);

          $this->assign('group_data', $group_data);
         $this->display();
    }
    public function fly() {
       

         $sta_type = I('get.sta_type');
          $end_s_time = I('get.end_s_time');
            $start_s_time = I('get.start_s_time');
          $map['monitor']=1;
          $orderBy='id';
          $group_data =M("auth_rule")->where($map)->order($orderBy)->select();

        
           $this->assign('sta_type', $sta_type);
           $this->assign('end_s_time', $end_s_time);
           $this->assign('start_s_time', $start_s_time);

          $this->assign('group_data', $group_data);
        
      
        $this->display();
    }
    
   
    
}