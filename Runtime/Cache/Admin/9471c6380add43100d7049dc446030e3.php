<?php if (!defined('THINK_PATH')) exit();?> <form class="form-inline" action="" id="add-form">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">
              <tr>
                  <th rowspan="1">飞机类型</th>
                  <th colspan="1">飞机类型</th>
                  <td>
                      <select style="width:80%"  id="fly_plane_type" value="1" name="fly_plane_type">
                          <option value ="1" >激光机</option>
                          <option value ="0">固定翼</option>  
                         </select>  
                    
                </tr>  
              <tr>
                  <th rowspan="25">机巡数据</th>                  
                  <th colspan="1">飞行区段</th>
                  <td><input style="width:80%" type="text" name="fly_extent" id="fly_extent"></td>
                </tr>
                <tr>
                  <th colspan="1">杆塔区间</th>
                  <td><input style="width:80%" type="text" name="fly_tower_extent" id="fly_tower_extent"></td>
                </tr>
                <tr>
                  <th colspan="1">测量时间</th>
                  <td><input style="width:80%" type="date" name="fly_check_time" id="fly_check_time"></td>
                </tr>
                <tr>
                  <th colspan="1">经度(E）</th>
                  <td><input style="width:80%" type="text" name="fly_longitude" id="fly_longitude"></td>
                </tr>
                <tr>
                  <th colspan="1">纬度（N）</th>
                  <td><input style="width:80%" type="text" name="fly_latitude" id="fly_latitude"></td>
                </tr>
                <tr>
                  <th colspan="1">高度(m)</th>
                  <td><input style="width:80%" type="text" name="fly_heigh" id="fly_heigh"></td>
                </tr>
                <tr>
                  <th colspan="1">档距(m)</th>
                  <td><input style="width:80%" type="text" name="fly_distance" id="fly_distance"></td>
                </tr>
                <tr>
                  <th colspan="1">距小号塔距离(m)</th>
                  <td><input style="width:80%" type="text" name="fly_distance_from_starttower" id="fly_distance_from_starttower"></td>
                </tr>
                <tr>
                  <th colspan="1">地物类型</th>
                  <td><input style="width:80%" type="text" name="fly_object_type" id="fly_object_type"></td>
                </tr>
                <tr>
                  <th colspan="1">水平距（m）</th>
                  <td><input style="width:80%" type="text" name="fly_horizontal" id="fly_horizontal"></td>
                </tr>
                <tr>
                  <th colspan="1">垂直距（m）</th>
                  <td><input style="width:80%" type="text" name="fly_vertical" id="fly_vertical"></td>
                </tr>
                <tr>
                  <th colspan="1">最小净空实测距离（m）</th>
                  <td><input style="width:80%" type="text" name="fly_mix_distance" id="fly_mix_distance"></td>
                </tr>
                <tr>
                  <th colspan="1">级别</th>
                  <td><input style="width:80%" type="text" name="fly_degree" id="fly_degree"></td>
                </tr>
                <tr>
                  <th colspan="1">安全距离(m)</th>
                  <td><input style="width:80%" type="text" name="fly_safe_distance" id="fly_safe_distance"></td>
                </tr>
                <tr>
                  <th colspan="1">巡检方式</th>
                  <td><input style="width:80%" type="text" name="fly_check_method" id="fly_check_method"></td>
                </tr>
                <tr>
                  <th colspan="1">巡视方式</th>
                  <td><input style="width:80%" type="text" name="fly_tour_method" id="fly_tour_method"></td>
                </tr>
                <tr>
                  <th colspan="1">飞行日期（巡视开始时间）</th>
                  <td><input style="width:80%" type="date" name="fly_start_time" id="fly_start_time"></td>
                </tr>
                <tr>
                  <th colspan="1">（巡视结束时间）</th>
                  <td><input style="width:80%" type="date" name="fly_end_time" id="fly_end_time"></td>
                </tr>
                <tr>
                  <th colspan="1">当地天气</th>
                  <td><input style="width:80%" type="text" name="fly_weather" id="fly_weather"></td>
                </tr>
                <tr>
                  <th colspan="1">运行工况</th>
                  <td><input style="width:80%" type="text" name="fly_run_condition" id="fly_run_condition"></td>
                </tr>
                <tr>
                  <th colspan="1">禁飞情况/作业情况</th>
                  <td><input style="width:80%" type="text" name="fly_forbid_condition" id="fly_forbid_condition"></td>
                </tr>
                <tr>
                  <th colspan="1">报告编制日期</th>
                  <td><input style="width:80%" type="date" name="fly_report_made_time" id="fly_report_made_time"></td>
                </tr>
                <tr>
                  <th colspan="1">收机（系统）巡报告时间</th>
                  <td><input style="width:80%" type="date" name="fly_receive_report_time" id="fly_receive_report_time"></td>
                </tr>
                <tr>
                  <th colspan="1">班组收报告时间</th>
                  <td><input style="width:80%" type="date" name="fly_group_receive_report_time" id="fly_group_receive_report_time"></td>
                </tr>
                <tr>
                  <th colspan="1">班组反馈时间</th>
                  <td><input style="width:80%" type="date" name="fly_group_feedback_time" id="fly_group_feedback_time"></td>
                </tr>
                <tr>
                  <th rowspan="4">判断飞机与档案数据</th>                                      
                  <th colspan="1">判断飞机与档案数据存在情况</th>
                  <td><input style="width:80%" type="text" name="fly_data_condition" id="fly_data_condition"></td>
                </tr>
                <tr>
                  <th colspan="1">当时核实后情况</th>
                  <td><input style="width:80%" type="text" name="fly_verify_condition" id="fly_verify_condition"></td>
                </tr>
                <tr>
                  <th colspan="1">机有人无说明情况</th>
                  <td><input style="width:80%" type="text" name="fly_person_condition" id="fly_person_condition"></td>
                </tr>
                <tr>
                  <th colspan="1">备注</th>
                  <td><input style="width:80%" type="text" name="fly_data_check_remark" id="fly_data_check_remark"></td>
                </tr>
                <tr>
                  <th rowspan="3">飞机后数据处理情况</th>                                                          
                  <th colspan="1">飞机后处理时间</th>
                  <td><input style="width:80%" type="date" name="fly_later_deal_time" id="fly_later_deal_time"></td>
                </tr>
                <tr>
                  <th colspan="1">处理情况</th>
                  <td><input style="width:80%" type="text" name="fly_deal_condition" id="fly_deal_condition"></td>
                </tr>
                <tr>
                  <th colspan="1">备注</th>
                  <td><input style="width:80%" type="text" name="fly_deal_remark" id="fly_deal_remark"></td>
                </tr>

    
        </table>
  </div>
</form>


 <div class="text-center">
 <input style="width:6%" class="btn btn-sm btn-success "  tid="<?php echo ($tree_id); ?>" type="button" onclick="fly_add_record(this)"  value="确定">
 </div>


 <script type="text/javascript">

function fly_add_record(obj)
{
     
     var fly_tid=$(obj).attr('tid');
     $.ajax({
          type:"POST",
           url:"/ts/index.php/Admin/TreeFly/add",
           data:{
            fly_tid:fly_tid,
            fly_voltage_degree:$("#fly_voltage_degree").val(),
            fly_line_name:$("#fly_line_name").val(),
            fly_extent:$("#fly_extent").val(),
            fly_tower_extent:$("#fly_tower_extent").val(),
            fly_check_time:$("#fly_check_time").val(),
            fly_longitude:$("#fly_longitude").val(),
            fly_latitude:$("#fly_latitude").val(),
            fly_heigh:$("#fly_heigh").val(),
            fly_distance:$("#fly_distance").val(),
            fly_distance_from_starttower:$("#fly_distance_from_starttower").val(),
            fly_object_type:$("#fly_object_type").val(),
            fly_horizontal:$("#fly_horizontal").val(),
            fly_vertical:$("#fly_vertical").val(),
            fly_mix_distance:$("#fly_mix_distance").val(),
            fly_degree:$("#fly_degree").val(),
            fly_safe_distance:$("#fly_safe_distance").val(),
            fly_check_method:$("#fly_check_method").val(),
            fly_tour_method:$("#fly_tour_method").val(),
            fly_start_time:$("#fly_start_time").val(),
            fly_end_time:$("#fly_end_time").val(),
            fly_weather:$("#fly_weather").val(),
            fly_run_condition:$("#fly_run_condition").val(),
            fly_forbid_condition:$("#fly_forbid_condition").val(),
            fly_report_made_time:$("#fly_report_made_time").val(),
            fly_receive_report_time:$("#fly_receive_report_time").val(),
            fly_group_receive_report_time:$("#fly_group_receive_report_time").val(),
            fly_group_feedback_time:$("#fly_group_feedback_time").val(),
            fly_data_condition:$("#fly_data_condition").val(),
            fly_verify_condition:$("#fly_verify_condition").val(),
            fly_person_condition:$("#fly_person_condition").val(),
            fly_data_check_remark:$("#fly_data_check_remark").val(),
            fly_later_deal_time:$("#fly_later_deal_time").val(),
            fly_deal_condition:$("#fly_deal_condition").val(),
            fly_deal_remark:$("#fly_deal_remark").val(),
            fly_plane_type:$("#fly_plane_type").val(),
             },
             success:function(msg){
             var tid=msg;
             $.ajax({
             type:"GET",
             url:"/ts/index.php/Admin/TreeFly/index",
             data:{
             tid:tid
             },
             success:function(msg){

            window.location.reload();
    
           // $("#tree-Fly-record").html(msg);
            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          })
            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          });
          window.location.reload();


}
 </script>