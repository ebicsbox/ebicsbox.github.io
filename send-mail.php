<?php

$to = 'jan@railslove.com'; // Change your email address


$name = $_POST['name'];
$phone = $_POST['phone'];
$bic = $_POST['bic'];
$email = $_POST['email'];
$message = $_POST['message'];


// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
 if ( isset($email) && isset($name) && isset($phone) && isset($bic) && isset($message) && filter_var($email, FILTER_VALIDATE_EMAIL) ) {
 
  // detect & prevent header injections
  $test = "/(content-type|bcc:|cc:|to:)/i";
  foreach ( $_POST as $key => $val ) {
    if ( preg_match( $test, $val ) ) {
      exit;
    }
  }

$body = <<<EMAIL
subject : EBICS:Box
  
My name is, $name.

$message

From : $name
Email : $email
Phone : $phone
BIC : $bic

EMAIL;
  
  
$header = 'From: ' . $_POST["name"] . '<' . $_POST["email"] . '>' . "\r\n" .
    'Reply-To: ' . $_POST["email"] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  //
 // mail( $to , $_POST['subject'], $_POST['message'], $headers );
 mail($to, $subject, $body, $header);
  //      ^
  //  Replace with your email 
}
?>