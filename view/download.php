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

require_once "host.php";


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
	<h3><?= (__DOWNLOAD__) ;?></h3>

<?php
include __VIEW_PATH__."header.php";
?>


<div id="container">
<div id="body"> 
	<div id="body"> 

	<p>
		<h2> <?= (__INFODOWNLOAD__); ?> <a target="_blank" href="<?= (__LINKDOWNLOAD__); ?> "> <?= (__FRAMEWORK_TITLE__);?></a></h2>
		
	</p>
</div>
</div>


<p></p>
<div id="">
<txtStr>

<?php
    $url="https://github.com/lamhotsimamora/garudaFramework";

    if ($GF_Function_New->checkInternet())
    {
      echo (file_get_contents($url));
    }
?>
</txtStr>
</div></div>

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