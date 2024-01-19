<section class="panel">
    <header class="panel-heading" style="height: 35px">
        Service Request List
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
                        <th>Mobile</th>
                        <th>Service Title</th>
                        <th>Region</th>
                        <th>Request Date</th>
                        <th>Accept Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th></th>
                        <th><input type="text" data-column="1"  class="form-control search-input-text"></th>
                        <th><input type="text" data-column="2"  class="form-control search-input-text"></th>
                        <th><input type="text" data-column="6"  class="form-control search-input-text"></th>
                        <th><input type="text" data-column="3"  class="form-control search-input-text"></th>
                        <th>
                            <select data-column="5" class="form-control search-input-text">
                                <option value="">All</option>
                                <?php foreach ($regions as $region){ ?>
                                <option value="<?php echo $region['id']; ?>"><?php echo $region['name']; ?></option>
                                <?php } ?>
                            </select>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <select data-column="4" class="form-control search-input-text">
                                <option value="">All</option>
                                <option value="1">Request</option>
                                <option value="2">Accepted</option>
                                <option value="3">On Hold</option>
                                <option value="4">Rejected</option>
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
                    'aTargets': [0,8,9] /* 1st one, start by the right */
            }],
             "order": [[ 0, "desc" ]],
             "ajax":{
                 url :"$adminurl"+"request/ajax_request_list", // json datasource
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
        
    function process(id,status){
        if(status==2 || status==4){
            var id = id.substring( 1);
        }
        jQuery.ajax({
            url:"$adminurl"+"request/ajax_process_request",
            type: "post",  // method  , by default get
            datatype:"json",
            data: {
                id: id,
                status: status,
            },
            success: function(data){
//                if(data==1 && status==2){
//                    $("#a"+id).addClass("btn-primary");
//                    $("#a"+id).removeClass("btn-success");
//                    $("#a"+id).text("Accepted");
//                    $("#a"+id).attr("disabled",true);
//                }else 
                if(data==1 && status==3){
                    $("#"+id).addClass("btn-danger");
                    $("#"+id).removeClass("btn-warning");
                    $("#"+id).text("Holded");
                    $("#"+id).attr("disabled",true);
                }else if(data==1 && status==4){
                    $("#r"+id).text("Rejected");
                    $("#r"+id).attr("disabled",true);
                }
            }
        });    
    }
        
//    function accept_request(id){//done
//        if(!confirm("You will not be able to change status of this request after mark as accepted..!")){
//            return false;
//        }
//        process(id,2);
//    }
        
    function pending_request(id){//done
        if(!confirm("Are you sure for mark as hold this one..!")){
            return false;
        }
        process(id,3);
    }
        
    function reject_request(id){
        if(!confirm("Are you sure for Reject this one..!")){
            return false;
        }
        process(id,4);
    }
 </script>
EOD;
echo modules::run('admin_panel/template/add_custum_js', $custum_js);
?>