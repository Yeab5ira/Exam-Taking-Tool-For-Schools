<?php 
include_once "./includes/db.incl.php";
include "./includes/navbar.incl.php";
// session_start();

$stud_id = $_SESSION['studentid'];

if(isset($_GET['submit'])){
   
    $subject = $_SESSION['current_subject'];
    updateResult($subject);
    
    $sql = "UPDATE students SET ".$subject."_stat=1 WHERE stud_id='$stud_id'";
    mysqli_query($conn,$sql);
    header("Location: ./checkResults.incl.php?results=check");
    exit();
    
    
}
elseif(isset($_GET['results'])){
    // $math = 0;
    $math = getResult('math');
    $physics = getResult('physics');
    $biology = getResult('biology');
    $english = getResult('english');
    $chemistry = getResult('chemistry');
    $amharic = getResult('amharic');
    $englishcomp = getResult('englishcomp');
    $englishgram = getResult('englishgram');
    $science = getResult('science');

}
else{
    header("Location: ./studentDashboard.php?finished=false");
    exit();
}

function updateResult($subject){
    global $stud_id, $conn;
    $testResult = checkResult($subject);
    $sql = "UPDATE students SET $subject = '$testResult' WHERE stud_id='$stud_id' ;";

    mysqli_query($conn,$sql);
}
function checkResult($subject){
    global $conn;

    $total = 0;
    $sql = "SELECT * FROM questions WHERE subject = '$subject'";
    
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    $i = 1;
    if($resultCheck>0){
        while ($row=mysqli_fetch_assoc($result)) {
            if($_GET[$i] == $row['answer']){
                $total += 1;
            }
            $i++;
        }
    }

    return $total;

}
function getResult($subject){
    global $stud_id, $conn;
    $subject = strtoupper($subject);
    $sql = "SELECT * FROM students WHERE stud_id='$stud_id'";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    // echo "hello";

    if($resultCheck>0){
        while($row=mysqli_fetch_assoc($result)){
            return $row[$subject];
            // echo  $row[$subject];
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Result</title>
    <link rel="stylesheet" href="./assets/css/results-style.css">
    <link rel="stylesheet" href="./assets/css/nav-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="body-container">
        <h1>STUDENT RESULT </h1>
        <hr>
        <?php global $math, $english, $chemistry, $physics, $biology, $amharic, $englishcomp, $englishgram, $science; 

            echo '<div class="subject-container">';
            if($_SESSION['grade']>7){
                echo '

                    <div class="subject english">
                        <h2>ENGLISH</h2>
                        <hr>
                        <h1>
                            '.$english.'
                        </h1>
                    </div>
                    <div class="subject math">
                        <h2>MATH</h2>
                        <hr>
                        <h1>
                            '.$math.'
                        </h1>
                    </div>
                    <div class="subject biology">
                        <h2>BIOLOGY</h2>
                        <hr>
                        <h1>
                            '.$biology.'
                        </h1>
                    </div>
                    <div class="subject chemistry">
                        <h2>CHEMISTRY</h2>
                        <hr>
                        <h1>
                            '.$chemistry.'
                        </h1>
                    </div>
                    <div class="subject physics">
                        <h2>PHYSICS</h2>
                        <hr>
                        <h1>
                            '.$physics.'
                        </h1>
                    </div>

                ';
            }else{
                echo '
                    <div class="subject math">
                        <h2>AMHARIC</h2>
                        <hr>
                        <h1>
                            '.$amharic.'
                        </h1>
                    </div>
                    <div class="subject math">
                        <h2>MATH</h2>
                        <hr>
                        <h1>
                            '.$math.'
                        </h1>
                    </div>
                    <div class="subject biology">
                        <h2>ENGLISH COMP.</h2>
                        <hr>
                        <h1>
                            '.$englishcomp.'
                        </h1>
                    </div>
                    <div class="subject chemistry">
                        <h2>ENGLISH GRAM.</h2>
                        <hr>
                        <h1>
                            '.$englishgram.'
                        </h1>
                    </div>
                    <div class="subject physics">
                        <h2>SCIENCE</h2>
                        <hr>
                        <h1>
                            '.$science.'
                        </h1>
                    </div>
                ';
            }
        
            
            echo '</div>';
        
        ?>
        
            
        
    </div>
</body>
</html>