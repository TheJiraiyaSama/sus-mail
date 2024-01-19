<?php //pre($result);die; ?>
<section class="panel" id="manual">
    <form id="registration_form" role="form" enctype="multipart/form-data" method="post">
        <header class="panel-heading">Add News</header>
        <div class="row">
            <div class="form-group col-md-12">
                <label>News Title</label>
                <input type="text" class="form-control" required="" maxlength="80" placeholder="News Title" name="title" value="<?php
                if (isset($result)) {
                    echo $result['title'];
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Posted By Name</label>
                <input type="text" class="form-control" required="" maxlength="30" placeholder="Posted By Name" name="posted_by"  value="<?php
                if (isset($result)) {
                    echo $result['posted_by'];
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>News Description</label>
                <textarea rows="3" type="text" class="form-control" required="" maxlength="500" placeholder="News Description" name="description" ><?php
                if (isset($result)) {
                    echo $result['description'];
                }
                ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <?php if (empty($result)) { ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                        <?php } else { ?>
                            <img src="<?php echo base_url("uploads/news/" . $result['image']); ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-white btn-file">
                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="image" id="image" class="default" accept="image/*" required>
                        </span>
                        <!--<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-info col-md-12">
                    <span id="add_test"><?php
                        if (isset($result['id'])) {
                            echo 'Update News';
                        } else {
                            echo 'Add News';
                        }
                        ?>
                    </span>
                </button>
            </div>
        </div>
    </form>
</section>