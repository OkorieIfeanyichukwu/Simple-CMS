<?php require('../includes/config.php');

login_required();

if(isset($_GET['logout'])){
    logout();

}

if(isset($_GET['delpage'])){

    $delpage=$_GET['delpage'];
    $delpage=mysqli_real_escape_string($conn,$delpage);//because i didnt add the $conn,the delete button didnt work
    $sqlCommand="DELETE FROM pages WHERE pageID='$delpage'";
    $sql=mysqli_query($conn,$sqlCommand) or die(mysqli_error($conn));
    
    $_SESSION['success']='page deleted succcessfully';
    header('location:'.ADMIN_DIR);

    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo SITETITLE ?> </title>
        <meta charset="UTF-8" />

        <!--meta tags are html tags that describes your page content to search engines and website visitors-->
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <!--put the bootstrap.css first before your style.css else,the body background-color wont change from white-->
        <link rel="stylesheet" href="../css/login.css"> 

    </head>

    <body>
        <script language="javascript" type="text/javascript">
            function delpage(id,title){
                if( confirm("Are you sure to delete '"+title+"'")){
                    window.location.href="<?php echo ADMIN_DIR;?>?delpage="+id;
                }
            }
        </script>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <!--navbar-fixed-top makes the navbar to stay even as you scroll.navbar-inverse makes it possible to 
            change the background color of the navbar,we can still use navbar-default -->
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" float="left" data-toggle="collapse" data-target="#Navigation" aria-expanded="false" area-control="navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Administrator Page</a>
                </div>
                <div class="collapse navbar-collapse" id="Navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="<?php echo ADMIN_DIR; ?>">Admin</a></li>
                        <li><a href="<?php echo ADMIN_DIR; ?>addpage.php">Add Page</a></li>
                        <li><a href="<?php echo MAIN_DIR; ?>">View Website</a></li>
                        <li><a href="<?php echo ADMIN_DIR; ?>?logout">Logout</a></li>
                    </ul>
                </div>
            </div>
            
        </nav>
        
        <div class="page-list">
            <h4>PAGE LIST</h4>    

            <table>
                <tr>
                    <th><strong>Title</strong></th>
                    <th><strong>Action</strong></th>
                </tr>

            <?php
                $qCommand="SELECT * FROM pages ORDER BY pageID";
                $sql=mysqli_query($conn,$qCommand) or die(mysqli_error($conn));

                while($row=mysqli_fetch_object($sql)){
                    echo "<tr>";
                        echo "<td>$row->pageTitle</td>";
                        if($row->pageID==1){//home page should not have delete icon
                            echo '<td><button><a href="editpage.php?id='.$row->pageID.'">Edit</a></button></td>';
                        }
                        else{
                            $title='$row->pageTitle';
                            echo '<td><button><a href="editpage.php?id='.$row->pageID.'">Edit</a></button>|<button><a href="javascript:delpage('.$row->pageID.','.$row->pageID.');">Delete</a></button></td>';
                            }
                    echo "</tr>";
                }
            ?>

            </table>

        </div>
        


        <footer>
                <div class="copy">&copy; <?php echo SITETITLE.' '.date('Y'); ?></div>
        </footer>
       <?php echo messages();?>


        <script src="../js/bootstrap.js"  ></script> 
        <!--Without adding the bootstrap javascript file,the navbar button wont toggle.-->
    </body>

</html>

