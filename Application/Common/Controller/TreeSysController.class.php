hg<?php
namespace Common\Controller;
use Common\Controller\BaseController;
/**
 * admin 基类控制器
 */
class TreeSysController extends BaseController{
	/**
	 * 初始化方法
	 */
	public function _initialize(){
		parent::_initialize();
		//$auth=new \Think\Auth();
		$nav_data=D('AdminNav')->getTreeData('level','order_number,id');
		$assign=array(
			'nav_data'=>$nav_data
			);
		$this->assign($assign);
	}




}

