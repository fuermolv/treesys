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
     <a href="/ts/index.php/Admin/Index/index" class="navbar-brand"><img  src="/ts/tpl/Public/images/nanwang.png" /><small> </small></a>
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
         <a href="/ts/index.php/Admin/Tree/index/group_id/<?php echo ($group_id); ?>" >树障列表</a></li>

        <li class="active">  <a href="javascript:;" data-toggle="tab">树障详情</a></li>
        <li>  <a href="/ts/index.php/Admin/TreeDetail/index/tid/<?php echo ($tid); ?>" >巡检记录</a></li>
        <li>  <a href="/ts/index.php/Admin/TreeProcess/index/tid/<?php echo ($tid); ?>" >处理记录</a></li>
        <!-- <li>  <a href="/ts/index.php/Admin/TreeFly/index/group_id/<?php echo ($group_id); ?>/tid/<?php echo ($tid); ?>" >飞行记录</a></li> -->
        
           <!-- <li>
          <a href="/ts/index.php/Admin/Tree/add/group_id/<?php echo ($group_id); ?>"  >增加树障</a></li> -->
      </ul>
        <tr>
          <td>
            
            
           

               <a href="" style="width:10%" id="list_button" tid="<?php echo ($tid); ?>" class="btn btn-sm disabled"  >树障信息</a>


              <!--   <li class="dropdown btn btn-sm btn-success" style="width:10%">
                <a href="javascript:;" style="color:#FFFFFF" class="dropdown-toggle" data-toggle="dropdown">
                    修改或更新
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu"   style="z-index:9999;">
                  
                  
                    <li><a href="javascript:;" tid="<?php echo ($tid); ?>" line_id="{line_id}"  onclick="edit_tree(this);">修改基础信息</a></li>
                    <li><a href="javascript:;" tid="<?php echo ($tid); ?>"  onclick="add_detail(this);">更新巡检记录</a></li>

                   

                   

                </ul>
            </li> -->




              
               <input style="width:10%" id="edit_button" class="btn btn-sm btn-success"  type="button"   tid="<?php echo ($tid); ?>" line_id="{line_id}" onclick="edit_tree(this)" value="
               修改基本数据">
               <input style="width:10%" id="update_button" class="btn btn-sm btn-success"  type="button"   tid="<?php echo ($tid); ?>" onclick="add_detail(this)" value="
               更新巡检记录">
            
              <!--  <input style="width:6%" class="btn btn-sm btn-success" type="button" onclick="" value="树障归档"> -->
               <input style="width:10%" class="btn btn-sm btn-danger" type="button" tid="<?php echo ($tid); ?>"  onclick="delete_tree(this)" onclick="" value="删除树障">
           


        
          </td>
        </tr>
      </table>
     
      
     

 <div id="tree-base-content">

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><font size="2">树障当前状态：</font></a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#"><font size="2" color="red"><?php echo ($data[0]['tree_div']); ?></font></a></li>
           
            <li class="dropdown" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   更改
                    <b class="caret"></b>
                </a>
              
                <ul class="dropdown-menu" >
                  
                    <li class="divider"></li>
                    <li><a href="javascript:;" tid="<?php echo ($tid); ?>"  onclick="edit_order(this);">更改树障状态</a></li>

                </ul>
               
            </li>
        </ul>
    </div>
    </div>
