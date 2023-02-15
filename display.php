<?php
#Display Employee records  
include 'connect.php'
?>
<html>
<head>
 <link rel="stylesheet" 
       href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
       integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
       crossorigin="anonymous">
 </head>   

  <body>
    <div class="container">
        <h2 class="text-center"> Employee Records display </h2>
    <table class="table">
  <thead class="btn-success">
    <tr>
      <th scope="col"> Id </th>
      <th scope="col"> Name</th>
      <th scope="col"> Mobile</th>
      <th scope="col"> Gender </th>
      <th scope="col"> Hobbies </th>
      <th scope="col"> Profile </th>
      <th scope="col"> Email </th>
      <th scope="col" class="text-center"> Actions </th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query = 'Select * from `employees`';
      $result = mysqli_query($connectDB,$query);
      while($row=mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $full_name = $row['first_name']." ".$row['last_name'];
        $mobile = $row['country_code']." ".$row['mobile_no'];
        
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$full_name.'</td>
        <td>'.$mobile.'</td>
        <td>'.$row['gender'].'</td>
        <td>'.$row['hobby'].'</td>
        <td><img src="./profile/'.$row['photo'].'" class="img-fluid" width="70"></td>
        <td>'.$row['email'].'</td>
        <td>
          <span class="align-center">
          <a class="btn btn-primary" href="update.php?employeeId='.$id.'"> Edit </a>
          <a class="btn btn-danger" href="delete.php?employeeId='.$id.'"> Delete </a>
          </span>
       </td>
      </tr>';
      }
     ?>
    </tbody>
   </table>
  </div>
 </body>     
</html>    