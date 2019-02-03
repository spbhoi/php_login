<?php
session_start();

// initializing variables

$email = "";

$password= "";

// $errors = array();

$db=$con=mysqli_connect('localhost','root','','admin');
if(isset($_POST["submit"])){

  $email= mysqli_real_escape_string($db, $_POST['email']);
  $password= mysqli_real_escape_string($db, $_POST['pass']);

  //by form validation
  if(empty($email)){
    echo "Email is require";
}
if(empty($password)){
  echo "password";
}
$user_check_query="SELECT *FROM login WHERE email='$email' OR password='$password' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
if(($user['email'])==$email){
  echo "email is already exist";
}
if(($user['pass'])==$password){
  echo "password is already exist";
}

if (count($errors) == 0) {
$password = md5($password);

$query = "SELECT * FROM login WHERE username='$email' AND password='$password'";

$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) {

$_SESSION['email'] = $email;

$_SESSION['success'] = "You are now logged in";

// header('location: index.php');

}else {

echo "Wrong username/password combination";

}

}

}


//
//   if ($db>connect_error) {
//
// die("Connection failed: " . $db->connect_error);
//
// }
//
// $sql = "INSERT INTO login (email,password)
//
// VALUES ('$email', '$password')";
//
// if ($db->query($sql) === TRUE) {
//
// echo "alert('New record created successfully')";
//
// } else {
//
// echo "Error: " . $sql . "<br>" . $conn->error;
//
// }
//
// }

$db->close();

?>
 ?>
