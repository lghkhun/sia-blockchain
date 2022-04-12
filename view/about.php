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
	echo ( '<link href="'.$dir_view.'assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" rel="stylesheet">');
	?>	
</head>
<body>
<div id="__BODY__">
<div id="container">
<h3><?= (__ABOUT__) ;?></h3>

<?php
include __VIEW_PATH__."header.php";
?>



<div id="container">
<div id="body"> 
	<div id="body"> 

	<textStr>
	 <h4>
	Name 		: <b>sia blockchain</b> </br>
	Version 	: <b>v.1</b>	</br>
	Released 	: <b>12 Januari 2022</b></br>
	License 	: <b>FREE</b> </br>
	Status 		: Open Source </br>
    </h4>
	</textStr>

	<textStr> <h4>
	Programmer  : <b>LGH Khun</b> </br>
	Email 		: <b>lghkhun@gmail.com</b>	</br>
	Location 	: <b>Yogyakarta, Indonesia</b></br>
	</h4>
	</textStr>
    
	<textStr> <h4><b>
	"Sistem Informasi Akuntansi <font color="red">Blockchain</font> , <font color="blue">framework</font>"</b> 
	  </h4>
	</textStr>
	
</div>
</div>
</div>
<?php

include 'modal/insert-data.php';
include 'modal/update-data.php';

echo ( '<script src="'.$dir_view.'assets/js/jquery.js"></script>');
echo ( '<script src="'.$dir_view.'assets/js/jquery.min.js"></script>');
echo ( '<script src="'.$dir_view.'assets/default.js"></script>');
echo ( '<script src="'.$dir_view.'assets/js/bootstrap.min.js"></script>');

?>
</body>
</html>
