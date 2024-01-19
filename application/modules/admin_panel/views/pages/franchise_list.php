<div class="col-sm-12">
    <section class="panel">
        <header class="panel-heading">
            <?php // echo strtoupper($page); ?> Feedback(s) LIST
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <table  class="display table table-bordered table-striped" id="all-user-grid">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone no.</th>
                            <th>Email</th>
                            <th>Payment Category</th>
                            <th>Payment For</th>
                            <th>Price Paid</th>
<!--                            <th>Message</th> -->
                            <th>Created On</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <input type="text" data-column="1" class="form-control search-input-text">
                            </th>
                            <th>
                                <input type="text" data-column="2" class="form-control search-input-text">
                            </th>
                            <th>
                                <input type="text" data-column="3" class="form-control search-input-text">
                            </th>
                            <th>
                                <select data-column="4"  class="form-control search-input-select">
                                    <option value="">All</option>
                                    <option value="4">Event</option>
                                    <option value="5">Course</option>
                                    <option value="6">Premium Video</option>
                                    <option value="7">Newsletter</option>
                                    <option value="8">Calculator</option>
                                </select>
                            </th>
                            <th>
                                <input type="text" data-column="5" class="form-control search-input-text">
                            </th>
                            <th></th> 
                            <th></th>
<!--                            <th></th>-->
                            <th>
                                <select data-column="9"  class="form-control search-input-select">
                                    <option value="">All</option>
                                    <option value="2">Replied</option>
                                    <option value="1">Pending</option>
                                </select>
                            </th> 
                            <th class="col-sm-2"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_message" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Message Details</h4>
            </div>
            <div class="modal-body" id="modal_message_body">
<!--                <p>This is a small modal.</p>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    .dt-buttons{
        float:right !important;
    }
</style>
<?php
$adminurl = AUTH_PANEL_URL;
//if($page == 'android') { $device_type = 1; } elseif ($page == 'ios') { $device_type = 2; } elseif ($page == 'all') { $device_type = '0'; }
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
                       var table = 'all-user-grid';
                       var dataTable = jQuery("#"+table).DataTable( {
                           "processing": true,
                            "language": {
                                "processing": "<i class='fa fa-spin  fa-spinner fa-4x' style='z-index:999'><i>" //add a loading image,simply putting <img src="loader.gif" /> tag.
                            },
                            "autoWidth": false,
                            "responsive": true,
                            //"scrollX": true,
                            "pageLength": 15,
                            "dom": "lBfrtip",
                            "buttons": ['excel', 'pdf', 'print' ],
                            "lengthMenu": [[15, 25, 50 ,100], [15, 25, 50,100]],
                            "serverSide": true,
                           "order": [[ 0, "desc" ]],
                           "ajax":{
                               url :"$adminurl"+"Pages/ajax_feeback_list/", // json datasource
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
						
						$( function() {
					$( ".dpd1" ).datetimepicker();
					$( ".dpd2" ).datetimepicker();
					 }); // datepicker closed
                   } );
               </script>
        <script>
        $('#coupon_for').change( function(){
            var coupon_for = $(this).val();
            //alert(coupon_for);
            if(coupon_for == 0){
                $('#user_id').hide();
                $('#event_id').show();
            } else{
                $('#user_id').show();
                $('#event_id').hide();
            }
        });    
   
        </script>
        
        <script>
        function view_message(id){
            //alert(id);
            $.ajax({
              url:"$adminurl"+"Pages/ajax_feedback_deatils/"+id,
              method: 'POST',
              success : function(html) {
                //alert(html);
                    $('#modal_message_body').html(html);
                    $('#modal_message').modal('show');
                }
           });
        }   
   
        </script>
        
        
        <script>
        
        
        function rep_entry(id){
              $.ajax({
              url:"$adminurl"+"Pages/ajax_update_feedback_status/2/"+id,
              method: 'POST',
              dataType: 'json',
              success : function(data) {
                if(data.status == true){
                    $('#all-user-grid').DataTable().ajax.reload(null, false);
                 } 
                }
           });
        }
        
        function delete_entry(id){
             $.ajax({
              url:"$adminurl"+"Pages/ajax_update_feedback_status/3/"+id,
              method: 'POST',
              dataType: 'json',
              success : function(data) {
                if(data.status == true){
                    //$('.del_'+id).closest("tr").hide();
                    $('#all-user-grid').DataTable().ajax.reload(null, false);
                 } 
                }
           });
        }
        
        
        </script>
            
   

EOD;

echo modules::run('auth_panel/template/add_custum_js', $custum_js);
?>

