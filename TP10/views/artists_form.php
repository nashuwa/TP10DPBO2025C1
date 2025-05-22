<?php
require_once 'views/template/header.php';
?>

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-3xl text-center font-bold mb-4"><?php echo isset($artists) ? 'Edit Artist' : 'Add Artist'; ?></h2>
    <form action="index.php?entity=artists&action=<?php echo isset($artists) ? 'update&id=' . $artists['artist_id'] : 'save'; ?>" method="POST" class="space-y-4">
        <?php if (isset($artists)): ?>
            <input type="hidden" name="id" value="<?php echo $artists['artist_id']; ?>">
        <?php endif; ?>
        <div>
            <label class="block">Nama:</label>
            <input type="text" name="name" value="<?php echo isset($artists) ? $artists['name'] : ''; ?>" class="border p-2 w-full" required>
        </div>
        <div>
            <label class="block">Genre:</label>
            <input type="text" name="genre" value="<?php echo isset($artists) ? $artists['genre'] : ''; ?>" class="border p-2 w-full" required>
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="text-white px-4 py-2 rounded" style="background-color:rgb(144, 210, 223);">Save</button>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>