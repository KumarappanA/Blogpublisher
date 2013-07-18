<?php
if(isset($_POST['createaccount']))
header('Location: signup.php');

$entry2=$_GET['var3'];
 $con1=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
 mysql_select_db("entries",$con1);
 $sql="SELECT * FROM `detail` WHERE NewEntry='$entry2'";
$result=mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
 $text=$row['Textarea'];
 echo '' . $row['Textarea'] . '<br><br>';
}
 mysql_query($sql) or die('Error Updating database');

if(isset($_POST['logout']))
{
 header('Location: logout.php');
}
?>

<html>
<head>
<form method="POST" action="edit1.php">
<input type="hidden" name="var" value="<?=$text;?>" />
<input type="hidden" name="var1" value="<?=$entry2;?>" />
<input type="submit" name="continue" value="Edit" /> or
<input type="submit" name="logout" value="Logout" />
</form>
</head>
</html>
