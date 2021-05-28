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
  $plan = $business_packages->getPackageId($package_id)[0];
  $total = $plan->price + 50;
	

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Final Checkout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="EUBS-Services" />
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    </head>

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
                    <div class="col-lg-7 col-md-6">
                        <div class="rounded shadow-lg p-4">
                            <h5 class="mb-0">User Details</h5>

                            <form class="mt-4" role="form" action="payment/stripe_payment.php" method="POST" name="cardpayment" id="payment-form" >
                                <div class="row">
                                    <div class="col-12 col-lg-6 ">
                                        <div class="mb-3">
                                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input name="fname" id="firstname" type="text" class="form-control" placeholder="First Name :">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                            <input name="lname" id="lastname" type="text" class="form-control" placeholder="Last Name :">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12 col-md-5 ">
                                        <div class="mb-3">
                                        <label class="form-label">Your Phone <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" type="tel" id="phone" class="form-control">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12 col-md-7 ">
                                        <div class="mb-3">
                                            <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Your email :">
                                        </div> 
                                    </div><!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label><?php echo $lang['left146'] ?> <span class="text-danger">*</span></label>
                                            <i class="mdi mdi-key ml-3 icons"></i>
                                            <input type="password" class="form-control pl-5" placeholder="<?php echo $lang['left147'] ?>" name="pass" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label><?php echo $lang['left148'] ?> <span class="text-danger">*</span></label>
                                            <i class="mdi mdi-key ml-3 icons"></i>
                                            <input type="password" class="form-control pl-5" name="pass2" placeholder="<?php echo $lang['left149'] ?>" required="">
                                        </div>
                                    </div>


                                 
                                </div><!--end row-->
                        </div>


                        <div class="rounded shadow-lg p-4">
                            <h5 class="mb-0">Billing Details</h5>

                            <div class="panel-body">

