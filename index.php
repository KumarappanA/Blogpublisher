<?php

  if(isset($_POST['SignUp']))
    header('Location: signup.php');

   session_start();

   if (isset($_SESSION['username'])) 
 {
   header('Location: index11.php');
  }

else
{

  
if(isset($_POST['Login']))
{
 function CheckLoginInDB($username,$password)
{   
    $con=mysql_connect("localhost","root","",true) or die('Error:'.mysql_error());
    mysql_select_db("test",$con);
    $pwdmd5 = md5($password);
    $qry = "Select * FROM details WHERE Name='$username' && Password='$pwdmd5'";
    $result = mysql_query($qry,$con);
    if(!$result || mysql_num_rows($result) <= 0)
    {   echo "<script>alert('Login error ! Username and Password entered does not match.')</script>";
        return false;
    }
    else
   {
    session_start();
    $_SESSION['username'] = mysql_real_escape_string($_POST['username']);
    header('Location: index11.php');
    return true;
   }
}

  if(empty($_POST['username']))
    {
        echo "<script>alert('UserName is empty!')</script>";
        return false;
    }
    if(empty($_POST['password']))
    {
        echo "<script>alert('Password is empty!')</script>";
        return false;
    }
  
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    if(!CheckLoginInDB($username,$password))
  {  
    return false;
  }
  
else 
   {
     session_start();
     if (isset($_SESSION['username'])) 
      header('Location: index11.php');
    
   }
 }
}

?>
<html>
<head>
<style type="text/css">

p {
margin: .4em 0 .5em 0;
line-height: 1.5em;
}
</style>
</head>

<body>
<table cellspacing="0" cellpadding="0" width="100%">
<tbody><tr>
<td width="100%" style="border:none; margin:none; padding:none;" valign="top">
<div style="border:0; margin:0.2em 0 0.2em 0;">
<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">
<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">
<p><span style="color:#005288; font-size:200%;"><b>Welcome to NITTfeeds.com</b></span>
</p>
</div>
<div style="background:#ffffff; padding:0.2em 0.4em 0.2em 0.4em;">
<p><b>Create your own NITTpages online !</b> 
</p><p>NITTfeeds.com allows you to open and manage a NITT page where you can feed in the news about NITT.
</p>
</div>
</div>
<div style="background:#ffffff; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;"><table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody><tr>
<td align="center" bgcolor="#ddeeff">
<p></p><form name="searchbox" action="search1.php" method="POST">
	
<p></p><p>	<input name="title" type="text" size="24">
         
	<input type="submit" name="search" value="Search article or page">
</p></form>
<p></p>
</td>
</tr>
</tbody></table></div>
<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">
<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">
<p><span style="font-size:150%;"><b>NIT Trichy</b></span>
</p>
</div>
<div style="background:#ffffff; padding:0.2em 0.4em 0.2em 0.4em;">
<p><span style="font-size:120%;"><a href="row.php" title="Latest News about NITT">Latest News</a></span>
</p>

<td width="16em" style="border: none; margin:none; padding:none;" valign="top">

<div style="float:right; background:#f9f9f9; margin-left:5px; margin-bottom:3px; padding:0px; border:1px solid #aaaaaa; width:16em;">
<div style="font-size:105%; line-height:120%; padding:0.4em; background-color:#ddeeff; border-bottom:1px solid #aaaaaa;"><b>Supporting sites </b>
</div>
<div style="background:#ffffff; padding:0.4em; font-size: 95%;">
<ul><li> <a href="http://www.NITT.edu/" class="external text" title="http://www.NITT.edu/">NITT Website</a>
</li><li><a href="http://delta.nitt.edu/" class="external text" title="http://delta.nitt.edu/">Delta Force</a>
</li><li> <a href="https://www.facebook.com/groups/nittcse/" title="NITT facebook">NITT facebook</a>
</li><li> <a href="mailto:kumarappan.ar@gmail.com" class="external text" title="mailto:kumarappan.ar@gmail.com">Contact Us</a>
</li></ul>
</div>
</div>

</td></tr></tbody></table>
<form id='login' action='' method='post' accept-charset='UTF-8'>
<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;"font-family:Arial;"">
<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">
<p><span style="font-size:150%;"><b>LOGIN</b></span>
</p>
</div>
<div style="background:#ffffff; padding:0.2em 0.4em 0.2em 0.4em;">
<pre><p style="font-family:Arial;">
<label for='username' >UserName:</label>    <input type='text' name='username' id='username'  maxlength="50" />
<label for='password' >Password:</label>     <input type='password' name='password' id='password' maxlength="50" />
             	       <input type='Submit' name='Login' value='Login' />  (or)
                       <input type='Submit' name='SignUp' value='Create new account' />
</p>
</pre>
</div>
</div>
</form>


</body>
</html>

