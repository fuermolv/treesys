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
        $local_department = M("local_department")->select();
         $this->assign('local_department',$local_department);
        
       $this->assign('data', $data);
       $this->assign('group_id',$group_id);
       $this->assign('tree_id',$tree_id);
       $this->display();

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

          //自动计算隐患等级
          if($ar['datail_danger_degree']==-1) //自动计算模式
          {    

                 $amap['tid']=$detail_tid;
                 $v=M("tree_base")->field('dl.voltage_degree')->where($amap)->alias('base')->join('__DEVICE_LINE__ dl ON base.line_id=dl.did', 'LEFT')->select();

                 $a=$ar['datail_tree_height'];
                 $b=$ar['datail_tree_horizontal'];
                 $c=$ar['datail_tree_vertical'];
                 if($ar['datail_tree_over']==1) //树木高于导线
                 {
                    $d=sqrt(pow($b,2)+pow($c,2)); //B方+C方的和开方
                 }
                else //树木低于导线
                 {
                    $d=sqrt(pow(($a-$c),2)+pow($b,2))-$a;
                 }

                 $v=$v[0]['voltage_degree'];
                 if($v==500)
                 {
                      if($d<=7)
                      {
                          $ar['datail_danger_degree']='重大';
                      }
                      if($d>7 and $d<=10)
                      {
                        $ar['datail_danger_degree']='一般';
                      }
                      if($d>10 and $d<=16)
                      {
                        $ar['datail_danger_degree']='其他';
                      }
                       if($d>16)
                      {
                        $ar['datail_danger_degree']='不构成其他';
                      }

                 }
                 if($v==220)
                 {
                      if($d<=4.5)
                      {
                          $ar['datail_danger_degree']='重大';
                      }
                      if($d>4.5 and $d<=7.5)
                      {
                        $ar['datail_danger_degree']='一般';
                      }
                      if($d>7.5 and $d<=13.5)
                      {
                        $ar['datail_danger_degree']='其他';
                      }
                       if($d>13.5)
                      {
                        $ar['datail_danger_degree']='不构成其他';
                      }
                 }
                 if($v==35 or $v==110)
                 {
                      if($d<=4)
                      {
                          $ar['datail_danger_degree']='重大';
                      }
                      if($d>4 and $d<=7)
                      {
                        $ar['datail_danger_degree']='一般';
                      }
                      if($d>7 and $d<=13)
                      {
                        $ar['datail_danger_degree']='其他';
                      }
                       if($d>13)
                      {
                        $ar['datail_danger_degree']='不构成其他';
                      }
                 }

          }


         



          $dd=$ar['datail_danger_degree'];
          if($dd=='重大')
          {
            $ar['datail_danger_degree_num']=6;
          }
          if($dd=='一般')
          {
            $ar['datail_danger_degree_num']=5;
          }
          if($dd=='其他')
          {
            $ar['datail_danger_degree_num']=4;
          }
          if($dd=='不构成其他')
          {
            $ar['datail_danger_degree_num']=3;
          }
          if($dd=='处理后无树竹')
          {
            $ar['datail_danger_degree_num']=2;
          }
          if($dd=='一直无树竹')
          {
            $ar['datail_danger_degree_num']=1;
          }


          //

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

        foreach ($data as &$d)
        {
          $path=$d['file_path'];

          $path=str_replace("#","%23",$path);
          $path=str_replace("+","%2B",$path);
          $d['file_path']=$path;

        }


        

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