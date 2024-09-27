<?php
include("C:/xampp/htdocs/CSE485_2023/CSE485_2023_BTTH02/configs/DBConnection.php");

class ArticleModel {
    private $db;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    // Get all articles
    public function getAllArticles() {
        $stmt = $this->db->prepare("SELECT * FROM baiviet");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new article
    public function addArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh) {
        $stmt = $this->db->prepare("INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) 
                                    VALUES (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh)");

        $stmt->execute([
            ':tieude' => $tieude,
            ':ten_bhat' => $ten_bhat,
            ':ma_tloai' => $ma_tloai,
            ':tomtat' => $tomtat,
            ':noidung' => $noidung,
            ':ma_tgia' => $ma_tgia,
            ':ngayviet' => $ngayviet,
            ':hinhanh' => $hinhanh
        ]);

        return $stmt->rowCount(); // Return the number of affected rows
    }

    public function updateArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh) {
        $stmt = $this->db->prepare('UPDATE baiviet SET tieude =: tieude, ten_bhat =: ten_bhat, ma_tloai =: ma_tloai, tomtat =: tomtat, noidung =: noidung, ma_tgia =: ma_tgia, ngayviet =: ngayviet, hinhanh =: hinhanh WHERE ma_bviet =: ma_bviet');
        $stmt->execute([':tieude' => $tieude,
            ':ten_bhat' => $ten_bhat,
            ':ma_tloai' => $ma_tloai,
            ':tomtat' => $tomtat,
            ':noidung' => $noidung,
            ':ma_tgia' => $ma_tgia,
            ':ngayviet' => $ngayviet,
            ':hinhanh' => $hinhanh
        ]);
    }
}
?>