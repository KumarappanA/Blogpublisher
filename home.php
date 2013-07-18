<?php
 // Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: index.php');
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
<a href="index11.php">My Account</a>-
<a href="logout.php">Logout</a>
</body
</html>