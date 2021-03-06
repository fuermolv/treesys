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

    public function fly_file() 
    {

      $device_lines = M("device_line")->select();
      $querydata['device_lines'] = $device_lines;

      $line_name = I('get.line_name');
      $start_tower = I('get.start_tower');
      $voltage_degree = I('get.voltage_degree');

      if (!empty($voltage_degree))
      {
       $map['ff_voltage_degree']=$voltage_degree;

     }


     if (!empty( $line_name))
     {
       $map['ff_line_name']=$line_name;

     }
     if (!empty($start_tower))
     {

      $start_tower_int=intval($start_tower);
      $end_tower_int=$start_tower_int+1;

      $map['ff_start_tower']=array('ELT',$start_tower_int);
      $map['ff_end_tower']=array('EGT',$end_tower_int);
    }





    $model= M("fly_file");

    $count =$model->where($map)->count();
    


    $limit = 20;
    $orderBy='ffid desc';
    $page = new_page($count, $limit);
    $list = $model->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
    $data = array('data' => $list, 'page' => $page->show());

    foreach ($data['data'] as &$d)
    {
      $path=$d['ff_file_path'];

      $path=str_replace("#","%23",$path);
      $path=str_replace("+","%2B",$path);
      $d['ff_file_path']=$path;

    }



    $this->assign('data', $data['data']);
    $this->assign('pagehtml', $data['page']);
    $this->assign('querydata', $querydata);


    $this->display();
  }


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


public function process_fly_doc($path){

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
$name=$name.".doc";



          // var_dump($name);

$line_tower_pattern="((220|110|35|500|#).*?\.)";

$ok1=preg_match_all($line_tower_pattern, $name,$matches);
          // var_dump($matchestest);





         // $line_tower_pattern="((220|110|35|500|#).*?(、|（))";
         // $addtion_year_pattern="(（.*\.)";
         // $ok=preg_match_all($addtion_year_pattern, $name,$matches);
         // if($ok)
         // {

         //     $name_year_temp=$matches[0];

         //     $name_year_temp=str_replace(".","",$name_year_temp);

         //     $name_year_temp=str_replace("（","",$name_year_temp);

         //     // $data['ff_addtion']=explode("）",$name_year_temp[0])[0];
         //     // $data['ff_year']=explode("）",$name_year_temp[0])[1];
         //     $data['ff_upload_time']=NOW_TIME;

         // }else{
         //     return 0
         // }  

         // $ok1=preg_match_all($line_tower_pattern, $name,$matches1);


if($ok1)
{

 $line_tower_data=$matches[0];

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
   $lt_data=str_replace(".","",$lt_data);
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

   $data['ff_voltage_degree']=$voltage;
   $data['ff_line_name']=$line_name;

   $data['ff_start_tower']=explode("-",$tower_data)[0];
   $data['ff_end_tower']=explode("-",$tower_data)[1];
   $data['ff_upload_time']=NOW_TIME;
   $data['ff_file_path']=$path;


    //上传时更新一下base的数据
             $lmap['device_name']=$data['ff_line_name'];
      
             $line_data=M("device_line")->where($lmap)->find();

             if (!empty($line_data))
             {
                 $base_map['line_id']=$line_data['did'];
                 $base_map['star_tower']=array('EGT',$data['ff_start_tower']);
                 $base_map['end_tower']=array('ELT',$data['ff_end_tower']);
                 $base_data['tree_have_report']=1;



                 $base_model= M("tree_base");
                 $base_model->where($base_map)->save($base_data);
           

             }




   M("fly_file")->data($data)->add();






 }
}
else{
 return 1;
}
return 0;

}



