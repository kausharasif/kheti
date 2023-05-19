<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
    <span style="display:none" id="displaymessage">
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <p><strong id="message"></strong></p>
        </div>
    </span>
<form id="frmregistration">
    @csrf
 

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="txtemail">Username</label>
            <input type="email" class="form-control" id="txtemail"  placeholder="Enter email Id" name="txtemail">
            <small id="txterroremail" class="form-text text-muted"></small>
        </div>
    </div>
</div>
  <div class="form-group">
    <label for="txtpassword">Password</label>
    <input type="password" class="form-control" id="txtpassword" placeholder="Password" name="txtpassword">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary" id="btnregistration">Submit</button>
  <div id='loader' style='display: none; position: absolute; width: 100%;'>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            style="margin: auto; background: none; display: block; shape-rendering: auto;" width="60px"
                            height="60px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke="#eb5564" stroke-width="6" r="35"
                                stroke-dasharray="164.93361431346415 56.97787143782138"
                                transform="rotate(304.986 50 50)">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite"
                                    dur="1s" values="0 50 50;360 50 50" keyTimes="0;1" />
                            </circle>
                        </svg>
    </div>
</form>
</div>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="text/javascript"
    src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#btnregistration").click(function() {
            $('#frmregistration').valid();
        });
        $('#frmregistration').validate({
            rules: {
                txtemail: {
                    required: true,
                    email: true
                },
                txtpassword: {
                    required: true
                }
            },
            submitHandler: function (form) {
                var txtemail = $('#txtemail').val();
                var _token = $("input[name='_token']").val();
                var txtpassword = $('#txtpassword').val();
                var formdata = {
                    email: txtemail,
                    _token: _token,
                    password: txtpassword
                };
                $.ajax({
                    url: '{!! route('login') !!}',
                    type: 'POST',
                    data: formdata,
                    beforeSend: function () {
                        // Show image container
                        $("#loader").show();
                    },
                    complete: function () {
                        $("#loader").hide();
                    },
                    success: function (data) {
                        if (data.success == 200) {
                            
                            // $("#displaymessage").css("display", "block");
                            // $('#message').text('Your query has been submitted')
                            // $("#frmregistration")[0].reset();
                            window.location.href = "/dashboard";
                        }
                        // else if (data.error == 404) {
                        //     $("#displaymessage").css("display", "block");
                        //     $('#message').text('OOPs some problem occured')
                        // }
                        else {
                           $("#displaymessage").css("display", "block");
                            $('#message').text('OOPS Some problem occured')
                            $("#frmregistration")[0].reset();
                            // window.location.href = '/dcp/view-cart/' + toursid;
                        }
                    }
                });
                return false;
            }
        });
    });
</script>
</body>
</html>