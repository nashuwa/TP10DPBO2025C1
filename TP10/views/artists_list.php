<?php
require_once 'views/template/header.php';
?>

<div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md">
<h2 class="text-3xl font-bold text-center mb-4">Artist List</h2>
<div class="text-center mb-4">
    <a href="index.php?entity=artists&action=add" class="text-white px-4 py-2 rounded inline-block" style="background-color:rgb(144, 210, 223);">
        Add Artist
    </a>
</div>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Nama</th>
        <th class="border p-2">Genre</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($artistList as $artist): ?>
    <tr>
        <td class="border p-2"><?php echo $artist['name']; ?></td>
        <td class="border p-2"><?php echo $artist['genre']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=artists&action=edit&id=<?php echo $artist['artist_id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=artists&action=delete&id=<?php echo $artist['artist_id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>

<?php
require_once 'views/template/footer.php';
?>