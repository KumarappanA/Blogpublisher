<?php
if(isset($_POST['createaccount']))
header('Location: signup.php');


$entry1=$_GET['var2'];
 $con1=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
 mysql_select_db("entries",$con1);
 $sql="SELECT * FROM `detail` WHERE NewEntry='$entry1'";
$result=mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
 echo '' . $row['Textarea'] . '<br><br>';
}
 mysql_query($sql) or die('Error Updating database');


if(isset($_REQUEST['postcomment']) && $_REQUEST['postcomment'] != '0') 
{
 
 $Name=mysql_real_escape_string($_POST['commentname']);
 $email=mysql_real_escape_string($_POST['Email']);
 $comment=mysql_real_escape_string($_POST['comments']);
 $d=date('r');
 if($Name==NULL || $Name=="")
  {
    echo "Please enter a name to proceed further !";
    print('<p>Press back to continue.</p>');
    return false;
   }
  if($email==null || $email=="")
{
 echo "Email field has to be filled !";
  print('<p>Press back and complete the form.</p>');
 return false;
}

$regexp = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
if (!preg_match($regexp,$email)) 
{
 echo "Error : Email address is not valid !";
 print('<p>Press back and complete the form.</p>');
 return false;
}
if($comment==NULL || $comment=="")
  {
    echo "Please write some comment to proceed further !";
    print('<p>Press back to continue.</p>');
    return false;
   }
 $query="INSERT INTO `comments` (`id`,`Topic`,`Name`,`Email`,`Comments`,`date`) VALUES('NULL','$entry1','$Name','$email','$comment','$d')";
 mysql_query($query) or die('Error Updating database');
}


if(isset($_POST['login']))
header('Location: index.php');
?>
<html>
<head>
<script type="text/javascript">
function showUser()
{

var topic="<?=$entry1?>"; 
var x=document.forms["formmine"]["like"].value;

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
xmlhttp.open("GET","getlikes.php?q="+x+ "&m="+topic,true);
xmlhttp.send();
}

function showUser1()
{

var topic="<?=$entry1?>"; 
var y=document.forms["formmine"]["dislike"].value;

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
xmlhttp.open("GET","getdislikes.php?q="+y+ "&m="+topic,true);
xmlhttp.send();
}
</script>
<style type="text/css">

h2#comment_title
{
 font-size: 24px;
 color: #0072BC;
 margin-left: 42px;
 font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
}

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

#comments_template {
background: url(C:/xampp/htdocs/comments_template.gif) repeat-x;
padding-top: 20px;
width: 560px;
clear: both;
}

h#respond {
font-size: 21px;
color: black;
margin-bottom: 30px;
margin-left: 25px;
padding-top: 20px;
font-weight: normal;
font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
}

#commentform {
margin-left: 55px;
color: #7C7C7C;
width: 80%;
font-family: Verdana,Arial,Helvetica,sans-serif;
font-size:11px;
}


</style>

</head>

<body>
<div id="liked"></div>
<form name="formmine" method="POST" action="">
<p>
<input name="like" type="button" src="/like.png" id="submit" value="like" onclick="showUser()">

<input name="dislike" type="button" id="submit" value="dislike" onclick="showUser1()">
</p>
</form>
<div id="txtHint">
<?php
$flag=0;
$con=mysql_connect("localhost","root","") or die('Error:'.mysql_error());

mysql_select_db("entries", $con);

$sql="SELECT * FROM `comments` WHERE Topic='$entry1'";
$d=date('d-m-y|r');
$result=mysql_query($sql);

echo '<div id="comments_template">';
echo '<h2 id="comment_title">Comments:</h2>'; 

while($row=mysql_fetch_array($result))
  {
  

  
  echo '<div class="commentmetadata">';
  echo '<img src="/comment_avatar.png">  <span style="font-size:18px;">'. $row['Name'] .'</span> says...</div>';
  echo '<div class="commentmetadata_text">';  
  echo '<form method="POST" action="">';
  echo '<pre>';
  echo '<p style="font-family:Trebuchet MS;">';
  echo ''. $row['Comments'] .'</p>                              
<input type="image" name="delete" src="/b_drop.png" value="delete">';
  echo '</pre>';
  echo '</div>';
  echo '<div class="commentmetadata_end">Posted on '. $row['date'] .'<span></span></div>';
 
  if(isset($_POST['delete']))
{ 
$flag=1;
$del=$row['Name'];
$del1=$row['id'];


}
echo '</form>';
}

echo '</div>';
if($flag==1)
{
$sql1="DELETE FROM `comments` WHERE id='$del1' && Name='$del'";
mysql_query($sql1) or die('Error deleting database');
}


mysql_query($sql) or die('Error Updating database');
mysql_close($con);

?>
</div>
<div id="respond_box">
<h id="respond">Post a comment</h>
<form name="myForm" action="" method="POST" id="commentform">
<p>
<input type="text" name="commentname" class="comm_input_text" id="author" value="" size="22"> 
<label for="author">Name (required)
</label>
</p>
<p><input type="text" name="Email" class="comm_input_text" id="email" value="" size="22"> 
<label for="email">Mail (will not be published) (required)
</label>
</p>
<p><input type="text" name="url" class="comm_input_text" id="url" value="" size="22" > 
<label for="url">Website
</label>
</p>
<p><textarea name="comments" id="comments" cols="40" rows="6"></textarea></p>
<p><input name="postcomment" type="submit" id="submit" value="Submit Comment">
</p>
</p>
</form>
</div>



</body>
</html>