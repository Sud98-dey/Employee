<?php
#Update Employee record
include 'connect.php';
include 'data.php';

    $id = $_GET['employeeId'];
    $query = "Select * from `employees` where id=$id";   
    $data = mysqli_query($connectDB,$query);
    $row = mysqli_fetch_assoc($data);
    $fetchedHobbies = explode(',',$row['hobby']);
    $genderList = $gender;
    $fetchedGender = $row['gender'];


if(isset($_POST['Edit'])){
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $countryCodeSelected = $_POST['countryCode'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['employeeGender'];
    $hobby = implode(',',$_POST['hobby']);

    $photo_name = $_FILES['profile']['name'];
    if(strlen($photo_name)>0){
      $temp_name = $_FILES['profile']['tmp_name'];
      $folder = "./profile/". $photo_name;
      move_uploaded_file($temp_name,$folder);
    }else{
        $photo_name = $row['photo'];
    }
    
    $query = "Update `employees` set id=$id,first_name='$first_name',last_name='$last_name',email='$email',
    address='$address',country_code='$countryCodeSelected',mobile_no=$mobile,gender='$gender',
    hobby='$hobby',photo='.$photo_name.' where id=$id";
    
    $result = mysqli_query($connectDB,$query);
    echo $result;
    if($result){
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
  <h2 class="form text-center"> Edit Employee Record </h2>
 <div class="form-row">
    <div class="form-group col-md-4">
      <label> FirstName </label>
      <input type="text" class="form-control" name="firstName" 
      value="<?php echo $row['first_name']?>">
    </div>
    <div class="form-group col-md-4">
      <label> LastName </label>
      <input type="text" class="form-control" name="lastName"
      value="<?php echo $row['last_name']?>">
    </div>
  </div>
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputAddress2"> Photo </label>
    <input type="file" class="form-control-file" 
    name="profile" value="<?php echo './profile/'.$row['photo']?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress"> Email </label>
    <input type="email" class="form-control" name="email"
    value="<?php echo $row['email']?>">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-4 mr-1">
    <label> Address </label>
    <textarea class="form-control" rows="3" name="address"
    placeholder="<?php echo $row['address']?>"></textarea>  
    </div> 
   <div class="form-group col-md-4">
      <label> Mobile_with_country_code </label>
      <div class="input-group">
       <div class="input-group-prepend">
          <div class="input-group">
           <select  class="form-control" name="countryCode">
             <?php 
               foreach($country_code as $code):
                 if($code == $row['country_code']){
                    echo '<option value="'.$code.'" selected>'.$code.'</option>';
                 }else{
                    echo '<option value="'.$code.'">'.$code.'</option>';
                 }
              endforeach; 
             ?>
          </select>
         </div>
      </div>
         <input type="mobile" class="form-control" name="mobile" 
         placeholder="Mobile no." value="<?php echo $row['mobile_no']?>">
      </div>
    </div>
  </div>  
</div>
<div class="form-row">
  <label class="mr-2">Select Gender:  </label>
<div class="form-check form-check-inline">
  <?php 
        foreach($genderList as $value):
            if($value == $fetchedGender){
                echo '<input class="form-check-input" type="radio" checked name="employeeGender" 
                value="'.$value.'>
                <label class="form-check-label mr-2">'.$value.'</label>';
            }else{
                 echo '<input class="form-check-input" type="radio" name="employeeGender" value="'.$value.'">
                 <label class="form-check-label mr-2">'.$value.'</label>';
            }
          
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
      if(in_array($hobby,$fetchedHobbies)){
        echo '<input class="form-check-input" type="checkbox" checked name="hobby[]" value="'.$hobby.'">
        <label class="form-check-label mr-2">'.$hobby.'</label>';
      }else{
        echo '<input class="form-check-input" type="checkbox" name="hobby[]" value="'.$hobby.'">
      <label class="form-check-label mr-2">'.$hobby.'</label>';
      }
      
    endforeach; 
  ?>
 </div>
</div>
<button type="submit" name="Edit" class="mt-1 btn btn-primary"> Edit </button>
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
