<?php if (!defined('THINK_PATH')) exit();?><div class="table-responsive">
    <form class="form-inline" action="" id="my_edit_form"> 
        <table class="table table-striped table-bordered table-hover table-condensed">
                    
        <tr>
          <th>线路名称： </th>
          <td>          
        <select  style="width:80%"  name="edit_line_id" id="edit_line_id" onchange="editSubmitForm(this);">
        <option value =<?php echo ($editTidData['line_id']); ?>  checked> <?php echo ($editTidData['line_name']); ?></option>
        <?php if(is_array($querydata['device_lines'])): foreach($querydata['device_lines'] as $key=>$v): ?><option value ="<?php echo ($v['did']); ?>"><?php echo ($v['voltage_degree']); ?>kV<?php echo ($v['device_name']); ?></option><?php endforeach; endif; ?>
        </select width=400px ></td></tr>
        <tr>
          <th>电压等级: </th>
          <td> 
        <select  style="width:80%" name="edit_voltage_degree" id="edit_voltage_degree" onchange="editSubmitForm(this);">
                <option value =<?php echo ($editTidData['voltage_degree']); ?>  checked><?php echo ($editTidData['voltage_degree']); ?>kV</option>
                <option value ="500">500kV</option>
                <option value ="220" >220kV</option>
                <option value="110" >110kV</option>
                <option value="35"  >35kV</option>
                </select>
              </td></tr>

        <tr>
            <th>县区： </th>
          <td> 
        <select style="width:80%"  name="edit_county"  id="edit_county" onchange="editSubmitForm(this);">
        <option value =<?php echo ($editTidData['county']); ?> checked><?php echo ($editTidData['county']); ?></option>
        <option value ="1">清城区</option>
        <option value ="2">清新县</option>
        <option value="3">佛冈县</option>
        <option value="4">英德市</option>
        <option value ="5">阳山县</option>
        <option value ="6">连州市</option>
        <option value ="7">连南县</option>
        <option value="8">连山县</option>
        </select></td></tr>

        <tr><th>镇： </th><td> 
        <select  style="width:80%" name="edit_town"   id="edit_town" onchange="editSubmitForm(this);">
        <option value =<?php echo ($editTidData['town']); ?> checked><?php echo ($editTidData['town']); ?></option>
        <?php if(is_array($querydata['towns'])): foreach($querydata['towns'] as $key=>$v): ?><option value ="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
        </select></td></tr>

        <tr><th>村： </th><td> 
        <select style="width:80%"  name="edit_village"  id="edit_village" onchange="editSubmitForm(this);">
        <option value =<?php echo ($editTidData['village']); ?> checked><?php echo ($editTidData['village']); ?></option>
        <?php if(is_array($querydata['villages'])): foreach($querydata['villages'] as $key=>$v): ?><option value ="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
        </select></td></tr> 
    </table> 
    
