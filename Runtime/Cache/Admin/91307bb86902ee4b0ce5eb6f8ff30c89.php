<?php if (!defined('THINK_PATH')) exit();?><!--  <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
        <li >
         <a href="javascript:;"  tid="<?php echo ($tree_id); ?>" onclick="process_list(this)" >列表</a>
         </li>
         <li class="active" >
       
        <a href="javascript:;"    tid="<?php echo ($tree_id); ?>" onclick="add(this)" >添加新记录</a>
        </li>
        
         <li >
        <a href="javascript:;"   tid="<?php echo ($tree_id); ?>" onclick="file(this)">处理文件</a>
        </li>
        <li >
        <a href="javascript:;"   tid="<?php echo ($tree_id); ?>" onclick="uploadfile(this)">上传处理文件</a>
        </li>
 </ul> -->
 
<div class="tab-content">
  <form class="form-inline" action="" id="add-form">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">
           <tr>
           <th id="t-record_plan_clean_time" >计划清理时间</th>
           <th id="t-record_task_time">任务发布时间</th>
           <th id="t-record_is_additional">是否额外任务</th>
           <th id="t-record_department" >属地供电所</th>
           <th id="t-record_person">供电所具体工作人员姓名</th>
           <th id="t-record_person_phone">供电所具体工作人员联系电话</th>
           <th id="t-record_accountability_person">输电所分片负责人</th>
           <th id="t-record_verify_person" >输电所安排的隐患核实工作人员姓名</th>
           <th id="t-record_verify_person_phone" >输电所安排的隐患核实工作人员联系电话</th>
           <th id="t-record_plan_verify_time" >属地单位计划与户主商谈前的隐患核实时间</th>
            <th id="t-record_verify_time" >属地单位与户主商谈前的隐患核实时间</th>
           <th  id="t-record_plan_consult_time" >属地供单位计划协商的时间段</th>

           
         

            
          </tr>
          
          <tr>
           <td><input style="width:150px;" id="record_plan_clean_time" type="date" value="<?php echo (date('Y-m-d',$data['record_plan_clean_time'])); ?>" name="record_plan_clean_time"></td>
          <td><input style="width:150px;" id="record_task_time" type="date" value="<?php echo (date('Y-m-d',$data['record_task_time'])); ?>" name="record_task_time"></td>
           <td>
            <select style="width:100px"  id="record_is_additional" value="<?php echo ($data['record_is_additional']); ?>" name="record_is_additional">
            <option value ="1" >是</option>
            <option value ="0">否</option>  
           </select>
           </td>
          <td><input style="width:100px;" id="record_department" type="text" value="<?php echo ($data['record_department']); ?>" name="record_department"></td>
          <td><input style="width:100px;" id="record_person" type="text" value="<?php echo ($data['record_person']); ?>" name="record_person"></td>
          <td><input style="width:100px;" id="record_person_phone" type="text" value="<?php echo ($data['record_person_phone']); ?>" name="record_person_phone"></td>
          <td><input style="width:100;" id="record_accountability_person" type="text" value="<?php echo ($data['record_accountability_person']); ?>" name="record_accountability_person"></td>
          <td><input style="width:100px;" id="record_verify_person" type="text" value="<?php echo ($data['record_verify_person']); ?>" name="record_verify_person"></td>
          <td><input style="width:100px;" id="record_verify_person_phone" type="text" value="<?php echo ($data['record_verify_person_phone']); ?>" name="record_verify_person_phone"></td>
          <td><input style="width:150px;" id="record_plan_verify_time" type="date" value="<?php echo (date('Y-m-d',$data['record_plan_verify_time'])); ?>" name="record_plan_verify_time"></td>

          <td><input style="width:150px;" id="record_verify_time" type="date" value="<?php echo (date('Y-m-d',$data['record_verify_time'])); ?>" name="record_verify_time"></td> 
          <td><input style="width:150px;" id="record_plan_consult_time" type="text" value="<?php echo ($data['record_plan_consult_time']); ?>" name="record_plan_consult_time"></td>
      
              
          </tr>     
