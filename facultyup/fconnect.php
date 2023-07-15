<?php

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
   $stmt=$conn->prepare("insert into faculty(name,email,faculty_id,role)values(?,?,?,?)");
   $stmt->bind_param("ssss",$name,$email,$faculty_id,$role);
   $stmt->execute();
   echo "Registration Successful";
   $stmt->close();
   $conn->close();
 }
?>