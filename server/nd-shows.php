<?php

  header('Content-Type: application/json');
  require 'config.php';
  $conn = mysql_connect($_CONFIG['host'], $_CONFIG['user'], $_CONFIG['pass']) or die('Impossibile stabilire una connessione: ' . mysql_error());
  mysql_select_db($_CONFIG['dbname']);
  $sql = " 
    SELECT * 
      FROM `nd-shows`
  ";

  $result = mysql_query($sql) or die(mysql_error());
  $data = [];
  while ($row = mysql_fetch_assoc($result)) {
      $images = [];
      $id = $row['id'];
      $sqlImages = " 
        SELECT * 
          FROM `nd-shows-images`
         WHERE showId = $id 
      ";
      $resultImages = mysql_query($sqlImages) or die(mysql_error());
      while ($rowImage = mysql_fetch_assoc($resultImages)) {
        $images[] = $rowImage['url'];
      }

      $data[] = array(
          'name' => $row['name'],
          'image-urls' => $images
      );
  }
  
  echo json_encode($data);
  mysql_close($conn);
?>