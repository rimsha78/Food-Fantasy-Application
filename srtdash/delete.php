<?php 

$mysqli = new mysqli('localhost', 'root', '', 'phpcrud') or die(mysqli_error($mysqli));

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM student WHERE id=$id") or die($mysqli->error());
}
?>