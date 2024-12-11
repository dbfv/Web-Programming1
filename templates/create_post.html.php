<?php
// require_once "../includes/authorization.php";

?>

<h1>What's your question to the world?</h1>
<form action="../php/create_post.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="module">Select Module:</label>
        <select id="module" name="module" required>
            <option value="" disabled="disabled" selected="selected">Select Module</option>
            <?php
            foreach ($modules as $module) {
                ?>
                <option value="<?= $module['id']; ?>">
                    <?= $module['name'] ?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="content">Post Content:</label>
        <textarea id="content" name="content" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
    </div>
    <button type="submit">Submit Post</button>
</form>