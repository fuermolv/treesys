<?php
namespace Admin\Controller;

use Common\Controller\AdminBaseController;

class TowerController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() 
    {
        
        $device_lines = M("device_line")->select();
        $querydata['device_lines'] = $device_lines;

        $line_name = I('get.line_name');
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

    public function edit()
    {

    	 if(IS_GET)
    	 {
              $line_name = I('get.line_name');
              $tower_id=I('get.tower_id');
              $map['tower_id']=$tower_id;
              $data =M("device_tower")->where($map)->select();
              $this->assign('data', $data[0]);
              $this->assign('line_name', $line_name);
              $this->display();
              // var_dump( $line_name);

    	 }
    	 else
    	 {
               $ar=$_POST;
               $user_id=$_SESSION['user']['id'];
               $map['id']=$user_id;
               $user=M("users")->where($map)->select();
               $ar=$_POST;
               $map=null;
               $map['tower_id']=$ar['tower_id'];
               unset($ar['tower_id']); 
               
               $ar['tower_update_person']=$user[0]['true_name'];
               $ar['tower_update_time']=NOW_TIME;

               $result = M("device_tower")->data($ar)->where($map)->save();


             //  var_dump($ar);
               if($result)
               {
               	$this->ajaxReturn("success");
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
             $ar=$_POST;
             $tower_type=$ar['tower_type'];
             $user_id=$_SESSION['user']['id'];
             $map['id']=$user_id;
             $user=M("users")->where($map)->select();

             $data['tower_update_person']=$user[0]['true_name'];
             $data['tower_update_time']=NOW_TIME;
             $data['tower_longitude_d']=$ar['tower_longitude_d'];
             $data['tower_longitude_m']=$ar['tower_longitude_m'];
             $data['tower_longitude_s']=$ar['tower_longitude_s'];
             $data['tower_latitude_d']=$ar['tower_latitude_d'];
             $data['tower_latitude_m']=$ar['tower_latitude_m'];
             $data['tower_latitude_s']=$ar['tower_latitude_s'];
             $data['tower_remark']=$ar['tower_remark'];


             //第一个
          
             	$data['tower_number_old']=$ar['tower_number_old1'];
             	$data['tower_line_name']=$ar['tower_line_name1'];
             	$data['tower_line_degree']=$ar['tower_line_degree1'];
             	$serial1=$ar['tower_serial1'];
             	$data['tower_serial']=$serial1+1;
             	$str=$data['tower_longitude_d'].$data['tower_longitude_m'].$data['tower_longitude_s'].$data['tower_longitude_s'].$data['tower_latitude_d'].$data['tower_latitude_m'].$data['tower_latitude_s'];
             	
             	$data['tower_key']=md5($str);
                
             	$map=null;
             	$map['tower_serial']  = array('gt',$serial1);
             	$map['tower_line_name']  =$ar['tower_line_name1'];
            

             	M("device_tower")->where($map)->setInc('tower_serial','1');
             	$model=M("device_tower");
             	$model->data($data)->add();
             



            if($tower_type>1)
            {
            	//第二个
            }
            if($tower_type>2)
            {
            	//第三个
            }
            if($tower_type>3)
            {
            	//第四个
            }


             
            $this->success("成功增加杆塔",U("Admin/Tower/index"));





            




        

    	 }
    }
    
   
}