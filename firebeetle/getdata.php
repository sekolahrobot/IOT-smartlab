<?php
  include 'connection.php';
  if (!empty($_POST)) {

    $id = $_POST['id'];    
    $myObj = (object)array();   
    $pdo = Database::connect();
    $sql = 'SELECT * FROM item_iot WHERE id="' . $id . '"';
    foreach ($pdo->query($sql) as $row) {
	$date = date_create($row['date']);
      $dateFormat = date_format($date,"d-m-Y");
      
      $myObj->id = $row['id'];
      $myObj->tool1 = $row['tool1'];
      $myObj->tool2 = $row['tool2'];
      $myObj->tool3 = $row['tool3'];
      $myObj->tool4 = $row['tool4'];
      $myObj->ls_time = $row['time'];
      $myObj->ls_date = $dateFormat;
	  
      $myJSON = json_encode($myObj);
      
      echo $myJSON;
    }
    Database::disconnect();
    //........................................ 
  }
  //---------------------------------------- 
?>