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


error_reporting(E_ERROR | E_WARNING | E_PARSE);

define("_VALID_PHP", true);
require_once("../../init.php");

if (!$user->is_Admin())
  redirect_to("../login.php");


switch(Filter::$action): case "ship": 
$row = Core::getRowById(Core::contaTable, Filter::$id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
   <link rel="icon" type="image/png" sizes="16x16" href="../../uploads/favicon.png">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tracking - <?php echo $row->order_inv; ?></title>

    <style>

        #page-wrap { width: 800px; margin: 0 auto; }
		
		.head {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			font-style: normal;
		}
		.headcli {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
			font-style: normal;
		}
		.headtitle {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 18px;
		}
		.head p {
			font-size: 12px;
		}
		.head span {
			font-style: normal;
		}
		.table {
			border: 1px solid black;
		}

        /* Extra CSS for Print Button*/
        .button {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            overflow: hidden;
            margin-top: 20px;
            padding: 12px 12px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: all 60ms ease-in-out;
            transition: all 60ms ease-in-out;
            text-align: center;
            white-space: nowrap;
            text-decoration: none !important;

            color: #fff;
            border: 0 none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.3;
            -webkit-appearance: none;
            -moz-appearance: none;

            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 160px;
            -ms-flex: 0 0 160px;
            flex: 0 0 160px;
        }
        .button:hover {
            -webkit-transition: all 60ms ease;
            transition: all 60ms ease;
            opacity: .85;
        }
        .button:active {
            -webkit-transition: all 60ms ease;
            transition: all 60ms ease;
            opacity: .75;
        }
        .button:focus {
            outline: 1px dotted #959595;
            outline-offset: -4px;
        }

        .button.-regular {
            color: #202129;
            background-color: #ed6c757de;
        }
        .button.-regular:hover {
            color: #202129;
            background-color: #e1e2e2;
            opacity: 1;
        }
        .button.-regular:active {
            background-color: #d5d6d6;
            opacity: 1;
        }

        .button.-dark {
            color: #FFFFFF;
            background: #333030;
        }
        .button.-dark:focus {
            outline: 1px dotted white;
            outline-offset: -4px;
        }

        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
		h4 {
			border-bottom: 1px solid black;
		}

    </style>
</head>
<body>
<div id="page-wrap">
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" style="font-size: 12pt; font-family: arial" >

	<table style="width: 100%;">
		<tr>
			<th style="width: 20%;" align="left"><?php echo "<img src='".$core->site_url."/uploads/logo.png' border='0' width='190' height='39'>";  ?></th>
			<th style="width: 50%;"  align="center">
				<h2 class="headtitle" align="center"><strong><?php echo $core->site_name; ?></strong></h2>
				<p class="head p" align="center">
				<?php echo $core->c_nit; ?><br>
				<?php echo $core->c_country; ?>-<?php echo $core->c_city; ?>
				</p>
			</th>
			<th style="width: 30%;" align="right">
				<h2 class="headtitle"></h2>
				<p class="head p" align="right"></br></br>
				<?php echo $core->c_address; ?><br>
				<?php echo $core->c_phone; ?></p>    
			</th>
		</tr>
	</table>

	<table style="width: 100%;" border="1" cellspacing="1" cellpadding="2">
		<tr>
			<th style="width: 100%; color:#FFF; font-weight: bold;" align="center" bgcolor="#6c757d" class="head"><?php echo $lang['inv-container1'] ?></th>
		</tr>
	</table>
	<table style="width: 100%; border:1px; cellpadding:1px;" class="head" border="0">
		<tr>
			<th style="width:34%; height:30px;" align="center" border="1">
				<p style="font-size: 15px"><?php echo $lang['inv-container2'] ?><br>
					<span style="color: #333"><?php echo date("d/m/Y");?> - # <?php echo $row->s_week; ?></span>
				</p>
			</th>
			<th style="width:34%; height:30px;" align="center" border="1">
				<p style="font-size: 15px"><?php echo $lang['inv-container3'] ?><br>
					<span style="color: #333"><?php echo date("d/m/Y");?></span>
				</p>
			</th>
			<th style="width:32%; height:30px;" align="center" border="1">
				<p style="font-size: 15px"><?php echo $lang['inv-container4'] ?><br>
					<span style="color: #F33; font-weight: bold; font-size:20px;"><?php echo $row->order_inv; ?></span>
				</p>
			</th>
		</tr>
	</table>
	<table style="width: 100%;" border="1" cellspacing="1" cellpadding="2">
		<tr>
			<th style="width: 50%; color:#FFF; font-weight: bold;"  align="center" bgcolor="#6c757d" class="head" scope="col" border="1"><?php echo $lang['inv-container5'] ?></th>
			<th style="width: 50%; color:#FFF; font-weight: bold;" align="center" bgcolor="#6c757d" class="head" scope="col" border="1"><?php echo $lang['inv-container6'] ?></th>
		</tr> 
	</table>
	<hr />
	<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<th style="width: 10%;"  align="right" valign="top" scope="col">
		  <p class="headcli">
			<?php echo $lang['inv-container7'] ?>:<br />
			<?php echo $lang['inv-container8'] ?>:<br />
			<?php echo $lang['inv-container9'] ?>:<br />
			<?php echo $lang['inv-container10'] ?>:<br />
			<?php echo $lang['inv-container11'] ?>:<br />
			<?php echo $lang['inv-container12'] ?>:
			</p>
		</th>
		<td style="width: 1%;"></td>
		<th style="width: 32%;" align="left" valign="top" scope="col">
			<p class="headcli" style="color: #333">
			<?php echo $row->r_name; ?><br>
			<?php echo $row->r_address; ?><br>
			<?php echo $row->r_postal; ?><br>
			<?php echo $row->r_dest; ?><br>
			<?php echo $row->r_city; ?><br>
			<?php echo $row->r_phone; ?>
			</p>					
		</th>

		<th style="width: 16%;" align="right" valign="top" scope="col">
		<p class="headcli">
			<?php echo $lang['inv-container13'] ?>:<br>
			<?php echo $lang['inv-container14'] ?>:<br>
			<?php echo $lang['inv-container15'] ?>:<br>
			<?php echo $lang['inv-container16'] ?>:
		</p>
		</th>
		<td style="width: 1%;"></td>
		<th style="width:32%;" align="left" valign="top" scope="col">
			<p class="headcli" style="color: #333"> 
				<?php echo $row->r_curren; ?><br>
				<?php echo $row->n_weight; ?><br>
				<?php echo $row->g_weight; ?><br>
				<?php echo $row->package; ?>
			</p>
		</th>
	  </tr>
	</table>
	<table style="width:100%; height:8px; align:center;" border="1" cellspacing="1" cellpadding="1">
	  <tr>
		<th style="width: 40%; color:#FFF; font-weight: bold;"  align="left" bgcolor="#6c757d"  valign="top" scope="col" scope="col"><p><?php echo $lang['inv-container17'] ?></p></th>
		<th style="width: 13%; color:#FFF; font-weight: bold;" align="center" bgcolor="#6c757d" class="head" scope="col"><?php echo $lang['inv-container18'] ?></th>
		<th style="width: 11%; color:#FFF; font-weight: bold;" align="center" bgcolor="#6c757d" class="head" scope="col"><?php echo $lang['inv-container19'] ?></th>
		<th style="width: 16%; color:#FFF; font-weight: bold;" align="center" bgcolor="#6c757d" class="head" scope="col"><?php echo $lang['inv-container20'] ?></th>
		<th style="width: 20%; color:#FFF; font-weight: bold;" align="center" bgcolor="#6c757d" class="head" scope="col"><?php echo $lang['inv-container21'] ?></th>
	  </tr>
	</table>
	<br>
	<table style="width: 100%; height:75px;"  cellspacing="0" cellpadding="0">
	<?php
	$nums=1;
	$sumador_total=0;
	$sql = $db->query("SELECT * FROM add_container, detail_container WHERE add_container.idcon=detail_container.idcon AND add_container.id='".Filter::$id."'");

	while ($row=mysqli_fetch_array($sql))
		{
		$id=$row["id"];
		$detail_weight=$row['detail_weight'];
		$detail_qty=$row['detail_qty'];
		$detail_container=$row['detail_container'];
		$description=$row['s_description'];
		$shipmode=$row['ship_mode'];
		$incoterm=$row['incoterms'];
		$originport=$row['origin_port'];
		$destinationport=$row['destination_port'];
		$rcurren=$row['r_curren'];
		$rtax=$row['r_tax'];
		$insurances=$row['r_insurance'];
		$track=$row['order_inv'];
		
		$price=$row['price'];
		$precio_venta_f=number_format($price,2);//Formatting variables
		$precio_venta_r=str_replace(",","",$precio_venta_f);//Replace the commas
		$precio_total=$precio_venta_r*$detail_qty;
		$precio_total_f=number_format($precio_total,2);//Total price formatted
		$precio_total_r=str_replace(",","",$precio_total_f);//Replace the commas
		$sumador_total+=$precio_total_r;//Adder
		if ($nums%2==0){
			$clase="clouds";
		} else {
			$clase="silver";
		}
		?>
		<tr>
			<td class="<?php echo $clase;?>" style="width: 40%;" align="left" valign="top" scope="col"><?php echo $detail_container;?></td>
			<td class="<?php echo $clase;?>" style="width: 13%;" align="center" valign="top" scope="col"><?php echo $detail_weight;?></td>
			<td class="<?php echo $clase;?>" style="width: 11%;" align="center" valign="top" scope="col"><?php echo $detail_qty; ?></td>
			<td class="<?php echo $clase;?>" style="width: 16%;" align="center" valign="top" scope="col"><?php echo $precio_venta_f;?></td>
			<td class="<?php echo $clase;?>" style="width: 20%;" align="center" valign="top" scope="col"><?php echo $precio_total_f;?></td>
		</tr>
		<?php 

		
		$nums++;
		}
		$impuesto= $rtax;
		$assurance= $insurances;
		$subtotal=number_format($sumador_total,2,'.','');
		$total_iva=($subtotal * $impuesto )/100;
		$total_insurance=($subtotal * $assurance )/100;
		$total_iva=number_format($total_iva,2,'.','');
		$total_insurance=number_format($total_insurance,2,'.','');
		$total_factura=$subtotal+$total_iva+$total_insurance;
	?>
	</table>
	<table style="width: 100%;" >  
		<tr>
			<th style="width: 70%; align:left;" >
			<p style="font-size:8pt; text-align:left;"><strong><?php echo $lang['inv-container22'] ?></strong></br></br>
			<i style="text-align:left;"><img src='../assets/images/alert/securepayment.png' width='358' /></i></p>
			</th>
			<th style="width: 70%; align:right;" >
			<td style="border: 0;  text-align: center">
			</br><img src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $track; ?>&code=Code128&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=122&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0&modulewidth=80' alt='<?php echo $track; ?>'/>
			</td>
			</th>
		</tr>
	</table>
	<table style="width: 100%;" border="1" cellspacing="0" cellpadding="0">
	  <tr>
		<th style="width: 61%;" align="left" valign="top" class="head" scope="col"><p class="head" style="color: #666; font-style: italic;"><?php echo $lang['inv-container23'] ?>:</p>
		
		<?php echo $description;?>
		<br>
		<p class="head" style="color: #666;">
		  <?php echo $lang['inv-container24'] ?> -<span style="color: #000"> <?php echo $shipmode;?></span><br>
		  <?php echo $lang['inv-container25'] ?> - <span style="color: #000"><?php echo $incoterm;?></span><br>
		  <?php echo $lang['inv-container26'] ?> -<span style="color: #000"> <?php echo $originport;?></span><br>
		  <?php echo $lang['inv-container27'] ?> -<span style="color: #000"> <?php echo $originport;?></span><br>
		  <?php echo $lang['inv-container28'] ?> -<span style="color: #000"> <?php echo $destinationport;?></span><br>
		  </p>
		</th>
		<th style="width: 39%;" align="left" bgcolor="#f2f2f2" valign="top" scope="col">
			<table width="100%" border="0" bgcolor="#f2f2f2" cellspacing="0" cellpadding="0">
			  <tr>
				<th style="width: 63%;" align="left" bgcolor="#f2f2f2" class="head" scope="col">
				<br>
				 <?php echo $lang['inv-container29'] ?> <?php echo $rcurren;?><br>
				 (+) <?php echo $lang['inv-container30'] ?> (<?php echo $rtax;?>&#37;)<br>
				  (+) <?php echo $lang['inv-container31'] ?> (<?php echo $insurances;?>&#37;)<br><br><br>
				 <?php echo $lang['inv-container32'] ?> <?php echo $rcurren;?>
				</th>
				<th style="width: 37%;" align="rigth" bgcolor="#f2f2f2" class="head" scope="col">
				  <br>
				  <?php echo number_format($subtotal,2);?><br>
				  <?php echo number_format($total_iva,2);?><br>
				  <?php echo number_format($total_insurance,2);?><br><br><br>
				  <?php echo number_format($total_factura,2);?>
				</th>
			  </tr>
			</table>
		</th>
	  </tr>
	</table>
	<table style="width: 100%;" border="1" cellspacing="1" cellpadding="1">
	  <tr>
		<th style="width: 60%;" height="92" align="left" valign="top" scope="col">
		<table width="100%" height="90" border="0" cellspacing="0" cellpadding="1">
			<th align="left" valign="top" scope="col">
			<p><?php echo $lang['inv-container33'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
			 </th>
			
			<th align="left" valign="top" scope="col">
			<p><?php echo $lang['inv-container34'] ?></p>
			</th>
		</table>
		</th>
		<th style="width: 40%;"  align="left" valign="top" scope="col">
			<p><?php echo $lang['inv-container35'] ?></p>
		</th>
	  </tr>
	</table>
	<span class="head" style="font-size: 12px; color: #930;"><em><?php echo $lang['inv-container36'] ?></em></span>
</page>

<button class='button -dark center no-print'  onClick="window.print();" style="font-size:16px"><?php echo $lang['inv-container37'] ?>&nbsp;&nbsp; <i class="fa fa-print"></i></button>
</div>

</body>

</html>
<?php 
break;
endswitch;
?>
