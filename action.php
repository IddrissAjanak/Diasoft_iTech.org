<?php 

include("mail.php");

ini_set ("SMTP","mail.diasoft_itech.com");
ini_set ("sendmail_from","noreply@diasoft_itech.com");

$name     = strip_tags(htmlspecialchars($_POST['Name']));

$email    = strip_tags(htmlspecialchars($_POST['Email']));

$subject  = strip_tags(htmlspecialchars($_POST['Subject']));

$message  = strip_tags(htmlspecialchars($_POST['Message']));



if(!$query=$db->prepare('INSERT INTO ajanak (name, email, subject, message) VALUES (?,?,?,?)')){
	echo "error, something is wrong with SQL Query or data <br>";
	echo $db->error. "<br>";
}else{
	$query->bind_param("ssss",$name,$email,$subject,$message);
	if ($query->execute()) {
		# code...
		echo "<script>alert('Thank you '".$name ."', your data is sent successfully')</script>";
	}else{
		echo "error! data insertion couldn't be done";
	}


}
 if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['message'])  ||
   empty($_POST['subject']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))


// Create the email and send the message
$to = 'iddrissajanak@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";
$headers = "From: noreply@diasoft_itech.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";   
mail($to,$email_subject,$email_body,$headers);
return true;  
 ?>

<!--if(empty($_POST['Name'])      ||
   empty($_POST['Email'])     ||
   empty($_POST['Subject'])     ||
   empty($_POST['Message'])   ||
   !filter_var($_POST['Email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

// Create the email and send the message
$to = 'iddrissajanak@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";
$headers = "From: noreply@Diasoft_iTech.com-\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email"; 

$smtp=mail($to,$email_subject,$email_body,$headers);

return true;*/

 