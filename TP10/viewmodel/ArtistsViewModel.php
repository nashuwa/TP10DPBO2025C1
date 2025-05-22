<?php
require_once 'model/Artists.php';

class ArtistsViewModel {
    private $artists;

    public function __construct() {
        $this->artists = new Artists();
    }

    public function getArtistList() {
        return $this->artists->getAll();
    }

    public function getArtistById($artist_id) {
        return $this->artists->getById($artist_id);
    }

    public function addArtist($name, $genre) {
        return $this->artists->create($name, $genre);
    }

    public function updateArtist($artist_id, $name, $genre) {
        return $this->artists->update($artist_id, $name, $genre);
    }

    public function deleteArtist($artist_id) {
        return $this->artists->delete($artist_id);
    }
}
?>