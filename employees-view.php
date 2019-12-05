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

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
} else {
    header('Location:people.php');
}

$sql = 'SELECT * FROM People2 WHERE PeopleID = ' .$id .'';

$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($iConn, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $FirstName = stripslashes($row['FirstName']);
        $LastName = stripslashes($row['LastName']);
        $Occupation = stripslashes($row['Occupation']);
        $DOB = stripslashes($row['BirthDate']);
        $Description = stripslashes($row['Description']);
        $Feedback = '';
    }
} else {
    $Feedback = 'Hey, this person does not exist';
}

//switch for images
switch($id){
    case 1:
        $emimg = 'michael.jpg';
        $emalt = 'Michael Scott';
    break;
    case 2:
        $emimg = 'jim.jpg';
        $emalt = 'Jim Halpert';
    break;
    case 3:
        $emimg = 'pam.jpg';
        $emalt = 'Pam Beesly';
    break;
    case 4:
        $emimg = 'oscar.jpg';
        $emalt = 'Oscar Martinez';
    break;
    case 5:
        $emimg = 'dwight.jpg';
        $emalt = 'Dwight Schrute';
    break;
    case 6:
        $emimg = 'angela.jpg';
        $emalt = 'Angela Martin';
    break;
    case 7:
        $emimg = 'creed.jpg';
        $emalt = 'Creed Bratton';
    break;
    case 8:
        $emimg = 'phyllis.jpg';
        $emalt = 'Phyllis Vance';
    break;
    case 9:
        $emimg = 'stanley.jpg';
        $emalt = 'Stanley Hudson';
    break;
    case 10:
        $emimg = 'darryl.jpg';
        $emalt = 'Darryl Philbin';
    break;
    default:
        $emimg = '';
        $emalt = '';
}

include('includes/header.php');
?>
<div id="wrapper">
<main>
    <h2><?php echo $FirstName ?></h2>
    <ul>
        <li><b>First Name:</b> <?php echo $FirstName?></li>
        <li><b>Last Name:</b> <?php echo $LastName?></li>
        <li><b>Occupation:</b> <?php echo $Occupation?></li>
        <li><b>DOB:</b> <?php echo $DOB?></li>
        <li><b>Description:</b> <?php echo $Description?></li>
    </ul>
</main>
<aside>
    <img src="images/<?php echo $emimg ?>" alt="<?php echo $emalt ?>">
    <p><a href="employees.php">Go back to list of employees</a></p>
</aside>
</div>
<?php
@mysqli_free_result($result);
@mysqli_close($iConn);

include('includes/footer.php');

?>