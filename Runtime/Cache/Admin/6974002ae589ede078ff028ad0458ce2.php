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
        <li class="active">
          <a href="javascript:;" data-toggle="tab">树片列表</a></li>

        <li>  <a href="javascript:;"   class="btn disabled" data-toggle="tab">树片详情</a></li>
        <li>  <a href="javascript:;"   class="btn disabled" data-toggle="tab">巡检记录</a></li>
        <li>  <a href="javascript:;"   class="btn disabled" data-toggle="tab">处理记录</a></li>
        <li>  <a href="javascript:;"   class="btn disabled" data-toggle="tab">飞行记录</a></li>
        
        <!--   <li>
          <a href="/ts/index.php/Admin/Tree/add/group_id/<?php echo ($group_id); ?>"  >增加树片</a></li>  -->
      </ul>
        <tr>
          <td>
            <form class="form-inline"    action="" id="my_form">
            
           <!--   <select style="width:8%" name="line_id" id="line_id" onblur="submitForm();">
            <option value ="">全部线路</option>
            <?php if(is_array($querydata['device_lines'])): foreach($querydata['device_lines'] as $key=>$v): ?><option value ="<?php echo ($v['did']); ?>"><?php echo ($v['voltage_degree']); ?>kV<?php echo ($v['device_name']); ?></option><?php endforeach; endif; ?>
            </select>   -->

              <input  list="datalist" placeholder="线路名称" type="text" style="width: 8%;" name="line_id" id="line_id"  onblur="submitForm()"/> 
             <datalist id="datalist">
             <?php if(is_array($querydata['device_lines'])): foreach($querydata['device_lines'] as $key=>$v): ?><option value ="<?php echo ($v['device_name']); ?>"></option><?php endforeach; endif; ?>
           
             </datalist> 


              <input placeholder="起始杆塔" type="text" style="width: 8%;" name="star_tower" id="star_tower"  onblur="submitForm()"/> 
              
              <input placeholder="结束杆塔" type="text" style="width: 8%;" name="end_tower" id="end_tower"  onblur="submitForm()"/> 


            
 

      


            <select style="width:8%" name="voltage_degree" id="voltage_degree" onchange="submitForm();">
            <option value ="" >电压等级</option>
            <option value ="500">500kV</option>
            <option value ="220" >220kV</option>
            <option value="110" >110kV</option>
            <option value="35"  >35kV</option>
            </select>

          

            </select>
            <select style="width:8%" name="county"  id="county" onchange="submitForm();">
            <option value ="">县区</option>
            <option value ="1">清城区</option>
            <option value ="2">清新县</option>
            <option value="3">佛冈县</option>
            <option value="4">英德市</option>
            <option value ="5">阳山县</option>
            <option value ="6">连州市</option>
            <option value ="7">连南县</option>
            <option value="8">连山县</option>
            </select>

            

            <select style="width:8%" name="town"   id="town" onchange="submitForm();">
            <option value ="">镇</option>
            <?php if(is_array($querydata['towns'])): foreach($querydata['towns'] as $key=>$v): ?><option value ="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
            </select>

            <select style="width:8%" name="village"  id="village" onchange="submitForm();">
            <option value ="">村</option>
            <?php if(is_array($querydata['villages'])): foreach($querydata['villages'] as $key=>$v): ?><option value ="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
            </select>

            <select style="width:8%" name="tree_status"  id="tree_status" onchange="submitForm();">
            <option value ="">树木状态</option>
            <option value ="未砍">未砍</option>
            <option value ="翻抽">翻抽</option>
            <option value="新种">新种</option>
       
            </select>

            <select style="width:8%" name="datail_danger_degree"  id="datail_danger_degree" onchange="submitForm();">
            <option value ="">隐患级别</option>
            <option value ="一般">一般</option>
            <option value ="重大">重大</option>
           
            </select>
         
            <select style="width:8%" name="orderBy" id="orderBy" onchange="submitForm();">
            <option value ="">排序方式</option>
            <option value ="first_upload_time desc">首次上报时间降序</option>
         
            <option value ="datail_update_time desc">更新时间降序</option>         
            </select>
           

           <!--  <input style="width:8%" class="btn btn-sm btn-success" type="button" onclick="dataFilter(this)" value="数据筛选"> -->
             <a  style="width:8%" class="btn btn-sm btn-success" href="/ts/index.php/Admin/Tree/add/group_id/<?php echo ($group_id); ?>"  >增加树片</a>
             

            </form>
          </td>
        </tr>
      </table>
      <!-- <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">

        <li class="active">
        <a href="javascript:;">按钮1</a>
        </li>
        <li>
         <a href="javascript:;">按钮2</a>
        </li>
        <li>
          <a href="javascript:;">按钮3</a>
         </li>
      </ul> -->
      
      
      <div class="tab-content">
       
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">
          <tr>
            <th  id="t-tid">编号（系统编号）</th>
            <th  id="t-accountability_department">运行单位</th>
            <th style="display:none" id="t-accountability_number">序号</th>
            <th  id="t-accountability_group">责任班组</th>                     
            <th  id="t-accountability_person">巡视段责任人</th>
            <th  id="t-county">县</th>
            <th  id="t-town">镇</th>
            <th  id="t-village">村委会</th>
           <th  id="t-device_name">线路名称</th>
           <th  id="t-star_tower" >小号杆（塔周围时大小号杆相同）</th>
           <th  id="t-end_tower">大号杆（塔周围时大小号杆相同）</th>
           <th  id="t-danger_num">隐患序号</th>
           <th  id="t-first_check_person">首次调查人</th>
           <th  id="t-first_check_time">首次隐患调查、测量日期</th>
           <th style="display:none" id="t-first_upload_time">首次上报时间</th>           
           <th  id="t-tree_status">树障存在的状态</th>
           <th  id="t-tree_type">树障种类</th>
           <th style="display:none" id="t-tree_danger">保护区范围外(如超高树木、上山侧等)是否有需要处理的树障</th>
           <th style="display:none" id="t-tree_danger_num">结合地形砍够保护区及保护区附近需处理的隐患树障数量（棵、墩数）</th>
           <th style="display:none" id="t-tree_danger_num_unit">结合地形砍够保护区及保护区附近需处理的隐患树障数量单位（棵、墩）</th>
           <th style="display:none" id="t-tree_danger_area">结合地形砍够保护区及保护区附近需处理的隐患树障数量(亩数)</th>
           <th style="display:none" id="t-tree_danger_area_unit">结合地形砍够保护区及保护区附近需处理的隐患树障数量单位（亩）</th>
           <th style="display:none" id="t-tree_danger_height">结合地形砍够保护区及保护区附近需处理的隐患树障树高（m）</th>
           <th style="display:none" id="t-average_radius">结合地形砍够保护区及保护区附近需处理的隐患树木胸径范围(cm)</th>
           <th style="display:none" id="t-average_height">树木平均高度(m)</th>
           <th  id="t-detail_last_time">更新时间（最新隐患调查、测量日期）</th>
           <th  id="t-datail_check_person">更新人（最新隐患调查人）</th>
           <th style="display:none" id="t-datail_check_time">测量时刻(更新时间。到时、分)</th>
           <th  id="t-datail_danger_degree">隐患级别（最新隐患）</th>
           <!-- 调查结论级别变化清册AD-AH 没有展示（已处理）-->
           <th style="display:none" id="t-datail_check_change_conclusion">测量结论(级别变化)</th>
           <th style="display:none" id="t-datail_check_process_conclusion">测量结论(处理)</th>                
           <th  id="t-datail_check_posistion_conclusion">测量结论(位置)</th>


           <th style="display:none" id="t-datail_tree_type">最危急树障种类</th>
           <th style="display:none" id="t-datail_tree_num">最危急树障数量(棵数、墩数)</th>
           <th style="display:none" id="t-datail_tree_num_unit">最危急树障数量单位（棵、墩）</th>
           <th style="display:none" id="t-datail_tree_area">最危急树障数量(亩数)</th>
           <th style="display:none" id="t-datail_tree_area_unit">最危急树障数量单位（亩）</th>
           <th style="display:none" id="t-datail_tree_height">最危急树障树高（米）</th> 
           <th style="display:none" id="t-datail_tree_horizontal">最危急树障导线对树木水平距离（米）</th>
           <th style="display:none" id="t-datail_tree_vertical">最危急树障导线对树木垂直距离（米）</th>
           <th style="display:none" id="t-datail_tree_grand_height">最危急树障导线对地（米）</th>
           <th  id="t-datail_tree_over">是否高出导线</th>  
           <th  id="t-datail_final_danger">最终自然生长高度是否构成一般级别缺陷</th>
           <!-- AT-AX没有展示（已处理） -->
           <th style="display:none" id="t-detail_check_method">测量方法</th> 
           <th style="display:none" id="t-detail_temperature">气温（℃）</th> 
           <th style="display:none" id="t-detail_load">负荷（A）</th> 
           <th style="display:none" id="t-detail_retain">是否建设遗留</th> 
           <th style="display:none" id="t-detail_address">种植物权属方－联系人地址</th>             
           <th style="display:none" id="t-detail_owner">种植物权属方－联系人姓名</th>
           <th style="display:none" id="t-detail_phone">种植物权属方－联系人电话</th>
           <th style="display:none" id="t-detail_plant_time">高杆植物种植时间</th>
           <!--BA-BE没有展示（已处理）  -->
           <th style="display:none" id="t-detail_compensation_condition">青赔情况</th>  
           <th style="display:none" id="t-detail_build_deal">线路建设时协议签定情况</th> 
           <th style="display:none" id="t-detail_run_deal">运行过程中协议情况</th> 
           <th style="display:none" id="t-detail_notice_number">隐患通知书编号、情况</th>

            <!--找不到对应的 datail_check_conclusion （已删除）-->
           <!-- <th style="display:none" id="t-datail_check_conclusion">测量结论</th> -->
           <th style="display:none" id="t-datail_update_time">更新时间</th>           
           <th style="display:none" id="t-datail_update_person">更新人</th>
           <th style="display:none" id="t-datail_update_group">更新班组</th>
           <th style="display:none" id="t-site_condition">立地条件</th>
           <th style="display:none" id="t-processed">是否处理</th>
           <th style="display:none" id="t-dead_line_time">截止时间</th>


            <th width="100px">操作</th>

                   
            </tr>
          <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
              <td ><?php echo ($v['tid']); ?></td>
              <td ><?php echo ($v['accountability_department']); ?></td>
              <td style="display:none" ><?php echo ($v['accountability_number']); ?></td>
              <td  ><?php echo ($v['accountability_group']); ?></td>
              <td  ><?php echo ($v['accountability_person']); ?></td>
              <td  ><?php echo ($v['county']); ?></td>
              <td  ><?php echo ($v['town']); ?></td>
              <td  ><?php echo ($v['village']); ?></td>
              <td  ><?php echo ($v['voltage_degree']); ?>kV<?php echo ($v['device_name']); ?></td>
              <td  ><?php echo ($v['star_tower']); ?></td>
              <td  ><?php echo ($v['end_tower']); ?></td>
              <td  ><?php echo ($v['danger_num']); ?></td>
              <td  ><?php echo ($v['first_check_person']); ?></td>
              <td  ><?php echo (date('Y-m-d',$v['first_check_time'])); ?></td> 
              <td style="display:none" ><?php echo (date('Y-m-d',$v['first_upload_time'])); ?></td>  
              <td  ><?php echo ($v['tree_status']); ?></td>
              <td  ><?php echo ($v['tree_type']); ?></td>    
              <td style="display:none" ><?php if($v['tree_danger'] == '1'): ?>是
                <?php else: ?> 否<?php endif; ?></td>

                <td style="display:none" ><?php echo ($v['tree_danger_num']); ?></td>
                <td style="display:none" ><?php echo ($v['tree_danger_num_unit']); ?></td>
                <td style="display:none" ><?php echo ($v['tree_danger_area']); ?></td>
                <td style="display:none" ><?php echo ($v['tree_danger_area_unit']); ?></td> 
                <td style="display:none" ><?php echo ($v['tree_danger_height']); ?></td> 
                <td style="display:none" ><?php echo ($v['average_radius']); ?></td>
                <td style="display:none" ><?php echo ($v['average_height']); ?></td>
              
                <td  ><?php echo (date('Y-m-d',$v['detail_last_time'])); ?></td> 
                <td  id="t-datail_check_person"><?php echo ($v['datail_check_person']); ?></td>
                <td style="display:none" id="t-datail_check_time"><?php echo (date('Y-m-d',$v['datail_check_time'])); ?></td>
                <td id="t-datail_danger_degree"><?php echo ($v['datail_danger_degree']); ?></td>
                        
                <td  style="display:none" id="t-datail_check_change_conclusion"><?php echo ($v['datail_check_change_conclusion']); ?></td>
                <td  style="display:none" id="t-datail_check_process_conclusion"><?php echo ($v['datail_check_process_conclusion']); ?></td>                        
                <td   id="t-datail_check_posistion_conclusion"><?php echo ($v['datail_check_posistion_conclusion']); ?></td>          
                <td style="display:none" id="t-datail_tree_type"><?php echo ($v['datail_tree_type']); ?></td>
                <td style="display:none" id="t-datail_tree_num"><?php echo ($v['datail_tree_num']); ?></td>
                <td style="display:none" id="t-datail_tree_num_unit"><?php echo ($v['datail_tree_num_unit']); ?></td>
                <td style="display:none" id="t-datail_tree_area"><?php echo ($v['datail_tree_area']); ?></td>
                <td style="display:none" id="t-datail_tree_area_unit"><?php echo ($v['datail_tree_area_unit']); ?></td>
                <td style="display:none" id="t-datail_tree_height"><?php echo ($v['datail_tree_height']); ?></td>
                <td style="display:none" id="t-datail_tree_horizontal"><?php echo ($v['datail_tree_horizontal']); ?></td>
                <td style="display:none" id="t-datail_tree_vertical"><?php echo ($v['datail_tree_vertical']); ?></td>
                <td style="display:none" id="t-datail_tree_grand_height"><?php echo ($v['datail_tree_grand_height']); ?></td>
  
                <td  id="t-datail_tree_over">
                  <?php if($v['datail_tree_over'] == '1'): ?>是
                    <?php else: ?> 否<?php endif; ?></td>
                </td> 
                <td  id="t-datail_final_danger">
                    <?php if($v['datail_final_danger'] == '1'): ?>是
                   <?php else: ?> 否<?php endif; ?>
                </td>
                <!-- AT-AX没有展示（已处理） -->
                <td  style="display:none"><?php echo ($v['detail_check_method']); ?></td>
                <td  style="display:none"><?php echo ($v['detail_temperature']); ?></td>
                <td  style="display:none"><?php echo ($v['detail_load']); ?></td>

                <td  style="display:none"><?php if($v['detail_retain'] == '1'): ?>是
                  <?php else: ?> 否<?php endif; ?></td>  

                <td  style="display:none"><?php echo ($v['detail_address']); ?></td>
                <td  style="display:none" ><?php echo ($v['detail_owner']); ?></td>
                <td  style="display:none" ><?php echo ($v['detail_phone']); ?></td>
                <td  style="display:none" ><?php echo ($v['detail_plant_time']); ?></td>


                <!--BA-BE没有展示  （已处理）--> 
                <td  style="display:none" ><?php echo ($v['detail_compensation_condition']); ?></td>
                    
                <td  style="display:none"><?php echo ($v['detail_build_deal']); ?></td>
                <td  style="display:none"><?php echo ($v['detail_run_deal']); ?></td>
                <td  style="display:none"><?php echo ($v['detail_notice_number']); ?></td>
                <!--找不到对应的 datail_check_conclusion （已删除）-->
                <!-- <td style="display:none" id="t-datail_check_conclusion"><?php echo ($v['datail_check_conclusion']); ?></td> -->
                <td style="display:none" id="t-datail_update_time"><?php echo (date('Y-m-d',$v['datail_update_time'])); ?></td>                
              <td style="display:none" id="t-datail_update_person"><?php echo ($v['datail_update_person']); ?></td>
              <td style="display:none" id="t-datail_update_group"><?php echo ($v['datail_update_group']); ?></td>
              <td style="display:none" ><?php echo ($v['site_condition']); ?></td>
              <td style="display:none">
              <?php if($v['processed'] == '1'): ?>是
              <?php else: ?> 否<?php endif; ?>
              </td>
              <td style="display:none" ><?php echo (date('Y-m-d',$v['dead_line_time'])); ?></td> 

              <td>
               
              <a href="/ts/index.php/Admin/Tree/base/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($v['tid']); ?>/line_id/<?php echo ($v['line_id']); ?>"  class="btn btn-info btn-sm" >查看详情</a>

               <!-- <a href="javascript:;"  tid="<?php echo ($v['tid']); ?>"  onclick="tree_deatil(this)" >巡查记录</a>||

              <a href="javascript:;"  tid="<?php echo ($v['tid']); ?>"  onclick="tree_process(this)" >处理记录</a>|| -->
             <!--  <a href="javascript:;"   tid="<?php echo ($v['tid']); ?>" line_id="<?php echo ($v['line_id']); ?>" onclick="edit_tree(this)">修改</a>|| -->

            <!--   <a href="javascript:;"  tid="<?php echo ($v['tid']); ?>" onclick="delete_tree(this)">删除</a>   -->
              </td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div align="center"> <?php echo ($pagehtml); ?></div>
      </div>
       </div>
     
    </div>
  
  </div>
  
  <!--  <div class="modal fade" id="data-filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
   data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content" id="data-filter-content" style="width:1200px;height:1300px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">数据筛选</h4></div>
        <div class="modal-body" >
          <form id="bjy-form" class="form-inline"  action="<?php echo U('Admin/Nav/edit');?>" method="post">
              <p> 
              <input class="" type="checkbox" id="select-base-all" onchange="selectBaseAll(this);">全选
           
              </p>   
                
          <ul class="list-group" id="basedata" >
          <li class="list-group-item " style="font-weight:bold;">隐患单位  

          </li>
          <li class="list-group-item">
          编号（系统编号）<input class="" type="checkbox" value="t-tid" name="showdata" checked="checked">   
          运行单位 <input class="" type="checkbox" value="t-accountability_department" name="showdata" checked="checked">  
          序号 <input class="" type="checkbox" value="t-accountability_number" name="showdata">               
          责任班组<input class="" type="checkbox" value="t-accountability_group" name="showdata" checked="checked"> 
          巡视段责任人<input class="" type="checkbox" value="t-accountability_person" name="showdata" checked="checked">
          </li>
          <li class="list-group-item " style="font-weight:bold;">隐患所属地点  
          </li>
          <li class="list-group-item">
              县<input class="" type="checkbox" value="t-county" name="showdata" checked="checked">
              镇<input class="" type="checkbox" value="t-town" name="showdata" checked="checked">
              村 <input class="" type="checkbox" value="t-village" name="showdata" checked="checked"> 
            </li>
            <li class="list-group-item " style="font-weight:bold;">隐患所处位置  
            </li>
            <li class="list-group-item"> 
           线路名称<input class="" type="checkbox" value="t-device_name" name="showdata" checked="checked">
           小号杆（塔周围时大小号杆相同）<input class="" type="checkbox" value="t-star_tower" name="showdata" checked="checked">
           大号杆（塔周围时大小号杆相同）<input class="" type="checkbox" value="t-end_tower" name="showdata" checked="checked">
           隐患序号<input class="" type="checkbox" value="t-danger_num" name="showdata" checked="checked">
          </li>
          <li class="list-group-item " style="font-weight:bold;">隐患总体量 
          </li>
          <li class="list-group-item"> 
              首次调查人<input class="" type="checkbox" value="t-first_check_person" name="showdata" checked="checked">
              首次隐患调查、测量日期<input class="" type="checkbox" value="t-first_check_time" name="showdata" checked="checked">
              首次上报时间<input class="" type="checkbox" value="t-first_upload_time" name="showdata">
            </li>
            <li class="list-group-item"> 
              树障存在的状态<input class="" type="checkbox" value="t-tree_status" name="showdata" checked="checked">
              树障种类 <input class="" type="checkbox" value="t-tree_type" name="showdata" checked="checked">
            </li>
            <li class="list-group-item"> 
              保护区范围外(如超高树木、上山侧等)是否有需要处理的树障 <input class="" type="checkbox" value="t-tree_danger" name="showdata">
              结合地形砍够保护区及保护区附近需处理的隐患树障数量（棵、墩数） <input class="" type="checkbox" value="t-tree_danger_num" name="showdata">
            </li>
            <li class="list-group-item"> 
              结合地形砍够保护区及保护区附近需处理的隐患树障数量单位（棵、墩） <input class="" type="checkbox" value="t-tree_danger_num_unit" name="showdata">
              结合地形砍够保护区及保护区附近需处理的隐患树障数量(亩数) <input class="" type="checkbox" value="t-tree_danger_area" name="showdata">
            </li>
            <li class="list-group-item"> 
              结合地形砍够保护区及保护区附近需处理的隐患树障数量单位（亩） <input class="" type="checkbox" value="t-tree_danger_area_unit" name="showdata">
              结合地形砍够保护区及保护区附近需处理的隐患树障树高（m） <input class="" type="checkbox" value="t-tree_danger_height" name="showdata">           
            </li>
            <li class="list-group-item"> 
              结合地形砍够保护区及保护区附近需处理的隐患树木胸径范围(cm)<input class="" type="checkbox" value="t-average_radius" name="showdata">
              树木平均高度(m)<input class="" type="checkbox" value="t-average_height" name="showdata">
            </li>
          </ul>
          <p> 
         <input class="" type="checkbox" id="select-detail-all" onchange="selectDetailAll(this);">全选
         </p> 
         <ul class="list-group" id="detail_data">
            <li class="list-group-item " style="font-weight:bold;">隐患最新情况
            </li>
            <li class="list-group-item"> 
                更新时间（最新隐患调查、测量日期）<input class="" type="checkbox" value="t-detail_last_time" name="showdata" checked="checked">
                更新人（最新隐患调查人）<input class="" type="checkbox" value="t-datail_check_person" name="showdata" checked="checked">
                测量时刻(更新时间。到时、分)<input class="" type="checkbox" value="t-datail_check_time" name="showdata" >
              </li>
              <li class="list-group-item " style="font-weight:bold;">隐患最新情况（程度）
              </li>
              <li class="list-group-item">     
                  隐患级别（最新隐患）<input class="" type="checkbox" value="t-datail_danger_degree" name="showdata" checked="checked">
            
                  测量变化<input class="" type="checkbox" value="t-datail_check_change_conclusion" name="showdata">
                  测量结论处理<input class="" type="checkbox" value="t-datail_check_process_conclusion" name="showdata">
                  测量结论位置<input class="" type="checkbox" value="t-datail_check_posistion_conclusion" name="showdata" checked="checked">
                  
                </li>
                <li class="list-group-item " style="font-weight:bold;">隐患最新情况（表象）
                </li>
                <li class="list-group-item">       
                    最危急树障种类<input class="" type="checkbox" value="t-datail_tree_type" name="showdata">
                    最危急树障数量(棵数、墩数)<input class="" type="checkbox" value="t-datail_tree_num" name="showdata">
                    最危急树障数量单位（棵、墩）<input class="" type="checkbox" value="t-datail_tree_num_unit" name="showdata">
                    最危急树障数量(亩数) <input class="" type="checkbox" value="t-datail_tree_area" name="showdata">
                    最危急树障数量单位（亩）<input class="" type="checkbox" value="t-datail_tree_area_unit" name="showdata">
                    最危急树障树高（米）<input class="" type="checkbox" value="t-datail_tree_height" name="showdata">
                    最危急树障导线对树木水平距离（米<input class="" type="checkbox" value="t-datail_tree_horizontal" name="showdata">
                    最危急树障导线对树木垂直距离（米） <input class="" type="checkbox" value="t-datail_tree_vertical" name="showdata">
                    最危急树障导线对地（米）<input class="" type="checkbox" value="t-datail_tree_grand_height" name="showdata">
                    是否高出导线<input class="" type="checkbox" value="t-datail_tree_over" name="showdata">
                    最终自然生长高度是否构成紧急级别隐患<input class="" type="checkbox" value="t-datail_final_danger" name="showdata" checked="checked">
                  </li>

                  <li class="list-group-item " style="font-weight:bold;">隐患最新情况（监测）</li>
                    <li class="list-group-item">                     
                        测量方法<input class="" type="checkbox" value="t-detail_check_method" name="showdata">
                        气温（℃）<input class="" type="checkbox" value="t-detail_temperature" name="showdata">
                        负荷（A）<input class="" type="checkbox" value="t-detail_load" name="showdata">
             
                    </li>
                  <li class="list-group-item " style="font-weight:bold;">隐患来源</li>
                    <li class="list-group-item">                     
                        是否建设遗留<input class="" type="checkbox" value="t-detail_retain" name="showdata">            
                    </li>
                  <li class="list-group-item " style="font-weight:bold;">隐患权属人信息
                  </li>
                  <li class="list-group-item">     
                      种植物权属方－联系人地址<input class="" type="checkbox" value="t-detail_address" name="showdata">                      
                      种植物权属方－联系人姓名<input class="" type="checkbox" value="t-detail_owner" name="showdata">
                      种植物权属方－联系人电话<input class="" type="checkbox" value="t-detail_phone" name="showdata">
                      高杆植物种植时间<input class="" type="checkbox" value="t-detail_plant_time" name="showdata">
                   </li>
                   <li class="list-group-item " style="font-weight:bold;">隐患处理与管控
                    </li>
                    <li class="list-group-item">     
                        青赔情况<input class="" type="checkbox" value="t-detail_compensation_condition" name="showdata">                      
                        线路建设时协议签定情况<input class="" type="checkbox" value="t-detail_build_deal" name="showdata">
                        运行过程中协议情况<input class="" type="checkbox" value="t-detail_run_deal" name="showdata">
                        隐患通知书编号、情况<input class="" type="checkbox" value="t-detail_notice_number" name="showdata">
                     </li>
          <li class="list-group-item" style="font-weight:bold;">系统新增数据 
            </li>
            <li class="list-group-item">
             
          
           更新时间<input class="" type="checkbox" value="t-datail_update_time" name="showdata">   
           更新人<input class="" type="checkbox" value="t-datail_update_person" name="showdata">              
           更新班组<input class="" type="checkbox" value="t-datail_update_group" name="showdata">
           立地条件 <input class="" type="checkbox" value="t-site_condition" name="showdata">
        
           是否处理 <input class="" type="checkbox" value="t-processed" name="showdata">
           截止时间<input class="" type="checkbox" value="t-dead_line_time" name="showdata">
          </li>
          </ul>
            <div class="text-center">
            <input style="width:6%" class="btn btn-sm btn-success " type="button" onclick="saveDataFilter(this)"  value="确定">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 

 -->





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

   /*  function selectBaseAll()
     {
     	if(document.getElementById("select-base-all").checked)
     	{
     		 $("#basedata :checkbox,#all").prop("checked", true);  
     	}else
     	{
     	
     		$("#basedata :checkbox,#all").prop("checked", false);  
     	}
     }
      function selectDetailAll()
     {
      if(document.getElementById("select-detail-all").checked)
      {
         $("#detail_data :checkbox,#all").prop("checked", true);  
      }else
      {
      
        $("#detail_data :checkbox,#all").prop("checked", false);  
      }
     }
    function dataFilter()
    {
        // var tid=$(obj).attr('tid');
         document.getElementById("data-filter-content").style.marginLeft="-50%";
         $('#data-filter').modal('show');
   
    }
     function saveDataFilter()
    {


       obj = document.getElementsByName("showdata");
       showdata = [];
       for(k in obj){
        if(obj[k].checked)
            showdata.push(obj[k].value);
      }
      $('#data-filter').modal('hide');

      
      sessionStorage.setItem("showdata",showdata)
      submitForm()
    
   
    }*/

    function submitForm()
     {
      sessionStorage.setItem("voltage_degree",document.getElementById("voltage_degree").value);
      sessionStorage.setItem("line_id",document.getElementById("line_id").value); 
      sessionStorage.setItem("county",document.getElementById("county").value); 
      sessionStorage.setItem("town",document.getElementById("town").value); 
      sessionStorage.setItem("village",document.getElementById("village").value);  
      sessionStorage.setItem("datail_danger_degree",document.getElementById("datail_danger_degree").value);  
      sessionStorage.setItem("tree_status",document.getElementById("tree_status").value);  
      sessionStorage.setItem("star_tower",document.getElementById("star_tower").value);  
      sessionStorage.setItem("end_tower",document.getElementById("end_tower").value);  
      sessionStorage.setItem("orderBy",document.getElementById("orderBy").value); 
      



    

      var form = document.getElementById("my_form");//获取form表单对象
      form.submit();//form表单提交
     }
    
    

    
    
     </script>

    




    <script type="text/javascript">
    $(document).ready(function()
    {

 
    /* var showdataString=sessionStorage.getItem("showdata")
     
     if(showdataString!=null)
     {
      var showdata=showdataString.split(',');
      var showtable = document.getElementsByName("showdata");
       for(i=0;i<showtable.length;i++)
       {
        for(j=0;j<showdata.length;j++)
        {
            if(showtable[i].value == showdata[j])
            {
                showtable[i].checked = true;
                break
            }
        }
        }
   
    }
     else
     {
       // $("#basedata :checkbox,#all").prop("checked", true); 


       obj = document.getElementsByName("showdata");
       showdata = [];
       for(k in obj){
        if(obj[k].checked)

            showdata.push(obj[k].value);
      }
     }


      // alert(showdata[0]);
      // 
       for(var i=0;i<showdata.length;i++)
      {

          var showitem=showdata[i];
          var temp="#"+showitem;
          if(!(temp=="#"))
          {
          $("#data-table tr").find(temp).show(); 
          var iindex=($("#data-table tr").find(temp).index());
          var needfind="td:eq("+iindex+")"
          $("#data-table tr").find(needfind).show();
          }
        
      }*/


      $("#voltage_degree").val(sessionStorage.getItem("voltage_degree"))
      $("#line_id").val(sessionStorage.getItem("line_id"))
      $("#county").val(sessionStorage.getItem("county"))
      $("#town").val(sessionStorage.getItem("town"))

      $("#village").val(sessionStorage.getItem("village"))
      $("#tree_status").val(sessionStorage.getItem("tree_status"))
      $("#star_tower").val(sessionStorage.getItem("star_tower"))
      $("#end_tower").val(sessionStorage.getItem("end_tower"))
      $("#datail_danger_degree").val(sessionStorage.getItem("datail_danger_degree"))
      $("#orderBy").val(sessionStorage.getItem("orderBy"))
   
      
    });   
  </script>

   <script>
    var BASE_URL = '/ts/Public/statics/webuploader-0.1.5';
</script>
<script src="/ts/Public/statics/js/webuploader.min.js"></script> 
 </body>
</html>