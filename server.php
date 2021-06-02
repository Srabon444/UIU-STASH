<?php

// initializing variables
$userid = "";
$name= "";
$password = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'srabon444_srabon444', 'X5@@0Vu6Qye23j!BsSB2FA!Ihkxvs2tDqc4DO1', 'srabon444_ashraful-me.com');
//$db = mysqli_connect('localhost', 'root', '', 'ashraful-me.com');

// REGISTER USER

  // receive all input values from the form


if(isset($_POST['signup'])) {
    $userid = mysqli_real_escape_string($db, $_POST['userid']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Finally, register user if there are no errors in the form

    $password = md5($password);//encrypt the password before saving in the database

    $signupquery = "INSERT INTO signup(userid, name, password) VALUES('$userid','$name', '$password')";
    //echo "<script>console.log('$query');</script>";
    mysqli_query($db, $signupquery);
    echo "<script>window.alert('sign up successful');</script>";
    echo "<script>location.assign('index.php');</script>";

}







// LOGIN USER
if (isset($_POST['login'])) {
  $userid = mysqli_real_escape_string($db, $_POST['userid']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  	$password = md5($password);
  	$loginquery = "SELECT * FROM signup WHERE userid ='$userid' AND password='$password'";
  	$result = mysqli_query($db, $loginquery);

  	if (mysqli_num_rows($result) == 1) {
        echo "<script>location.assign('index_loggedin.php');</script>";
  	}else {
        echo "<script>window.alert('Wrong User ID or Password');</script>";
  	}
  }


?>