<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class LineController extends AdminBaseController{
	/**
	 * 首页
	 */
	public function index($id='thinkphp')
	{
		 $this->assign('name',$name);
		$this->display();
	}
	
	
	


}
