<?php
include("C:/xampp/htdocs/CSE485_2023_BTTH02/configs/DBConnection.php");
class AuthorModel {
    private $db;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    // Get all categories
    public function getAllAuthors() {
        $stmt = $this->db->prepare("SELECT * FROM tacgia");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm thể loại mới
    public function addAuthor($ten_tgia, $hinh_tgia) {
        // Fix table name and parameter names in the query
        $stmt = $this->db->prepare("INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (:ten_tgia, :hinh_tgia)");
    
        // Pass a single associative array with both parameters
        $stmt->execute([
            'ten_tgia' => $ten_tgia,
            'hinh_tgia' => $hinh_tgia
        ]);
    }

    public function updateAuthor($ten_tgia, $hinh_tgia) {
        $stmt = $this->db->prepare('UPDATE tacgia SET ten_tgia =: ten_tgia, hinh_tgia =: hinh_tgia WHERE ma_tgia =: ma_tgia');
        $stmt->execute(['ten_tgia' => $ten_tgia, 'hinh_tgia'=> $hinh_tgia]);
    }
    // Cập nhật thể loại
    // public function updateCategory($ma_tloai, $ten_tloai) {
    //     $stmt = $this->db->prepare("UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai");
    //     $stmt->execute(['ma_tloai' => $ma_tloai, 'ten_tloai' => $ten_tloai]);
    // }

    // // Xóa thể loại
    // public function deleteCategory($ma_tloai) {
    //     $stmt = $this->db->prepare("DELETE FROM theloai WHERE ma_tloai = :ma_tloai");
    //     $stmt->execute(['ma_tloai' => $ma_tloai]);
    }

?>