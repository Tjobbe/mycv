<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contract front-end web developer: Tjobbe Andrews - Curriculum Vitae</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" media="print" href="css/print.css">
<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="thanks">

	<header>
		<h1 role="heading" id="pageTitle"><span>Tjobbe Andrews:</span> front-end web developer</h1>
	</header>

	<div class="content">

			<section id="thanks" aria-labelledby="thanksHeading">
<?php

require_once('recaptchalib.php');
$privatekey = "6Ldp0OkSAAAAAAeVjM3DoSlPM8EGsToW30_VO9Be";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
  die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
       "(reCAPTCHA said: " . $resp->error . ")");
}

$emailFrom = Trim(stripslashes($_POST['email']));
$emailTo = "tjobbe@gmail.com";
$Subject = "CV contact form submission";
$name = Trim(stripslashes($_POST['name'])); 
$phone = Trim(stripslashes($_POST['phone'])); 
$email = Trim(stripslashes($_POST['email'])); 
$message = Trim(stripslashes($_POST['message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "message: ";
$Body .= $message;
$Body .= "\n";

// send email 
$success = mail($emailTo, $Subject, $Body, "From: <$emailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=thank-you.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
}
?>
			</section>


	</div>

	<footer><small>Web site created in November 2013. Designed in the browser.</small></footer>

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-127517-50']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

</body>
</html>