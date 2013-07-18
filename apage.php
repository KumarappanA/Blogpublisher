<?php
if (isset($_POST['title']))
{
 header('Location:index.php');
} 
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

</style>
</head>
<body>
<tr>
<td width="100%" style="border:none; margin:none; padding:none;" valign="top">
<div style="border:0; margin:0.2em 0 0.2em 0;">
<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">
<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">
<p><span style="color:#005288; font-size:200%;"><b>Registration Successful</b></span>
</p>
</div>
<div style="background:#ffffff; padding:0.2em 0.4em 0.2em 0.4em;">
<p><b>You have successfully registered to NITTfeeds.com </b> 
</p><p>Now start creating your own page or article !
</p>
</div>
</div>
</td></tr>
<div style="background:#ffffff; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;"><table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody><tr>
<td align="center" bgcolor="#ddeeff">
<p></p>
<form name="createbox" action="" method="POST">
<input type="submit" name="title" value="Click here to goto main page and Login">
</form>
<p></p>
</td>
</tr>
</tbody></table></div>

</body>
</html>