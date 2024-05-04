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
     die("Main.php Connection failed: " . $conn->connect_error);
   }
//    echo "Main.php Connected successfully!";


   if(isset($_GET['id'])){
    //id parameter is in URL
    $id =$_GET['id'];

    //get row from inventory
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
        // echo "Found";
    }else{
        echo "Not Found";
    }

 //  $conn->close();

   }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" contents= "width=devide-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <link rel="stylesheet" type="text/css" href="./src/styleEdit.css?v=version4">
</head>

<body>
    <div class="nav-bar">
        <h1>Treasure Closet Inventory</h1>
        <img class="resizeLogo" src="./img/asbLogo.jpg" alt="logo">
    </div>

    <h2>Edit Entry</h2>
    <div class="form-container">
        <form class="form-info" action="Update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
            Product: <input type="text" name="product" value="<?php echo $product; ?>"><br>
            Link: <input type="text" name="link" value="<?php echo $link; ?>"><br>
            Status: <input type="text" name="status" value="<?php echo $status; ?>"><br>
            Stock: <input type="text" name="stock" value="<?php echo $stock; ?>"><br>
            Target: <input type="text" name="target" value="<?php echo $target; ?>"><br>
            <input type="submit" name="submit" value="Submit">
            <input type="hidden"name="id"value="<?php echo $id; ?>">
        </form>
    </div>
    
</body>
</html>



