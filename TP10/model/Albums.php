<?php
require_once 'config/Database.php';

class Albums {
    private $conn;
    private $table = 'albums';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT alb.*, art.name as artist_name 
                FROM " . $this->table . " alb
                JOIN artists art ON alb.artist_id = art.artist_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($album_id) {
        $query = "SELECT alb.*, art.name as artist_name 
                FROM " . $this->table . " alb
                JOIN artists art ON alb.artist_id = art.artist_id 
                WHERE alb.album_id = :album_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':album_id', $album_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $release_year, $artist_id) {
        $query = "INSERT INTO " . $this->table . "(title, release_year, artist_id) VALUES (:title, :release_year, :artist_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':release_year', $release_year);
        $stmt->bindParam(':artist_id', $artist_id);
        return $stmt->execute();
    }

    public function update($album_id, $title, $release_year, $artist_id) {
        $query = "UPDATE " . $this->table . " SET title = :title, release_year = :release_year, artist_id = :artist_id WHERE album_id = :album_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':album_id', $album_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':release_year', $release_year);
        $stmt->bindParam(':artist_id', $artist_id);
        return $stmt->execute();
    }

    public function delete($album_id) {
        $query = "DELETE FROM " . $this->table . " WHERE album_id = :album_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':album_id', $album_id);
        return $stmt->execute();
    }
}
?>