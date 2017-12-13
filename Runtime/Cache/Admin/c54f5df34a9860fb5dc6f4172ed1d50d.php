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
            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
                    <li >
                     <a href="/ts/index.php/Admin/Tree/index/group_id/<?php echo ($group_id); ?>" >树片列表</a></li>
                     <li>  <a href="javascript:;"   class="btn disabled" data-toggle="tab">树片详情</a></li>
                     <li>  <a href="javascript:;"   class="btn disabled" data-toggle="tab">巡检记录</a></li>
                     <li>  <a href="javascript:;"   class="btn disabled"     data-toggle="tab">处理记录</a></li>
                    </ul> 

                 
    <table class="table table-striped table-bordered table-hover table-condensed" >

        <tr>
                <th rowspan="4">隐患单位</th>      
                <th colspan="1">运行单位</th>
                <td><input style="width:80%" type="text" name="accountability_department" id="accountability_department"></td>                
        </tr>
        <tr>
                <th colspan="1">序号</th> 
                <td><input  style="width:80%" type="text" name="accountability_number"  id="accountability_number" ></td>
                
        </tr>
<tr>
                <th colspan="1">责任班组</th>
                <td>
                                <select style="width:80%" name="accountability_group" id="accountability_group"  >
                                <option value ="">责任班组</option>
                                <option value ="输电线路1班">输电线路1班</option>
                                <option value ="输电线路2班">输电线路2班</option>
                                <option value ="输电线路3班县">输电线路3班</option>
                                <option value="输电线路4班">输电线路4班</option>
                                <option value="输电线路5班市4">输电线路5班</option>
                                <option value ="输电线路6班">输电线路6班</option>
                                <option value ="输电线路7班">输电线路7班</option>
                                <option value ="输电线路8班县">输电线路8班</option>
                                <option value="输电线路9班">输电线路9班</option>
                                <option value="输电电缆班">输电电缆班</option>
                                <option value="管理人员">管理人员</option>
                                <option value="连南组">连南组</option>
                                <option value="英德组输电一班">英德组输电一班</option>
                                <option value="英德组输电二班">英德组输电二班</option>
                                <option value="英德组输电三班">英德组输电三班</option>
                                </select></td>
</tr>
<tr>
                <th colspan="1">巡视段责任人</th>
                <td><input  style="width:80%" type="text" name="accountability_person" id="accountability_person"></td>                
</tr>        
<form class="form-inline" action="" id="select_form">                                           
<tr>
                <th rowspan="3">隐患所属点</th>
                <th colspan="1">县</th>
                <td colspan="1">
                                <select  style="width:80%"  name="county"  id="county" onchange="submitForm();">
                                                <option value ="">县区</option>
                                                <option value ="1">清城区</option>
                                                <option value ="2">清新县</option>
                                                <option value="3">佛冈县</option>
                                                <option value="4">英德市</option>
                                                <option value ="5">阳山县</option>
                                                <option value ="6">连州市</option>
                                                <option value ="7">连南县</option>
                                                <option value="8">连山县</option>
                                                
                                </select></td>
</tr>
<tr>
                <th colspan="1">镇</th>
                <td>
                                <select  style="width:80%"  name="town"   id="town" onchange="submitForm();">
                                        <option value ="">镇</option>
                                        <?php if(is_array($querydata['towns'])): foreach($querydata['towns'] as $key=>$v): ?><option value ="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
                                </select>
                        </td>
</tr>
<tr>
                <th colspan="1">村</th>
                <td>
                                <select  style="width:80%"  name="village"  id="village" onchange="submitForm();">
                                        <option value ="">村</option>
                                        <?php if(is_array($querydata['villages'])): foreach($querydata['villages'] as $key=>$v): ?><option value ="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
                                </select>
                        </td>

