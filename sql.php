<?php 
$host='localhost';
$user='root';
$project='carrental';
$ps='';


$conn = mysqli_connect($host, $user, $ps, $project);if (!$conn) {
    echo "<script>alert(\"Database error retry after some time !\")</script>";
}
?>
