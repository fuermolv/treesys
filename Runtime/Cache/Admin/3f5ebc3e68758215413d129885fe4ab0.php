<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
 <head>
  <link rel="stylesheet" href="/ts/Public/statics/webuploader-0.1.5/xb-webuploader.css">
<script src="/ts/Public/statics/js/jquery-1.10.2.min.js"></script>
  <meta charset="utf-8" />
  <title>首页</title>
  
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/ts/Public/statics/aceadmin/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/ts/Public/statics/aceadmin/css/font-awesome.min.css" />
  <link rel="stylesheet" href="/ts/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
  <!--[if IE 7]><link rel="stylesheet" href="/ts/Public/statics/aceadmin/css/font-awesome-ie7.min.css"/><![endif]-->
  <link rel="stylesheet" href="/ts/Public/statics/aceadmin/css/ace.min.css" />
  <!--[if lte IE 8]><link rel="stylesheet" href="/ts/Public/statics/aceadmin/css/ace-ie.min.css"/><![endif]-->
  <!--[if lt IE 9]><script src="/ts/Public/statics/aceadmin/js/html5shiv.js"></script><script src="/ts/Public/statics/aceadmin/js/respond.min.js"></script><![endif]-->
  <link rel="stylesheet" href="/ts/tpl/Public/css/base.css" />
  <style type="text/css">
        #sidebar .nav-list{
            overflow-y: auto;
        }
        .b-nav-li{
            padding: 5px 0;
        }
    </style>
 </head>
 <body>
  
  <div class="navbar navbar-default" id="navbar">
   <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>
   <div class="navbar-container" id="navbar-container">
    <div class="navbar-header pull-left">
     <a href="/ts/index.php/Admin/Index/index" class="navbar-brand"><small><i class="icon-th"></i> 树障分析管理</small></a>
    </div>
    <div class="navbar-header pull-right" role="navigation">
     <ul class="nav ace-nav">
      <li class="light-blue"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"><img class="nav-user-photo" src="/ts/Public/statics/aceadmin/avatars/avatar2.png" alt="Jason's Photo" /> <span class="user-info"><small>欢迎,</small> <?php echo ($_SESSION['user']['true_name']); ?></span><i class="icon-caret-down"></i></a>
       <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
        <li class="divider"></li>
        <li><a href="<?php echo U('Home/Index/logout');?>"><i class="icon-off"></i> 退出</a></li>
       </ul></li>
     </ul>
    </div>
   </div>
  </div>
  <div class="main-container" id="main-container">
   <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>
   <div class="main-container-inner">
    <a class="menu-toggler" id="menu-toggler" href="#"><span class="menu-text"></span></a>
    <div class="sidebar" id="sidebar">
     <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>
     <!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
      <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large"> 
       <button class="btn btn-success"><i class="icon-signal"></i></button> 
       <button class="btn btn-info"><i class="icon-pencil"></i></button> 
       <button class="btn btn-warning"><i class="icon-group"></i></button> 
       <button class="btn btn-danger"><i class="icon-cogs"></i></button>
      </div>
      <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
       <span class="btn btn-success"></span>
       <span class="btn btn-info"></span>
       <span class="btn btn-warning"></span>
       <span class="btn btn-danger"></span>
      </div>
     </div> -->
     <!-- #sidebar-shortcuts -->
     <ul class="nav nav-list" >
      <?php if(is_array($nav_data)): foreach($nav_data as $key=>$v): if(empty($v['_data'])): ?><li class="b-nav-li"><a href="<?php echo U($v['mca']);?>" ><i class="fa fa-<?php echo ($v['ico']); ?> icon-test"></i> <span class="menu-text"><?php echo ($v['name']); ?></span></a></li>
    <?php else: ?>

        <li class="b-has-child"><a href="#" class="dropdown-toggle b-nav-parent"><i class="fa fa-<?php echo ($v['ico']); ?> icon-test"></i> <span class="menu-text"><?php echo ($v['name']); ?></span><b class="arrow icon-angle-down"></b></a>
         <ul class="submenu" id="<?php echo ($v['name']); ?>">
        <!--  style="display: block;" -->
        <?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><!-- <li class="b-nav-li"><a href="<?php echo U($n['mca']);?>" ><i class="icon-double-angle-right"></i> <?php echo ($n['name']); ?></a> -->


          <li class="b-has-child"><a href="<?php echo U($n['mca']);?>" class="dropdown-toggle b-nav-parent"><i class="fa fa-<?php echo ($v['ico']); ?> icon-test"></i> 
          <span class="menu-text"><?php echo ($n['name']); ?></span><b class="arrow icon-angle-down"></b>
          </a>
         <!-- <ul class="submenu" id="<?php echo ($n['name']); ?>">
        <?php if(is_array($n['_data'])): foreach($n['_data'] as $key=>$l): ?><li class="b-nav-li"><a href="<?php echo U($l['mca']);?>" ><i class="icon-double-angle-right"></i> <?php echo ($l['name']); ?></a>
        </li>
         </li><?php endforeach; endif; ?>
       </ul>  -->
       
            
           
              
        </li>
         </li><?php endforeach; endif; ?>
       </ul> 
         </li><?php endif; endforeach; endif; ?>
     </ul>
    <!--  <div class="sidebar-collapse" id="sidebar-collapse">
      <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
     </div> -->
     <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
    </div>
    <div class="main-content">
     <div class="page-content">
      

