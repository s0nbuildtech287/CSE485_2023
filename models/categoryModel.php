<?php
require_once("C:/xampp/htdocs/CSE485_2023/CSE485_2023_BTTH02/configs/DBConnection.php");
class CategoryModel {
    private $db;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    // Get all categories
    public function getAllCategories() {
        $stmt = $this->db->prepare("SELECT * FROM theloai");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm thể loại mới
    public function addCategory($ten_tloai) {
        $stmt = $this->db->prepare("INSERT INTO theloai (ten_tloai) VALUES (:ten_tloai)");
        $stmt->execute(['ten_tloai' => $ten_tloai]);
    }

    // Cập nhật thể loại
    public function updateCategory($ma_tloai, $ten_tloai) {
         $stmt = $this->db->prepare("UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai");
         $stmt->execute(['ma_tloai' => $ma_tloai, 'ten_tloai' => $ten_tloai]);
    }

     // Xóa thể loại
     public function deleteCategory($ma_tloai) {
         $stmt = $this->db->prepare("DELETE FROM theloai WHERE ma_tloai = :ma_tloai");
         $stmt->execute(['ma_tloai' => $ma_tloai]);
    }
}

?>