<?php
require_once 'config/Database.php';

class Artists {
    private $conn;
    private $table = 'artists';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($artist_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE artist_id = :artist_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':artist_id', $artist_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $genre) {
        $query = "INSERT INTO " . $this->table . "(name, genre) VALUES (:name, :genre)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':genre', $genre);
        return $stmt->execute();
    }

    public function update($artist_id, $name, $genre) {
        $query = "UPDATE " . $this->table . " SET genre = :genre, name = :name WHERE artist_id = :artist_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':artist_id', $artist_id);
        return $stmt->execute();
    }

    public function delete($artist_id) {
        $query = "DELETE FROM " . $this->table . " WHERE artist_id = :artist_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':artist_id', $artist_id);
        return $stmt->execute();
    }
}
?>