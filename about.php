<?php
session_start();
//update_log_file("Entered about page");
$_SESSION['activeIndex'] = '';
$_SESSION['activeAbout'] = 'active-nav';
$_SESSION['activeServices'] = '';
$_SESSION['activeTeam'] = '';
$_SESSION['activeFaq'] = '';
$_SESSION['activeContact'] = '';
?>
<?php include 'tpl/header.php'; ?>
<div class="container">
    <div class="text-center">
        <img src="images/home1.jpg" class="img-fluid" alt="home">
    </div>
</div>

<?php include 'tpl/footer.php'; ?>