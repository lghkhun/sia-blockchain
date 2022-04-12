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

  // check seesion start is TRUE or FALSE
  ( session_status() == PHP_SESSION_NONE) ? session_start() : "";


  // check session public access is already SET or NOT
  ! isset($_SESSION["public_access"]) ? exit("403 You dont have permission to access / on this server.") : "";


  // include GF_Prepare with Session ___GF_Prepare___
  include '../'.$_SESSION['___GF_Prepare___'].'.php';
  // create new object
  $GF_Prepare  = new GF_Prepare("?");


  $GF_Function = new GF_Function();
  $GF_String   = new GF_String();


  $mesage_to_client = "";

  $filename_message = "";
  if (isset($_FILES["file_upload"]["name"]) )
  {
    if ($_FILES["file_upload"]["name"]=='')
    {
        $mesage_to_client= $GF_String->messageHTML("yellow","File is empty !");
    }
    else if ($_FILES["file_upload"]["name"]=='index.php' || $_FILES["file_upload"]["name"]=='index.html')
    {
        $mesage_to_client= $GF_String->messageHTML("yellow","File is not allowed upload on server !");
    }
    else
    {


        // check size of file
        if ($_FILES["file_upload"]["size"] > 3000000) {
            $mesage_to_client= messageHTML("yellow","File is too large  ! Maximum file is 3 MB !");
        }
        else 
        {
        // create file path that want to save the file
            $targetPath            = $_SERVER['DOCUMENT_ROOT']."/".$GF_String->AppDir()."/data/";
            $targetPath            = $targetPath.basename($_FILES['file_upload']['name']);


        // check file in directory
            if (! file_exists($targetPath))
            {
        // upload file
                if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $targetPath))
                {

                    $save_file_obj = new db();

                    $filename = $_FILES['file_upload']['name'];

                    $filename = $GF_String->encrypt_64($filename);



                    $save_file_obj->insert("t_file","filename",$filename);

                    if ($save_file_obj)
                    {

                        $mesage_to_client= $GF_String->messageHTML("white","Upload Successfully !!!"); 
                        $filename_message = $GF_String->messageHTML("lime","{ ".$_FILES['file_upload']['name']." }"); 
                    }

 
                }
                else
                {
                 $mesage_to_client= $GF_String->messageHTML("red","Failed upload file ! Sorry !");

             } 
         }
         else
         {
            $mesage_to_client= $GF_String->messageHTML("red","File already exist !");
        }
    }
}

}
else
{
    $mesage_to_client= $GF_String->messageHTML("yellow","Nothing");

}

?>


           <!DOCTYPE html>
           <html>
           <head>
            <title>Result</title>

            <style type="text/css">
             body {
                background-color: #171717;
            }
        </style>

    </head>
    <body>
        <?php

        $geturl = __PROTOCOL__.$GF_String->getFullUrl();

      
        ?>

        <meta http-equiv="refresh" content="2;url=<?php echo ($geturl."page/upload"); ?>" />
        <div class="container">

            <center>

            <div class="">

               <h1> <code> <strong>
                   <a>
                    <?=

                    $filename_message."</br>"
                    .$mesage_to_client;

                    ?>
                </a>
                </strong>
            </code>
            </h1>

            </div>
    </center>

    </div>
    <div class="error-actions">
        <a href="" style="margin-top: 10px;" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-home">
    </div>



    </body>
    </html>