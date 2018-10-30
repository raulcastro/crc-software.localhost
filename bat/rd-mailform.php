<?php
sleep(3);
// var_dump($_POST);
$recipients = 'info@crc-software.com';
// //$recipients = '#';

date_default_timezone_set('America/Toronto');

try {
    require './phpmailer/PHPMailerAutoload.php';

    preg_match_all("/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)/", $recipients, $addresses, PREG_OFFSET_CAPTURE);

    if (!count($addresses[0])) {
        die('MF001');
    }

    if (preg_match('/^(127\.|192\.168\.)/', $_SERVER['REMOTE_ADDR'])) {
        die('MF002');
    }
    
    $template = file_get_contents('rd-mailform.tpl');

    if (isset($_POST['form-type'])) {
        switch ($_POST['form-type']){
            case 'contact':
                $subject = 'crc-software: Contact Message';
                break;
            default:
                $subject = 'Un nuevo mensaje';
                break;
        }
    }else{
        die('MF004');
    }

    if (isset($_POST['email'])) {
        $template = str_replace(
            array("<!-- #{FromState} -->", "<!-- #{FromEmail} -->"),
            array("Email:", $_POST['email']),
            $template);
    }else{
        die('MF003');
    }
    
    if (isset($_POST['name'])) {
        $template = str_replace(
            array("<!-- #{FromName} -->", "<!-- #{FromNameVal} -->"),
            array("Name:", $_POST['name'].$_POST['last-name']), 
            $template);
    }
    
    if (isset($_POST['phone'])) {
        $template = str_replace(
            array("<!-- #{FromPhone} -->", "<!-- #{FromPhoneVal} -->"),
            array("Phone:", $_POST['phone']),
            $template);
    }
    
    if (isset($_POST['date'])) {
        $template = str_replace(
            array("<!-- #{FromDate} -->", "<!-- #{FromDateVal} -->"),
            array("Date:", $_POST['date']),
            $template);
    }
    
    if (isset($_POST['ceremony'])) {
        $template = str_replace(
            array("<!-- #{FromCelebrating} -->", "<!-- #{FromCelebratingVal} -->"),
            array("Type of ceremony:", $_POST['ceremony']),
            $template);
    }

    if (isset($_POST['message'])) {
        $template = str_replace(
            array("<!-- #{MessageState} -->", "<!-- #{MessageDescription} -->"),
            array("Message:", $_POST['message']),
            $template);
    }
    
    /*preg_match("/(<!-- #{BeginInfo} -->)(.|\n)+(<!-- #{EndInfo} -->)/", $template, $tmp, PREG_OFFSET_CAPTURE);
    foreach ($_POST as $key => $value) {
//         echo $key;
        if ($key != "email" && $key != "message" && $key != "form-type" && !empty($value)){
            $info = str_replace(
                array("<!-- #{BeginInfo} -->", "<!-- #{InfoState} -->", "<!-- #{InfoDescription} -->"),
                array("", ucfirst($key) . ':', $value),
                $tmp[0][0]);

            $template = str_replace("<!-- #{EndInfo} -->", $info, $template);
        }
    }*/

    $template = str_replace(
        array("<!-- #{Subject} -->", "<!-- #{SiteName} -->"),
        array($subject, $_SERVER['SERVER_NAME']),
        $template);
    
    $mail = new PHPMailer();
    $mail->From = $_SERVER['SERVER_ADDR'];
    $mail->FromName = $_SERVER['SERVER_NAME'];
    
    $mail->IsSMTP(); // telling the class to use SMTP
    //$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
    $mail->Username   = "wtg.sender@gmail.com";  // GMAIL username
    $mail->Password   = "cas8867ca";            // GMAIL password
    
    foreach ($addresses[0] as $key => $value) {
        $mail->addAddress($value[0]);
    }

    $mail->CharSet = 'utf-8';
    $mail->addBCC('info@crc-software.com');
    
    $mail->Subject = $subject;
    $mail->MsgHTML($template);

    if (isset($_FILES['attachment'])) {
        foreach ($_FILES['attachment']['error'] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $mail->AddAttachment($_FILES['attachment']['tmp_name'][$key], $_FILES['Attachment']['name'][$key]);
            }
        }
    }

    if ($mail->send()) { 
        	die('MF000');
    }
    else 
    {
       echo $mail->ErrorInfo;
    }
    
} catch (phpmailerException $e) {
    die('MF254');
} catch (Exception $e) {
    die('MF255');
}

?>