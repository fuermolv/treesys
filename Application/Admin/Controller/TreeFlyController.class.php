<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeFlyController extends AdminBaseController {
    /**
     * 首页
     */
  
    
   
    public function fly() 
    {



         $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;
        $line_name = I('get.line_name');
        $start_tower = I('get.start_tower');
        $voltage_degree = I('get.voltage_degree');


         if (!empty( $voltage_degree))
        {
             $map['voltage_degree']=$voltage_degree;
            
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
        $list =M("fly")->alias('fly')->join('__DEVICE_LINE__ dl ON fly.fly_line_name=dl.device_name', 'LEFT')->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
        $data = array('data' => $list, 'page' => $page->show());


         
        $this->assign('data', $data['data']);
        $this->assign('pagehtml', $data['page']);
        $this->assign('star_tower',  $start_tower);
        $this->assign('line_name', $line_name);
        $this->assign('querydata', $querydata);

        $this->display();

    }

 

    public function fly_upload()
   {

        if(IS_POST)
      {

       
      $filelist = I('post.file');
      $extend = I('post.extend');
      foreach ($filelist as $file) 
      {
          $data=null;
          $path=$file;
          $flag=$this->ReadFlyData($path);
          if ($flag==1){
            break;
          }
  

      }
      if($flag==1){
         $this->error('导入失败','',5);
      }else{
         $this->success('导入成功','',5);
      }

     

      }else
      {

          $this->display();
      }
    }


  public function ReadFlyData($path)
    {

       $path=".".$path;
       $contents_before = file_get_contents($path);  
       $contents_after = iconv('GBK','UTF-8',$contents_before);  
       file_put_contents($path, $contents_after); 
       $datalist=import_excel($path);
       $flag=0;
       $model=M("fly");
       $model->startTrans();
       $x=0;
       foreach ($datalist as $data)
       {  
        if($x==0)
        {
          $x++;
          continue;
        }
       
          try{


          $flydata['fly_serial']=$data[0];
          $lt=$data[1];
          $startdata=explode("-",$lt)[0];
          $enddata=explode("-",$lt)[1];
          $flydata['fly_line_name']=explode("#",$startdata)[0];         
          $flydata['raw_fly_line_name']=explode("#",$startdata)[0];
          $flydata['star_tower']=explode("#",$startdata)[1];         
          $flydata['end_tower']=explode("#",$enddata)[1];
          $flydata['fly_time']=convTime($data[2]);
          $flydata['fly_longitude']=$data[3];
          $flydata['fly_latitude']=$data[4];
          $flydata['fly_height']=$data[5];
          $flydata['fly_p_distance']=$data[6];         
          $flydata['fly_tower_distance']=$data[7];
          $flydata['fly_tree_type']=$data[8];
          $flydata['fly_horizontal_distance']=$data[9];
          $flydata['fly_vertical_distance']=$data[10];
          $flydata['fly_air_distance']=$data[11];
          $flydata['fly_danger_degree']=$data[12];
          $flydata['fly_safe_distance']=$data[13];
          M("fly")->data($flydata)->add();
           }catch (\Think\Exception $e){
              $flag=1;
              break;
           }

   
          }

           if ($flag==1){
            $model->rollback();
           }else{
            $model->commit();
           }
           return $flag;
          
        }



    public function ajax_upload(){
        
        // 根据自己的业务调整上传路径、允许的格式、文件大小
        ajax_upload('/Public/Upload/fly');
    }
    

   public  function convTime($data)
      {


        $time=strtotime($data);
        if($time==false)
        {
          
          $data=str_replace(".","-",$data);
          $time=strtotime($data);
          return $time;
          
        }
        else
        {
          return $time;
        }
       
       }

   
   
   

    
}