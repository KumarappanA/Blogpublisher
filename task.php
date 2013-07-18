
<?php
error_reporting('0');
$fname=$_POST['fname'];
$email=$_POST['email'];
$pass=$_POST['pwd1'];
$pwd=md5($pass);
$confirm=$_POST['pwd2'];
$year=$_POST['date_year'];
$gender=$_REQUEST['sex'];
$year=$_REQUEST['date_year'];
$day=$_REQUEST['date_day'];
$month=$_REQUEST['date_month'];


$mysql_date = "$year" . "-" . "$month" . "-" . "$day";

$con=mysql_connect("localhost","root","") or die('Error:'.mysql_error());
$var2=mysql_select_db("test",$con);
if(isset($_POST['submit']))
{
 $query="INSERT INTO `details` (`id`,`Name`,`Email ID`,`Password`,`Gender`,`Date Of Birth`)
VALUES('NULL','$fname','$email','$pwd','$gender','$mysql_date')";
mysql_query($query) or die('Error Updating database');
}
?>
<html>
<head>
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

 var ph=theForm.phone.value;

// to check if the phone number field is empty
 if (ph==null||ph=="")
  {
   document.getElementById("pho").innerHTML="  Error :Phone number cannot be left empty !";
   return false;
  }
 else
   document.getElementById("pho").innerHTML="";
 
 re1=/^\d+$/;

// to check whether the entered value is valid
 if(!re1.test(ph)) 
  { 
    document.getElementById("pho").innerHTML="  Error: Only numbers should be entered in Phone number field!";
    return false; 
  } 
 else
  document.getElementById("pho").innerHTML="";
 
var r=false;

// to check if the the button is selected
for (i = 0;  i < theForm.self.length;  i++)
{
 if (theForm.self[i].checked)
 r=true;
 }
 if (!r)
  {
   document.getElementById("who").innerHTML="  Error: Please select one of the options under \"Who are you ?\"";
   return false;
  }
 else
   document.getElementById("who").innerHTML="";
   
var radioSelected = false;

// to check if the button is selected
for (i = 0;i<theForm.survey.length;i++)
{
 if (theForm.survey[i].checked)
 radioSelected = true;
 }
 if (!radioSelected)
 {
  document.getElementById("sug").innerHTML="  Error: Please select one of the options under \"Who suggested you this test ?\"";
  return false;
 }
 else
   document.getElementById("sug").innerHTML="";

var checkCounter = 0;

// to check if atleast 3 checkboxes are ticked
for (i = 0;  i < theForm.test.length;  i++)
{
 if (theForm.test[i].checked)
 checkCounter = checkCounter + 1;
 }
 if (checkCounter < 3)
 {
  document.getElementById("sel").innerHTML="  Error: Please select atleast three of the \"Test Checkbox\" options.";
  return false;
 }

 else
  document.getElementById("sel").innerHTML="";

}
</script>
</head>

<body>
<div style="background-image:url(http://th07.deviantart.net/fs70/PRE/f/2011/304/2/5/test_render_wallpaper__8_by_spielehorst-d4el6gm.jpg);background-repeat:repeat;width:800px;">
<div id="header" style="font-size:40px;text-align:center;">
<h1 style="font-size:40px;text-align:center;">Application for Test</h1></div>
<form name="myForm" action="" onsubmit="return validateForm(this)" method="post">

Name:     <input type="text" size="20" maxlength="20" name="fname"><font id="demo"></font><br>

Email:     <input type="text" size="60" name="email" value><font id="em"></font><br>

Password: <input type="password" size="20" maxlength="20" name="pwd1"><font id="pass"></font><br>

Confirm password : <input type="password" size="20" maxlength="20" name="pwd2"><font id="con"></font><br>

Gender:
	<select name="sex" size="1">
        <option>Select a Gender</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
        </select><font id="gen"></font><br>

Date Of Birth :  <br>
Month:
	<select NAME="date_month">
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
	</select>
	 
	Day:
	<select NAME="date_day">
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
	</select>
	 
	Year:
	<select NAME="date_year">
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
	</select><font id="dob"></font>
<br>

Phone number:   <input type="text" size="20" maxlength="12" name="phone"><font id="pho"></font><br>

Who are you ?  <font id="who"></font><br>
<input type="radio" name="self" value="student" />Student<br>
<input type="radio" name="self" value="employee" />Employee<br>

Who suggested you this test ?  <font id="sug"></font><br>
<input type="radio" name="survey" value="friend" />Friend<br>
<input type="radio" name="survey" value="neighbour" />Neighbour<br>
<input type="radio" name="survey" value="none" />None<br>

Select the tests that you want to attempt :  <font id="sel"></font><br>
<input type="checkbox" name="test" value="1" />Test 1<br>
<input type="checkbox" name="test" value="2" />Test 2<br>
<input type="checkbox" name="test" value="3" />Test 3<br>
<input type="checkbox" name="test" value="4" />Test 4<br>
<input type="checkbox" name="test" value="5" />Test 5<br>

<input type="submit" value="Submit" name="submit">
<input type="reset"  value="Reset">
</form>
</body>
</html>
