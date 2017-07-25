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
	public function index($id='thinkphp'){
         
           $map=array('line_id'=>$id);
           $limit=25;
                
		// $data=D('TreeBase')->getPage(new TreeBaseModel(),$map,$order,$limit);
         $model=new TreeBaseModel();

		 $count=$model
            ->where($map)
            ->count();

        $page=new_page($count,$limit);
        $list=$model
                ->field($field)
                ->where($map)
                ->alias('base')
                ->join('__DEVICE_LINE__ dl ON base.line_id=dl.id','LEFT')
                /*->order($order)*/
                ->limit($page->firstRow.','.$page->listRows)
                ->select();      
                 $data=array(
                'data'=>$list,
                'page'=>$page->show()
                 );
   

		 

		 //var_dump($data);
		 $this->assign('data',$data['data']);
		 $this->assign('pagehtml',$data['page']);
		 $this->display();
	}
	
	
	


}
