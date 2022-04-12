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
<html>
<head>
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
<h3> <?= (__xFUNCTION__) ;?> </h3>

<?php
include __VIEW_PATH__."header.php";
?>

<div id="container">
<div id="body"> 
<h4> <?= (__EXAMPLEFUNCTION__ );?> </h4>


<!-- Example Get value of Date & Time -->
<textStr>
<h4><p> <?= ( __DATE__." : <strong>".$GF_Function_New->getDateTime("Date") ); ?> </strong> </p></h4>
<h4><p> <?= ( __TIME__." : <strong>".$GF_Function_New->getDateTime("Time") ); ?> </strong> </p><h4>
<h4><p> <?= (__ZONETIME__." <strong>". $GF_Function_New->getTimeZone() ) ; ?>    </strong></p><h4>
<h4><p> <?= (__DIRECTORY__." : <strong>". $GF_String_New->getFullUrl() ) ; ?>   </strong></p><h4>
<h4><p> <?= ("Protocol : "." : <strong>". __PROTOCOL__ ) ; ?>  </strong></p><h4>

</textStr>

</div>
</div>


<div id="container">
    <div id="body"> 

    <textStr>

    <h4> 1. MD5 <?= (__STYLEMD5T__) ; ?> "admin" = <strong><?= (md5("admin")) ;     ?></strong> </h4>

    <h4> 2. MD5 <?= ( __STYLEMD5M__); ?> "admin" = <strong><?= ($GF_String_New->md5Mdrn("admin")) ; ?></strong> </h4>

    <h4> 3. Get Random String with Length 30 = <strong>"<?= ($GF_String_New->getRandomString(30)) ; ?>"</strong>       </h4>

    <h4> 4. URL Encode =  <strong><?= ( $GF_String_New->uEncode("http://garudaframework.teloletchat.com/")) ; ?></strong></h4>

    <h4> 5. Base64 Encode =  <strong>"<?= ($GF_String_New->encrypt_64("GarudaFramework")); ?>"</strong> , Base64 Decode = <strong>"<?= ($GF_String_New->decrypt_64("R2FydWRhRnJhbWV3b3Jr")); ?>"</strong></h4>

    <h4> 6. Html Entities =  <strong><?= ($GF_String_New->htmlEn("https://teloletchat.com")); ?></strong> </h4>


    </textStr>

    </div>

</div>

<div id="container">
<div id="body"> 
<h4><?= ($GF_Function_New->getVerPHP()); ?></h4>
</div>
</div>

</div>
</div>
</div>
</div>

<?php

include 'modal/insert-data.php';
include 'modal/update-data.php';

echo ( '<script src="'.$dir_view.'view/assets/js/jquery.js"></script>');
echo ( '<script src="'.$dir_view.'view/assets/js/jquery.min.js"></script>');
echo ( '<script src="'.$dir_view.'view/assets/default.js"></script>');
echo ( '<script src="'.$dir_view.'view/assets/js/bootstrap.min.js"></script>');

?>

</body>
</html>