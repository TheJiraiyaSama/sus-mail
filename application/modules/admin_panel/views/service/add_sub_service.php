<?php //pre($result);die; ?>
<section class="panel" id="manual">
    <form id="registration_form" role="form" enctype="multipart/form-data" method="post">
        <header class="panel-heading">Add Sub Service</header>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Select Service</label>
                <select class="form-control col-md-12" name="master_services_id" required="">
                    <option value="">--Select--</option>
                    <?php foreach ($services as $service){ ?>
                    <option <?php if(isset($result) && $result['master_services_id']==$service['id']){ echo 'SELECTED'; } ?> value="<?php echo $service['id']; ?>"><?php echo $service['title']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Sub Services Title</label>
                <input type="text" maxlength="80" class="form-control" placeholder="Sub Services Title" name="title" required value="<?php if(isset($result)){ echo $result['title']; } ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Sub Services Description</label>
                <textarea rows="3" type="text" maxlength="1000" class="form-control" placeholder="Sub Services Description" name="description" required><?php if(isset($result)){ echo $result['description']; } ?></textarea>
            </div>
        </div>   
        <div class="row">
            <div class="form-group col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <?php if (empty($result)) { ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                        <?php } else { ?>
                            <img src="<?php echo base_url("uploads/sub_services/" . $result['image']); ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-white btn-file">
                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" <?php if(!isset($result)){ /*echo 'required';*/ } ?> name="image" id="image" class="default" accept="image/*" required>
                        </span>
                        <!--<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>-->
                    </div>
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-info col-md-12"><span id="add_test"><?php if(isset($result['id'])){echo 'Update Sub Service';}else{    echo 'Add Sub Service'; } ?></span></button>
            </div>
        </div>
    </form>
</section>