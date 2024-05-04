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
     die("Update.php Connection failed: " . $conn->connect_error);
   }
   echo "Update.php Connected successfully!";
   


    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
      /// Create connection
      //$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection Failed: ".mysqli_connect_error());
      echo "updating started";

     
      if(isset($_POST['product']) && isset($_POST['link'])&& isset($_POST['status'])&& isset($_POST['stock'])&& isset($_POST['target'])){
          $product=$_POST['product'];
          $link=$_POST['link'];
          $status=$_POST['status'];
          $stock=$_POST['stock'];
          $target=intval($_POST['target']);
          $id =$_POST['id'];

          $get_user = "SELECT * FROM `usersRecord` ORDER BY id DESC LIMIT 1";
          $user = $conn->query($get_user);
          if($user->num_rows>0){
            $row = $user->fetch_assoc();
            $email = $row['name'];
          }else{
            exit();
          }
      
          //enter variables into database
          $sql = "UPDATE `inventory` SET `product` = '$product', `link` = '$link', `status` = '$status', `stock`='$stock', `target`='$target', `user` = '$email', `insertion_ts` = NOW() WHERE `id`=$id";
        //  $sql = "INSERT INTO `inventory` (`product`, `link`, `status`, `stock`, `goal`) VALUES ('$product', '$link', '$status', '$stock', '$goal')";
         // $sql = "INSERT INTO `history` (`product`, `link`, `status`, `stock`, `goal`) VALUES ('$product', '$link', '$status', '$stock', '$goal')";
    
          if ($conn->query($sql) === TRUE) {
            echo "Tables inventory updated successfully";

            //redirect to Main.php
              header("Location: Main.php");
           // echo "Tables inventory and history inserted successfully";
            exit();
        } else {
            echo "Error inserting data into table: " . $conn->error;
        }
      } else{
        echo "Incorrect Password";
      }
  } 
?>