<?php

$conn=mysqli_connect('localhost','root','','assignment_section');
?>

<!DOCTYPE html>
<html>
<head>
  
  <title>Pending Assignments</title>
</head>


<body>

<style>
	:root {
    --color-white: #f3f3f3;
    --color-darkpurple: #52057b;
    --color-darkpurple-lighter: rgba(27, 27, 50, 0.8);
     /*
    #892cdc;
    */
    --color-turquoise: #679b9b;
  }

body {
    font-family: 'Maven Pro', sans-serif;
    font-size: 1.1rem;
    font-weight: 400;
    line-height: 1.6;
    color: white;
    margin: 0;
    padding: 0;
  }

body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: -1;
    background-color: #0093E9;
    background-image:
        linear-gradient(
        115deg,
        rgba(58, 58, 158, 0.8),
        rgba(136, 136, 206, 0.7)
        ),
        url("https://images.unsplash.com/photo-1554415707-6e8cfc93fe23?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE0fHxzdHVkeWluZ3xlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60");
    background-size: 100% 100%;
    background-repeat: no-repeat;
}

.container-fluid {
    padding: 0;
}

/* Navbar section */

.navbar-brand {
    font-family: 'Ubuntu';
    font-weight: bold;
    font-size: 1.75rem;
    color: white;
}

.navbar {
    padding: 15px 1.3rem;
    margin: 0;
    background-color: #98ACF8;
    /* background-color: var(--color-darkpurple); */
}
.navbar-brand:hover {
    color: white;
}

.nav-item {
    padding: 0 1.125rem;
    color: white;
}

.nav-link {
    font-family: 'Maven Pro', sans-serif;
    font-weight: normal;
    color: white;
    transition: transform .2s;
}

.nav-link:hover {
    transform: scale(1.5);
    color: #CDF0EA;
}

/* Login forms */

.assignment-heading-loginform {
    font-family: 'Lobster', cursive;

  }

form { 
    background: var(--color-darkpurple-lighter);
    padding: 2rem;
    border-radius: 0.25rem;
    text-align: center;
    margin: 2rem 7rem;
  }

  #login-form {
    transition: transform .2s;
  }
  #login-form:hover {
    transform: scale(1.05);
  }

  input,
  button,
  select,
  textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    text-align: center;
  }

  .form-group {
    padding: 0.25rem;
    margin: 0 auto 1.25rem auto;
    
  }
  
  .form-control {
    padding: 0.375rem 0.75rem;
    border-radius: 0.25rem;
    display: inline; 
    height: 2.25rem;
    width: 100%;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #52057b;
    transition: border-color 0.15s ease-in-out,
      box-shadow 0.15s ease-in-out;  
  }
  
  .form-control:focus {
    border-color: #3e206d;
    outline: 0;
    box-shadow: 0 0 0 0.2rem #c081ec;
  }

  .submit-button {
      display: block;
      width: 100%;
      padding: 0.75rem;
      font-size: 1.5rem;
      background: var(--color-turquoise);
      color: inherit;
      border-radius: 2px;
      cursor: pointer;
      margin-top: 16px;
      margin-bottom: 0;
  }

  .submit-button:hover {
    background: #5F939A;
  }

  

.btn-group button {
  background-color: rgb(170, 4, 156); /* Green background */
  border: 1px solid #c081ec; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  width: 100%; /* Set a width if needed */
  display: block; /* Make the buttons appear below each other */
 font-family: 'Times monospace', cursive;
  horizontal-align: middle;
}

.btn-group button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}

.log{
  max-width: 800px;
  max-height: 700x;
  margin: auto;
  border:#971c97e5;
   padding: 10px;
  margin-top: 110px;
}

.local{
  font-family: 'Times monospace', cursive;
}
  


.page{
   background-color: rgb(73, 233, 233);
  color: white;
  text-align: center;
  
}


.pending{
  

}

.marg{
 margin-top: 100px;
  margin-bottom: 100px;
  margin-right: 150px;
  margin-left: 150px;
}

</style>
  
  
   

    <?php

		$enrollment_number=$_POST['enrollment_number'];

 
  		 $stmt="	select * from sassignment,assignment 
				where sassignment.code=assignment.code 
				MINUS
				select * from sassignment,assignment 
				where sassignment.code=assignment.code 
				and 
				sassignment.enrollment_number='$enrollment_number';

			";
   
 		 $res=mysqli_query($conn,$stmt);
		 $rescheck=mysqli_num_rows($res);
		 


  
if($rescheck>0){

?>
<div class="marg">
<table align="center" border="1px" >


	<tr> 
		<th colspan="3"><h2>Submitted Assignment Details</h2></th>    
	</tr>

    <t>
      
        <th> Code of Assignment</th>
	<th width="100px"> Link to Assignment</th>
	<th> Submission Link</th>
	
    </t> 

       

<?php
      while($rows=mysqli_fetch_assoc($res))
      {
?>

 <tr>
          <td><?php echo $rows['code'];?></td>
          <td class="wid"><?php echo $rows['link'];?></td>

	  <td>
		 <form action="http://localhost/pend2.php" method="post" id="pendassign">
                    

               <div class="form-group">


                  <label id="linksub" for="linksub"></label>
                  <input
                         id="linksub"
                         type="text"
                         name="linksub"
                         class="form-control"
                         placeholder="Link"
                         required
                         >
                  </input>

		<label id="enrollment_number" for="enrollment_number"></label>
                  <input
                         id="enrollment_number"
                         type="text"
                         name="enrollment_number"
                         class="form-control"
                         placeholder="Enrollment Number"
                         required
                         >
                  </input>


		<label id="code" for="code"></label>
                  <input
                         id="code"
                         type="text"
                         name="code"
                         class="form-control"
                         placeholder="Code"
                         required
                         >
                  </input>
                </div>

                <div class="form-group">
                 <button type="submit" id="submit" class="submit-button">
                    Submit
                </button>
               </div>

               </form>


	  </td>
        </tr>
   

     <?php
     }


}
else

echo 'You do not have not any pending assignments. Either check the Enrollment Number enterd or check for <a href="https://compassignment.kritijain1.repl.co/"> Submitted Assignments.</a>'; 
     ?>

  </table>
</div>
</body>
</html>


