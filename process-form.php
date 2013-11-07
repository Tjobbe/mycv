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

$emailFrom = "example@example.com";
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