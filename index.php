<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<style>
	body {
	    background-color: #C6F5F2;
	}
	#content { background-color:#C6F5F2; width:950px; min-height:550px; text-align:left; padding:20px;  }
	h1 {
	    padding:20px 10px 20px 10px;
	}
	h2 {
	    padding-left: 0px !important;
	}
	#header {
	    background-color: #CA410B !important;
	}
	.italic { font-style:italic }
	.fieldrequired { color:red; }
	.large { font-size:22px; }
	.orange { color:orange; }
	.padout { padding-left:25px; padding-right:25px; }
	.textmiddle {vertical-align:middle;}
	.rounded-corners {
	     -moz-border-radius: 40px;
	    -webkit-border-radius: 40px;
	    -khtml-border-radius: 40px;
	    border-radius: 40px;
	}
	.rounded-corners-top {
	     -moz-border-top-radius: 40px;
	    -webkit-border-radius: 40px;
	    -khtml-border-radius: 40px;
	    border-radius: 40px;
	}
	.right {
	    float: right;
	}
	.scrolldown { padding-left:20px; color:#EDECE8; font-size:40px; font-weight:bold; vertical-align:middle;
		text-shadow: #6374AB 2px 2px 2px;
	 }
	 .contentblock { margin: 0px 20px; }
	 .results { border: 1px solid blue; padding:20px; margin-top:20px; min-height:50px; }
	 .blue-bold { font-size:18px; font-weight:bold; color:blue; }

	 /* example styles for validation form demo */
	#register-form {
	    background: url("form-fieldset.gif") repeat-x scroll left bottom #F8FDEF;
	    border: 1px solid #DFDCDC;
	    border-radius: 15px 15px 15px 15px;
	    display: inline-block;
	    margin-bottom: 30px;
	    margin-left: 20px;
	    margin-top: 10px;
	    padding: 25px 50px 10px;
	    width: 440px;
	}

	#register-form .fieldgroup {
	    background: url("form-divider.gif") repeat-x scroll left top transparent;
	    display: inline-block;
	    padding: 8px 10px;
	    width: 340px;
	}

	#register-form .fieldgroup label {
	    float: left;
	    padding: 15px 0 0;
	    text-align: left;
	    width: 110px;
	}

	#register-form .fieldgroup input, #register-form .fieldgroup select {
	    float: right;
	    margin: 10px 0;
	    height: 25px;
	}

	#register-form .fieldgroup textarea{
		float: right;
		margin: 10px 0;
	}

	#register-form .submit {
	    padding: 10px;
	    width: 220px;
	    height: 40px !important;
	}

	#register-form .fieldgroup label.error {
	    color: #FB3A3A;
	    display: inline-block;
	    font-size: .9em;
	    margin: 4px 0 5px 93px;
	    padding: 0;
	    text-align: right;
	    width: 225px;
	}
	</style>
</head>
<body>
	
	<div id="page-wrap">

		<div id="content">

			
			<!-- HTML form for validation demo -->
			<form action="" method="post" id="register-form" novalidate="novalidate">

				<h2>User Registration</h2>

				<div id="form-content">
					<fieldset>

						<div class="fieldgroup">
							<label for="name">Name <span class="fieldrequired" >*</span></label>
							<input type="text" name="name">
						</div>

						<div class="fieldgroup">
							<label for="company">Company <span class="fieldrequired" >*</span></label>
							<input type="text" name="company">
						</div>

						<div class="fieldgroup">
							<label for="email">Email <span class="fieldrequired" >*</span></label>
							<input type="text" name="email">
						</div>

						<div class="fieldgroup">
							<label for="phone">Phone number <span class="fieldrequired" >*</span></label>
							<input type="text" name="phone">
						</div>

						<div class="fieldgroup">
							<label for="address">Address <span class="fieldrequired" >*</span></label>
							<input type="text" name="address">
						</div>

						<div class="fieldgroup">
							<label for="city">City <span class="fieldrequired" >*</span></label>
							<input type="text" name="city">
						</div>

						<div class="fieldgroup">
							<label for="state">State <span class="fieldrequired" >*</span></label>
							<input type="text" name="state">
						</div>

						<div class="fieldgroup">
							<label for="country">Country <span class="fieldrequired" >*</span></label>
							<input type="text" name="country">
						</div>

						<div class="fieldgroup">
							<label for="message">Message <span class="fieldrequired" >*</span></label>
							<textarea name="message" id="" cols="19" rows="9"></textarea>
						</div>

						<div class="fieldgroup">
							<input type="submit" value="Submit" class="submit">
						</div>

					</fieldset>
				</div>

			</form>
			<!-- END HTML form for validation -->

		</div>

	</div>

<script type="text/javascript">
/**
  * Basic jQuery Validation Form Demo Code
  * Copyright Sam Deering 2012
  * Licence: http://www.jquery4u.com/license/
  */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
                    name: "required",
                    company: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    phone: "required",
                    address: "required",
                    city: "required",
                    state: "required",
                    country: "required",
                    message: "required",
                                        
                },
                messages: {
                    name: "Please enter your name",
                    company: "Please the name of your company",
                    email: "Please enter a valid email address",
                    phone: "Please enter your phone number",
                    address: "Please enter your address",
                    city: "Please enter your city",
                    state: "Please enter your state",
                    country: "Please enter your country",
                    message: "Please enter your message",
                    
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
</body>
</html>