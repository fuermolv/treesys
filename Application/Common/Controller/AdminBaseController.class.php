<?php
namespace Common\Controller;
use Common\Controller\BaseController;
/**
 * admin 基类控制器
 */
class AdminBaseController extends BaseController{
	/**
	 * 初始化方法
	 */
	public function _initialize(){
		parent::_initialize();
		$auth=new \Think\Auth();

	    $passController=array("TreeStatistics");
	    $passMethod=array("ajax_upload");

        $rule_name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
        /*if(CONTROLLER_NAME=='Nav'||CONTROLLER_NAME=='Rule'||CONTROLLER_NAME=='Index'||CONTROLLER_NAME=='ShowNav')
        {
            $rule_name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
        }
        else
        {
		
		 
		   $rule_name=substr(($_SERVER["REQUEST_URI"]),19);
	    }*/
	    if(!(in_array(CONTROLLER_NAME, $passController) or in_array(ACTION_NAME, $passMethod)))
	    {
		


		
		$result=$auth->check($rule_name,$_SESSION['user']['id']);
		if(!$result){

			  header('HTTP/1.1 404 Not Found');
              //$this->display( ' Public:404 ' );
			 $this->error('您没有权限访问');
		}
	    }
		
		
		$nav_data=D('AdminNav')->getTreeData('level','order_number,id');

		
		$assign=array(
			'nav_data'=>$nav_data
			);
		$this->assign($assign);
	}




}

