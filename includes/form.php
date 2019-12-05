<?php

$name = $email = $gender = $comments = $guitars = $phone = $privacy = '';
$nameErr = $emailErr = $genderErr = $commentsErr = $guitarsErr = $phoneErr = $privacyErr = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST['name'])){
        $nameErr = 'Please fill out your name.<br>';
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['email'])){
        $emailErr = 'Please fill out your email.<br>';
    } else {
        $email = $_POST['email'];
    }

    if(empty($_POST['gender'])){
        $genderErr = 'Please check your gender.<br>';
    } else {
        $gender = $_POST['gender'];
    }
    
    if(empty($_POST['privacy'])){
        $privacyErr = 'Please check privacy.<br>';
    } else {
        $privacy = $_POST['privacy'];
    }

    if(empty($_POST['guitars'])){
        $guitarsErr = 'Please select your guitar.<br>';
    } else {
        $guitars = $_POST['guitars'];
    }

    if(empty($_POST['comments'])){
        $commentsErr = 'Please type some comments.<br>';
    } else {
        $comments = $_POST['comments'];
    }

    if(empty($_POST['phone'])) {
            $phoneErr = 'Your phone number please!<br>';
    } elseif(array_key_exists('phone', $_POST)) {
        if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone'])){
            $phoneErr = 'Invalid format!<br>';
        } else {
            $phone = $_POST['phone'];
        }
    }

    if(isset($_POST['name'],
    $_POST['email'],
    $_POST['gender'],
    $_POST['comments'],
    $_POST['privacy'],
    $_POST['guitars'])){
        $male = 'unchecked';
        $female = 'unchecked';

        if($gender == 'male'){
            $male = 'checked';
        } elseif($gender == 'female'){
            $female = 'checked';
        }

        function myGuitars(){
            $myReturn = '';
            if(!empty($_POST['guitars'])){
                $myReturn = implode(",", $_POST['guitars']);
            }
            return $myReturn;
        }

        $to = 'georgealbertallison@gmail.com';
        $subject = 'Test Email' . date("m/d/y");
        $body = 'Thank you ' . $name . ' for submitting the form.' . PHP_EOL . ''
        .'Your email: ' . $email . ' and your gender: ' . $gender . '.' . PHP_EOL . ''
        .'Your phone number: ' . $phone . '' . PHP_EOL . ''
        .'Your comments: ' . $comments . '.' . PHP_EOL . ''
        .'Your guitar(s): ' . myGuitars() . '.';
        $headers = array(
            'From' => 'no-reply@jojiwebdesigns.com',
            'Reply-to' => '' . $email . ''
        );

        mail($to, $subject, $body, $headers);
        header('Location: thx.php');
        
    }
}