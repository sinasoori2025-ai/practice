<?php
session_start();
require_once "config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1){

        $user = $result->fetch_assoc();

        if(password_verify($password,$user["password"])){

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["full_name"] = $user["full_name"];
            $_SESSION["email"] = $user["email"];

            header("Location: index.php");
            exit();

        }else{

            $message = "Incorrect password.";

        }

    }else{

        $message = "Email not found.";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Login</title>

<link rel="stylesheet" href="css/style.css">

<style>

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

<div class="left">

<h2>Florida Horizon Academy</h2>

<p>
Welcome to our Student Portal.
Access your classes, grades and assignments.
</p>

<img src="https://picsum.photos/id/1015/600/400"
class="left-img">

</div>

<div class="right">

<form method="POST">

<h2>Student Login</h2>

<?php
if($message!=""){
echo "<div class='error'>$message</div>";
}
?>

<input
type="email"
name="email"
placeholder="Student Email"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button type="submit">

Sign In

</button>

<p style="text-align:center;margin-top:20px;">

Don't have an account?

<a href="register.php">

Register

</a>

</p>

</form>

</div>

</div>

</body>

</html>