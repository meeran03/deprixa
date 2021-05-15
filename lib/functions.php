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

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
  
  /**
   * redirect_to()
   * 
   * @param mixed $location
   * @return
   */
  function redirect_to($location)
  {
      if (!headers_sent()) {
          header('Location: ' . $location);
		  exit;
	  } else
          echo '<script type="text/javascript">';
          echo 'window.location.href="' . $location . '";';
          echo '</script>';
          echo '<noscript>';
          echo '<meta http-equiv="refresh" content="0;url=' . $location . '" />';
          echo '</noscript>';
  }
  
  /**
   * countEntries()
   * 
   * @param mixed $table
   * @param string $where
   * @param string $what
   * @return
   */
  function countEntries($table, $where = '', $what = '')
  {
      if (!empty($where) && isset($what)) {
          $q = "SELECT COUNT(*) FROM " . $table . "  WHERE " . $where . " = '" . $what . "' LIMIT 1";
      } else
          $q = "SELECT COUNT(*) FROM " . $table . " LIMIT 1";
      
      $record = Registry::get("Database")->query($q);
      $total = Registry::get("Database")->fetchrow($record);
      return $total[0];
  }
  
  /**
   * getChecked()
   * 
   * @param mixed $row
   * @param mixed $status
   * @return
   */
  function getChecked($row, $status)
  {
      if ($row == $status) {
          echo "checked=\"checked\"";
      }
  }
  
  /**
   * post()
   * 
   * @param mixed $var
   * @return
   */
  function post($var)
  {
      if (isset($_POST[$var]))
          return $_POST[$var];
  }
  
  /**
   * get()
   * 
   * @param mixed $var
   * @return
   */
  function get($var)
  {
      if (isset($_GET[$var]))
          return $_GET[$var];
  }
  
  /**
   * sanitize()
   * 
   * @param mixed $string
   * @param bool $trim
   * @return
   */
  function sanitize($string, $trim = false, $int = false, $str = false)
  {
      $string = filter_var($string, FILTER_SANITIZE_STRING);
      $string = trim($string);
      $string = stripslashes($string);
      $string = strip_tags($string);
      $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
      
	  if ($trim)
          $string = substr($string, 0, $trim);
      if ($int)
		  $string = preg_replace("/[^0-9\s]/", "", $string);
      if ($str)
		  $string = preg_replace("/[^a-zA-Z\s]/", "", $string);
		  
      return $string;
  }

  /**
   * cleanSanitize()
   * 
   * @param mixed $string
   * @param bool $trim
   * @return
   */
  function cleanSanitize($string, $trim = false,  $end_char = '&#8230;')
  {
	  $string = cleanOut($string);
      $string = filter_var($string, FILTER_SANITIZE_STRING);
      $string = trim($string);
      $string = stripslashes($string);
      $string = strip_tags($string);
      $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
      
	  if ($trim) {
        if (strlen($string) < $trim)
        {
            return $string;
        }

        $string = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $string));

        if (strlen($string) <= $trim)
        {
            return $string;
        }

        $out = "";
        foreach (explode(' ', trim($string)) as $val)
        {
            $out .= $val.' ';

            if (strlen($out) >= $trim)
            {
                $out = trim($out);
                return (strlen($out) == strlen($string)) ? $out : $out.$end_char;
            }       
        }
	  }
      return $string;
  }

  /**
   * truncate()
   * 
   * @param mixed $string
   * @param mixed $length
   * @param bool $ellipsis
   * @return
   */
  function truncate($string, $length, $ellipsis = true)
  {
      $wide = strlen(preg_replace('/[^A-Z0-9_@#%$&]/', '', $string));
      $length = round($length - $wide * 0.2);
      $clean_string = preg_replace('/&[^;]+;/', '-', $string);
      if (strlen($clean_string) <= $length)
          return $string;
      $difference = $length - strlen($clean_string);
      $result = substr($string, 0, $difference);
      if ($result != $string and $ellipsis) {
          $result = add_ellipsis($result);
      }
      return $result;
  }
  
  /**
   * getValue()
   * 
   * @param mixed $stwhatring
   * @param mixed $table
   * @param mixed $where
   * @return
   */
  function getValue($what, $table, $where)
  {
      $sql = "SELECT $what FROM $table WHERE $where";
      $row = Registry::get("Database")->first($sql);
      return ($row) ? $row->$what : '';
  }  

  /**
   * getValueById()
   * 
   * @param mixed $what
   * @param mixed $table
   * @param mixed $id
   * @return
   */
  function getValueById($what, $table, $id)
  {
      $sql = "SELECT $what FROM $table WHERE id = $id";
      $row = Registry::get("Database")->first($sql);
      return ($row) ? $row->$what : '';
  } 
  
  /**
   * tooltip()
   * 
   * @param mixed $tip
   * @return
   */
  function tooltip($tip)
  {
      return '<img src="'.SITEURL.'/images/tooltip.png" alt="Tip" class="tooltip" title="' . $tip . '" />';
  }
  
  /**
   * required()
   * 
   * @return
   */
  function required()
  {
      return '<img src="' . SITEURL . '/images/required.png" alt="Required Field" class="tooltip" title="Required Field" />';
  }

  /**
   * cleanOut()
   * 
   * @param mixed $text
   * @return
   */
  function cleanOut($text) {
	 $text =  strtr($text, array('\r\n' => "", '\r' => "", '\n' => ""));
	 $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
	 $text = str_replace('<br>', '<br />', $text);
	 return stripslashes($text);
  }
    

  /**
   * isAdmin()
   * 
   * @param mixed $userlevel
   * @return
   */
  function isAdmin($userlevel)
  {
	  switch ($userlevel) {
		  case 9:
			 $display = '<span style="font-size:20px;color:red;" class="ti-user" data-toggle="tooltip" data-placement="top" title="Super Admin"></span>';
			 break;

		  case 7:
		     $display = '<span style="font-size:20px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="User Level 7"></span>';
			 break;

		  case 6:
		     $$display = '<span style="font-size:20px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="User Level 6"></span>';
			 break;

		  case 5:
		     $display = '<span style="font-size:20px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="User Level 5"></span>';
			 break;
			 
		  case 4:
		     $$display = '<span style="font-size:20px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="User Level 4"></span>';
			 break;		  

		  case 3:
		     $display = '<span style="font-size:20px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="User Driver"></span>';
			 break;

		  case 2:
		     $display = '<span style="font-size:20px;color:#FFB973;" class="ti-user" data-toggle="tooltip" data-placement="top" title="User Employee"></span>';
			 break;
			 
		  case 1:
		     $display = '<span style="font-size:20px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="User Customer"></span>';
			 break;			  
	  }

      return $display;;
  }

  /**
   * getSize()
   * 
   * @param mixed $size
   * @param integer $precision
   * @param bool $long_name
   * @param bool $real_size
   * @return
   */
  function getSize($size, $precision = 2, $long_name = false, $real_size = true)
  {
      if ($size == 0) {
          return '-/-';
      } else {
          $base = $real_size ? 1024 : 1000;
          $pos = 0;
          while ($size > $base) {
              $size /= $base;
              $pos++;
          }
          $prefix = _getSizePrefix($pos);
          $size_name = $long_name ? $prefix . "bytes" : $prefix[0] . 'B';
          return round($size, $precision) . ' ' . ucfirst($size_name);


      }
  }

  /**
   * _getSizePrefix()
   * 
   * @param mixed $pos
   * @return
   */  
  function _getSizePrefix($pos)
  {
      switch ($pos) {
          case 00:
              return "";
          case 01:
              return "kilo";

          case 02:
              return "mega";
          case 03:
              return "giga";
          default:
              return "?-";
      }
  }
  
  
  
  
  /**
   * userStatus()
   * 
   * @param mixed $id
   * @return
   */
  function userStatus($status, $id)
  {
	  switch ($status) {
		  case "y":
			  $display = '<span style="font-size:15px;color:#48CFAD;" class="ti-check" data-toggle="tooltip" data-placement="top" title="Active"></span> Active';
			  break;
			  
		  case "n":
			  $display = '<a style="font-size:15px;color:orange;" class="activate" id="act_' . $id . '"><i class="icon-adjust text-orange" data-toggle="tooltip" data-placement="top" title="Inactive"></i> Inactive</a>';
			  break;
			  
		  case "t":
			  $display = '<span class="icon-time" style="font-size:15px;color:blue;" data-toggle="tooltip" data-placement="top" title="Pending"></span> Pending';
			  break;
			  
		  case "b":
			  $display = '<span class="icon-ban-circle" style="font-size:15px;color:red;" data-toggle="tooltip" data-placement="top" title="Banned"></span> Banned';
			  break;
	  }
	  
      return $display;;
  }

  /**
   * isActive()
   * 
   * @param mixed $id
   * @return
   */
  function isActive($id)
  {
	  if ($id == 1) {
		  $display = '<span style="font-size:15px;color:#48CFAD;" class="ti-check" data-toggle="tooltip" data-placement="top" title="Active"></span> Active';
	  } else {
		  $display = '<span style="font-size:15px;color:#FF4D4D;" class="ti-face-sad" data-toggle="tooltip" data-placement="top" title="Inactive"></span> Inactive';
	  }

      return $display;;
  }
  
   /**
   * isActivetwilio()
   * 
   * @param mixed $id
   * @return
   */
  function isActivetwilio($status, $id)
  {
	  
	  switch ($status) {
		  case "1":
			  $display = '<span style="font-size:15px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="Active"></span> Active';
			  break;
			  
		  case "0":
			  $display = '<a style="font-size:15px;color:orange;" class="activate" id="act_' . $id . '"><i class="ti-face-sad" data-toggle="tooltip" data-placement="top" title="Inactive"></i> Inactive</a>';
			  break;

	  }

      return $display;;
  }

  
  /**
   * isActivenexmo()
   * 
   * @param mixed $id
   * @return
   */
  function isActivenexmo($status, $id)
  {
	  
	  switch ($status) {
		  case "1":
			  $display = '<span style="font-size:15px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="Active"></span> Active';
			  break;
			  
		  case "0":
			  $display = '<a style="font-size:15px;color:orange;" class="activatenex" id="act_' . $id . '"><i class="ti-face-sad" data-toggle="tooltip" data-placement="top" title="Inactive"></i> Inactive</a>';
			  break;

	  }

      return $display;;
  }
  
   
  /**
   * isActiveSMS()
   * 
   * @param mixed $id
   * @return
   */
  function isActivesms($status, $id)
  {
	  
	  switch ($status) {
		  case "1":
			  $display = '<span style="font-size:15px;color:#48CFAD;" class="ti-face-smile" data-toggle="tooltip" data-placement="top" title="Active"></span> Active';
			  break;
			  
		  case "0":
			  $display = '<a style="font-size:15px;color:orange;" class="activate" id="act_' . $id . '"><i class="ti-face-sad" data-toggle="tooltip" data-placement="top" title="Inactive"></i> Inactive</a>';
			  break;

	  }

      return $display;;
  }
  
  
  /**
   * randName()
   * 
   * @return
   */ 
  function randName() {
	  $code = '';
	  for($x = 0; $x<6; $x++) {
		  $code .= '-'.substr(strtoupper(sha1(rand(0,999999999999999))),2,6);
	  }
	  $code = substr($code,1);
	  return $code;
  }
  
  function randNames() {
	  $code = '';
	  $pattern = '1234567890';
	  $max = strlen($pattern)-1;
	  for($x = 0; $x<6; $x++) {
		  $code .= '-'.substr(strtoupper(sha1(rand(0,$max))),2,6);
	  }
	  $code = substr($code,1);
	  return $code;
  }
  
  function formato($valor){
	return number_format($valor,2,'.',',');
}

function round_out($valor) { 
   $float_redondeado=round($valor * 100) / 100;  
   return $float_redondeado; 
}

function mensajes($mensaje,$tipo){
	if($tipo=='verde'){
		$tipo='alert alert-success';
	}elseif($tipo=='rojo'){
		$tipo='alert alert-danger';
	}elseif($tipo=='azul'){
		$tipo='alert alert-info';
	}
	return '<div class="col-md-6 '.$tipo.' contenedor1" id="success-alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span> </button>
		  '.$mensaje.'
		</div>';
}

function limpiar($tags){
	$tags = strip_tags($tags);
	$tags = stripslashes($tags);
	$tags = trim($tags);
	return $tags;
}

function generarCodigo($longitud) {
 $key = '#';
 $pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
	

?>