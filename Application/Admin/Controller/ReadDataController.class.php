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
                   $basedata['accountability_department']=$data[0];
                   $base_data['accountability_group']=$data[2];
                   $base_data['accountability_person']=$data[3];
                   $base_data['county']=$data[4];
                   $base_data['town']=$data[5];
                   $base_data['voltage_degree']=$data[8];
                  //  line_name excel里面是中文，存储在base表中的是数字
                  $base_data['star_tower']=$data[10];
                  $base_data['end_tower']=$data[11];
                  $base_data['danger_num']=$data[12];
                  $base_data['first_check_person']=$data[13];
                  // $base_data['first_check_time']=strtotime($data[14]);
                  // $base_data['first_upload_time']=strtotime($data[15]);            
                  $base_data['tree_status']=$data[16];
                  $base_data['tree_type']=$data[17];
                  // $base_data['tree_danger']=$data[18];
                  $base_data['tree_danger_num']=(int)$data[19];
                  $base_data['tree_danger_num_unit']=$data[20];
                  $base_data['tree_danger_area']=(double)$data[21];
                  $base_data['tree_danger_area_unit']=$data[22];
                  $base_data['tree_danger_height']=(double)$data[23];
                  $base_data['average_radius']=(double)$data[24];
                  $base_data['average_height']=(double)$data[25];
                  $base_data['last_update_time']=strtotime($data[26]);
                  $base_data['last_update_person']=$data[27];
                  var_dump($data);
                  $tid=M("tree_base")->data($basedata)->add();
                  //以下是detail表
                  $detaildata['detail_tid']=$tid;
                  $detaildata['datail_check_time']=strtotime($data[28]);
                  $detail_data['datail_danger_degree']=(int)$data[29];
                  $detail_data['datail_check_change_conclusion']=$data[30];
                  $detail_data['datail_check_process_conclusion']=$data[31];
                  $detail_data['datail_check_posistion_conclusion']=$data[33];
                  $detail_data['datail_tree_type']=$data[34];
                  $detail_data['datail_tree_height']=(double)$data[35];
                  $detail_data['datail_tree_num']=(int)$data[36];
                  $detail_data['datail_tree_num_unit']=$data[37];
                  $detail_data['datail_tree_area']=(double)$data[38];
                  $detail_data['datail_tree_area_unit']=$data[39];
                  $detail_data['datail_tree_horizontal']=$data[40];
                  $detail_data['datail_tree_vertical']=$data[41];
                  $detail_data['datail_tree_grand_height']=(double)$data[42];
                  // $detail_data['datail_tree_over']=$data[43];
                  // $detail_data['datail_final_danger']=$data[44];
                  $detail_data['detail_check_method']=$data[45];                  
                  $detail_data['detail_temperature']=(int)$data[46];
                  $detail_data['detail_load']=(int)$data[47];
                  // $detail_data['detail_retain']=$data[48];
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
      {var_dump($data);}
      
   }


     /* public function excel()
      {

      	$name=iconv("utf-8","GBK",'./gps/清远_本部_500_库从乙线.xls'); 

        $data=import_excel($name);


        p($data);
    }*/
   
 }