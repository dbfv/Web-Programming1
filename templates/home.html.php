<?php
require_once "../includes/authorization.php";

foreach ($posts as $post) { ?>
    <div class="post">
        <div class="user-info">
            <img src="../images/public/<?php echo $post['avatar']; ?>" class="avatar">
            <div>
                <span class="username"><?php echo $post['username']; ?></span>
                <span class="post-time">
                    <?php
                    date_default_timezone_set('Asia/Bangkok'); // Set the timezone to UTC+7
                    $date = $post['post_date'];
                    echo date('H:i d M Y');
                    ?>
                </span>
            </div>
        </div>
        <div class="post-content">
            <h2><?php echo $post['title']; ?></h2>
            <p><?php echo $post['content']; ?></p>
            <img src="../images/post_images/<?= $post['image_path'] ?>">
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