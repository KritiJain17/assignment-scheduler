


<?php

session_start();

$name=$_POST['name'];
$email=$_POST['email'];
$faculty_id=$_POST['faculty_id'];
$role=$_POST['role'];

 $conn=new mysqli('localhost','root','','assignment_section');

 if($conn->connect_error)
 {
   die('Connection Failed  :  '.$conn->connect_error);
 }
 else
 {
   mysqli_select_db($conn,'assignment_section');
$s="select * from faculty where name='$name' && email='$email' && faculty_id = '$faculty_id' && role='$role'";
$res=mysqli_query($conn,$s);
$num=mysqli_num_rows($res);
if($num==1)
{
	header('location:https://facultypage.kritijain1.repl.co/');
}
else{
  
   echo "Record not found. Check for spelling mistakes or Register again. If not resolved, contact the owner of the page";

  
}

 }
?>