</form>
  <form id="tree_form" class="form-inline" action=""  method="post">
    <input type="hidden" name="tid">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <input type="hidden" name="data_county">
        <input  type="hidden" name="data_town">
        <input type="hidden" name="data_village">
        <tr>
            <td>运行单位</td><td><input style="width:80%" type="text" name="edit_accountability_department" id="edit_accountability_department" value=<?php echo ($editTidData['accountability_department']); ?>></td>
        </tr>
        <tr>
            <td>序号</td><td><input style="width:80%" type="text" name="edit_accountability_number" id="edit_accountability_number" value=<?php echo ($editTidData['accountability_number']); ?>></td>
        </tr>
        <tr>
            <td>责任班组</td><td>
                <select style="width:80%"  name="edit_accountability_group"  id="edit_accountability_group" >
                <option value =<?php echo ($editTidData['accountability_group']); ?> checked><?php echo ($editTidData['accountability_group']); ?></option>    
                <option value ="输电线路1班">输电线路1班</option>
                <option value ="输电线路2班">输电线路2班</option>
                <option value ="输电线路3班县">输电线路3班县</option>
                <option value="输电线路4班">输电线路4班</option>
                <option value="输电线路5班市4">输电线路5班市</option>
                <option value ="输电线路6班">输电线路6班</option>
                <option value ="输电线路7班">输电线路7班</option>
                <option value ="输电线路8班县">输电线路8班县</option>
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
            <td>巡视段责任人</td><td><input style="width:80%" type="text" name="edit_accountability_person" id="edit_accountability_person" value=<?php echo ($editTidData['accountability_person']); ?>></td>
          </tr>
        <tr>
            <td>小号杆（塔周围时大小号杆相同）</td><td><input style="width:80%" type="text" name="edit_star_tower" id="edit_star_tower" value=<?php echo ($editTidData['star_tower']); ?>></td>
          </tr>
          <tr>
              <td>大号杆（塔周围时大小号杆相同）</td><td><input style="width:80%" type="text" name="edit_end_tower" id="edit_end_tower" value=<?php echo ($editTidData['end_tower']); ?>></td>
            </tr>
          <tr>
              <td>隐患编号</td><td><input style="width:80%" type="text" name="edit_danger_num" id="edit_danger_num" value=<?php echo ($editTidData['danger_num']); ?>></td>
          </tr>
          <tr>
            <td>首次调查人</td><td><input style="width:80%" type="text" name="edit_first_check_person" id="edit_first_check_person" value=<?php echo ($editTidData['first_check_person']); ?>></td>
        </tr>
        <tr>
            <td>首次隐患调查日期</td><td><input style="width:80%"  type="date" name="edit_first_check_time" id="edit_first_check_time" value=<?php echo (date('Y-m-d',$editTidData['first_check_time'])); ?>></td>
        </tr>
        <tr>
            <td>首次上报时间</td><td><input style="width:80%" type="date" name="edit_first_upload_time" id="edit_first_upload_time" value=<?php echo (date('Y-m-d',$editTidData['first_upload_time'])); ?>></td>
        </tr>
        <tr>
            <td>树障存在的状态</td><td>
            
             <select  style="width:80%" name="tree_status" id="tree_status">
                <option value =<?php echo ($editTidData['tree_status']); ?>  checked><?php echo ($editTidData['tree_status']); ?></option>
                <option value ="未处理">未处理</option>
                <option value ="翻生" >翻生</option>
                <option value="已彻底处理(含树桩)" >已彻底处理(含树桩)</option>
                <option value="一直无树竹"  >一直无树竹</option>
                </select>

            </td>
        </tr>
        <tr>
            <td>树障种类</td><td><input style="width:80%" type="text" name="edit_tree_type" id="edit_tree_type" value=<?php echo ($editTidData['tree_type']); ?>>
            </td>
        </tr>
        <tr>
            <td>保护区范围外(如超高树木、上山侧等)是否有需要处理的树障</td><td><select style="width:80%"   id="edit_tree_danger" name="edit_tree_danger" >
                <option value =<?php echo ($editTidData['tree_danger']); ?> checked>
                    <?php if($editTidData['tree_danger'] == '1'): ?>是
                    <?php else: ?> 否<?php endif; ?></option>                    
                <option value ="0">否</option>     
                <option value ="1" >是</option>     
                   </select></td>
        </tr>
        <tr>
            <td>结合地形砍够保护区及保护区附近需处理的隐患树障数量（棵、墩数）</td><td><input style="width:80%" type="text" name="edit_tree_type" id="edit_tree_danger_num" value=<?php echo ($editTidData['tree_danger_num']); ?>></td>
        </tr>
        <tr>
            <td>结合地形砍够保护区及保护区附近需处理的隐患树障数量单位（棵、墩）</td><td><input style="width:80%" type="text" name="edit_tree_type" id="edit_tree_danger_num_unit" value=<?php echo ($editTidData['tree_danger_num_unit']); ?>></td>
        </tr>
        <tr>
            <td>结合地形砍够保护区及保护区附近需处理的隐患树障数量(亩数)</td><td><input style="width:80%" type="text" name="edit_tree_type" id="edit_tree_danger_area" value=<?php echo ($editTidData['tree_danger_area']); ?>></td>
        </tr>
        <tr>
            <td>结合地形砍够保护区及保护区附近需处理的隐患树障数量单位（亩）</td><td><input style="width:80%" type="text" name="edit_tree_type" id="edit_tree_danger_area_unit" value=<?php echo ($editTidData['tree_danger_area_unit']); ?>></td>
        </tr>
        <tr>
            <td>结合地形砍够保护区及保护区附近需处理的隐患树障树高（m）</td><td><input style="width:80%" type="text" name="edit_tree_type" id="edit_tree_danger_height" value=<?php echo ($editTidData['tree_danger_height']); ?>></td>
        </tr>

          <tr>
              <td>结合地形砍够保护区及保护区附近需处理的隐患树木胸径范围(cm)</td><td><input style="width:80%" type="text" name="edit_average_radius" id="edit_average_radius" value=<?php echo ($editTidData['average_radius']); ?>></td>
          </tr>
          <tr>
            <td>树木平均高度(m)</td><td><input style="width:80%" type="text" name="edit_average_height" id="edit_average_height" value=<?php echo ($editTidData['average_heightr']); ?>></td>
        </tr>
          <tr>
              <td>截止时间</td><td><input style="width:80%" type="date" name="edit_dead_line_time" id="edit_dead_line_time" value=<?php echo (date('Y-m-d',$editTidData['dead_line_time'])); ?>></td>
          </tr>
          <tr>
              <td>是否处理</td><td>
                  <select style="width:80%"    name="edit_processed" id="edit_processed">
                        <option value =<?php echo ($editTidData['processed']); ?> checked >
                                <?php if($editTidData['processed'] == '1'): ?>是
                                        <?php else: ?> 否<?php endif; ?></option>
                          <option value ="1" >是</option>
                          <option value ="0">否</option>  
                         </select></td>       
          </tr>
          <tr>
              <td colspan="4" align="center">
          <!-- <input  class="btn btn-sm btn-success "  type="submit"  value="确定"> -->
          <input  class="btn btn-sm btn-success "   type="button" onclick="edit_tree_submit()"  value="确定">
          
        </td>
        </tr>
    </table>
  </form>
