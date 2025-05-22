<?php
require_once 'model/Albums.php';
require_once 'model/Artists.php';

class AlbumsViewModel {
    private $albums;
    private $artists;

    public function __construct() {
        $this->albums = new Albums();
        $this->artists = new Artists();
    }

    public function getAlbumList() {
        return $this->albums->getAll();
    }

    public function getAlbumById($album_id) {
        return $this->albums->getById($album_id);
    }

    public function getArtist() {
        return $this->artists->getAll();
    }

    public function addAlbum($title, $release_year, $artist_id) {
        return $this->albums->create($title, $release_year, $artist_id);
    }

    public function updateAlbum($album_id, $title, $release_year, $artist_id) {
        return $this->albums->update($album_id, $title, $release_year, $artist_id);
    }

    public function deleteAlbum($album_id) {
        return $this->albums->delete($album_id);
    }
}
?>