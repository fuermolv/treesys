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
        <li class="active">  <a href="avascript:;" >处理记录</a></li>
        <li>  <a href="/ts/index.php/Admin/TreeFly/index/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($tree_id); ?>">飞行记录</a></li>
        
           <!-- <li>
          <a href="/ts/index.php/Admin/Tree/add/group_id/<?php echo ($group_id); ?>"  >增加树片</a></li> -->
      </ul>
        <tr>
          <td>
            

         <a href="/ts/index.php/Admin/TreeProcess/index/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($tree_id); ?>" style="width:10%" id="list_button" class="btn btn-sm disabled" type="button" tid="<?php echo ($tree_id); ?>" >处理记录列表</a>
       
         <a href="javascript:;" style="width:10%" id="add_button" class="btn btn-sm btn-success"  type="button" tid="<?php echo ($tree_id); ?>" onclick="add(this)" >添加新记录</a>
        
       
        <a href="javascript:;"  style="width:10%" id="list_file_button" class="btn btn-sm btn-success" type="button"  tid="<?php echo ($tree_id); ?>" onclick="file(this)">查看处理文件</a>
        
       
        <a href="javascript:;"  style="width:10%" id="add_file_button" class="btn btn-sm btn-success" type="button" tid="<?php echo ($tree_id); ?>" onclick="uploadfile(this)">上传处理文件</a>
       
            
               
             <!--    <a href="" style="width:6%" id="list_button" class="btn btn-sm disabled" >巡查记录列表</a>
                <input style="width:6%" id="add_button" class="btn btn-sm btn-success" type="button" tid="<?php echo ($tree_id); ?>" onclick="add_detail(this)" value="添加新记录"> -->
              
          

        
          </td>
        </tr>
      </table>


<!-- <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
         <li class="active">
         <a href="javascript:;"  tid="<?php echo ($tree_id); ?>" onclick="process_list(this)" >列表</a></li>
        <li >
        <a href="javascript:;"   tid="<?php echo ($tree_id); ?>" onclick="add(this)" >添加新记录</a>
        </li>
        <li >
        <a href="javascript:;"   tid="<?php echo ($tree_id); ?>" onclick="file(this)">查看处理文件</a>
        </li>
        <li >
        <a href="javascript:;"   tid="<?php echo ($tree_id); ?>" onclick="uploadfile(this)">上传处理文件</a>
        </li>
 </ul> -->


<div class="tab-content" id="tree-process-record">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">
<tr>
  <th colspan="1">隐患单位</th>
  <th  style="text-align:center;" colspan="28">隐患处理与管控（处理过程）</th>
  
