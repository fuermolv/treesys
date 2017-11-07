<?php
namespace Admin\Controller;
use Common\Controller\HomeBaseController;

/**
 * 后台首页控制器
 */
class ReadDataController extends HomeBaseController 
{
    /**
     * 首页
     */
    public function _initialize()
    {
      parent::_initialize();
    }
    public function readGpsRecord() 
    {
       $dir = "./gps";

      if (is_dir($dir)) {
      if ($dh = opendir($dir)) 
      {

          $count=0;
          while (($file = readdir($dh)) !== false)
      {
       if($file != "." && $file != ".." )
       {

            $file=iconv("GBK","utf-8",$file);
            $temp=explode("本部_",$file);
            $temp1=explode("_",$temp[1]);
            $line_name=explode(".",$temp1[1])[0];
            $line_degree=$temp1[0];

            $name=iconv("utf-8","GBK",$file);
            $path=$dir . "/" . $name;
     
            $datalist=import_excel($path);
            $x=0;
            foreach ($datalist as $data)
            {
                  
                  
                    if($x==0)
                  {
                      echo "filename: $file-------$count  ";
                      echo "<br>";
                      $count++;
                  }else
                  {

                    $sdata['tower_line_name']=$line_name;
                    $sdata['tower_line_degree']=$line_degree;     
                    $sdata['tower_number_old']=$data[0];
                    $sdata['tower_number']=preg_replace('/\D/s', '', $data[0]);
                    $sdata['tower_longitude_d']=$data[1];
                    $sdata['tower_longitude_m']=$data[2];
                    $sdata['tower_longitude_s']=$data[3];
                    $sdata['tower_latitude_d']=$data[4];
                    $sdata['tower_latitude_m']=$data[5];
                    $sdata['tower_latitude_s']=$data[6];
                    $sdata['tower_serial']=$data[7];
                    M("device_tower")->data($sdata)->add();
                }  
                  
                  $x++;
            }


           //  $file=iconv("utf-8","gb2312",$file); 
          /*  echo "filename: $path-------$count  ";
            echo "<br>";*/
           
            
       }
        
      } 
      closedir($dh);
     }
     }
   }

