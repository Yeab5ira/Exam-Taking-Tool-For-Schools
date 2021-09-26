<?php 
include_once "db.incl.php";
if(isset($_GET['add'])){

    $subject = $_GET['subject'];
    $grade = $_GET['grade'];
    // $question = mysqli_real_escape_string($conn,$_GET['question']);
    $question = $_GET['question'];
    $a = mysqli_real_escape_string($conn,$_GET['a']);
    $b = mysqli_real_escape_string($conn,$_GET['b']);
    $c = mysqli_real_escape_string($conn,$_GET['c']);
    $d = mysqli_real_escape_string($conn,$_GET['d']);
    $answer = mysqli_real_escape_string($conn,$_GET['answer']);

    if(empty($subject) || empty($grade) || empty($question) || empty($a) || empty($b) || empty($c) || empty($d)){
        echo "Please fill in all the input fields";
        echo "<br> <a href='../adminDashboard.php'> go back<a/>";
        exit();
    }else{
        $sql = "INSERT INTO questions(subject, grade, question, a, b, c, d,answer) VALUES('$subject', '$grade' , '$question', '$a', '$b', '$c', '$d','$answer')";

        mysqli_query($conn, $sql);
        
        header("Location: ../adminDashboard.php?added=successfully");
        exit();
    }
}
else{
    header("Location ./adminDashboard.php?admin=false");
}


?>