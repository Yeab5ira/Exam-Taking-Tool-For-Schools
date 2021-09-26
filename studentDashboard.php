<?php
// session_start();
include './includes/navbar.incl.php';
include './includes/db.incl.php';

if(!isset($_SESSION['username'])){
    header("Location: ./index.php?signin=notsignedin");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="./assets/css/student-dashboard.css">
    <link rel="stylesheet" href="./assets/css/nav-style.css">
    <script src="https://use.fontawesome.com/9c568687b8.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="body-container">
        <div class="subject-container">
            <h1 style="color:white">CHOOSE SUBJECT</h1>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="get">
                <?php 
                if($_SESSION['grade']>=7){
                echo 
                    '   <input type="submit" name="change" value="ENGLISH">
                        <input type="submit" name="change" value="MATH">
                        <input type="submit" name="change" value="BIOLOGY">
                        <input type="submit" name="change" value="PHYSICS">
                        <input type="submit" name="change" value="CHEMISTRY">
                    ';} 
                else{
                echo 
                    '
                        <input type="submit" name="change" value="AMHARIC">
                        <input type="submit" name="change" value="MATH">
                        <input type="submit" name="change" value="ENGLISHCOMP">
                        <input type="submit" name="change" value="ENGLISHGRAM">
                        <input type="submit" name="change" value="SCIENCE">
                    ';}
                ?>
            </form>
            <form action="./checkResults.incl.php" method="get">
                <input type="submit" value="CHECK RESULTS" name="results">
            </form>
            
        </div>
        <div class="content-container">
            <div class="test-container">
                <div class="school-header">
                    <h2>St. John Baptist De La Salle Catholic School</h2>
                    
                    <h3>3<sup>rd</sup> Quarter <?php 
                        if(isset($_GET['change'])){
                            $subject = $_GET['change'];
                            echo $subject;
                        }
                    ?> Online Test</h3>
                    <hr>
                </div>
                <div id="name-space">
                    <h4> Name: <?php echo $_SESSION['fullname']; ?> </h4>
                    <h4> Grade: <?php echo $_SESSION['grade']; ?> </h4>
                    <h4> Section: <?php echo $_SESSION['section']; ?></h4>
                </div>
                <hr>
                <form autocomplete="off" action="./checkResults.incl.php" method="get">
                    <?php 
                        if(isset($_GET['change'])){
                            $i = 1;
                            $subject = $_GET['change'];
                            $_SESSION['current_subject'] = $subject;
                            $grade = $_SESSION['grade'];
                            $sql = "SELECT * FROM questions WHERE subject='$subject' AND grade='$grade';";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            if($resultCheck>0){
                                
                                while($row=mysqli_fetch_assoc($result)){
                                    echo "
                                        <p>".$i.". ".$row['question']."</p>
                                        <ol type='A'>
                                            <li> <div class='radio-item'> <input id='".$i."a' type='radio' name='$i' value='a'> <label for='".$i."a'>".$row['a']."</label> </div> </li>
                                            <li> <div class='radio-item'> <input id='".$i."b' type='radio' name='$i' value='b'> <label for='".$i."b'>".$row['b']."</label> </div> </li>
                                            <li> <div class='radio-item'> <input id='".$i."c' type='radio' name='$i' value='c'> <label for='".$i."c'>".$row['c']."</label> </div> </li>
                                            <li> <div class='radio-item'> <input id='".$i."d' type='radio' name='$i' value='d'> <label for='".$i."d'>".$row['d']."</label> </div> </li>
                                        </ol>";
                                        $i++;
                                }
                                
                            } else{
                                echo "No questions at the moment <br>";
                            }
                        } 
                    ?>
                    <?php
                        if(isset($_SESSION['current_subject'])){
                            $current_subject = $_SESSION['current_subject'];
                            $stud_id = $_SESSION['studentid'];
                            $sql = "SELECT * FROM students WHERE stud_id='$stud_id' AND ".$current_subject."_stat=0";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            
                            if($resultCheck>0){
                                echo "<input type='submit' name='submit' class='submit-btn' value='SUBMIT' onclick='return confirm(\"Confirm Submition?\")'>";
                            }else{
                                echo "You already took this test";
                            }

                        }
                    ?>
                    
                </form>

                        
            </div>
            

        </div>
        
    </div>
    <div style="background:lightblue;display:flex; flex-direction:row; align-items:center; justify-content:center; width:100%">
            <p>Contact  <a href="mailto:yeabsiragetahungy@gmail.com?subject=stjohn_test_website"> <i class="fa fa-envelope"></i> yeabsiragetahungy@gmail.com </a> to report any problem</p>
    </div>

    <script type="text/javascript" src="./assets/js/functions.js"></script>
    
</body>
</html>