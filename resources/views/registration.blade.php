<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
    <div class="col-6">
        <div class="form-group">
            <label for="txtfirst">First Name</label>
            <input type="text" class="form-control" id="txtfirst"  placeholder="Enter First Name" name="txtfirst">
            <small id="txterrorfirst" class="form-text text-muted"></small>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="txtlast">Last Name</label>
            <input type="text" class="form-control" id="txtlast"  placeholder="Enter Last Name" name="txtlast">
            <small id="txterrorlast" class="form-text text-muted"></small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="txtcontact">Contact Number</label>
            <input type="number" class="form-control" id="txtcontact"  placeholder="Enter contact Number" name="txtcontact">
            <small id="txterrorcontact" class="form-text text-muted"></small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="txtemail">Email Id</label>
            <input type="email" class="form-control" id="txtemail"  placeholder="Enter email Id" name="txtemail">
            <small id="txterroremail" class="form-text text-muted"></small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="txtaddress">Address</label>
            <textarea class="form-control" id="txtaddress" name="txtaddress">
            </textarea>
           
            <small id="txterroraddress" class="form-text text-muted"></small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="txtcountry">Country</label>
            <select class="form-control"  data-live-search="true" id="txtcountry" name="txtcountry">
            <option value="" selected>Select Country</option>
                @for($i=0;$i< count($country);$i++)
                    <option value="{{$country[$i]['id']}}">{{$country[$i]['name']}}</option>
                @endfor
            </select>
            <small id="txterrorcountry" class="form-text text-muted"></small>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="txtstate">State</label>
            <select class="form-control"  data-live-search="true" id="txtstate" name="txtstate">
                <option value="">Select State</option>
            </select>
            <small id="txterrorstate" class="form-text text-muted"></small>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="txtcity">City</label>
            <select class="form-control"  data-live-search="true" id="txtcity" name="txtcity">
                <option value="">Select City</option>
            </select>
            <small id="txterrorcity" class="form-text text-muted"></small>
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
        $('#txtcountry').change(function () {
			var data = $(this).val();
			var formdata = {
				country: data
			};
			$.ajax({
				type: 'get',
				url: '{!! route('getstate') !!}',
				data: formdata,
				datatype: 'json',
				success: function (data) {
					$('#txtstate').empty();
					$('#txtcity').empty();
					$('#txtstate').append($('<option>', {
						value: "",
						text: "Select State"
					}));
					$('#txtcity').append($('<option>', {
						value: "",
						text: "Select City"
					}));
					// $('#state_id').append($('<option>', {
					// 	value:"",
					// 	text: "Select stae"
					// }));
					for (var i = 0; i < data.responsestate.length; i++) {
						$('#txtstate').append($('<option>', {
							value: data.responsestate[i]['id'],
							text: data.responsestate[i]['state']
						}));
					}
				},
				error: function (error) {
					alert(error);
				}
			});
		});
        $('#txtstate').change(function () {
			var data = $(this).val();
			var formdata = {
				state: data
			};
			$.ajax({
				type: 'get',
				url: '{!! route('getcity') !!}',
				data: formdata,
				datatype: 'json',
				success: function (data) {
					$('#txtcity').empty();
					$('#txtcity').append($('<option>', {
						value: "",
						text: "Select City"
					}));
					// $('#state_id').append($('<option>', {
					// 	value:"",
					// 	text: "Select stae"
					// }));
					for (var i = 0; i < data.responsecity.length; i++) {
						$('#txtcity').append($('<option>', {
							value: data.responsecity[i]['id'],
							text: data.responsecity[i]['city']
						}));
					}
				},
				error: function (error) {
					alert(error);
				}
			});
		});
        $("#btnregistration").click(function() {
            $('#frmregistration').valid();
        });
        $('#frmregistration').validate({
            rules: {
                txtemail: {
                    required: true,
                    email: true
                },
                txtcontact: {
                    required: true,
                    digits: true,
                    rangelength: [10, 10]
                },
                txtfirst: {
                    required: true
                },
                txtlast: {
                    required: true
                },
                txtaddress: {
                    required: true
                },
                txtcountry: {
                    required: true
                },
                txtstate: {
                    required: true
                },
                txtcity: {
                    required: true
                },
                txtpassword: {
                    required: true
                }
            },
            submitHandler: function (form) {
                console.log("sdsj");// for demo
                var txtemail = $('#txtemail').val();
                var _token = $("input[name='_token']").val();
                var txtcontact = $('#txtcontact').val();
                var txtfirst = $('#txtfirst').val();
                var txtlast = $('#txtlast').val();
                var txtaddress = $('#txtaddress').val();
                var txtcountry = $('#txtcountry').val();
                var txtstate = $('#txtstate').val();
                var txtcity = $('#txtcity').val();
                var txtpassword = $('#txtpassword').val();
                var formdata = {
                    txtemail: txtemail,
                    txtcontact: txtcontact,
                    txtfirst: txtfirst,
                    txtlast: txtlast,
                    txtaddress: txtaddress,
                    _token: _token,
                    txtcountry: txtcountry,
                    txtstate: txtstate,
                    txtcity: txtcity,
                    txtpassword: txtpassword
                };
                $.ajax({
                    url: '{!! route('registration') !!}',
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
                            $("#displaymessage").css("display", "block");
                            $('#message').text('Your query has been submitted')
                            $("#frmregistration")[0].reset();
                            // window.location.href = "/thank-you-form";
                        }
                        // else if (data.error == 404) {
                        //     $("#displaymessage").css("display", "block");
                        //     $('#message').text('OOPs some problem occured')
                        // }
                        else {
                            window.location.href = '/dcp/view-cart/';
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