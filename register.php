<?php
include('server.php');
include('includes/header.php');
?>

<div id='wrapper'>
<main>
<h2>Register</h2>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <fieldset>
        <label>First Name</label>
            <input type="text" name="FirstName" value="<?php echo htmlspecialchars($_POST['FirstName'])?>">
        <label>Last Name</label>
            <input type="text" name="LastName" value="<?php echo htmlspecialchars($_POST['LastName'])?>">
        <label>User Name</label>
            <input type="text" name="UserName" value="<?php echo htmlspecialchars($_POST['UserName'])?>">
        <label>Email</label>
            <input type="email" name="Email" value="<?php echo htmlspecialchars($_POST['Email'])?>">
        <label>Password</label>
            <input type="password" name="Password_1">
        <label>Confirm Password</label>
            <input type="password" name="Password_2">
        <br>
        <?php include('errors.php') ?>
        <br>
        <button type="submit" class="button" name="reg_user">Register</button>

    </fieldset>
</form>

<p class="center italic">Already a member? <a href="login.php">Sign in</a></p>
</main>
</div>

<?php include('includes/footer.php') ?>