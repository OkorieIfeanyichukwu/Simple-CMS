<?php
    require('../includes/config.php');
    if(!isset($_GET['id'])|| $_GET['id']==''){
        header('location:'.ADMIN_DIR);
    }
    if(isset($_POST['submit'])){
        $title=$_POST['pageTitle'];
        $content=$_POST['pageCont'];
        $pageID=$_POST['pageID'];
        $title=mysqli_real_escape_string($conn,$title);
        $content=mysqli_real_escape_string($conn,$content);

        $sql="UPDATE pages SET pageTitle='$title',pageCont= '$content' WHERE pageID='$pageID'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $_SESSION['success']= "page updated successfully";
        header('location:'.ADMIN_DIR);
        exit();
    }
   
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
    </head>
    <body>
        <?php 
            if(isset($_GET['id'])){

                $id=$_GET['id'];
                $id=mysqli_real_escape_string($conn,$id);
                $qCommand="SELECT * FROM pages WHERE pageID='$id'";
                //note:using double quotation on the pageID as given below gave errors and did not recognize $row as object or array either
                //$qCommand='SELECT * FROM pages WHERE pageID="$id"';
                $sql=mysqli_query($conn,$qCommand) or die(mysqli_error($conn));
            
                $row=mysqli_fetch_object($sql);

                echo '  <form method="post" action="">

                            <input type="hidden" name="pageID" value="'.$row->pageID.'"/>
                            <p>Title: <br> <input type="text" name="pageTitle" value="'.$row->pageTitle.'" size="103" /></p>
                            <p>Content<br>  <textarea id="pageCont" name="pageCont" col="100" rows="20">'.$row->pageCont.'</textarea></p>
                            <br>
                            <script>
                                tinyMCE.init({
                                    selector:"#pageCont",
                    
                                });
                            </script>
                            <input type="submit" name="submit" class="button" value="Submit"></p>
                    </form>';
            }
        ?>

        <footer>
                <div class="copy">&copy; <?php echo SITETITLE.' '.date('Y'); ?></div>
        </footer>
    </body>
</html>
