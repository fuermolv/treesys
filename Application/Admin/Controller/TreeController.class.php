<?php
namespace Admin\Controller;
use Common\Controller\PublicBaseController;
/**
 * 后台首页控制器
 */
class TreeController extends PublicBaseController{
	/**
	 * 首页
	 */
	public function index(){
		$this->display();
	}
	
	
	/**
	 * welcome
	 */
	public function group($name='thinkphp')
	{
	    
	     $this->assign('name',$name);
        $this->display();
	}

	public function line($id='thinkphp')
	{
	    
	     $this->assign('name',$name);
        $this->display();
	}



}
