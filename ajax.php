<?php
$link = mysqli_connect("localhost", "root", "", "formdata");
// Check connection
//if($link === false){
   // die("ERROR: Could not connect. " . mysqli_connect_error());
//}
//$con = mysqli_connect("localhost","root","","formdata");
if($link){
   $name = mysqli_real_escape_string($link, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
   $email = mysqli_real_escape_string($link, $_POST['email']);
   $phone = mysqli_real_escape_string($link, $_POST['phone']);
   $comment = mysqli_real_escape_string($link, $_POST['comments']);

   $result=mysqli_query($link, "INSERT INTO form(fname, lname, email, phone ,comment) 
   VALUES('" . $name . "', '" . $lastname . "', '" . $email . "', '" . $phone . "', '" . $comment . "')");
   if($result)
   {
      $data = 0;
   }
   else{
      $data = 1;
   }
}  
      else {
         $data = 2;
       }
       echo json_encode($data);
?>