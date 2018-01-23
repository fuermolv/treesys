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


          <li class="b-has-child"><a href="#" class="dropdown-toggle b-nav-parent"><i class="fa fa-<?php echo ($v['ico']); ?> icon-test"></i> <span class="menu-text"><?php echo ($n['name']); ?></span><b class="arrow icon-angle-down"></b></a>
         <ul class="submenu" id="<?php echo ($n['name']); ?>">
        <?php if(is_array($n['_data'])): foreach($n['_data'] as $key=>$l): ?><li class="b-nav-li"><a href="<?php echo U($l['mca']);?>" ><i class="icon-double-angle-right"></i> <?php echo ($l['name']); ?></a>
        </li>
         </li><?php endforeach; endif; ?>
       </ul> 
       
            
           
              
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
         <li>
         <a href="/ts/index.php/Admin/Tree/index/group_id/<?php echo ($group_id); ?>" >树片列表</a></li>

         <li>  <a href="/ts/index.php/Admin/Tree/base/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($tree_id); ?>" >树片详情</a></li>
         <li>  <a href="/ts/index.php/Admin/TreeDetail/index/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($tree_id); ?>">巡检记录</a></li>
         <li>  <a href="/ts/index.php/Admin/TreeProcess/index/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($tree_id); ?>">处理记录</a></li>        
         <li class="active">  <a href="avascript:;" >飞行记录</a></li>
           <!-- <li>
          <a href="/ts/index.php/Admin/Tree/add/group_id/<?php echo ($group_id); ?>"  >增加树片</a></li> -->
      </ul>
        <tr>
          <td>
            

         <a href="/ts/index.php/Admin/TreeFly/index/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($tree_id); ?>" style="width:10%" id="list_button" class="btn btn-sm disabled" type="button" tid="<?php echo ($tree_id); ?>" >飞行记录列表</a>
       
         <a href="javascript:;" style="width:10%" id="add_button" class="btn btn-sm btn-success"  type="button" tid="<?php echo ($tree_id); ?>" onclick="add(this)" >添加新记录</a>
        
        
          </td>
        </tr>
      </table>



