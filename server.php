<?php
session_start();
include('includes/config.php');

$FirstName = '';
$LastName = '';
$UserName = '';
$Email = '';
$errors = array();

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//LOGIC FOR USER REGISTRATION
if(isset($_POST['reg_user'])){
    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
    $Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);

    if(empty($FirstName)){
        array_push($errors, 'First Name is required.');
    }
    if(empty($LastName)){
        array_push($errors, 'Last Name is required.');
    }
    if(empty($Email)){
        array_push($errors, 'Email is required.');
    }
    if(empty($UserName)){
        array_push($errors, 'User Name is required.');
    }
    if(empty($Password_1)){
        array_push($errors, 'Password is required.');
    }
    if($Password_1 != $Password_2){
        array_push($errors, 'Passwords must match.');
    }

    //BELOW CHECKS FOR EXISTING USERS (USERNAME AND EMAIL)
    $user_check_query = "SELECT * FROM users WHERE UserName = '$UserName' OR Email = '$Email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if($user){
        if($user['UserName'] == $UserName){
            array_push($errors, 'Username already exists');
        }
        if($user['Email'] == $Email){
            array_push($errors, 'Email already exists');
        }
    }

    
    //SUBMITS IF THERE ARE NO ERRORS
    if(count($errors)==0){
        $Password = md5($Password_1); //md5 encrypts the pw
        $query = "INSERT INTO users (FirstName, LastName, UserName, Email, Password) VALUES ('$FirstName', '$LastName', '$UserName', '$Email', '$Password')";

        mysqli_query($db, $query);

        $_SESSION['UserName'] = $UserName;
        $_SESSION['success'] = 'You are now logged in!';

        header('Location:index.php');
    }
}


//LOGIC OF LOGIN
if(isset($_POST['login_user'])){
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);

    if(empty($UserName)){
        array_push($errors, 'Username is required.');
    }
    if(empty($Password)){
        array_push($errors, 'Password is required.');
    }

    if(count($errors) == 0){
        $Password = md5($Password);
        $query = "SELECT * FROM users WHERE UserName = '$UserName' AND Password = '$Password'";

        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1){
            $_SESSION['UserName'] = $UserName;
            $_SESSION['success'] = 'You are now logged in!';

            header('Location:index.php');
        } else {
            array_push($errors, 'Wrong username/password combination.');
        }
    }
}