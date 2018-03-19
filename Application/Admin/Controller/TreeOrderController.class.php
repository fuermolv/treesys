<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeOrderController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() {


          $uid=$_SESSION['user']['id'];
          $map['uid']=$uid;
          $line_id = I('get.line_id');

        $device_lines = F('device_lines');
        if(empty($device_lines)or $device_lines==FALSE)
        {
        $device_lines = M("device_line")->select();
        F('device_lines',$device_lines);
        }
        $querydata['device_lines'] = $device_lines;

       
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


         $orderby='order_id desc';
        

          $map['datail_uptodate'] = 1;
          $count=M("order")->alias('o')->join('treesys_order_configure cf ON o.order_status=cf.configure_id', 'LEFT')->join('treesys_tree_base b ON o.order_tid=b.tid', 'LEFT')
          ->join('treesys_tree_detail d ON b.tid=d.detail_tid', 'LEFT')->join('__DEVICE_LINE__ dl ON b.line_id=dl.did', 'LEFT')->where($map)->count();
          
          $page = new_page($count, $limit);


          $data=M("order")->alias('o')->join('treesys_order_configure cf ON o.order_status=cf.configure_id', 'LEFT')->join('treesys_tree_base b ON o.order_tid=b.tid', 'LEFT')
          ->join('treesys_tree_detail d ON b.tid=d.detail_tid', 'LEFT')->join('__DEVICE_LINE__ dl ON b.line_id=dl.did', 'LEFT')->join('treesys_tree_file tf ON o.order_file_id=tf.file_id', 'LEFT')->where($map)->order($orderby)->select();


        
      
        $this->assign('querydata', $querydata);
        $this->assign('data', $data);
        $this->assign('pagehtml', $page->show());

        $this->display();
    }
     public function conf() {
       
         $orderBy='serial';
         $conf_data = M("order_configure")->alias('o')->join('treesys_auth_group ag ON o.auth_group_id=ag.id', 'LEFT')->order($orderBy)->select();
         $query_data=M("auth_group")->select();



        $this->assign('query_data', $query_data);
        $this->assign('conf_data', $conf_data);
        $this->display();
    }
    public function conf_edit() {


        
        $data=I('post.');
        $map=array(
            'configure_id'=>$data['configure_id']
            );
        $result=M("order_configure")->where($map)->save($data);
        if ($result) {
            $this->success('修改成功',U('Admin/TreeOrder/conf'));
        }else{
            $this->error('修改失败');
        }
    }

     public function order_edit() {


       
        $data=I('post.');
         
       
        $emap['order_file_id']=$data['order_file_id'];


        $exist=M('order')->where($emap)->select();

        $name=$_SESSION['user']['true_name'];
      
        $data['order_update_time']=NOW_TIME;
        $data['order_update_person']=$name;

        if(empty($exist))
        {
            $data['order_status']=1;
            $data['order_tid']=$data['tid'];
            $result=M("order")->where($map)->add($data);
        }
        // }else
        // {
         
        //  if(empty($data['order_file_id']))
        //  {
        //  $result=M("order")->where($map)->save($data);
        //  }
        // }
       
        if ($result) {
            $this->success('成功',U('Admin/Tree/base/tid/'.$data['tid']));
        }else{
          if(empty($data['order_remark']))
          {
            $this->error('失败-备注不能为空');
          }else{
            $this->error('失败-该任务单已经过初始化');
          }

        }
    }

    public function edit_tree_div()
    {   
         $data=I('post.');
        
        $omap['order_tid']=$data['tid'];
        $order_data=M("order")->alias('o')->join('treesys_order_configure cf ON o.order_status=cf.configure_id', 'LEFT')->where($omap)->select();
        $success=TRUE;
        
        if(!empty($order_data))
        {
           $order_rule=$order_data[0]['auth_group_id'];
           $uid=$_SESSION['user']['id'];
           $umap['uid']=$uid;
           $users_auth_group=M("auth_group_access")->alias('o')->join('treesys_auth_group ag ON o.group_id=ag.id', 'LEFT')->where($umap)->select();
           $success=FALSE;
          for($i=0;$i<count($users_auth_group);$i++)
          {
            if($users_auth_group[$i]['id']==$order_data[0]['auth_group_id'])
            {
              $success=TRUE;
            }

          }


        }
     


       
        if($success)
        {
        
        $map['tid']=$data['tid'];
        $result=M("tree_base")->where($map)->save($data);
       }

        if ($result) {

            $this->success('成功',U('Admin/Tree/base/tid/'.$data['tid']));
        }else
        {
           $this->error('失败(该树障已处于任务流中应由相关人员修改)');
        }

    }

    public function next()
    {
      $data=I('post.');
      $map['order_id']=$data['order_id'];


      if(empty($data['order_remark']))
      {
        $this->error('失败-备注不能为空');
      }
         if($data['order_status']==8)
      {
        $this->error('失败-该任务单已经过验收');
      }
        $data['order_status']=$data['order_status']+1;
        if($data['order_status']==8)
        {
          $data['order_tag']=1;
        }

        $result=M("order")->where($map)->save($data);
        if($result)
        {
          $tmap['tid']=$data['tid'];
          $tdata['tree_div']=$data['order_div'];
          M("tree_base")->where($tmap)->save($tdata);
           for($i=0;$i<count($users_auth_group);$i++)
          {
            $group_id_list[$i]=$users_auth_group[$i]['id'];
          }




          $this->success('成功',U('Admin/TreeOrder/index'));
        }else
        {
           $this->error('失败');
          
        }
   }


         
     

    
    public function back()
    {
         $data=I('post.');
      $map['order_id']=$data['order_id'];
      if(empty($data['order_remark']))
      {
        $this->error('失败-备注不能为空');
      }

        if($data['order_status']==1)
      {
        $this->error('失败-初始状态度无法回退(请直接删除)');
      }
        $data['order_status']=$data['order_status']-1;

        $result=M("order")->where($map)->save($data);
        if($result)
        {
          $tmap['tid']=$data['tid'];
          $tdata['tree_div']=$data['order_div'];
          M("tree_base")->where($tmap)->save($tdata);
          $this->success('成功',U('Admin/TreeOrder/index'));
        }else
        {
           $this->error('失败');
          
        }
    }
    public function delete()
    {
        $order_id = I('get.order_id');
        $map['order_id']=$order_id;
        M("order")->where(array($map))->delete();
    }
      

  
    
  
    
}