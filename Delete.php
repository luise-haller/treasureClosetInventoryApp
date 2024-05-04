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
     die("Delete.php Connection failed: " . $conn->connect_error);
   }
   echo "Delete.php Connected successfully!";
   
   if(isset($_GET['id'])){
    //id parameter is in URL
    $id =$_GET['id'];

    /*//get row from inventory
    $sql = "SELECT * FROM inventory WHERE id = $id";
    $res = $conn->query($sql);

    //get data from row
    if($res->num_rows>0){
        $row = $res->fetch_assoc();
        $product=$row['product'];
        $link=$row['link'];
        $status=$row['status'];
        $stock=$row['stock'];
        $target=$row['target'];
        echo "Found";
    }else{
        echo "Not Found";
    }*/

    $sql = "DELETE from inventory WHERE `id`=$id";
      if ($conn->query($sql) === TRUE) {
        echo "Tables inventory deleted successfully";

        //redirect to Main.php
          header("Location: Main.php");
       // echo "Tables inventory and history inserted successfully";
        exit();
    } else {
        echo "Error deleting data into table: " . $conn->error;
    }

 //  $conn->close();


   }

/*
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
  /// Create connection

      $id =$_POST['id2'];
      echo"HI";
      $sql = "DELETE `inventory` WHERE `id`=$id";
      if ($conn->query($sql) === TRUE) {
        echo "Tables inventory deleted successfully";

        //redirect to Main.php
          header("Location: Main.php");
       // echo "Tables inventory and history inserted successfully";
        exit();
    } else {
        echo "Error inserting data into table: " . $conn->error;
    }
 
} */

    
?>