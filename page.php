<?php
  // Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: index.php');
}


 $name=$_SESSION['username'];
 $entry=mysql_real_escape_string($_POST['varname']);
    $con1=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
    mysql_select_db("entries",$con1);
    $text =mysql_real_escape_string($_POST['edit']); 
    
      $text = str_replace(array("\r","\n",'\r','\n'),'', $text);
      $remove_php_regex = '/(<\?{1}[pP\s]{1}.+\?>)/Us';
 
     $remove_php_replacement = '';
     $text = preg_replace($remove_php_regex, $remove_php_replacement, $text);

$text = preg_replace(
        array(
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
          // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
        ),
        $text );


       $query="UPDATE `detail` SET Textarea='$text' WHERE NewEntry='$entry'";

       mysql_query($query) or die('Error Updating database');


?>
<html>
<head>
<form method="POST" action="edit1.php">
<input type="hidden" name="var" value="<?=$text;?>" />
<input type="hidden" name="var1" value="<?=$_POST['varname'];?>" />
<input type="submit" name="continue" value="Continue editing" /> 
<a href="home.php">Home</a> or
<a href="logout.php">Logout</a>
</form>

</head>
<body>
<?php echo $_POST['edit']; ?>
</body>
</html>
