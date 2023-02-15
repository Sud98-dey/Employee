<?php
#Create a Employee record  
include 'connect.php';
include 'data.php';
   if(isset($_POST['submit'])){
     $first_name = $_POST['firstName'];
     $last_name = $_POST['lastName'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $countryCodeSelected = $_POST['countryCode'];
     $mobile = $_POST['mobile'];
     $gender = $_POST['employeeGender'];
     $hobby = implode(',',$_POST['hobby']);

     $photo_name = $_FILES['profile']['name'];
     $temp_name = $_FILES['profile']['tmp_name'];
     $folder = "./profile/". $photo_name;
   
     echo $photo_name;
     $query = "insert into `employees` (first_name,last_name,
        email,country_code,mobile_no,address,gender,hobby,photo) 
        Values('$first_name','$last_name','$email','$countryCodeSelected','$mobile','$address',
        '$gender','$hobby','$photo_name')";
     $result = mysqli_query($connectDB,$query);
     if($result){
      move_uploaded_file($temp_name,$folder);
      header('location:display.php');
     }    
    }
?>
<html>
 <head>
 <link rel="stylesheet" 
       href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
       integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
       crossorigin="anonymous">
 </head>   
 <Body>
  
 <form  class="container" method="post" enctype="multipart/form-data">
  <h2 class="form text-center"> Employee Registration Form </h2>
 <div class="form-row">
    <div class="form-group col-md-4">
      <label> FirstName </label>
      <input type="text" class="form-control" name="firstName">
    </div>
    <div class="form-group col-md-4">
      <label> LastName </label>
      <input type="text" class="form-control" name="lastName">
    </div>
  </div>
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputAddress2"> Photo </label>
    <input type="file" class="form-control-file" name="profile">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress"> Email </label>
    <input type="email" class="form-control" name="email">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-4 mr-1">
    <label> Address </label>
    <textarea class="form-control" rows="3" name="address"></textarea>  
    </div> 
   <div class="form-group col-md-4">
      <label> Mobile_with_country_code </label>
      <div class="input-group">
       <div class="input-group-prepend">
          <div class="input-group">
           <select  class="form-control" name="countryCode">
             <?php 
               foreach($country_code as $code):
                echo '<option value="'.$code.'">'.$code.'</option>';
               endforeach; 
             ?>
          </select>
         </div>
      </div>
         <input type="mobile" class="form-control" name="mobile" placeholder="Mobile no.">
      </div>
    </div>
  </div>  
</div>
<div class="form-row">
  <label class="mr-2">Select Gender:  </label>
<div class="form-check form-check-inline">
  <?php 
    foreach($gender as $value):
      echo '<input class="form-check-input" type="radio" name="employeeGender" value="'.$value.'">
      <label class="form-check-label mr-2">'.$value.'</label>';
    endforeach; 
  ?>
</div>
</div>
</div>
<div class="form-row">
<label for="gender" class="mr-2">Select Hobby:  </label>
 <div class="form-check form-check-inline">
    <?php 
    foreach($hobbies as $hobby):
      echo '<input class="form-check-input" type="checkbox" name="hobby[]" value="'.$hobby.'">
      <label class="form-check-label mr-2">'.$hobby.'</label>';
    endforeach; 
  ?>
 </div>
</div>
<button type="submit" name="submit" class="mt-1 btn btn-primary">Submit </button>
</form>
 </Body>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"></script>
</html>
