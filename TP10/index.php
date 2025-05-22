<?php
require_once 'viewmodel/AlbumsViewModel.php';
require_once 'viewmodel/ArtistsViewModel.php';
require_once 'viewmodel/SongsViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'artists';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'artists') {
    $viewModel = new ArtistsViewModel();
    if ($action == 'list') {
        $artistList = $viewModel->getArtistList();
        require_once 'views/artists_list.php';
    } elseif ($action == 'add') {
        require_once 'views/artists_form.php';
    } elseif ($action == 'edit') {
        $artists = $viewModel->getArtistById($_GET['id']);
        require_once 'views/artists_form.php';
    } elseif ($action == 'save') {
        $viewModel->addArtist($_POST['name'], $_POST['genre']);
        header('Location: index.php?entity=artists');
    } elseif ($action == 'update') {
        $viewModel->updateArtist($_POST['id'], $_POST['name'], $_POST['genre']);
        header('Location: index.php?entity=artists');
    } elseif ($action == 'delete') {
        $viewModel->deleteArtist($_GET['id']);
        header('Location: index.php?entity=artists');
    }
} elseif ($entity == 'albums') {
    $viewModel = new AlbumsViewModel();
    if ($action == 'list') {
        $albumList = $viewModel->getAlbumList();
        require_once 'views/albums_list.php';
    } elseif ($action == 'add') {
        $artists = $viewModel->getArtist();
        require_once 'views/albums_form.php';
    } elseif ($action == 'edit') {
        $albums = $viewModel->getAlbumById($_GET['id']);
        $artists = $viewModel->getArtist();
        require_once 'views/albums_form.php';
    } elseif ($action == 'save') {
        $viewModel->addAlbum($_POST['title'], $_POST['release_year'], $_POST['artist_id']);
        header('Location: index.php?entity=albums');
    } elseif ($action == 'update') {
        $viewModel->updateAlbum($_GET['id'], $_POST['title'], $_POST['release_year'], $_POST['artist_id']);
        header('Location: index.php?entity=albums');
    } elseif ($action == 'delete') {
        $viewModel->deleteAlbum($_GET['id']);
        header('Location: index.php?entity=albums');
    }
} elseif ($entity == 'songs') {
    $viewModel = new SongsViewModel();
    if ($action == 'list') {
        $songList = $viewModel->getSongList();
        require_once 'views/songs_list.php';
    } elseif ($action == 'add') {
        $albums = $viewModel->getAlbum();
        require_once 'views/songs_form.php';
    } elseif ($action == 'edit') {
        $songs = $viewModel->getSongById($_GET['id']);
        $albums = $viewModel->getAlbum();
        require_once 'views/songs_form.php';
    } elseif ($action == 'save') {
        $viewModel->addSong($_POST['title'], $_POST['duration_sec'], $_POST['album_id']);
        header('Location: index.php?entity=songs');
    } elseif ($action == 'update') {
        $viewModel->updateSong($_GET['id'], $_POST['title'], $_POST['duration_sec'], $_POST['album_id']);
        header('Location: index.php?entity=songs');
    } elseif ($action == 'delete') {
        $viewModel->deleteSong($_GET['id']);
        header('Location: index.php?entity=songs');
    }
}
?>
