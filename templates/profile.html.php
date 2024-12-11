<div class="profile">
    <h1>User Profile</h1>
    <div class="profile-info">
        <img src="../images/public/<?php echo $user['avatar']; ?>" class="avatar" alt="User  Avatar">
        <div>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phone_number']); ?></p>
            <p><strong>Sex:</strong> <?php echo htmlspecialchars($user['sex']); ?></p>
        </div>
    </div>
    <a href="../php/edit_profile.php" class="edit-button">Edit Profile</a>
    <a href="../php/logout.php" class="logout-button" style="background-color: red; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; margin-left: 10px;">Logout</a>
</div>

<div class="posts">
    <h2>Your Posts</h2>
    <?php if (count($userPosts) > 0): ?>
        <?php foreach ($userPosts as $post): ?>
            <div class="post">
                <div class="user-info">
                    <img src="../images/public/<?php echo $post['avatar']; ?>" class="avatar">
                    <div>
                        <span class="username"><?php echo $post['username']; ?></span>
                        <span class="post-time">
                            <?php
                            date_default_timezone_set('Asia/Bangkok'); // Set the timezone
                            $date = $post['post_date'];
                            echo date('H:i d M Y', strtotime($date)); // Format the post date
                            ?>
                        </span>
                        <a href="../php/delete_post.php?id=<?php echo $post['id']; ?>" class="delete-button"
                            onclick="return confirm('Are you sure you want to delete this post?');" style="color: grey; font-size: 20px; margin-left: 10px;">X</a>
                    </div>
                </div>
                <div class="post-content">
                    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                    <p><?php echo htmlspecialchars($post['content']); ?></p>
                    <?php if ($post['image_path']): ?>
                        <img src="../images/post_images/<?php echo htmlspecialchars($post['image_path']); ?>" alt="Post Image">
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>You have not made any posts yet.</p>
    <?php endif; ?>
</div>