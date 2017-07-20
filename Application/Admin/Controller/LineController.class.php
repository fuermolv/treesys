<?php
namespace Admin\Controller;
use Common\Controller\PublicBaseController;
/**
 * 后台首页控制器
 */
class LineController extends PublicBaseController{
	/**
	 * 首页
	 */
	public function index($id='thinkphp')
	{
		 $this->assign('name',$name);
		$this->display();
	}
	
	
	


}