</nav>

 
  <br/>
  <br/>



 <table class="table table-striped table-bordered table-hover table-condensed" >
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                <th  colspan="25"><font size="2" color="red">隐患基本信息</font></th>
              </tr>
                <tr>
                    <th colspan="4">隐患单位</th>
                    <th colspan="3">隐患所属点</th>
                    <th colspan="5">隐患所处位置</th>
                    <th colspan="13">隐患总体量</th>
                </tr>
                <tr>
                    <th colspan="1">运行单位</th>
                    <th colspan="1">序号</th>
                    <th colspan="1">责任班组</th>
                    <th colspan="1">巡视段责任人</th>
                    <th colspan="1">县</th>
                    <th colspan="1">镇</th>
                    <th colspan="1">村</th>
                    <th colspan="1">电压等级（KV）</th>
                    <th colspan="1">线路名称</th>
                    <th colspan="1">小号杆</th>
                    <th colspan="1">大号杆（</th>
                    <th colspan="1">隐患序号</th>
                    <th colspan="1">首次调查人</th>
                    <th colspan="1">首次隐患调查日期</th>
                    <th colspan="1">首次上报日期</th>
                    <th colspan="1">树障存在的状态</th>
                    <th colspan="1">树障种类</th>
                    <th colspan="1">保护区范围外是否有需要处理的树障</th>
                    <th colspan="1">需处理的隐患树障数量</th>
                    <th colspan="1">需处理的隐患树障数量单位</th>
                    <th colspan="1">隐患树障数量</th>
                    <th colspan="1">需处理的隐患树障数量单位</th>
                    <th colspan="1">需处理的隐患树障树高</th>
                    <th colspan="1">需处理的隐患树木胸径范围</th>
                    <th colspan="1">树木平均高度</th>
                </tr>
                    <tr>
                      <td  ><?php echo ($v['accountability_department']); ?></td>
                      <td  ><?php echo ($v['accountability_number']); ?></td> 
                      <td  ><?php echo ($v['accountability_group']); ?></td>
                      <td  ><?php echo ($v['accountability_person']); ?></td>
                      <td  ><?php echo ($v['county']); ?></td>
                      <td  ><?php echo ($v['town']); ?></td>                      
                      <td  ><?php echo ($v['village']); ?></td>
                      <td  ><?php echo ($v['voltage_degree']); ?>kV</td>                       
                      <td  ><?php echo ($v['voltage_degree']); ?>kV<?php echo ($v['device_name']); ?></td> 
                      <td  ><?php echo ($v['star_tower']); ?></td>
                      <td  ><?php echo ($v['end_tower']); ?></td>
                      <td  ><?php echo ($v['danger_num']); ?></td>
                      <td  ><?php echo ($v['first_check_person']); ?></td>
                      <td  ><?php echo (date('Y-m-d',$v['first_check_time'])); ?></td>              
                      <td  ><?php echo (date('Y-m-d',$v['first_upload_time'])); ?></td>              
                      <td  ><?php echo ($v['tree_status']); ?></td>
                      <td  ><?php echo ($v['tree_type']); ?></td>    
                      <td  ><?php if($v['tree_danger'] == '1'): ?>是
                            <?php else: ?> 否<?php endif; ?></td>                     
                        <td  ><?php echo ($v['tree_danger_num']); ?></td>
                        <td  ><?php echo ($v['tree_danger_num_unit']); ?></td>
                        <td  ><?php echo ($v['tree_danger_area']); ?></td>
                        <td  ><?php echo ($v['tree_danger_area_unit']); ?></td> 
                        <td  ><?php echo ($v['tree_danger_height']); ?></td> 
                        <td  ><?php echo ($v['average_radius']); ?></td>
                        <td  ><?php echo ($v['average_height']); ?></td>
                    </tr> 
                    </table>
                    <br/>
                    <br/>
                  
                   <table class="table table-striped table-bordered table-hover table-condensed" >

                    <tr>
                        <th colspan="26"><font size="2" color="red">隐患最新信息</font></th>
                      </tr>    
                    <tr>
                        <th colspan="7">隐患最新情况</th>
                        <th colspan="3">隐患最新情况（程度）</th>
                        <th colspan="1">隐患最新情况（位置）</th>
                        <th colspan="11">隐患最新情况（表象）</th>
                        <th colspan="3">隐患最新情况（监测）</th> 
                        <th colspan="1">隐患来源</th>                
 
                    </tr>
                    <tr>
                    <th colspan="1">最新隐患调查日期）</th>
                    <th colspan="1">最新隐患调查人</th>
                    <th colspan="1">测量时刻</th>
                    <th colspan="1">树木按地点属性</th>
                    <th colspan="1">是否新种、新移栽</th>
                    <th colspan="1">是否临近重大、一般缺陷</th>
                    <th colspan="1">是否会翻生</th>
                    <th colspan="1">隐患级别</th>
                    <th colspan="1">级别变化</th>
                    <th colspan="1">处理结论</th>                
                    <th colspan="1">位置结论</th>
                    <!-- <th colspan="1">最危急树障相对杆塔、线路位置，距离弧垂点或导线近地点位置等描述。如距离#x杆塔x米处、弧垂点。。。</th>（也就是测量结论(位置)） -->
                    <th colspan="1">最危急树障种类</th>
                    <th colspan="1">最危急树障数量</th>
                    <th colspan="1">最危急树障数量单位</th>
                    <th colspan="1">最危急树障面积</th>
                    <th colspan="1">最危急树障面积单位</th>
                    <th colspan="1">最危急树障树高</th>
                    <th colspan="1">最危急树障导线对树木水平距离</th>
                    <th colspan="1">最危急树障导线对树木垂直距离</th>
                    <th colspan="1">最危急树障导线对地距离</th>
                    <th colspan="1">是否高出导线</th>
                    <th colspan="1">最终自然生长高度是否构成紧急级别隐患</th> 
                    <th colspan="1">测量方法</th> 
                    <th colspan="1">气温（℃）</th> 
                    <th colspan="1">负荷（A）</th> 
                    <th colspan="1">是否建设遗留</th> 
                </tr>
                        <td  ><?php echo (date('Y-m-d',$v['detail_last_time'])); ?></td>                                                 
                        <td  ><?php echo ($v['datail_check_person']); ?></td> 
                        <td  id="t-datail_check_time"><?php echo (date('Y-m-d H:i:s',$v['datail_check_time'])); ?></td>
                        
                        <td  id="t-tree_property"><?php echo ($v['tree_property']); ?></td>                        
                        <td  id="t-new_plant"><?php echo ($v['new_plant']); ?></td>
                        <td  id="t-defect_type"><?php echo ($v['defect_type']); ?></td>                        
                        <td  id="t-survival"><?php echo ($v['survival']); ?></td>
                        
                        <td  id="t-datail_danger_degree"><?php echo ($v['datail_danger_degree']); ?></td>                        
                        <td  id="t-datail_check_change_conclusion"><?php echo ($v['datail_check_change_conclusion']); ?></td>
                        <td  id="t-datail_check_process_conclusion"><?php echo ($v['datail_check_process_conclusion']); ?></td>                        
                        <td  id="t-datail_check_posistion_conclusion"><?php echo ($v['datail_check_posistion_conclusion']); ?></td>
                        <td  id="t-datail_tree_type"><?php echo ($v['datail_tree_type']); ?></td>
                        <td  id="t-datail_tree_num"><?php echo ($v['datail_tree_num']); ?></td>
                        <td  id="t-datail_tree_num_unit"><?php echo ($v['datail_tree_num_unit']); ?></td>
                        <td  id="t-datail_tree_area"><?php echo ($v['datail_tree_area']); ?></td>
                        <td  id="t-datail_tree_area_unit"><?php echo ($v['datail_tree_area_unit']); ?></td>
                        <td  id="t-datail_tree_height"><?php echo ($v['datail_tree_height']); ?></td>                        
                        <td  id="t-datail_tree_horizontal"><?php echo ($v['datail_tree_horizontal']); ?></td>
                        <td  id="t-datail_tree_vertical"><?php echo ($v['datail_tree_vertical']); ?></td>
                        <td  id="t-datail_tree_grand_height"><?php echo ($v['datail_tree_grand_height']); ?></td>
                        <td  id="t-datail_tree_over">
                            <?php if($v['datail_tree_over'] == '1'): ?>是
                                <?php else: ?> 否<?php endif; ?>
                        </td>
                        <td  id="t-datail_final_danger">
                            <?php if($v['datail_final_danger'] == '1'): ?>是
                            <?php else: ?> 否<?php endif; ?>
                        </td> 
                         
                        <td  ><?php echo ($v['detail_check_method']); ?></td>
                        <td  ><?php echo ($v['detail_temperature']); ?></td>
                        <td  ><?php echo ($v['detail_load']); ?></td>

                        <td  ><?php if($v['detail_retain'] == '1'): ?>是
                          <?php else: ?> 否<?php endif; ?></td>  

                     
                    </tr>
                    <tr>
                        <th colspan="4">隐患权属人信息</th>
                        <th colspan="5">隐患处理与管控</th>                
                        <th colspan="5">系统新增</th> 
                    </tr>
                    <tr>
                        <th colspan="1">种植物联系人地址</th>  
                        <th colspan="1">种植物联系人姓名</th> 
                        <th colspan="1">种植物联系人电话</th> 
                        <th colspan="1">种植时间</th>
                        <th colspan="1">青赔情况</th>  
                        <th colspan="1">协议签定情况</th> 
                        <th colspan="1">运行过程中协议情况</th> 
                        <th colspan="1">隐患通知书编号、情况</th>
                        <th colspan="1">任务单发布时间</th>
                        <th colspan="1">更新时间</th>
                        <th colspan="1">更新人</th>                                 
                        <th colspan="1">更新班组</th>                 
                        <th colspan="1">截止时间</th> 
                        <th colspan="1">是否处理</th>     
                    </tr>
                    <tr>
                        <td  ><?php echo ($v['detail_address']); ?></td>
                        <td  ><?php echo ($v['detail_owner']); ?></td>
                        <td  ><?php echo ($v['detail_phone']); ?></td>
                        <td  ><?php echo ($v['detail_plant_time']); ?></td>
                        <td  ><?php echo ($v['detail_compensation_condition']); ?></td> 
                        <td  ><?php echo ($v['detail_build_deal']); ?></td>
                      <td  ><?php echo ($v['detail_run_deal']); ?></td>
                      <td  ><?php echo ($v['detail_notice_number']); ?></td>
                      <td  ><?php echo ($v['detail_order_time']); ?></td>
                      <td  ><?php echo (date('Y-m-d',$v['datail_update_time'])); ?></td>
                      <td  id="t-datail_update_person"><?php echo ($v['datail_update_person']); ?></td>                     
                      <td  id="t-datail_update_group"><?php echo ($v['datail_update_group']); ?></td> 
                      <td  ><?php echo (date('Y-m-d',$v['dead_line_time'])); ?></td>                        
                      <td >
                              <?php if($v['processed'] == '1'): ?>是
                              <?php else: ?> 否<?php endif; ?>
                              </td>
                    </tr><?php endforeach; endif; ?>        
    </table>
    </div>

      
    </div>

      <div class="modal fade" id="bjy-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">修改树障状态</h4></div>
        <div class="modal-body">
          <form id="bjy-form" class="form-inline" action="<?php echo U('Admin/TreeOrder/edit_tree_div');?>" method="post">
            <input type="hidden" name="tid">
            <table class="table table-striped table-bordered table-hover table-condensed">
             
              <tr>
                <th width="12%">树障状态</th>
                <td>
                 <input style="width:80%;" type="text" name="tree_div" id="tree_div" />
              </tr>
             
              <tr>
                <th></th>
                <td>
                  <input class="btn btn-success" type="submit" value="确定"></td>
              </tr>
            </table>
          </form>
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


          $("#list_button").removeClass("disabled");
          $("#list_button").addClass("btn-success");
          $("#edit_button").removeClass("disabled");
          $("#edit_button").addClass("btn-success");
          $("#update_button").removeClass("btn-success");
          $("#update_button").addClass("disabled");
    
            $("#tree-base-content").html(msg);
          
          
            },
            error:function(XMLHttpRequest, textStatus, thrownError){}
          })
    }

       function edit_order(obj) {
      var tid = $(obj).attr('tid');
    
      $("input[name='tid']").val(tid);
    
      $('#bjy-edit').modal('show');
    }

   function delete_tree(obj)
     {
       if(confirm('确定删除？'))
       {
           var tid=$(obj).attr('tid');
          
           $.ajax({
           url:'/ts/index.php/Admin/Tree/delete',
           type:'GET', 
           async:true,    
           data:{
              tid:tid
           },
            success:function(msg)
            {
             
            if(msg.status==0)
            {
               alert(msg.info);
            }else
            {
               alert('删除成功');
               location.reload();
            }
          
           },
          

       })
          
       }
     }
      function edit_tree(obj) {
     
      $.ajax({
      type:"GET",
      url:"/ts/index.php/Admin/Tree/edit",
      data:{
      
        edit_line_id:$(obj).attr('line_id'),
       // group_id:<?php echo ($group_id); ?>,
        edit_tid:$(obj).attr('tid'),
        edit_index:1
          },
      success:function(msg){

          $("#tree-base-content").html(msg);
          $("#list_button").removeClass("disabled");
          $("#list_button").addClass("btn-success");
          $("#update_button").removeClass("disabled");
          $("#update_button").addClass("btn-success");
          $("#edit_button").removeClass("btn-success");
          $("#edit_button").addClass("disabled");

        },
      error:function(XMLHttpRequest, textStatus, thrownError)
      {
            
      } 
      });
  
    }
  </script>
   <script type="text/javascript">
    $(document).ready(function()
    {      
      console.log(<?php echo ($data); ?>)
});
</script>

   <script>
    var BASE_URL = '/ts/Public/statics/webuploader-0.1.5';
</script>
<script src="/ts/Public/statics/js/webuploader.min.js"></script> 
 </body>
</html>