<html>
<head>
<style type="text/css">

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


</style>
</head>
</html>
<?php
$count=0;
$count1=0;
$con=mysql_connect("localhost","root","",true) or die('Error:'.mysql_error());
mysql_select_db("entries",$con);

$sql="SELECT * FROM `detail`";
$result=mysql_query($sql);



echo '<tr>';
echo '<td width="100%" style="border:none; margin:none; padding:none;" valign="top">';
echo '<div style="border:0; margin:0.2em 0 0.2em 0;">';
echo '<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">';
echo '<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">';
echo '<p id="pan"><span style="color:#005288; font-size:200%;"><b>Latest News About NITT</b></span>';
echo '</p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</td></tr>';

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
echo '<td width="25%" height="26px"> ';
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


while($row = mysql_fetch_assoc($result))

{

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
{ $count++;
}
$query="UPDATE `detail` SET Likes='$count' WHERE NewEntry='$entry2'";
$count=0;
mysql_query($query) or die('Error Updating like');

$sql2="SELECT * FROM `dislikes` WHERE Entry='$entry2'";
$result2=mysql_query($sql2);
while($row = mysql_fetch_assoc($result2))
{ $count1++;
}
$query1="UPDATE `detail` SET Dislikes='$count1' WHERE NewEntry='$entry2'";
$count1=0;
mysql_query($query1) or die('Error Updating dislike');




}

echo '</table>';

mysql_query($sql) or die('Error Updating database');
?>