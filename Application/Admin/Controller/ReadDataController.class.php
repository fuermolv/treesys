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
    public function convTime($data)
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

                  
              	   
              	   for ($x=0; $x<=70; $x++)
              	   {
                     if(!empty($data[$x]))
                     {
                      $data[$x]=str_replace("#","",$data[$x]);
                      $data[$x]=str_replace(array("\r\n", "\r", "\n"), "", $data[$x]);   
                     } 
              	   }
              	   $basedata['tree_remark']=iconv("GBK","utf-8",$file);
              	   
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
                  $basedata['first_check_time']=convTime($data[14]);
                  $basedata['first_upload_time']=convTime($data[15]);            
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

              
                  $basedata['tree_danger_num']=$data[19];
                  $basedata['tree_danger_num_unit']=$data[20];
                  $basedata['tree_danger_area']=$data[21];
                  $basedata['tree_danger_area_unit']=$data[22];
                  $basedata['tree_danger_height']=$data[23];
                  $basedata['average_radius']=$data[24];
                  $basedata['average_height']=$data[25];
                  $basedata['tree_property']=$data[29];
                  $basedata['new_plant']=$data[30];
                  $basedata['defect_type']=$data[31];
                  $basedata['survival']=$data[32];
                  try
                  {
                     $tid=M("tree_base_copy")->data($basedata)->add(); 
                  }
                  catch(\Think\Exception $e)
                  {
                      continue;
                  }

                   
               

                 
                   
                  //以下是detail表
                  // $detaildata['detail_tid']=$tid;

                  // $detaildata['detail_last_time']=convTime($data[26]);
                  // $detaildata['datail_check_person']=$data[27];
                  // $detaildata['datail_check_time']=convTime($data[28]);
                  // $detaildata['datail_danger_degree']=$data[33];
                  // $detaildata['datail_check_change_conclusion']=$data[34];
                  // $detaildata['datail_check_process_conclusion']=$data[35];
                  // $detaildata['datail_check_posistion_conclusion']=$data[36];
                  // $detaildata['datail_tree_type']=$data[37];
                  // $detaildata['datail_tree_num']=$data[38];
                  // $detaildata['datail_tree_num_unit']=$data[39];
                  // $detaildata['datail_tree_area']=$data[40];
                  // $detaildata['datail_tree_area_unit']=$data[41];
                  // $detaildata['datail_tree_height']=$data[42];                  
                  // $detaildata['datail_tree_horizontal']=$data[43];
                  // $detaildata['datail_tree_vertical']=$data[44];
                  // $detaildata['datail_tree_grand_height']=$data[45];
                  // $detaildata['datail_mix_net_distance']=$data[46];
                  // $detaildata['datail_mix_lodging_distance']=$data[47];
                  // $detaildata['datail_lodging_degree']=$data[48];

                  // if($data[49]=='是')
                  // {
                  // 	$detaildata['datail_tree_over']=1;
                  // }else
                  // {
                  // 	$detaildata['datail_tree_over']=0;
                  // }
                  // if($data[50]=='能构成一般')
                  // {
                  // 	$detaildata['datail_final_danger']=1;
                  // }else
                  // {
                  // 	$detaildata['datail_final_danger']=0;
                  // }


                  // // $detaildata['datail_tree_over']=$data[43];
                  // // $detaildata['datail_final_danger']=$data[44];
                  // $detaildata['detail_check_method']=$data[57];                  
                  // $detaildata['detail_temperature']=$data[58];
                  // $detaildata['detail_load']=$data[59];
                  //  if($data[60]=='是')
                  // {
                  // 	$detaildata['detail_retain']=1;
                  // }else
                  // {
                  // 	$detaildata['detail_retain']=0;
                  // }
                  // // $detaildata['detail_retain']=$data[48];
                  // $detaildata['detail_address']=$data[61];  
                  // $detaildata['detail_owner']=$data[62];
                  // $detaildata['detail_phone']=$data[63]; 
                  // $detaildata['detail_plant_time']=$data[64]; 
                  // $detaildata['detail_compensation_condition']=$data[65]; 
                  // $detaildata['detail_build_deal']=$data[66];
                  // $detaildata['detail_run_deal']=$data[67];
                  // $detaildata['detail_notice_number']=$data[68]; 

                  //  try
                  // {
                  //      M("tree_detail")->data($detaildata)->add();
                  // }
                  // catch(\Think\Exception $e)
                  // {
                  //     continue;
                  // }
                 


                


                  //  $processdata['record_tree_deal_plan_time']=$data[51]; 
                  //  $processdata['record_tree_deal_time']=$data[52]; 
                  //  $processdata['record_tree_degree_change']=$data[53]; 
                  //  $processdata['record_stump_deal_plan_time']=$data[54]; 
                  //  $processdata['record_stump_deal_time']=$data[55]; 
                  //  $processdata['record_stump_degree_change']=$data[56];  



              }
              var_dump('finish');
         }
       
      }

       closedir($dh);
         }
      
   }
  }





   public function readTreeRecordTest()
   {

        
      $name=iconv("utf-8","GBK",'./TreeRecord/data/test.xlsx'); 
      $datalist=import_excel($name);
      var_dump($datalist);
      // foreach ($datalist as $data)
      // {
      	 
          
      //       for ($x=0; $x<=70; $x++)
      //       {
      //                if(!empty($data[$x]))
      //                {
      //                 $data[$x]=str_replace("#","",$data[$x]);
      //                 $data[$x]=str_replace(array("\r\n", "\r", "\n"), "", $data[$x]);   
      //                } 
      //       }

      //       //$hello = explode('-',$data[3]); 
             	  
      // 	var_dump($data);
      // }
      
   }

   public function readProcessRecord()
   {

         $dir = "./TreeRecord/process";
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

                
                   
              	   for ($x=0; $x<=70; $x++)
              	   {
                     if(!empty($data[$x]))
                     {
                     $data[$x]=str_replace("#","",$data[$x]);
                     $data[$x]=str_replace(array("\r\n", "\r", "\n"), "", $data[$x]);   
                     } 
              	   }
                     
                // 测试数据中没有计划清理时间
                // $recorddata['record_plan_clean_time']=convTime($data[9]);

              	 $recorddata['record_remark_temp']=iconv("GBK","utf-8",$file);

              	$recorddata['record_line_name_temp']=$data[2];

              	 $tower = explode('-',$data[3]); 
              	 $recorddata['record_start_tower_temp']=$tower[0];
              	 $recorddata['record_end_tower_temp']=$tower[1];
              	
                $recorddata['record_task_time']=convTime($data[9]);
                if($data[10]=='是')
                {
                  $recorddata['record_is_additional']=1;
                }else
                {
                  $recorddata['record_is_additional']=0;
                }
                $recorddata['record_department']=$data[11];
                $recorddata['record_person']=$data[12];
                $recorddata['record_person_phone']=$data[13];
                $recorddata['record_accountability_person']=$data[14];
                $recorddata['record_verify_person']=$data[15];
                $recorddata['record_verify_person_phone']=$data[16];

                $recorddata['record_plan_verify_time']=convTime($data[17]);
                $recorddata['record_verify_time']=convTime($data[18]);
                $recorddata['record_plan_consult_time']=$data[19];
                $recorddata['record_consult_detail']=$data[20];
                $recorddata['record_verify_situ']=$data[21];
                $recorddata['record_verify_consult_situ']=$data[22];
                $recorddata['record_verify_consult_matter']=$data[23];
                $recorddata['record_process_situ']=$data[24];
                
                if($data[25]=='是')
                {
                  $recorddata['record_need_apper']=1;
                }else
                {
                  $recorddata['record_need_apper']=0;
                }
                $recorddata['record_apper_level']=$data[26];
                $recorddata['record_accept_time']=convTime($data[27]);
                $recorddata['record_accept_conclusion1']=$data[28];
                $recorddata['record_accept_conclusion2']=$data[29];
                $recorddata['record_confirm_time']=$data[30];
                $recorddata['record_confirm_tag']=$data[31];
                $recorddata['record_remark']=$data[32]; 
                $tid=M("tree_process_record")->data($recorddata)->add();
                   
                   
                  //  line_name excel里面是中文，存储在base表中的是数字
               
                  
               
                //  M("tree_process_record")->data($data)->add();
                
                   


              }
         }
       
      }

       closedir($dh);
         }
      
   }
  }

   
    
     
 }