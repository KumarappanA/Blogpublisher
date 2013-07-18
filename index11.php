<?php
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: index.php');
}
$name=$_SESSION['username'];


?>
<html>
<head>
<style type="text/css">
p {
margin: .4em 0 .5em 0;
line-height: 1.5em;
}
table {
border-collapse: separate;
border-spacing: 2px;
}

a:link {text-decoration:none;}   
a:visited {text-decoration:none;} 
a:hover {text-decoration:underline;}  

</style>
<script type="text/javascript">
var seconds = 5;
function showUser2(s)
{


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
     
    document.getElementById("liked").innerHTML=xmlhttp.responseText;
   
    
    }
  }
confirm ('Are you sure ?');
xmlhttp.open("GET","getdelete.php?q="+s,true);
xmlhttp.send();

}
</script>
</head>
<body>
<tr>
<td width="100%" style="border:none; margin:none; padding:none;" valign="top">
<div style="border:0; margin:0.2em 0 0.2em 0;">
<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">
<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">
<p><span style="color:#005288; font-size:200%;"><b>Welcome to NITTpages.com</b></span>
</p>
</div>
<div style="background:#ffffff; padding:0.2em 0.4em 0.2em 0.4em;">
<p><b>You have successfully logged in as <?php echo $_SESSION['username']; ?> </b> 
</p><p>Now start creating your own page or article !
</p>
</div>
</div>
</td></tr>
<div style="background:#ffffff; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody><tr>
<td align="center" bgcolor="#ddeeff">
<p></p>
<form name="createbox" action="edit.php" method="POST">
<input type="text" name="new" size="24">
<input type="submit" name="create" value="Create new entry">
</form>
<p></p>
</td>
</tr>
</tbody></table></div><br>
<?php
echo '<div id="liked">';
echo '<tr>';
echo '<td width="25%" style="border:none; margin:none; padding:none;" valign="top">';
echo '<div style="border:0; margin:0.2em 0 0.2em 0;">';
echo '<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">';
echo '<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">';
echo '<p><span style="color:#005288; font-size:150%;"><b>Older pages created </b></span>';
echo '</p>';
echo '</div>';
echo '<div style="background:#ffffff; padding:0.2em 0.4em 0.2em 0.4em;">';

$con=mysql_connect("localhost","root","",true) or die('Error:'.mysql_error());
mysql_select_db("entries",$con);
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
 echo '</div>';
mysql_query($sql) or die('Error accessing database');

?>
</div>
</div>
</td></tr>
<img src="/Home.png"> <a href="home.php">Home</a>-
<a href="logout.php">Logout</a>

</body>
</html>
