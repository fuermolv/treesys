<?php if (!defined('THINK_PATH')) exit();?><!--  <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
        <li >
         <a href="javascript:;"  tid="<?php echo ($tree_id); ?>" onclick="detail_list(this)" >列表</a></li>
        <li class="active">
        <a href="javascript:;"  data-toggle="tab">添加新记录</a>
        </li>
 </ul> -->
   
 

 <div class="tab-content">
  <form class="form-inline" action="" id="add-form">
        <div class="table-responsive">

        <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">
           <tr>
              <th rowspan="3">隐患最新情况</th>
           <th  id="t-detail_last_time">更新时间（最新隐患调查、测量日期） </th>
           <td><input style="width:80%" id="detail_last_time" type="date" value="<?php echo ($data['detail_last_time']); ?>" name="detail_last_time"></td>
           </tr>

           <tr>
           <th  id="t-datail_check_person">更新人（最新隐患调查人）</th>
           <td><input style="width:80%" id="datail_check_person" type="text" value="<?php echo ($data['datail_check_person']); ?>" name="datail_check_person"></td>
          </tr>

          <tr>
           <th  id="t-datail_check_time">测量时刻(更新时间。到时、分)</th>
           <td><input style="width:80%" id="datail_check_time" type="datetime-local" value="<?php echo ($data['datail_check_time']); ?>" name="datail_check_time"></td>
          </tr>

          <tr>
              <th rowspan="3">隐患最新情况（程度）</th>
           <th  id="t-datail_danger_degree">隐患等级</th>
           <td><input style="width:80%" id="datail_danger_degree" type="text" value="<?php echo ($data['datail_danger_degree']); ?>" name="datail_danger_degree"></td>
          </tr>

          <tr>
           <th  id="t-datail_check_change_conclusion">测量变化</th>
           <td><input style="width:80%" id="datail_check_change_conclusion" type="text" value="<?php echo ($data['datail_check_change_conclusion']); ?>" name="datail_check_change_conclusion"></td>
          </tr>

          <tr>
           <th  id="t-datail_check_process_conclusion">测量结论处理</th>
           <td><input style="width:80%" id="datail_check_process_conclusion" type="text" value="<?php echo ($data['datail_check_process_conclusion']); ?>" name="datail_check_process_conclusion"></td>
          </tr>

          <tr>
           <th rowspan="1">隐患最新情况（位置）</th>                  
           <th  id="t-datail_check_posistion_conclusion">测量结论位置</th>
           <td><input style="width:80%" id="datail_check_posistion_conclusion" type="text" value="<?php echo ($data['datail_check_posistion_conclusion']); ?>" name="datail_check_posistion_conclusion"></td>
          </tr>

          <tr> 
              <th rowspan="11">隐患最新情况（表象）</th>              
           <th  id="t-datail_tree_type">最危急树障种类</th>
           <td><input style="width:80%" id="datail_tree_type" type="text" value="<?php echo ($data['datail_tree_type']); ?>" name="datail_tree_type"></td>
          </tr>

          <tr>
            
           <th  id="t-datail_tree_num">最危急树障数量(棵数、墩数)</th>
           <td><input style="width:80%" id="datail_tree_num" type="text" value="<?php echo ($data['datail_tree_num']); ?>" name="datail_tree_num"></td>
          </tr>

          <tr> 
           <th  id="t-datail_tree_num_unit">最危急树障数量单位（棵、墩）</th>
           <td><input style="width:80%" id="datail_tree_num_unit" type="text" value="<?php echo ($data['datail_tree_num_unit']); ?>" name="datail_tree_num_unit"></td>
          </tr>

          <tr>
           <th  id="t-datail_tree_area">最危急树障数量(亩数)</th>
           <td><input style="width:80%" id="datail_tree_area" type="text" value="<?php echo ($data['datail_tree_area']); ?>" name="datail_tree_area"></td>
          </tr>
          
          <tr> 
           <th  id="t-datail_tree_area_unit">最危急树障数量单位（亩）</th>
           <td><input style="width:80%" id="datail_tree_area_unit" type="text" value="<?php echo ($data['datail_tree_area_unit']); ?>" name="datail_tree_area_unit"></td>
          </tr>
          
          <tr> 
           <th  id="t-datail_tree_height">最危急树障树高（米）</th>
           <td><input style="width:80%" id="datail_tree_height" type="text" value="<?php echo ($data['datail_tree_height']); ?>" name="datail_tree_height"></td>
          </tr>
          
          <tr> 
           <th  id="t-datail_tree_horizontal">最危急树障导线对树木水平距离（米）</th>
           <td><input style="width:80%" id="datail_tree_horizontal" type="text" value="<?php echo ($data['datail_tree_horizontal']); ?>" name="datail_tree_horizontal"></td>
          </tr>
          
          <tr> 
           <th  id="t-datail_tree_vertical">最危急树障导线对树木垂直距离（米）</th>
           <td><input style="width:80%" id="datail_tree_vertical" type="text" value="<?php echo ($data['datail_tree_vertical']); ?>" name="datail_tree_vertical"></td>
          </tr>
          
          <tr> 
           <th  id="t-datail_tree_grand_height">最危急树障导线对地（米）</th>
           <td><input style="width:80%" id="datail_tree_grand_height" type="text" value="<?php echo ($data['datail_tree_grand_height']); ?>" name="datail_tree_grand_height"></td>
          </tr>
          
          <tr> 
           <th  id="t-datail_tree_over">是否高出导线</th> 
           <td>
              <select style="width:80%"  id="datail_tree_over" value="<?php echo ($data['datail_tree_over']); ?>" name="datail_tree_over">
                <option value ='1' >是</option>
                <option value ='0'>否</option>  
               </select></td> 
          </tr>
              
          <tr>          
           <th  id="t-datail_final_danger">最终自然生长高度是否构成紧急级别隐患</th>
           <td>
              <select style="width:80%"  id="datail_final_danger" value="<?php echo ($data['datail_final_danger']); ?>" name="datail_final_danger">
                <option value ='1' >是</option>
                <option value ='0'>否</option>  
               </select></td>
          </tr>
              
          <tr> 
           <th rowspan="3">隐患最新情况（监测）</th> 
           <th  id="t-detail_check_method">测量方法</th>
           <td><input style="width:80%" id="detail_check_method" type="text" value="<?php echo ($data['detail_check_method']); ?>" name="detail_check_method"></td>
          </tr>
          
          <tr> 
           <th  id="t-detail_temperature">气温（℃）</th>
           <td><input style="width:80%" id="detail_temperature" type="text" value="<?php echo ($data['detail_temperature']); ?>" name="detail_temperature"></td>
          </tr>
          
          <tr> 
           <th  id="t-detail_load">负荷（A）</th>
           <td><input style="width:80%" id="detail_load" type="text" value="<?php echo ($data['detail_load']); ?>" name="detail_load"></td>
          </tr>
          
          <tr> 
           <th rowspan="1">隐患来源</th>  
           <th  id="t-detail_retain">是否建设遗留</th>
           <td>
              <select style="width:80%"  id="detail_retain" value="<?php echo ($data['detail_retain']); ?>" name="detail_retain">
                <option value ='0'>否</option>                  
                <option value ='1' >是</option>
               </select></td>
          </tr>
              
          <tr> 
           <th rowspan="4">隐患权属人信息</th> 
           <th  id="t-detail_address">种植物权属方联系人地址</th>
           <td><input style="width:80%" id="detail_address" type="text" value="<?php echo ($data['detail_address']); ?>" name="detail_address"></td>
          </tr>
          
          <tr>  
           <th  id="t-detail_owner">种植物权属方联系人姓名</th>
           <td><input style="width:80%" id="detail_owner" type="text" value="<?php echo ($data['detail_owner']); ?>" name="detail_owner"></td>
          </tr>
          
          <tr>  
           <th  id="t-detail_phone">种植物权属方联系人电话</th>
           <td><input style="width:80%" id="detail_phone" type="text" value="<?php echo ($data['detail_phone']); ?>" name="detail_phone"></td>
          </tr>
          
          <tr>  
           <th  id="t-detail_plant_time">高杆植物种植时间</th>
           <td><input style="width:80%" id="detail_plant_time" type="text" value="<?php echo ($data['detail_plant_time']); ?>" name="detail_plant_time"></td>
          </tr>
          
          <tr>
           <th rowspan="4">隐患处理与管控</th> 
           <th  id="t-detail_compensation_condition">青赔情况</th>
           <td><input style="width:80%" id="detail_compensation_condition" type="text" value="<?php echo ($data['detail_compensation_condition']); ?>" name="detail_compensation_condition"></td>
          </tr>
          
          <tr>  
           <th  id="t-detail_build_deal">线路建设时协议签定情况</th>
           <td><input style="width:80%" id="detail_build_deal" type="text" value="<?php echo ($data['detail_build_deal']); ?>" name="detail_build_deal"></td>
          </tr>
          
          <tr> 
           <th  id="t-detail_run_deal">运行过程中协议情况</th>
           <td><input style="width:80%" id="detail_run_deal" type="text" value="<?php echo ($data['detail_run_deal']); ?>" name="detail_run_deal"></td>
          </tr>
          
          <tr> 
           <th  id="t-detail_notice_number">隐患通知书编号、情况</th>
           <td><input style="width:80%" id="detail_notice_number" type="text" value="<?php echo ($data['detail_notice_number']); ?>" name="detail_notice_number"></td>  
          </tr>

        
