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
         
           

            //$device_lines = session('device_li    
           $orderBy=I('get.orderBy');
           $dead_line_time_begin=I('get.dead_line_time_begin');
           $dead_line_time_end=I('get.dead_line_time_end');
           $line_id=I('get.line_id');
           $county=I('get.county');
           $town=I('get.town');
           $voltage_degree=I('get.voltage_degree');
           $village=I('get.village');
           $limit=20;
           $group_id=I('get.group_id');


           //确定班组线路
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

           $map=null;

           //选出县镇乡
           if(!empty($county))
           { 
             $map['fid']=$county;
             $map['sid']=0;
             $querydata['towns']=M("areas")
                                ->where($map)
                                ->select();

           }
           $map=null;
           if(!empty($town))
           { 
             
             $map['sid']=$town;
             $querydata['villages']=M("areas")
                                ->where($map)
                                ->select();
           }
           

         
           $map=null;
         
            if(!empty($line_id))
           {
              $map['line_id']=$line_id;
            
           }else
           {
               $lines=array(-1);
        
             foreach($device_lines as $d)
            { 
           
              array_push($lines,$d['did']);      
            } 

            
            $map['line_id']=array('in',$lines);
             
           }
          
           if(!empty($town))
           {
            
            $map['town']=$town;
            
           }
           if(!empty($county))
           {
            
            $map['county']=$county;
            
           }
           if(!empty($village))
           {
            
            $map['village']=$village;
            
           }
           if(!empty($voltage_degree))
           {
            

            $map['voltage_degree']=$voltage_degree;
            
           }
           if(empty($orderBy))
           {
            

            $orderBy='tid desc';
            
           }
           if(!empty($dead_line_time_begin))
           {
            

             $map['dead_line_time']=array('egt',strtotime($dead_line_time_begin));
            
           }
           if(!empty($dead_line_time_end))
           {
            

            $map['dead_line_time']=array('elt',strtotime($dead_line_time_end));
            
           }



          
                    
		// $data=D('TreeBase')->getPage(new TreeBaseModel(),$map,$order,$limit);
         $model=new TreeBaseModel();

		 $count=$model
            ->where($map)
            ->alias('base')
            ->join('__DEVICE_LINE__ dl ON base.line_id=dl.did','LEFT')
            ->count();
        $map['datail_uptodate']=1;
        $page=new_page($count,$limit);
        $list=$model
                /*->field('detail.tid as tree_id,base.*,dl.*')*/
                ->where($map)
                ->alias('base')
                ->join('__DEVICE_LINE__ dl ON base.line_id=dl.did','LEFT')
                ->join('treesys_tree_detail detail ON base.tid=detail.detail_tid','LEFT')
                ->order($orderBy)
                ->limit($page->firstRow.','.$page->listRows)
                ->select();      
                 $data=array(
                 'data'=>$list,
                 'page'=>$page->show()
                 );
   
  /* var_dump($data['data']);*/

     $this->assign('querydata',$querydata);
		 $this->assign('data',$data['data']);
		 $this->assign('pagehtml',$data['page']);
		 $this->display();
	}

    public function delete()
    {
        $tid=I('get.tid');
        $map['tid']=$tid;
        M("tree_base")->where(array($map))->delete();

    }
	
	
	


}
