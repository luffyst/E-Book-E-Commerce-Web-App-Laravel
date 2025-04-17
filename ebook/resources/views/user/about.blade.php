<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>About Us</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   @include('user.nav');
   <!-- about -->
   <div class="about-bg">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
               <div class="abouttitle">
                  <h2>About Us</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="about">
      <div class="container">
         <div class="row">
            <div class="col-md-10 offset-md-1">
               <div class="aboutheading">
                  <span>Welcome to [Your E-Book Website]!

                     At [Your E-Book Website], we are passionate about connecting book lovers with an endless world of knowledge and imagination. Our mission is to make books accessible to everyone, everywhere. Whether you're a dedicated reader, a student looking for educational resources, or simply curious, we've got you covered.</span>
               </div>
            </div>
         </div>
         <div class="row border">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
               <div class="about-box">
                  <p> What We Offer
                     Vast E-Book Library: Explore our extensive collection of e-books, spanning various genres, from classic literature to contemporary bestsellers, academic textbooks, and more.

                     User-Friendly Experience: We've designed our website to be intuitive and user-friendly. You can search for e-books by title, author, genre, or keywords. Plus, our responsive design ensures that you can enjoy your favorite books on any device.

                     Affordable Pricing: We believe in making knowledge accessible to everyone. That's why our e-books are competitively priced, so you can read without breaking the bank.

                     Eco-Friendly Reading: By choosing e-books, you're helping reduce the environmental impact of traditional printing. E-books are a sustainable and convenient way to read. </p>
                     <a href="#">Read More</a>
               </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
               <div class="about-box">
                  <figure><img src="images/about.png" alt="img" /></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- end about -->
   <!-- footer -->
   @include('user.footer')
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
</body>

</html>