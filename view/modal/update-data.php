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

<!-- Modal Form Update Data 
  *  @important set ID for modal
  *
  *  "ModalUpdateData"
-->
<div id="ModalUpdateData" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span id=""> <center><?= __EDIT__ ?> Data</center> </span></h4>
      </div>
      <div class="modal-body">
      <center>
        <h5 class="" id="#alertUpdateData"></h5>

        <input type="text" id="txt_name_edit" name="middle-name"  maxlength="200" onkeypress="enterText1_e(event);" placeholder="Name" class="form-control col-md-7 col-xs-12" required="required" onkeypress=""></center></br></br></br>
        <input type="text" id="txt_email_edit" name="middle-name"  maxlength="200" onkeypress="enterText2_e(event);" placeholder="Email" class="form-control col-md-7 col-xs-12" required="required" onkeypress=""></center></br></br></br>
        <input type="number" id="txt_phone_edit" name="middle-name"  maxlength="200" onkeypress="enterText3_e(event);" placeholder="Phone Number" class="form-control col-md-7 col-xs-12" required="required" onkeypress=""></center></br></br></br>
        <input type="text" id="txt_address_edit" name="middle-name"  maxlength="200" onkeypress="enterText4_e(event);" placeholder="Address" class="form-control col-md-7 col-xs-12" required="required" onkeypress="">
        </br></br></br>
        <center>
        <button type="button" id="btn_update_data" class="btn btn-primary" onclick="updateData();"><?= __EDIT__ ?></button></center>
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

function enterText1_e(e){
  if (e.keyCode == 13) {
      document.getElementById("txt_email_edit").focus();
  }
}

function enterText2_e(e){
  if (e.keyCode == 13) {
      document.getElementById("txt_phone_edit").focus();
  }
}
function enterText3_e(e){
  if (e.keyCode == 13) {
      document.getElementById("txt_address_edit").focus();
  }
}

function enterText4_e(e){
  if (e.keyCode == 13) {
      document.getElementById("btn_update_data").focus();
  }
}



function updateData()
{
    if (id_data==='')
    {
        messageAlert("#alertUpdateData","Id is empty","danger");
        return;
    }

 

    txt_name = document.getElementById("txt_name_edit").value.trim(); 
    txt_email = document.getElementById("txt_email_edit").value.trim(); 
    txt_phone = document.getElementById("txt_phone_edit").value.trim(); 
    txt_address = document.getElementById("txt_address_edit").value.trim(); 


    if (txt_name==='')
    {
       messageAlert("#alertUpdateData","Name is empty","danger");
       return;
    }
      if (txt_email==='')
    {
       messageAlert("#alertUpdateData","Email is empty","danger");
       return;
    }
      if (txt_phone==='')
    {
       messageAlert("#alertUpdateData","Phone Number is empty","danger");
       return;
    }
     if (txt_address==='')
    {
       messageAlert("#alertUpdateData","Address is empty","danger");
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
            messageAlert("#alertUpdateData","Data has been updated","success");
            document.getElementById("txt_name_edit").value="";
            document.getElementById("txt_email_edit").value="";
            document.getElementById("txt_phone_edit").value="";
            document.getElementById("txt_address_edit").value="";
            //loadView();
          }
          else if (respon==='F')
          {
              messageAlert("#alertUpdateData","Failed Saved Data","danger");
          }

       
      }
  };
                    
    xmlhttp.open("GET",
    getHost()+"process/update-data.php?name="
            +txt_name+"&email="
            +txt_email+"&phone="
            +txt_phone+"&address="
            +txt_address+"&id="
            +id_data+"",true); 

    xmlhttp.send();

}

</script>

<!-- JavaScript For Modal Insert Data -->
