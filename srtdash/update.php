<?php 

 
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'phpcrud') or die(mysqli_error($mysqli));
  $id = 0;
  $date = '';
  $State = '';
  $city = '';
  $code = '';
  $street = '';
  $fname ='';
  $lname = '';
  $email = '';
  $phone = '';

if (isset($_GET['edit'])){
  $id = $_GET['edit'];
  $result = $mysqli->query("SELECT * FROM student WHERE id=$id") or die($mysqli->error());
  if (mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $date = $row['date_birth'];
    $State = $row['state'];
    $city = $row['city'];
    $code = $row['zip_code'];
    $street = $row['street'];
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $email = $row['email'];
    $phone = $row['phone'];
    }
}

if(isset($_POST['edit'])){
  $id = $_POST['id'];
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
  $mysqli->query("UPDATE student SET id='$id', date_birth='$date', state='$State', city='$city', zip_code='$code', street='$street', first_name='$fname', last_name='$lname', email='$email', phone='$phone', image='$image' WHERE id='$id' ") or die($mysqli->error);
  $_SESSION['message'] = "Record has been updated";
  $_SESSION['msg_type'] = "success";

  header("location: datatable.php");

  }

?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Update Record</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
</head>

<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Update Product</h1>
        </div>
     
        <!-- PHP read record by ID will be here -->
 
        <!-- HTML form to update record will be here -->
         
    </div> <!-- end .container -->
    <div class="container">
        <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id ?>" >
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" value="<?php echo $email ?>" name="email" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPhone">Phone</label>
                <input type="Phone" class="form-control"  value="<?php echo $phone ?>" name="phone" id="inputPhone" placeholder="Phone">
            </div>                                    
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="name" class="form-control" value="<?php echo $fname ?>" name="fname"  id="firstName" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="name" class="form-control"  value="<?php echo $lname ?>" name="lname" id="lastName" placeholder="Last Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="DOB">Date of Birth</label>
                <input type="Date" class="form-control"  value="<?php echo $date ?>" name="date_birth" id="DOB" placeholder="Date of Birth">
            </div>
            <div class="form-group col-md-6">
                <label for="street">Street</label>
                <input type="text" class="form-control" value="<?php echo $street ?>" name="street" id="street" placeholder="Street">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control"  value="<?php echo $city ?>" name="city" id="inputCity" placeholder="City">
            </div>
            <div class="form-group col-md-6">
                <label for="inputState">State</label>
                <input type="text" class="form-control"  value="<?php echo $State ?>" name="state" id="inputState" placeholder="State">
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control"  value="<?php echo $code ?>" name="code" id="inputZip" placeholder="Zip Code">
          </div>
          <div class="form-group col-md-6">
            <label>Upload Image</label>
            <input type="file" class="form-control"  name="image" id="image" class="form-control">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group" style="margin-left: 20px;">
            <input type='submit' name="edit" value='Save Changes' class='btn btn-primary' />
            <a href='datatable.php' class='btn btn-danger'>Back to read Record</a>
          </div>
        </div>
        </form>
    </div>
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>