<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
use Think\Model;
/**
 * 后台首页控制器
 */
class IndexController extends AdminBaseController{
	/**
	 * 首页
	 */
	public function index()
	{



      $device_lines = session('device_lines');
      if(empty($device_lines))
      {
      $uid=($_SESSION['user']['id']);

      $map['uid']=$uid;
      
     
      $groups=M("auth_group_access")
              ->where($map)
              ->alias('u')
              ->join('treesys_auth_group r ON u.group_id=r.id','LEFT')
              ->select();
         $rules=array();
        
         foreach($groups as $group)
         { 
         	$array=explode(",",$group['rules']); 
         	$rules=array_merge($rules,$array);      
         } 
        
        $rules=array_unique($rules);
       
        $qmap['id']= array('in',$rules);
        $qmap['group_device']= array('neq','-1');
        $devices=M("auth_rule")
              ->where($qmap)
              ->select();
           
        $lines=array();
           foreach($devices as $device)
         { 
         	$array=explode(",",$device['group_device']); 
         	$lines=array_merge($lines,$array);      
         } 
         $lines=array_unique($lines);
        
         session('device_lines',$lines);
        }
        


        
  
		$this->display();

	}
	/**
	 * elements
	 */
	public function elements(){

		$this->display();
	}
	
	/**
	 * welcome
	 */
	public function welcome($name='thinkphp',$grade='100'){
	    $this->assign('name',$name);
	    $this->assign('grade',$grade);
        $this->display();
	}



}
