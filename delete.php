<?php

include 'connection.php';

$id=$_GET['idth'];

$deletequery = "delete from student where id=$id ";

$query=mysqli_query($con,$deletequery);

header('location:display.php');

if($query){
    ?>
    <script>
        alert("deleted successfully");
    </script>
    <?php
}else{
?>
<script>
    alert("not deleted");
</script>
<?php
}


?>