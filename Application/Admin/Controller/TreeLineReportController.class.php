<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeLineReportController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() {
       
         
        $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;

        $line_name = I('get.line_name');
          if(empty($line_name))
        {
          $line_name="曲花甲线";
        }


        if(!empty($line_name))
        {

             $map['tower_line_name']=$line_name;
             $orderBy='tower_serial';
             $count = M("device_tower")->where($map)->count();
             $limit = 20;
             $page = new_page($count, $limit);
             $list =M("device_tower")->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();


             $data = array('data' => $list, 'page' => $page->show());

             $this->assign('data', $data['data']);
             $this->assign('pagehtml', $data['page']);
             $this->assign('line_name', $line_name);
        }

        $this->assign('querydata', $querydata);


        $this->display();
    }
    
   
    public function fly() 
    {



         $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;
        $line_name = I('get.line_name');
        $start_tower = I('get.start_tower');



         if (!empty( $voltage_degree))
        {
             $map['fly_voltage_degree']=$voltage_degree;
            
        }
        if (!empty( $line_name))
        {
             $map['fly_line_name']=$line_name;
            
        }
          if (!empty($start_tower))
        {
             
             $map['star_tower']=$start_tower;
        }

        
            if(!empty($start_s_time) and !empty($end_s_time))
            {
              $smap['fly_time']= array('between',array(convTime($start_s_time),convTime($end_s_time)));
                 
            }
            if(!empty($start_s_time) and empty($end_s_time))
            {
              $smap['fly_time']= array('EGT',convTime($start_s_time));
                 
            }

             if(empty($start_s_time) and !empty($end_s_time))
            {
              $smap['fly_time']= array('ELT',convTime($end_s_time));
                 
            }

       

        $model= M("fly");

        $count =$model->where($map)->count();
      

        $limit = 20;
        $orderBy='fly_time desc,fly_serial desc';
        $page = new_page($count, $limit);
        $list =M("fly")->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
        $data = array('data' => $list, 'page' => $page->show());

         
        $this->assign('data', $data['data']);
        $this->assign('pagehtml', $data['page']);
        $this->assign('star_tower',  $start_tower);
        $this->assign('line_name', $line_name);
         $this->assign('querydata', $querydata);

          $this->display();

    }

    public function agreement() 
    {



        $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;

        $line_name = I('get.line_name');
        $start_tower = I('get.start_tower');
       
        if (!empty( $voltage_degree))
        {
             $map['ag_voltage_degree']=$voltage_degree;
            
        }


         if (!empty( $line_name))
        {
             $map['ag_line_name']=$line_name;
            
        }
          if (!empty($start_tower))
        {
             
        $start_tower_int=intval($start_tower);
        $end_tower_int=$start_tower_int+1;

        $map['ag_start_tower']=array('ELT',$start_tower_int);
        $map['ag_end_tower']=array('EGT',$end_tower_int);
        }


      


        $model= M("agreement");

        $count =$model->where($map)->count();
    
      

        $limit = 20;
        $orderBy='agid desc';
        $page = new_page($count, $limit);
        $list = $model->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
        $data = array('data' => $list, 'page' => $page->show());

         
        $this->assign('data', $data['data']);
        $this->assign('pagehtml', $data['page']);
         $this->assign('querydata', $querydata);
     

        $this->display();

    }


    public function fly_upload()
   {

        if(IS_POST)
      {

       


      $tree_id = I('post.tree_id');
      $filelist = I('post.file');
      $extend = I('post.extend');
      foreach ($filelist as $file) 
      {
          $data=null;

          $path=$file;
          $temp=explode("/",$path);
          $name=$temp[count($temp)-1];

          var_dump($file);
          $this->display();

          // $data['file_tid']=$tree_id;
          // $data['fiel_extend']=$extend;
          // $data['file_update_person']=$user[0]['true_name'];
          // $data['file_update_time']=NOW_TIME;
          // $data['file_path']=$file;
          // $data['file_name']=$name;
          // $data['file_type']='check';
          // M("tree_file")->data($data)->add();

      }

      }
      else
      {

      	$this->display();
      }
     
      
   }


   public function agreement_upload()
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
        ajax_upload('/Public/Upload/fly');
    }

    //  public function ajax_agreement_upload(){
        
    //     // 根据自己的业务调整上传路径、允许的格式、文件大小
    //     ajax_upload('/Public/Upload/agreement');
    // }
   
   
   

    
}