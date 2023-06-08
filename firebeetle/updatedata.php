<?php
  require 'connection.php';
  
  //---------------------------------------- Condition to check that POST value is not empty.
  if (!empty($_POST)) {
    //........................................ keep track POST values
    $id = $_POST['id'];
    $tool1 = $_POST['tool1'];
    $tool2 = $_POST['tool2'];
    $tool3 = $_POST['tool3'];
    $tool4 = $_POST['tool4'];
    //........................................
    
    //........................................ Get the time and date.
    date_default_timezone_set("Asia/Jakarta"); // Look here for your timezone : https://www.php.net/manual/en/timezones.php
    $tm = date("H:i:s");
    $dt = date("Y-m-d");
    //........................................
    
    //........................................ Updating the data in the table.
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // replace_with_your_table_name, on this project I use the table name 'esp32_table_dht11_leds_update'.
    // This table is used to store DHT11 sensor data updated by ESP32. 
    // This table is also used to store the state of the LEDs, the state of the LEDs is controlled from the "home.php" page. 
    // This table is operated with the "UPDATE" command, so this table will only contain one row.
    $sql = "UPDATE item_iot SET tool1 = ?, tool2 = ?, tool3 = ?, tool4 = ?, time = ?, date = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($tool1,$tool2,$tool3,$tool4,$tm,$dt,$id));
    Database::disconnect();
    //........................................ 
    
  }
  //---------------------------------------- 
  
?>
