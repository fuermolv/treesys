<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use  Common\Model\TreeBaseModel;
use Common\Controller\AdminBaseController;

/**
 * 后台首页控制器
 */
class LineController extends TreeSysController{
	/**
	 * 首页
	 */
	public function index(){
         
           

            //$device_lines = session('device_lines');

           
           $limit=20;

           $group_id=I('get.group_id');
           $map['id']=$group_id;

           $lienes=M("auth_rule")
                   ->where($map)
                   ->select();              
           $map=null;
      
           $map['did']=array('in',$lienes[0]['group_device']);

           $device_lines=M("device_line")
                   ->where($map)
                   ->select(); 
           $querydata['device_lines']=$device_lines;
           







           $line_id=I('get.line_id');
           $voltage_degree=I('get.voltage_degree');

           $map=null;
            if(!empty($line_id))
           {
              $map['line_id']=$line_id;
            
           }
           else
           {
             $map['line_id']=array('in',$lienes[0]['group_device']);
           }
           

           if(!empty($voltage_degree))
           {
            
            $map['voltage_degree']=$voltage_degree;
            
           }
          
                    
		// $data=D('TreeBase')->getPage(new TreeBaseModel(),$map,$order,$limit);
         $model=new TreeBaseModel();

		 $count=$model
            ->where($map)
            ->alias('base')
            ->join('__DEVICE_LINE__ dl ON base.line_id=dl.did','LEFT')
            ->count();

        $page=new_page($count,$limit);
        $list=$model
                ->field($field)
                ->where($map)
                ->alias('base')
                ->join('__DEVICE_LINE__ dl ON base.line_id=dl.did','LEFT')
                /*->order($order)*/
                ->limit($page->firstRow.','.$page->listRows)
                ->select();      
                 $data=array(
                'data'=>$list,
                'page'=>$page->show()
                 );
   



        
		 

		
        
         $this->assign('querydata',$querydata);
		 $this->assign('data',$data['data']);
		 $this->assign('pagehtml',$data['page']);
		 $this->display();
	}
	
	
	


}
