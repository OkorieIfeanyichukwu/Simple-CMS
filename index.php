<?php
require ('includes/config.php');

//$pages='<li><a href="pages/about.php?p=$row->pageID; ">'.$row->pageTitle.'</a></li>';
 //                      echo $pages;
?>
<!DOCTYPE html>
<html ><!--xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"-->
 <!--the xmlns is used to avoid conflict of two different attributes sharing the same name. it is optional to add it
 because it is addded to the html tag even if you do not include it. It is requried in XHTML and invalid in html 4.1,
 it is optional in HTML5. Generally,it is used to differentiate namespace in xml documents -->
    <head>
        <title><?php echo SITETITLE ?> </title>
        <meta charset="UTF-8" />
        <!--meta tags are html tags that describes your page content to search engines and website visitors-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta http-equiv="x-dns-prefetch-control" content="on">-->
        <link rel="stylesheet" href="css/bootstrap.css"> 
        <!--my body background-color refused to change from white even after i changed it in css,until i aranged the link tag
        putting the bootstrap first before the style.css-->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
            <label for="nav-toggle" class="lab"><span></span></label>
            <input type="checkbox" id="nav-toggle" class="nav" >
            <nav class="navbar">
                <ul class="list-group">
                    <li><a href="<?php echo MAIN_DIR;?>">Home</a></li>
                    <?php
                        $sqlCommand="SELECT * FROM pages WHERE isRoot='1' ORDER BY pageID";
                        $sql=mysqli_query($conn,$sqlCommand) or die(mysqli_error($conn));
                        while($row=mysqli_fetch_object($sql)){
                            $pageTitle=$row->pageTitle;
                            echo '<li><a href=" ?p='.$row->pageID.'">'.$pageTitle.'</a></li>';
                        
                        }
                    ?>
                </ul>
            </nav>
        
        
        <div class="container">
            
                
            <?php
               ////if no page is clicked on,load home page default to it of 1
                if(!isset($_GET['p'])){
                    $qCommand="SELECT * FROM pages WHERE pageID='1'";
                    $q=mysqli_query($conn,$qCommand) or die(mysqli_error($conn).'no connection secured');
                }
                else{
                    $id=$_GET['p'];
                    $id=mysqli_real_escape_string($conn,$id);
                    $qCommand="SELECT * FROM pages WHERE pageID='$id'";
                    $q=mysqli_query($conn,$qCommand) or die(mysqli_error($conn));//error:calling undefined variable occurs when you use mysql instead of mysqli,take note.

                
                }
                $r=mysqli_fetch_object($q);

                echo $r->pageCont;
                
            ?>
        </div>
        <footer>
                <div class="copy">&copy; <?php echo SITETITLE.' '.date('Y'); ?></div>
        </footer>
    </body>

</html>

