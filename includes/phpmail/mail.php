<?php
require "PHPMailer/PHPMailerAutoload.php";
function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'depedmarikina.ph';
        $mail->Port = 465;  
        $mail->Username = 'noreply@depedmarikina.ph';
        $mail->Password = 'sMll.XEMM6aK';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="noreply@depedmarikina.ph";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            return $error; 
        }
        else 
        {
            $error = "Thanks You !! Your email is sent.";  
            return $error;
        }
    }
    
    $to   = 'virmil.talattad@deped.gov.ph';
    $from = 'noreply@depedmarikina.ph';
    $name = 'SDO Marikina';
    $subj = 'PHPMailer 5.2 testing from DomainRacer';
    $msg = 'This is mail about testing mailing using PHP.';
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    
?>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>PHPMailer 5.2 testing from DomainRacer</title>
    </head>
    <body style="background: black;">
        <center><h2 style="padding-top:70px;color: white;"><?php echo $error; ?></h2></center>
    </body>
    
</html>