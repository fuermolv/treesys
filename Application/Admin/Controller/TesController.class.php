<?php
namespace Admin\Controller;
use Common\Controller\HomeBaseController;

/**
 * 后台首页控制器
 */
class TesController extends HomeBaseController 
{
    /**
     * 首页
     */
    public function _initialize()
    {
      parent::_initialize();
    }

    public function test()
    {
      echo "string";
    }
   
  

   
    
     
 }