<!-- Display errors returned by createToken -->
                            <div class="payment-status" style="color: red;"></div>

                            <!-- Payment form -->

                                <input type="hidden" name="productId" value="<?php echo $package_id;?>"/>
                                <input type="hidden" name="c_name" value="<?php echo $c_name;?>"/>
                                <input name="locker" type="hidden" value="<?php echo generarCodigo(6); ?>" />

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div  >
                                            <label class="my-2" for="couponCode">Card Holder Name</label>
                                            <input type="text" class="form-control" name="holdername" placeholder="Enter Card Holder Name" autofocus required id="holder_name" />
                                        </div>
                                    </div>                        
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div  >
                                            <label class="my-2" for="couponCode">Email</label>
                                            <input type="email" class="form-control" name="holder_email" placeholder="Email" id="holder_email" required />
                                        </div>
                                    </div>                        
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div  >
                                            <label class="my-2" for="cardNumber">CARD NUMBER</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" name="card_number" placeholder="Valid Card Number" autocomplete="cc-number" id="card_number" maxlength="16" data-stripe="number" required />
                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-4 col-md-4">
                                        <div  >
                                            <label class="my-2" for="cardExpiry"><span class="visible-xs-inline">MON</span></label>
                                            <select name="card_exp_month" id="card_exp_month" class="form-control" data-stripe="exp_month" required>
                                                <option>MON</option>
                                                <option value="01">01 ( JAN )</option>
                                                <option value="02">02 ( FEB )</option>
                                                <option value="03">03 ( MAR )</option>
                                                <option value="04">04 ( APR )</option>
                                                <option value="05">05 ( MAY )</option>
                                                <option value="06">06 ( JUN )</option>
                                                <option value="07">07 ( JUL )</option>
                                                <option value="08">08 ( AUG )</option>
                                                <option value="09">09 ( SEP )</option>
                                                <option value="10">10 ( OCT )</option>
                                                <option value="11">11 ( NOV )</option>
                                                <option value="12">12 ( DEC )</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-md-4">
                                        <div  >
                                            <label class="my-2" for="cardExpiry"><span class="visible-xs-inline">YEAR</span></label>
                                            <select name="card_exp_year" id="card_exp_year" class="form-control" data-stripe="exp_year">
                                                <option>Year</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                                <option value="24">2024</option>
                                                <option value="25">2025</option>
                                                <option value="26">2026</option>
                                                <option value="27">2027</option>
                                                <option value="28">2028</option>
                                                <option value="29">2029</option>
                                                <option value="30">2030</option>
                                                <option value="31">2031</option>
                                                <option value="32">2032</option>
                                                <option value="33">2033</option>
                                                <option value="34">2034</option>
                                                <option value="35">2035</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="package_id" value="<?php echo $package_id ?>"  id="package_id" required />
                                    <div class="col-xs-4 col-md-4 pull-right">
                                        <div  >
                                            <label class="my-2" for="cardCVC">CV CODE</label>
                                            <input type="password" class="form-control" name="card_cvc" placeholder="CVC" autocomplete="cc-csc" id="card_cvc" required />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>


             

                        
                    </div><!--end col-->

                    <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="rounded shadow-lg p-4 sticky-bar">
                            <div class="d-flex mb-4 justify-content-between">
                                <h5>4 Items</h5>
                                <a href="shop-cart.html" class="text-muted h6">Show Details</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-center table-padding mb-0">
                                    <tbody>
                                        <!-- <tr>
                                            <td class="h6">Shipping Charge</td>
                                            <td class="text-end fw-bold">$ 0.00</td>
                                        </tr> -->
                                        <tr class="bg-light">
                                            <td class="h5 fw-bold">Total</td>
                                            <td class="text-end text-primary h4 fw-bold">$ <?php echo $total ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <ul class="list-unstyled mt-4 mb-0">


                                    <li class="mt-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" checked type="radio" name="flexRadioDefault" id="stripepay">
                                                <label class="form-check-label" for="stripepay">Stripe Pay <a href="https://www.paypal.com/uk/webapps/mpp/paypal-popup" target="_blank" class="ms-2 text-primary">What is stripe?</a></label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="mt-4 pt-2">
                                    <div class="d-grid">
                                        <button id="submit-btn" onclick="submitForm()" type="submit" class="btn btn-primary">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <!-- Footer Start -->
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

        <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        </script>


        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- SLIDER -->
        <script src="js/tiny-slider.js "></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
        <script src="https://js.stripe.com/v2/"></script>

    <script>
        // Set your publishable key
        Stripe.setPublishableKey('pk_test_18lgnnPV3SZZn36tyAFO131T00P2pCl90m');


        // Callback to handle the response from stripe
        function stripeResponseHandler(status, response) {
            if (response.error) {
                // Enable the submit button
               // $('#payBtn').removeAttr("disabled");
                console.log(response.error.message)
                // Display the errors on the form
                $(".payment-status").html('<p>'+response.error.message+'</p>');
            } else {
                var form$ = $("#payment-form");
                // Get token id
                var token = response.id;
                // Insert the token into the form
                form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                // Submit form to the server
                console.log(token)
               // console.log(form$.serialize())
                form$.get(0).submit();
            }
        }

            // On form submit
            function  processPayment() {
                // Disable the submit button to prevent repeated clicks
                console.log("I am good")
                $('#payBtn').attr("disabled", "disabled");
                
                // Create single-use token to charge the user
                Stripe.createToken({
                    number: $('#card_number').val(),
                    exp_month: $('#card_exp_month').val(),
                    exp_year: $('#card_exp_year').val(),
                    cvc: $('#card_cvc').val()
                }, stripeResponseHandler);
                
                // Submit from callback
                return false;
            }
    // <![CDATA[
        function showResponse(msg) {
            hideLoader();
            if (msg == 'OK') {
                result = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"><\/span><i class=\"close icon-remove-circle\"></i><span>Success!<\/span>You have successfully registered. Please check your email for further information<\/p><\/div>";
                $("#fullform").hide();
            } else {
                result = msg;
            }
            $(this).html(result);
            $("html, body").animate({
                scrollTop: 0
            }, 600);
        }

        function submitForm() {
            console.log("I am executed")
            let form  = document.getElementById("payment-form");
            processPayment()
            // form.submit();
        }

        // $(document).ready(function () {
        //     var options = {
        //         target: "#msgholder",
        //        // beforeSubmit: showLoader,
        //         success: showResponse,
        //         url: "ajax/user.php",
        //         resetForm: 0,
        //         clearForm: 0,
        //         data: {
        //             processContact: 1
        //         }
        //     };
        //     $("#admin_form").ajaxForm(options);
        // });
    // ]]>
    </script>

    </body>
</html>