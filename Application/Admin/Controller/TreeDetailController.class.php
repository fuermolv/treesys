<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeDetailController extends AdminBaseController 
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
        $model = new TreeDetailModel();
        $map['detail_tid'] = $tree_id;
        $orderBy = 'detail_id desc';
    
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
        $detail_id = I('get.detail_id');

        $map['detail_id'] = $detail_id;
        M("tree_detail")->where(array($map))->delete();
        $map['datail_uptodate'] =1;

        $uptodate=M("tree_detail")->where($map)->select();
       
        if(empty($uptodate))
        {


          $map=null;
          $tid = I('get.tid');
         
          $map['detail_tid']=$tid;

          $detail_id=M("tree_detail")->where($map)->max('detail_id');
          

          if(!empty($detail_id))
          {
            $map['detail_id']=$detail_id;
            $data['datail_uptodate'] =1;
            M("tree_detail")->where($map)->data($data)->save();

          }


        }
   }
   public function add()
   {

  
  
       if(IS_POST)
      {

          $ar=$_POST;
          $detail_tid=$ar['detail_tid'];
          $map['detail_tid']=$detail_tid;
          $data['datail_uptodate']=0;

          M("tree_detail")->where($map)->data($data)->save();

            
          $map=null;
          $user_id=$_SESSION['user']['id'];

          $map['id']=$user_id;
          $user=M("users")->where($map)->select();
          $ar['detail_last_time']=strtotime($ar['detail_last_time']);
          $ar['datail_check_time']=strtotime($ar['datail_check_time']);
          $ar['datail_update_time']=NOW_TIME;
          $ar['datail_update_person']=$user[0]['true_name'];
          $record=D('TreeDetail');
          $record->addData($ar);


          $basemap['tid']=$detail_tid;
          $basedata['last_update_person']=$user[0]['true_name'];
          
          $basedata['last_update_time']=NOW_TIME;

        

          M("tree_base")->where($basemap)->save($basedata);



          $this->ajaxReturn($detail_tid);
      }
      else
      {
          $tree_id = I('get.tid');
          $map['detail_tid']=$tree_id;
          $map['datail_uptodate']=1;
          $data=M("tree_detail")->where($map)->select();
          $this->assign('data',$data[0]);
          $this->assign('tree_id',$tree_id);
          $content=$this->fetch();
          $this->ajaxReturn($content);


      }
    
     



     
      
   }
      public function delete_file()
   {
        $file_id = I('get.file_id');
        $map['file_id']=$file_id;
        M("tree_file")->where(array($map))->delete();
   }

   public function file()
   {

 
       $tree_id = I('get.tid');
       
        $map['file_tid'] = $tree_id;
        $map['file_type']='check';
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
          $data['file_type']='check';
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
        ajax_upload('/Public/Upload/file/check');
    }
    /**
     * webuploader 上传demo
     */

    
}