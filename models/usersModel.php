<?php   
require_once("../../configs/DBConnection.php");

class UserModel {
    private $db;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    //lệnh lấy tất cả người dùng
    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function checkLogin($username, $password) {
        // Truy vấn lấy thông tin người dùng từ CSDL
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra nếu tìm thấy người dùng và mật khẩu khớp
        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }

}
?>