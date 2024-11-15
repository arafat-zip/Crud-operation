<?php
include 'connect.php';
$id = $_GET['editid'];
if (isset($_POST['submit']) ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $sql = "UPDATE `crudoperation` SET `name` = '$name', `email` = '$email', `mobile` = '$mobile' WHERE `crudoperation`.`id` = $id";
    // $sql = "INSERT INTO crudoperation (name,email,mobile) VALUES($name,$email,$mobile)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:display.php');
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
    <div class="container my-5">
    <form method="POST">
  <div class="mb-3">
  <?php
   $sql = "SELECT * FROM `crudoperation` WHERE id = $id";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   ?>
    <label  class="form-label">User Name</label>
    <input type="text" name="name" class="form-control" placeholder="<?php echo $row['name'] ?>" >
  </div>
 
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="<?php echo $row['email'] ?>"  >
    <div  class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Mobile</label>
    <input type="text" name="mobile" class="form-control" placeholder="<?php echo $row['mobile'] ?>">
  </div>
  <button type="submit"name="submit" class="btn btn-primary">Update</button>
</form>
    </div>
  </body>
</html>