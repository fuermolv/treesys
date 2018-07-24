<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use Common\Model\TreeBaseModel;
use Common\Model\TreeDetailModel;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class TreeAggController extends AdminBaseController {
   

    public function agreement() 
    {



        $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;

        $line_name = I('get.line_name');
        $start_tower = I('get.start_tower');
         $voltage_degree = I('get.voltage_degree');
       
        if (!empty($voltage_degree))
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

        foreach ($data['data'] as &$d)
        {
          $path=$d['ag_file_path'];

          $path=str_replace("#","%23",$path);
          $path=str_replace("+","%2B",$path);
          $d['ag_file_path']=$path;

        }


         
        $this->assign('data', $data['data']);
        $this->assign('pagehtml', $data['page']);
        $this->assign('querydata', $querydata);
     

        $this->display();

    }


  


   public function agreement_upload()
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
        
          if(strpos($path,'pdf') ==false)
          {
            $this->error('导入失败:只能导入pdf文件','',5);
          }
      
          
          $temp=explode("/",$path);
          $name_t=$temp[count($temp)-1];
          $name_list=explode("-",$name_t,-1);
          foreach ($name_list as $n){
              if (!empty($name))
              {
                 $name=$name."-".$n;
              }
              else
              {
                 $name=$n;
              }
              
          }
          $name=$name.".pdf";

        
         $line_tower_pattern="((220|110|35|500|#).*?(、|（))";
         $addtion_year_pattern="(（.*\.)";
         $ok=preg_match_all($addtion_year_pattern, $name,$matches);
         if($ok)
         {
             
             $name_year_temp=$matches[0];

             $name_year_temp=str_replace(".","",$name_year_temp);

             $name_year_temp=str_replace("（","",$name_year_temp);

             $data['ag_addtion']=explode("）",$name_year_temp[0])[0];
             $data['ag_year']=explode("）",$name_year_temp[0])[1];
             $data['ag_upload_time']=NOW_TIME;

         }else{
             $this->error('导入失败1','',5);
         }  

         $ok1=preg_match_all($line_tower_pattern, $name,$matches1);
         

         if($ok1)
         {
             
             $line_tower_data=$matches1[0];
           
             $voltage=0;
             $line_name=""; 
             foreach ($line_tower_data as $lt_data){

             $lt_data=str_replace("（","",$lt_data);
             $lt_data=str_replace("、","",$lt_data);
             $lt_data=str_replace("#","",$lt_data);
             $lt_data=str_replace("+1","",$lt_data);
             $lt_data=str_replace("+2","",$lt_data);
             $lt_data=str_replace("+3","",$lt_data);
             $lt_data=str_replace("+4","",$lt_data);
             $lt_data=str_replace("+5","",$lt_data);
             $lt_data=str_replace("+6","",$lt_data);
             $lt_data=str_replace("+","",$lt_data);
             $tower_data=$lt_data;
            
             //是否带有线路数据
             if(strpos($lt_data,'kV') !==false){
               
               $line_data=explode("线",$lt_data)[0];

               $v_data=explode("kV",$line_data)[0];
               $line_name=explode("kV",$line_data)[1];
                
               $voltage= $v_data;
               $line_name=$line_name."线";
               $tower_data=explode("线",$lt_data)[1];
          

             }

             $data['ag_voltage_degree']=$voltage;
             $data['ag_line_name']=$line_name;
             $data['raw_ag_line_name']=$line_name;
             $data['ag_start_tower']=explode("-",$tower_data)[0];
             $data['ag_end_tower']=explode("-",$tower_data)[1];
             $data['ag_file_path']=$path;


             //上传时更新一下base的数据
             $lmap['device_name']=$data['ag_line_name'];
             $line_data=M("device_line")->where($lmap)->find();
             if (!empty($line_data))
             {
                 $base_map['line_id']=$line_data['did'];
                 $base_map['star_tower']=array('EGT',$data['ag_start_tower']);
                 $base_map['end_tower']=array('ELT',$data['ag_end_tower']);
                 $base_data['tree_have_agg']=1;
                 M("tree_base")->where($base_map)->save($base_data);

             }

            

             M("agreement")->data($data)->add();
           
           
           

             }

         }else{
             $this->error('导入失败2','',5);
         }
      

      }
       $this->success('导入成功','',5);

      }
      else
      {


       
         
       $this->display();
       // $path="/Public/Upload/agreement/2018-06-18/agtxt.txt";
       // $path=".".$path;
       // $str = file_get_contents($path);
     
       // $arr = explode("\r\n", $str);//转换成数组
       //  foreach ($arr as $row) {
                 
       //         $this->ReadTxtAgg($row);
       //  }


      
      }
      
   }



     

    public function ajax_upload(){
        
        // 根据自己的业务调整上传路径、允许的格式、文件大小
        ajax_upload('/Public/Upload/agreement');
    }

    // public function ReadTxtAgg($path){

    //       $temp=explode("\\",$path);


    //       $name=$temp[count($temp)-1];

      
         
          
    


    //      $line_tower_pattern="((220|110|35|500|#).*?(、|（))";
    //      $addtion_year_pattern="(（.*\.)";
    //      $ok=preg_match_all($addtion_year_pattern, $name,$matches);
         
    //      if($ok)
    //      {
             
    //          $name_year_temp=$matches[0];

    //          $name_year_temp=str_replace(".","",$name_year_temp);

    //          $name_year_temp=str_replace("（","",$name_year_temp);

    //          $data['ag_addtion']=explode("）",$name_year_temp[0])[0];
    //          $data['ag_year']=explode("）",$name_year_temp[0])[1];
    //          $data['ag_upload_time']=NOW_TIME;

    //      }else{
    //          var_dump($name);
    //      }  

    //      $ok1=preg_match_all($line_tower_pattern, $name,$matches1);


    //        $ok1=preg_match_all($line_tower_pattern, $name,$matches1);
         

    //      if($ok1)
    //      {
             
    //          $line_tower_data=$matches1[0];
           
    //          $voltage=0;
    //          $line_name=""; 
    //          foreach ($line_tower_data as $lt_data){

    //          $lt_data=str_replace("（","",$lt_data);
    //          $lt_data=str_replace("、","",$lt_data);
    //          $lt_data=str_replace("#","",$lt_data);
    //           $lt_data=str_replace("+1","",$lt_data);
    //          $lt_data=str_replace("+2","",$lt_data);
    //          $lt_data=str_replace("+3","",$lt_data);
    //          $lt_data=str_replace("+4","",$lt_data);
    //          $lt_data=str_replace("+5","",$lt_data);
    //          $lt_data=str_replace("+6","",$lt_data);
    //          $lt_data=str_replace("+","",$lt_data);
    //          $tower_data=$lt_data;
            
    //          //是否带有线路数据
    //          if(strpos($lt_data,'kV') !==false){
               
    //            $line_data=explode("线",$lt_data)[0];

    //            $v_data=explode("kV",$line_data)[0];
    //            $line_name=explode("kV",$line_data)[1];
                
    //            $voltage= $v_data;
    //            $line_name=$line_name."线";
    //            $tower_data=explode("线",$lt_data)[1];
          

    //          }
    //          $data['ag_voltage_degree']=$voltage;
    //          $data['ag_line_name']=$line_name;
    //          $data['raw_ag_line_name']=$line_name;
    //          $data['ag_start_tower']=explode("-",$tower_data)[0];
    //          $data['ag_end_tower']=explode("-",$tower_data)[1];
    //          $data['ag_file_path']=$name;

    //            try{

    //          M("agreement")->data($data)->add();
    //        }catch (\Think\Exception $e){

    //           var_dump($path);
    //           continue;
    //        }
             
            
             

    //          }
    //      }else{
    //          var_dump($name);
    //      }
         

     

    // }

 
   
   
    

    
}