<div class="tab-content" id="tree-fly-record">
        <div class="table-responsive">
        <table width="1080px" class="table table-striped table-bordered table-hover table-condensed " id="data-table">
          <tr>
              <form id="my_form">
                  
            <td colspan="5">请选择飞机类型：</td>
            <td colspan="4">
            <select style="width:100%" name="fly_plane_type" id="fly_plane_type" value="<?php echo ($fly_plane_type); ?>" onchange="submitForm();">
              <option value ="1">激光机</option>
              <option value ="0" >固定翼</option>
              </select>
            </td>
              </form>
          </tr>



      <tr>
        <th colspan="1">记录编号</th>
        <th  style="text-align:center;" colspan="25">机巡结果</th>
        <th  style="text-align:center;" colspan="4">判断飞机与档案数据</th>
        <th  style="text-align:center;" colspan="3">飞机后数据处理情况</th>
        <th  style="text-align:center;" colspan="1">操作</th>
        </tr>
          <tr>
            <!-- 记录编号 -->
           <th>记录编号</th>
           <!-- 机巡结果 -->

           <th>飞行区段</th>
           <th>杆塔区间</th>
           <th>测量时间</th>
           <th>经度(E）</th>
           <th>纬度（N）</th>
           <th>高度(m)</th>
           <th>档距(m)</th>
           <th>距小号塔距离(m)</th>
           <th>地物类型</th>
           <th>水平距（m）</th>
           <th>垂直距（m）</th>
           <th>最小净空实测距离（m）</th>
           <th>级别</th>
           <th>安全距离(m)</th>
           <th>巡检方式</th>
           <th>巡视方式</th>
           <th>飞行日期（巡视开始时间）</th>
           <th>（巡视结束时间）</th>
           <th>当地天气</th>
           <th>运行工况</th>
           <th>禁飞情况/作业情况</th>
           <th>报告编制日期</th>
           <th>收机（系统）巡报告时间</th>
           <th>班组收报告时间</th>
           <th>班组反馈时间</th>
          <!-- 判断飞机与档案数据 -->
          <th>判断飞机与档案数据存在情况</th>
          <th>当时核实后情况</th>
          <th>机有人无说明情况</th>
          <th>备注</th>
          <!--飞机后数据处理情况  -->
          <th>飞机后处理时间</th>
          <th>处理情况</th>
          <th>备注</th>
          <!-- 操作 -->
          <th  >操作</th>  
          </tr>
          <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                <td id="fly_id"><?php echo ($v['fly_id']); ?></td>
                <td id="fly_extent"><?php echo ($v['fly_extent']); ?></td>
                <td id="fly_tower_extent"><?php echo ($v['fly_tower_extent']); ?></td>
                <td id="fly_check_time"><?php echo (date('Y-m-d',$v['fly_check_time'])); ?></td>
                <td id="fly_longitude"><?php echo ($v['fly_longitude']); ?></td>
                <td id="fly_latitude"><?php echo ($v['fly_latitude']); ?></td>
                <td id="fly_heigh"><?php echo ($v['fly_heigh']); ?></td>
                <td id="fly_distance"><?php echo ($v['fly_distance']); ?></td>
                <td id="fly_distance_from_starttower"><?php echo ($v['fly_distance_from_starttower']); ?></td>
                <td id="fly_object_type"><?php echo ($v['fly_object_type']); ?></td>
                <td id="fly_horizontal"><?php echo ($v['fly_horizontal']); ?></td>
                <td id="fly_vertical"><?php echo ($v['fly_vertical']); ?></td>
                <td id="fly_mix_distance"><?php echo ($v['fly_mix_distance']); ?></td>
                <td id="fly_degree"><?php echo ($v['fly_degree']); ?></td>
                <td id="fly_safe_distance"><?php echo ($v['fly_safe_distance']); ?></td> 
                <td id="fly_check_method"><?php echo ($v['fly_check_method']); ?></td>
                <td id="fly_tour_method"><?php echo ($v['fly_tour_method']); ?></td>
                <td id="fly_start_time"><?php echo (date('Y-m-d',$v['fly_start_time'])); ?></td>
                <td id="fly_end_time"><?php echo (date('Y-m-d',$v['fly_end_time'])); ?></td>
                <td id="fly_weather"><?php echo ($v['fly_weather']); ?></td>
                <td id="fly_run_condition"><?php echo ($v['fly_run_condition']); ?></td>
                <td id="fly_forbid_condition"><?php echo ($v['fly_forbid_condition']); ?></td>
                <td id="fly_report_made_time"><?php echo (date('Y-m-d',$v['fly_report_made_time'])); ?></td>
                <td id="fly_receive_report_time"><?php echo (date('Y-m-d',$v['fly_receive_report_time'])); ?></td>
                <td id="fly_group_receive_report_time"><?php echo (date('Y-m-d',$v['fly_group_receive_report_time'])); ?></td>
                <td id="fly_group_feedback_time"><?php echo (date('Y-m-d',$v['fly_group_feedback_time'])); ?></td>
                <td id="fly_data_condition"><?php echo ($v['fly_data_condition']); ?></td>
                <td id="fly_verify_condition"><?php echo ($v['fly_verify_condition']); ?></td>
                <td id="fly_person_condition"><?php echo ($v['fly_person_condition']); ?></td>
                <td id="fly_data_check_remark"><?php echo ($v['fly_data_check_remark']); ?></td>
                <td id="fly_later_deal_time"><?php echo (date('Y-m-d',$v['fly_later_deal_time'])); ?></td>
                <td id="fly_deal_condition"><?php echo ($v['fly_deal_condition']); ?></td>
                <td id="fly_deal_remark"><?php echo ($v['fly_deal_remark']); ?></td>                
                <td><a href="javascript:;"  tid="<?php echo ($tree_id); ?>" flyid="<?php echo ($v['fly_id']); ?>" groupid="<?php echo ($group_id); ?>" class="btn btn-sm btn-success" type="button" onclick="delete_fly(this);">删除</a>
                    <a href="javascript:;"   flyid="<?php echo ($v['fly_id']); ?>"  class="btn btn-sm btn-success" type="button" onclick="edit_fly(this);">修改</a>
                    
                </td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div align="center"> <?php echo ($pagehtml); ?></div>
      </div>
       </div>
    </div>
  </div>



 <script type="text/javascript">
    function submitForm()
     {
      sessionStorage.setItem("fly_plane_type",document.getElementById("fly_plane_type").value);
      var form = document.getElementById("my_form");//获取form表单对象
      form.submit();//form表单提交
     }

     function delete_fly(obj)
     {
      	 if(confirm('确定删除？'))
       {
           
           var fly_id=$(obj).attr('flyid');
           var group_id=$(obj).attr('groupid');
           var tid=$(obj).attr('tid');
           window.location="/ts/index.php/Admin/TreeFly/delete/group_id/<?php echo ($group_id); ?>/fly_id/"+fly_id;
          

       }

     }

     function add(obj)
    {
       var tid=$(obj).attr('tid');
       console.log(tid);
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeFly/add",
           data:{
              tid:tid
             },
             success:function(msg){
          $("#tree-fly-record").html(msg);
          $("#list_button").removeClass("disabled");
          $("#list_button").addClass("btn-success");
          $("#add_button").removeClass("btn-success");
          $("#add_button").addClass("disabled");
            },
            error:function(XMLHttpRequest, textStatus, thrownError){}
          })
    }
    function edit_fly(obj)
    {
       var fly_id=$(obj).attr('flyid');
       console.log(fly_id);
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeFly/edit",
           data:{
            fly_id:fly_id
             },
             success:function(msg){
          $("#tree-fly-record").html(msg);
          $("#list_button").removeClass("disabled");
          $("#list_button").addClass("btn-success");
          $("#add_button").removeClass("disabled");
          $("#add_button").addClass("btn-success");
            },
            error:function(XMLHttpRequest, textStatus, thrownError){}
          })
    }



 </script>
<script type="text/javascript">
  $(document).ready(function()
  {  
  $("#fly_plane_type").val(<?php echo ($fly_plane_type); ?>)
    
  //  console.log(<?php echo ($tree_id); ?>)
  });
  </script>
 
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
    var BASE_URL = '/ts/Public/statics/webuploader-0.1.5';
</script>
<script src="/ts/Public/statics/js/webuploader.min.js"></script> 
 </body>
</html>