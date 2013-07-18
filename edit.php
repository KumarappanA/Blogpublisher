<?php
 // Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: index.php');
}
 
 $name=$_SESSION['username'];
 $entry=$_POST['new'];
   if(isset($_REQUEST['create']) && $_REQUEST['create'] != '0')
   {  
    
    $d=date('d-m-y');
    $con1=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
    mysql_select_db("entries",$con1);
      if($entry!=NULL || $entry!="")
       {
        $sql="SELECT * FROM `detail` WHERE NewEntry='$entry'";
        $result=mysql_query($sql);
        $count1=0;
         while($row = mysql_fetch_assoc($result))
         {
          $count1++;
          }
         mysql_query($sql) or die('Error Updating database');
         if($count1>0)
          {
            echo "Entry already exists !";
            print('<p>Press back and create an entry with another name.</p>');
            return false;
           }
        $query="INSERT INTO `detail` (`id`,`Creator`,`NewEntry`,`Created on`) VALUES ('NULL','$name','$entry','$d')";
        mysql_query($query) or die('Error Updating database');
        }
else
{
 echo "Please specify a name for the article to proceed further !";
 print('<p>Press back to continue.</p>');
 return false;
 }
}

if(isset($_POST['logout']))
header('Location: logout.php');


?>
<html>
<title>Edit</title>
<body>
<form method="POST" action="page.php">
 <textarea id="edit" name="edit" cols="100" rows="35">
  <html>
  <body>
  <h><?php echo $_POST['new']; ?></h>
  </body>
  </html>
 </textarea>
<br>
<input type="hidden" name="varname" value="<?=$_POST['new'];?>" />
<input type="submit" name="preview" value="Save and Preview" /> or
<input type="submit" name="logout" value="Logout" />
</form>

</body>
</html>