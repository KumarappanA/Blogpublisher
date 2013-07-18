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

if(isset($_REQUEST['like']) && $_REQUEST['like'] != '0')
{
 $sql1="INSERT INTO `likes`(`id`,`Entry`,`rate`) VALUES('NULL','$entry1','+1')";
 mysql_query($sql1) or die('Error Updating database');
 }
if(isset($_REQUEST['dislike']) && $_REQUEST['dislike'] != '0')
  {
   $sql2="INSERT INTO `dislikes`(`id`,`Entry`,`rate`) VALUES('NULL','$entry1','-1')";
   mysql_query($sql2) or die('Error Updating database');
}


if(isset($_POST['login']))
header('Location: index.php');
?>
<html>
<head>
<style type="text/css">



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

<script type="text/javascript">

function post()
{

var xmlhttp;
var Name = "<?=$_POST['commentname']?>";
var topic="<?=$entry1?>";
var x=document.forms["myForm"]["comments"].value;
if (x=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getcomments.php?q="+Name+ "&m="+topic,true);
xmlhttp.send();
}

function showUser()
{

var Name = "<?=$_POST['commentname']?>";
var topic="<?=$entry1?>";
var comment1="<?=$_POST['comments']?>";
var mail="<?=$_POST['Email'];?>";

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","getpage.php?q="+Name+ "&m="+topic+ "&e="+mail+ "&t="+comment1,true);
xmlhttp.send();
}
</script>
</head>

<body onload="post()">
<form method="POST">
<p>
<input name="like" type="image" src="/like.png" id="submit" value="like">
<input name="dislike" type="image" src="/dislike.png" id="submit" value="dislike">
</p>
</form>
<div id="txtHint"></div>
<div id="respond_box">
<h id="respond">Post a comment</h>
<form name="myForm" onsubmit="showUser()" method="post" id="commentform">
<p>
<input type="text" name="commentname" value="" size="22" tabindex="1"> 
<label for="author">Name (required)
</label>
</p>
<p><input type="text" name="Email" class="comm_input_text" id="email" value="" size="22" tabindex="2"> 
<label for="email">Mail (will not be published) (required)
</label>
</p>
<p><input type="text" name="url" class="comm_input_text" id="url" value="" size="22" tabindex="3"> 
<label for="url">Website
</label>
</p>
<p><textarea name="comments" id="comments" cols="40" rows="6" tabindex="4" onchange="showUser()" ></textarea></p>
<p><input type="submit" name="comment" value="Submit"/>
<input name="postcomment" type="image" src="http://joseairosa.com/wp-content/themes/BlueGrey/images/comm_sub.gif" value="Submit Comment" onclick="showUser()">
</p>
</p>
</form>
</div>


<div>Do you want to create an account?</div>
<form method="POST" action="">
<div>An account will help you to create articles/pages , get involved in discussions, and be a part of the community.</div>
<input type='submit' name='createaccount' value='Create an account' />
<span>or</span>
<input type="submit" name="login" value="Log In" />
</form>
</body>
</html>