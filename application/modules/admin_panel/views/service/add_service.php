<section class="panel" id="manual">
    <form id="registration_form" role="form" enctype="multipart/form-data" method="post">
        <header class="panel-heading">Add Service</header>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Select Service Region</label>
                <select class="form-control col-md-12" name="region_id" required="">
                    <option value="">Select Region</option>
                    <?php foreach ($regions as $region){ ?>
                    <option <?php if(isset($result) && $result['region_id']==$region['id']){ echo 'SELECTED'; } ?> value="<?php echo $region['id'] ?>"><?php echo $region['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>File Type</label>
                <select class="form-control" name="type" id="type" required="">
                    <option value="">Select</option>
                    <option value="1" name="type" id="file" <?= (isset($result)) ? ($result['type'] == 1) ? "SELECTED" : "" : "" ?>>Select File</option>
                    <option value="2" name="type" id="url" <?= (isset($result)) ? ($result['type'] == 1) ? "" : "SELECTED" : "" ?>>Video URL</option>
                </select>
            </div>
        </div>
        <div id="file_video" style="<?php
        if (isset($result)) {
            if ($result['type'] != 1) {
                echo 'display:none';
            }
        } else {
            echo 'display:none';
        }
        ?>">
        <div class="row">
            <div class="form-group col-md-12">
                <label>select video</label>
                <input type="file" class="form-control" name="yt_url" accept="video/*" value="<?php if(isset($result)){ echo $result['yt_url']; } ?>">
            </div>
        </div>
        </div>
        <div id="url_video" style="<?php
        if (isset($result)) {
            if ($result['type'] != 2) {
                echo 'display:none';
            }
        } else {
            echo 'display:none';
        }
        ?>">
        <div class="row">
            <div class="form-group col-md-12">
                <label>Service URL</label>
                <input type="text" maxlength="80" class="form-control" placeholder="Youtube URLs" name="yt_url" value="<?php if(isset($result)){ echo $result['yt_url']; } ?>">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Services Title</label>
                <input type="text" maxlength="80" class="form-control" placeholder="Services Title" name="title" required value="<?php if(isset($result)){ echo $result['title']; } ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Services Description</label>
                <textarea rows="3" type="text" maxlength="1000" class="form-control" placeholder="Services Description" name="description" required><?php if(isset($result)){ echo $result['description']; } ?></textarea>
            </div>
        </div>   
        <div class="row">
            <div class="form-group col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <?php if (empty($result)) { ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                        <?php } else { ?>
                            <img src="<?php echo base_url("uploads/services/" . $result['image']); ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-white btn-file">
                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="image" id="image" class="default" accept="image/*" <?= (isset($result)) ? "" : "required" ?>>
                        </span>
                        <!--<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>-->
                    </div>
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-info col-md-12"><span id="add_test"><?php if(isset($result['id'])){echo 'Update Service';}else{    echo 'Add Service'; } ?></span></button>
            </div>
        </div>
    </form>
</section>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#type").change(function () {
            if ($(this).val() == "1") {
                $("#file_video").show();
                $("#url_video").hide();
            } else{
                $("#url_video").show();
                $("#file_video").hide();
            } if($(this).children("option:selected").val()==""){
                $("#url_video").hide();
                $("#file_video").hide();
            }
        });
    });
</script>