</div> 
<script type="text/javascript">
    function edit_tree_submit(obj)
    {
         
          $.ajax({
             type:"POST",
              url:"/ts/index.php/Admin/Tree/edit",
              data:{
                group_id:<?php echo ($group_id); ?>,
                tid:<?php echo ($edit_tid); ?>,
                accountability_department:document.getElementById("edit_accountability_department").value,
                accountability_number:document.getElementById("edit_accountability_number").value,
                accountability_group:document.getElementById("edit_accountability_group").value,
                accountability_person:document.getElementById("edit_accountability_person").value,
                county:document.getElementById("edit_county").options[document.getElementById("edit_county").selectedIndex].text,
                town:document.getElementById("edit_town").options[document.getElementById("edit_town").selectedIndex].text,
                village:document.getElementById("edit_village").options[document.getElementById("edit_village").selectedIndex].text,
                line_id:document.getElementById("edit_line_id").value,
                voltage_degree:document.getElementById("edit_voltage_degree").options[document.getElementById("edit_voltage_degree").selectedIndex].text,
                star_tower:document.getElementById("edit_star_tower").value,
                end_tower:document.getElementById("edit_end_tower").value,
                danger_num:document.getElementById("edit_danger_num").value,
                first_check_person:document.getElementById("edit_first_check_person").value,
                first_check_time:document.getElementById("edit_first_check_time").value,
                first_upload_time:document.getElementById("edit_first_upload_time").value,
                tree_status:document.getElementById("edit_tree_status").value,
                tree_type:document.getElementById("edit_tree_type").value,
                tree_danger:document.getElementById("edit_tree_danger").value,
                tree_danger_num:document.getElementById("edit_tree_danger_num").value,
                tree_danger_num_unit:document.getElementById("edit_tree_danger_num_unit").value,
                tree_danger_area:document.getElementById("edit_tree_danger_area").value,
                tree_danger_area_unit:document.getElementById("edit_tree_danger_area_unit").value,
                tree_danger_height:document.getElementById("edit_tree_danger_height").value,
                average_radius:document.getElementById("edit_average_radius").value,
                average_height:document.getElementById("edit_average_height").value,
                
                // owner:document.getElementById("edit_owner").value,
                // owner_phone:document.getElementById("edit_owner_phone").value,
                // site_condition:document.getElementById("edit_site_condition").value,
                // tree_age:document.getElementById("edit_tree_age").value,

                dead_line_time:document.getElementById("edit_dead_line_time").value,
                // first_check_method:document.getElementById("edit_first_check_method").value,
                processed:document.getElementById("edit_processed").value
                },
                success:function(msg){
                console.log(msg);
                if(msg.status==0)
                {
                 alert(msg.info);
                }else
                {
                 alert("修改成功"); }},
                error:function(XMLHttpRequest, textStatus, thrownError){}
             });
             $('#tree-edit-modal').modal('hide');
             window.location.href="/ts/index.php/Admin/Tree/index/group_id/<?php echo ($group_id); ?>";
    }
    function editSubmitForm()
     { 
        sessionStorage.setItem("edit_voltage_degree",document.getElementById("edit_voltage_degree").value);
        sessionStorage.setItem("edit_line_id",document.getElementById("edit_line_id").value); 
        sessionStorage.setItem("edit_county",document.getElementById("edit_county").value); 
        sessionStorage.setItem("edit_town",document.getElementById("edit_town").value); 
        sessionStorage.setItem("edit_village",document.getElementById("edit_village").value); 
      $.ajax({
      type:"GET",
      url:"/ts/index.php/Admin/TreeCommon/freshForm",
      data:{
        edit_voltage_degree:document.getElementById("edit_voltage_degree").value,
        edit_town:document.getElementById("edit_town").value,
        edit_county:document.getElementById("edit_county").value,
        edit_village:document.getElementById("edit_village").value,
        edit_line_id:document.getElementById("edit_line_id").value,
        group_id:<?php echo ($group_id); ?>,
        edit_tid:<?php echo ($edit_tid); ?>
          },
        success:function(msg){
        $("#my_edit_form").html(msg);
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
          
        });   
      </script>