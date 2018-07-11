<?php
namespace Admin\Controller;

use Common\Controller\AdminBaseController;

class TowerController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() 
    {
        
        $lmap['voltage_degree']=array('EGT',35);
        $device_lines = M("device_line")->where($lmap)->select();
        $querydata['device_lines'] = $device_lines;

        $gmap['group_status'] = 1;
        $groups = M("group")->where($gmap)->select();
        $querydata['device_groups'] = $groups;


        $line_name = I('get.line_name');
        $accountability_group = I('get.accountability_group');

        if(!empty($line_name))
        {

             $map['line_name']=$line_name;
            
        }
        if (!empty($accountability_group)) {
            $map['group_name'] = $accountability_group;
            
        }




         $orderBy='tgid';
             $count = M("tower_group")->alias('tower')->join('__DEVICE_LINE__ dl ON tower.line_id=dl.did', 'LEFT')->where($map)->count();
             $limit = 20;
             $page = new_page($count, $limit);
             $list =M("tower_group")->alias('tower')->join('__DEVICE_LINE__ dl ON tower.line_id=dl.did', 'LEFT')->where($map)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();


        


        	 $data = array('data' => $list, 'page' => $page->show());

          foreach ($data['data'] as &$d)
        {   
        	
            if($d['tower_addtion']!='0')
           {   
              $d['tower_serial']=$d['tower_serial']."+".$d['tower_addtion'];
           }
       }

        	 $this->assign('data', $data['data']);
        	 $this->assign('pagehtml', $data['page']);
        	 $this->assign('line_name', $line_name);


        $this->assign('querydata', $querydata);


        $this->display();
    }

    public function edit()
    {

    	 if(IS_GET)
    	 {
              
              $tgid=I('get.tgid');
              $map['tgid']=$tgid;
              $data =M("tower_group")->alias('tower')->join('__DEVICE_LINE__ dl ON tower.line_id=dl.did', 'LEFT')->where($map)->select();
              $this->assign('data', $data[0]);
              $this->assign('line_name', $line_name);
              $this->display();
              // var_dump( $line_name);

    	 }
    	 else
    	 {
               $ar=$_POST;

               if(!empty($ar['longitude']) or !empty($ar['latitude']))
               {
               	   if (!empty($ar['line_name']) or !empty($ar['tower_name']))
               	   {
               	   	   	$this->ERROR("不能同时修改线路名称信息及GPS信息");
               	   }
               	   $saveData['longitude']=$ar['longitude'];
               	   $saveData['latitude']=$ar['latitude'];
               	   $saveData['tower_gps_md5']=md5($saveData['longitude']."-".$saveData['latitude']);
               	   //更新树障的MD5??




               }

               if(!empty($ar['line_name']) or !empty($ar['tower_name']))
               {
               	   if (!empty($ar['longitude']) or !empty($ar['latitude']))
               	   {
               	   	   	$this->ERROR("不能同时修改线路名称信息及GPS信息");
               	   }

               	   
               }



               $user_id=$_SESSION['user']['id'];
               $map['id']=$user_id;
               $user=M("users")->where($map)->select();
               $ar=$_POST;





               $map=null;
               $map['tgid']=$ar['tgid'];
               $saveData['tower_update_person']=$user[0]['true_name'];
               $saveData['tower_update_time']=NOW_TIME;
               // $result = M("tower_group")->data($saveData)->where($map)->save();
               if($result)
               {
               	 $this->SUCCESS("成功");
               }
    	 }
    }
    public function delete()
    {
    	$tower_id=I('post.tower_id');
    	$tower_serial=I('post.tower_serial');
    	$map['tower_id'] = $tower_id;
    	M("device_tower")->where($map)->delete();
    	$map=null;

    	$map['tower_serial']  = array('gt',$tower_serial);
    	

    	M("device_tower")->where($map)->setDec('tower_serial','1');

        $this->ajaxReturn("success");
    }

     public function add_line()
    {
        $data=I('post.');
       
       
        $result=M("device_line")->add($data);
      
        if ($result) {
            $this->success('修改成功',U('Admin/Tower/index'));
        }else{
            $this->error('修改失败');
        }
    }
    public function add()
    {
    	 if(IS_GET)
    	 {
    	 	 $device_lines = M("device_line")->select();
             $querydata['device_lines'] = $device_lines;
             $this->assign('querydata', $querydata);
    	 	 $this->display();
    	 }
    	 else
    	 {
             // $ar=$_POST;
             // $tower_type=$ar['tower_type'];
             // $user_id=$_SESSION['user']['id'];
             // $map['id']=$user_id;
             // $user=M("users")->where($map)->select();

             // $data['tower_update_person']=$user[0]['true_name'];
             // $data['tower_update_time']=NOW_TIME;
             // $data['tower_longitude_d']=$ar['tower_longitude_d'];
             // $data['tower_longitude_m']=$ar['tower_longitude_m'];
             // $data['tower_longitude_s']=$ar['tower_longitude_s'];
             // $data['tower_latitude_d']=$ar['tower_latitude_d'];
             // $data['tower_latitude_m']=$ar['tower_latitude_m'];
             // $data['tower_latitude_s']=$ar['tower_latitude_s'];
             // $data['tower_remark']=$ar['tower_remark'];


            
          
             // 	$data['tower_number_old']=$ar['tower_number_old1'];
             // 	$data['tower_line_name']=$ar['tower_line_name1'];
             // 	$data['tower_line_degree']=$ar['tower_line_degree1'];
             // 	$serial1=$ar['tower_serial1'];
             // 	$data['tower_serial']=$serial1+1;
             // 	$str=$data['tower_longitude_d'].$data['tower_longitude_m'].$data['tower_longitude_s'].$data['tower_longitude_s'].$data['tower_latitude_d'].$data['tower_latitude_m'].$data['tower_latitude_s'];
             	
             // 	$data['tower_key']=md5($str);
                
             // 	$map=null;
             // 	$map['tower_serial']  = array('gt',$serial1);
             // 	$map['tower_line_name']  =$ar['tower_line_name1'];
             // 	M("device_tower")->where($map)->setInc('tower_serial','1');
             // 	$model=M("device_tower");
             // 	$model->data($data)->add();
             





            $this->success("成功增加杆塔",U("Admin/Tower/index"));




 
        

    	 }
    }


     public function export_group()
    {
  


         $model= M("tower_group");
    
        $map['group_name']=array('exp','is not null');
        $orderBy="voltage_degree desc,line_name,tower_serial,tower_addtion";
        $checkdata=$model->where($map)->order($orderBy)->select();
        $data = array();
       foreach ($checkdata as $cd){
          $temp_data=array();
          array_push($temp_data,$cd['tgid']);
          array_push($temp_data,$cd['voltage_degree']);
          array_push($temp_data,$cd['line_name']);
          array_push($temp_data,$cd['tower_serial']);
          array_push($temp_data,$cd['tower_addtion']);
          array_push($temp_data,$cd['tower_name']);
          array_push($temp_data,$cd['group_name']);
          array_push($data,$temp_data);
       }
       

        
        $header="编号,电压等级,线路名称,线内编号,额外编号,杆塔名称,所属班组";
        create_csv($data,$header,"杆塔班组权限模板.csv");
      
        
    }


 




    public function import_group(){

        if(IS_POST)
      {

      $filelist = I('post.file');
      $extend = I('post.extend');
      foreach ($filelist as $file) 
      {
          $data=null;
          $path=$file;
          $flag=$this->update_group_data($path);
          if ($flag==1){
            break;
          }
  

      }
      if($flag==1){
       $this->error('导入失败','',5);
      }else{
       // $this->success('导入成功','',5);
      }

     

      }else
      {

          $this->display();
      }
    }

      public function update_group_data($path){
       $path=".".$path;
       $contents_before = file_get_contents($path);  
       $contents_after = iconv('GBK','UTF-8',$contents_before);  
       file_put_contents($path, $contents_after); 
       $datalist=import_excel($path,"G");
       $flag=0;
       $model=M("tower_group");
       $model->startTrans();
       $x=0;


       foreach ($datalist as $data){

       	if($x==0)
        {
          $x++;
          continue;
        }
     

       	$map['tgid']=$data[0];
       	$tower_data['group_name']=$data[6];
       


        try {

        	  $result=$model->where($map)->save($tower_data);
        	
        } catch (\Think\Exception $e) {
        	 $flag=1;
             break;
        	
        }
        if(!$result)
        {
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
        ajax_upload('/Public/Upload/tower');
    }
    
   
}