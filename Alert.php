<?php 


$servername = "localhost";
$username = "mcsckqzz_naisha";
$password = "naishaluise1220";
$dbname = "mcsckqzz_treasure";

/// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Alert.php Connection failed: " . $conn->connect_error);
}
//echo "Main.php Connected successfully 2";


//display inventory
$query = "SELECT * FROM inventory";


echo '<table class="table"> 
    <tr> 
        <td>Product</td> 
        <td>Link</td> 
        <td>Status</td> 
        <td>Stock</td> 
        <td>Target</td> 
        <td>Last Updated</td> 
        <td>Date Recorded</td> 

    </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1 = $row["product"];
        $field2 = '<a href="' . htmlspecialchars($row["link"]) . '">' . htmlspecialchars($row["link"]) . '</a>'; // Embed link
        $field3 = $row["status"];
        $field4 = (int)$row["stock"];
        $field5 = (int)$row["target"];
        $field6 = $field5 - $field4;
        $field7 = date("Y-m-d H:i:s", strtotime($row["insertion_ts"]));
      $field8 = $row["user"];
      
        if($field4 <= 0.2*$field5){

            echo '<tr> 
                    <td>'.$field1.'</td> 
                    <td>'.$field2.'</td> 
                    <td>'.$field3.'</td> 
                    <td>'.$field4.'</td>
                    <td>'.$field5.'</td>
                    <td>'.$field6.'</td>
                    <td>'.$field7. " by ". $field8.'</td>
                    <td><a href="Edit.php?id='.$row['id'].'">Edit</a></td>
                    <td><a href="Delete.php?id='.$row['id'].'">Delete</a></td>

                </tr>';
        }
    }
    $result->free();
} 
$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" contents= "width=devide-width, initial-scale=1.0">
    <title>Alerts</title>
    <link rel="stylesheet" type="text/css" href="./src/styleAlert.css?v=version1">
    <link rel="stylesheet" href="./src/styleNav.css?v=version5">
</head>
<header>
    <!--navigation bar-->
    <nav>
        <div class="logo">
            <a href="Main.php">
                <img class="resizeLogo" src="./img/asbLogo.jpg" alt="logo">
            </a>
            <h4 class="title">Treasure Closet Inventory</h4>
        </div>
        <ul class="nav-links">
            <li>
                <a href="Alert.php">Alerts</a>
            </li>
            <li>
                <a href="ViewHistory.php">History</a>
            </li>
        </ul>
    </nav>
</header>
<body>
    <h2>Low Stock Alerts</h2>
</body>
</html>