<?php 
/* ############################################################################
          ================== sia blockchain v.1.1 ================== 
   ############################################################################
                Update Released 12 Januari 2022 / Yogyakarta, Indonesia
                            Written by LGH Khun
                             lghkhun@gmail.com  
                 https://github.com/lghkhun/sia-blockchain
                        OPEN SOURCE & FREE LICENSE    
                  YOU CAN USE THIS FRAMEWORK FOR EVERYTHING 
  ############################################################################
*/

defined('__LOAD__') OR exit('403 You dont have permission to access / on this server.');
include "host.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?= ( __FRAMEWORK_TITLE__ ); ?></title>

<?php
echo ( '<link href="'.$dir_view.'assets/default.css" rel="stylesheet" rel="stylesheet">');
echo ( '<link href="'.$dir_view.'assets/css/bootstrap.css" rel="stylesheet" rel="stylesheet">');
echo ( '<link href="'.$dir_view.'assets/css/bootstrap.min.css" rel="stylesheet" rel="stylesheet">');
?>	
</head>
<body>
<div id="__BODY__">

<div id="container">
<h3> <?= (__HOME__) ;?> </h3>

<?php
include __VIEW_PATH__."header.php";
?>


<div id="container">
<div id="body"> 
<p></p>
	<p><strong><h4><?= (__INFO1__ ) ; ?></h4></strong></p>

		<p></p>
		<textStr><h4><b>garudaFramework/view/home.php </b></h4></textStr>

		<p><strong><h4><?= (__INFO2a__ ) ; ?></strong></h4></p>

		<textStr>
		<textStr>
            <h4>
    		<b>garudaFramework/GF_Prepare.php </b>
    		</h4>
		</textStr>

		</textStr>
    <p><strong><h4><?= (__INFO2__ ) ; ?></strong></h4></p>
    <textStr><h4><font color="red">garudaFramework/class/GF_Controller.php </font> </h4>

    <textStr>
            <h4>
        <b>GF_Controller</b>
        </h4>
    </textStr>

    </textStr>
		<p><strong><h4><?= ( __INFO3__ ); ?></h4></strong></p>
		<textStr><h4><b><font color="green">garudaFramework/view/index.php</font></b> </h4>
        </textStr>	

</div>


<p></p>



<?php

include 'modal/insert-data.php';
include 'modal/update-data.php';

echo ( '<script src="'.$dir_view.'assets/js/jquery.js"></script>');
echo( '<script src="'.$dir_view.'assets/js/jquery.min.js"></script>');
echo( '<script src="'.$dir_view.'assets/default.js"></script>');
echo( '<script src="'.$dir_view.'assets/js/bootstrap.min.js"></script>');

?>

</body>

</html>
