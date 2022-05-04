<?php
session_start();
//update_log_file("Entered about page");
$_SESSION['activeIndex'] = '';
$_SESSION['activeAbout'] = '';
$_SESSION['activeServices'] = 'active-nav';
$_SESSION['activeTeam'] = '';
$_SESSION['activeFaq'] = '';
$_SESSION['activeContact'] = '';
?>
<?php include 'tpl/header.php'; ?>

<div class="banner-carousel banner-carousel-1 main-carousel mb-0">
    <div class="banner-carousel-item" style="background-image:url(images/software1.jpg);">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-8" style="text-align:right;">
                        <p style="font-size:40px;" class="slide-title" data-animation-in="slideInLeft">רוז שירותי תוכנה
                        </p>
                        <ul style="direction:rtl;text-align:center;">
                            <li style="text-align:right;color:orange;">בניית אתרים
                            </li>
                            <ul style="direction:rtl;">
                                <li style="text-align:right;font-size:17px;color:orange;">Wordpress
                                </li>
                                <li style="text-align:right;font-size:17px;color:orange;">Code (Html, CSS, JS,
                                    Bootstrap, PHP, MySQL).
                                </li>
                                <li style="text-align:right;font-size:17px;color:orange;">Laravel
                                </li>
                            </ul>
                            <li style="text-align:right;font-size:17px;color:orange;">עבודות ופרוייקטים ב Excel-VBA,
                                Access
                            </li>
                            <li style="text-align:right;font-size:17px;color:orange;">בדיקות תוכנה - QA
                            </li>

                        </ul>
                        <p data-animation-in="slideInRight" data-duration-in="1.2">
                            <a href="contact.php" class="slider btn btn-primary border">צור קשר</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'tpl/footer.php'; ?>