<?php
session_start();

$db = new mysqli('localhost', 'root', '','price_tracker');
if ($db->connect_error){
  die("Connection failed");
}

$username = "";
$email = "";
$password="";
$itemname="";
$itemlink="";
$price="";
$errors = array(); 

// REGISTER USER
if (isset($_POST['user_reg'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password= mysqli_real_escape_string($db, $_POST['password']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
      $pass = md5($password);//encrypt the password before saving in the database

      $query = "INSERT INTO users(email,username,password) VALUES('$email','$username','$pass')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.html');
  }
}
// LOGIN USER
if (isset($_POST['user_log'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.html');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//ADD ITEMS 
if (isset($_POST['sub_item'])){
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $itemname= mysqli_real_escape_string($db, $_POST['itemname']);
  $itemlink = mysqli_real_escape_string($db, $_POST['itemlink']);
  $price = mysqli_real_escape_string($db, $_POST['price']);

// form validation: ensure that the form is correctly filled ...
if (empty($itemname)) { array_push($errors, "Item name is required"); }
if (empty($itemlink)) { array_push($errors, "Link is required"); }
if (empty($price)) { array_push($errors, "Price is required"); }

if (count($errors) == 0) {
 
  $query = "INSERT INTO useritems(email,username,itemname,itemlink,price) VALUES('$email','$username','$itemname','$itemlink','$price')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "Item details have been submitted";
  header('location: index.html');
}
}

//Logout
if (isset($_POST['logout'])){
  unset($_SESSION["username"]);
  header("Location:login.php");
}
?>