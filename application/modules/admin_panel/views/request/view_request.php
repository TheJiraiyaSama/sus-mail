<?php //pre($result);die;          ?>
<section class="panel" id="manual">
    <form id="registration_form" role="form" enctype="multipart/form-data" method="post">
        <header class="panel-heading">Request Details</header>
        <div class="row">
            <div class="form-group col-md-6">
                <label>User Name</label>
                <input type="text" class="form-control" readonly="" style="background-color: white" value="<?php
                if (isset($result)) {
                    echo $result['name'];
                }
                ?>">
            </div>
            <div class="form-group col-md-6">
                <label>User Email</label>
                <input type="text" class="form-control" readonly="" style="background-color: white" value="<?php
                if (isset($result)) {
                    echo $result['email'];
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>User Mobile</label>
                <input type="text" class="form-control" readonly="" style="background-color: white"  value="<?php
                if (isset($result) && $result['mobile'] != 0) {
                    echo $result['mobile'];
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Request Region</label>
                <input type="text" class="form-control" readonly="" style="background-color: white"  value="<?php
                if (isset($result)) {
                    echo $result['region'];
                }
                ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Service Start Date</label>
                <input type="text" class="form-control" readonly="" style="background-color: white"  value="<?php
                if (isset($result) && $result['start_date'] != 0) {
                    echo date("d-M-Y", $result['start_date']);
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Service Mode</label>
                <input type="text" class="form-control" readonly="" style="background-color: white" value="<?php
                if (isset($result)) {
                    if ($result['service_mode'] == 1) {
                        echo "Online";
                    } else if ($result['service_mode'] == 2) {
                        echo "Customer Place";
                    } else {
                        echo 'Other';
                    }
                }
                ?>">
            </div>
        </div>
        <?php if ($result['mode_description'] != "") { ?>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Mode Description</label>
                    <textarea rows="3" type="text" class="form-control" readonly="" style="background-color: white"><?php
                        if (isset($result)) {
                            echo $result['mode_description'];
                        }
                        ?></textarea>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Requirement Type</label>
                <input type="text" class="form-control" readonly="" style="background-color: white"  value="<?php
                if (isset($result)) {
                    if ($result['requirement_type'] == 1) {
                        echo 'Bussiness';
                    } else {
                        echo "Personal";
                    }
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Requirement Details</label>
                <textarea rows="3" type="text" class="form-control" readonly="" style="background-color: white" maxlength="500" ><?php
                    if (isset($result)) {
                        echo $result['requirement_details'];
                    }
                    ?></textarea>
            </div>
        </div>
        <?php if ($result['modified'] != 0 && $result['status'] == 2) { ?>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Accept Date</label>
                    <input type="text" class="form-control" readonly="" style="background-color: white"  value="<?php
                    if (isset($result) && $result['modified'] != 0) {
                        echo date("d-M-Y", $result['modified']);
                    }
                    ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Price</label>
                    <input type="text" class="form-control" readonly="" style="background-color: white"  value="<?php
                    if (isset($result) && $result['price'] != 0) {
                        echo $result['price'];
                    }
                    ?>">
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="form-group col-md-6">
                <button <?php
                if (isset($result) && $result['status'] != 1) {
                    echo "Disabled";
                }
                ?> data-toggle="modal" href="#myModal" type="button" class="btn <?php
                    if (isset($result) && $result['status'] != 1) {
                        echo "btn-danger";
                    } else {
                        echo "btn-info";
                    }
                    ?> col-md-12"><span id="add_test"><?php
                    if (isset($result) && $result['status'] != 1) {
                        echo "Already Accepted";
                    } else {
                        echo "Accept Request";
                    }
                    ?></span></button>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary col-md-12" onclick="window.history.go(-1); return false;" ><span id="add_test">Go Back</span></button>
            </div>
        </div>
    </form>
</section>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_buy_service" action="<?php echo ADMIN_PANEL_URL . "request/accept_service_request"; ?>">
                <input name="id" id="sub_service_id" value="<?= (isset($_GET['id'])) ? $_GET['id'] : "" ?>" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Please! Fill This Field</h4>
                </div>
                <div class="modal-body custom_modal">
                    <p>Service Price</p>
                    <input type="text" class="form-control number" placeholder="Enter Service Price" name="price" required="">
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("form").submit(function () {
        $(this).find(':submit').attr('disabled', 'disabled');
        $(this).find(':submit').text('Please Wait...');
    });

    function process(id, status) {
        if (status == 2 || status == 4) {
            var id = id.substring(1);
        }
        jQuery.ajax({
            url: "<?php echo "request/ajax_process_request"; ?>",
            type: "post", // method  , by default get
            datatype: "json",
            data: {
                id: id,
                status: status,
            },
            success: function (data) {
                if (data == 1 && status == 2) {
                    $("#a" + id).addClass("btn-primary");
                    $("#a" + id).removeClass("btn-success");
                    $("#a" + id).text("Accepted");
                    $("#a" + id).attr("disabled", true);
                }
            }
        });
    }
</script>