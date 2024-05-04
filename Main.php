<?php 
$servername = "localhost";
$username = "mcsckqzz_naisha";
$password = "naishaluise1220";
$dbname = "mcsckqzz_treasure";

/// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Main.php Connection failed: " . $conn->connect_error);
}
//echo "Main.php Connected successfully 2";

//update history
//$sql = "CREATE EVENT update_History ON SCHEDULE EVERY 1 MINUTE STARTS CURRENT_TIMESTAMP DO BEGIN AddHistory.php END";

//display inventory
$query = "SELECT * FROM inventory";

?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Treasure Closet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="./src/styleMain.css?v=version33">
        <link rel="stylesheet" href="./src/styleNav.css?v=version5">
    </head>
    <header>
        <!--navigation bar-->
        <nav>
            <div class="logo">
                <img class="resizeLogo" src="./img/asbLogo.jpg" alt="logo">
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
        <!--PHP logic for displaying inventory-->
        <?php
        echo '<section id="sec-1">
                <div class="container-1">
                    <h5 class="add-title">Add</h5>
                    <div class="form-container">
                        <form class="form-info" action="Add.php" method="post">
                            <label for="product">Product:</label>
                            <input type="text" name="product" id="product" placeholder="Enter Product Name" required/> <br> 
                            
                            <label for="link">Link:</label> 
                            <input type="text" name="link" id="link" placeholder="Enter URL" required/> <br> 
                            
                            <label for="status">Status:</label> 
                            <select name="status" id="status" required>
                                <option value="" disabled selected>Select Status</option>
                                <option value="In Stock">In Stock</option>
                                <option value="Need to Order">Need to Order</option>
                                <option value="Ordered">Ordered</option>
                            </select> <br>
                        
                            <label for="stock">Stock:</label>
                            <input type="text" name="stock" id="stock" placeholder="Enter a Numerical Value" required/> <br> 
                            
                            <label for="target">Target:</label> 
                            <input type="text" name="target" id="target" placeholder="Enter a Numerical Value" required/> <br>
                            
                            <input type="submit" name="submit" value="Submit"/>
                        </form>
                        <a href="#sec-2" class="scroll-down"></a>
                    </div>            
                </div>
            </section>';
        ?>
        <!-- Section for displaying inventory table -->
        <section id="sec-2">
            <div id="inventory-table">
                <?php
                echo '<table class="table">
                    <tbody>
                        <tr>
                            <td>Product</td>
                            <td>Link</td>
                            <td>Status</td>
                            <td>Stock</td>
                            <td>Target</td>
                            <td>Needed</td>
                            <td>Last Updated</td>
                            <td>Edit</td>
                            <td>Delete</td>
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
                    $result->free();
                }
                $conn->close();
                ?>
            </div>
        </section>
        <script src="/src/mainButton.js"></script>
    </body>
</html>



