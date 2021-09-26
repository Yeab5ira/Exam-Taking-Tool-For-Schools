<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/nav-style.css">
    <script src="https://use.fontawesome.com/9c568687b8.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" href="./assets/images/crossred.png">
</head>
<body>
    <div class="navbar-container">
        <div class="logo-container" >
            <img src="./assets/images/crossIcon.svg" alt="">
            <p> <a href="./index.php?current_subject=none"> St. John Baptist De La Salle Catholic School </a></p>
            <button class="expand-btn" onclick="toggleNav()"> <i class="expand-icon fa fa-bars" > </i></button>
        </div>
        <div class="nav-container collapsed-nav">
            <div class="nav">
                <div id="user-icon">
                    <i class="fa fa-user-circle"> </i>
                    <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>
                </div>
                <form action="./includes/signout.incl.php" method="post">
                    <button type="submit" name="signout" > <i class="fa fa-sign-out"></i> Sign Out</button>
                </form>
            </div>
            
        </div>
        
            
    </div>

    <script type="text/javascript" src="./assets/js/functions.js"></script>
    
</body>
</html>