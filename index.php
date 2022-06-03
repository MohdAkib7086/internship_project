<!DOCTYPE html>
<html lang="en">
<head>
  <title>Intern Project</title>
  <?php include 'links.php'; ?>
</head>
<body>

<div class="container register">
    <br>
    <h1 class="text-white bg-dark text-center">
        Add Student Record 
    </h1>
    <br>
  <div class="row">

    <div class="col-md-6 register-left">
      <h3>Welcome</h3>
      <p>Please fill all the form correctly. <br>
        *Note-Image file extension must be in jpg,png or jpeg only.
      </p>

      <h5><a href="display.php">Check Added student record</a></h5> <br>
    </div>

    <div class="col-md-6 register-right">
      <h3 class="register-heading">Fill student's record</h3>
      <form action="display.php" method="POST" enctype="multipart/form-data">
        <div class="register-form">
            <div class="form-group">
              <input type="text" class="form-control"
              placeholder="enter your name*" name="name"
              value="" required>
            </div>
          
            <div class="form-group">
              <input type="email" class="form-control"
              placeholder="Enter email*" name="email"
              value="" required>
            </div>
        
            <div class="form-group">
              <input type="tel" class="form-control"
              placeholder="Enter Phone*" name="phone"
              value="" required>
            </div>

            <div class="form-group">
              <input type="file" class="form-control"
               name="file"
              value="" required>
            </div>

            <div class="form-group">
              <input type="date" class="form-control"
              placeholder="Add date" name="date"
              value="" >
            </div>

            <input type="submit" class="btnRegister" 
            name="submit" value="Add Record">

        </div>
        
       </form>
    </div>
  </div>
</div>

</body>
</html>

<?php

include 'connection.php';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email =$_POST['email'];
  $phone = $_POST['phone'];
  $created_at = $_POST['date'];

  $file = $_FILES['file'];
  $filename=$file['name'];
  $filetmp=$file['tmp_name'];
  $fileext=explode('.',$filename);
  $filecheck=strtolower(end($fileext));
  $fileextstored=array('png','jpg','jpeg');
  if(in_array($filecheck,$fileextstored)){
      $destinationfile='upload/'.$filename;
      move_uploaded_file($filetmp,$destinationfile);

      $insertquery = " insert into student(
        name,email,phone,image,created_at) values('$name','$email',
        '$phone','$destinationfile','$created_at') ";
        $res = mysqli_query($con,$insertquery);
    
        if($res){
          ?>
          <script>
            alert("data inserted properly");
          </script>
          <?php
        }else {
          ?>
          <script>
            alert("data not inserted properly");
          </script>
          <?php
        }
  }

 print_r($name);
 print_r($file);
}

?>