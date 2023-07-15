<?php

$name=$_POST['name'];
$link=$_POST['link'];
$faculty_id=$_POST['faculty_id'];
$code=$_POST['code'];


 $conn=new mysqli('localhost','root','','assignment_section');

 if($conn->connect_error)
 {
   die('Connection Failed  :  '.$conn->connect_error);
 }
 else
 {
   $stmt=$conn->prepare("insert into assignment(name,link,faculty_id,code)values(?,?,?,?)");
   $stmt->bind_param("ssss",$name,$link,$faculty_id,$code);
   $stmt->execute();
   echo "Assignment scheduled successfully";
echo nl2br( "<a href='https://www.google.com' target='_blank'>

\nClick here to visit Google

</a>"); 
 
   $stmt->close();
   $conn->close();
 }
?>
