<?php
    require('../includes/config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo SITETITLE ?> </title>
        <meta charset="utf-8"/>
        <meta http-equiv="XU-A-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <link rel="stylesheet" href="css/login.css">
        <script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="../tinymce/init_tinymce.js"></script>
        <script type="text/javascript" src="../js/jquery-3.4.1.js"></script>

    </head>
    <body>
        <div class="container">
           <!-- <p><?php echo messages(); ?></p>-->
            <form method="post" action="">
                <p>Title: <br> <input type="text" name="pageTitle" value="" size="103" ></p>
                <textarea id="pageCont" name="pageCont" col="100" rows="20"></textarea></p>
                <br>
                
                <input type="submit" name="submit" class="button" value="ADD"></p>
            
            </form>

            <?php 
            if(isset($_POST['submit'])){
                $title=$_POST['pageTitle'];
                $content=$_POST['pageCont'];
                $title=mysqli_real_escape_string($conn,$title);
                $content=mysqli_real_escape_string($conn,$content);

                $sql="INSERT INTO pages (pageTitle,pageCont) 
                VALUES ('$title','$content')";
                mysqli_query($conn,$sql) or die(mysqli_error());
                $_SESSION['success']="added page successfully";
                header('location:'.ADMIN_DIR);
                exit();
            }


            ?>
        </div>
        
        <footer>
                <div class="copy">&copy; <?php echo SITETITLE.' '.date('Y'); ?></div>
        </footer>
    </body>
</html>
