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

include('includes/switchLogic.php');
include('includes/header.php'); 
?>
<div id='wrapper'>
    
        <div id='banner'>
            <!--<img src="images/seasky3.jpg" alt="seattle skyline at night"> -->
        </div>
        <!--end banner div  -->
        
        <main class='<?php //echo $color ?>'>
            <h2>Whisk(e)ys for each Day!</h2>
            <p>Buy your spirits here at The Dunder Department Store. We have provided you with a daily suggestion of what types of whiskey is best to drink.</p>
            <p>Whisky or whiskey is a type of distilled alcoholic beverage made from fermented grain mash. Various grains (which may be malted) are used for different varieties, including barley, corn, rye, and wheat. Whisky is typically aged in wooden casks, generally made of charred white oak.</p>

            <h2><?php echo $whiskey; ?></h2>
            <ul>
                <li><a href="daily.php?today=Sunday">Irish Whiskey (Sun)</a></li>
                <li><a href="daily.php?today=Monday">Scotch Whisky (Mon)</a></li>
                <li><a href="daily.php?today=Tuesday">Japanese Whisky (Tues)</a></li>
                <li><a href="daily.php?today=Wednesday">Canadian Whisky (Wed)</a></li>
                <li><a href="daily.php?today=Thursday">Bourbon Whiskey (Thurs)</a></li>
                <li><a href="daily.php?today=Friday">Tennessee Whiskey (Fri)</a></li>
                <li><a href="daily.php?today=Saturday">Rye Whiskey (Sat)</a></li>
            </ul>
        </main>
        
        <aside>
            <figure>
                <img src="images/<?= $pic; ?>" alt="<?= $alt ?>">
                <figcaption>This is an image of <?php echo $alt ?></figcaption>
                <br>
                <br>
                <p><?php echo $dailydesc ?></p>
            </figure>
        </aside>
        
    </div><!--end wrapper div-->


<?php include('includes/footer.php'); ?>