</table>
</div>
      

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">
           <tr>
     
           <th  id="t-record_consult_detail" >协商过程情况</th>        
           <th id="t-record_verify_situ" >截止统计日按任务单，现场“隐患核实”情况</th>
           <th  id="t-record_verify_consult_situ" >截止统计日青苗商谈、补偿情况</th>
           <th  id="t-record_verify_consult_matter">截止统计日存在的协商问题</th>
           <th  id="t-record_process_situ">截止统计日砍伐情况</th>
           
           <th  id="t-record_need_apper">是否需逐级上报处理</th>
           <th  id="t-record_apper_level" >上报级别</th>
           <th  id="t-record_accept_time">清障验收时间</th>
           <th  id="t-record_accept_conclusion1" >验收结论1</th>
           <th  id="t-record_accept_conclusion2">验收结论2</th>
           <th  id="t-record_confirm_time">输电班组人员确认时间</th>
           <th  id="t-record_confirm_tag">输电班组人员确认签名</th>
            <th  id="t-record_remark">备注</th>
           
         

            
          </tr>
          
          <tr>
         
          <td><textarea style="height:100px;" id="record_consult_detail" name="record_consult_detail"><?php echo ($data['record_consult_detail']); ?></textarea> </td>
          <td><input style="width:180px;" id="record_verify_situ" type="text" value="<?php echo ($data['record_verify_situ']); ?>" name="record_verify_situ"></td>

          <td><input style="width:180px;" id="record_verify_consult_situ" type="text" value="<?php echo ($data['record_verify_consult_situ']); ?>" name="record_verify_consult_situ"></td>

          <td><input style="width:180px;" id="record_verify_consult_matter" type="text" value="<?php echo ($data['record_verify_consult_matter']); ?>" name="record_verify_consult_matter"></td>
          <td><input style="width:180px;" id="record_process_situ" type="text" value="<?php echo ($data['record_process_situ']); ?>" name="record_process_situ"></td>
          
          
          <td>
           <select style="width:100px"  id="record_need_apper" value="<?php echo ($data['record_need_apper']); ?>" name="record_need_apper" >
            <option value ="1" >是</option>
            <option value ="0">否</option>  
           </select>
           </td>

           <td><input style="width:100px;" id="record_apper_level" type="text" value="<?php echo ($data['record_apper_level']); ?>" name="record_apper_level"></td>
           <td><input style="width:150px;" id="record_accept_time" type="date" value="<?php echo (date('Y-m-d',$data['record_accept_time'])); ?>" name="record_accept_time"></td>
           <td><input style="width:100px;" id="record_accept_conclusion1" type="text" value="<?php echo ($data['record_accept_conclusion1']); ?>" name="record_accept_conclusion1"></td>
           <td><input style="width:100px;" id="record_accept_conclusion2" type="text" value="<?php echo ($data['record_accept_conclusion2']); ?>" name="record_accept_conclusion2"></td>
           <td><input style="width:150px;" id="record_confirm_time" type="date" value="<?php echo (date('Y-m-d',$data['record_confirm_time'])); ?>" name="record_confirm_time"></td>
           <td><input style="width:100px;" id="record_confirm_tag" type="text" value="<?php echo ($data['record_confirm_tag']); ?>" name="record_confirm_tag"></td>
           <td><input style="width:100px;" id="record_remark" type="text" value="<?php echo ($data['record_remark']); ?>" name="record_remark"></td>
              
          </tr>     
</table>


</div>








 </form>
</div>

 <div class="text-center">
 <input style="width:6%" class="btn btn-sm btn-success "  tid="<?php echo ($tree_id); ?>" type="button" onclick="process_add_record(this)"  value="确定">
 </div>


 <script type="text/javascript">

