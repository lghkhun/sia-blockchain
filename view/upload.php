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
<h3> <?= (__UPLOAD__) ;?> </h3>

<?php
include __VIEW_PATH__."header.php";
?>


<div id="container">
<div id="body"> 

  <center> 
  </br>

  <form action="<?= $dir_app."result/file" ?>" method="post" enctype="multipart/form-data">

    <input type="file" id="file_upload" name="file_upload" placeholder="upload file" class=""> 

     </br> </br>
    <button class="btn btn-success btn-md" type="submit">Upload</button>
    </center>



    </form>
     </br> </br>
 <div class="container"><table class="table table-hover"> 
        <thead>
        <tr>
            <th><h4>ID</h4></th>
            <th><h4>Filename</h4></th>
            <th><h4></h4></th>
          
            <th></th>
        </tr>
        </thead><tbody id="id_table"> 
<?php

if (class_exists('db'))
{
    $view_obj = new db();

    $check = $view_obj->selectCount("select id from t_file limit 1");

    if ($check>0)
    {
        $result    =  $view_obj ->selectData("select id,filename from t_file");

    while($rowresult = $result->fetch_assoc()) 
    {
        $filename = $rowresult["filename"];
        $filename = $GF_String_New->decrypt_64($filename);


        $icon = $GF_Function_New->getIconFile($filename);

        echo ('<tr>
            <td> '.$rowresult["id"].' </td>
            <td><i class="'.$icon.'"><i> '.$filename.' </td>

            <td> 
            <button id="'.$rowresult["id"].'" class="btn btn-primary btn-sm" onclick="downloadFile(this.id)">Download</button>
            <button id="'.$rowresult["id"].'" class="btn btn-danger btn-sm" onclick="deleteFile(this.id)">Delete</button>
            </td>
            </tr>'
    );
    }

    

}

    
}

?>
</tbody></table></div>


</div>

<p></p>

<?php

include 'modal/insert-data.php';
include 'modal/update-data.php';

echo( '<script src="'.$dir_view.'assets/js/jquery.js"></script>');
echo( '<script src="'.$dir_view.'assets/js/jquery.min.js"></script>');
echo( '<script src="'.$dir_view.'assets/default.js"></script>');
echo( '<script src="'.$dir_view.'assets/js/bootstrap.min.js"></script>');

?>

</body>

</html>