   public function readTreeRecord()
   {

         $dir = "./TreeRecord/data";
         if (is_dir($dir)) 
        {
        if ($dh = opendir($dir)) 
      {

          $count=0;
      while (($file = readdir($dh)) !== false)
      {  
         if($file != "." && $file != ".." )
         {
              $path=$dir . "/" . $file;
              $datalist=import_excel($path);

              
              foreach ($datalist as $data)
              {

                   //有部分数据需要处理 如时间
                   //剩下字段你自己添加
              	   
              	   for ($x=0; $x<=70; $x++)
              	   {
                     if(!empty($data[$x]))
                     {
                     $data[$x]=str_replace("#","",$data[$x]);
                     } 
              	   }
              	   var_dump($data);
                   $basedata['accountability_department']=$data[0];
                   $basedata['accountability_number']=$data[1];
                   
                   $basedata['accountability_group']=$data[2];
                   $basedata['accountability_person']=$data[3];
                   $basedata['county']=$data[4];
                   $basedata['town']=$data[5];
                   if(!empty($data[6]))
                   {
                         $basedata['village']=$data[6];
                   }else
                   {
                   	$basedata['village']=$data[7];
                   }
                   $basedata['voltage_degree']=$data[8];

                  

                   $basedata['line_id']=$data[9];


                   
                   
                  //  line_name excel里面是中文，存储在base表中的是数字


                  $basedata['star_tower']=$data[10];
                  $basedata['end_tower']=$data[11];
                  $basedata['danger_num']=$data[12];
                  $basedata['first_check_person']=$data[13];
                  $basedata['first_check_time']=strtotime($data[14]);
                  $basedata['first_upload_time']=strtotime($data[15]);            
                  $basedata['tree_status']=$data[16];
                  $basedata['tree_type']=$data[17];
                  if($data[18]=='是')
                  {
                  $basedata['tree_danger']=1;
                  }
                  else
                  {
                    $basedata['tree_danger']=0;
                  }


                  $basedata['tree_danger_num']=(int)$data[19];
                  $basedata['tree_danger_num_unit']=$data[20];
                  $basedata['tree_danger_area']=(double)$data[21];
                  $basedata['tree_danger_area_unit']=$data[22];
                  $basedata['tree_danger_height']=(double)$data[23];
                  $basedata['average_radius']=(double)$data[24];
                  $basedata['average_height']=(double)$data[25];
                  $basedata['last_update_time']=strtotime($data[26]);
                  $basedata['last_update_person']=$data[27];
               
                  $tid=M("tree_base")->data($basedata)->add();
                  //以下是detail表
                  $detaildata['detail_tid']=$tid;
                  $detaildata['datail_check_time']=strtotime($data[28]);
                  $detaildata['datail_danger_degree']=(int)$data[29];
                  $detaildata['datail_check_change_conclusion']=$data[30];
                  $detaildata['datail_check_process_conclusion']=$data[31];
                  $detaildata['datail_check_posistion_conclusion']=$data[33];
                  $detaildata['datail_tree_type']=$data[34];
                  $detaildata['datail_tree_height']=(double)$data[35];
                  $detaildata['datail_tree_num']=(int)$data[36];
                  $detaildata['datail_tree_num_unit']=$data[37];
                  $detaildata['datail_tree_area']=(double)$data[38];
                  $detaildata['datail_tree_area_unit']=$data[39];
                  $detaildata['datail_tree_horizontal']=$data[40];
                  $detaildata['datail_tree_vertical']=$data[41];
                  $detaildata['datail_tree_grand_height']=(double)$data[42];
                  if($data[43]=='是')
                  {
                  	$detaildata['datail_tree_over']=1;
                  }else
                  {
                  	$detaildata['datail_tree_over']=0;
                  }
                  if($data[44]=='是')
                  {
                  	$detaildata['datail_final_danger']=1;
                  }else
                  {
                  	$detaildata['datail_final_danger']=0;
                  }


                  // $detaildata['datail_tree_over']=$data[43];
                  // $detaildata['datail_final_danger']=$data[44];
                  $detaildata['detail_check_method']=$data[45];                  
                  $detaildata['detail_temperature']=(int)$data[46];
                  $detaildata['detail_load']=(int)$data[47];
                   if($data[48]=='是')
                  {
                  	$detaildata['detail_retain']=1;
                  }else
                  {
                  	$detaildata['detail_retain']=0;
                  }
                  // $detaildata['detail_retain']=$data[48];
                  $detaildata['detail_address']=$data[49];  
                  $detaildata['detail_owner']=$data[50];
                  $detaildata['detail_phone']=(int)$data[51]; 
                  $detaildata['detail_plant_time']=(int)$data[52]; 
                  $detaildata['detail_compensation_condition']=(int)$data[53]; 
                  $detaildata['detail_build_deal']=$data[54];
                  $detaildata['detail_run_deal']=$data[55];
                  $detaildata['detail_notice_number']=(int)$data[56]; 
                  
                  
                  
                  
                  
                  
                  
                  

                   M("tree_detail")->data($detaildata)->add();
                   
                   


              }
         }
       
      }

       closedir($dh);
         }
      
   }
  }
   public function readTreeRecordTest()
   {

        
      $name=iconv("utf-8","GBK",'./TreeRecord/test/test.xlsx'); 
      $datalist=import_excel($name);
      foreach ($datalist as $data)
      {
      	 
          
            for ($x=0; $x<=70; $x++)
            {
                     if(!empty($data[$x]))
                     {
                     $data[$x]=str_replace("#","",$data[$x]);
                     } 
            }
             	  
      	var_dump($data);
      }
      
   }


     /* public function excel()
      {

      	$name=iconv("utf-8","GBK",'./gps/清远_本部_500_库从乙线.xls'); 

        $data=import_excel($name);


        p($data);
    }*/
   
 }