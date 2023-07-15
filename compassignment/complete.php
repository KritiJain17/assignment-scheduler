<?php

$conn=mysqli_connect('localhost','root','','assignment_section');
?>

<!DOCTYPE html>
<html>
<head>
  
  <title>Fetch Data for Complete Assignments</title>
</head>


<body>
  
  
   

    <?php

		$enrollment_number=$_POST['enrollment_number'];

 
  		 $stmt="select * from sassignment,assignment 
				where sassignment.code=assignment.code 
				and 
				sassignment.enrollment_number='$enrollment_number';";
   
 		 $res=mysqli_query($conn,$stmt);
		 $rescheck=mysqli_num_rows($res);
		 


  
if($rescheck>0){

?>

<table align="center" border="1px" style="width:600px; line-height:40px">
	<tr> 
		<th colspan="4"><h2>Submitted Assignment Details</h2></th>    
	</tr>

    <t>
      
        <th> Code of Assignment</th>
	<th> Link to Assignment</th>
	<th> Your Work</th>
    </t> 

       

<?php
      while($rows=mysqli_fetch_assoc($res))
      {
?>

 <tr>
          <td><?php echo $rows['sassignment.code'];?></td>
          <td><?php echo $rows['assignmentlink'];?></td>
	  <td><?php echo $rows['sassignment.linksub'];?></td>
	
          
          
        </tr>
   

     <?php
     }
}a
else

echo 'You have not submitted any assignments yet. Either check the Enrollment Number enterd or check for <a href="https://pendingassignment.kritijain1.repl.co/">Pending Assignments.</a>'; 
     ?>
  </table>
</body>
</html>


