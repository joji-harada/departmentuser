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

$department['Clothing_Department'] = 'cloth_Wide selection of Mens and Womens clothing.';
$department['Gardening_Department'] = 'garde_One stop shop for all your outdoor needs.';
$department['Electronics_Department'] = 'elect_Find your consoles and TV\'s here!';
$department['Home_Department'] = 'homed_Decorate your home so it feels like home.';
$department['Beverage_Department'] = 'bever_Hundreds of flavors, dozens of brands.';
$department['Automobile_Department'] = 'autom_Need a headlight replacement?';
$department['Hygiene_Department'] = 'hygie_Feel good in your own skin with our many hygiene products.';
$department['Packaged_Food_Department'] = 'packa_Get your on-the-go items here!';
$department['Fresh_Food_Department'] = 'fresh_Eat fresh and feel healthy with our local produce.';
?>

<?php include('includes/header.php') ?>
<div id="wrapper">
    <main>
        <h2>Check out our list of departments!</h2>
        <table>
        <?php foreach($department as $fullName => $image) : ?>
            <tr>
                <td>
                    <img src="images/<?php echo substr($image, 0, 5); ?>.jpg" 
                    alt="<?php echo htmlspecialchars($fullName); ?>">
                </td>
                
                <td>
                    <?php echo str_replace('_', ' ', $fullName); ?>
                </td>

                <td>
                    <?php echo substr($image, 6) ?>
                </td>
            </tr>        
        <?php endforeach; ?>
        </table>
    </main>

    <aside>
    
    </aside>
</div>
<?php include('includes/footer.php') ?>