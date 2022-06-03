<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Record</title>
  <?php include 'links.php'; ?>
</head>
<body>
<div class="container register">
    <br>
    <h1 class="text-white bg-dark text-center">
        Edit Student Record
    </h1>
    <br>
  <div class="row">

    <div class="col-md-6 register-left">
      <h3>Welcome</h3>
      <p>please Edit form correctly and carefully. <br>
      *Note-Image file extension must be in jpg,png or jpeg only.
      </p>
      <h5><a href="display.php">Check Added student record</a></h5>  <br>
    </div>

    <div class="col-md-6 register-right">
      <h3 class="register-heading">Edit student's record</h3>
      <form action="display.php" method="POST" enctype="multipart/form-data">
        <div class="register-form">
        <?php

include 'connection.php';
$ids=$_GET['id'];

$showquery ="select * from student where id={$ids}";

$showdata=mysqli_query($con,$showquery);

$arrdata=mysqli_fetch_array($showdata);

if(isset($_POST['submit'])){
    $idupdate = $_GET['id'];

    $name = $_POST['name'];
    $email =$_POST['email'];
    $phone = $_POST['phone'];
    $created_at = $_POST['date'];

  $file = $_FILES['file'];
  $filename=$file['name'];
  $fileerror=$file['error'];
  $filetmp=$file['tmp_name'];
  $fileext=explode('.',$filename);
  $filecheck=strtolower(end($fileext));
  $fileextstored=array('png','jpg','jpeg');
  if(in_array($filecheck,$fileextstored)){
    $destinationfile='upload/'.$filename;
    move_uploaded_file($filetmp,$destinationfile);

    $query = "update student set id=$ids,name='$name',
    email='$email',phone='$phone',image='$destinationfile',created_at=
    '$created_at' where id = $idupdate";

    $res = mysqli_query($con,$query);
  
      if($res){
        ?> 
        <script>
          alert("Record edited properly");
        </script>
        <?php
      }else {
        ?>
        <script>
          alert("Record not edited");
        </script>
        <?php
      }
}
}

?>
            <div class="form-group">
              <input type="text" class="form-control"
              placeholder="enter your name*" name="name"
              value="<?php echo $arrdata['name']; ?>" required>
            </div>
          
            <div class="form-group">
              <input type="email" class="form-control"
              placeholder="Enter email*" name="email"
              value="<?php echo $arrdata['email']; ?>" required>
            </div>
        
            <div class="form-group">
              <input type="tel" class="form-control"
              placeholder="Enter Phone*" name="phone"
              value="<?php echo $arrdata['phone']; ?>" required>
            </div>

            <div class="form-group">
              <input type="file" class="form-control"
              placeholder="add image*"
               name="file"
              value="<?php echo $arrdata['image']; ?>" required>
            </div>

            <div class="form-group">
              <input type="date" class="form-control"
              placeholder="Add date" name="date"
              value="<?php echo $arrdata['created_at']; ?>" >
            </div>

            <input type="submit" class="btnRegister" 
            name="submit" value="Edit Record">

        </div>
        
       </form>
    </div>
  </div>
</div>

</body>
</html>