</table>


</div>
 </form>
</div>

 <div class="text-center">
 <input style="width:6%" class="btn btn-sm btn-success "  tid="<?php echo ($tree_id); ?>" type="button" onclick="detail_add_record(this)"  value="确定">
 </div>
 <script type="text/javascript">
//  function detail_list(obj)
//  {
//  	 var tid=$(obj).attr('tid');
//  	  $.ajax({
//           type:"GET",
//            url:"/ts/index.php/Admin/TreeDetail/index",
//            data:{
//              tid:tid
//              },
//              success:function(msg){
    
//           $("#tree-deatil-record").html(msg);
//             },
//            error:function(XMLHttpRequest, textStatus, thrownError){}
//           })
//  }
  function detail_add_record(obj)
 {

 	  
     var detail_tid=$(obj).attr('tid');
     $.ajax({
          type:"POST",
           url:"/ts/index.php/Admin/TreeDetail/add",
           data:{
             detail_tid:detail_tid,
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
             var tid=msg;
             $.ajax({
            type:"GET",
            url:"/ts/index.php/Admin/TreeDetail/index",
             data:{
             tid:tid
             },
             success:function(msg){

             	
              window.location.reload();
    
         // $("#tree-deatil-record").html(msg);
            },
           error:function(XMLHttpRequest, textStatus, thrownError)
           {}
          })
            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          })
  }

 </script>