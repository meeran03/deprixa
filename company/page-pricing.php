<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

  define("_VALID_PHP", true);
  require_once("../init.php");
  
    if (is_dir("../setup"))
      : die("<div style='text-align:center'>" 
		  . "</br></br>"
		  . "<span style='padding: 15px; border: 1px solid #999; background-color:#f9b66d;border-radius:5px;color:#666;padding:5px;margin-top: 40px;" 
		  . "font-family: Verdana; font-size: 14px; margin-left:auto; margin-right:auto'>" 
		  . "<b>Warning:</b> Please delete the <b>setup</b> folder!</span></div>");
  endif;
  
//   if (!$user->is_Admin())
// 	redirect_to("login.php");
  
// 	$row = $user->getUserData();

    $plans = $business_packages->getAllPackages() ;
	
    $c_name = Filter::$c_name;


?>

<script>
    console.log(<?php echo json_encode($plans) ?>)
</script>


<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Step 3-Select A Package</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="website" content="https://shreethemes.in" />
        <meta name="Version" content="v3.2.0" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Slider -->
        <link href="css/tiny-slider.css" rel="stylesheet" type="text/css" />
        <!-- Main Css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">

    </head>

  <script>

  function nextPage(id) {
      window.location.href = `checkout.php?c_name=<?php echo $c_name?>&package_id=${id}`;
  }

  </script>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->
        
        <!-- Navbar STart -->
            <?php include "templates/header.php" ?>
        
        <!-- BreadCrumb -->
        <section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title"> <?php echo $c_name ?> </h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a >Name Check</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Select A Package</a></li>
                                        <li class="breadcrumb-item" >Perform Checkout</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Price Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">Choose A Business Service</h4>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row align-items-center">
                    <?php 
                        foreach($plans as $plan) {;
                    ?>
                    <div class="col-md-4 col-12 mt-4 pt-2">
                        <div class="card pricing-rates business-rate shadow bg-light rounded text-center border-0">
                            <div class="card-body py-5">
                                <h6 class="title fw-bold text-uppercase text-primary mb-4"><?php echo $plan->name ?></h6>
                                <div class="d-flex justify-content-center mb-4">
                                    <span class="h4 mb-0 mt-2">$</span>
                                    <span class="price h1 mb-0"><?php echo $plan->price ?></span>
                                    <span class="h4 align-self-end mb-1">/mo</span>
                                </div>
                                <ul class="list-unstyled mb-0 ps-0">
                                        <?php  foreach($plan->features as $feature) {; ?>
                                            <li class="h6 text-muted mb-0">
                                                <span class="text-primary h5 me-2">
                                                    <i class="uil uil-check-circle align-middle"></i>
                                                </span>
                                                <?php 
                                                $feature_detail = $db->query("SELECT * from business_features  b WHERE b.id=".$feature->feature_id." ")->fetch_object(); 
                                                
                                                echo $feature_detail->name ?>
                                            </li>
                                            <script>console.log(<?php  echo json_encode($feature_detail)  ?>)</script>
                                        <?php }; ?>
                                </ul>
                                <a onclick="nextPage(<?php echo $plan->id ?>)"  class="btn btn-primary mt-4">Buy Now</a>
                            </div>
                        </div>
                    </div><!--end col-->
                    <?php }; ?>

                </div><!--end row-->
            </div><!--end container-->


   

    
        <!-- FAQ n Contact End -->

        <!-- Footer Start -->
        <?php  include "templates/footer.php" ?>
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Slider -->
        <script src="js/tiny-slider.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>
</html>