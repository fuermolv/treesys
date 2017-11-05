<?php
namespace Admin\Controller;

use Common\Controller\AdminBaseController;

class TowerController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() 
    {
        
        $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;

        $line_name = I('get.line_name');
        if(!empty($line_name))
        {

             $map['tower_line_name']=$line_name;
             $orderBy='tower_serial';
             $count = M("device_tower")->where($map)->count();
             $limit = 20;
             $page = new_page($count, $limit);
             $list =M("device_tower")->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();


        	 $data = array('data' => $list, 'page' => $page->show());

        	 $this->assign('data', $data['data']);
        	 $this->assign('pagehtml', $data['page']);
        }

        $this->assign('querydata', $querydata);

        $this->display();
    }
    
   
}