<?php 

    if (isset($_POST['comment']) && !trim($_POST['comment']) == '') {
        try {
            $sql = "INSERT INTO comments(photoId, userId, comment) VALUES (:photoId, :userId, :comment)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':photoId' => $_POST['photoId'],
                ':userId' => $_SESSION['id'],
                ':comment' => $_POST['comment']
            ]);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        send_comment_notif_email($_POST['photoId']);
        header ('Location: ' . $_SERVER['REQUEST_URI']);
    } else {
        echo '<script type="text/javascript">alert("Write something to post your comment");</script>';
    }


    function send_comment_notif_email($photoId) {
        require(PRIVATE_PATH . ('/config/database.php'));
        
        try {
            $sql = "SELECT * FROM img WHERE id=:photoId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':photoId' => $photoId
            ]);
            $image = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        
        try {
            $sql = "SELECT firstname, lastname, email, email_prefer FROM users WHERE id=:userId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':userId' => $image['userId']
                ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        if ($user['email_prefer'] == 0) {
            return ;
        }

        $to = $user['email'];
        $subject = 'You have a new comment. Check it in your feed';
        $message_body = '
        Hi ' . $user['firstname'] . ' ' . $user['lastname'] . ',

        You have received new comment from ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '!

        Comment is following:
        "' . $_POST['comment'] . '"

        Visit this link to have a look at it
        http://localhost:8100/feed';

        mail($to, $subject, $message_body);
    }

?>