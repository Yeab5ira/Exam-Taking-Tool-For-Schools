<?php 
session_start();

if(isset($_POST["signin"])){
    include_once "db.incl.php";

    $username = mysqli_real_escape_string($conn, $_POST['un']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    // empty field check
    if(empty($username) || empty($password)){
        // echo "Please fill in all the input fields."."<a href='".header('Location: ../index.php')."'> Go back </a>";
        echo "Please fill in all the input fields";
        echo "<br> <a href='../index.php'> go back<a/>";
        exit();
    }
    else {
            $sql = "SELECT * FROM students WHERE user_name='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                $row = mysqli_fetch_assoc($result);
                
                $_SESSION['studentid'] = $row['stud_id'];
                $_SESSION['username'] = $row['user_name'];
                $_SESSION['fullname'] = $row['full_name'];
                $_SESSION['grade'] = $row['grade'];
                $_SESSION['section'] = $row['section'];

                header("Location: ../studentDashboard.php");

                exit();
            }else{
                header("Location: ../index.php?signin=error");
            }
    }
}
else {
    header("Location: ../index.php?signin=failed");
    exit();
}

?>