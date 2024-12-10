<?php
include '../includes/queries/modules.php'; // Ensure this file fetches the modules
include '../includes/queries/users.php';
include '../includes/queries/posts.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="styles.css?v=.0">
</head>

<body>

    <nav>
        <div class="logo">
            <img src="https://icons.veryicon.com/png/o/miscellaneous/tmm/a1-31-40x40.png" alt="">
        </div>
        <div class="scrolling-text">
            <p>something is here...</p>
            <p>here is something. . .</p>
        </div>
        <div class="menu">
            <a href="create_post.php" class="menu-item"><i class="bi bi-plus"></i></a>
            <a href="" class="menu-item"><i class="bi bi-bell"></i></a>
            <a href="" class="menu-item"><i class="bi bi-save"></i></a>
        </div>
    </nav>

    <div class="container">
        <main>
            <h1>Create a New Post</h1>
            <form action="submit_post.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="module">Select Module:</label>
                    <select id="module" name="module" required>
                        <option value="">-- Select a Module --</option>
                        <?php foreach ($modules as $module) { ?>
                            <option value="<?= $module['id']; ?>"><?= $module['name']; ?></option>
                        <?php } ?>
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
        </main>
    </div>

</body>

</html>