<?php 
session_start();
// include_once './includes/db.incl.php'
// include './includes/navbar.incl.php';

if(isset($_SESSION['username'])){
    header("Location: ./studentDashboard.php");
    exit();
}
if(isset($_GET['signup'])){
    if($_GET['signup']=="success"){
        echo "<script language='javascript'> alert('Account successfully created. Sign in now!') </script>";
    } elseif($_GET['signup']=="failed"){
        echo "<script language='javascript'> alert('Error creating account. Please try again!') </script>";
    } elseif($_GET['signup']=="username_taken"){
        echo "<script language='javascript'> alert('Username already exists. Try again!') </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/home-style.css">
    <script src="https://use.fontawesome.com/9c568687b8.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" href="./assets/images/crossred.png">

</head>
<body>
    <div class="navbar-container">
        <div class="logo-container">
            <img src="./assets/images/crossIcon.svg" alt="">
            <p>St. John Baptist De La Salle Catholic School</p>
        </div>
    </div>
    <div class="body-container">
        <div class="signin-container">
            <div class="signin-form-container">
                <h1>SIGN IN</h1>
                <!-- <hr> -->
                <form autocomplete="off" action="./includes/signin.incl.php" method="post">
                        <table class="signin-table">
                            <tbody>
                                <tr>
                                    <td> User Name:</td>
                                    <td> <input type="text" name="un"  maxlength="15" placeholder="User Name">  </td>
                                </tr>
                                <tr>
                                    <td> Password: </td>
                                    <td> <input type="password" maxlength="32" name="pass" placeholder="Password" autocomplete="new-password">  </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td> <input type="submit"  name="signin"  value="SIGN IN"> </td>
                                </tr>
                            </tbody>
                            
                        </table>
                </form>
            </div>
            
        </div>
        <div class="signup-container">
            <div class="signup-form-container">
                <h1>SIGN UP</h1>
                <form autocomplete="off" action="./includes/signup.incl.php" method="post">
                    <table class="signup-table">
                        <tbody>
                            <tr>
                                <td> Full Name:</td>
                                <td> <input type="text" name="fn"  maxlength="40" placeholder="Full Name"> </td>
                            </tr>
                            <tr>
                                <td> User Name:</td>
                                <td> <input autocomplete="off" type="text" name="un"  maxlength="15" placeholder="User Name">  </td>
                            </tr>
                            <tr>
                                <td> Password: </td>
                                <td> <input type="password" maxlength="32" name="pass" placeholder="Password"> </td>
                            </tr>
                            <tr>
                                <td> Grade:</td>
                                <td> <input type="number" min="1" max="12" name="grade" placeholder="grade"> </td>
                            </tr>
                            <tr>
                                <td> Section:</td>
                                <td> <input type="text" name="sec" maxlength="1" placeholder="section"> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="signup" value="SIGN UP"></td>
                            </tr>
                        </tbody>
                        
                    </table>

                </form>
            </div>
        </div>
    </div>
    
    <div style="background:lightblue;display:flex; flex-direction:row; align-items:center; justify-content:center; width:100%">
        <p>Contact  <a href="mailto:yeabsiragetahungy@gmail.com?subject=stjoh_test_website"> <i class="fa fa-envelope"></i> yeabsiragetahungy@gmail.com </a> to report any problem</p>
    </div>

</body>
</html>