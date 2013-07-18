 <?php
$id=$_GET['q'];
$entry=$_GET['m'];
 $con1=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
 mysql_select_db("entries",$con1);
 $sql1="INSERT INTO `likes`(`id`,`Entry`,`rate`) VALUES('NULL','$entry','+1')";
echo 'You have liked it!';
 mysql_query($sql1) or die('Error Updating database');

?>