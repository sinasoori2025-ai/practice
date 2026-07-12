<?php
session_start();
require_once "config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password != $confirm_password) {
        $message = "Passwords do not match!";
    } else {

        $check = $conn->prepare("SELECT id FROM users WHERE email=?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {

            $message = "Email already exists.";

        } else {

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $insert = $conn->prepare("INSERT INTO users(full_name,phone,email,address,password) VALUES(?,?,?,?,?)");
            $insert->bind_param("sssss",$full_name,$phone,$email,$address,$hash);

            if($insert->execute()){

                header("Location: login.php");
                exit();

            }else{

                $message="Registration failed.";

            }

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register - Florida Horizon Academy</title>

<link rel="stylesheet" href="css/style.css">

<style>

body{
background:linear-gradient(135deg,#0f172a,#1e3a8a);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.card{
width:550px;
background:#fff;
padding:35px;
border-radius:20px;
box-shadow:0 20px 50px rgba(0,0,0,.3);
}

.error{
background:#fee2e2;
color:#dc2626;
padding:12px;
margin-bottom:15px;
border-radius:10px;
text-align:center;
}

</style>

</head>

<body>

<div class="card">

<form method="POST">

<h2 style="text-align:center;margin-bottom:25px;">
Student Registration
</h2>

<?php
if($message!=""){
echo "<div class='error'>$message</div>";
}
?>

<input
type="text"
name="full_name"
placeholder="Full Name"
required>

<input
type="tel"
name="phone"
placeholder="Phone Number"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="text"
name="address"
placeholder="Address"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
required>

<button type="submit">

Register

</button>

<p style="margin-top:20px;text-align:center;">

Already have an account?

<a href="login.php">

Login

</a>

</p>

</form>

</div>

</body>
</html>