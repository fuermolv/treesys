<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
use  Common\Model\TreeBaseModel;
/**
 * 后台首页控制器
 */
class LineController extends AdminBaseController{
	/**
	 * 首页
	 */
	public function index($id='thinkphp'){
         
           $map=array(
            'line_id'=>$id
            );
                
		 $data=D('TreeBase')->getPage(new TreeBaseModel(),$map);

		

		 var_dump($data);
		 $this->assign('data',$data['data']);
		 $this->assign('pagehtml',$data['page']);
		 $this->display();
	}
	
	
	


}
