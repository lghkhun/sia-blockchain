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
?>

<!-- Modal Form Insert Data 
  *  @important set ID for modal
  *
  *  "ModalInsertData"
-->
<div id="ModalInsertData" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span id=""> <center><?= __ADD__ ?> Data</center> </span></h4>
      </div>
      <div class="modal-body">
      <center>
        <h5 class="" id="#alertInsertData"></h5>

        <input type="text" id="txt_name" name="middle-name"  maxlength="200" onkeypress="enterText1(event);" placeholder="Name" class="form-control col-md-7 col-xs-12" required="required" onkeypress=""></center></br></br></br>
        <input type="text" id="txt_email" name="middle-name"  maxlength="200" onkeypress="enterText2(event);" placeholder="Email" class="form-control col-md-7 col-xs-12" required="required" onkeypress=""></center></br></br></br>
        <input type="number" id="txt_phone" name="middle-name"  maxlength="200" onkeypress="enterText3(event);" placeholder="Phone Number" class="form-control col-md-7 col-xs-12" required="required" onkeypress=""></center></br></br></br>
        <input type="text" id="txt_address" name="middle-name"  maxlength="200" onkeypress="enterText4(event);" placeholder="Address" class="form-control col-md-7 col-xs-12" required="required" onkeypress="">
        </br></br></br>
        <center>
        <button type="button" id="btn_insert_data" class="btn btn-primary" onclick="insertData();"><?= __SAVE__ ?></button></center>
      </center>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
  </div>
 </div>
 </div>

<!-- Modal Form Insert Data -->



<!-- JavaScript For Modal Insert Data -->

<script type="text/javascript">

function enterText1(e){
  if (e.keyCode == 13) {
      document.getElementById("txt_email").focus();
  }
}

function enterText2(e){
  if (e.keyCode == 13) {
      document.getElementById("txt_phone").focus();
  }
}
function enterText3(e){
  if (e.keyCode == 13) {
      document.getElementById("txt_address").focus();
  }
}

function enterText4(e){
  if (e.keyCode == 13) {
      document.getElementById("btn_insert_data").focus();
  }
}


    
function insertData()
{

    txt_name = document.getElementById("txt_name").value.trim(); 
    txt_email = document.getElementById("txt_email").value.trim(); 
    txt_phone = document.getElementById("txt_phone").value.trim(); 
    txt_address = document.getElementById("txt_address").value.trim(); 


    if (txt_name==='')
    {
       messageAlert("#alertInsertData","Name is empty","danger");
       return;
    }
      if (txt_email==='')
    {
       messageAlert("#alertInsertData","Email is empty","danger");
       return;
    }
      if (txt_phone==='')
    {
       messageAlert("#alertInsertData","Phone Number is empty","danger");
       return;
    }
     if (txt_address==='')
    {
       messageAlert("#alertInsertData","Address is empty","danger");
       return;
    }



    if (window.XMLHttpRequest) 
    {
          xmlhttp = new XMLHttpRequest();
    }
    else 
    {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var respon=this.responseText;

          if (respon==='T')
          {
            messageAlert("#alertInsertData","Data has been saved","success");
            document.getElementById("txt_name").value="";
            document.getElementById("txt_email").value="";
            document.getElementById("txt_phone").value="";
            document.getElementById("txt_address").value="";


          }
          else if (respon==='F')
          {
              messageAlert("#alertInsertData","Failed Saved Data","danger");
          }
          else
          {
            alert(respon);
          }

      }
  };
                    
    xmlhttp.open("GET",
    getHost()+"process/insert-data.php?name="
            +txt_name+"&email="
            +txt_email+"&phone="
            +txt_phone+"&address="
            +txt_address+"",true); 

    xmlhttp.send();

}


</script>

