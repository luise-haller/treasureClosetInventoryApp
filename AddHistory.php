<?php
   $servername = "localhost";
   $username = "mcsckqzz_naisha";
   $password = "naishaluise1220";
   
   $dbname = "mcsckqzz_treasure";

   $userpassword = "MVHS";


   
   
   /// Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
   if ($conn->connect_error) {
     die("AddHistory.php Connection failed: " . $conn->connect_error);
   }
  // echo "AddHistory.php Connected successfully!";
   
  $query = "SELECT * FROM inventory";
  if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1 = $row["product"];
        $field2= $row["link"];
        $field3 = $row["status"];
        $field4 = (int)$row["stock"];
        $field5 = (int)$row["target"];
      $field6 = $row["insertion_ts"];

      $sql = "INSERT INTO `history`  VALUES ('$field1', '$field2', '$field3', '$field4', '$field5', 'f$field6)";


       
    }
    $result->free();
} 

?>


