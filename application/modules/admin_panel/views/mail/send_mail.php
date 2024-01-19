<?php //pre($result);die;        ?>
<section class="panel" id="manual">
    <form id="registration_form" role="form" enctype="multipart/form-data" method="post">
        <header class="panel-heading">Send Mail To Users</header>
     <div class="row">
            <div class="form-group col-md-12">
                <label>TO</label>
                <input type="text" class="form-control" required="" placeholder="To" name="to"  value="<?php
                if (isset($to)) {
                    echo $result['to'];
                }
                ?>">
            </div>
        </div>


       <div class="row">
            <div class="form-group col-md-12">
                <label>FROM</label>
               <input type="text" class="form-control" required="" placeholder="from" name="from"  value="<?php
                if (isset($from)) {
                    echo $result['from'];
                }
                ?>">
            </div>
        </div>

      <div class="row">
            <div class="form-group col-md-12">
                <label>Subject</label>
                <input type="text" class="form-control" required="" placeholder="Subject" name="subject"  value="<?php
                if (isset($result)) {
                    echo $result['subject'];
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Message</label>
                <textarea class="form-control" id="message" required="" rows="3" maxlength="300" placeholder="message" name="message"><?php
                    if (isset($result)) {
                        echo $result['message'];
                    }
                    ?></textarea>
            </div>
        </div>  
        <div class="row">
            <?php if (isset($result)) { ?>
                <div class="form-group col-md-6">
                    <button type="button" class="btn btn-info col-md-12" onclick="window.history.go(-1); return false;">
                        Go Back
                    </button>
                </div>
            <?php } else { ?>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-info col-md-12">
                        Send Mail
                    </button>
                </div>
            <?php } ?>
        </div>
    </form>
</section>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js">
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
  $('#message').keyup(function() {
   var textBoxValue = $(this).val();
    //console.log(textBoxValue);
   var forbidden = [
      'kill',
      'murdered',
      'kidnap ',
      'rape',
      'drugging',
      'drug',
      'attack',
      'stolen',
      'bombering',
      'terrist attack',
      'robbering',
      'anti-national forces'

    ];
 for(var i = 0; i < forbidden.length; i++) {
      if(textBoxValue.search(forbidden[i]) > -1) {
        textBoxValue = textBoxValue.replace(forbidden[i], '');
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Your Message is contains suspicious contents.',
  footer: '<a href style="color:red;">Your account is subjected to verification for one day Please co-operate.</a>'
})
      }
    }

    $(this).val(textBoxValue);
  });
});
</script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" language="javascript" >
    jQuery('form').submit(function () {
        $(this).find(':submit').attr('disabled', 'disabled');
        $(this).find(':submit').text('Please Wait...');
    });
</script>