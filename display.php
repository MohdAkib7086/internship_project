<!DOCTYPE html>
<html lang="en">
<head>
    <title>Display records</title>
    <?php include 'links.php'; ?>

</head>
<body>
    <div class="main-div">
    <br>
    <h2 class="text-white bg-dark text-center">
        Added Student Records 
        <a href="index.php">Add new student</a>
    </h2>
    
    <br>
        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Profile Pic</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Created_at</th>
                            
                            <th colspan="2">operation</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    include 'connection.php';

                    $selectquery = "select * from student";

                    $query = mysqli_query($con,$selectquery);
                    while($res=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $res['id'] ?></td>
                            <td><img src="<?php echo $res['image'] ?>" height="100px" width="100px"></td>
                            <td><?php echo $res['name'] ?></td>
                            <td><?php echo $res['email'] ?></td>
                            <td><?php echo $res['phone'] ?></td>
                            <td><?php echo $res['created_at'] ?></td>
                    
                            <td><a href="edit.php?id=<?php echo $res['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td><a href="delete.php?idth=<?php echo $res['id'];?>" data-toggle="tooltip" data-placement="bottom" title="Delete!"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php
                    }                
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>