<?php
require_once 'model/Songs.php';
require_once 'model/Albums.php';

class SongsViewModel {
    private $songs;
    private $albums;

    public function __construct() {
        $this->songs = new Songs();
        $this->albums = new Albums();
    }

    public function getSongList() {
        return $this->songs->getAll();
    }

    public function getSongById($song_id) {
        return $this->songs->getById($song_id);
    }

    public function getAlbum() {
        return $this->albums->getAll();
    }

    public function addSong($title, $duration_sec, $album_id) {
        return $this->songs->create($title, $duration_sec, $album_id);
    }

    public function updateSong($song_id, $title, $duration_sec, $album_id) {
        return $this->songs->update($song_id, $title, $duration_sec, $album_id);
    }

    public function deleteSong($song_id) {
        return $this->songs->delete($song_id);
    }
}
?>