<div class="col-xs-12">
    <div class="tabbable">
    <table class="table table-striped table-bordered table-hover table-condensed">

       <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
        <li class="active">
          <a href="javascript:;" data-toggle="tab">杆塔列表</a></li>

        <li>  <a href="/ts/index.php/Admin/Tower/add"  >增加杆塔</a></li>
        <li >  <a href="javascript:;" class="btn disabled" >修改杆塔</a></li>
        
      
        
      </ul>
        <tr>
          <td>
            <form class="form-inline" action="" id="my_form">
            

              <input  list="datalist" placeholder="线路名称" type="text" style="width: 8%;" name="line_name" id="line_name"/> 
             <datalist id="datalist">
             <?php if(is_array($querydata['device_lines'])): foreach($querydata['device_lines'] as $key=>$v): ?><option value ="<?php echo ($v['device_name']); ?>"></option><?php endforeach; endif; ?>
             </datalist> 

      


            

            <input style="width:8%" class="btn btn-sm btn-success" type="submit"  value="查找线路">

             



            </form>
          </td>
        </tr>
      </table>

      <div class="tab-content" id="tree-deatil-record">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">

          <tr>
           <th  >序号 </th>
           <th  >所属线路名称</th>
           <th  >电压值</th>
           <th  >杆塔号</th>
           <th  >经度(度）</th>
           <th  >经度(分）</th>
           <th  >经度(秒）</th>
           <th  >纬度(度）</th>
           <th  >纬度(分）</th>
           <th  >纬度(秒）</th>
          <th  >备注</th>
           <th  >更新时间</th>
           <th  >更新人</th>
           
           
           
           <th  >操作</th>  

          </tr>
          <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
              <td ><?php echo ($v['tower_serial']); ?></td>
              
              <td ><?php echo ($v['tower_line_name']); ?></td>
              <td ><?php echo ($v['tower_line_degree']); ?></td>
              <td ><?php echo ($v['tower_number_old']); ?></td>
              <td ><?php echo ($v['tower_longitude_d']); ?></td>
              <td ><?php echo ($v['tower_longitude_m']); ?></td>
              <td ><?php echo ($v['tower_longitude_s']); ?></td>
              <td ><?php echo ($v['tower_latitude_d']); ?></td>
              <td ><?php echo ($v['tower_latitude_m']); ?></td>
              <td ><?php echo ($v['tower_latitude_s']); ?></td>
              <td ><?php echo ($v['tower_remark']); ?></td>
              <td ><?php echo (date('Y-m-d',$v['tower_update_time'])); ?></td>
              <td ><?php echo ($v['tower_update_person']); ?></td>
              
        

              <td>
              <a href="/ts/index.php/Admin/Tower/edit/tower_id/<?php echo ($v['tower_id']); ?>/line_name/<?php echo ($line_name); ?>">修改</a>
              ||<a href="javascript:;" tower_id="<?php echo ($v['tower_id']); ?>" tower_serial="<?php echo ($v['tower_serial']); ?>" onclick="delete_tower(this);">删除</a>

          
              </td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div align="center"> <?php echo ($pagehtml); ?></div>
      </div>
       </div>
    </div>
  </div>



     </div>
    </div>
   </div>
   <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"><i class="icon-double-angle-up icon-only bigger-110"></i></a>
  </div>
  <!--[if !IE]> -->
  <script src="/ts/Public/statics/js/jquery-1.10.2.min.js"></script>
  <!-- <![endif]-->
  <!--[if IE]><script src="/ts/Public/statics/js/jquery-1.10.2.min.js"></script><![endif]-->
  <!--[if !IE]> -->
  <script type="text/javascript">
        window.jQuery || document.write("<script src='/ts/Public/statics/aceadmin/js/jquery-2.0.3.min.js'>"+"<"+"script>");
    </script>
  <!-- <![endif]-->
  <!--[if IE]><script type="text/javascript">
        window.jQuery || document.write("<script src='/ts/Public/statics/aceadmin/js/jquery-1.10.2.min.js'>"+"<"+"script>");
    </script><![endif]-->
  <script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='/ts/Public/statics/aceadmin/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
  </script>

  <script type="text/javascript">
   window.onload = function() 
    { 
        divset=document.getElementById("树木管理").style.display="block";
        divset=document.getElementById("系统设置").style.display="block";
        divset=document.getElementById("权限系统").style.display="block";
        divset=document.getElementById("基础信息维护").style.display="block";
        divset=document.getElementById("树障统计信息").style.display="block";
     
     
    }
   
  </script>
  <script src="/ts/Public/statics/aceadmin/js/bootstrap.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/typeahead-bs2.min.js"></script> 
  <!--[if lte IE 8]><script src="/ts/Public/statics/aceadmin/js/excanvas.min.js"></script><![endif]-->
  <script src="/ts/Public/statics/aceadmin/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/jquery.ui.touch-punch.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/jquery.slimscroll.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/jquery.easy-pie-chart.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/jquery.sparkline.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/flot/jquery.flot.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/flot/jquery.flot.pie.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/flot/jquery.flot.resize.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/ace-elements.min.js"></script>
  <script src="/ts/Public/statics/aceadmin/js/ace.min.js"></script>
  <script src="/ts/tpl/Public/js/base.js"></script>
  
<script>
function delete_tower(obj)
{
  var tower_id=$(obj).attr('tower_id');
  var tower_serial=$(obj).attr('tower_serial');
  if(confirm('确定删除？'))
  {
  $.ajax({
          type:"POST",
           url:"/ts/index.php/Admin/Tower/delete",
           data:{
             tower_id:tower_id,
             tower_serial:tower_serial,
             


             },
             success:function(msg)
            {
    
             location.reload();
            
            },
            error:function(XMLHttpRequest, textStatus, thrownError){}
          })

}
}
    
    
</script>

    


   

   <script>
    var BASE_URL = '/ts/Public/statics/webuploader-0.1.5';
</script>
<script src="/ts/Public/statics/js/webuploader.min.js"></script> 
 </body>
</html>