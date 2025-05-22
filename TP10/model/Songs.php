<?php
require_once 'config/Database.php';

class Songs {
    private $conn;
    private $table = 'songs';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT so.*, alb.title as album_title 
                FROM " . $this->table . " so
                JOIN albums alb ON so.album_id = alb.album_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($song_id) {
        $query = "SELECT so.*, alb.title as album_title 
                FROM " . $this->table . " so
                JOIN albums alb ON so.album_id = alb.album_id 
                WHERE so.song_id = :song_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':song_id', $song_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $duration_sec, $album_id) {
        $query = "INSERT INTO " . $this->table . "(title, duration_sec, album_id) VALUES (:title, :duration_sec, :album_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':duration_sec', $duration_sec);
        $stmt->bindParam(':album_id', $album_id);
        return $stmt->execute();
    }

    public function update($song_id, $title, $duration_sec, $album_id) {
        $query = "UPDATE " . $this->table . " SET title = :title, duration_sec = :duration_sec, album_id = :album_id WHERE song_id = :song_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':song_id', $song_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':duration_sec', $duration_sec);
        $stmt->bindParam(':album_id', $album_id);
        return $stmt->execute();
    }

    public function delete($song_id) {
        $query = "DELETE FROM " . $this->table . " WHERE song_id = :song_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':song_id', $song_id);
        return $stmt->execute();
    }
}
?>