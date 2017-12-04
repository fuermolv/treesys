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
        if(empty($fly_plane_type))
        {
            $fly_plane_type=1;
        }
        $map['fly_plane_type'] = $fly_plane_type;
        $orderBy = 'fly_id desc';
        $data=$model->where($map)->order($orderBy)->select();
       $this->assign('data', $data);
       $this->assign('group_id',$group_id);
       $this->assign('tree_id',$tree_id);
       $this->display();

      /* $content=$this->fetch();
       $this->ajaxReturn($content);*/
   }
   public function delete() 
   {
        $fly_id = I('get.fly_id');
        $map['fly_id'] = $fly_id;
        M("tree_fly")->where(array($map))->delete();
   }
   public function add()
   {
    $tree_id = I('get.tid');
    $this->assign('tree_id',$tree_id);
    $content=$this->fetch();
    $this->ajaxReturn($content);
    //    if(IS_POST)
    //   {

    //       $ar=$_POST;
    //       $fly_tid=$ar['fly_tid'];
    //     //   $map['detail_tid']=$detail_tid;
    //     //   $data['datail_uptodate']=0;

    //     //   M("tree_detail")->where($map)->data($data)->save();

            
    //       $map=null;
    //       $user_id=$_SESSION['user']['id'];

    //       $map['id']=$user_id;
    //       $user=M("users")->where($map)->select();
    //       $ar['detail_last_time']=strtotime($ar['detail_last_time']);
    //       $ar['datail_check_time']=strtotime($ar['datail_check_time']);
    //       $ar['datail_update_time']=NOW_TIME;
    //       $ar['datail_update_person']=$user[0]['true_name'];
    //       $record=D('TreeDetail');
    //       $record->addData($ar);


    //       $basemap['tid']=$detail_tid;
    //       $basedata['last_update_person']=$user[0]['true_name'];
          
    //       $basedata['last_update_time']=NOW_TIME;

        

    //       M("tree_base")->where($basemap)->save($basedata);



    //       $this->ajaxReturn($detail_tid);
    //   }
    //   else
    //   {
    //       $tree_id = I('get.tid');
    //       $map['fly_tid']=$tree_id;
    //       $data=M("tree_fly")->where($map)->select();
    //       $this->assign('data',$data[0]);
    //       $this->assign('tree_id',$tree_id);
    //       $content=$this->fetch();
    //       var_dump($content);
    //       $this->ajaxReturn($content);


    //   }   
   }


    
}