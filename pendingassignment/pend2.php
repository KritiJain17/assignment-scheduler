<?php

$conn=mysqli_connect('localhost','root','','assignment_section');

$linksub=$_POST['linksub'];
$enrollment_number=$_POST['enrollment_number'];
$code=$_POST['code'];
$sqlquery=$conn->prepare("insert into sassignment(linksub,enrollment_number,code)values(?,?,?)");
$sqlquery->bind_param("sss",$linksub,$enrollment_number,$code);
$sqlquery->execute();

$sqlquery->close();
$conn->close();
?>