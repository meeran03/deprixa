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
  
  
    $c_name = Filter::$c_name;
    $package_id = Filter::$package_id;
    $plan = $business_packages->getPackageId($package_id)[0]

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Landrick - Saas & Software Landing Page Template</title>
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
        <link rel="stylesheet" href="css/tiny-slider.css"/> 
        <!-- Main Css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
    </head>
    <script>
        console.log(<?php echo json_encode($plan) ?>)

        function nextStep(total) {
            window.location.href = `checkoutFinal.php?c_name=<?php echo $c_name ?>&package_id=<?php echo $package_id ?>&total=${total}`;
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
        <!-- Navbar End -->
        
        <!-- Hero Start -->
        <!-- Hero Start -->
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
                                        <li class="breadcrumb-item "><a href="#">Select A Package</a></li>
                                        <li class="breadcrumb-item active" aria-current="page" >Perform Checkout</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive bg-white shadow">
                            <table class="table table-center table-padding mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-bottom py-3" style="min-width: 100px;">Address Service</th>
                                        <th class="border-bottom text-center py-3" style="min-width: 160px;">Address</th>
                                        <th class="border-bottom text-center py-3" style="min-width: 160px;">Quantity</th>
                                        <th class="border-bottom text-center py-3" style="min-width: 160px;">Price</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="shop-list">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ">Registered Office Address</h6>
                                            </div>
                                        </td>
                                        <td class="text-center">20th Street, London</td>
                                        <td class="text-center qty-icons">
                                            <button disabled onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                            <input disabled min="0" name="quantity" value="1" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                            <button disabled onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                        </td>
                                        <td class="text-center fw-bold">$25.00</td>
                                    </tr>

                                    <tr class="shop-list">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ">Service Address</h6>
                                            </div>
                                        </td>
                                        <td class="text-center">20th Street, London</td>
                                        <td class="text-center qty-icons">
                                            <button disabled onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                            <input disabled min="0" name="quantity" value="1" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                            <button disabled onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                        </td>
                                        <td class="text-center fw-bold">$25.00</td>
                                    </tr>

                                    <tr class="shop-list">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 "><?php echo $plan->name ?></h6>
                                            </div>
                                        </td>
                                        <td class="text-center">20th Street, London</td>
                                        <td class="text-center qty-icons">
                                            <button disabled onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                            <input disabled min="0" name="quantity" value="1" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                            <button disabled onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                        </td>
                                        <td class="text-center fw-bold">$<?php echo $plan->price ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row">
                    <!-- <div class="col-lg-8 col-md-6 mt-4 pt-2">
                        <a href="javascript:void(0)" class="btn btn-primary">Shop More</a>
                        <a href="javascript:void(0)" class="btn btn-soft-primary ms-2">Update Cart</a>
                    </div> -->
                    <div class="col-lg-4 col-md-6 ms-auto mt-4 pt-2">
                        <div class="table-responsive bg-white rounded shadow">
                            <table class="table table-center table-padding mb-0">
                                <tbody>
                                    <!-- <tr>
                                        <td class="h6">Subtotal</td>
                                        <td class="text-center fw-bold">$ 2190</td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td class="h6">Taxes</td>
                                        <td class="text-center fw-bold">$ 219</td>
                                    </tr> -->
                                    <tr class="bg-light">
                                        <td class="h6">Total</td>
                                        <td class="text-center fw-bold">$ <?php 
                                            $total = 50 + $plan->price;
                                            echo $total;
                                        ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 pt-2 text-end">
                            <a onclick="nextStep(<?php echo $total ?>)" class="btn btn-primary">Proceed to checkout</a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <?php include "templates/footer.php" ?>


        <!-- Wishlist Popup Start -->
        <div class="modal fade" id="wishlist" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded shadow-lg border-0 overflow-hidden">
                    <div class="modal-body py-5">
                        <div class="text-center">
                            <div class="icon d-flex align-items-center justify-content-center bg-soft-danger rounded-circle mx-auto" style="height: 95px; width:95px;">
                                <h1 class="mb-0"><i class="uil uil-heart-break align-middle"></i></h1>
                            </div>
                            <div class="mt-4">
                                <h4>Your wishlist is empty.</h4>
                                <p class="text-muted">Create your first wishlist request...</p>
                                <div class="mt-4">
                                    <a href="javascript:void(0)" class="btn btn-outline-primary">+ Create new wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Popup End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- SLIDER -->
        <script src="js/tiny-slider.js "></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>
</html>