</tr>
<tr>
                <th rowspan="5">隐患所处位置</th>
                <th colspan="1">电压等级（KV）</th>
                <td> 
                                <select  style="width:80%"  name="voltage_degree" id="voltage_degree" onchange="submitForm();">
                                        <option value ="" >电压等级</option>
                                        <option value ="500">500kV</option>
                                        <option value ="220" >220kV</option>
                                        <option value="110" >110kV</option>
                                        <option value="35"  >35kV</option>
                                </select>
                    </td>
</tr>
<tr>
                <th colspan="1">线路名称</th>
                <td>
                                <!-- <select  style="width:80%"  name="line_id" id="line_id" onchange="submitForm();">
                                <option value ="">全部线路</option>
                                <?php if(is_array($querydata['device_lines'])): foreach($querydata['device_lines'] as $key=>$v): ?><option value ="<?php echo ($v['did']); ?>"><?php echo ($v['voltage_degree']); ?>kV<?php echo ($v['device_name']); ?></option><?php endforeach; endif; ?>
                                </select> -->
                      <input  list="datalist" placeholder="线路名称" type="text" style="width: 80%;" name="line_id" id="line_id" /> 
                      <datalist id="datalist">
                      <?php if(is_array($querydata['device_lines'])): foreach($querydata['device_lines'] as $key=>$v): ?><option value ="<?php echo ($v['device_name']); ?>"></option><?php endforeach; endif; ?>

                    </td>
</tr>
</form>
<form action="" method="POST" id="data_form">                 
<tr>
                <th colspan="1">小号杆（塔周围时大小号杆相同）</th>
                <td><input  style="width:80%" type="text" name="star_tower" id="star_tower"></td>
                
</tr>
<tr>
                <th colspan="1">大号杆（塔周围时大小号杆相同）</th>
                <td><input  style="width:80%" type="text" name="end_tower" id="end_tower"></td>
</tr>
<tr>
                <th colspan="1">隐患序号</th>
                <td><input  style="width:80%" type="text" name="danger_num" id="danger_num"></td>                
</tr>
<tr>
                <th rowspan="13">隐患总体量</th>
                <th colspan="1">首次调查人</th>
                <td><input  style="width:80%" type="text" name="first_check_person" id="first_check_person"></td>                
</tr>
<tr>
        <th colspan="1">首次隐患调查日期</th>
        <td><input  style="width:80%" type="date" name="first_check_time" id="first_check_time" ></td>                
</tr>
<tr>
                <th colspan="1">首次上报日期</th>
                <td><input  style="width:80%" type="date" name="first_upload_time" id="first_upload_time" ></td>                
</tr>
<tr>
                <th colspan="1">树障存在的状态</th>
                <td>
                 <select  style="width:80%"  name="tree_status" id="tree_status" onchange="submitForm();">
                                        <option value ="未处理" >未处理</option>
                                        <option value ="翻生">翻生</option>
                                        <option value ="已彻底处理(含树桩)" >已彻底处理(含树桩)</option>
                                        <option value="一直无树竹" >一直无树竹</option>
                                        
               </select> 
                </td>

</tr>
<tr>
                <th colspan="1">树障种类</th>
                <td><input  style="width:80%" type="text" name="tree_type" id="tree_type"></td>
                
</tr>
<tr>
                <th colspan="1">保护区范围外(如超高树木、上山侧等)是否有需要处理的树障</th>
                <td><select  style="width:80%"  name="tree_danger"  id="tree_danger" value ="1">
                                <option value ="1" >是</option>
                                <option value ="0">否</option>     
                                
                                   </select>
                        </td>
</tr>
<tr>
                <th colspan="1">结合地形砍够保护区及保护区附近需处理的隐患树障数量（棵、墩数）</th>
                <td><input  style="width:80%" type="text" name="tree_danger_num" id="tree_danger_num"></td>
                
</tr>
<tr>
                <th colspan="1">结合地形砍够保护区及保护区附近需处理的隐患树障数量单位（棵、墩）</th>
                <td><input  style="width:80%" type="text" name="tree_danger_num_unit" id="tree_danger_num_unit"></td>
                
