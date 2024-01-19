<section class="panel" id="manual">
    <form id="registration_form" role="form" enctype="multipart/form-data" method="post">
        <header class="panel-heading">Add Keyword</header>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Keyword </label>
                <input type="text" maxlength="80" class="form-control" placeholder="Keyword" name="title" required value="<?php if(isset($result)){ echo $result['title']; } ?>">
            </div>
        </div>
              
        <div class="row">
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-info col-md-12"><span id="add_test"><?php if(isset($result['id'])){echo 'Update Keyword';}else{    echo 'Add Keyword'; } ?></span></button>
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