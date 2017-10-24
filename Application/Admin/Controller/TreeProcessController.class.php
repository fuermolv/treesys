<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeProcessController extends AdminBaseController 
{
    /**
     * 首页
     */
    public function _initialize()
    {
      parent::_initialize();
    }
    public function index() 
    {
        $tree_id = I('get.tid');
        $group_id = I('get.group_id');
       
        $map['record_tid'] = $tree_id;
        $orderBy = 'record_id desc';
        $data=M("tree_process_record")->where($map)->order($orderBy)->select();

       $this->assign('data', $data);
       $this->assign('tree_id',$tree_id);
       $this->assign('group_id',$group_id);

       $this->display();
   }
   public function delete() 
   {
        $record_id = I('get.record_id');
        $map['record_id']=$record_id;
        M("tree_process_record")->where(array($map))->delete();
       // $this->ajaxReturn();
   }
   public function delete_file()
   {
        $file_id = I('get.file_id');
        $map['file_id']=$file_id;
        M("tree_file")->where(array($map))->delete();
   }
   public function add()
   {
   
       if(IS_POST)
      {

        $ar=$_POST;
        $record_tid=$ar['record_tid'];


        $user_id=$_SESSION['user']['id'];
        $map['id']=$user_id;
       
        $user=M("users")->where($map)->select();

        $ar['record_plan_clean_time']=strtotime($ar['record_plan_clean_time']);
        $ar['record_task_time']=strtotime($ar['record_task_time']);
        $ar['record_plan_verify_time']=strtotime($ar['record_plan_verify_time']);
        $ar['record_verify_time']=strtotime($ar['record_verify_time']);
        $ar['record_accept_time']=strtotime($ar['record_accept_time']);
        $ar['record_confirm_time']=strtotime($ar['record_confirm_time']);

        $ar['record_update_time']=NOW_TIME;
        $ar['record_update_person']=$user[0]['true_name'];

        M("tree_process_record")->data($ar)->add();

        $this->ajaxReturn($record_tid);

      } 
      else

      {
          $record_tid = I('get.tid');
          $tree_id = I('get.tid');
          $map['record_tid']=$record_tid;

          $orderBy = 'record_id desc';
          $data=M("tree_process_record")->where($map)->order($orderBy)->select();
          $this->assign('data',$data[0]);



          $this->assign('tree_id',$tree_id);
 
          $content=$this->fetch();
          $this->ajaxReturn($content);
      }
     
      
   }
   public function file()
   {

 
       $tree_id = I('get.tid');
       
        $map['file_tid'] = $tree_id;
        $orderBy = 'file_id desc';
        $data=M("tree_file")->where($map)->order($orderBy)->select();

       $this->assign('data', $data);
       $this->assign('tree_id',$tree_id);

       $content=$this->fetch();
       $this->ajaxReturn($content);
     
      
   }
   public function uploadfile()
   {

        if(IS_POST)
      {

        $user_id=$_SESSION['user']['id'];
        $map['id']=$user_id;
        $user=M("users")->where($map)->select();


      $tree_id = I('post.tree_id');
      $filelist = I('post.file');
      $extend = I('post.extend');
      foreach ($filelist as $file) 
      {
          $data=null;

          $path=$file;
          $temp=explode("/",$path);
          $name=$temp[count($temp)-1];

          $data['file_tid']=$tree_id;
          $data['fiel_extend']=$extend;
          $data['file_update_person']=$user[0]['true_name'];
          $data['file_update_time']=NOW_TIME;
          $data['file_path']=$file;
          $data['file_name']=$name;
          M("tree_file")->data($data)->add();




      }

      }
      else
      {
        $tree_id = I('get.tid');
        $this->assign('tree_id',$tree_id);
        $content=$this->fetch();
        $this->ajaxReturn($content);
      }
     
      
   }
   

    public function ajax_upload(){
        
        // 根据自己的业务调整上传路径、允许的格式、文件大小
        ajax_upload('/Public/Upload/file/');
    }
    /**
     * webuploader 上传demo
     */
   

    
}