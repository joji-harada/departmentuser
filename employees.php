<?php
session_start();
if(!isset($_SESSION['UserName'])){
    $_SESSION['msg'] = 'You must log in first';
    header('Location:login.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location:login.php');
}


include('includes/config.php');

include('includes/header.php');

$sql = 'SELECT * FROM People2';

$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or 
die(myerror(__FILE__,__LINE__, mysqli_connect_error()));

$result = mysqli_query($iConn, $sql) or 
die(myerror(__FILE__,__LINE__, mysqli_connect_error($iConn)));

echo '<div id="wrapper"><br>';
echo '<main class="data">';

echo '<h2><strong>MEET THE DUNDER TEAM</strong></h2>';

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        echo '<ul class="link-style">';
            echo '<li class="large">Click here for more info about <a href="employees-view.php?id=' . $row['PeopleID'].'">' . $row['FirstName'] . '</a></li>';
            echo '<li><b>First Name: </b>'. $row['FirstName'] . '</li>';
            echo '<li><b>Last Name: </b>'. $row['LastName'] . '</li>';
            echo '<li><b>Occupation: </b>'. $row['Occupation'] . '</li>';
            echo '<li><b>DOB: </b>'. $row['BirthDate'] . '</li>';
        echo '</ul>';
    }
} else {
    echo 'Sorry no people exist in this database.';
}
echo '</main><br>';
echo '<aside class="link-style"> <img src="images/theoffice.jpg" alt="the office employees"> <br> <a href="employees-view.php?id=1">Learn about Michael!</a>';
echo '</aside>';
echo '</div>';



@mysqli_free_result($result);
@mysqli_close($iConn);

include('includes/footer.php');