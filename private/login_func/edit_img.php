<?php
    if (isset($_FILES['file']['error']) && $_FILES['file']['error'] === 0) {
        
        $name = $_FILES['file']['name'];
        $targ_dir = "upload/";
        $targ_file = $targ_dir . basename($_FILES['file']['name']);
    
        $imgType = strtolower(pathinfo($targ_file,PATHINFO_EXTENSION));
    
        $extensions_arr = array("jpg","jpeg","png");
    
        if (in_array($imgType, $extensions_arr)) {
    
            $img_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $img = 'data:image/'.$imgType.';base64,'.$img_base64;
            try {
                $sql = "UPDATE users SET img=:img WHERE email=:email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':img' => $img,
                    ':email' => $_SESSION['email']
                ]);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $_SESSION['img'] = $img;
        } else {
            echo "<script>alert('You can download images with following extensions: .jpg, .jpeg, .png');</script>";
        }
    } else {
        echo "<script>alert('Choose a photo to download');</script>";
    }

?>