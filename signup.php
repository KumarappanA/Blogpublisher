<?php
error_reporting('0');
$fname=($_POST['fname']);
$email=($_POST['email']);
$pass=($_POST['pwd1']);
$pwd=md5($pass);
$confirm=($_POST['pwd2']);
$year=$_POST['date_year'];
$gender=$_REQUEST['sex'];
$year=$_REQUEST['date_year'];
$day=$_REQUEST['date_day'];
$month=$_REQUEST['date_month'];


$mysql_date = "$year" . "-" . "$month" . "-" . "$day";

$con=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
$var2=mysql_select_db("test",$con);

$sql="SELECT * FROM `details` WHERE Name='$fname'";
$result=mysql_query($sql);
$count=0;
while($row = mysql_fetch_assoc($result))
{
 $count++;}
mysql_query($sql) or die('Error Updating database');
if($count>0)
{
 echo "Username already exists !";
 print('<p>Press back and complete the form.</p>');
 return false;
}
if(isset($_POST['submit']))
{

$query="INSERT INTO `details` (`id`,`Name`,`Email ID`,`Password`,`Gender`,`Date Of Birth`)
VALUES('NULL','$fname','$email','$pwd','$gender','$mysql_date')";
mysql_query($query) or die('Error Updating database');
header('Location:apage.php');
}
?>
<html>
<head>
<title>Sign Up</title>
<style type="text/css">
#header ul {
list-style: none;
}
#header li {
border: none;
padding: 0;
display: inline;
background: none;
border-image: initial;
}
</style>
<script type="text/javascript">
function validateForm(theForm)
{
var x=theForm.fname.value;

// to check whether the name field is empty or not
if (x==null || x=="")
  {
  document.getElementById("demo").innerHTML="Error : The name field must be filled !";
  return false;
  }
 else
   document.getElementById("demo").innerHTML="";

// to check whether the first letter of the name starts with capitals
if(x.charCodeAt(0)>90)
 { 
  document.getElementById("demo").innerHTML=" Error : First letter of the Name field should be in capitals !";
  return false;
 }
 else
  document.getElementById("demo").innerHTML="";

var y=theForm.email.value;
var atpos=y.indexOf("@");
var dotpos=y.lastIndexOf(".");

// to check whether the entered email id is a valid one
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length)
  {
  document.getElementById("em").innerHTML=" Error : Not a valid e-mail address";
  return false;
  }
else
  document.getElementById("em").innerHTML="";

 re = /^\w+$/; 
var p1=theForm.pwd1.value;
var p2=theForm.pwd2.value;

// to check if the password field is empty
if (p1==null || p1=="")
  {
   document.getElementById("pass").innerHTML=" Error : Password field cannot be left empty !";
   return false;
  }
 else
  document.getElementById("pass").innerHTML="";

// to check whether the pasword entered has only letters , numbers and underscores
 if(!re.test(p1)) 
  { 
    document.getElementById("pass").innerHTML=" Error: Password must contain only letters, numbers and underscores !";
    return false; 
  }
 else
   document.getElementById("pass").innerHTML="";

// to check the length of the password
 if((p1.length<5)||(p1.length>=10))
  {
   document.getElementById("pass").innerHTML=" Error :Password should contain atleast 5 characters but less than 10 characters !";
   return false;
  } 
 else
   document.getElementById("pass").innerHTML="";
    
// to verify the password
 if(p1!=p2)
  { 
   document.getElementById("con").innerHTML=" Error : Passwords entered does not match !";
   return false;
  }
 else
   document.getElementById("con").innerHTML="";
  
// to check whether the gender field is filled
 if (theForm.sex.selectedIndex<=0)
  {
   document.getElementById("gen").innerHTML=" Error : Please select one of the Gender options.";
   return false; 
  }
 else
   document.getElementById("gen").innerHTML="";

// to check if the month field is filled
 if (theForm.date_month.selectedIndex<=0)
 {
  document.getElementById("dob").innerHTML=" Error : Please select a month.";
  return false;
 }
 else
   document.getElementById("dob").innerHTML="";

// to check if the day field is filled
 if (theForm.date_day.selectedIndex<=0)
 {
  document.getElementById("dob").innerHTML=" Error : Please select a day.";
  return false;
 }
 else
   document.getElementById("dob").innerHTML="";
   
// to check if the year field is filled
 if (theForm.date_year.selectedIndex<=0)
 {
  document.getElementById("dob").innerHTML=" Error : Please select a year.";
  return false;
 }
else
  document.getElementById("dob").innerHTML="";
}

 </script>
