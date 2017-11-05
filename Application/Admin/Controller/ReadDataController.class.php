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
                   $tid=M("tree_base")->data($basedata)->add();

                   //以下是detail表
                   $detaildata['detail_tid']=$tid;
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
      $data=import_excel($name);
      var_dump($data);
   }


     /* public function excel()
      {

      	$name=iconv("utf-8","GBK",'./gps/清远_本部_500_库从乙线.xls'); 

        $data=import_excel($name);


        p($data);
    }*/
   
 }