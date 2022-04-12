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
<h3><?= (__FITURE__) ;?></h3>


<?php
include __VIEW_PATH__."header.php";
?>



<div id="container">
<div id="body"> 

<textStr><h4>
<font color="red"><?= (__TITTLE__);?></font> Feature : </br></br>
1. Enable/Disable Maintenance Web</br>
2. Enable/Disable Database </br>
3. Select PDO or MySqli for Connect to Database</br>
4. Select One Language or Multi Language </br>
5. Hidden/Show Error or Notice Reporting PHP</br></br>

* Example view with Bootstrap & Ajax (No Reload Page)</br>
* Example CRUD (Create, Read, Upload & Delete ) with Javascript / Ajax </br> 
* Example Simple Upload File</h4>
</textStr>

<textStr><h4>
@Change Log</br></br>

# Update v.1.4 </br>
- New Class GF_Prepare </br>
- New Class GF_String </br>
- New Class GF_Function </br>
- Change Structure Class</br>
- Delete Function Writting Log</br>
- Fix MySqli OOP (Constructor, Select Function, Update Function, Insert Function,& Delete Function ) </br>
- & More...  </br></br>


# Update v.1.3.2 </br>
- Add Function Error or Notice Reporting PHP  </br>
- Change name of file "GF_Function.php" & "GF_String.php" </br>
- New example view with Bootstrap & Ajax (No Reload Page)
- OOP Fixed </br>
- Bug Fixed </br>
- & More...</br> </br>

# Update v.1.3.1</br>
- OOP Fixed </br>
- Bug Fixed</br>
- & More...</br> </br>

# Update v.1.3 </br>
- Add PDO Class </br>
- Enable/Disable writting log </br>
- Enable/Disable multi Language  </br>
- Bug Fixed</br>
- & More...</br> </br>

# Update v.1.2 : </br>
- OOP Fixed </br>
- Direct Language file Fixed</br>
- Logic Framework Fixed</br>
- Speed & Performance Fixed </br>
- & More...</br></h4>
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
