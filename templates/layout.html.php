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
    <title><?= $title?></title>
    <link rel="stylesheet" href="../templates/styles.css?v=6.0">
    <!-- <link rel="stylesheet" href="styles.css"> -->
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
            <a href="" class="menu-item"><i class="bi bi-plus"></i></a>
            <a href="" class="menu-item"><i class="bi bi-bell"></i></a>
            <a href="" class="menu-item"><i class="bi bi-save"></i></a>
            <a href="" class="menu-item"><img
                    src="https://scontent.fhan5-9.fna.fbcdn.net/v/t39.30808-6/462705746_1298887404741619_1990410904088423499_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=mEKJMNGOsYcQ7kNvgHodpYL&_nc_zt=23&_nc_ht=scontent.fhan5-9.fna&_nc_gid=ApjfaWbPX2Plch2Bz6GAOvQ&oh=00_AYCt8UA298fNMUQZgTp3bvJaTDkqux9pW-d1t1XKfARO9g&oe=673566D7"
                    alt=""></a>
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