</head>
<body>
<tr>
<td width="100%" style="border:none; margin:none; padding:none;" valign="top">
<div style="border:0; margin:0.2em 0 0.2em 0;">
<div style="background:#f9f9f9; padding:0px; border:1px solid #aaaaaa; margin-bottom:5px;">
<div style="line-height:120%; padding:0.4em; background-color:#eeeeee; border-bottom:1px solid #aaaaaa;">
<pre>
<p><span style="color:#005288; font-size:200%; font-family:Arial;"><b>                                                                Sign Up</b></pre></span>
</p>
</div>
</div>
</div>
</td></tr>
<form name="myForm" action="" onsubmit="return validateForm(this)" method="POST">
<pre>
<div id="header" style="font-family:Arial;">
<ul>
<li>Name: </li>                       <input type="text" size="20" maxlength="20" name="fname"><font id="demo"></font>

<li>Email:  </li>                      <input type="text" size="60" name="email"><font id="em"></font>

<li>Password: </li>                <input type="password" size="20" maxlength="20" name="pwd1"><font id="pass"></font>

<li>Confirm password : </li> <input type="password" size="20" maxlength="20" name="pwd2"><font id="con"></font>

<li>Gender:</li>                      <select name="sex" size="1">
        <option value="0">Select a Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select><font id="gen"></font>

<li>Date Of Birth :  </li>  
Month:   <select NAME="date_month">
		<option VALUE="0">
		<option VALUE="1">1
		<option VALUE="2">2
		<option VALUE="3">3
		<option VALUE="4">4
		<option VALUE="5">5
		<option VALUE="6">6
		<option VALUE="7">7
		<option VALUE="8">8
		<option VALUE="9">9
		<option VALUE="10">10
		<option VALUE="11">11
		<option VALUE="12">12		
	</select>    Day:   <select NAME="date_day">
		<option VALUE="0">
		<option VALUE="1">1
		<option VALUE="2">2
		<option VALUE="3">3
		<option VALUE="4">4
		<option VALUE="5">5
		<option VALUE="6">6
		<option VALUE="7">7
		<option VALUE="8">8
		<option VALUE="9">9
		<option VALUE="10">10
		<option VALUE="11">11
		<option VALUE="12">12
		<option VALUE="13">13
		<option VALUE="14">14
		<option VALUE="15">15
		<option VALUE="16">16
		<option VALUE="17">17
		<option VALUE="18">18
		<option VALUE="19">19
		<option VALUE="20">20
		<option VALUE="21">21
		<option VALUE="22">22
		<option VALUE="23">23
		<option VALUE="24">24
		<option VALUE="25">25
		<option VALUE="26">26
		<option VALUE="27">27
		<option VALUE="28">28
		<option VALUE="29">29
		<option VALUE="30">30
		<option VALUE="31">31		
	</select>   Year:   <select NAME="date_year">
		<option VALUE="0">
		<option VALUE="2000">2000
		<option VALUE="1999">1999
		<option VALUE="1998">1998
		<option VALUE="1997">1997
		<option VALUE="1996">1996
		<option VALUE="1995">1995
		<option VALUE="1994">1994
		<option VALUE="1993">1993
		<option VALUE="1992">1992
		<option VALUE="1991">1991
		<option VALUE="1990">1990
                <option VALUE="1989">1989
                <option VALUE="1988">1988
                <option VALUE="1987">1987
                <option VALUE="1986">1986
                <option VALUE="1985">1985
                <option VALUE="1984">1984
                <option VALUE="1983">1983
                <option VALUE="1982">1982
                <option VALUE="1981">1981
                <option VALUE="1980">1980
                <option VALUE="1979">1979
                <option VALUE="1978">1978
                <option VALUE="1977">1977
                <option VALUE="1976">1976
                <option VALUE="1975">1975
                <option VALUE="1974">1974
                <option VALUE="1973">1973
                <option VALUE="1972">1972
                <option VALUE="1971">1971
                <option VALUE="1970">1970
                <option VALUE="1969">1969
                <option VALUE="1968">1968
                <option VALUE="1967">1967
                <option VALUE="1966">1966
                <option VALUE="1965">1965
                <option VALUE="1964">1964
                <option VALUE="1963">1963
                <option VALUE="1962">1962
                <option VALUE="1961">1961
                <option VALUE="1960">1960
	</select><font id="dob"></font>
<br>
<input type="submit" name= "submit" value="Submit" />  <input type="reset"  value="Reset" />             
<p style="font-size:20px;">If you already have an account , click on this <a href="index.php">link</a> to login.</p>
</ul>
</div>
</pre>
</form>
</div>
</body>
</html>
