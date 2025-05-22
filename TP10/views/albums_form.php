<?php
require_once 'views/template/header.php';
?>
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-3xl text-center font-bold mb-4"><?php echo isset($albums) ? 'Edit Album' : 'Add Album'; ?></h2>
    <form action="index.php?entity=albums&action=<?php echo isset($albums) ? 'update&id=' . $albums['album_id'] : 'save'; ?>" method="POST" class="space-y-4">
        <div>
            <label class="block">Judul:</label>
            <input type="text" name="title" value="<?php echo isset($albums) ? $albums['title'] : ''; ?>" class="border p-2 w-full" required>
        </div>
        <div>
            <label class="block">Tahun Rilis:</label>
            <input type="text" name="release_year" value="<?php echo isset($albums) ? $albums['release_year'] : ''; ?>" class="border p-2 w-full" required>
        </div>
        <div>
            <label class="block">Artist:</label>
            <select name="artist_id" class="border p-2 w-full" required>
                <?php foreach ($artists as $artist): ?>
                <option value="<?php echo $artist['artist_id']; ?>" <?php echo isset($albums) && $albums['artist_id'] == $artist['artist_id'] ? 'selected' : ''; ?>>
                    <?php echo $artist['name']; ?>
                </option>
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