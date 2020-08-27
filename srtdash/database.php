<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'phpcrud') or die(mysqli_error($mysqli));


if(isset($_POST['create'])){
  $date = $_POST['date_birth'];
  $State = $_POST['state'];
  $city = $_POST['city'];
  $code = $_POST['code'];
  $street = $_POST['street'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  if($_FILES["image"]['name']){
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$_FILES['image']['name']);
    $image="uploads/".$_FILES['image']['name'];
  }

  
  $mysqli->query("INSERT INTO student (date_birth, state, city, zip_code, street, first_name, last_name, email, phone, image) VALUES('$date', '$State', '$city', '$code', '$street', '$fname', '$lname', '$email', '$phone', '$image')") or die($mysqli->error);
  $_SESSION['message'] = "Record has been saved";
  $_SESSION['msg_type'] = "success";

  header("location: datatable.php");


}
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM student WHERE id=$id") or die($mysqli->error());
  $_SESSION['message'] = "Record has been Deleted";
  $_SESSION['msg_type'] = "danger";

  header("location: datatable.php");
}


?>