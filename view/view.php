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

echo '<link href="'.$dir_view.'assets/default.css" rel="stylesheet" rel="stylesheet">';
echo '<link href="'.$dir_view.'assets/css/bootstrap.css" rel="stylesheet" rel="stylesheet">';
echo '<link href="'.$dir_view.'assets/css/bootstrap.min.css" rel="stylesheet" rel="stylesheet">';
?>  

</head>
<body>

<div id="container">
<h3><?= (__VIEW__) ;?></h3>

<?php
include __VIEW_PATH__."header.php";
?>


<div id="container">
<div id="body"> 
<div id="body"> 

<h4><center><?= (__EXG__); ?></center> </h4> 
</div>
</div>



<p></p>

<div id="container"> 
<h4>&nbsp&nbsp<?= (__pdoC__); ?> </h4>
<textStr> 
<?php 
if (class_exists('myPDO'))
  {
  	! isset($_pdo) ? $_pdo = new myPDO(): false;
  	
	$_pdo->query('SELECT id,username,email,phone,address FROM t_data limit 10');
	$row = $_pdo->resultset();
	echo ("<h2>Count Row : ".$_pdo->rowCount()."</h2>");
	echo ('<pre>');
	print_r($row);
	echo ('</pre>');
  }
else
{
     	echo('<h4><font color="red">PDO</font> is DISABLE or <font color="red">Database_Start</font> is FALSE , See <font color="green">"database_start"</font> on <font color="red"> "garudaFramework/GF_Prepare.php"</font> -> (line 49) and (line 53) </br></h4>');
}
?>
</textStr>
</div>
</br>

 
<div id="__BODY__">
<div id="container"> 
<h4>&nbsp&nbsp <?= (__mySQLiC__); ?> </h4>

<textStr> 
<!-- Example insert data -->
<center><button class="btn btn-primary" onclick="showModalInsertData();"><?= __ADD__." ".__B4__ ?></button></center>
<!-- Example insert data -->
<table>
<?php
if (class_exists('db'))
{
	! isset($_mysqli) ? $_mysqli = new db() : false;
	
	$AllTot    =  $_mysqli ->selectCount("select id from t_example");
	$LimitTot  =  $_mysqli ->selectCount("select id from t_example limit 10");
	$result    =  $_mysqli ->selectData("select id,username,email,phone,address from t_example limit 50");

    echo ('<h5>'.__COUNTDATALL__.' = <font color="blue">'. $AllTot .' </font> ' .__COUNTDATA__.' </textStr></div></h5>');	

    echo ('<div class="container"><table class="table table-hover"> 
        <thead>
        <tr>
            <th><h4>ID</h4></th>
            <th><h4>'.__NAME__.'</h4></th>
            <th><h4>'.__EMAIL__.'</h4></th>
            <th><h4>'.__PHONE__.'</h4></th>
            <th><h4>'.__ADDRESS__.'</h4></th>
            <th></th>
        </tr>
        </thead><tbody id="id_table"> '); 

    
	if ($LimitTot > 0)
	{
			while($rowresult = $result->fetch_assoc()) 
			{
				echo ('<tr>
					<td> '.$rowresult["id"].' </td>
					<td> '.$rowresult["username"].' </td>
					<td> '.$rowresult["email"].' </td>
					<td> '.$rowresult["phone"].' </td>
					<td> '.$rowresult["address"].' </td>
					<td> 
                        <button id="'.$rowresult["id"].'" class="btn btn-warning btn-sm" onclick="showModalUpdateData(this.id)">Edit</button>
						<button id="'.$rowresult["id"].'" class="btn btn-danger btn-sm" onclick="deleteData(this.id)">Delete</button>
					</td>
					</tr>
				');

			}
		
	}
    echo('</tbody></table></div>');
	
}
else
{
       echo('<h4><font color="red">MYSQLi</font> is DISABLE or <font color="red">Database_Start</font> is FALSE , See <font color="green">"database_start"</font> on <font color="red">"garudaFramework/GF_Prepare.php"</font> -> (line 49) and (line 53) </br></h4>');
}

?>
</textStr>
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