</tr>
<tr>
                <th colspan="1">结合地形砍够保护区及保护区附近需处理的隐患树障数量(亩数)</th>
                <td><input  style="width:80%" type="text" name="tree_danger_area"  id="tree_danger_area"></td>
                
</tr>
<tr>
                <th colspan="1">结合地形砍够保护区及保护区附近需处理的隐患树障数量单位（亩）</th>
                <td><input  style="width:80%" type="text" name="tree_danger_area_unit"  id="tree_danger_area_unit"></td>
                
</tr>
<tr>
                <th colspan="1">结合地形砍够保护区及保护区附近需处理的隐患树障树高（m）</th>
                <td><input  style="width:80%" type="text" name="tree_danger_height" id="tree_danger_height"></td>
                
</tr>
<tr>
                <th colspan="1">结合地形砍够保护区及保护区附近需处理的隐患树木胸径范围(cm)</th>
                <td><input  style="width:80%" type="text" name="average_radius" id="average_radius"></td>
                
</tr>
<tr>
                <th colspan="1">树木平均高度(m)</th>
                <td><input  style="width:80%" type="text" name="average_height" id="average_height"></td>
                
</tr>
<tr>
        <th rowspan="3">隐患最新情况</th>
        <th colspan="1">更新时间（最新隐患调查、测量日期） </th>
        <td><input  style="width:80%"   type="date" name="detail_last_time" id="detail_last_time" ></td>
        
</tr>
<tr>

        <th colspan="1">更新人（最新隐患调查人）</th>
        <td><input  style="width:80%" type="text" name="datail_check_person" id="datail_check_person"></td>
        
</tr>
<tr>
                <th colspan="1">测量时刻(更新时间。到时、分)</th>
                <td><input  style="width:80%"   type="datetime-local" name="datail_check_time" id="datail_check_time" ></td>
                
</tr>
<tr>
                <th rowspan="3">隐患最新情况（程度）</th>
                <th colspan="1">隐患级别（最新隐患）</th>
                <td><input  style="width:80%" type="text" name="datail_danger_degree" id="datail_danger_degree"></td>
                
</tr>
<tr>
                <th colspan="1">测量结论(级别变化)</th>
                <td><input  style="width:80%" type="text" name="datail_check_change_conclusion" id="datail_check_change_conclusion"></td>
                
</tr>
<tr>
                <th colspan="1">测量结论(处理)</th>
                <td><input  style="width:80%" type="text" name="datail_check_process_conclusion" id="datail_check_process_conclusion"></td>
                
</tr>
<tr>
                <th rowspan="1">隐患最新情况（位置）</th>                
                <th colspan="1">测量结论(位置)</th>
                <td><input  style="width:80%" type="text" name="datail_check_posistion_conclusion" id="datail_check_posistion_conclusion"></td>
                
</tr>
<tr>
                <th rowspan="11">隐患最新情况（表象）</th>
                <th colspan="1">最危急树障种类</th>
                <td><input  style="width:80%" type="text" name="datail_tree_type" id="datail_tree_type"></td>
                
</tr>
<tr>
                <th colspan="1">最危急树障数量(棵数、墩数)</th>
                <td><input  style="width:80%" type="text" name="datail_tree_num" id="datail_tree_num"></td>
                
</tr>
<tr>
                <th colspan="1">最危急树障数量单位（棵、墩）</th>
                <td><input  style="width:80%" type="text" name="datail_tree_num_unit" id="datail_tree_num_unit"></td>
                
</tr>
<tr>
                <th colspan="1">最危急树障数量(亩数)</th>
                <td><input  style="width:80%" type="text" name="datail_tree_area" id="datail_tree_area"></td>
                
</tr>
<tr>
                <th colspan="1">最危急树障数量单位（亩）</th>
                <td><input  style="width:80%" type="text" name="datail_tree_area_unit" id="datail_tree_area_unit"></td>
                
</tr>
<tr>
                <th colspan="1">最危急树障树高（米）</th>
                <td><input  style="width:80%" type="text" name="datail_tree_height" id="datail_tree_height"></td>
                
