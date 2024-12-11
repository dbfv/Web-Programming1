<?php
// require_once "../includes/authorization.php";

foreach ($posts as $post) { ?>
    <div class="post">
        <div class="user-info">
            <img src="../images/public/<?php echo $post['avatar']; ?>" alt="User  Avatar" class="avatar">
            <span class="username"><?php echo $post['username']; ?></span>
        </div>
        <div class="post-content">
            <h2><?php echo $post['title']; ?></h2>
            <p><?php echo $post['content']; ?></p>
            <?php if (!empty($post['image_path'])) { ?>
                <img src="../images/post_images/<?php echo $post['image_path']; ?>">
            <?php } ?>

        </div>
        <div class="interaction">
            <button class="like">Like</button>
            <button class="dislike">Dislike</button>
        </div>
        <div class="comments">
            <div class="comment">
                <span class="username">JaneDoe</span>
                <p>This is a comment.</p>
            </div>
            <textarea id="new-comment" placeholder="Add a comment..."></textarea>
            <button id="submit-comment">Comment</button>
        </div>
    </div>
<?php } ?>
?>