</tr>
          <tr>
           <th>记录编号</th>
           <th>计划清理时间</th>
           <th>任务发布时间</th>
           <th>是否额外任务</th>
           <th>属地供电所</th>
           <th>供电所具体工作人员姓名</th>
           <th>供电所具体工作人员联系电话</th>
           <th>输电所分片负责人</th>
           <th>输电所安排的隐患核实工作人员姓名</th>
           <th  >输电所安排的隐患核实工作人员联系电话</th>
           <th  >属地单位计划与户主商谈前的隐患核实时间</th>
            <th  >属地单位与户主商谈前的隐患核实时间</th>
           <th  >属地供单位计划协商的时间段</th>
           <th  >协商过程情况</th>        
           <th  >截止统计日按任务单，现场“隐患核实”情况</th>
           <th  >截止统计日青苗商谈、补偿情况</th>
           <th  >截止统计日存在的协商问题</th>
           <th  >截止统计日砍伐情况</th>
           <!-- 截止统计日砍伐情况 -->
           <th  >是否需逐级上报处理</th>
           <th  >上报级别</th>
           <!-- 最新处理结果1（树桩/根） -->
           <!-- 最新处理结果2 -->
           <!-- 处理人 -->
           <!-- 处理时间(格式：'2013-5-25) -->
           <th  >清障验收时间</th>
           <!-- 验收人 -->
           <th  >验收结论1</th>
           <th  >验收结论2</th>
           <!-- 已有协议情况 -->
           <!-- 已有协议编号 -->
           <th  >输电班组人员确认时间</th>
           <th  >输电班组人员确认签名</th>
            <th  >备注</th>
           <th  >更新人</th>
           <th  >更新时间</th> 
           <th  >操作</th>  
          </tr>
          <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td id="t-record_id"><?php echo ($v['record_id']); ?></td>
            <td id="t-record_plan_clean_time"><?php echo (date('Y-m-d',$v['record_plan_clean_time'])); ?></td>
            <td id="t-record_task_time"><?php echo (date('Y-m-d',$v['record_task_time'])); ?></td>
           
              <td id="t-record_is_additional">
               <?php if($v['record_is_additional'] == '1'): ?>是
              <?php else: ?> 否<?php endif; ?></td>
              <td id="t-record_department"><?php echo ($v['record_department']); ?></td>
              <td id="t-record_person"><?php echo ($v['record_person']); ?></td>
              <td id="t-record_person_phone"><?php echo ($v['record_person_phone']); ?></td>
              <td id="t-record_accountability_person"><?php echo ($v['record_accountability_person']); ?></td>
              <td id="t-record_verify_person"><?php echo ($v['record_verify_person']); ?></td>
              <td id="t-record_verify_person_phone"><?php echo ($v['record_verify_person_phone']); ?></td>

              <td id="t-record_plan_verify_time"><?php echo (date('Y-m-d',$v['record_plan_verify_time'])); ?></td>
              <td id="t-record_verify_time"><?php echo (date('Y-m-d',$v['record_verify_time'])); ?></td>
              <td id="t-record_plan_consult_time"><?php echo ($v['record_plan_consult_time']); ?></td>


              <td id="t-record_consult_detail"><?php echo ($v['record_consult_detail']); ?></td>

              <td id="t-record_verify_situ"><?php echo ($v['record_verify_situ']); ?></td>

              <td id="t-record_verify_consult_situ"><?php echo ($v['record_verify_consult_situ']); ?></td>
              <td id="t-record_verify_consult_matter"><?php echo ($v['record_verify_consult_matter']); ?></td>              
              <td id="t-record_process_situ"><?php echo ($v['record_process_situ']); ?></td>
              

               <td id="t-record_need_apper">
               <?php if($v['record_need_apper'] == '1'): ?>是
              <?php else: ?> 否<?php endif; ?></td>
              <td id="t-record_apper_level"><?php echo ($v['record_apper_level']); ?></td>

               <td id="t-record_accept_time"><?php echo (date('Y-m-d',$v['record_accept_time'])); ?></td>
                 <td id="t-record_accept_conclusion1"><?php echo ($v['record_accept_conclusion1']); ?></td>
              <td id="t-record_accept_conclusion2"><?php echo ($v['record_accept_conclusion2']); ?></td>

               <td id="t-record_confirm_time"><?php echo (date('Y-m-d',$v['record_confirm_time'])); ?></td>
               <td id="t-record_confirm_tag"><?php echo ($v['record_confirm_tag']); ?></td>

               <td id="t-record_remark"><?php echo ($v['record_remark']); ?></td>
               
              <td id="t-record_update_person"><?php echo ($v['record_update_person']); ?></td>
              <td id="t-record_update_time"><?php echo (date('Y-m-d',$v['record_update_time'])); ?></td>
         
          
              <td>
              <a href="javascript:;"  tid="<?php echo ($tree_id); ?>" record_id="<?php echo ($v['record_id']); ?>" onclick="delete_process(this);">删除</a>
              </td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div align="center"> <?php echo ($pagehtml); ?></div>
      </div>
       </div>
    </div>
  </div>



 <script type="text/javascript">


     function delete_process(obj)
     {
      	 if(confirm('确定删除？'))
       {
           
           var record_id=$(obj).attr('record_id');
           
           var tid=$(obj).attr('tid');
          
           $.ajax({
           url:'/ts/index.php/Admin/TreeProcess/delete',
           type:'GET', 
           async:true,    
           data:{
               record_id:record_id
              
           },
            success:function(msg)
           {

           $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeProcess/index",
           data:{
             tid:tid
             },
             success:function(msg)
             {
               window.location.reload();
    
              //$("#tree-process-record").html(msg);
            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          })
                     
            }
         })


       }

     }

    function uploadfile(obj)
    {
       var tid=$(obj).attr('tid');
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeProcess/uploadfile",
           data:{
              tid:tid
             },
             success:function(msg){
    
          $("#tree-process-record").html(msg);
       
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

   function process_list(obj)
    {
       var tid=$(obj).attr('tid');
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeProcess/index",
           data:{
              tid:tid
             },
             success:function(msg){
    
          $("#tree-process-record").html(msg);



            },
            error:function(XMLHttpRequest, textStatus, thrownError){}
          })
    }
     function file(obj)
    {
       var tid=$(obj).attr('tid');
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeProcess/file",
           data:{
              tid:tid
             },
             success:function(msg){
    
          $("#tree-process-record").html(msg);

          $("#list_button").removeClass("disabled");
          $("#list_button").addClass("btn-success");

          $("#add_button").removeClass("disabled");
          $("#add_button").addClass("btn-success");

          $("#list_file_button").removeClass("btn-success");
          $("#list_file_button").addClass("disabled");

          $("#add_file_button").removeClass("disabled");
          $("#add_file_button").addClass("btn-success");
            },
            error:function(XMLHttpRequest, textStatus, thrownError){}
          })
    }
     function add(obj)
    {
       var tid=$(obj).attr('tid');
        $.ajax({
          type:"GET",
           url:"/ts/index.php/Admin/TreeProcess/add",
           data:{
              tid:tid
             },
             success:function(msg){
    
          $("#tree-process-record").html(msg);
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