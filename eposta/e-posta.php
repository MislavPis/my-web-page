<?
require("e-posta_inc.php");

if ($naslov == "") $naslov = $HTTP_POST_VARS["naslov"];
if ($primatelj == "") $primatelj = $HTTP_POST_VARS["primatelj"];
if ($preusmjeri == "") $preusmjeri = $HTTP_POST_VARS["preusmjeri"];
if ($email == "") $email = $HTTP_POST_VARS["email"];

if ($email == "") $email = "";
if ($primatelj == "") $primatelj = "";

$mail = new PHPMailer();

$mail->IsSMTP();                      
$mail->Host = "localhost";
$mail->SMTPAuth = false;     
$mail->Username = "";  
$mail->Password = ""; 

$mail->From = $email;
$mail->FromName = $email;
$mail->AddAddress($primatelj, $primatelj);
$mail->AddReplyTo($email, $email);

$mail->Subject = $naslov;
if ($novi_sadrzaj != "") $sadrzaj = $novi_sadrzaj;
if ($novi_sadrzajOsvojeno != "") $sadrzaj = $novi_sadrzajOsvojeno;
$mail->Body    = $sadrzaj;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   //exit;
}
if ($novi_sadrzaj != ""){
	echo "<script>alert('Korisnicko ime i lozinka su uspjesno poslani na adresu: ".$primatelj."'); window.location='".$preusmjeri."';</script>";
}else if ($novi_sadrzajOsvojeno == "")
	echo "<script>alert('Vasa poruka je poslana'); window.location='".$preusmjeri."';</script>";
?>