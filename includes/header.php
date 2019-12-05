<?php include('includes/switchLogic.php') ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $title ?></title>

<link rel="stylesheet" type="text/css" href="css/styles.css">
    
</head>

<body class='<?php echo $pageClass ?>'>
    
        
    <header>
    <div class="box">
        <?php
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
            ?>

            <?php if(isset($_SESSION['UserName'])) :?>
            <p>Welcome <strong><?php echo $_SESSION['UserName'] ?></strong></p>
            <p><a href="index.php?logout='1'">Logout</a></p>
            <?php endif ?>
        <h1>WELCOME TO THE DUNDER DEPARTMENT STORE</h1> 
    </div>
    
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="daily.php">Daily</a></li>
            <li><a href="employees.php">Employees</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="gallery.php">Categories</a></li>
        </ul>
    </nav>