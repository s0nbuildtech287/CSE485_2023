<?php
require_once "../../configs/DBConnection.php";

$conn = new mysqli('localhost', 'root', '', 'btth01_cse485');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            if ($username == 'admin') {
                echo "<script>alert('Đăng nhập thành công với admin!');</script>";
                header('location: ../../../../../CSE485_2023_BTTH02/app/views/admin/index.php');
            } else {
                echo "<script>alert('Đăng nhập thành công với user!');</script>";
                header('location: ../../../../../CSE485_2023_BTTH02/app/views/users/index.php');
            }
        } else {
            echo "<script>alert('Mật khẩu không đúng! Vui lòng thử lại.');</script>";
        }
    } else {
        echo "<script>alert('Tên đăng nhập không tồn tại! Vui lòng thử lại.');</script>";
    }

    // Đóng kết nối và truy vấn
    $stmt->close();
    $conn->close();
}
?>
