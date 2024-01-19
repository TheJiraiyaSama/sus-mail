<section class="panel" id="manual">
    <form id="registration_form" role="form" method="post" enctype="multipart/form-data">
        <header class="panel-heading">Add Member</header>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Name</label>
                <input type="text" name="name" id="name" maxlength="80" placeholder="Enter Name" class="form-control alphabet" value="<?php
                if (isset($result)) {
                    echo $result['name'];
                }
                ?>" >
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Designation</label>
                <input type="text" class="form-control" maxlength="80" placeholder="Feature Designation" name="designation" id="designation" required value="<?php
                if (isset($result)) {
                    echo $result['designation'];
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Experience</label>
                <input type="text" class="form-control number" maxlength="80" placeholder="Add Experience Year" name="experience" id="experience" required value="<?php
                if (isset($result)) {
                    echo $result['experience'];
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Description  (Character Limit-500)</label>
                <textarea type="text" rows="3" class="form-control" maxlength="500" placeholder="Enter Description" name="description" id="description" required><?php
                    if (isset($result)) {
                        echo $result['description'];
                    }
                    ?></textarea>
            </div>
        </div> 
         <div class="row">
            <div class="form-group col-md-6">
                <label>Facebook Link</label>
                <input type="text" class="form-control" maxlength="80" placeholder="Add Facebook Link" name="fb_url"  required value="<?php
                if (isset($result)) {
                    echo $result['fb_url'];
                }
                ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Twitter Link</label>
                <input type="text" class="form-control" maxlength="80" placeholder="Add Twitter Link" name="twitter_url"  required value="<?php
                if (isset($result)) {
                    echo $result['twitter_url'];
                }
                ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Instagram Link</label>
                <input type="text" class="form-control" maxlength="80" placeholder="Add Instagram Link" name="insta_url"  required value="<?php
                if (isset($result)) {
                    echo $result['insta_url'];
                }
                ?>">
            </div>
        </div>   
        <div class="row">
            <div class="form-group col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <?php if (empty($result)) { ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                        <?php } else { ?>
                            <img src="<?php echo base_url("uploads/team/" . $result['image']); ?>" alt="">
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
                <button type="submit" class="btn btn-info col-md-12"><span id="add_test"><?php
                        if (isset($result['id'])) {
                            echo 'Update ';
                        } else {
                            echo 'Add ';
                        }
                        ?>Member</span></button>
            </div>
        </div>
    </form>
</section>
