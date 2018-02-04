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
          <span class="menu-text"><?php echo ($n['name']); ?></span>
      
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
         <li >
         <a href="/ts/index.php/Admin/Tree/index" >树障列表</a></li>

        <li>  <a href="/ts/index.php/Admin/Tree/base/tid/<?php echo ($tree_id); ?>" >树障详情</a></li>
        <li class="active">  <a href="javascript:;"    data-toggle="tab">巡检记录</a></li>
        <li>  <a href="/ts/index.php/Admin/TreeProcess/index/tid/<?php echo ($tree_id); ?>" >处理记录</a></li>
        <!-- <li>  <a href="/ts/index.php/Admin/TreeFly/index/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($tree_id); ?>">飞行记录</a></li> -->
        
        <!-- <li>
          <a href="/ts/index.php/Admin/Tree/add/group_id/<?php echo ($group_id); ?>"  >增加树障</a></li> -->
      </ul>
        <tr>
          <td>
            
            
               
                <a href="" style="width:10%" id="list_button" class="btn btn-sm disabled" >巡查记录列表</a>
                <input style="width:10%" id="add_button" class="btn btn-sm btn-success" type="button" tid="<?php echo ($tree_id); ?>" onclick="add_detail(this)" value="添加新记录">

               <a href="javascript:;"  style="width:10%" id="list_file_button" class="btn btn-sm btn-success" type="button"  tid="<?php echo ($tree_id); ?>" onclick="file(this)">查看巡查文件</a>
        
       
               <a href="javascript:;"  style="width:10%" id="add_file_button" class="btn btn-sm btn-success" type="button" tid="<?php echo ($tree_id); ?>" onclick="uploadfile(this)">上传巡查文件</a>
              
          

        
          </td>
        </tr>
      </table>

<!-- <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
        <li class="active">
          <a href="javascript:;" data-toggle="tab">列表</a></li>
        <li>
          <a href="javascript:;" tid="<?php echo ($tree_id); ?>" onclick="add_detail(this)" ">添加新记录</a></li>
       </ul> -->

  <div class="tab-content" id="tree-deatil-record">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">
<tr>
    <th colspan="3">隐患最新情况</th>    
    <th colspan="3">隐患最新情况（程度）</th>
    <th colspan="1">隐患最新情况（位置）</th>                    
    <th colspan="14">隐患最新情况（表象）</th>
    <th colspan="3">隐患最新情况（监测）</th>
    <th colspan="1">隐患来源</th>
    <th colspan="4">隐患权属人信息</th>
    <th colspan="4">隐患处理与管控</th>
    <th colspan="5">系统新增</th>                
    
