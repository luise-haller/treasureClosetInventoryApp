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
     die("Connection failed: " . $conn->connect_error);
   }
  //  echo "Connected successfully!";
   

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){  
    if(isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['password']) && ($userpassword == $_POST['password'])){
      $name=$conn->real_escape_string($_POST['name']);
      $email=$conn->real_escape_string($_POST['email']);
  
      //enter variables into database
      $sql = "INSERT INTO `usersRecord` (`name`, `email`) VALUES ('$name', '$email')";
      if ($conn->query($sql) === TRUE) {
        // echo "Table usersRecord inserted successfully";     
        
       $query = "SELECT insertion_ts AS timestamp FROM usersRecord ORDER BY id DESC LIMIT 2"; 
        $result = $conn->query($query);
        if($result->num_rows==2){
          $row = $result->fetch_assoc();
          $row2 = $result->fetch_assoc();
          $date = strtotime($row["insertion_ts"]);
          $date2 = strtotime($row2["insertion_ts"]);
          $diff = $date2 - $date;

          if($diff > 60){
         
  
            $sql2 = "INSERT INTO `history`(`product`, `link`,`status`, `stock`, `target`, `updated`) SELECT `product`, `link`, `status`, `stock`, `target`, `insertion_ts` FROM inventory";
            $conn->query($sql2);
          } 
          else{
            // echo($date2-$date );
          }
        }
         
        header("Location: Main.php");
        exit();
      } else {
          echo "Error inserting data into table: " . $conn->error;
      }

    } else{
      header("Location: index.php?error=password");
      exit();
    }
  } 
?>