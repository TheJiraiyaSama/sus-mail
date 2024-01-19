<section class="panel">
    <header class="panel-heading" style="height: 35px">
        Sub Category List <label class="panel-heading" style="margin-left: 70%"><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;<a href="<?php echo ADMIN_PANEL_URL.'category/add_sub_sub_category'; ?>">Add Sub Sub  Category</a></label>
        <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <!--<a href="javascript:;" class="fa fa-times"></a>-->
        </span>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table  class="display table table-bordered table-striped" id="backend-user-grid">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                         <th>Sub sub Category</th>
                        <th>Status</th>
                        <th style="width: 15%">Action</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><input type="text" data-column="2"  class="form-control search-input-text"></th>
                        <th><input type="text" data-column="3"  class="form-control search-input-text"></th>
                        <th></th>
                        <th></th>
                        <th><select data-column="6" class="form-control search-input-text">
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="2">Blocked</option>
                                <option value="3">Deleted</option>
                            </select>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>
<?php
$adminurl = ADMIN_PANEL_URL;
$custum_js = <<<EOD
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
 <script type="text/javascript" language="javascript" >

     jQuery(document).ready(function() {
         var table = 'backend-user-grid';
         var dataTable = jQuery("#"+table).DataTable( {
             "processing": true,
             "pageLength": 50,
             "serverSide": true,
            "serverSide": true,"serverSide": true,
                    'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [0,1,5] /* 1st one, start by the right */
            }],
             "order": [[ 0, "desc" ]],
             "ajax":{
                 url :"$adminurl"+"category/ajax_sub_sub_categorys_list", // json datasource
                 type: "post",  // method  , by default get
                 error: function(){  // error handling
                     jQuery("."+table+"-error").html("");
                     jQuery("#"+table+"_processing").css("display","none");
                 }
             }
         } );
         jQuery("#"+table+"_filter").css("display","none");
         $('.search-input-text').on( 'keyup click', function () {   // for text boxes
             var i =$(this).attr('data-column');  // getting column index
             var v =$(this).val();  // getting search input value
             dataTable.columns(i).search(v).draw();
         } );
        $('.search-input-select').on( 'change', function () {   // for select box
            var i =$(this).attr('data-column');
            var v =$(this).val();
            dataTable.columns(i).search(v).draw();
        } );
     } );
        
    function block_sub_sub_category(id){
        var type = document.getElementById(id).innerHTML;
        var process = 1;
        if(type == "Block"){
            process = 2;
        }
        jQuery.ajax({
            url:"$adminurl"+"category/ajax_block_sub_sub_category",
            type: "post",  // method  , by default get
            datatype:"json",
            data: {
                id: id,
                status: process,
            },
            success: function(data){
                if(type == "Block"){
                    document.getElementById(id).classList.add("btn-primary");
                    document.getElementById(id).classList.remove("btn-warning");
                    document.getElementById(id).innerHTML="Unblock";
                }else{
                    document.getElementById(id).classList.remove("btn-primary");
                    document.getElementById(id).classList.add("btn-warning");
                    document.getElementById(id).innerHTML="Block";
                }
            }
        });
    }
        
    function delete_sub_sub_category(id){
        if(!confirm("Are You Sure?")){
            return false;
        }
        var id = id.substring( 1);
        jQuery.ajax({
            url:"$adminurl"+"category/ajax_delete_sub_sub_category",
            type: "post",  // method  , by default get
            datatype:"json",
            data: {
                id: id,
                status:3,
            },
            success: function(data){
               // document.getElementById("d"+id).innerHTML="Deleted";
                $("#d"+id).closest("tr").remove();
            }
        });
   }
 </script>
EOD;
echo modules::run('admin_panel/template/add_custum_js', $custum_js);
?>