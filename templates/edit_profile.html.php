<?php
require_once "../includes/authorization.php";
include '../includes/connect_db.php';

$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="edit-profile">
    <h1>Edit Profile</h1>
    <img src="../images/public/<?= $_SESSION['user']['avatar'] ?>" alt="Current Avatar"
        style="width:100px;height:100px;">
    <form action="../php/upload.php" method="post" enctype="multipart/form-data">
        <label for="avatar">Choose a new avatar:</label>
        <input type="file" name="avatar" id="avatar" accept="image/*" required>
        <input type="submit" value="Upload Avatar">
    </form>
    <form action="../php/edit_profile.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
        <p><strong>Name:</strong> <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"
                required></p>
        <p><strong>Username:</strong> <input type="text" name="username"
                value="<?php echo htmlspecialchars($user['username']); ?>" required></p>
        <p><strong>Email:</strong> <input type="email" name="email"
                value="<?php echo htmlspecialchars($user['email']); ?>" required></p>
        <p><strong>Phone Number:</strong> <input type="text" name="phone_number"
                value="<?php echo htmlspecialchars($user['phone_number']); ?>" required></p>
        <p><strong>Sex:</strong>
            <select name="sex" required>
                <option value="Male" <?php echo $user['sex'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $user['sex'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo $user['sex'] == 'Other' ? 'selected' : ''; ?>>Other</option>
            </select>
        </p>
        <button type="submit" name="submit">Save Changes</button>
        <a href="../php/profile.php" class="cancel-button">Cancel</a>
    </form>

</div>