</tr>
<tr>
                <th colspan="1">最危急树障导线对树木水平距离（米）</th>
                <td><input  style="width:80%" type="text" name="datail_tree_horizontal" id="datail_tree_horizontal"></td>
                
</tr>
<tr>
                <th colspan="1">最危急树障导线对树木垂直距离（米）</th>
                <td><input  style="width:80%" type="text" name="datail_tree_vertical" id="datail_tree_vertical"></td>
                
</tr>
<tr>
                <th colspan="1">最危急树障导线对地（米）</th>
                <td><input  style="width:80%" type="text" name="datail_tree_grand_height" id="datail_tree_grand_height"></td>
                
</tr>
<tr>
                <th colspan="1">是否高出导线</th>
                <td>
                                <select  style="width:80%"   id="datail_tree_over" name="datail_tree_over" id="datail_tree_over">
                                         <option value ="1" >是</option>
                                         <option value ="0">否</option>  
                                         </select></td>
</tr>
<tr>
                <th colspan="1">最终自然生长高度是否构成紧急级别隐患</th> 
                <td>
                                <select  style="width:80%"    name="datail_final_danger" id="datail_final_danger" value ="1">
                                         <option value ="1" >是</option>
                                         <option value ="0">否</option>  
                                         </select></td>
</tr>
<tr>
        <th rowspan="3">隐患最新情况（监测）</th>
        <th colspan="1">测量方法</th> 
        <td><input  style="width:80%" type="text" name="detail_check_method" id="detail_check_method"></td>
        
</tr>
<tr>
        <th colspan="1">气温（℃）</th> 
        <td><input  style="width:80%" type="text" name="detail_temperature" id="detail_temperature"></td>
        
</tr>
<tr>
        <th colspan="1">负荷（A）</th> 
        <td><input  style="width:80%" type="text" name="detail_load" id="detail_load"></td>
        
</tr>
<tr>
        <th rowspan="1">隐患来源</th>
        <th colspan="1">是否建设遗留</th> 
        <td>
                        <select  style="width:80%"    name="detail_retain" id="detail_retain" value ="0">
                            <option value ="0">否</option>     
                            <option value ="1" >是</option>     
                               </select></td>        
</tr>
<tr>
                <th rowspan="4">隐患权属人信息</th>
                <th colspan="1">种植物权属方－联系人地址</th> 
                <td><input  style="width:80%" type="text" name="detail_address" id="detail_address"></td>
                
</tr>
<tr>
        <th colspan="1">种植物权属方－联系人姓名</th> 
        <td><input  style="width:80%" type="text" name="detail_owner" id="detail_owner"></td>
        
</tr>
<tr>
                <th colspan="1">种植物权属方－联系人电话</th> 
                <td><input  style="width:80%" type="text" name="detail_phone" id="detail_phone"></td>
                
</tr>
<tr>
                <th colspan="1">高杆植物种植时间</th> 
                <td><input  style="width:80%" type="text" name="detail_plant_time" id="detail_plant_time"></td>
                
</tr>
<tr>
        <th rowspan="4">隐患处理与管控</th>
        <th colspan="1">青赔情况</th> 
        <td><input  style="width:80%" type="text" name="detail_compensation_condition" id="detail_compensation_condition"></td>
        
</tr>
<tr>
        <th colspan="1">线路建设时协议签定情况</th> 
        <td><input  style="width:80%" type="text" name="detail_build_deal" id="detail_build_deal"></td>

</tr>
<tr>
        <th colspan="1">运行过程中协议情况</th> 
        <td><input  style="width:80%" type="text" name="detail_run_deal" id="detail_run_deal"></td>
        
</tr>
<tr>
        <th colspan="1">隐患通知书编号、情况</th> 
        <td><input  style="width:80%" type="text" name="detail_notice_number" id="detail_notice_number"></td>
        
</tr>

<tr>
                <th rowspan="2">系统新增</th>
                <th colspan="1">截止时间</th> 
                <td><input  style="width:80%" type="date" name="dead_line_time" id="dead_line_time" ></td>
                        
