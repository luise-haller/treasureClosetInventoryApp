<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" contents= "width=devide-width, initial-scale=1.0">
    <title> Treasure Closet Log In</title>
    <!-- <link rel="stylesheet" href="./src/styleIndex.css"> -->
    <link rel="stylesheet" type="text/css" href="./src/styleIndex.css?v=version15">
    
<head>


<body>
    <div class="nav-bar">
        <h1>Treasure Closet Inventory</h1>
        <img class="resizeLogo" src="./img/asbLogo.jpg" alt="logo">
    </div>
    
    <h2>Log In</h2>

    <div class="form-container">
        <form class="form-info" action = 'Connect.php' method = "POST">
            <label for="user">Name:</label><br>
            <input type='text' name='name' id="name" required/> <br> <br>

            <label for="email">Email: </label><br>
            <input type = 'email' name='email' id = "email" required/><br> <br>

            <label for="password">Password: </label><br>
            <input type='password' name='password' id="password" class="<?php echo isset($_GET['error']) && $_GET['error'] == 'password' ? 'error' : ''; ?>" required/><br>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'password') echo "<p class='error-message'>The password you entered is incorrect.</p>"; ?> <br>


        <input type = 'submit' name = 'submit' id ="submit" value="Log In"/>
        </form>
    </div>
    
</body>
</html>




