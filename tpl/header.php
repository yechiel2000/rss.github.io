<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>רוז שירותי תוכנה</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="body-inner">
        <!--/ Topbar start -->
        <div id="top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <p style="font-size: 30px;margin-bottom: -1px;">רוז שירותי תוכנה</p>
                    </div>
                    <!--/ Top info end -->
                    <!--/ Top social end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
        <!-- Header start -->
        <header id="header" class="header-one mb-2">

            <div class="container">
                <div class="logo-area">

                </div><!-- logo area end -->
            </div><!-- Container end -->


            <div class="site-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <img loading="lazy" src="images/logo-default.png" alt="RSS" width="80" height="80">
                        </div>
                        <div class="col-lg-6">
                            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div id="navbar-collapse" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav mr-auto">
                                        <li class="nav-item"><a class="nav-link " href="contact.php"><span
                                                    class="<?= $_SESSION['activeContact'] ?>">צור קשר </span></a></li>
                                        <li class="nav-item"><a class="nav-link " href="services.php"
                                                style="color:orange;">
                                                <span class="<?= $_SESSION['activeServices'] ?>">שירותים</span>
                                            </a></li>
                                        <li class="nav-item"><a class="nav-link " href="about.php"
                                                style="color:orange;">
                                                <span class="<?= $_SESSION['activeAbout'] ?>">אודות</span>
                                            </a></li>
                                        <li class="nav-item"><a class="nav-link" href="index.php">
                                                <span class="<?= $_SESSION['activeIndex'] ?>">בית</span></a></li>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!--/ Col end -->
                    </div>
                    <!--/ Row end -->

                </div>
                <!--/ Container end -->

            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->