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
    <a href= "../php/edit_profile.php" class="edit-button">Edit Profile</a>
</div>