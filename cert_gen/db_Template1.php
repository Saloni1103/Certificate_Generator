<?php 
	session_start();
    $con = mysqli_connect('localhost', 'root');
    if($con){
        echo "connection established";
    }
    else{
        echo "no connection";
    }
//How to Generate Bulk Certificate
$con=mysqli_connect('localhost','root','','phpcrud');//connecting to database
$query="select * from student";//To retrieve students into from database
$fire=mysqli_query($con,$query);
while($row=mysqli_fetch_array($fire))
{
header('content-type:image/png');
$font= realpath('developer.ttf');
$image=imagecreatefrompng("temp.png");
$color=imagecolorallocate($image, 51, 51, 102);
$date=date('d F, Y');//Current Date 
imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
$fname=$row['fname'];
imagettftext($image, 45, 0, 210, 280, $color,$font, $fname);
$occupation=$row['occupation'];
imagettftext($image, 40, 0, 360, 340, $color,$font, $occupation);
$duration=$row['duration'];
imagettftext($image, 30, 0, 350, 400, $color,$font, $duration);
$email_id=$row['Email Id'];
imagettftext($image, 40, 0, 360, 340, $color,$font, $email_id);
imagejpeg($image,"certificate/$fname.png");//Storing certificate here
include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer();
	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="saiyam3006@gmail.com";
	$mail->Password="jain30@06";
	$mail->setFrom("saiyam3006@gmail.com");
	$mail->addAddress($_POST['email']);
	$mail->isHTML(true);
	$mail->Subject="TechTable";
	$mail->Body="Hi $name, Thanks for Being a part of TechTable,We congratulate you for completing the internship with us, Please find your Internship certificate attached below.";
	$mail->addAttachment($file_path_pdf);
	$mail->SMTPOptions=array("ssl"=>array(
		"verify_peer"=>false,
		"verify_peer_name"=>false,
		"allow_self_signed"=>false,
	));
	if($mail->send()){
		echo "";
	}else{
		echo $mail->ErrorInfo;
	}
        }
      }
imagedestroy($image);
}

?>
