<?php 

if(isset($_POST["signup"])){
    include_once "./db.incl.php";

    $fullname = mysqli_real_escape_string($conn, $_POST['fn']);
    $username = mysqli_real_escape_string($conn, $_POST['un']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $section = mysqli_real_escape_string($conn, $_POST['sec']);


    // empty field check
    if(empty($fullname) || empty($username) || empty($password) || empty($grade) || empty($section)){
        // echo "Please fill in all the input fields."."<a href='".header('Location: ../index.php')."'> Go back </a>";
        echo "Please fill in all the input fields";
        echo "<br> <a href='../index.php'> go back<a/>";
    }
    else {
        if(!preg_match("/^[a-zA-Z]*$/",$fullname) || !preg_match("/^[a-zA-Z]*$/",$username) || !preg_match("/^[a-dA-D]*$/",$sec)){
            header("Location: ../index.php?signup=invalid_input");
            exit();
        }
        else {
            $sql = "SELECT * FROM students WHERE user_name='$username'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                header("Location: ../index.php?signup=username_taken");
                exit();
            }
            else {
                $sql = "INSERT INTO students(full_name,user_name,password,grade,section, ENGLISH, MATH, BIOLOGY, CHEMISTRY, PHYSICS, AMHARIC, ENGLISHGRAM, ENGLISHCOMP, SCIENCE, s6, s7, english_stat, math_stat, biology_stat, chemistry_stat, physics_stat, amharic_stat, englishgram_stat, englishcomp_stat, science_stat) VALUES('$fullname','$username','$password','$grade', '$section', 0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);";

                mysqli_query($conn, $sql);
                // $_POST['signin']= "";
                // $_POST['un']= $username;
                // $_POST['pass']= $password;
                
                // header("Location: ./signin.incl.php?signin=successfull&un=".$username."&pass=".$password."");
                header("Location: ../index.php?signup=success");

                exit();
            }
        }
    }
}
else {
    header("Location: ../index.php?signup=failed");
    exit();
}

?>