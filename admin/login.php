<?php
    require('../includes/config.php');
if(logged_in()){
    header('location:'.ADMIN_DIR);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title><?php echo SITETITLE ?> </title>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compartible" content="IE=edge" charset="utf-8"/>
        <meta name="viewport" content="width=deivice-width, initial-scale=1.0"/>
        <link type="text/css" ref="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>
        <?php echo Messages(); ?>
        <div class="login-container">
            <section>
                <form method="post" action="">
                    <input type="text" placeholder="USERNAME" name="username" ><br>
                    <input type="password" placeholder="PASSWORD" name="password"><br>
                    <input type="submit" name="submit" id="button" value="login">
                </form>

            </section>

        </div>
        
        <?php if(isset($_POST['submit'])){
            login($_POST['username'],$_POST['password']);
        }
        ?>
        <footer>
                <div class="copy">&copy; <?php echo SITETITLE.' '.date('Y'); ?></div>
        </footer>
    </body>

</html>