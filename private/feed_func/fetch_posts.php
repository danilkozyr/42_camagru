<?php
    try {
        $sql = "SELECT * FROM img WHERE public=1 ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([]);
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($images as $image) {
            try {
                $sql = "SELECT firstname, lastname, img FROM users WHERE id=:userId";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':userId' => $image['userId']
                ]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            create_card($user, $image);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
        
    function create_card($user, $image) {
        echo '<div class="card">';
        echo '    <div class="card-header">';
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
        echo '</div>';
        echo '<div class="card-content">';
        echo '    <img src="' . $image['image'] . '">';
        echo '</div>';
        echo '        <div class="card-footer">';
        echo '        <div class="card-likes">';
        echo '            <img class="card-like-img" src="/images/like.png">';
        echo '            <span class="card-like-text">25 likes</p>';
        echo '        </div>';
        echo '        <div class="card-comment-block">';
        echo '            <div class="card-comment-per-user">';
        echo '                <span class="card-comment-username">' . $user['firstname'] . ' ' . $user['lastname'] . '</span>';
        echo '                <span class="card-comment">Lorem Ispansum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, </p>';
        echo '            </div>';
        echo '            <hr />';
        echo '            <div class="card-comment-form">';
        echo '                <div class="card-add-comment">';
        echo '                    <input type="text" placeholder="Add New Comment" />';
        echo '                </div>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
            


    
    // try {
        //     $sql = "SELECT * FROM img WHERE public=1";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->execute([]);
        //     $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     echo '<ul class="product-list-basic">';
                //     foreach ($images as $image) {
                    //         echo '<li>';
                            //             echo '<img src="' . $image['image'] . '" />';
                            //         echo '</li>';
                            //     }
                            //     echo '</ul>';
                            // } catch(PDOException $e) {
                                //     echo "Error: " . $e->getMessage();
                                // }
                                
?>
