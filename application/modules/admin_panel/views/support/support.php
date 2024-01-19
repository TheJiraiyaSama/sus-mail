<section class="panel">
    <header class="panel-heading" style="height: 35px">
        Support List
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                         <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th></th>
                        <th><input type="text" data-column="1"  class="form-control search-input-text"></th>
                        <th><input type="text" data-column="2"  class="form-control search-input-text"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <select data-column="3" class="form-control search-input-text">
                                <option>All</option>
                                <option value="1">Open</option>
                                <option value="2">Closed</option>
                                <option value="3">On Hold</option>
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
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
            <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>
          <script type="text/javascript" language="javascript" >

        jQuery(document).ready(function() {
         var table = 'backend-user-grid';
         var dataTable = jQuery("#"+table).DataTable( {
             "processing": true,
              "pageLength": 50,
             "dom": "lBfrtip",
             "buttons": [ 'excel', 'pdf', 'print' ],
             "lengthMenu": [[15, 25, 50 ,100], [15, 25, 50,100]],
            "serverSide": true,"serverSide": true,
                    'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [0,5,6] /* 1st one, start by the right */
            }], 
             "order": [[ 0, "desc" ]],
             "ajax":{
                 url :"$adminurl"+"support/ajax_support_list", // json datasource
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
        
    function pending_support(id){
        var type = document.getElementById(id).innerHTML;
        if(!confirm("Are you sure for mark as hold this one..!")){
            return false;
        }
        jQuery.ajax({
            url:"$adminurl"+"support/ajax_pending_support",
            type: "post",  // method  , by default get
            datatype:"json",
            data: {
                id: id,
                status: 3,
            },
            success: function(data){
                document.getElementById(id).classList.remove("btn-warning");
                document.getElementById(id).classList.add("btn-danger");
                document.getElementById(id).innerHTML="Holded";
                $("#"+id).attr("disabled",true);
            }
        });
    }
        
    function resolve_support(id){
        if(!confirm("Are you sure for mark as resolve this one..!")){
            return false;
        }
        var id = id.substring( 1);
        jQuery.ajax({
            url:"$adminurl"+"support/ajax_resolve_support",
            type: "post",  // method  , by default get
            datatype:"json",
            data: {
                id: id,
                status:2,
            },
            success: function(data){
                $("#"+id).hide();
                document.getElementById("d"+id).innerHTML="Resolved";
                document.getElementById("d"+id).classList.remove("btn-success");
                document.getElementById("d"+id).classList.add("btn-danger");
                $("#d"+id).attr("disabled",true);
            }
        });
   }
 </script>
EOD;
echo modules::run('admin_panel/template/add_custum_js', $custum_js);
?>