<?php
require_once 'views/template/header.php';
?>

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-3xl text-center font-bold mb-4"><?php echo isset($songs) ? 'Edit Song' : 'Add Song'; ?></h2>
    <form action="index.php?entity=songs&action=<?php echo isset($songs) ? 'update&id=' . $songs['song_id'] : 'save'; ?>" method="POST" class="space-y-4">
        <div>
            <label class="block">Judul:</label>
            <input type="text" name="title" value="<?php echo isset($songs) ? $songs['title'] : ''; ?>" class="border p-2 w-full" required>
        </div>
        <div>
            <label class="block">Durasi (detik):</label>
            <input type="number" name="duration_sec" value="<?php echo isset($songs) ? $songs['duration_sec'] : ''; ?>" class="border p-2 w-full" required step="1" min="0">
        </div>
        <div>
            <label class="block">Album:</label>
            <select name="album_id" class="border p-2 w-full" required>
                <?php foreach ($albums as $album): ?>
                <option value="<?php echo $album['album_id']; ?>" <?php echo isset($songs) && $songs['album_id'] == $album['album_id'] ? 'selected' : ''; ?>><?php echo $album['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="text-white px-4 py-2 rounded" style="background-color:rgb(144, 210, 223);">Save</button>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>