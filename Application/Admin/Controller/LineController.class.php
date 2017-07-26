<?php
namespace Admin\Controller;
use Common\Controller\TreeSysController;
use  Common\Model\TreeBaseModel;

/**
 * 后台首页控制器
 */
class LineController extends TreeSysController{
	/**
	 * 首页
	 */
	public function index(){
         

           
           $limit=20;
           $id=I('get.id');

            $map=array('line_id'=>$id);
            $voltage_degree=I('get.voltage_degree');
           
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
   



        
		 

		
         $this->assign('querydata',$map);
		 $this->assign('data',$data['data']);
		 $this->assign('pagehtml',$data['page']);
		 $this->display();
	}
	
	
	


}