</tr>
<tr>
                <th colspan="1">是否处理</th> 
                <td>
                                <select  style="width:80%"    name="processed" id="processed" value ="0">
                                    <option value ="0">否</option>     
                                    <option value ="1" >是</option>     
                                       </select></td>
</tr>
</form>
</table>
</div> 
<div class="text-center">
        <input style="width:8%" class="btn btn-sm btn-success "  type="button" onclick="tree_add_record()"  value="确定">
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
  
<script type="text/javascript">
    function submitForm()
     {
      sessionStorage.setItem("voltage_degree",document.getElementById("voltage_degree").value);
      sessionStorage.setItem("line_id",document.getElementById("line_id").value); 
      sessionStorage.setItem("county",document.getElementById("county").value); 
      sessionStorage.setItem("town",document.getElementById("town").value); 
      sessionStorage.setItem("village",document.getElementById("village").value);
//       sessionStorage.setItem("data_county",document.getElementById("county").options[document.getElementById("county").selectedIndex].text); 
//       sessionStorage.setItem("data_town",document.getElementById("town").options[document.getElementById("town").selectedIndex].text); 
//       sessionStorage.setItem("data_village",document.getElementById("village").options[document.getElementById("village").selectedIndex].text); 
      sessionStorage.setItem("accountability_department",document.getElementById("accountability_department").value); 
      sessionStorage.setItem("accountability_group",document.getElementById("accountability_group").value); 
      sessionStorage.setItem("accountability_person",document.getElementById("accountability_person").value); 
      sessionStorage.setItem("accountability_number",document.getElementById("accountability_number").value); 
      var form = document.getElementById("select_form");//获取form表单对象
      form.submit();//form表单提交
     }

     function tree_add_record()
     {
     $.ajax({
          type:"POST",
           url:"/ts/index.php/Admin/Tree/add",
           data:{
           accountability_department:$("#accountability_department").val(),
           accountability_number:$("#accountability_number").val(),
           accountability_group:$("#accountability_group").val(),
           accountability_person:$("#accountability_person").val(),
           county:$("#county").val(),
           town:$("#town").val(),
           village:$("#village").val(),
           line_id:$("#line_id").val(),
           voltage_degree:$("#voltage_degree").val(),
           star_tower:$("#star_tower").val(),
           end_tower:$("#end_tower").val(),
           danger_num:$("#danger_num").val(),
           first_check_person:$("#first_check_person").val(),
           first_check_time:$("#first_check_time").val(),
           first_upload_time:$("#first_upload_time").val(),            
           tree_status:$("#tree_status").val(),
           tree_type:$("#tree_type").val(),
           tree_danger:$("#tree_danger").val(),
           tree_danger_num:$("#tree_danger_num").val(),
           tree_danger_num_unit:$("#tree_danger_num_unit").val(),
           tree_danger_area:$("#tree_danger_area").val(),
           tree_danger_area_unit:$("#tree_danger_area_unit").val(),
           tree_danger_height:$("#tree_danger_height").val(),
           average_radius:$("#average_radius").val(),
           average_height:$("#average_height").val(), 
           dead_line_time:$("#dead_line_time").val(),
           processed:$("#processed").val(),
            detail_last_time:$("#detail_last_time").val(),
            datail_check_person:$("#datail_check_person").val(),
            datail_check_time:$("#datail_check_time").val(),
            datail_danger_degree:$("#datail_danger_degree").val(),
            datail_check_change_conclusion:$("#datail_check_change_conclusion").val(),
            datail_check_process_conclusion:$("#datail_check_process_conclusion").val(),
            datail_check_posistion_conclusion:$("#datail_check_posistion_conclusion").val(),
            datail_tree_type:$("#datail_tree_type").val(),
            datail_tree_num:$("#datail_tree_num").val(),
            datail_tree_num_unit:$("#datail_tree_num_unit").val(),
            datail_tree_area:$("#datail_tree_area").val(),
            datail_tree_area_unit:$("#datail_tree_area_unit").val(),
            datail_tree_height:$("#datail_tree_height").val(),
            datail_tree_horizontal:$("#datail_tree_horizontal").val(),
            datail_tree_vertical:$("#datail_tree_vertical").val(),
            datail_tree_grand_height:$("#datail_tree_grand_height").val(),
            datail_tree_over:$("#datail_tree_over").val(),
            datail_final_danger:$("#datail_final_danger").val(),
            detail_check_method:$("#detail_check_method").val(),
            detail_temperature:$("#detail_temperature").val(),
            detail_load:$("#detail_load").val(),
            detail_retain:$("#detail_retain").val(),
            detail_address:$("#detail_address").val(),
            detail_owner:$("#detail_owner").val(),
            detail_phone:$("#detail_phone").val(),
            detail_plant_time:$("#detail_plant_time").val(),
            detail_compensation_condition:$("#detail_compensation_condition").val(),
            detail_build_deal:$("#detail_build_deal").val(),
            detail_run_deal:$("#detail_run_deal").val(),
            detail_notice_number:$("#detail_notice_number").val(),
        },
             success:function(msg){
                console.log(msg);
                if(msg.status==0)
                {
                 alert(msg.info);
                }else
                {
                 alert("增加成功"); }
                // alert(msg);
                // if(msg==1)parent.location.reload();
                // window.location.href="Admin/Tree/index/group_id/<?php echo ($group_id); ?>";
            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          })
          window.location.href="/ts/index.php/Admin/Tree/index/group_id/<?php echo ($group_id); ?>";

}


</script>

 <script type="text/javascript">
    $(document).ready(function()
    {      
      $("#voltage_degree").val(sessionStorage.getItem("voltage_degree"))
      $("#line_id").val(sessionStorage.getItem("line_id"))
      $("#county").val(sessionStorage.getItem("county"))
      $("#town").val(sessionStorage.getItem("town"))
      $("#village").val(sessionStorage.getItem("village"))
      $("#accountability_department").val(sessionStorage.getItem("accountability_department"))
      $("#accountability_group").val(sessionStorage.getItem("accountability_group"))
      $("#accountability_person").val(sessionStorage.getItem("accountability_person"))
      $("#accountability_number").val(sessionStorage.getItem("accountability_number"))
//       $("input[name='data_county']").val(sessionStorage.getItem("data_county"))
//       $("input[name='data_town']").val(sessionStorage.getItem("data_town"))
//       $("input[name='data_village']").val(sessionStorage.getItem("data_village"))
//       $("input[name='data_accountability_department']").val(sessionStorage.getItem("data_accountability_department"))
//       $("input[name='data_accountability_group']").val(sessionStorage.getItem("data_accountability_group"))
//       $("input[name='data_accountability_person']").val(sessionStorage.getItem("data_accountability_person"))
//       $("input[name='data_accountability_number']").val(sessionStorage.getItem("data_accountability_number"))
//       $("input[name='accountability_department']").val(sessionStorage.getItem("data_accountability_department"))
//       $("input[name='accountability_group']").val(sessionStorage.getItem("data_accountability_group"))
//       $("input[name='accountability_person']").val(sessionStorage.getItem("data_accountability_person"))
//       $("input[name='accountability_number']").val(sessionStorage.getItem("data_accountability_number"))

    }); 

// function textChanged1()
// {
// document.getElementById('accountability_group').value=
// document.getElementById('data_accountability_group').value;
// } ; 
// function textChanged2()
// {
// document.getElementById('accountability_person').value=
// document.getElementById('data_accountability_person').value;
// };
// function textChanged3()
// {
// document.getElementById('accountability_department').value=
// document.getElementById('data_accountability_department').value;
// };
// function textChanged4()
// {
// document.getElementById('accountability_number').value=
// document.getElementById('data_accountability_number').value;
// };

  </script>

   <script>
    var BASE_URL = '/ts/Public/statics/webuploader-0.1.5';
</script>
<script src="/ts/Public/statics/js/webuploader.min.js"></script> 
 </body>
</html>