function process_add_record(obj)
{
     
     var record_tid=$(obj).attr('tid');
     $.ajax({
          type:"POST",
           url:"/ts/index.php/Admin/TreeProcess/add",
           data:{
             record_tid:record_tid,
             record_plan_clean_time:$("#record_plan_clean_time").val(),
             record_task_time:$("#record_task_time").val(),
             record_is_additional:$("#record_is_additional").val(),
             record_department:$("#record_department").val(),
             record_person:$("#record_person").val(),
             record_person_phone:$("#record_person_phone").val(),
             record_accountability_person:$("#record_accountability_person").val(),
             record_verify_person:$("#record_verify_person").val(),
             record_verify_person_phone:$("#record_verify_person_phone").val(),
             record_plan_verify_time:$("#record_plan_verify_time").val(),
             record_verify_time:$("#record_verify_time").val(),
             record_plan_consult_time:$("#record_plan_consult_time").val(),
             record_consult_detail:$("#record_consult_detail").val(),
             record_verify_situ:$("#record_verify_situ").val(),
             record_verify_consult_situ:$("#record_verify_consult_situ").val(),
             record_verify_consult_matter:$("#record_verify_consult_matter").val(),
             record_process_situ:$("#record_process_situ").val(),

             record_need_apper:$("#record_need_apper").val(),
             record_apper_level:$("#record_apper_level").val(),
             record_accept_time:$("#record_accept_time").val(),
             record_accept_conclusion1:$("#record_accept_conclusion1").val(),
             record_accept_conclusion2:$("#record_accept_conclusion2").val(),
             record_confirm_time:$("#record_confirm_time").val(),
             record_confirm_tag:$("#record_confirm_tag").val(),
             record_remark:$("#record_remark").val()

            
             },
             success:function(msg){
             var tid=msg;
             $.ajax({
             type:"GET",
             url:"/ts/index.php/Admin/TreeProcess/index",
             data:{
             tid:record_tid
             },
             success:function(msg){

            window.location.reload();
    
           // $("#tree-process-record").html(msg);
            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          })
            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          })

}



//  function uploadfile(obj)
//     {
//        var tid=$(obj).attr('tid');
//         $.ajax({
//           type:"GET",
//            url:"/ts/index.php/Admin/TreeProcess/uploadfile",
//            data:{
//               tid:tid
//              },
//              success:function(msg){
    
//           $("#tree-process-record").html(msg);
//           $("#list_button").removeClass("disabled");
//           $("#list_button").addClass("btn-success");

//           $("#add_button").removeClass("disabled");
//           $("#add_button").addClass("btn-success");

//           $("#list_file_button").removeClass("disabled");
//           $("#list_file_button").addClass("btn-success");

//           $("#add_file_button").removeClass("btn-success");
//           $("#add_file_button").addClass("disabled");
//             },
//             error:function(XMLHttpRequest, textStatus, thrownError){}
//           })
//     }

  //  function process_list(obj)
  //   {
  //      var tid=$(obj).attr('tid');
  //       $.ajax({
  //         type:"GET",
  //          url:"/ts/index.php/Admin/TreeProcess/index",
  //          data:{
  //             tid:tid
  //            },
  //            success:function(msg){
    
  //         $("#tree-process-record").html(msg);
  //           },
  //           error:function(XMLHttpRequest, textStatus, thrownError){}
  //         })
  //   }
    //  function file(obj)
    // {
    //    var tid=$(obj).attr('tid');
    //     $.ajax({
    //       type:"GET",
    //        url:"/ts/index.php/Admin/TreeProcess/file",
    //        data:{
    //           tid:tid
    //          },
    //          success:function(msg){
    
    //       $("#tree-process-record").html(msg);
    //       $("#list_button").removeClass("disabled");
    //       $("#list_button").addClass("btn-success");

    //       $("#add_button").removeClass("disabled");
    //       $("#add_button").addClass("btn-success");

    //       $("#list_file_button").removeClass("btn-success");
    //       $("#list_file_button").addClass("disabled");

    //       $("#add_file_button").removeClass("disabled");
    //       $("#add_file_button").addClass("btn-success");
    //         },
    //         error:function(XMLHttpRequest, textStatus, thrownError){}
    //       })
    // }
    //  function add(obj)
    // {
    //    var tid=$(obj).attr('tid');
    //     $.ajax({
    //       type:"GET",
    //        url:"/ts/index.php/Admin/TreeProcess/add",
    //        data:{
    //           tid:tid
    //          },
    //          success:function(msg){    
    //       $("#tree-process-record").html(msg);
    //         },
    //         error:function(XMLHttpRequest, textStatus, thrownError){}
    //       })
    // }




 </script>