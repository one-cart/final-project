<?php
session_start();
$username="";
$nic="";
$email="";
$nic="";
$postal="";
$city="";
$address="";
$phonenumber="";
$errors = array();

$db=mysqli_connect("localhost","root","","onecart-test") or die("not connected");
// register user
if(isset($_POST['reg_user'])){
$username = mysqli_real_escape_string($db,$_POST['username']);
$nic =mysqli_real_escape_string($db,$_POST['nic']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$postal =mysqli_real_escape_string($db,$_POST['postal']);
$address =mysqli_real_escape_string($db,$_POST['address']);
$city =mysqli_real_escape_string($db,$_POST['city']);
$phonenumber =mysqli_real_escape_string($db,$_POST['phonenumber']);
$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
//form validation
if(empty($username)){
    array_push($errors,"User name is required.");
}
if(empty($email)){array_push($errors,"Email is required.");}
if(empty($password_1)){array_push($errors,"Password is required.");}
if($password_1 != $password_2){array_push($errors, "Passwords do not match");}


// check db for existing user with same username
$user_check_query = "SELECT * FROM user WHERE u_nic = '$nic' or u_email = '$email' LIMIT 1";

$results = mysqli_query($db,$user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
    if($user["nic"] === $nic){array_push($errors,"User NIC is already exist.");}
    if($user['email'] === $email){array_push($errors,"Email is already exist.");}
}
//register the user no error
if(count($errors) == 0){
    $password = md5($password_1);
    $query = "INSERT INTO user (u_name,u_nic, u_email , u_pass,u_city,u_add,u_code,u_phone) VALUES ('$username','$nic', '$email','$password','$city','$address','$postal','$phonenumber')";
    mysqli_query($db,$query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] ="You are now logged in";

    header('location: user/indexuser.php');
}
}

//login

if(isset($_POST['login_user'])){
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);
    if(empty($email)){
        array_push($errors,"Email is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
    }
    if(count($errors)==0){
        $password =md5($password);
        $query ="SELECT * FROM user WHERE u_email='$email' AND u_pass='$password'";
        $results=mysqli_query($db,$query);

        if(mysqli_num_rows($results)){
            $_SESSION['email']=$email;
            $_SESSION['success']="Login is successful.";
            header("location:user/indexuser.php");
        }else{
            array_push($errors,"wrong login.");
        }
    }
}

?>
 