<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeFlyModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeFlyController extends AdminBaseController 
{
    /**
     * 首页
     */
    public function _initialize()
    {
      parent::_initialize();
    }
    public function index() {

        $tree_id = I('get.tid');
        $group_id = I('get.group_id');
        $fly_plane_type=I('get.fly_plane_type');
        $model = new TreeFlyModel();
        $map['fly_tid'] = $tree_id;
        if($fly_plane_type=="")
        {
            $fly_plane_type="1";
        }
        // var_dump($fly_plane_type);
        
        $map['fly_plane_type'] = $fly_plane_type;
        $orderBy = 'fly_id desc';
        $data=$model->where($map)->order($orderBy)->select();
       $this->assign('data', $data);
       $this->assign('fly_plane_type', $fly_plane_type);       
       $this->assign('group_id',$group_id);
       $this->assign('tree_id',$tree_id);
       $this->display();

      /* $content=$this->fetch();
       $this->ajaxReturn($content);*/
   }
   public function edit() {
    if(IS_POST)
    {
        $ar=$_POST;
        $fly_tid=$ar['fly_tid'];
        $fly_id=$ar['fly_id'];
        
      //   $map['detail_tid']=$detail_tid;
      //   $data['datail_uptodate']=0;

      //   M("tree_detail")->where($map)->data($data)->save();

          
        $map=null;
        $user_id=$_SESSION['user']['id'];

        $map['id']=$user_id;
        $user=M("users")->where($map)->select();
        $ar['fly_check_time']=strtotime($ar['fly_check_time']);
        $ar['fly_start_time']=strtotime($ar['fly_start_time']);
        $ar['fly_end_time']=strtotime($ar['fly_end_time']);
        $ar['fly_report_made_time']=strtotime($ar['fly_report_made_time']);
        $ar['fly_receive_report_time']=strtotime($ar['fly_receive_report_time']);
        $ar['fly_group_receive_report_time']=strtotime($ar['fly_group_receive_report_time']);
        $ar['fly_group_feedback_time']=strtotime($ar['fly_group_feedback_time']);
        $ar['fly_later_deal_time']=strtotime($ar['fly_later_deal_time']); 
        $ar['fly_update_time']=NOW_TIME;
        $ar['fly_update_person']=$user[0]['true_name'];
        $map=null;
        $map['fly_id']=$fly_id;
        // var_dump($map);
        $result = D("TreeFly")->editData($map,$ar);
        $this->ajaxReturn($result);

    }
    else{
        $fly_id=I('get.fly_id');
        
        $model = new TreeFlyModel();
        $map['fly_id'] = $fly_id;
        
        // var_dump($fly_plane_type);
        
        $orderBy = 'fly_id desc';
        $data=$model->where($map)->order($orderBy)->select();
       $this->assign('data', $data[0]);
       $this->assign('fly_id', $fly_id);
       
    //    var_dump($data);
       $this->display();
    }
            
    
          /* $content=$this->fetch();
           $this->ajaxReturn($content);*/
       }  
   public function delete() 
   {
        $fly_id = I('get.fly_id');
        $fly_tid=I('get.fly_tid');
        $group_id=I('get.group_id');
        $map['fly_id'] = $fly_id;
        var_dump($fly_id);
        $record=D('TreeFly');
        $result = $record->where(array($map))->delete();
        if($result){
            $this->success("成功删除飞行记录",U("Admin/TreeFly/index/group_id/{$group_id}"));
            }
        else{   
            $this->error('删除飞行记录失败');}
        
   }
   public function add()
   {
       if(IS_POST)
      {

          $ar=$_POST;
          $fly_tid=$ar['fly_tid'];
        //   $map['detail_tid']=$detail_tid;
        //   $data['datail_uptodate']=0;

        //   M("tree_detail")->where($map)->data($data)->save();

            
          $map=null;
          $user_id=$_SESSION['user']['id'];

          $map['id']=$user_id;
          $user=M("users")->where($map)->select();
          $ar['fly_check_time']=strtotime($ar['fly_check_time']);
          $ar['fly_start_time']=strtotime($ar['fly_start_time']);
          $ar['fly_end_time']=strtotime($ar['fly_end_time']);
          $ar['fly_report_made_time']=strtotime($ar['fly_report_made_time']);
          $ar['fly_receive_report_time']=strtotime($ar['fly_receive_report_time']);
          $ar['fly_group_receive_report_time']=strtotime($ar['fly_group_receive_report_time']);
          $ar['fly_group_feedback_time']=strtotime($ar['fly_group_feedback_time']);
          $ar['fly_later_deal_time']=strtotime($ar['fly_later_deal_time']); 
          $ar['fly_update_time']=NOW_TIME;
          $ar['fly_update_person']=$user[0]['true_name'];
          $record=D('TreeFly');
          $record->addData($ar);
          $this->ajaxReturn($fly_tid);
      }
      else
      {
        $tree_id = I('get.tid');
        $this->assign('tree_id',$tree_id);
        $content=$this->fetch();
        $this->ajaxReturn($content);


      }   
   }


    
}