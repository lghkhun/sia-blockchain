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
! isset($_SESSION["public_access"])  ? exit("403 You dont have permission to access / on this server.") : "";
	

/**
* 
*/
class GF_Function 
{

  
       

   public function getVerPHP(){
        echo 'Current PHP version: ' . phpversion();
        echo phpversion('tidy');
    }

    // method get Time Zone
   public function getTimeZone(){ 
        return "Asia/Jakarta"; // set time zone to AJ -> Asia/Jakarta
    }

    // method get Date & Time 
    // if need Date $type is date
    // if need Time $type is time
   public function getDateTime($type){ 
        date_default_timezone_set($this->getTimeZone()); // get time zone from getTimeZone
        $d      = date('Y/m/d'); 
        $t      = date('H:i');
        $type   = strtolower($type);
        $date   = "date";
        $time   = "time";
        
        switch ($type) {
            case $date:
                return $d;
                break;
            case $time:
                return $t;
                break;
            default:
                return $d;
                break;
        }

    }
     // method send email 
  public  function sendEmail($SendTo,$subject,$header,$message){
        $headers  = "From: " . strip_tags($header) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($header) . "\r\n";
        $headers .= "CC: $cc\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message  = '<html><body>';
        $message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';
        $message .= "<tr><td colspan=2>$message</td></tr>"; 
        $message .= "<tr><td colspan=2 font='colr:#41a3d1;'>Copyright@2017 || garudaFramework</td></tr>"; 
        $message .= "</table>";
        $message .= "</body></html>";
        mail($SendTo, $subject, $message, $headers);
    }

    // method get page view file
     public   function getPage($str){ 
        return !file_exists(__VIEW_PATH__.$str.'.php') ?
        exit('Something Is Wrong') :  
        require_once __VIEW_PATH__.$str.'.php';
    }

    // method check internet connection
  public  function checkInternet()
    {
        $connected = @fsockopen("www.google.com", 80); 
                                        
        if ($connected){
            $is_conn = true; 
            fclose($connected);
        }else{
            $is_conn = false; 
        }
        return $is_conn;

    }

 
    // for download file use this function
    // need path of file in argument
  public  function downloadFile($path){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($path).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        readfile($path);
    }

    // for get file type use this function
    // need filename in argument
  public  function getFileType($val){
        $filetype        = pathinfo(($val),PATHINFO_EXTENSION);
        $filetype        = strtolower($filetype);   
        return $filetype;        
    }

    // for delete all file in folder use this function
    // need path of folder in argument
 public   function deleteFolder($path){
            if(is_dir($path) == TRUE){
                $rootFolder = scandir($path);
                if(sizeof($rootFolder) > 2){
                    foreach($rootFolder as $folder){
                        if($folder != "." && $folder != ".."){
    //Pass the subfolder to function
                            deleteFolder($path."/".$folder);
                        }
                    }
    //On the end of foreach the directory will be cleaned, and you will can use rmdir, to remove it
                    rmdir($path);
                }
            }else{
                if(file_exists($path) == TRUE){
                    unlink($path);
                }
            }
        }
    // method for direct page
 public   function directDefaultPage(){
      $getAppDir = AppDir();
      $getHost   = hostName();
      $result    = "http://".$getHost."/".$getAppDir."/";
      header('Location: http://'.$result .'/'); 

    }


    // method for get icon of file
    // bootstrap icon
public     function getIconFile($val){
        $val = strtolower($val);

        if ($val == "pdf")
        {
            $result = "fa-file-pdf-o";
        }
        else if ($val=="jpg" || $val=="png" || $val=="bmp" || $val=="jpeg")
        {
           $result = "fa-file-image-o";
        }
        else if ($val=="mp3" || $val=="wav")
        {
           $result = "fa-file-audio-o";
        }
         else if ($val=="3gp" || $val=="mp4" || $val=="mkv" || $val=="avi")
        {
           $result = "fa-file-video-o";
        }
        else if ($val=="doc" || $val=="docx")
        {
           $result = "fa-file-word-o";
        }
        else if ($val=="xlsx" || $val =="xls")
        {
           $result = "fa-file-excel-o";
        }
         else if ($val=="ppt" || $val =="pptx")
        {
           $result = "fa-file-powerpoint-o";
        }
          else if ($val=="rar" || $val =="zip" || $val =="7z")
        {
           $result = "fa-file-zip-o";
        }
          else if ($val=="txt")
        {
           $result = "fa-file-text";
        }
        else
        {
             $result ="fa fa-file";
        }


        return "fa ".$result;
    }     

}
function compress_image($source_url, $destination_url, $quality) {

    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg')
    $image = imagecreatefromjpeg($source_url);

    elseif ($info['mime'] == 'image/gif')
    $image = imagecreatefromgif($source_url);

    elseif ($info['mime'] == 'image/png')
    $image = imagecreatefrompng($source_url);

    imagejpeg($image, $destination_url, $quality);
    return true;
}  
