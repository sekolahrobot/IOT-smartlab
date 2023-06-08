<!DOCTYPE HTML>
<html>
  <head>
    <title>IOT LABAROTORY MANAGEMENT SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" href="data:,">
    <style>
      html {font-family: Arial; display: inline-block; text-align: center;}
      p {font-size: 1.2rem;}
      h4 {font-size: 0.8rem;}
      body {margin: 0;}
      .topnav {overflow: hidden; background-color: #0c6980; color: white; font-size: 1.2rem;}
      .content {padding: 5px; }
      .card {background-color: white; box-shadow: 0px 0px 10px 1px rgba(140,140,140,.5); border: 1px solid #0c6980; border-radius: 15px;}
      .card.header {background-color: #0c6980; color: white; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 12px; border-top-left-radius: 12px;}
      .cards {max-width: 700px; margin: 0 auto; display: grid; grid-gap: 2rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));}
      .reading {font-size: 1.3rem;}
      .packet {color: #bebebe;}
      .temperatureColor {color: #fd7e14;}
      .humidityColor {color: #1b78e2;}
      .statusreadColor {color: #702963; font-size:12px;}
      .LEDColor {color: #183153;}
    </style>
  </head>
  
  <body>
    <div class="topnav">
      <h3>SEKOLAH ROBOT INDONESIA</h3>
    </div>
    
    <br>
    <div class="content">
      <div class="cards">
        <div class="card">
          <div class="card header">
            <h3 style="font-size: 1rem;">PEGBOARD</h3>
          </div>
		  <div class="holderpegboard">
			  <img id="image1_e" src="" />
			  <img id="image2_e" src="" />
			  <img id="image3_e" src="" />
			  <img id="image4_e" src="" /> 
		  </div>
	 
        </div>  
      </div>
    </div>
    
    <br>
    
    <div class="content">
      <div class="cards">
        <div class="card header" style="border-radius: 15px;">
            <h3 style="font-size: 0.7rem;">LAST TIME RECEIVED DATA FROM FireBeetle [ <span id="timedateupdate"></span> ]</h3>
            <h3 style="font-size: 0.7rem;"></h3>
        </div>
      </div>
    </div>
    <!-- ___________________________________________________________________________________________________________________________________ -->
   <script>

      Get_Data("pegboard1");      
      setInterval(myTimer, 5000);      

      function myTimer() {
        Get_Data("pegboard1");
      }

      function Get_Data(id) {
				if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
		  
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
			 // alert(id);
            const myObj = JSON.parse(this.responseText);
            if (myObj.id == "pegboard1") {

              document.getElementById("timedateupdate").innerHTML = "Time : " + myObj.ls_time + " | Date : " + myObj.ls_date + " (dd-mm-yyyy)";
              if (myObj.tool1 == "1") {
				document.getElementById("image1_e").src = "images/tool1.png";
				
			  } else if (myObj.tool1 == "0") {
                document.getElementById("image1_e").src = "images/tool1_0.png";
              }
			  
			  if (myObj.tool2 == "1") {
				document.getElementById("image2_e").src = "images/tool2.png";
				
			  } else if (myObj.tool2 == "0") {
                document.getElementById("image2_e").src = "images/tool2_0.png";
              }
			  
			  if (myObj.tool3 == "1") {
				document.getElementById("image3_e").src = "images/tool3.png";
				
			  } else if (myObj.tool3 == "0") {
                document.getElementById("image3_e").src = "images/tool3_0.png";
              }
			  
			  if (myObj.tool4 == "1") {
				document.getElementById("image4_e").src = "images/tool4.png";
				
			  } else if (myObj.tool4 == "0") {
                document.getElementById("image4_e").src = "images/tool4_0.png";
              }

            }
          }
        };
        xmlhttp.open("POST","getdata.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);
			}
   </script>
  </body>
</html>