 <?php
$id=$_GET['q'];
$entry=$_GET['m'];
 $con1=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
 mysql_select_db("entries",$con1);
$sql2="INSERT INTO `dislikes`(`id`,`Entry`,`rate`) VALUES('NULL','$entry','-1')";
echo 'You have disliked it!';
 mysql_query($sql2) or die('Error Updating database');

?>