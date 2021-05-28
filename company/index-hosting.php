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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    </head>
    
    <script src="js/api/index.js" type="text/javascript">
    </script>
    <script>   
    </script>
    <script>
        async function searchName(event) {
            event.preventDefault();
            var searchfield = document.getElementById("name").value;
            console.log(searchfield);

            $.post('php/company.php',{name:searchfield},function(e){
                console.log(e)
                if(e == '"Available"'){
                    e= $.parseJSON(e)
                    console.log (e);
                    document.getElementById("step1").style.display = "none";
                    document.getElementById("prestep2").style.display = "";
                    document.getElementById("holder").innerHTML = searchfield;
                }
                else{
                    document.getElementById("step1").style.display = "none";
                    document.getElementById("unavailable").style.display = "";
                    document.getElementById("holder").innerHTML = searchfield;
                }
                });
            //const content = await rawResponse.json();

           // console.log(rawResponse);
        }

        function nextPage() {
            event.preventDefault();
            var searchfield = document.getElementById("name").value;
            window.location.href = `page-pricing.php?c_name=${searchfield}`
        }

    </script>

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <?php include "templates/header.php" ?>
        <!-- Navbar End -->
        
        <!-- Hero Start -->
        <section class="bg-half-260 bg-primary d-table w-100" style="background: url('images/hosting/bg.png') center center;" id="home">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-12">
        <!-- Search Start -->
        <section class="section-two transparent ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form  class="p-4 shadow bg-white rounded"  onsubmit="return searchName(event)" >
                        <div id="step1" >
                            <h4 class="mb-3">UK Company Formation from £16.95 + vat</h4>
                            <small class="mb-2" >Check if your chosen name is available..</small>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <input  name="name" id="name" type="text" class="form-control rounded-left" placeholder="Your Company Name ...">
                                  
                                        <input type="submit" id="search" name="search" class="searchbtn btn btn-primary" value="Search">
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                        <div class="text-center" style="display: none;"  id="prestep2" >

                            <div id="efPageContent" class="ui-widget">
                                <h3 class="display-heading-tick" id="holder" ></h3>
                                <div class="text-large text-green">
                                    Congratulations, the name above is available to register!
                                </div>
                                <span><!----></span>        
                            </div>
        
                            <div class="continue-block text-center center ">
                                <a class="btn btn-primary align-self-center" href="#" id="continue" style="display: none;">
                                    Save &amp; Continue 
                                </a>
                                
                                <a class="btn btn-success align-self-center" onclick="nextPage()"  id="continue-home">
                                    Save &amp; Continue 
                                </a>
                            </div>    
                            <a href="." class=" align-self-center text-center link-with-arrow adjacent-to-text searchagain w-inline-block">
                                <div>Search Again</div>
                            </a>
    
    
                        </div>

                        <div class="text-center" style="display: none;" id="unavailable" >

                            <div id="efPageContent" class="ui-widget">
                                <div id="efNameCheckSearch"><span><!----></span></div>
                                <div id="efNameCheckResult"><div id="efNameCheckResult_GREEN" class="efNameCheckResult">
                                    <h3 class="display-heading-tick" id="holder" ></h3>
                                    <div class="text-large text-green">
                                        Sorry, the name above is not available to register!</div>
                                    </div>
                                </div>
                                <span><!----></span>    
                            </div>
    
    
    
                            <a href="." class="link-with-arrow adjacent-to-text searchagain w-inline-block">
                                <div>Search Again</div>
                            </a>
    
    
                        </div>
                        </form><!--end form-->

                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!-- Search End -->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container--> 
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-light">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Hero End -->


        
        <!-- Start Services -->
        <section class="section">
            <div class="container pb-lg-4 mb-md-5 mb-4">
                <div class="row align-items-center mb-4">
                    <div class="col-lg-9 col-md-8 text-sm-start">
                        <div class="section-title">
                            <h4 class="title mb-4">Cloud Hosting Services</h4>
                            <p class="text-muted para-desc mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 mt-4 mt-sm-0 text-sm-end pt-2 pt-sm-0">
                        <a href="javascript:void(0)" class="btn btn-outline-primary">Read more <i class="uil uil-angle-right-b"></i></a>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-5 pt-3">
                        <div class="features">
                            <div class="image position-relative d-inline-block">
                                <i class="uil uil-browser h1 text-primary"></i>
                            </div>

                            <div class="content mt-4">
                                <h5>Domain Name</h5>
                                <p class="text-muted">Nisi aenean vulputate eleifend tellus vitae eleifend enim a Aliquam eleifend aenean elementum semper.</p>
                                <a href="javascript:void(0)" class="text-primary">Read more <i class="uil uil-angle-right-b"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12 mt-5 pt-3">
                        <div class="features">
                            <div class="image position-relative d-inline-block">
                                <i class="uil uil-cloud-computing h1 text-primary"></i>
                            </div>

                            <div class="content mt-4">
                                <h5>Cloud Hosting</h5>
                                <p class="text-muted">Allegedly, a Latin scholar established the origin of the established text by compiling unusual word.</p>
                                <a href="javascript:void(0)" class="text-primary">Read more <i class="uil uil-angle-right-b"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12 mt-5 pt-3">
                        <div class="features">
                            <div class="image position-relative d-inline-block">
                                <i class="uil uil-server h1 text-primary"></i>
                            </div>

                            <div class="content mt-4">
                                <h5>Shared Hosting</h5>
                                <p class="text-muted">It seems that only fragments of the original text remain in only fragments the Lorem Ipsum texts used today.</p>
                                <a href="javascript:void(0)" class="text-primary">Read more <i class="uil uil-angle-right-b"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12 mt-5 pt-3">
                        <div class="features">
                            <div class="image position-relative d-inline-block">
                                <i class="uil uil-server-network h1 text-primary"></i>
                            </div>

                            <div class="content mt-4">
                                <h5>VPS Hosting</h5>
                                <p class="text-muted">Nisi aenean vulputate eleifend tellus vitae eleifend enim a Aliquam eleifend aenean elementum semper.</p>
                                <a href="javascript:void(0)" class="text-primary">Read more <i class="uil uil-angle-right-b"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12 mt-5 pt-3">
                        <div class="features">
                            <div class="image position-relative d-inline-block">
                                <i class="uil uil-database-alt h1 text-primary"></i>
                            </div>

                            <div class="content mt-4">
                                <h5>Reseller Hosting</h5>
                                <p class="text-muted">Allegedly, a Latin scholar established the origin of the established text by compiling unusual word.</p>
                                <a href="javascript:void(0)" class="text-primary">Read more <i class="uil uil-angle-right-b"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12 mt-5 pt-3">
                        <div class="features">
                            <div class="image position-relative d-inline-block">
                                <i class="uil uil-code-branch h1 text-primary"></i>
                            </div>

                            <div class="content mt-4">
                                <h5>Web Hosting</h5>
                                <p class="text-muted">It seems that only fragments of the original text remain in only fragments the Lorem Ipsum texts used today.</p>
                                <a href="javascript:void(0)" class="text-primary">Read more <i class="uil uil-angle-right-b"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-light">
                <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- End Services -->

        <!-- How It Work Start -->
        <section class="section bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <img src="images/hosting/1.png" class="img-fluid" alt="">
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="section-title ms-lg-5">
                            <h4 class="title mb-4">Get best plan for more power with cloud Hosting</h4>
                            <p class="text-muted">You can combine all the Landrick templates into a single one, you can take a component from the Application theme and use it in the Website.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented & Experienced Marketing Agency</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Create your own skin to match your brand</li>
                            </ul>                            
                            <a href="javascript:void(0)" class="btn btn-primary mt-3">Get Started <i class="uil uil-angle-right-b"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="section-title">
                            <h4 class="title mb-4">Don't Compromise with the best web hosting solutions</h4>
                            <p class="text-muted">Using Landrick to build your site means never worrying about designing another page or cross browser compatibility. Our ever-growing library of components and pre-designed layouts will make your life easier.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented & Experienced Marketing Agency</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Create your own skin to match your brand</li>
                            </ul>
                            <a href="javascript:void(0)" class="btn btn-primary mt-3">Get Started <i class="uil uil-angle-right-b"></i></a>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-6 col-md-6 order-1 order-md-2">
                        <img src="images/hosting/deal-hend.svg" class="img-fluid" alt="">
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <img src="images/hosting/2.png" class="img-fluid" alt="">
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="section-title ms-lg-5">
                            <h4 class="title mb-4">Powerful Server & Web Hosting Plateform</h4>
                            <p class="text-muted">You can combine all the Landrick templates into a single one, you can take a component from the Application theme and use it in the Website.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented & Experienced Marketing Agency</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Create your own skin to match your brand</li>
                            </ul>
                            <a href="javascript:void(0)" class="btn btn-primary mt-3">Get Started <i class="uil uil-angle-right-b"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- How It Work End -->

        <!-- Price Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">Our Hosting Rates</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row align-items-center">
                    <div class="col-12 mt-4 pt-2">
                        <div class="text-center">
                            <ul class="nav nav-pills rounded-pill justify-content-center d-inline-block border py-1 px-2" id="pills-tab" role="tablist">
                                <li class="nav-item d-inline-block">
                                    <a class="nav-link px-3 rounded-pill active monthly" id="Monthly" data-bs-toggle="pill" href="#Month" role="tab" aria-controls="Month" aria-selected="true">Monthly</a>
                                </li>
                                <li class="nav-item d-inline-block">
                                    <a class="nav-link px-3 rounded-pill yearly" id="Yearly" data-bs-toggle="pill" href="#Year" role="tab" aria-controls="Year" aria-selected="false">Yearly <span class="badge rounded-pill bg-success">15% Off </span></a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">    
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                        <div class="card pricing-rates bg-light rounded border-0">
                                            <div class="card-body py-5">
                                                <h6 class="title text-uppercase fw-bold mb-4">Cloud Hosting</h6>
                                                <div class="d-flex mb-4">
                                                    <span class="h4 mb-0 mt-2">$</span>
                                                    <span class="price h1 mb-0">0</span>
                                                    <span class="h4 align-self-end mb-1">/mo</span>
                                                </div>
                    
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>2 GB Memory</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>10 Free Optimization</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>24/7 support</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Content Optimization</li>
                                                </ul>
                                                <a href="javascript:void(0)" class="btn btn-primary mt-4">Buy Now</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                
                                    <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                        <div class="card pricing-rates starter-plan bg-white shadow rounded border-0">
                                            <div class="card-body py-5">
                                                <h6 class="title text-uppercase fw-bold text-primary mb-4">Dedicated Hosting</h6>
                                                <div class="d-flex mb-4">
                                                    <span class="h4 mb-0 mt-2">$</span>
                                                    <span class="price h1 mb-0">39</span>
                                                    <span class="h4 align-self-end mb-1">/mo</span>
                                                </div>
                                                
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>4 GB Memory</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>10 Free Optimization</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>24/7 support</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Content Optimization</li>
                                                </ul>
                                                <a href="javascript:void(0)" class="btn btn-primary mt-4">Get Started</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                
                                    <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                        <div class="card pricing-rates bg-light rounded border-0">
                                            <div class="card-body py-5">
                                                <h6 class="title text-uppercase fw-bold mb-4">VPS Hosting</h6>
                                                <div class="d-flex mb-4">
                                                    <span class="h4 mb-0 mt-2">$</span>
                                                    <span class="price h1 mb-0">59</span>
                                                    <span class="h4 align-self-end mb-1">/mo</span>
                                                </div>
                    
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>8 GB Memory</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>10 Free Optimization</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>24/7 support</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Content Optimization</li>
                                                </ul>
                                                <a href="javascript:void(0)" class="btn btn-primary mt-4">Buy Now</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                
                                    <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                        <div class="card pricing-rates bg-light rounded border-0">
                                            <div class="card-body py-5">
                                                <h6 class="title text-uppercase fw-bold mb-4">Shared Hosting</h6>
                                                <div class="d-flex mb-4">
                                                    <span class="h4 mb-0 mt-2">$</span>
                                                    <span class="price h1 mb-0">79</span>
                                                    <span class="h4 align-self-end mb-1">/mo</span>
                                                </div>
                    
                                                <ul class="list-unstyled mb-0 ps-0">
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>16 GB Memory</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>10 Free Optimization</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>24/7 support</li>
                                                    <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Content Optimization</li>
                                                </ul>
                                                <a href="javascript:void(0)" class="btn btn-primary mt-4">Buy Now</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
    
                            <div class="tab-pane fade" id="Year" role="tabpanel" aria-labelledby="Yearly">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                        <div class="pricing-rates bg-light py-5 p-4 rounded">
                                            <h6 class="title text-uppercase fw-bold mb-4">Cloud Hosting</h6>
                                            <div class="d-flex mb-4">
                                                <span class="h4 mb-0 mt-2">$</span>
                                                <span class="price h1 mb-0">0</span>
                                                <span class="h4 align-self-end mb-1">/mo</span>
                                            </div>
                
                                            <ul class="list-unstyled mb-0 ps-0">
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>2 GB Memory</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>10 Free Optimization</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>24/7 support</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Content Optimization</li>
                                            </ul>
                                            <a href="javascript:void(0)" class="btn btn-primary mt-4">Buy Now</a>
                                        </div>
                                    </div><!--end col-->
                
                                    <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                        <div class="pricing-rates starter-plan shadow bg-white py-5 p-4 rounded">
                                            <h6 class="title text-uppercase fw-bold text-primary mb-4">Dedicated Hosting</h6>
                                            <div class="d-flex mb-4">
                                                <span class="h4 mb-0 mt-2">$</span>
                                                <span class="price h1 mb-0">29</span>
                                                <span class="h4 align-self-end mb-1">/mo</span>
                                            </div>
                                            
                                            <ul class="list-unstyled mb-0 ps-0">
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>4 GB Memory</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>10 Free Optimization</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>24/7 support</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Content Optimization</li>
                                            </ul>
                                            <a href="javascript:void(0)" class="btn btn-primary mt-4">Get Started</a>
                                        </div>
                                    </div><!--end col-->
                
                                    <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                        <div class="pricing-rates bg-light py-5 p-4 rounded">
                                            <h6 class="title text-uppercase fw-bold mb-4">VPS Hosting</h6>
                                            <div class="d-flex mb-4">
                                                <span class="h4 mb-0 mt-2">$</span>
                                                <span class="price h1 mb-0">39</span>
                                                <span class="h4 align-self-end mb-1">/mo</span>
                                            </div>
                
                                            <ul class="list-unstyled mb-0 ps-0">
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>8 GB Memory</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>10 Free Optimization</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>24/7 support</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Content Optimization</li>
                                            </ul>
                                            <a href="javascript:void(0)" class="btn btn-primary mt-4">Buy Now</a>
                                        </div>
                                    </div><!--end col-->
                
                                    <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2">
                                        <div class="pricing-rates bg-light py-5 p-4 rounded">
                                            <h6 class="title text-uppercase fw-bold mb-4">Shared Hosting</h6>
                                            <div class="d-flex mb-4">
                                                <span class="h4 mb-0 mt-2">$</span>
                                                <span class="price h1 mb-0">49</span>
                                                <span class="h4 align-self-end mb-1">/mo</span>
                                            </div>
                
                                            <ul class="list-unstyled mb-0 ps-0">
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>16 GB Memory</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>10 Free Optimization</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>24/7 support</li>
                                                <li class="text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Content Optimization</li>
                                            </ul>
                                            <a href="javascript:void(0)" class="btn btn-primary mt-4">Buy Now</a>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>    
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-light">
                <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Price End -->


        <div class="position-relative">
            <div class="shape overflow-hidden text-footer">
                <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Testi End -->

        <!-- Footer Start -->
       <?php  include "templates/footer.php" ?>
        <!-- Footer End -->

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