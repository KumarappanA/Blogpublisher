<?php

if(isset($_POST['createaccount']))
header('Location: signup.php');
if(isset($_POST['login']))
header('Location: index.php');


$count=0;
$count1=0;
$count2=0;
$search1=mysql_real_escape_string($_POST['title']);
$flag=0;

 $con1=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
    mysql_select_db("entries",$con1);

  $sql="SELECT * FROM `detail`";
  $result=mysql_query($sql);

echo '<tr>';
echo '<td width="100%" style="border:none; margin:none; padding:none;" valign="top">';
echo '<div style="border:0; margin:0.2em 0 0.2em 0;">';
echo '<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">';
echo '<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">';
echo '<p id="pan"><span style="color:#005288; font-size:200%;"><b>Search results</b></span>';
echo '</p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</td></tr>';

      
while($row = mysql_fetch_assoc($result))
 {
  if(strstr($search1,$row['NewEntry'])==0)   
    { 
$flag=1;
 

echo '<table width="100%" >';

echo '<tr bgcolor="#F5EFEF">';
echo '<td width="30%"> ';
echo '<div align="center">';
echo '<p><span style="color:black;"><b>News</b></span></p>';
echo '<p>';

echo '</p>';
echo '</div>';
echo '</td>';
echo '<td width="30%">';
echo '<div align="center">';
echo '<p><span style="color:black;"><b>Published by</b></span></p>';
echo '</div>';
echo '</td>';
echo '<td width="25%" height="30px"> ';
echo '<div align="center">';
echo '<p><span style="color:black;"><b>Published on</b></span></p>';
echo '</div>';
echo '</td>';
echo '<td width="15%"> ';
echo '<div align="center">';
echo '<p><span style="color:black;"><b>Ratings</b></span></p>';
echo '</div>';
echo '</td>';

echo '</tr>';


echo '<div class="commentmetadata_text">';
echo '<tr>';
echo '<td>';
echo '<p align="center"><a href="page2.php'.'?var2=' .$row['NewEntry'].'"><span style="color:#474848;"><b>' . $row['NewEntry'] . '</b></span></a>' ;
echo '</p>';
echo '</td>';
echo '<td>';
echo '<p align="center"><span style="color:#474848;"><b>' . $row['Creator'] . '</b></span>' ;
echo '</p>';
echo '</td>';
echo '<td>';
echo '<p align="center"><span style="color:#474848;"><b>' . $row['Created on'] . '</b></span>' ;
echo '</p>';
echo '</td>';
echo '<td>';
echo '<p align="center"><span style="color:#474848;"><b>' . $row['Likes'] . ' like(s) , ' . $row['Dislikes'] . ' dislike(s).</b></span>' ;
echo '</p>';
echo '</td>';
echo '</tr>';
echo '</div>';

$entry2=$row['NewEntry'];
$sql1="SELECT * FROM `likes` WHERE Entry='$entry2'";
$result1=mysql_query($sql1);
while($row = mysql_fetch_assoc($result1))
$count++;

$query="UPDATE `detail` SET Likes='$count' WHERE NewEntry='$entry2'";
$count=0;
mysql_query($query) or die('Error Updating like');

$sql2="SELECT * FROM `dislikes` WHERE Entry='$entry2'";
$result2=mysql_query($sql2);

while($row = mysql_fetch_assoc($result2))
$count1++;

$query1="UPDATE `detail` SET Dislikes='$count1' WHERE NewEntry='$entry2'";
$count1=0;
mysql_query($query1) or die('Error Updating dislike');
echo '</table>';
echo '<div class="commentmetadata_end">';
echo '</div>';
}
}
if($flag==0)
{
echo 'The requested page or topic was not found';
return false;
}



mysql_query($sql) or die('Error Updating database');
?>
<html>
<head>
<style type="text/css">


.commentmetadata 
{
 margin: 0;
 display: block;
 padding: 10px 0px 10px 35px;
 font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
 font-size: 14px;
 text-transform: capitalize;
 font-weight: bold;
 background-color: #F5EFEF;
}

.commentmetadata_text 
{
 padding: 0px 20px 0px 20px;
}

.commentmetadata_end 
{
 text-align: right;
 color: #1C2C43;
 font-weight: bold;
 font-size: 11px;
 border-top: 1px solid #DED7B0;
 margin: 10px;
 padding-top: 10px;
 font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
}


table {
border-collapse: separate;
border-spacing: 2px;
}
#pan{
margin: .4em 0 .5em 0;
line-height: 1.5em;
}
#un{
width="300px";
}
a:link {text-decoration:none;}   
a:visited {text-decoration:none;} 
a:hover {text-decoration:underline;}  

</style>
</head>
</html>