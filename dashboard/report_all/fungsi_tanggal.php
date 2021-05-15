<?php
	
function tgl_eng_to_ind($tgl) {
		$tanggal	= explode('-',$tgl);
		$kdbl		= $tanggal[1];

		if ($kdbl == '01')	{
			$nbln = 'January';
		}
		else if ($kdbl == '02') {
			$nbln = 'February';
		}
		else if ($kdbl == '03') {
			$nbln = 'March';
		}
		else if ($kdbl == '04') {
			$nbln = 'April';
		}
		else if ($kdbl == '05') {
			$nbln = 'May';
		}	
		else if ($kdbl == '06') {
			$nbln = 'June';
		}
		else if ($kdbl == '07') {
			$nbln = 'July';
		}
		else if ($kdbl == '08') {
			$nbln = 'August';
		}
		else if ($kdbl == '09') {
			$nbln = 'September';
		}
		else if ($kdbl == '10') {
			$nbln = 'Octuber';
		}
		else if ($kdbl == '11') {
			$nbln = 'November';
		}
		else if ($kdbl == '12') {
			$nbln = 'Dicember';
		}
		else {
			$nbln = '';
		}
		
		$tgl_ind = $tanggal[0]."  ".$nbln."  ".$tanggal[2];
		return $tgl_ind;
	}
?>