</tr>
          <tr> 
          <th  id="t-detail_last_time">更新时间（最新隐患调查、测量日期）</th>    
           <th  id="t-datail_check_person">更新人（最新隐患调查人）</th> 
           <th  id="t-datail_check_time">测量时刻(更新时间。到时、分)</th>      
           <th  id="t-datail_danger_degree">隐患级别（最新隐患）</th>
           <th  id="t-datail_check_change_conclusion">调查结论（缺陷级别变化)</th>
           <th  id="t-datail_check_process_conclusion">调查结论(处理）</th>
           <th  id="t-datail_check_posistion_conclusion">调查结论(位置)</th>           
           <th  id="t-datail_tree_type">最危急树障种类</th>
           <th  id="t-datail_tree_num">最危急树障数量(棵数、墩数)</th>
           <th  id="t-datail_tree_num_unit">最危急树障数量单位（棵、墩）</th>
           <th  id="t-datail_tree_area">最危急树障数量(亩数)</th>
           <th  id="t-datail_tree_area_unit">最危急树障数量单位（亩）</th>
           <th  id="t-datail_tree_height">最危急树障树高（米）</th>           
           <th  id="t-datail_tree_horizontal">最危急树障导线对树木水平距离（米）</th>
           <th  id="t-datail_tree_vertical">最危急树障导线对树木垂直距离（米）</th>
           <th  id="t-datail_tree_grand_height">最危急树障导线对地（米）</th>

           <th  id="t-datail_mix_net_distance">最小净空距离（米）</th>
           <th  id="t-datail_mix_lodging_distance">树木倒伏导线最小距离（米）</th>
           <th  id="t-datail_lodging_degree">倒伏判断隐患级别</th>

           <th  id="t-datail_tree_over">是否高出导线</th>
           <th  id="t-datail_final_danger">最终自然生长高度是否构成一般级别缺陷</th>           
           <th  id="t-detail_check_method">测量方法</th>                      
           <th  id="t-detail_temperature">气温（℃）</th>
           <th  id="t-detail_load">负荷（A）</th>
           <th  id="t-detail_retain">是否建设遗留</th>
           <th  id="t-detail_address">种植物权属方联系人地址</th>
           <th  id="t-detail_owner">种植物权属方联系人姓名</th>
           <th  id="t-detail_phone">种植物权属方联系人电话</th>
           <th  id="t-detail_plant_time">高杆植物种植时间</th>
           <th  id="t-detail_compensation_condition">青赔情况</th>
           <th  id="t-detail_build_deal">线路建设时协议签定情况</th>
           <th  id="t-detail_run_deal">运行过程中协议情况</th>
           <th  id="t-detail_notice_number">隐患通知书编号、情况</th>
         
           <th id="t-datail_update_time">更新时间</th>
           <th id="t-datail_update_person">更新人</th> 
           <th  id="t-datail_update_group">更新班组</th>
           <th  id="t-datail_uptodate">是否最新</th>
           
           <th>操作</th>  
          </tr>
          <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
              <td id="t-detail_last_time"><?php echo (date('Y-m-d',$v['detail_last_time'])); ?></td>                 
              <td id="t-datail_check_person"><?php echo ($v['datail_check_person']); ?></td>              
              <td id="t-datail_check_time"><?php echo (date('Y-m-d',$v['datail_check_time'])); ?></td>
              <td id="t-datail_danger_degree"><?php echo ($v['datail_danger_degree']); ?></td>
              <td id="t-datail_check_change_conclusion"><?php echo ($v['datail_check_change_conclusion']); ?></td>
              <td id="t-datail_check_process_conclusion"><?php echo ($v['datail_check_process_conclusion']); ?></td>
              <td id="t-datail_check_posistion_conclusion"><?php echo ($v['datail_check_posistion_conclusion']); ?></td>
              <td id="t-datail_tree_type"><?php echo ($v['datail_tree_type']); ?></td>
              <td id="t-datail_tree_num"><?php echo ($v['datail_tree_num']); ?></td>
              <td id="t-datail_tree_num_unit"><?php echo ($v['datail_tree_num_unit']); ?></td>
              <td id="t-datail_tree_area"><?php echo ($v['datail_tree_area']); ?></td>
              <td id="t-datail_tree_area_unit"><?php echo ($v['datail_tree_area_unit']); ?></td>
              <td id="t-datail_tree_height"><?php echo ($v['datail_tree_height']); ?></td>              
              <td id="t-datail_tree_horizontal"><?php echo ($v['datail_tree_horizontal']); ?></td>
              <td id="t-datail_tree_vertical"><?php echo ($v['datail_tree_vertical']); ?></td>
              <td id="t-datail_tree_grand_height"><?php echo ($v['datail_tree_grand_height']); ?></td>
              
              <td id="t-datail_mix_net_distance"><?php echo ($v['datail_mix_net_distance']); ?></td>
              <td id="t-datail_mix_lodging_distance"><?php echo ($v['datail_mix_lodging_distance']); ?></td>
              <td id="t-datail_lodging_degree"><?php echo ($v['datail_lodging_degree']); ?></td>


              <td id="t-datail_tree_over">
                <?php if($v['datail_tree_over'] == 1): ?>是
              <?php else: ?> 否<?php endif; ?></td>

              <!-- <td id="t-datail_tree_over">
                <?php if($v['datail_tree_over'] == 1): ?>是
              <?php else: ?> 否<?php endif; ?></td>
              </td>  -->
              <!-- 不知道如何多了一个值，之前检查的时候是没有的 -->
              <td id="t-datail_final_danger">
                <?php if($v['datail_final_danger'] == 1): ?>是
               <?php else: ?> 否<?php endif; ?></td>
              <td id="t-detail_check_method"><?php echo ($v['detail_check_method']); ?></td>              
              <td id="t-detail_temperature"><?php echo ($v['detail_temperature']); ?></td>
              <td id="t-detail_load"><?php echo ($v['detail_load']); ?></td>
              <td id="t-detail_retain">
                  <?php if($v['detail_retain'] == 1): ?>是
                <?php else: ?> 否<?php endif; ?></td>
                </td> 
              <td id="t-detail_address"><?php echo ($v['detail_address']); ?></td>
              <td id="t-detail_owner"><?php echo ($v['detail_owner']); ?></td>
              <td id="t-detail_phone"><?php echo ($v['detail_phone']); ?></td>
              <td id="t-detail_plant_time"><?php echo ($v['detail_plant_time']); ?></td>
              <td id="t-detail_compensation_condition"><?php echo ($v['detail_compensation_condition']); ?></td>
              <td id="t-detail_build_deal"><?php echo ($v['detail_build_deal']); ?></td>
              <td id="t-detail_run_deal"><?php echo ($v['detail_run_deal']); ?></td>
              <td id="t-detail_notice_number"><?php echo ($v['detail_notice_number']); ?></td>
              

              <td  id="t-datail_update_time"><?php echo (date('Y-m-d',$v['datail_update_time'])); ?></td>
              <td  id="t-datail_update_person"><?php echo ($v['datail_update_person']); ?></td> 
              <td id="t-datail_update_group"><?php echo ($v['datail_update_group']); ?></td>

              <td id="t-datail_uptodate">
                <?php if($v['datail_uptodate'] == '1'): ?>是
              <?php else: ?> 否<?php endif; ?></td>
              </td>       
        

              <td>
              <a href="javascript:;" tid="<?php echo ($tree_id); ?>" detail_id="<?php echo ($v['detail_id']); ?>" onclick="delete_detail(this);">删除</a>
            
              </td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div align="center"> <?php echo ($pagehtml); ?></div>
      </div>
       </div>
    </div>
  </div>
 <script type="text/javascript">
  function delete_detail(obj)
     {
       if(confirm('确定删除？'))
       {
           var detail_id=$(obj).attr('detail_id');
           var tid=$(obj).attr('tid');
          
           $.ajax({
           url:'/ts/index.php/Admin/TreeDetail/delete',
           type:'GET', 
           async:true,    
           data:{
              detail_id:detail_id,
              tid:tid
           },
            success:function(msg)
           {
             //alert(msg);          
            }
         })

          $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeDetail/index",
           data:{
             tid:tid
             },
             success:function(msg){
            // $("#tree-deatil-record").html(msg);
             window.location.reload();

            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          })
       }

     }
    function add_detail(obj)
    {

       var tid=$(obj).attr('tid');
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeDetail/add",
           data:{
              tid:tid
             },
             success:function(msg){
    
          $("#tree-deatil-record").html(msg);
          $("#list_button").removeClass("disabled");
          $("#list_button").addClass("btn-success");
          $("#add_button").removeClass("btn-success");
          $("#add_button").addClass("disabled");
          $("#list_file_button").removeClass("disabled");
          $("#list_file_button").addClass("btn-success");
          $("#add_file_button").removeClass("disabled");
          $("#add_file_button").addClass("btn-success");
          
            },
            error:function(XMLHttpRequest, textStatus, thrownError){}
          })
    }

    function uploadfile(obj)
    {
       var tid=$(obj).attr('tid');
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeDetail/uploadfile",
           data:{
              tid:tid
             },
             success:function(msg){

    
     
          $("#tree-deatil-record").html(msg);
              
          $("#list_button").removeClass("disabled");
          $("#list_button").addClass("btn-success");

          $("#add_button").removeClass("disabled");
          $("#add_button").addClass("btn-success");

          $("#list_file_button").removeClass("disabled");
          $("#list_file_button").addClass("btn-success");

          $("#add_file_button").removeClass("btn-success");
          $("#add_file_button").addClass("disabled");
       
            },
            error:function(XMLHttpRequest, textStatus, thrownError){}
          })
    }

     function file(obj)
    {
       var tid=$(obj).attr('tid');
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeDetail/file",
           data:{
              tid:tid
             },
             success:function(msg){
    
         
         
          $("#tree-deatil-record").html(msg);
          $("#list_button").removeClass("disabled");
          $("#list_button").addClass("btn-success");

          $("#add_button").removeClass("disabled");
          $("#add_button").addClass("btn-success");

          $("#list_file_button").removeClass("btn-success");
          $("#list_file_button").addClass("disabled");

          $("#add_file_button").removeClass("disabled");
          $("#add_file_button").addClass("btn-success");
            },
            error:function(XMLHttpRequest, textStatus, thrownError){
              
            }

          })
    }

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
        divset=document.getElementById("树障管理").style.display="block";
        divset=document.getElementById("系统设置").style.display="block";
        divset=document.getElementById("权限控制").style.display="block";
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
    var BASE_URL = '/ts/Public/statics/webuploader-0.1.5';
</script>
<script src="/ts/Public/statics/js/webuploader.min.js"></script> 
 </body>
</html>