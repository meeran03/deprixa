
<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }

.text-center{
	text-align:center
}
.text-right{
	text-align:right
}
table th, td{
	font-size:13px
}
.detalle td{
	border:solid 1px #bdc3c7;
	padding:10px;
}
.items{
	border:solid 1px #bdc3c7;
	 
}
.items td, th{
	padding:10px;
}
.items th{
	background-color: #3498db;
	color:white;
	
}
.border-bottom{
	border-bottom: solic 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->

table th {
  color: #333;
  background-color: #eee;
  border-left: 1px solid #ccc;
  margin: 0 0 2px 2px;
}
.app-print-codigo-barras-zebra {
    height: 160px;
    max-height: 160px!important;
    min-height: 160px!important;
    width: 380px;
    text-align: center;
    margin-top: 1px;
}
.app-print-codigo-barras-numero {
    width: 420px;
    min-height: 25px;
    text-align: center;
	font-size: 24px;
    height: 24px;
}
.app-print-codigo-barras-numero .numero-hawb {
    font-size: 24px;
    height: 24px;
	text-align: center;
}
</style>

<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;" >

	<page_footer>		
		<table class="page_footer">
			<tr>

				<td style="width: 50%; text-align: left">
					<?php echo $lang['left487'] ?> [[page_cu]]/[[page_nb]]
				</td>
				<td style="width: 50%; text-align: right">
				   
				</td>
			</tr>
		</table>
	</page_footer>

	<?php
	$sql_all=mysqli_query($con,"select * from custom_novelty where id='".$id."'");//Obtengo los datos del proveedor
	$rw_all=mysqli_fetch_array($sql_all);
    // get the HTML
	?>
<div id="contenido">	
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 33%; color: #444444;">
               
			   <?php echo "<img src='".$core->site_url."/uploads/logo.png' border='0' width='190' height='39'>";  ?>
                
            </td>
			<td style="width: 34%;">
			<strong><?php echo $lang['left463'] ?> : </strong> <?php echo $core->site_email; ?><br>
			<strong><?php echo $lang['left464'] ?> : </strong> <?php echo $core->c_phone; ?><br>
			<strong><?php echo $lang['left465'] ?> : </strong> <?php echo $core->site_url; ?><br>
			</td>
			<td style="width: 33%;">
				<strong><?php echo $core->site_name; ?> </strong> <br>
				<strong><?php echo $lang['left466'] ?> : </strong> <?php echo $core->c_address; ?> <br> <?php echo $core->c_country; ?>-<?php echo $core->c_city; ?>
		
			</td>
			
        </tr>
    </table>
    <br>
	<hr style="display: block;height: 1px;border: 1.5px solid #bdc3c7;    margin: 0.5em 0;    padding: 0;">
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 20%; "> 

            </td>
			<td style="width: 60%;text-align:center;font-size:20px;color:#3498db; background-color: #eee;padding:10px; border-radius: 10px ">
				<?php echo $lang['left467'] ?>
			</td>
			
			
        </tr>
    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 50%; "> 
				<div class="app-print-codigo-barras-zebra" style="margin-top: 0px; height: 80px; max-width: 420px; margin-left: 20px">                   
					<img  src="<?php echo $core->site_url; ?>/dashboard/pdf/customs/barcode.php?text=<?php echo $rw_add['order_inv'];?>&size=50&orientation=horizontal&codetype=Code128&print=true&sizefactor=2" alt="testing" />
				</div>
				<div class="app-print-codigo-barras-numero" style="padding-top:0px; max-width: 420px;  text-align: center"><strong> <?php echo $rw_add['order_inv'];?></strong></div>
			</td>
			
			<td  style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px"> 
				<p ><b><?php echo $lang['left468'] ?></b></p> <span style="text-align:center;font-size:12px "><?php echo $rw_all['date_novelty'];?></span>
			</td>
			<td  style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px " > 
				<p><b><?php echo $lang['left469'] ?></b></p> <span style="text-align:center;font-size:12px "><?php echo $rw_all['date_novelty_liberate'];?></span>
			</td>
		</tr>

    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;" class="detalle">
		<tr>
			<th  style="width: 50%; "><strong style="font-size:16px"><?php echo $lang['left470'] ?></strong></th>

			<th  style="width: 50%; "><strong style="font-size:16px"><?php echo $lang['left471'] ?></strong></th>

		</tr>
	
        <tr>
            <td  style="width: 50%; "> 

				<strong><?php echo $lang['left472'] ?>: </strong> <?php echo $rw_add['s_name'];?><br>
				<strong><?php echo $lang['left473'] ?>: </strong> <?php echo $rw_add['address'];?><br>
				<strong><?php echo $lang['left463'] ?>: </strong> <?php echo $rw_add['email'];?><br>
				<strong><?php echo $lang['left464'] ?>: </strong> <?php echo $rw_add['phone'];?>
            </td>
        
            <td  style="width: 50%; "> 
				<strong><?php echo $lang['left472'] ?>: </strong> <?php echo $rw_add['r_name'];?><br>
				<strong><?php echo $lang['left473'] ?>: </strong> <?php echo $rw_add['r_address'];?><br>
				<strong><?php echo $lang['left463'] ?>: </strong> <?php echo $rw_add['r_email'];?><br>
				<strong><?php echo $lang['left464'] ?>: </strong> <?php echo $rw_add['rc_phone'];?>
            </td>
        </tr>
    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;" class="detalle">
		<tr>

			<td  style="width: 30%; "><strong style="font-size:14px"><?php echo $lang['left474'] ?></strong></td>

			<td  style="width: 70%; font-size:12px"><?php echo $rw_all['type_novelty'];?></td>

		</tr>
		
		<tr>

			<td  style="width: 30%; "><strong style="font-size:14px"><?php echo $lang['left475'] ?></strong></td>

			<td  style="width: 70%; font-size:12px"><?php echo $rw_all['novelty_concept'];?></td>

		</tr>

	</table>
	<br>

	<table cellspacing="0" style="width: 100%;" class="detalle">

		<tr>

			<th  style="width: 50%; "><strong style="font-size:14px"><?php echo $lang['left476'] ?></strong></th>

			<th  style="width: 50%; "><strong style="font-size:12px"><?php echo $lang['left477'] ?></strong></th>

		</tr>
		
		<tr>

            <td  style="width: 50%; "> 
				<?php echo $rw_all['novelty_observation'];?>
            </td>

            <td  style="width: 50%; "> 
				<?php echo $rw_all['novelty_observation_liberate'];?>
            </td>
		</tr>
    </table>
	<br>
	<table cellspacing="0" style="width: 100%;" class='items'>
        <tr>
			<th style="text-align:left;width:40%"><?php echo $lang['left478'] ?></th>
			<th style="text-align:center;width:20%"><?php echo $lang['left479'] ?></th>
			<th style="text-align:right;width:20%"><?php echo $lang['left480'] ?></th>
			<th style="text-align:right;width:20%"><?php echo $lang['left481'] ?></th>
        </tr>
		<?php
		$query=mysqli_query($con,"SELECT * FROM add_courier, detail_addcourier WHERE add_courier.id=detail_addcourier.id_add AND add_courier.id='".$_GET['id_custom']."'");
		$items=1;
		$suma=0;
		while($row=mysqli_fetch_array($query)){
			$total=$row['r_costtotal']+$rw_all['readjustment'];
			$total=number_format($total,2,'.','');
			?>
		<tr>
		
			<td class="border-bottom"><?php echo $row['detail_description'];?></td>
			<td class="border-bottom text-center"><?php echo $row['detail_qnty'];?></td>
			<td class="border-bottom text-right"><?php echo $row['detail_weight'];?></td>
			<td class='border-bottom text-right'><?php echo $row['detail_vol'];?></td>

		</tr>	
		<?php
			$items++;
			$suma+=$total;
			}
		?>
	<tr>
		<td colspan=3 class='text-right' style="font-size:13px"><?php echo $lang['left482'] ?></td>
		<td class='text-right' style="font-size:12px"><?php echo $rw_add['r_curren'];?> <?php echo $rw_all['readjustment'];?></td>
	</tr>
	<tr>
		<td colspan=3 class='text-right' style="font-size:13px"><?php echo $lang['left483'] ?></td>
		<td class='text-right' style="font-size:12px"><?php echo $rw_add['r_curren'];?> <?php echo $rw_add['r_custom'];?></td>
	</tr>	
	<tr>
		<td colspan=3 class='text-right' style="font-size:18px;color: #3498db"><?php echo $lang['left484'] ?> </td>
		<td class='text-right' style="font-size:18px;color:#3498db"><?php echo $rw_add['r_curren'];?> <?php echo $suma;?></td>
	</tr>
    </table>
	
	<br>
	
	<table cellspacing="0" style="width: 100%;" class="detalle">
        <tr>
            <td  style="width: 100%; "> 
				<strong><?php echo $lang['left485'] ?>:</strong> <?php echo $lang['left486'] ?>
			</td>
		</tr>
		
    </table>	
</div> 	
</page>	

 