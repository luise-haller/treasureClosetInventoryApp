<?php
$servername = "localhost";
$username = "mcsckqzz_naisha";
$password = "naishaluise1220";

$dbname = "mcsckqzz_treasure";

/// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

/*
//delete usersRecord table
$sql = "DROP TABLE usersRecord";
if ($conn->query($sql) === TRUE) {
  echo "usersRecord Table DROPPED successfully";
} else {
  echo "Error DROPPING usersRecord table: " . $conn->error;
}
*/

//check if usersRecord table already exits
$table = "usersRecord";
$tableExists = "Show tables like '$table'";
$tableExistsResult = $conn->query($tableExists);

if($tableExistsResult->num_rows ==0){
  // sql to create usersRecord table
  $sql = "CREATE TABLE usersRecord (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
    insertion_ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table usersRecord created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
} else{
  echo "Table usersRecord already exists";
}


/*
//delete inventory table
$sql = "DROP TABLE inventory";
if ($conn->query($sql) === TRUE) {
  echo "inventory Table DROPPED successfully";
} else {
  echo "Error DROPPING inventory table: " . $conn->error;
}
*/

//check if inventory table already exits
$table = "inventory";
$tableExists = "Show tables like '$table'";
$tableExistsResult = $conn->query($tableExists);

if($tableExistsResult->num_rows ==0){
  // sql to create inventory table
  $sql = "CREATE TABLE inventory (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(250) NOT NULL,
    link VARCHAR(500) NOT NULL,
    status VARCHAR(100) NOT NULL,
    stock int(20) NOT NULL,
    target int(20) NOT NULL,
    user VARCHAR(100) NOT NULL, 
    insertion_ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table inventory created successfully";
    } else {
      echo "Error creating inventory table: " . $conn->error;
    }
} else{
  echo "Table inventory  already exists";
}

/*
//delete history table
$sql = "DROP TABLE history";
if ($conn->query($sql) === TRUE) {
  echo "history Table DROPPED successfully";
} else {
  echo "Error DROPPING history table: " . $conn->error;
}
*/
$table = "history";
$tableExists = "Show tables like '$table'";
$tableExistsResult = $conn->query($tableExists);

if($tableExistsResult->num_rows ==0){
  // sql to create historytable
  $sql = "CREATE TABLE history(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(250) NOT NULL,
    link VARCHAR(500) NOT NULL,
    status VARCHAR(100) NOT NULL,
    stock int(20) NOT NULL,
    target int(20) NOT NULL,
    updated  TIMESTAMP NOT NULL,
    insertion_ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table history created successfully";
    } else {
      echo "Error creating history table: " . $conn->error;
    }
} else{
  echo "Table history  already exists";
}

  $conn->close();
?>