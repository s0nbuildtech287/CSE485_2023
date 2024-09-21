<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <?php
    // Kết nối đến cơ sở dữ liệu
    include 'C:\xampp\htdocs\CSE485_2023\btth01_template\db.php';

    // Kiểm tra xem form đã được gửi hay chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form

        $ma_bviet = $conn->real_escape_string($_POST['txtCatId']);
        $tieude = $conn->real_escape_string($_POST['txtCatTieude']);
        $ten_bhat = $conn->real_escape_string($_POST['txtCatTenbaihat']);
        $ma_tloai = $conn->real_escape_string($_POST['txtCatMatheloai']);
        $tomtat = $conn->real_escape_string($_POST['txtCatTomtat']);
        $noidung = $conn->real_escape_string($_POST['txtCatNoidung']);
        $ma_tgia = $conn->real_escape_string($_POST['txtCatMatacgia']);
        $ngayviet = $conn->real_escape_string($_POST['txtCatNgayviet']);
        $hinhanh = $conn->real_escape_string($_POST['txtCatHinhanh']);
    

        $sql = "UPDATE baiviet SET tieude = '$tieude', ten_bhat = '$ten_bhat', ma_tloai = '$ma_tloai', tomtat = '$tomtat',
        noidung = '$noidung', ma_tgia = '$ma_tgia', ngayviet = '$ngayviet', hinhanh = '$hinhanh' 
        WHERE ma_bviet = '$ma_bviet'";

        if ($conn->query($sql) === TRUE) {
            header("Location: article.php?success=1");
            exit();
        } else {
        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
        }
    }
    ?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
                <form action="edit_article.php" method="post">
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã bài viết</span>
                        <input type="text" class="form-control" name="txtCatId" placeholder="Điền mã bài viết">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatTieude">Tiêu đề</span>
                        <input type="text" class="form-control" name="txtCatTieude" placeholder="Điền tên tiêu đề ">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatTenbaihat">Tên bài hát</span>
                        <input type="text" class="form-control" name="txtCatTenbaihat" placeholder="Điền tên bài hát" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatMatheloai">Mã thể loại</span>
                        <input type="text" class="form-control" name="txtCatMatheloai" placeholder="Điền mã thể loại" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatTomtat">Tóm tắt</span>
                        <input type="text" class="form-control" name="txtCatTomtat" placeholder="Điền tóm tắt" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatNoidung">Nội dung</span>
                        <input type="text" class="form-control" name="txtCatNoidung" placeholder="Điền nội dung" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatMatacgia">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtCatMatacgia" placeholder="Điền mã tác giả" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatNgayviet">Ngày viết</span>
                        <input type="date" class="form-control" name="txtCatNgayviet" placeholder="Điền ngày viết" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatHinhanh">Hình ảnh</span>
                        <input type="file" class="form-control" name="txtCatHinhanh" placeholder="Chọn ảnh" >
                    </div>



                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>