<?php 
	$emailTo="email_address";
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$nombre 		=stripslashes(trim($_POST['nombre']));
		$empresa 	=stripslashes(trim($_POST['empresa']));
		$email 		=stripslashes(trim($_POST['email']));
		$telefono 	=stripslashes(trim($_POST['telefono']));
		$direccion	=stripslashes(trim($_POST['direccion']));
		$ciudad		=stripslashes(trim($_POST['ciudad']));
		$estado		=stripslashes(trim($_POST['estado']));
		$pais 	=stripslashes(trim($_POST['pais']));
		$mensaje 	=stripslashes(trim($_POST['mensaje']));
		$subject	="Mensaje enviado de tecmov.com";

		$emailIsValid = preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email);

		if($nombre && $email && $emailIsValid && $subject && $mensaje){
			$body = "Nombre: $nombre <br /> Empresa: $empresa <br /> Email: $email <br /> Telefono: $telefono <br /> Direccion: $direccion <br /> Ciudad: $ciudad <br /> Estado: $estado <br /> Pais: $pais <br /> mensaje: $mensaje";
			$headers  = 'MIME-Version: 1.1' . PHP_EOL;
			$headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
			$headers .= "From: $nombre <$email>" . PHP_EOL;
			$headers .= "Return-Path: $emailTo" . PHP_EOL;
			$headers .= "Reply-To: $email" . PHP_EOL;
			$headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		} else {
			$hasError = true;
		}
	}
?>

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
	    background-color: #f7f7f7;
	}
	#content { background-color:#f7f7f7; width:550px; min-height:550px; text-align:left; padding:20px; padding-top: 0;  }
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
	.emailSent{ 
		display: inline-block;
		margin: 5px 0 5px 25px;
		color: #007500;
		font-size: 1.3em;
	}
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
	    margin-top: 0px;
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

			<?php 
				if (!empty($emailSent)) {
					?>
					<span class="emailSent"> Mensaje enviado! </span>
				<?php
				}
			?>	
			
			<!-- HTML form for validation demo -->
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="register-form" novalidate="novalidate">

				<h2>Contact Form</h2>

				<div id="form-content">
					<fieldset>

						<div class="fieldgroup">
							<label for="nombre">Nombre <span class="fieldrequired" >*</span></label>
							<input type="text" name="nombre">
						</div>

						<div class="fieldgroup">
							<label for="empresa">Empresa <span class="fieldrequired" >*</span></label>
							<input type="text" name="empresa">
						</div>

						<div class="fieldgroup">
							<label for="email">Email <span class="fieldrequired" >*</span></label>
							<input type="text" name="email">
						</div>

						<div class="fieldgroup">
							<label for="telefono">Teléfono <span class="fieldrequired" >*</span></label>
							<input type="text" name="telefono">
						</div>

						<div class="fieldgroup">
							<label for="direccion">Direccion <span class="fieldrequired" >*</span></label>
							<input type="text" name="direccion">
						</div>

						<div class="fieldgroup">
							<label for="ciudad">Ciudad <span class="fieldrequired" >*</span></label>
							<input type="text" name="ciudad">
						</div>

						<div class="fieldgroup">
							<label for="estado">Estado <span class="fieldrequired" >*</span></label>
							<input type="text" name="estado">
						</div>

						<div class="fieldgroup">
							<label for="pais">Pais <span class="fieldrequired" >*</span></label>
							<input type="text" name="pais">
						</div>

						<div class="fieldgroup">
							<label for="mensaje">mensaje <span class="fieldrequired" >*</span></label>
							<textarea name="mensaje" id="" cols="19" rows="9"></textarea>
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
                    nombre: "required",
                    empresa: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    telefono: "required",
                    direccion: "required",
                    ciudad: "required",
                    estado: "required",
                    pais: "required",
                    mensaje: "required",
                                        
                },
                messages: {
                    nombre: "Por favor ingrese su nombre",
                    empresa: "Por favor indique su empresa",
                    email: "Por favor ingrese un email válido",
                    telefono: "Por favor ingrese su teléfono",
                    direccion: "Por favor ingrese su direccion",
                    ciudad: "Por favor ingrese su ciudad",
                    estado: "Por favor ingrese su estado",
                    pais: "Por favor ingrese su pais",
                    mensaje: "Por favor ingrese su mensaje",
                    
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