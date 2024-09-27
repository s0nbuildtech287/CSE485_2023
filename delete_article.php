<?php
include 'C:\xampp\htdocs\CSE485_2023\btth01_template\db.php';
$this_id = $_GET['this_id'];

$delete_articles_sql = "DELETE FROM baiviet WHERE ma_bviet = '$this_id'";
mysqli_query($conn, $delete_articles_sql);

header('location: article.php');
?>