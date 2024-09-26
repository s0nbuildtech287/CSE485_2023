<?php
require_once("C:/xampp/htdocs/CSE485_2023/CSE485_2023_BTTH02/app/models/authorModel.php");


class AuthorController {
    private $authorModel;

    public function __construct() {
        $this->authorModel = new AuthorModel();
    }

    // Lấy danh sách tất cả tác giả
    public function index() {
        return $this->authorModel->getAllAuthors();
    }
    
    // Thêm tác giả mới
    public function store($ten_tgia,$hinh_tgia) {
        // Check if the author's name is provided
        if (!empty($ten_tgia)) {
            $this->authorModel->addAuthor($ten_tgia, $hinh_tgia);
            echo "<script>alert('Thêm tác giả thành công!');</script>";
        } else {
            echo "<script>alert('Tên tác giả không được để trống!');</script>";
        }
    }

    // Sửa thông tin tác giả
    public function update($ma_tgia, $ten_tgia, $hinh_tgia) {
        if (!empty($ten_tgia) && !empty($ma_tgia)) {
            $this->authorModel->updateAuthor($ma_tgia, $ten_tgia, $hinh_tgia);
            echo "<script>alert('Cập nhật tác giả thành công!');</script>";
        } else {
            echo "<script>alert('Tên tác giả và mã tác giả không được để trống!');</script>";
        }
    }

    // Xóa tác giả
    public function delete($ma_tgia) {
        if (!empty($ma_tgia)) {
            $this->authorModel->deleteAuthor($ma_tgia);
            echo "<script>alert('Xóa tác giả thành công!');</script>";
        } else {
            echo "<script>alert('Mã tác giả không hợp lệ!');</script>";
        }
    }
    
}

?>
