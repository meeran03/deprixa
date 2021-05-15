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

  header("Content-type: image/png");
  define("_VALID_PHP", true);
  
  if (strlen(session_id()) < 1)
	  session_start();
  
  $text = rand(10000,99999); 
  $_SESSION['captchacode'] = $text; 
  $height = 25; 
  $width = 60; 
  $font_size = 14;  
  
  $im = imagecreatetruecolor($width, $height); 
  $textcolor = imagecolorallocate($im, 255, 77, 77);
  $bg = imagecolorallocate( $im, 0, 0, 0 );
  imagestring($im, $font_size, 5, 5,  $text, $textcolor);
  imagecolortransparent( $im, $bg );
  imagefill( $im, 0, 0, $bg );
  
  imagepng($im,NULL,9);
  imagedestroy($im);
?>