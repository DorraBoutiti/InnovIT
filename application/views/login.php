
<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login.css">

	</head>
	<body >
        
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">THARWTI</a></h1>
      
  </header><!-- End Header -->
  
      <section class="slide">
        <figure>
            <img src="<?php echo base_url(); ?>assets/finance1.png" alt="">
        </figure>
    </section>

    <section class="main">
        <div class="container">
            <h1>Welcome</h1>
            <div class="separator"></div>
            <form method="POST"action="<?php echo base_url('index.php/welcome/loginMe'); ?>" class="form-login">
                <div class="form-control">
                    <input type="text" placeholder="Login ID" name="mail" >
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" placeholder="Password" name="pass" id="T2">
                    <i class="fas fa-lock"></i>
                </div>
                <a href="forgotPassword.html">Forgot your password ?</a><br>
                <a href="signUp.html">Create an account</a><br>
                <input type="submit" name="B1" value="Log In" class="submit" onclick=" return checker()">
            </form>
        </div>
    </section>

	<script src="<?php echo base_url(); ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
	</body>
</html>

