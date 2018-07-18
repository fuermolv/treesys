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

        $count =$model->alias('fly')->join('__DEVICE_LINE__ dl ON fly.fly_line_name=dl.device_name', 'LEFT')->where($map)->count();
      

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



          for ($i=0; $i<=14; $i++)
         {
            if(!empty($data[$i]) and (strpos($data[$i],'.') !=false) and $i!=3  and $i!=4)
           {
                $raw_string=$data[$i];
                $format_num = sprintf("%.3f",$raw_string);
                $data[$i]=$format_num;
                
           } 
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




          $dd=$flydata['fly_danger_degree'];
          if($dd=='重大')
          {
            $flydata['fly_danger_serial']=6;
          }
          if($dd=='一般')
          {
            $flydata['fly_danger_serial']=5;
          }
          if($dd=='其他')
          {
            $flydata['fly_danger_serial']=4;
          }
          if($dd=='不构成其他')
          {
            $flydata['fly_danger_serial']=3;
          }
          if($dd=='处理后无树竹')
          {
            $flydata['fly_danger_serial']=2;
          }
          if($v=='一直无树竹')
          {
            $flydata['fly_danger_serial']=1;
          }





          M("fly")->data($flydata)->add();
          $this->save_to_base_data($flydata);
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


    public function save_to_base_data($flydata){
        $md5=md5($flydata['fly_longitude']."-".$flydata['fly_latitude']);
        $fmap['tree_md5']=$md5;

        $found=M("tree_base")->where($fmap)->select();

        //往base插入一条新的
        if (empty($found) or count($found)<1)
        {     
              $lmap['device_name']=$flydata['fly_line_name'];
              $line_data=M("device_line")->where($lmap)->select();
              if (count($line_data)<1)
              {
                   $insert_line['device_name']=$flydata['fly_line_name'];
                   $insert_line['voltage_degree']="unknown";
                   $line_id=M("fly")->data($insert_line)->add();

              }else
              {
                    $line_id=$line_data[0]['did'];
              }

              if(strpos($flydata['star_tower'],"+") !== false)
              {
                    $st=explode("+",$star_tower);
                    $base_data['star_tower']=$st[0];
                    $base_data['start_tower_addtion']=$st[1];

              }else
              {

                  $base_data['star_tower']=$flydata['star_tower'];
              }
               if(strpos($flydata['end_tower'],"+") !== false)
              {
                 $st=explode("+",$star_tower);
                 $base_data['end_tower']=$st[0];
                    $base_data['end_tower_addtion']=$st[1];
              }
              else
              {
                $base_data['end_tower']=$flydata['end_tower'];
              }
             
              //查班组数据
              $gmap['tower_serial']=$base_data['star_tower']
              if (!empty($base_data['start_tower_addtion']))
              {
              	   $gmap['tower_addtion']=$base_data['start_tower_addtion']
              }
              $gmap['line_id']=$line_id;
              $gdata=M("tower_group")->where($gmap)->find();
              $base_data['accountability_group']=$gdata['group_name'];





              $base_data['line_id']=$line_id;
              $base_data['tree_md5']=$md5;
              $base_data['first_upload_time']=$flydata['fly_time'];;
          
              
              // $base_data['end_tower']=$flydata['end_tower'];
              $base_data['tree_property']=$flydata['fly_tree_type'];
              $base_data['tree_park_distance']=$flydata['fly_p_distance'];
              $base_data['tree_longitude']=$flydata['fly_longitude'];
              $base_data['tree_latitude']=$flydata['fly_latitude'];
              $base_data['tree_small_distance']=$flydata['fly_tower_distance'];
              $base_data['last_update_time']=NOW_TIME;
              $base_data['last_update_person']=$_SESSION['user']['true_name'];

              
             

             $base=M("tree_base");
             $tid=$base->data($base_data)->add(); 
            
        }else{
             $tid=$found['0']['tid'];
        }



        $map['detail_tid']=$tid;
        $data['datail_uptodate']=0;
        M("tree_detail")->where($map)->data($data)->save();
         

        
       
       

        $detail_data['detail_tid']=$tid;
        $detail_data['datail_danger_degree']=$flydata['fly_danger_degree'];
        $detail_data['datail_danger_degree_num']=$flydata['fly_danger_serial'];
      
        $detail_data['datail_tree_horizontal']=$flydata['fly_horizontal_distance'];
        $detail_data['datail_tree_vertical']=$flydata['fly_vertical_distance'];
        $detail_data['datail_mix_net_distance']=$flydata['fly_air_distance'];
        $detail_data['detail_fly_height']=$flydata['fly_height'];
        $detail_data['detail_last_time']=$flydata['fly_time'];
        $detail_data['detail_safe_distance']=$flydata['fly_safe_distance'];
        $detail_data['detail_source']="飞行报告";
       
    
       

        
        M("tree_detail")->data($detail_data)->add(); 
      

       
       










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