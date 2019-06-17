<?php

    try {
        $sql = "SELECT * FROM img WHERE public=1 ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($images as $image) {
            $user = fetch_user($image['userId']);
            $comments = fetch_comment($image);
            $likes = fetch_likes($image);
            if (isset($_SESSION['id']) && $image['userId'] == $_SESSION['id']) {
                $_SESSION['delete'] = true;
            }
            foreach ($likes as $like) {
                if (isset($_SESSION['id']) && $like['userId'] == $_SESSION['id']) {
                    $_SESSION['liked'] = true;
                }
            }
            create_card($user, $image, $comments, $likes);
            unset($_SESSION['delete']);
            unset($_SESSION['liked']);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
        

    function fetch_likes($image) {
        require(PRIVATE_PATH . ('/config/database.php'));
        
        try {
            $sql = "SELECT photoId, userId FROM likes WHERE photoId=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $image['id']
                ]);
            $likes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $likes;
    }

    function fetch_comment($image) {
        require(PRIVATE_PATH . ('/config/database.php'));
        try {
            $sql = "SELECT commentId, photoId, userId, comment FROM comments WHERE photoId=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $image['id']
                ]);
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($comments as $key => $comment) {
                $user = fetch_user($comment['userId']);
                $comments[$key]['firstname'] = $user['firstname'];
                $comments[$key]['lastname'] = $user['lastname'];
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $comments;
    }

    function fetch_user($id) {
        require(PRIVATE_PATH . ('/config/database.php'));
        try {
            $sql = "SELECT firstname, lastname, img FROM users WHERE id=:userId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':userId' => $id
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $user;
    }

    function create_card($user, $image, $comments, $likes) {
        echo '<div class="card">';
        echo '    <div class="card-header">';
        echo '        <div class="card-group-1">';
        echo '        <div class="card-user-img">';
        if (empty($user['img'])) {
            echo '    <img src="/images/profile.png">';
        } else {
            echo '            <img src="' . $user['img'] . '">';
        }
        echo '        </div>';
        echo '        <div class="card-user-info">';
        echo '            <p class="card-username">' . $user['firstname'] . ' ' . $user['lastname'] . '</p>';
        echo '        </div>';
        echo '        </div>';
        if (isset($_SESSION['delete']) && $_SESSION['delete'] == true) {
            echo '        <div class="card-group-2">';
            echo '        <div class="card-delete-post">';
            echo '            <form action="" method="post">';
            echo '              <input class="card-delete-img" type="image" name="del_post" src="/images/hide.png">';
            echo '              <input type="text" name="photoId" value="'. $image['id'] .'" hidden>';
            echo '            </form>';
            echo '        </div>';
            echo '        </div>';
        }
        echo '   </div>';
        
        echo '<div class="card-content">';
        echo '    <img src="' . $image['image'] . '">';
        echo '</div>';
        echo '        <div class="card-footer">';
        echo '        <div class="card-likes">';
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            echo '        <form action="" method="post">';
            if (isset($_SESSION['liked'])) {
                echo '            <input type="image" class="card-like-img" src="/images/unlike.png">';
                echo '            <input type="text" name="isLiked" value="true" hidden>';
            } else {
                echo '            <input type="image" class="card-like-img" src="/images/like.png">';
                echo '            <input type="text" name="isLiked" value="false" hidden>';
            }
            echo '            <input type="text" name="photoId" value="'. $image['id'] .'" hidden>';
            echo '            <input type="text" name="like" value="1" hidden>';
            
        }
        echo '            <span class="card-like-text">'. count($likes) .' likes</p></span>';
        echo '        </form>';
        echo '        </div>';
        echo '        <div class="card-comment-block">';
        if (count($comments) > 2) {
            echo '        <div class="card-comment-from_users">';
        }
        foreach($comments as $comment) {
            
            echo '            <div class="card-comment-per-user">';
            echo '                <span class="card-comment-username">' . htmlentities($comment['firstname']) . ' ' . htmlentities($comment['lastname']) . '</span>';
            echo '                <span class="card-comment">' . htmlentities($comment['comment']) . '</p></span>';
            echo '            </div>';
            
        }
        if (count($comments) > 2) {
            
            echo '            </div>';
        }
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            echo '            <hr />';
            echo '            <div class="card-comment-form">';
            echo '                <div class="card-add-comment"s>';
            echo '                    <form action="" method="post">';
            echo '                        <input type="text" name="comment" placeholder="Add New Comment">';
            echo '                        <input type="submit" name="commentButton" placeholder="Add New Comment" hidden>';
            echo '                        <input type="text" name="photoId" value="'. $image['id'] .'" hidden>';
            echo '                    </form>';
            echo '                </div>';
            echo '            </div>';
        }
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
            
