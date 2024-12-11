<?php
include '../includes/queries/modules.php';
include '../includes/queries/users.php';
include '../includes/queries/posts.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../templates/styles.css?v=6.0">
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>

<body>

    <nav>
        <div class="logo">
            <a href="../php/home.php"> <!-- Link to home.php -->
                <img src="https://icons.veryicon.com/png/o/miscellaneous/tmm/a1-31-40x40.png" alt="Logo">
            </a>
        </div>
        <div class="scrolling-text">
            <p>something is here...</p>
            <p>here is something. . .</p>

        </div>
        <div class="menu">
            <a href="../php/create_post.php" class="menu-item"><i class="bi bi-plus"></i></a>
            <a href="" class="menu-item"><i class="bi bi-bell"></i></a>
            <a href="" class="menu-item"><i class="bi bi-save"></i></a>
            <a href="../php/profile.php" class="menu-item"><img
                    src="../images/public/<?= $_SESSION['user']['avatar'] ?>" alt=""></a>
        </div>
    </nav>

    <div class="container">
        <aside style="left: 0">
            <ul class="subjects">
                <!-- php for subjects goes here-->
                <?php foreach ($modules as $module) { ?>
                    <li>
                        <a href="">
                            <b>
                                <p> <?php echo $module['name'] ?> </p>
                            </b>
                            <span class="description"> <?php echo $module['code'] ?>
                            </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </aside>

        <aside style="right: 0">
            <ul class="users">

                <!-- php for users goes here -->

                <?php foreach ($users as $user) { ?>
                    <li>
                        <a href="#">
                            <img src="../images/public/<?= $user['avatar'] ?>">
                            <p> <?php echo $user['name']; ?> </p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </aside>

        <main>
            <?php echo $output ?>
        </main>
    </div>

</body>

</html>