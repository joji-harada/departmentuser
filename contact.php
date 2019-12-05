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
include('includes/form.php');

include('includes/header.php');

?>

<div id="wrapper">
    <main>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label>Name</label> <br>
            <input type="text" name="name" value="<?php if(isset($_POST['name'])){
                            echo htmlspecialchars($_POST['name']);}?>"> <br>
            <span><?php echo strtoupper($nameErr); ?></span>
            <label>Email</label> <br>
            <input type="text" name="email" value="<?php if(isset($_POST['email'])){
                            echo htmlspecialchars($_POST['email']);}?>"> <br>
            <span><?php echo strtoupper($emailErr); ?></span>
            <label>Phone</label> <br>
            <input type="text" name="phone" placeholder="xxx-xxx-xxxx" value="<?php if(isset($_POST['phone'])){
                            echo htmlspecialchars($_POST['phone']);}?>"> <br>
            <span><?php echo strtoupper($phoneErr); ?></span>
            <label>Gender</label> <br>
            <ul>
                <li><input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female') 
                            echo 'checked="checked"'?>>Female</li>
                <li><input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'male') 
                                echo 'checked="checked"'?>>Male</li>
            </ul>
            <span><?php echo strtoupper($genderErr); ?></span>
            <label>Favorite guitars</label> <br>
            <ul>
                <li><input type="checkbox" name="guitars[]" value="strat" <?php if(isset($_POST['guitars']) && in_array('strat', $guitars))
                                echo 'checked="checked"'?>>Stratocastor</li>
                <li><input type="checkbox" name="guitars[]" value="lespaul" <?php if(isset($_POST['guitars']) && in_array('lespaul', $guitars)) 
                                echo 'checked="checked"'?>>Les Paul</li>
                <li><input type="checkbox" name="guitars[]" value="gibson" <?php if(isset($_POST['guitars']) && in_array('gibson', $guitars)) 
                                echo 'checked="checked"'?>>Gibson</li>
                <li><input type="checkbox" name="guitars[]" value="tele" <?php if(isset($_POST['guitars']) && in_array('tele', $guitars)) 
                                echo 'checked="checked"'?>>Telecaster</li>
            </ul>
            <span><?php echo strtoupper($guitarsErr); ?></span>
            <label>Comments</label> <br>
            <textarea name="comments"><?php if(isset($_POST['comments'])) echo $_POST['comments']; ?></textarea> <br>
            <span><?php echo strtoupper($commentsErr); ?></span>
            <label>Privacy</label>
            <input type="radio" name="privacy" value="yes" <?php if(isset($_POST['privacy']) && $_POST['privacy'] == 'yes')
                    echo 'checked = "checked"'; ?>> <br> <br>
            <span><?php echo strtoupper($privacyErr); ?></span>
            <input type="submit" name="submit" value="Send it">
            <button type="button" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'">reset</button>
        </form>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<?php include('includes/footer.php') ?>