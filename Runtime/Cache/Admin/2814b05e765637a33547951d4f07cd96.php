<?php if (!defined('THINK_PATH')) exit();?>
 
<<div class="tab-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed " id="data-table">

          <tr>
           <th>文件编号</th>
           <th>文件名</th>
           <th>上传备注</th>
           <th >更新人</th>
           <th >更新时间</th> 
           <th >下载</th>
           <th >操作</th>
          
          </tr>
          <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td id="t-file_id"><?php echo ($v['file_id']); ?></td>  
            <td id="t-file_name"><?php echo ($v['file_name']); ?></td>
            <td id="t-fiel_extend"><?php echo ($v['fiel_extend']); ?></td>
            <td id="t-file_update_person"><?php echo ($v['file_update_person']); ?></td>  
            <td id="t-file_update_time"><?php echo (date('Y-m-d',$v['file_update_time'])); ?></td>
            <td>
            <a href="/treesys/<?php echo ($v['file_path']); ?>" >下载</a>
            </td>
            <td>
            <a href="javascript:;"  tid="<?php echo ($tree_id); ?>" file_id="<?php echo ($v['file_id']); ?>" onclick="delete_file(this);">删除</a>
            </td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div align="center"> <?php echo ($pagehtml); ?></div>
      </div>
       </div>
    </div>
  </div>





 <script type="text/javascript">
 

 function delete_file(obj)
 {
 	if(confirm('确定删除？'))
       {
           
           var file_id=$(obj).attr('file_id');
           var tid=$(obj).attr('tid');
          
           $.ajax({
           url:'/treesys/index.php/Admin/TreeDetail/delete_file',
           type:'GET',    
           data:{
               file_id:file_id
              
           },
            success:function(msg)
           {

           $.ajax({
          type:"GET",
           url:"/treesys/index.php/Admin/TreeDetail/file",
           data:{
             tid:tid
             },
             success:function(msg)
             {
    
               window.location.reload();
            },
           error:function(XMLHttpRequest, textStatus, thrownError){}
          })
                     
            }
         })


       }
 }




 </script>