‌ <?php
session_start();
$conn = new mysqli("localhost", "root", "", "school_portal");

if ($conn->connect_error) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("SELECT id, full_name FROM students WHERE phone = ? AND email = ?");
    $stmt->bind_param("ss", $phone, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['student_id'] = $row['id'];
        $_SESSION['student_name'] = $row['full_name'];
        header("Location: home.html");
        exit();
    } else {
        echo "<script>alert('Invalid phone or email!'); window.location.href='login.html';</script>";
    }
}
$conn->close();
?>