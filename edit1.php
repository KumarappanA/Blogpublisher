<?php
 // Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: index.php');
}
$text= mysql_real_escape_string($_POST['var']);
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
$entry1=$_POST['var1'];

if(isset($_POST['logout']))
{
 header('Location: logout.php');
}
?>
<html>
<title>Edit</title>
<body>
<form method="POST" action="page.php">
 <textarea id="edit" name="edit" cols="100" rows="35">
 <?php echo $text; ?> 
 </textarea>
<br>
<input type="hidden" name="varname" value="<?=$entry1;?>" />
<input type="submit" name="preview" value="Save and Preview" /> or
<input type="submit" name="logout" value="Logout" />
</form>
</body>
</html>