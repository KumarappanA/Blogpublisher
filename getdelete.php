<?php
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: index.php');
}
$name=$_SESSION['username'];
$id=$_GET['q'];
$con=mysql_connect("localhost","root","",true) or die('Error:'.mysql_error());
mysql_select_db("entries",$con);
$sql1="DELETE FROM `detail` WHERE id='$id'";
mysql_query($sql1) or die('Error deleting database');

echo '<tr>';
echo '<td width="25%" style="border:none; margin:none; padding:none;" valign="top">';
echo '<div style="border:0; margin:0.2em 0 0.2em 0;">';
echo '<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">';
echo '<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">';
echo '<p><span style="color:#005288; font-size:150%;"><b>Older pages created </b></span>';
echo '</p>';
echo '</div>';
echo '<div style="background:#ffffff; padding:0.2em 0.4em 0.2em 0.4em;">';

$sql="SELECT * FROM `detail` WHERE Creator='$name'";
$result= mysql_query($sql);

while($row= mysql_fetch_assoc($result))
{
 
 echo '<form name="formmine" method="POST" action="">';
 
 echo '<pre>';
 
 echo '<p style="font-family:Trebuchet MS;">';
 
 echo '<a href="page3.php'.'?var3=' .$row['NewEntry'].'"><span style="color:green;">' .$row['NewEntry']. '</span></a><br>';                                                                                                                                                           
 echo '<input type="button" name="delete" value="delete" onclick="showUser2('. $row['id'] .')">';
 
 echo '</p>';

 echo '</pre>';
 echo '</form>';

}

mysql_query($sql) or die('Error accessing database');
echo '</div>';
echo '</div>';
echo '</td></tr>';
echo '<img src="/Home.png"> <a href="home.php">Home</a>-';
echo '<a href="logout.php">Logout</a>';


?>