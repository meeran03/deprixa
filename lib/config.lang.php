<?php
	session_start();

	$sql="SELECT * FROM settings";
	$query=$db->query($sql); 
	if($query->num_rows>0){ 
		while($row=$query->fetch_array()){
		$files  = $row["language"];
			if (empty($_SESSION["languages"])) {

				$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
				$_SESSION["languages"]=$language;
				if ($language!="en")
				{
				 $_SESSION["languages"]="en";   
				}
			}
			if (isset($_SESSION["languages"]))
				
			{
			$language=$_SESSION["languages"]; 
			}
			switch ($language){
				case "fr":
					//echo "PAGE FR";
					include("languages/$files.php");//include check session FR
					break;
				case "it":
					//echo "PAGE ITALIAN";
					include("languages/$files.php");
					break;
				case "ru":
					//echo "PAGE ITALIAN";
					include("languages/$files.php");
					break;	
				case "es":
					//echo "PAGE ES";
					include("languages/$files.php");
					break;
				case "en":
					//echo "PAGE EN";
					include("languages/$files.php");
					break;        
				default:
					//echo "PAGE EN - Setting Default";
					include("languages/$files.php");//include EN in all other cases of different lang detection
					break;
			}

		}
	}
?>