<?php
require_once 'views/template/header.php';
?>

<div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md">
<h2 class="text-3xl font-bold text-center mb-4">Song List</h2>
<div class="text-center mb-4">
    <a href="index.php?entity=songs&action=add" class="text-white px-4 py-2 rounded inline-block" style="background-color:rgb(144, 210, 223);">
        Add Song
    </a>
</div>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Judul</th>
        <th class="border p-2">Durasi</th>
        <th class="border p-2">Album</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($songList as $song): ?>
    <tr>
        <td class="border p-2"><?php echo $song['title']; ?></td>
        <td class="border p-2"><?php echo $song['duration_sec']; ?> detik</td>
        <td class="border p-2"><?php echo $song['album_title']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=songs&action=edit&id=<?php echo $song['song_id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=songs&action=delete&id=<?php echo $song['song_id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>

<?php
require_once 'views/template/footer.php';
?>