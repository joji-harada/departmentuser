<?php
include('server.php');
include('includes/header.php');
?>

<div id='wrapper'>
<main>
    <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <fieldset>
                <label>Username</label>
                    <input type="text" name="UserName" value="<?php echo htmlspecialchars($UserName)?>">
                <label>Password</label>
                    <input type="password" name="Password">

                <?php include('errors.php') ?>

                <br>
                <br>
                <button type="submit" name="login_user">Login</button>
                <button type="button" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'">reset</button>
            </fieldset>
        </form>

        <p>Not a member yet? <a href="register.php">Sign up!</a></p>
</main>
</div>

<?php include('includes/footer.php') ?>