<?php
date_default_timezone_set('Asia/Jerusalem');
if (!function_exists('old')) {

    function old($field_name)
    {

        return isset($_REQUEST[$field_name]) ? $_REQUEST[$field_name] : '';
    }
}
if (!function_exists('old_session')) {

    function old_session($field_name)
    {

        return isset($_SESSION[$field_name]) ? $_SESSION[$field_name] : '';
    }
}

if (!function_exists('csrf_token')) {

    function csrf_token()
    {
        $token = sha1(rand(1, 1000) . date('Y.m.d.H.i.s') . 'fakebook');
        $_SESSION['token'] = $token;
        return $token;
    }
}

function verify_user()
{

    $is_user = false;

    if (isset($_SESSION['user_ip']) && $_SESSION['user_ip'] == $_SERVER['REMOTE_ADDR']) {

        if (isset($_SESSION['user_agent']) && $_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT']) {

            if (isset($_SESSION['user_id'])) {

                $is_user = true;
            }
        }
    }

    return $is_user;
}

function email_exist($link, $email)
{

    $exist = false;
    $email = mysqli_real_escape_string($link, $email);
    $sql = "SELECT email FROM clients WHERE email = '$email'";
    $result = mysqli_query($link, $sql);
    if ($result && mysqli_num_rows($result) == 1) {
        $exist = true;
    }
    return $exist;
}

function update_log_file($message)
{
    return;

    $file = 'courses_log.txt';

    $db = Database::connect();
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $sql = "SELECT * FROM globals ";
    $query = $db->prepare($sql);
    $query->execute();
    $globals = $query->fetch();
    $enter_counter = $globals->enter_counter;
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        $email = "Empty";
    }
    $date = date('Y-m-d H:i:s');
    $message = "\n" . "#" . $enter_counter . "-" . $email . "-"  . $date . "-" . $message . " # ";



    file_put_contents($file, $message, FILE_APPEND);

    $enter_counter++;
    $db = Database::connect();
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $data = [
        'enter_counter' => $enter_counter,
    ];
    $sql = "UPDATE globals SET enter_counter=:enter_counter ";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
}
function update_log_file_array($arr)
{
    $file = 'jobs_log.txt';
    $message = date('Y-m-d H:i:s');
    $arr_message = "";
    foreach ($arr as $key => $value) {
        $arr_message = $arr_message . " key: " . $key . " value: " . $value;
    }
    $message = $message . " # " . $arr_message  . "\n";
    file_put_contents($file, $message, FILE_APPEND);
}



function upload_file(&$error)
{
    $error = '';
    if (empty($_FILES["fileToUpload"]["name"])) {
        return;
    }

    $target_dir = "resumes/";
    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
        $error = "קובץ כבר קיים.";
        return;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 200000) {
        $uploadOk = 0;
        $error = "קובץ גדול מידי.";
        return;
    }
    // Allow certain file formats
    /*
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
        $error = "קובץ התמונה אינו מסוג JPG, JPEG, PNG, GIF.";
        return;
    }
     * 
     */
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return;
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            $error = "קובץ לא נטען עקב תקלה בטעינה.";
            return;
        }
    }

    return;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

function send_mail_old($email_from, $email_to, $name, $subject, $message, &$error, &$ok)
{
    // Instantiation and passing `true` enables exceptions
    $error = "";
    $ok = "";
    $mail = new PHPMailer();

    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                    // Send using SMTP
    $mail->CharSet = 'UTF-8';

    $mail->Host       = 'smtp.hostinger.co.il';             // Set the SMTP server to send through
    $mail->Username   = 'yechiel@rss2018.xyz';                // SMTP username
    $mail->Password   = 'y1e1c1YR';                         // SMTP password
    $mail->Port       = 587;                                // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email_from);
    $mail->addAddress($email_to, 'User');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('yechiel2000@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    if (!$mail->Send()) {
        $error = "תקלה בשליחת הודעה: " . $mail->ErrorInfo;
    } else {
        $ok = "הודעה נשלחה!";
    }
}
function send_mail($email_from, $email_to, $name, $subject, $message, &$error, &$ok)
{
    $mail = new PHPMailer;
    $mail->isSMTP();
    //$mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.com';
    $mail->CharSet = 'UTF-8';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'yechiel@rss2018.xyz';
    $mail->Password = 'y1e1c1YR';
    $mail->setFrom('yechiel@rss2018.xyz', 'Yechiel');
    $mail->addReplyTo('yechiel@rss2018.xyz', 'Yechiel');
    //$mail->addAddress('domas.vosylius@hostinger.com', 'Domas');
    $mail->addAddress('yechiel2000@gmail.com', 'Yechiel');
    $mail->Subject = $subject;
    $mail->msgHTML(file_get_contents('message.html'), __DIR__);
    $mail->Body = $message;
    //$mail->addAttachment('test.txt');
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'The email message was sent successfully.';
    }
}