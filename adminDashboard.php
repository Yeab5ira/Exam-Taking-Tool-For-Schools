<?php
// session_start();
// if(!isset($_GET['admin'])){
//     header("Location: ./index.php");
// }
// echo "Welcome ".$_SESSION['username']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./assets/css/admin-dashboard.css" >
</head>
<body>
    <div class="body-container">
        <div class="form-container">
            <form action="./includes/addQuestions.incl.php" id="questionform" method="get">
                <!-- <input autocomplete="on" type="text" name="subject" placeholder="subject"> -->
                <select name="subject" id="subject">
                    <option value="math">math</option>
                    <option value="amharic">amharic</option>
                    <option value="englishcomp">english comp</option>
                    <option value="englishgram">english gram</option>
                    <option value="social">general science</option>
                    <option value="english">english</option>
                    <option value="chemistry">chemistry</option>
                    <option value="physics">physics</option>
                    <option value="biology">biology</option>
                </select>
                <input autocomplete="on" type="text" name="grade" placeholder="grade">
                <textarea cols="50" rows="10" form="questionform" type="text" name="question" placeholder="question"> </textarea>
                <input type="text" name="a" placeholder="A">
                <input type="text" name="b" placeholder="B">
                <input type="text" name="c" placeholder="C">
                <input type="text" name="d" placeholder="D">
                <input type="text" name="answer" placeholder="Answer">
                <input type="submit" value="submit" name="add">
            </form>
        </div>
        <!-- <?php 
            include_once './includes/addQuestions.incl.php';
            $sql = "SELECT * FROM questions";

            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck >0){
                while ($row=mysqli_fetch_assoc($result)) {
                    echo $row['subject'];
                }
                
            }
        ?> -->
    </div>
</body>
</html>