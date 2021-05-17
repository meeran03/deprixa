<?php

	/* Connect To Database*/
	define("_VALID_PHP", true);
	require_once("../../init.php");

    if ($_POST['type'] == "1"){

        if (isset($_POST['name'])){
            
            $name=mysqli_real_escape_string($con,sanitize($_POST['name']));
            $url=mysqli_real_escape_string($con,sanitize($_POST['url']));
                    
        $sql="INSERT INTO `services` (`name`,`url`) VALUES ('$name', '$url');";
            $insert=mysqli_query($con,$sql);
        }
	}

    if ($_POST['type'] == "2"){

        if (isset($_POST['name'])){
            
            $name=mysqli_real_escape_string($con,sanitize($_POST['name']));
            $price=mysqli_real_escape_string($con,sanitize($_POST['price']));
            $service_id=sanitize($_POST['service_id']);
                    
        $sql="INSERT INTO `sub_services` (`name`,`price`,`service_id`) VALUES ('$name', '$price','$service_id');";
            $insert=mysqli_query($con,$sql);
        }
	}

	?>

	<script>
    window.location.reload()
	</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<?php

?>

