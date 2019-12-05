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
?>

<?php include ('includes/header.php'); ?>

    <div id='wrapper'>
    
        <div id='banner'>
        
        </div>
        <!--end banner div  -->
        
        <main>
            <h2>Here you will find all your needs in Scanton, Pennsylvania</h2>
            <p>Scranton is a city in northeast Pennsylvania. It’s known for Steamtown National Historic Site, with century-old locomotives set on a former rail yard. In a restored 19th-century mill, the Electric City Trolley Museum has interactive exhibits and vintage trolleys. Nearby are the 4 Scranton Iron Furnaces, relics of an 1800s iron plant. McDade Park is home to Lackawanna Coal Mine, where a mine car descends to tunnels.</p>
            <p>We look forward to helping you find all your home good needs!</p>
                
        </main>
        
        <aside>
            
            <img src="images/scranton.jpg" alt="Scranton Tower">
            <p>Above is the iconic Scranton tower.</p>
        </aside>
        
    </div><!--end wrapper div-->

    <?php include ('includes/footer.php');?>