<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'test';

$con=mysqli_connect($server,$username,$password,$db);

if($con){
    ?>
<script>
alert("connection successfull");
</script>
<?php
}
else{
    die("no connection".mysqli_connect_error());
}

?>