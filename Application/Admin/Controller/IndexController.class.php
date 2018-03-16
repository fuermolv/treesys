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


/*
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
        */
          $uid=$_SESSION['user']['id'];
          $map['uid']=$uid;

          $users_auth_group=M("auth_group_access")->alias('o')->join('treesys_auth_group ag ON o.group_id=ag.id', 'LEFT')->where($map)->select();

          $umap['id']=$uid;
          $user_group=M("users")->join('treesys_group  ON treesys_users.group=treesys_group.group_id', 'LEFT')->join('treesys_local_department  ON treesys_users.department_id=treesys_local_department.department_id', 'LEFT')->where($umap)->select();
          $user_group= $user_group[0];

             $map=null;
          $limit = 10;
         
          $group_id_list=null;
          for($i=0;$i<count($users_auth_group);$i++)
          {
            $group_id_list[$i]=$users_auth_group[$i]['id'];
          }


          if(count($group_id_list)>0)
          {
            $map['auth_group_id'] = array('in',$group_id_list);
          }
           if (!empty($line_id)) 
         {
            $map['device_name'] = $line_id;
           
         }
      
         if($user_group['group_id']!=1000)
         {
            $map['accountability_group']=$user_group['group_name'];
         }
           if($user_group['department_id']!=1000)
         {
            $map['order_local_department']=$user_group['department_name'];
         }
          $map['datail_uptodate'] = 1;
          $count=M("order")->alias('o')->join('treesys_order_configure cf ON o.order_status=cf.configure_id', 'LEFT')->join('treesys_tree_base b ON o.order_tid=b.tid', 'LEFT')
          ->join('treesys_tree_detail d ON b.tid=d.detail_tid', 'LEFT')->join('__DEVICE_LINE__ dl ON b.line_id=dl.did', 'LEFT')->where($map)->count();


        
    $this->assign('count', $count); 
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
