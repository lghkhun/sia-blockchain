// function javascript for call modal by Id
  function showModalInsertData(){
      var $modal = $('#ModalInsertData');
      $modal.modal("show");
  }

// function javascript for call modal by id


// function javascript for call modal by Id
  var id_data;
  function showModalUpdateData(str){
      id_data = document.getElementById(str).id;
      var $modal = $('#ModalUpdateData');
      $modal.modal("show");
  }

// function javascript for call modal by id

//-=------------------------------------------

// function for display  alert in modal
// id_message = id div
// message = message that wanna be show
// type = success, alert, warning , danger
function messageAlert(id_message,message,type){
    var psan  = '<div  class="alert alert-'+type+'" fade in"> '+message+' !</div>';
    var tmpil = psan.fontcolor("black");
    document.getElementById(id_message).innerHTML = tmpil ;
    return;
}

// function for display  alert in modal
var protocol;
var host;
function getHost(){
   protocol = window.location.protocol+"//";
   host     = window.location.host +"/";
  
  return protocol+host+directory+"/";
}

function getRequest(){
   return "page/";
}

function changeLanguange(id){

	var getID = id;
	
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var respon=this.responseText;
			if (respon=="T") { loadHome();return ;}
			if (respon=="F") { alert("Failed change languange ! Something is wrong !"); return;}
			
		}
	};

	xmlhttp.open("GET",getHost()+"process/change-languange.php?lang="+getID+"",true); 
	xmlhttp.send();
 


}

function deleteData(id){
  var getID = id;
 
  if (window.XMLHttpRequest) {
  
    xmlhttp = new XMLHttpRequest();
  } else {
  
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var respon=this.responseText;
    if (respon=="T") { loadView();return ;}
      if (respon=="F") { alert("Failed while deleted Data ! Something is wrong !"); return;}
        
    }
  };

xmlhttp.open("GET",getHost() +"process/delete-data.php?id="+getID+"",true);
xmlhttp.send();
}


function refreshEx() {
  var getLoc = getHost() + getRequest()+ 'bootstrap';
  window.location.href = ""+getLoc+"";
  return;
}

function refreshDownload() {
  var getLoc = getHost() + getRequest()+ 'download';
  window.location.href = ""+getLoc+"";
  return;
}


function loadHome() {
  var getLoc = getHost() + getRequest()+'home';

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("__BODY__").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", getLoc, true);
  xhttp.send();
}

function loadFeature() {
  var getLoc = getHost() + getRequest()+'feature';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("__BODY__").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", getLoc, true);
  xhttp.send();
}

function loadAbout() {
  var getLoc = getHost() + getRequest()+'about';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("__BODY__").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", getLoc, true);
  xhttp.send();
}

function loadView() {
  var getLoc = getHost() + getRequest()+'view';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("__BODY__").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", getLoc, true);
  xhttp.send();
}

function loadFunction() {
  var getLoc = getHost() + getRequest()+'function';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("__BODY__").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", getLoc, true);
  xhttp.send();
}

function loadUpload() {
  var getLoc = getHost() + getRequest()+'upload';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("__BODY__").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", getLoc, true);
  xhttp.send();
}


function deleteFile(str){
   id_file = document.getElementById(str).id.trim();


   if (id_file==='')
   {
    return;
   }
 
 
  if (window.XMLHttpRequest) {

    xmlhttp = new XMLHttpRequest();
  } 
  else {

    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
        var respon=this.responseText;
        if (respon=="T") { 
          loadUpload();
         
        }
         
            
      }
       
  };

  xmlhttp.open("GET",getHost() +"process/delete-file.php?id="+id_file+"",true);
  xmlhttp.send();
}

 function downloadFile(str)
{  
      id_file = document.getElementById(str).id.trim();

      if (id_file==='')
      {
          return;
      }

      window.location.href = getHost()+"download.php?id="+id_file;
}

