<?php
require_once 'helpers.php';
session_start();
$_SESSION['activeIndex'] = '';
$_SESSION['activeAbout'] = '';
$_SESSION['activeServices'] = '';
$_SESSION['activeTeam'] = '';
$_SESSION['activeFaq'] = '';
$_SESSION['activeContact'] = 'active-nav';

$result = "";

if (isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $email = trim($email);

    $name = filter_input(INPUT_POST, 'name');
    $name = trim($name);

    $subject = filter_input(INPUT_POST, 'subject');
    $subject = trim($subject);

    $message = filter_input(INPUT_POST, 'message');
    $message = trim($message);
    $message =  nl2br($message);

    $to = "yechiel2000@gmail.com";
    $header = "From:" . $email . " \r\n";
    //$header .= "Cc:afgh@somedomain.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html;charset=UTF-8\r\n";

    $retval = mail($to, $subject, $message, $header);

    if ($retval == true) {
        $result = "הודעה נשלחה בהצלחה";
    } else {
        $result = "הודעה נכשלה";
    }
}

?>
<?php include 'tpl/header.php'; ?>
<div id="banner-area" class="banner-area" style="background-image:url(images/banner1.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 style="background:blue" class="banner-title">נא שלח הודעתך</h1>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form id="contact-form" enctype="multipart/form-data" method="POST" action="contact.php">
                    <div class="error-container"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div style="text-align:right;" class="form-group">
                                <label>נושא</label>
                                <input class="form-control form-control-subject" name="subject" id="subject"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="text-align:right;" class="form-group">
                                <label>אימייל</label>
                                <input class="form-control form-control-email" name="email" id="email" placeholder=""
                                    type="email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="text-align:right;" class="form-group">
                                <label>שם</label>
                                <input class="form-control form-control-name" name="name" id="name" placeholder=""
                                    type="text" required>
                            </div>
                        </div>
                    </div>


                    <div style="text-align:right;" class="form-group">
                        <label>הודעה</label>
                        <textarea class="form-control form-control-message" name="message" id="message" placeholder=""
                            rows="10" required></textarea>
                    </div>
                    <div class="text-right"><br>
                        <button class="btn btn-primary solid blank" name="submit" type="submit">שלח הודעה</button>
                    </div>
                    <div class="text-right">
                        <p style="background:black;color:white"><?php echo $result ?></p>
                    </div>
                </form>
            </div>

        </div><!-- Content row -->
    </div><!-- Conatiner end -->
</section><!-- Main container end -->

<?php include 'tpl/footer.php'; ?>