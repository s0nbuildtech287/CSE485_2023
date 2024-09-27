<?php
require_once("../../configs/DBConnection.php");

class SongModel {
    private $db;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    public function searchSongsByName($name) {
        $stmt = $this->db->prepare("SELECT * FROM songs WHERE song_name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
