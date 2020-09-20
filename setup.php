<?php

//require ('C:\xampp\htdocs\CMS_Light\includes\config.php');
require('includes/config.php');
/*
$sql="CREATE TABLE IF NOT EXISTS `members`(
    `memberID` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL ,
    `password` varchar(32) NOT NULL ,
    PRIMARY KEY (`memberID`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2";

$sql="INSERT INTO members(`memberID`,`username`,`password`) VALUES(1,'admin','12345')";
/*
$sql="CREATE TABLE IF NOT EXISTS `pages`(
    `pageID` int(11) NOT NULL AUTO_INCREMENT,
    `pageTitle` varchar(255) NOT NULL ,
    `isRoot` int(11) NOT NULL DEFAULT '1',
    `pageCont` text,
    PRIMARY KEY (`pageID`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=6";

$sql="INSERT INTO pages(`pageID`,`pageTitle`,`isRoot`,`pageCont`) VALUES(1,'Home','0','<p>Sample Sample content</p>'),
(2,'About','1','<p>Sample Sample content</p>'),(3,'Services','1','<p>Sample Sample content</p>'),(4,'News','1','<p>Sample Sample content</p>'),
(5,'Contact','1','<p>Sample Sample content</p>')
";
*/
if($conn->query($sql)===TRUE){
    echo "table created successfully";
}
else{
    echo "error crfeating table".$conn->error;
}

?>