public function fly_upload()
{

  if(IS_POST)
  {


    $filelist = I('post.file');
    $extend = I('post.extend');


    foreach ($filelist as $file) 
    {


      $path=$file;



        //导入的是csv文件
      if(strpos($path,'csv') !=false)
      {


        $flag=$this->ReadFlyData($path);
        if ($flag==1){
         break;
       }


     }
     elseif(strpos($path,'doc') !=false)
     {
      $flag=$this-> process_fly_doc($path);


    }else{
     $this->error('只能导入doc,docx,csv文件','',5);

   }

   if($flag==1){
     $this->error('导入失败','',5);
   }else{
    $this->success('导入成功','',5);
  }





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
    if($dd=='一直无树竹')
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

     
    $st=explode("+",$flydata['star_tower']);
    $base_data['star_tower']=$st[0];
    $base_data['start_tower_addtion']=$st[1];

  }else
  {

    $base_data['star_tower']=$flydata['star_tower'];
  }

  if(strpos($flydata['end_tower'],"+") !== false)
  {
  	
   $st=explode("+",$flydata['end_tower']);
   $base_data['end_tower']=$st[0];
   $base_data['end_tower_addtion']=$st[1];
 }
 else
 {
  $base_data['end_tower']=$flydata['end_tower'];
}




              //查班组数据
$gmap['tower_serial']=$base_data['star_tower'];
if (!empty($base_data['start_tower_addtion']))
{
  $gmap['tower_addtion']=$base_data['start_tower_addtion'];
}
$gmap['line_id']=$line_id;
$gdata=M("tower_group")->where($gmap)->find();
if (!empty($gdata))
{
  $base_data['accountability_group']=$gdata['group_name'];
  $base_data['county']=$gdata['county'];
  $base_data['town']=$gdata['town'];
}






$base_data['line_id']=$line_id;
$base_data['tree_md5']=$md5;
$base_data['first_check_time']=$flydata['fly_time'];;



$base_data['tree_property']=$flydata['fly_tree_type'];
$base_data['tree_park_distance']=$flydata['fly_p_distance'];
$base_data['tree_longitude']=$flydata['fly_longitude'];
$base_data['tree_latitude']=$flydata['fly_latitude'];
$base_data['tree_small_distance']=$flydata['fly_tower_distance'];
$base_data['danger_num']=explode(".",$base_data['tree_small_distance'])[0];


        //查请赔协议和飞行报告 wtf
        $start_tower_int=intval($base_data['start_tower']);
        $end_tower_int=$start_tower_int+1;

        $aggmap['ag_start_tower']=array('ELT',$start_tower_int);
        $aggmap['ag_end_tower']=array('EGT',$end_tower_int);
        $aggmap['ag_line_name']=$flydata['fly_line_name'];

        $aggnum=M("agreement")->where($aggmap)->count();

        if ($aggnum>0){
	       $base_data['tree_have_agg']=1;
         }


        $ffmap['ff_start_tower']=array('ELT',$start_tower_int);
        $ffmap['ff_end_tower']=array('EGT',$end_tower_int);
        $ffmap['ff_line_name']=$flydata['fly_line_name'];
        $ffnum=M("fly_file")->where($ffmap)->count();
        if ($ffnum>0){
	       $base_data['tree_have_report']=1;
         }



$base=M("tree_base");
$tid=$base->data($base_data)->add(); 


}else{
 $tid=$found['0']['tid'];
}




$map['detail_tid']=$tid;
$map['datail_uptodate']=1;

$lastest_data= M("tree_detail")->where($map)->find();


$data['datail_uptodate']=0;
M("tree_detail")->where($map)->data($data)->save();



   


// if (!empty($lastest_data['base_danger_degree']))
// {
//   if ($lastest_data['base_danger_degree']!=$flydata['fly_danger_degree'])
//   {
//     $update_base_data['base_danger_degree_change']=$lastest_data['base_danger_degree']."变".$flydata['fly_danger_degree'];
//   }
//   else{
//    $update_base_data['base_danger_degree_change']="维持不变";
//  }

// }

// $update_base_data['base_danger_degree_num']=$flydata['fly_danger_serial'];
// $update_base_data['base_danger_degree']=$flydata['fly_danger_degree'];
// M("tree_base")->where($basemap)->save($update_base_data);










$detail_data['detail_tid']=$tid;
$detail_data['datail_danger_degree']=$flydata['fly_danger_degree'];
$detail_data['datail_danger_degree_num']=$flydata['fly_danger_serial'];
$detail_data['datail_tree_horizontal']=$flydata['fly_horizontal_distance'];
$detail_data['datail_tree_vertical']=$flydata['fly_vertical_distance'];
$detail_data['datail_mix_net_distance']=$flydata['fly_air_distance'];
$detail_data['detail_fly_height']=$flydata['fly_height'];
$detail_data['detail_last_time']=$flydata['fly_time'];
$detail_data['detail_safe_distance']=$flydata['fly_safe_distance'];
$detail_data['detail_source']="机巡报告";
$detail_data['datail_update_time']=NOW_TIME;
$detail_data['datail_update_person']=$_SESSION['user']['true_name'];

if (strpos($detail_data['datail_tree_vertical'],"-") !== false){
    $detail_data['datail_tree_over']=1;
}else{
    $detail_data['datail_tree_over']=0;
}

if (!empty($found['0']['tree_height'])){



  $tree_h=(double)$found['0']['tree_height'];
  $tree_hd=(double)$detail_data['datail_tree_horizontal'];
  $tree_vd=(double)$detail_data['datail_tree_vertical'];


  var_dump($tree_h);
  var_dump($tree_hd);
  var_dump($tree_vd);




  
  $result=sqrt(pow($tree_h+$tree_vd,2)+pow($tree_hd,2))-$tree_h;


  $result = sprintf("%.2f",$result);
 
    


 
    $detail_data['datail_mix_lodging_distance']=$result;

}












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