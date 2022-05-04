<?php
require_once 'app/helpers.php';
session_start();
$_SESSION['contact'] = 0;
$title = 'Contact in page';
$_SESSION['activeIndex'] = '';
$_SESSION['activeAbout'] = '';
$_SESSION['activeCourses'] = '';
$_SESSION['activeContact'] = 'active-nav';
$_SESSION['activeSignin'] = '';
$_SESSION['activeSignup'] = '';
$_SESSION['activeAdmin'] = '';


$error = '';
$ok = '';
$name = "";

if (isset($_POST['submit'])) {

    if (isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email = trim($email);

        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $first_name = trim($first_name);

        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $last_name = trim($last_name);

        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $phone = trim($phone);

        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $subject = trim($subject);

        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $message = trim($message);


// Save data
        $_SESSION['contact_email'] = $email;
        $_SESSION['contact_first_name'] = $first_name;
        $_SESSION['contact_last_name'] = $last_name;
        $_SESSION['contact_subject'] = $subject;
        $message = "From: " . $email . "\r\n" . "First name: " . $first_name . "\r\n" . $message;
        $from_message = str_replace("\r\n", "<br>", $message);
        $_SESSION['contact_message'] = $from_message;
        $from_message = str_replace("\r\n", "<br>", $message);
// Validation
        
        if (!$email) {
            $error = ' אימייל הינו שדה חובה!';
        } else {
            $ok= "ההודעה נשלחה בהצלחה";
            $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $name = $first_name . " " . $last_name;
            $email_to =  "domas.vosylius@hostinger.com"; //"yechiel2000@gmail.com";
            send_mail($email, $email_to , $name, $subject, $from_message, $error, $ok);
            //send_mail_test();
            //send_mail($email, $name, $subject, $from_message, $error, $ok);
            //send_mail1('yechiel2000@gmail.com',$subject, $message, $error, $ok);
        }
      
    }   // end if (isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token'])

    $token = csrf_token();
} else {    //enf if (isset($_POST['submit'])) 
    $token = csrf_token();
}


?>
<?php include 'tpl/header.php'; ?>

<section class="contact-section">
    <form class="myForm" enctype="multipart/form-data" method="post" >
        <input type="hidden" name="token" value="<?= $token; ?>"> 
        <div class="card col-11 col-md-8 col-lg-6 col-xl-5 mx-auto">
        
            <label for="email"> אימייל:</label>
            <input type="text" id="email" name="email">

            <label for="first_name">שם פרטי:</label>
            <input type="text" id="first_name" name="first_name">

            <label for="last_name">שם משפחה:</label>
            <input type="text" id="last_name" name="last_name">
                    
            <label for="phone"> טלפון:</label>
            <input type="text" id="phone" name="phone">

            <label for="subject"> נושא:</label>
            <input type="text" id="subject" name="subject">


                <label for="message">הודעה:</label>
                <textarea id="message" name="message" rows="6"></textarea>

            <br> <br>

     
            <div class="submit">
                <input class="submit-box" type="submit" name="submit"  class="btn btn-primary" value="שלח">
            </div>
    
        </div>
    </form>
    <br>
    <?php if (!empty($error)) : ?>
        <div class="error-contact"><?= $error; ?></div>
        <?php $error = ''; ?>
        <?php endif; ?>
        <?php if (!empty($ok)) : ?>
        <div class="ok-contact"><?= $ok; ?></div>
        <?php $ok = ''; ?>
    <?php endif; ?>
</section>

<?php include 'tpl/footer.php'; ?>





