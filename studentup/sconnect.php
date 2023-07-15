<?php

session_start();

$name=$_POST['name'];
$email=$_POST['email'];
$enrollment_number=$_POST['enrollment_number'];
$role=$_POST['role'];

 $conn=new mysqli('localhost','root','','assignment_section');

 if($conn->connect_error)
 {
   die('Connection Failed  :  '.$conn->connect_error);
 }

 else
 {
   mysqli_select_db($conn,'assignment_section');
$s="select * from student where enrollment_number = '$enrollment_number'";
$res=mysqli_query($conn,$s);
$num=mysqli_num_rows($res);
if($num==1)
{
echo "Enrollment Number already registered";
}
else{
   $stmt=$conn->prepare("insert into student(name,email,enrollment_number,role)values(?,?,?,?)");
   $stmt->bind_param("ssss",$name,$email,$enrollment_number,$role);
   $stmt->execute();
   echo "Registration Successful.Visit the SignIn Page.";

   $stmt->close();
   $conn->close();
}

 }
?>

