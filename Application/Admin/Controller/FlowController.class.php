<?php
namespace Admin\Controller;

use Common\Controller\AdminBaseController;

class FlowController extends AdminBaseController {
    /**
     * 首页
     */
    public function index() 
    {
        
       


        $this->display();
    }

      public function edit() 
    {
        
       $orderBy='flow_serial';
       $data =M("flow")->order($orderBy)->select();
       $users=M("users")->select();
      

       foreach ($data as &$f) 
       {
          $name_list='';
          
          foreach ($users as $u)
          {
             
            
            if(strpos($f['flow_user'],$u['id']) !== false)
            {
              $name_list=$name_list.','.$u['true_name'];
            }

            

            
          }
          
          $f['flow_user']=$name_list;

       }
      
        $this->assign('data', $data);

        $this->display();
         
    }

    

    
    
    
   
}